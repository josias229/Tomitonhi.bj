<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function acceuil()
    {
        $categories = Categorie::all();

        // Récupère les 5 derniers produits des artisans
        $produitsTendances = Produit::with(['artisan.user', 'categorie', 'photos'])
            ->where('est_actif', true)
            ->latest()
            ->take(5)
            ->get()
            ->unique('artisan_id');

        // Récupère les 4 artisans avec le plus de produits actifs - VERSION CORRIGÉE
        $artisansPopulaires = User::where('role', 'artisan')
            ->where('statut', 'actif')
            ->with(['artisan' => function ($query) {
                $query->withCount(['produits' => function ($q) {
                    $q->where('est_actif', true);
                }]);
            }])
            ->get()
            ->sortByDesc(function ($user) {
                return $user->artisan ? $user->artisan->produits_count : 0;
            })
            ->take(4)
            ->load(['artisan.produits' => function ($query) {
                $query->where('est_actif', true);
            }]);

        return view('acceuil', compact('categories', 'produitsTendances', 'artisansPopulaires'));
    }


    // public function  produits()
    // {
    //     $categories = Categorie::with(['produits' => function ($query) {
    //         $query->where('est_actif', true)->orderBy('created_at', 'desc');
    //     }])->get();

    //     return view('produits', compact('categories'));
    // }

    public function produits()
    {
        $categories = Categorie::whereHas('produits', function ($query) {
            $query->where('est_actif', true);
        })
            ->with(['produits' => function ($query) {
                $query->where('est_actif', true)
                    ->orderBy('created_at', 'desc')
                    ->with(['artisan.user', 'categorie', 'photos']); // Chargement des relations
            }])
            ->get();

        return view('produits', compact('categories'));
    }
    public function showCategorie(Categorie $categorie)
    {
        $produits = $categorie->produits()
            ->where('est_actif', true)
            ->with(['photos', 'artisan'])
            ->orderBy('created_at', 'desc')
            ->paginate(12); // ou le nombre d'items par page que vous souhaitez

        return view('categories.show', compact('categorie', 'produits'));
    }
    public function  nouveautes()
    {
        return view('nouveautes');
    }
    public function  blog()
    {
        return view('blog');
    }
    // public function  promotions()
    // {
    //     return view('promotions');
    // }

    // Dans App\Http\Controllers\ViewController.php

    public function promotions(Request $request)
    {
        $query = Produit::with(['artisan.user', 'categorie', 'photos'])
            ->where('est_actif', true)
            ->whereNotNull('prix_promo')
            ->where('debut_promo', '<=', now())
            ->where('fin_promo', '>=', now());

        // Filtre par pourcentage de réduction
        if ($request->has('filter')) {
            switch ($request->filter) {
                case '50':
                    $query->whereRaw('(prix - prix_promo) / prix * 100 >= 50');
                    break;
                case '30':
                    $query->whereRaw('(prix - prix_promo) / prix * 100 >= 30')
                        ->whereRaw('(prix - prix_promo) / prix * 100 < 50');
                    break;
                    // 'all' ne nécessite pas de filtre supplémentaire
            }
        }

        $produitsEnPromo = $query->orderByRaw('(prix - prix_promo) / prix * 100 DESC')
            ->paginate(12);

        return view('promotions', compact('produitsEnPromo'));
    }
    // public function  artisan()
    // {
    //     return view('artisan');
    // }
    // Dans App\Http\Controllers\ViewController.php

    public function artisan()
    {
        // Récupère les utilisateurs artisans avec leurs produits
        $artisans = User::with(['artisan.produits' => function ($query) {
            $query->where('est_actif', true)
                ->with('photos')
                ->latest();
        }])
            ->where('role', 'artisan')
            ->where('statut', 'actif')
            ->paginate(8);

        return view('artisan', compact('artisans'));
    }
    public function details_artisans(User $artisan)
    {
        // Vérifie que l'utilisateur est bien un artisan
        if (!$artisan->isArtisan()) {
            abort(404);
        }

        // Charge les relations nécessaires (sans les avis)
        $artisan->load([
            'artisan',
            'artisan.produits' => function ($query) {
                $query->where('est_actif', true)
                    ->with(['photos', 'categorie'])
                    ->latest();
            }
        ]);

        // Récupère les produits de l'artisan
        $produits = $artisan->artisan->produits ?? collect();

        return view('details-artisans', compact('artisan', 'produits'));
    }
    public function  wishlist()
    {
        return view('wishlist');
    }
    public function  cart()
    {
        return view('cart');
    }
    public function  contact()
    {
        return view('contact');
    }
    public function  conditions()
    {
        return view('conditions');
    }
    public function  mentions()
    {
        return view('mentions');
    }
    public function  faq()
    {
        return view('faq');
    }
    public function  confidentialite()
    {
        return view('confidentialite');
    }
    public function  cgu()
    {
        return view('cgu');
    }
    public function  politique()
    {
        return view('politique');
    }
    public function  gestion_dashArtisan()
    {
        // Récupère l'artisan connecté et ses produits avec les photos
        $artisan = auth()->user()->artisan;
        $produits = $artisan->produits()
            ->with('photos') // Charge les relations photos
            ->latest()
            ->get();

        $stats = [
            'total' => $produits->count(),
            'new_this_month' => $produits->filter(function ($produit) {
                return $produit->created_at->format('Y-m') == now()->format('Y-m');
            })->count(),
            'active' => $produits->where('est_actif', true)->count(),
            'out_of_stock' => $produits->where('stock', '<=', 0)->count()
        ];
        return view('gestion-dashArtisan', compact('produits', 'stats'));
    }
    public function showForm()
    {
        $categories = Categorie::all();
        return view('layout.main')->with('categories', $categories);
    }
}
