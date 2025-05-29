<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Commande;
use App\Models\SousCommande;
use App\Models\SousCommandeProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use FedaPay\FedaPay;
use FedaPay\Transaction;


class passerCommande extends Controller
{
    public function showCheckout()
    {
        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide');
        }

        return view('checkout', [
            'cart' => $cart,
            'subtotal' => $this->calculateSubtotal($cart),
            'delivery' => $this->calculateDelivery($cart),
            'taxes' => $this->calculateTaxes($cart),
            'total' => $this->calculateTotal($cart)
        ]);
    }
    public function processCheckout(Request $request)
    {
        // 1. Validation des données client
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'adresse' => 'required|string',
            'mode_paiement' => 'required|in:mobile_money,carte,espece'
        ]);
    
        return DB::transaction(function () use ($validated) {
            $cart = session()->get('cart', []);
    
            // Valider le panier avant tout traitement
            $this->validateCart($cart);
            // 2. Vérifier que le panier n'est pas vide
            if (empty($cart)) {
                throw new \Exception('Votre panier est vide');
            }
    
            // 3. Calculer le montant total
            $montantTotal = $this->calculateTotal($cart);
    
            // 4. Créer la commande principale
            $commande = Commande::create([
                'client_id' => Auth::id(),
                'nom_client' => $validated['nom'],
                'email_client' => $validated['email'],
                'telephone_client' => $validated['telephone'],
                'adresse_livraison' => $validated['adresse'],
                'mode_paiement' => $validated['mode_paiement'],
                'montant_total' => $montantTotal,
                'statut' => $validated['mode_paiement'] === 'espece' ? 'payee' : 'en_attente',
                'reference' => 'CMD-' . strtoupper(Str::random(10))
            ]);
    
            // 5. Grouper les articles par artisan
            $groupedItems = collect($cart)->groupBy('artisan_id')->map(function ($items, $artisanId) {
                if (empty($artisanId)) {
                    throw new \Exception('Un produit n\'a pas d\'artisan associé');
                }
    
                return [
                    'artisan_id' => $artisanId,
                    'items' => $items,
                    'montant' => collect($items)->sum(fn($item) => $item['price'] * $item['quantity'])
                ];
            });
    
            // 6. Créer les sous-commandes
            foreach ($groupedItems as $group) {
                $sousCommande = SousCommande::create([
                    'commande_id' => $commande->id,
                    'artisan_id' => $group['artisan_id'],
                    'montant' => $group['montant'],
                    'statut' => 'en_preparation',
                    'numero_suivi' => 'SC-' . strtoupper(Str::random(8))
                ]);
    
                // Insertion des produits
                $produitsData = collect($group['items'])->map(function ($item) use ($sousCommande) {
                    return [
                        'sous_commande_id' => $sousCommande->id,
                        'produit_id' => $item['id'],
                        'quantite' => $item['quantity'],
                        'prix_unitaire' => $item['price']
                        // 'created_at' => now(),
                        // 'updated_at' => now()
                    ];
                })->toArray();
    
                SousCommandeProduit::insert($produitsData);
            }
    
            // 7. Si paiement mobile ou carte, redirection FedaPay
            // if (in_array($validated['mode_paiement'], ['mobile_money', 'carte'])) {
            //     FedaPay::setEnvironment(config('services.fedapay.env'));
            //     FedaPay::setApiKey(config('services.fedapay.secret_key'));
    
            //     $transaction = \FedaPay\Transaction::create([
            //         'amount' => $montantTotal,
            //         'description' => "Paiement de commande #{$commande->reference}",
            //         'currency' => ['iso' => 'XOF'],
            //         'callback_url' => route('commande.confirmation', $commande->id),
            //         'customer' => [
            //             'firstname' => $validated['nom'],
            //             'email' => $validated['email'],
            //             'phone_number' => [
            //                 'number' => $validated['telephone'],
            //                 'country' => 'bj'
            //             ]
            //         ]
            //     ]);
    
            //     $payment_url = $transaction->generatePaymentUrl();
            //     return redirect($payment_url);
            // }

            // 7. Si paiement mobile ou carte, redirection FedaPay
if (in_array($validated['mode_paiement'], ['mobile_money', 'carte'])) {
    FedaPay::setEnvironment(config('services.fedapay.env'));
    FedaPay::setApiKey(config('services.fedapay.secret_key'));

    try {
        $transaction = Transaction::create([
            'amount' => $montantTotal,
            'description' => "Paiement de commande #{$commande->reference}",
            'currency' => ['iso' => 'XOF'],
            'callback_url' => route('commande.confirmation', $commande->id),
            'customer' => [
                'firstname' => $validated['nom'],
                'email' => $validated['email'],
                'phone_number' => [
                    'number' => $validated['telephone'],
                    'country' => 'bj'
                ]
            ]
        ]);

        // Nouvelle méthode pour obtenir l'URL de paiement
        $token = $transaction->generateToken();
        return redirect($token->url);

    } catch (\Exception $e) {
        // Gestion des erreurs
        return back()->with('error', 'Erreur de paiement: '.$e->getMessage());
    }
}
    
            // 8. Sinon (paiement en espèces), vider panier + notifier
            session()->forget('cart');
            $this->sendNotifications($commande);
    
            return redirect()->route('commande.confirmation', $commande->id)
                ->with('success', 'Commande #' . $commande->reference . ' passée avec succès');
        });
    }
    

    protected function sendNotifications(Commande $commande)
{
    // Notification au client
    $commande->client->notify(new NouvelleSousCommandeNotificationController($commande));
    
    // Notifications aux artisans
    foreach ($commande->sousCommandes as $sousCommande) {
        $sousCommande->artisan->user->notify(
            new NouvelleSousCommandeNotificationController($sousCommande)
        );
    }
    
    // Notification à l'admin (si nécessaire)
    // ...
}

    private function calculateSubtotal($cart)
    {
        return collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    private function calculateDelivery($cart)
    {
        $subtotal = $this->calculateSubtotal($cart);
        return max($subtotal * 0.1, 2000); // 10% ou 2000 FCFA minimum
    }

    private function calculateTaxes($cart)
    {
        return $this->calculateSubtotal($cart) * 0.18; // TVA 18%
    }

    private function calculateTotal($cart)
    {
        return $this->calculateSubtotal($cart) + 
               $this->calculateDelivery($cart) + 
               $this->calculateTaxes($cart);
    }

    protected function validateCart($cart)
{
    foreach ($cart as $item) {
        if (!isset($item['artisan_id']) || empty($item['artisan_id'])) {
            throw new \Exception('Le produit "'.$item['name'].'" n\'a pas d\'artisan associé');
        }
        
        // Vérifiez que l'artisan existe
        $artisan = Artisan::where('user_id', $item['artisan_id'])->first();
        if (!$artisan) {
            throw new \Exception('L\'artisan du produit "'.$item['name'].'" n\'existe pas');
        }
    }
}
}