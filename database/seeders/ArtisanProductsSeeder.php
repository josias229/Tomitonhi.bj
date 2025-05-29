<?php

namespace Database\Seeders;

use App\Models\Artisan;
use App\Models\Produit;
use App\Models\ProduitPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ArtisanProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupère tous les artisans
        $artisans = Artisan::with('categorie')->get();

        foreach ($artisans as $artisan) {
            // Détermine le nombre de produits à créer (entre 5 et 8)
            $productCount = rand(5, 8);

            // Crée les produits selon la catégorie de l'artisan
            for ($i = 1; $i <= $productCount; $i++) {
                $productData = $this->generateProductData($artisan->categorie->nom, $i);

                $produit = Produit::create([
                    'nom' => $productData['nom'],
                    'prix' => $productData['prix'],
                    'stock' => rand(5, 50),
                    'description' => $productData['description'],
                    'categorie_id' => $artisan->categorie_id,
                    'artisan_id' => $artisan->user_id,
                    'slug' => Str::slug($productData['nom']) . '-' . uniqid(),
                    'prix_promo' => rand(0, 1) ? $productData['prix'] * 0.8 : null, // 20% de promo aléatoire
                    'est_actif' => true,
                ]);

                // Ajoute 1 à 3 images aléatoires pour chaque produit
                $this->addProductPhotos($produit, $artisan->user_id);
            }
        }

        $this->command->info(count($artisans) . ' artisans ont reçu entre 5 et 8 produits chacun.');
    }

    /**
     * Génère des données de produit selon la catégorie
     */
    private function generateProductData(string $categorie, int $index): array
    {
        $productsByCategory = [
            'Sculpture sur bois' => [
                'nom' => ['Statue traditionnelle', 'Masque tribal', 'Sculpture murale', 'Meuble sculpté', 'Animal en bois'],
                'description' => 'Pièce unique sculptée à la main par nos artisans'
            ],
            'Textile traditionnel' => [
                'nom' => ['Boubou traditionnel', 'Pagne tissé', 'Écharpe artisanale', 'Rideaux tissés', 'Nappe en tissu local'],
                'description' => 'Textile fabriqué selon les méthodes traditionnelles'
            ],
            'Vannerie' => [
                'nom' => ['Panier traditionnel', 'Corbeille tressée', 'Sous-verre en raphia', 'Chapeau de paille', 'Sac en fibres naturelles'],
                'description' => 'Outil artisanal fabriqué avec des matériaux locaux'
            ],
            'Bijouterie' => [
                'nom' => ['Collier en perles', 'Bracelet en argent', 'Boucles d\'oreilles', 'Bague artisanale', 'Pendentif traditionnel'],
                'description' => 'Bijou fabriqué à la main avec des matériaux nobles'
            ],
            'Savonnerie artisanale' => [
                'nom' => ['Savon au karité', 'Savon parfumé', 'Savon exfoliant', 'Savon médicinal', 'Savon végétal'],
                'description' => 'Savon naturel fabriqué selon des recettes traditionnelles'
            ]
        ];

        // Catégorie par défaut si non trouvée
        $defaultCategory = [
            'nom' => ['Produit artisanal', 'Création locale', 'Objet traditionnel', 'Article fait main', 'Pièce unique'],
            'description' => 'Produit artisanal de qualité'
        ];

        $categoryProducts = $productsByCategory[$categorie] ?? $defaultCategory;

        return [
            'nom' => $categoryProducts['nom'][array_rand($categoryProducts['nom'])] . ' ' . $index,
            'prix' => rand(1000, 20000),
            'description' => $categoryProducts['description']
        ];
    }

    /**
     * Ajoute des photos aléatoires à un produit
     */
    private function addProductPhotos(Produit $produit, int $artisanId): void
    {
        $photoCount = rand(1, 3); // Entre 1 et 3 photos par produit

        for ($i = 0; $i < $photoCount; $i++) {
            // Utilisation d'images placeholder (remplacez par vos propres images si nécessaire)
            $imageUrl = "https://picsum.photos/id/" . rand(1, 1000) . "/800/600";

            ProduitPhoto::create([
                'produit_id' => $produit->id,
                'url' => $imageUrl,
                'ordre' => $i + 1
            ]);
        }
    }
}
