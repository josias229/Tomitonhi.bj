<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterArtisanRequest;
use App\Models\Artisan;
use App\Models\Categorie;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\NewArtisanRegistration;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;



// class RegisteredUserController extends Controller
// {
//     /**
//      * Display the registration view.
//      */
//     public function create(): View
//     {
//         return view('auth.register');
//     }

//     /**
//      * Handle an incoming registration request.
//      *
//      * @throws \Illuminate\Validation\ValidationException
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         // dd($request->all());
//         $request->validate([
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
//             'whatsapp' => ['required', 'string', 'unique:users,whatsapp'],
//             'password' => ['required', 'confirmed', Rules\Password::defaults()],
//             'role' => ['sometimes', 'in:client,artisan,admin'],
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'whatsapp' => $request->whatsapp,
//             'password' => Hash::make($request->password),
//             'role' => $request->role ?? 'client', // Valeur par défaut si non fourni
//         ]);

//         // 👉 Ajouter ce bloc :
//         if ($user->role === 'artisan') {
//             $user->artisan()->create([
//                 'rccm' => null,
//                 'description' => null,
//                 'photo_profil' => null,
//                 'galerie_photos' => null,
//                 'cni_path' => null,
//                 'rccm_path' => null,
//             ]);
//         }

//         event(new Registered($user));

//         Auth::login($user);

//         // Redirection basée sur le rôle
//         if ($user->role === 'artisan') {
//             return redirect()->route('gestion-dashArtisan');
//         }
//         // return redirect('/')->with('success', 'Inscription réussie!');
//         return redirect()->route('dashboard');
//     }

//     //     public function storeArtisan(RegisterArtisanRequest $request)
//     //     {
//     //         // Création de l'utilisateur
//     //         $user = User::create([
//     //             'name' => $request->name,
//     //             'email' => $request->email,
//     //             'password' => Hash::make($request->password),
//     //             'whatsapp' => $request->whatsapp,
//     //             'role' => 'artisan',
//     //         ]);

//     //         // Création du profil artisan
//     //         $artisan = $user->artisan()->create([
//     //             'rccm' => $request->rccm,
//     //             'ifu' => $request->ifu,
//     //             'atelier' => $request->atelier,
//     //             'description' => $request->description,
//     //         ]);

//     //         // Stockage des fichiers
//     //         if ($request->hasFile('cni')) {
//     //             $path = $request->file('cni')->store('artisans/documents');
//     //             $artisan->update(['cni_path' => $path]);
//     //         }

//     //         if ($request->hasFile('produits')) {
//     //             $paths = [];
//     //             foreach ($request->file('produits') as $file) {
//     //                 $paths[] = $file->store('artisans/produits');
//     //             }
//     //             $artisan->update(['produits_paths' => json_encode($paths)]);
//     //         }

//     //         // Notifications
//     //         $user->sendEmailVerificationNotification();

//     //         $admins = User::where('role', 'admin')->get();
//     //         Notification::send($admins, new NewArtisanRegistration($user));

//     //         return redirect()->route('artisan.dashboard')
//     //             ->with('success', 'Votre inscription est en cours de validation!');

//     // }

//     public function storeArtisan(Request $request): RedirectResponse
//     {
//         // dd($request->all()); 
//         // Validation des données
//         $validated = $request->validate([
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//             'password' => ['required', 'confirmed', Rules\Password::defaults()],
//             'phone' => ['required', 'string', 'max:20' , 'unique:users,whatsapp'],
//             'city' => ['required', 'string', 'max:255'],
//             'categorie_id' => ['required', 'exists:categories,id'],
//             'rccm' => ['required', 'string', 'max:50'],
//             'workshop_name' => ['required', 'string', 'max:255'],
//             'description' => ['required', 'string', 'max:500'],
//             'id_file' => ['required', 'file', 'mimes:pdf,jpg,png'],
//             'rccm_file' => ['required', 'file', 'mimes:pdf,jpg,png'],
//             'ifu' => ['nullable', 'string', 'max:50'], 
//             'product_images' => ['required', 'array', 'min:3'],
//             'product_images.*' => ['image', 'mimes:jpeg,png,jpg'],
//             'agreeTerms' => ['required', 'accepted']
//         ]);

//         // Trouver la catégorie correspondante
//     $categorie = Categorie::firstOrCreate(
//         ['nom' => $validated['craft_type']],
//         [
//             'slug' => Str::slug($validated['craft_type']),
//             'icone' => 'fa-default' // Icône par défaut
//         ]
//     );
//         // Création de l'utilisateur
//         $user = User::create([
//             'name' => $validated['name'],
//             'email' => $validated['email'],
//             'password' => Hash::make($validated['password']),
//             'whatsapp' => $validated['phone'],
//             'ville' => $validated['city'],
//             'role' => 'artisan',
//             'statut' => 'en_attente'
//         ]);

