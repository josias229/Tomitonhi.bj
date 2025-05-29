<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'whatsapp',
        'adresse',
        'ville',
        'type_compte',
        'role',
        'statut'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'type_compte' => 'string'
        ];
    }

    // 🔁 Relations

    // Nouvelle relation pour les artisans
    // public function artisanProfile()
    // {
    //     return $this->hasOne(Artisan::class, 'user_id');
    // }

    // Méthode pour vérifier le type de compte
    public function isArtisan()
    {
        return $this->role === 'artisan';
    }

    public function artisan()
    {
        return $this->hasOne(Artisan::class, 'user_id');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'client_id');
    }

    public function avis()
    {
        return $this->hasMany(Avis::class, 'client_id');
    }

    public function messagesEnvoyes()
    {
        return $this->hasMany(Message::class, 'envoyeur_id');
    }

    public function messagesRecus()
    {
        return $this->hasMany(Message::class, 'receveur_id');
    }

    public function favoris()
    {
        return $this->belongsToMany(Produit::class, 'favoris', 'client_id', 'produit_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    // Dans App\Models\User.php

    public function scopeArtisansActifs($query)
    {
        return $query->where('role', 'artisan')
            ->where('statut', 'actif');
    }
    public function produitsArtisan()
    {
        if ($this->artisan) {
            return $this->artisan->produits();
        }

        return null;
    }
}
