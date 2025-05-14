<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Produit extends Model
{
    use SoftDeletes;

    protected $fillable = ['artisan_id', 'categorie_id', 'nom', 'description', 'prix', 'prix_promo', 'debut_promo', 'fin_promo', 'stock', 'slug', 'est_actif'];

    protected $casts = [
        'debut_promo' => 'datetime',
        'fin_promo' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // App/Models/Produit.php
protected static function booted()
{
    static::deleting(function ($produit) {
        // Supprime automatiquement les photos quand le produit est supprimé
        foreach ($produit->photos as $photo) {
            Storage::delete($photo->url);
            $photo->delete();
        }
    });
}
    public function artisan() {
        return $this->belongsTo(Artisan::class , 'artisan_id', 'user_id');
    }

    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    public function photos() {
        return $this->hasMany(ProduitPhoto::class);
    }

    public function favoris() {
        return $this->belongsToMany(User::class, 'favoris', 'produit_id', 'client_id');
    }

    public function sousCommandes() {
        return $this->belongsToMany(SousCommande::class, 'sous_commande_produits')
                    ->withPivot('quantite', 'prix_unitaire');
    }
}
