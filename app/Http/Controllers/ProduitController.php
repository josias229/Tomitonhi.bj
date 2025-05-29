<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\ProduitPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // dd(auth()->id(), auth()->user()->artisan);

    //     $request->validate([
    //         'nom' => 'required|string|max:255',
    //         'prix' => 'required|numeric|min:100',
    //         'stock' => 'required|integer|min:0',
    //         'description' => 'nullable|string',
    //         'images' => 'required|array|min:1',
    //         'images.*' => 'image|mimes:jpeg,png|max:2048'
    //     ]);

    //     // Récupère l'artisan connecté
    //     $artisan = auth()->user()->artisan;

    //     // Création du produit
    //     $produit = $artisan->produits()->create([
    //         'nom' => $request->nom,
    //         'prix' => $request->prix,
    //         'stock' => $request->stock,
    //         'description' => $request->description,
    //         'categorie_id' =>  $artisan->categorie_id,// Récupération auto
    //         'artisan_id' => $artisan->id // Ajout explicite
    //     ]);

    //     // Upload des images
    //     foreach ($request->file('images') as $image) {
    //         $path = $image->store("private/artisans/{auth()->id()}/produits");
    //         $produit->photos()->create(['url' => $path]);
    //     }

    //     return redirect()->route('gestion-dashArtisan')->with('success', 'Produit créé !');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:100',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png|max:2048'
        ]);

        // Récupère l'artisan connecté
        $artisan = auth()->user()->artisan;

        // dd([
        //     'artisan_id' => $artisan->id,
        //     'artisan_user_id' => $artisan->user_id,
        //     'connected_user' => auth()->user(),
        //     'categorie_id' => $artisan->categorie_id,
        // ]);

        // dd(auth()->user()->artisan->getKey());

        // Création du produit via la relation
        $produit = $artisan->produits()->create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'description' => $request->description,
            'categorie_id' => $artisan->categorie_id,
            'prix_promo' => $request->prix_promo,
            'debut_promo' => $request->debut_promo,
            'fin_promo' => $request->fin_promo,
            'slug' => Str::slug($request->nom) . '-' . uniqid(), // Slug unique
        ]);
        // NOUVEAU : Génération d'une image de test aléatoire pour les tests
        // if(app()->environment('local')) {
        //     $produit->photos()->create([
        //         'url' => 'https://picsum.photos/600/600?random=' . rand(1, 1000)
        //     ]);
        // } 
        // // En production : upload réel
        // else {
            foreach ($request->file('images') as $image) {
                $path = $image->store("artisans/{$artisan->user_id}/produits", 'public');
                $path = str_replace("public/", "", $path);
                $produit->photos()->create(['url' => $path]);
            }
        // }

        return redirect()->route('gestion-dashArtisan')->with('success', 'Produit créé !');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Display the specified product.
     */
    public function show(Produit $produit)
    {
        // Charge les relations nécessaires
        $produit->load(['artisan.user', 'categorie', 'photos']);

        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        // $request->validate([
        //     'nom' => 'required|string|max:255',
        //     'prix' => 'required|numeric|min:100',
        //     'stock' => 'required|integer|min:0',
        //     'description' => 'nullable|string',
        //     'images.*' => 'nullable|image|mimes:jpeg,png|max:2048'
        // ]);

        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:100',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png|max:2048',
            'prix_promo' => 'nullable|numeric|min:0',
            'debut_promo' => 'nullable|date',
            'fin_promo' => 'nullable|date|after_or_equal:debut_promo'
        ]);

        // Mise à jour du produit
        $produit->update([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'description' => $request->description,
            'prix_promo' => $request->prix_promo,
            'debut_promo' => $request->debut_promo,
            'fin_promo' => $request->fin_promo,
            'est_actif' => $request->est_actif,
        ]);

        // Ajouter de nouvelles images si fournies
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store("public/artisans/{$produit->artisan->user_id}/produits");
                $produit->photos()->create(['url' => $path]);
            }
        }

        return redirect()->route('gestion-dashArtisan')->with('success', 'Produit mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Produit $produit)
    // {
    //     // Vérifier que l'artisan connecté est bien le propriétaire du produit
    //     if (auth()->user()->artisan->id !== $produit->artisan_id) {
    //         return redirect()->back()->with('error', 'Action non autorisée');
    //     }

    //     // Supprimer les photos associées
    //     foreach ($produit->photos as $photo) {
    //         Storage::delete($photo->url);
    //         $photo->delete();
    //     }

    //     // Supprimer le produit
    //     $produit->delete();

    //     return redirect()->route('gestion-dashArtisan')
    //         ->with('success', 'Produit supprimé avec succès');
    // }

    public function destroy(Produit $produit)
    {
        $user = auth()->user();

        // Debugging temporaire - à enlever après résolution
        \Log::info('Suppression produit', [
            'user_id' => $user->id,
            'user_artisan_id' => optional($user->artisan)->id,
            'produit_artisan_id' => $produit->artisan_id
        ]);

        // if (!$user->artisan || $user->artisan->id != $produit->artisan_id) {
        //     return redirect()->back()
        //         ->with('error', 'Action non autorisée. Code: ' . optional($user->artisan)->id . '-' . $produit->artisan_id);
        // }

        if (auth()->id() != $produit->artisan->user_id) {
            return redirect()->back()
                ->with('error', 'Action non autorisée');
        }

        try {
            // Suppression des photos
            foreach ($produit->photos as $photo) {
                Storage::delete($photo->url);
                $photo->delete();
            }

            // Suppression du produit
            $produit->delete();

            return redirect()->route('gestion-dashArtisan')
                ->with('success', 'Produit supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->route('gestion-dashArtisan')
                ->with('error', 'Erreur lors de la suppression: ' . $e->getMessage());
        }
    }

    public function destroyPhoto(Produit $produit, ProduitPhoto $photo)
    {
        if (auth()->user()->artisan->id !== $produit->artisan_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        Storage::delete($photo->url);
        $photo->delete();

        return back()->with('success', 'Image supprimée avec succès');
    }
}
