<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commande extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id', 'montant_total', 'statut', 'reference_paiement', 'mode_paiement', 'adresse_livraison'];

    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function sousCommandes() {
        return $this->hasMany(SousCommande::class);
    }
}
