<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next, string $role): Response
    // {
    //     if (!auth()->check()) {
    //         return redirect()->route('login');
    //     }

    //     if (auth()->user()->role !== $role) {
    //         abort(403, 'Accès non autorisé');
    //     }
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next, string $role): Response
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    $user = auth()->user();
    
    // Vérification du rôle
    if ($user->role !== $role) {
        abort(403, 'Accès non autorisé');
    }
    
    // Vérification supplémentaire pour les artisans
    if ($role === 'artisan' && $user->statut !== 'actif') {
        Auth::logout();
        return redirect()->route('login')
            ->with('error', 'Votre compte artisan est en attente de validation');
    }

    return $next($request);
}
}
