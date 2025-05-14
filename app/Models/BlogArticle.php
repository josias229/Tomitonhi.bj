<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogArticle extends Model
{
    use SoftDeletes;

    protected $fillable = ['artisan_id', 'titre', 'slug', 'contenu', 'image_couverture', 'est_publie'];

    public function artisan() {
        return $this->belongsTo(Artisan::class);
    }

}
