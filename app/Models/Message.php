<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $fillable = ['envoyeur_id', 'receveur_id', 'contenu', 'lu'];

    public function envoyeur() {
        return $this->belongsTo(User::class, 'envoyeur_id');
    }

    public function receveur() {
        return $this->belongsTo(User::class, 'receveur_id');
    }
}
