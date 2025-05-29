<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artisan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'categorie_id',
        'rccm',
        'ifu',
        'description',
        'photo_profil',
        'galerie_photos',
        'cni_path',
        'rccm_path',
        'est_verifie'
    ];

    protected $casts = [
        'galerie_photos' => 'array'
    ];

    protected $primaryKey = 'user_id';  // Indique à Laravel que la PK est user_id
    public $incrementing = false;      // Désactive l'auto-incrément car user_id est une clé étrangère
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function produits()
    {
        return $this->hasMany(Produit::class, 'artisan_id', 'user_id');
    }

    
    public function sousCommandes()
    {
        return $this->hasMany(SousCommande::class);
    }

    public function avis()
    {
        return $this->morphMany(Avis::class, 'avisable');
    }

    public function articlesBlog()
    {
        return $this->hasMany(BlogArticle::class);
    }
}
