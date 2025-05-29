<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // public function add(Request $request, $id)
    // {
    //     $produit = Produit::with('artisan.user')->findOrFail($id); // Chargement eager des relations
        
    //     if (!$produit->artisan) {
    //         return back()->with('error', 'Ce produit n\'a pas d\'artisan associé');
    //     }
    
    //     $cart = session()->get('cart', []);
    
    //     $cart[$id] = [
    //         "id" => $produit->id,
    //         "name" => $produit->nom,
    //         "quantity" => 1,
    //         "price" => $produit->prix_promo ?: $produit->prix,
    //         "image" => $produit->photos->first() ? Storage::url($produit->photos->first()->url) : 'https://picsum.photos/100/100',
    //         "artisan_id" => $produit->artisan->user_id, // L'ID de l'artisan directement
    //         "artisan" => $produit->artisan->user->name ?? 'Artisan inconnu',
    //         "category" => $produit->categorie->nom ?? 'Non catégorisé'
    //     ];
    
    //     session()->put('cart', $cart);
        
    //     return redirect()->back()->with('success', 'Produit ajouté au panier');
    // }

    public function add(Request $request, $id)
    {
        $produit = Produit::with(['artisan.user', 'categorie'])->findOrFail($id);
        
        if (!$produit->artisan) {
            return back()->with('error', 'Ce produit n\'est actuellement pas disponible (artisan introuvable)');
        }
    
        $cart = session()->get('cart', []);
    
        $cart[$id] = [
            "id" => $produit->id,
            "name" => $produit->nom,
            "quantity" => 1,
            "price" => $produit->prix_promo ?: $produit->prix,
            "image" => $produit->photos->first() ? Storage::url($produit->photos->first()->url) : 'https://picsum.photos/100/100',
            "artisan_id" => $produit->artisan_id, // Utilisez directement artisan_id du produit
            "artisan" => $produit->artisan->user->name ?? 'Artisan inconnu',
            "category" => $produit->categorie->nom ?? 'Non catégorisé'
        ];
    
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Panier mis à jour');
        }

        return redirect()->back()->with('error', 'Produit non trouvé');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Panier vidé');
    }
    
}