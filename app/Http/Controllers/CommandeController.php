<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use FedaPay\FedaPay;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function confirmation($id)
    {
        // 1. Récupérer la commande
        $commande = Commande::findOrFail($id);
    
        // 2. Vérifier si la commande a déjà été payée
        if ($commande->statut === 'payee') {
            return redirect()->route('accueil')->with('info', 'Cette commande a déjà été confirmée.');
        }
    
        try {
            // 3. Vérifier le statut de paiement auprès de FedaPay
            FedaPay::setEnvironment(config('services.fedapay.env'));
            FedaPay::setApiKey(config('services.fedapay.secret_key'));
    
            // ⚠️ Ici tu dois avoir un moyen de retrouver la transaction liée à cette commande.
            // Si tu enregistres l'ID de la transaction dans la commande, tu peux faire :
            // $transaction = \FedaPay\Transaction::retrieve($commande->fedapay_transaction_id);
    
            // Pour cet exemple, on suppose que si on est redirigé ici, le paiement a réussi :
            $commande->update(['statut' => 'payee']);
    
            // Vider le panier par sécurité (si nécessaire)
            session()->forget('cart');
    
            // Envoi de notifications (email, etc.)
            $this->sendNotifications($commande);
    
            return view('confirmation', [
                'commande' => $commande,
                'message' => 'Merci pour votre achat ! Votre commande a été confirmée avec succès.'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('accueil')->with('error', 'Une erreur est survenue lors de la confirmation du paiement.');
        }
    }
    }
