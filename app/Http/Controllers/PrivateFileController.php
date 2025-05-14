<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PrivateFileController extends Controller
{
    public function show($path)
    {
        $filePath = storage_path('app/private/'.$path);
        
        if (!file_exists($filePath)) {
            abort(404);
        }
    
        return response()->file($filePath);
    }

    protected function authorizeAccess(string $path): bool
    {
        // 1. Vérification de base d'authentification
        if (!auth()->check()) {
            return false;
        }

        $user = auth()->user();

        // 2. Accès complet pour les admins
        if ($user->role === 'admin') {
            return true;
        }

        // 3. Extraction du type de fichier et de l'ID à partir du chemin
        $pathParts = explode('/', $path);
        if (count($pathParts) < 3) {
            return false;
        }

        $fileType = $pathParts[1]; // 'documents' ou 'products'
        $filename = last($pathParts);

        // 4. Vérification pour les artisans
        if ($user->role === 'artisan') {
            $artisan = $user->artisanProfile;

            if (!$artisan) {
                return false;
            }

            // Vérification selon le type de fichier
            switch ($fileType) {
                case 'products':
                    // Pour les photos de produits, vérifier qu'elles appartiennent à la galerie de l'artisan
                    $galleryPhotos = json_decode($artisan->galerie_photos ?? '[]', true);
                    return in_array($path, $galleryPhotos) || $path === $artisan->photo_profil;

                case 'documents':
                    // Pour les documents, vérifier les chemins stockés
                    return $path === $artisan->cni_path || $path === $artisan->rccm_path;

                default:
                    return false;
            }
        }

        // 5. Vérification pour les clients (si nécessaire)
        if ($user->role === 'client') {
            // Ici vous pouvez implémenter une logique si les clients ont accès à certaines images
            // Par exemple, pour voir les photos produits des artisans
            return $fileType === 'products';
        }

        return false;
    }
}
