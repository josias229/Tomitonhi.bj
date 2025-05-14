<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function  acceuil()
    {
        $categories = Categorie::all();
        return view('acceuil')->with('categories', $categories);
        // return view('acceuil');
    }
    public function  produits()
    {
        return view('produits');
    }
    public function  nouveautes()
    {
        return view('nouveautes');
    }
    public function  blog()
    {
        return view('blog');
    }
    public function  promotions()
    {
        return view('promotions');
    }
    public function  artisan()
    {
        return view('artisan');
    }
    public function  details_artisans()
    {
        return view('details-artisans');
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
                'new_this_month' => $produits->filter(function($produit) {
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
