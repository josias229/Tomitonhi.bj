<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avis extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id', 'note', 'commentaire', 'est_approuve'];

    public function client() {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function avisable() {
        return $this->morphTo();
    }
}
