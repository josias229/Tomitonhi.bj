<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request (ancienne méthode conservée pour compatibilité).
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        return $this->handleLogin($request, null);
    }

    /**
     * Handle artisan login.
     */
    public function artisanLogin(LoginRequest $request): RedirectResponse
    {
        return $this->handleLogin($request, 'artisan');
    }

    /**
     * Handle client login.
     */
    public function clientLogin(LoginRequest $request): RedirectResponse
    {
        return $this->handleLogin($request, 'client');
    }

    /**
     * Common login handling logic.
     */
    private function handleLogin(LoginRequest $request, ?string $expectedRole): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = auth()->user();

        // Vérification du type d'utilisateur si spécifié
        if ($expectedRole && $user->role !== $expectedRole) {
            Auth::logout();
            return back()->with('error', 'Veuillez utiliser le formulaire approprié pour votre type de compte');
        }

        // Vérification statut artisan
        if ($user->role === 'artisan' && $user->statut !== 'actif') {
            Auth::logout();
            return redirect()->route('login')
                ->with('error', 'Votre compte artisan est en attente de validation');
        }

        return redirect()->intended(
            $user->role === 'artisan'
                ? route('gestion-dashArtisan')
                : route('acceuil')
        );
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('acceuil');
    }
}
