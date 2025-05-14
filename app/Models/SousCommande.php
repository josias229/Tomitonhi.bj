<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// 7. SousCommande Model
class SousCommande extends Model
{
    use SoftDeletes;

    protected $fillable = ['commande_id', 'artisan_id', 'montant', 'statut', 'numero_suivi', 'notes_livraison'];

    public function commande() {
        return $this->belongsTo(Commande::class);
    }

    public function artisan() {
        return $this->belongsTo(Artisan::class);
    }

    public function produits() {
        return $this->belongsToMany(Produit::class, 'sous_commande_produits')
                    ->withPivot('quantite', 'prix_unitaire');
    }
}