//         // Traitement des fichiers
//         $idFilePath = $request->file('id_file')->store('artisans/documents');
//         $rccmFilePath = $request->file('rccm_file')->store('artisans/documents');

//         $productImages = [];
//         foreach ($request->file('product_images') as $image) {
//             $productImages[] = $image->store('artisans/products');
//         }

//         // Création du profil artisan
//         $user->artisan()->create([
//             'categorie_id' => $categorie->id, // Ajout crucial
//             'rccm' => $validated['rccm'],
//             'ifu' => $validated['ifu'] ?? null, // Gestion du nullable
//             'description' => $validated['description'],
//             'photo_profil' => $productImages[0] ?? null, // Première image comme photo de profil
//             'galerie_photos' => json_encode($productImages),
//             'cni_path' => $idFilePath,
//             'rccm_path' => $rccmFilePath
//         ]);

//         event(new Registered($user));
//         Auth::login($user);

//         return redirect()->route('gestion-dashArtisan')
//             ->with('success', 'Votre inscription artisan est en cours de validation!');
//     }
// }
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'whatsapp' => ['required', 'string', 'unique:users,whatsapp'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['sometimes', 'in:client,artisan,admin'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'client',
            'statut' => 'actif' // Ajout du statut
        ]);

        if ($user->role === 'artisan') {
            $user->artisan()->create([
                'rccm' => null,
                'description' => null,
                'photo_profil' => null,
                'galerie_photos' => null,
                'cni_path' => null,
                'rccm_path' => null,
            ]);
        }

        event(new Registered($user));
        Auth::login($user);

        if ($user->role === 'artisan') {
            return redirect()->route('gestion-dashArtisan');
        }
        return redirect()->route('acceuil');
    }

    public function storeArtisan(Request $request): RedirectResponse
    {
        // dd($request->all());
        
        \Log::debug('Données reçues:', $request->all());

        // Vérification des fichiers
        if (!$request->hasFile('id_file') || !$request->file('id_file')->isValid()) {
            return back()->withErrors(['id_file' => 'Le fichier CNI est invalide']);
        }

        if (!$request->hasFile('rccm_file') || !$request->file('rccm_file')->isValid()) {
            
            return back()->withErrors(['rccm_file' => 'Le fichier RCCM est invalide']);
        }

        // Validation des données
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20', 'unique:users,whatsapp'],
            'city' => ['required', 'string', 'max:255'],
            'categorie_id' => ['required', 'exists:categories,id'],
            'rccm' => ['required', 'string', 'max:50', 'unique:artisans,rccm'],
            'workshop_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
            'id_file' => ['required', 'file', 'mimes:pdf,jpg,png,avif'],
            'rccm_file' => ['required', 'file', 'mimes:pdf,jpg,png,avif'],
            'ifu' => ['nullable', 'string', 'max:50'],
            'product_images' => ['required', 'array', 'min:3'],
            'product_images.*' => ['image', 'mimes:jpeg,png,jpg,avif'],
            'agreeTerms' => ['required']
        ]);


        // dd($request->all());

        // Vérification de l'existence du RCCM
        if (Artisan::where('rccm', $validated['rccm'])->exists()) {
            
            return back()->withErrors(['rccm' => 'Ce RCCM est déjà enregistré']);
        }

        // Trouver la catégorie
        $categorie = Categorie::find($validated['categorie_id']);
        if (!$categorie) {
            return back()->withErrors(['categorie_id' => 'Catégorie invalide']);
        }

        // Création de l'utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'whatsapp' => $validated['phone'],
            'ville' => $validated['city'],
            'role' => 'artisan',
            'statut' => 'en_attente' // Statut pour les artisans en attente de validation
        ]);

        // Traitement des fichiers
        $idFilePath = $request->file('id_file')->store('artisans/documents');
        $rccmFilePath = $request->file('rccm_file')->store('artisans/documents');

        // $productImages = [];
        // foreach ($request->file('product_images') as $image) {
        //     $productImages[] = $image->store('artisans/products');
        // }

        $productImages = [];
        foreach ($request->file('product_images') as $image) {
            $productImages[] = $image->store('private/artisans/products');
        }

        // Création du profil artisan
        $user->artisan()->create([
            'categorie_id' => $categorie->id,
            'rccm' => $validated['rccm'],
            'ifu' => $validated['ifu'] ?? null,
            'atelier' => $validated['workshop_name'],
            'description' => $validated['description'],
            // 'photo_profil' => $productImages[0] ?? null,
            'photo_profil' => str_replace('private/', '', $productImages[0] ?? null),
            // 'galerie_photos' => json_encode($productImages),
            'galerie_photos' => json_encode(array_map(function ($path) {
                return str_replace('private/', '', $path);
            }, $productImages)),
            'cni_path' => $idFilePath,
            'rccm_path' => $rccmFilePath
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice')
            ->with('success', 'Votre inscription artisan est en cours de validation!');
    }

    
}

