<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route pour les vues
Route::get('/acceuil', [ViewController::class, 'acceuil'])->name('acceuil');
Route::get('/produits', [ViewController::class, 'produits'])->name('produits');
Route::get('/nouveautes', [ViewController::class, 'nouveautes'])->name('nouveautes');
Route::get('/blog', [ViewController::class, 'blog'])->name('blog');
Route::get('/promotions', [ViewController::class, 'promotions'])->name('promotions');
Route::get('/artisan', [ViewController::class, 'artisan'])->name('artisan');
Route::get('/details-artisans', [ViewController::class, 'details_artisans'])->name('details-artisans');
Route::get('/wishlist', [ViewController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [ViewController::class, 'cart'])->name('cart');
Route::get('/contact', [ViewController::class, 'contact'])->name('contact');
Route::get('/conditions', [ViewController::class, 'conditions'])->name('conditions');
Route::get('/mentions', [ViewController::class, 'mentions'])->name('mentions');
Route::get('/faq', [ViewController::class, 'faq'])->name('faq');
Route::get('/confidentialite', [ViewController::class, 'confidentialite'])->name('confidentialite');
Route::get('/cgu', [ViewController::class, 'cgu'])->name('cgu');
Route::get('/politique', [ViewController::class, 'politique'])->name('politique');
// Route::get('/gestion-dashArtisan', [ViewController::class, 'gestion_dashArtisan'])->name('gestion-dashArtisan');


// // Route d'inscription artisan
// Route::get('/artisan/register', [RegisteredUserController::class, 'createArtisan'])
//     ->middleware('guest')
//     ->name('artisan.register');

Route::post('/artisan/register', [RegisteredUserController::class, 'storeArtisan'])
    ->middleware('guest')
    ->name('artisan.register'); // Ajoutez le name ici

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard client standard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Dashboard artisan - accessible seulement aux artisans
    Route::get('/gestion-dashArtisan', [ViewController::class, 'gestion_dashArtisan'])
        ->middleware('role:artisan')
        ->name('gestion-dashArtisan');

    // Dashboard admin - exemple
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->middleware('role:admin')->name('admin.dashboard');
});



// Routes pour les artisans (gestion des produits)
Route::middleware(['auth', 'role:artisan'])->prefix('artisan')->group(function () {
    Route::post('/produits', [ProduitController::class, 'store'])->name('artisan.produits.store');
    Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('artisan.produits.update');
    Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('artisan.produits.destroy');
    Route::delete('/produits/{produit}/photos/{photo}', [ProduitController::class, 'destroyPhoto'])
     ->name('artisan.produits.photos.destroy');
});



Route::put('/profile/settings', [ProfileController::class, 'updateSettings'])
    ->middleware(['auth'])
    ->name('profile.update.settings');

// routes/web.php
Route::post('/login/artisan', [AuthenticatedSessionController::class, 'artisanLogin'])->name('artisan.login');
Route::post('/login/client', [AuthenticatedSessionController::class, 'clientLogin'])->name('client.login');

use App\Http\Controllers\PrivateFileController;

Route::get('/private/{path}', [PrivateFileController::class, 'show'])
    ->where('path', '.*')
    ->name('private');
