<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom', 'icone', 'slug'];

    public function artisans() {
        return $this->hasMany(Artisan::class);
    }

    public function produits() {
        return $this->hasMany(Produit::class);
    }
}
