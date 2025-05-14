<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    protected $fillable = ['client_id', 'produit_id'];

    public function produit() {
        return $this->belongsTo(Produit::class);
    }
}
