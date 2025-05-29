<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\User;
use App\Models\Artisan;
use App\Models\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class ArtisansTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('fr_FR');
        $categories = Categorie::all();

        $artisans = [
            [
                'name' => 'Artisan Bois '.rand(100,999),
                'email' => 'artisan.bois.'.rand(100,999).'@artisan.com',
                'phone' => '6'.rand(10000000,99999999),
                'city' => 'Cotonou',
                'workshop_name' => 'Atelier Bois Sacré',
                'description' => 'Sculptures traditionnelles en bois de qualité',
                'categorie_slug' => 'artisanat-metiers-dart',
                'products' => [
                    ['Statue en bois d\'ébène', 25000],
                    ['Masque traditionnel', 18000],
                    ['Sculpture d\'animal', 32000]
                ]
            ],
            [
                'name' => 'Tissus Africains '.rand(100,999),
                'email' => 'tissus.africains.'.rand(100,999).'@artisan.com',
                'phone' => '6'.rand(10000000,99999999),
                'city' => 'Porto-Novo',
                'workshop_name' => 'Tissages Traditionnels',
                'description' => 'Fabrication de tissus bogolan et vêtements sur mesure',
                'categorie_slug' => 'mode-habillement',
                'products' => [
                    ['Boubou traditionnel', 15000],
                    ['Pagne bogolan', 8000],
                    ['Robe africaine', 12000]
                ]
            ],
            [
                'name' => 'Savonnerie Naturelle '.rand(100,999),
                'email' => 'savon.naturel.'.rand(100,999).'@artisan.com',
                'phone' => '6'.rand(10000000,99999999),
                'city' => 'Ouidah',
                'workshop_name' => 'Savons du Bénin',
                'description' => 'Savons artisanaux à base de karité et plantes locales',
                'categorie_slug' => 'cosmetiques-bien-etre',
                'products' => [
                    ['Savon au karité', 1500],
                    ['Savon au miel', 1800],
                    ['Savon exfoliant', 2000]
                ]
            ],
            [
                'name' => 'Vannerie Traditionnelle '.rand(100,999),
                'email' => 'vannerie.'.rand(100,999).'@artisan.com',
                'phone' => '6'.rand(10000000,99999999),
                'city' => 'Abomey',
                'workshop_name' => 'Vannerie d\'Abomey',
                'description' => 'Objets tressés en fibres naturelles',
                'categorie_slug' => 'articles-menagers-artisanaux',
                'products' => [
                    ['Panier de marché', 5000],
                    ['Corbeille à fruits', 3500],
                    ['Sous-plat tressé', 2500]
                ]
            ],
            [
                'name' => 'Bijoux Ethniques '.rand(100,999),
                'email' => 'bijoux.'.rand(100,999).'@artisan.com',
                'phone' => '6'.rand(10000000,99999999),
                'city' => 'Parakou',
                'workshop_name' => 'Bijoux du Nord',
                'description' => 'Bijoux en argent et perles fabriqués à la main',
                'categorie_slug' => 'objets-art-decoration',
                'products' => [
                    ['Collier en perles', 7500],
                    ['Bracelet en argent', 12000],
                    ['Boucles d\'oreilles', 6000]
                ]
            ]
        ];

        foreach ($artisans as $artisanData) {
            try {
                // Création de l'utilisateur
                $user = User::create([
                    'name' => $artisanData['name'],
                    'email' => $artisanData['email'],
                    'password' => Hash::make('Password123!'),
                    'telephone' => $artisanData['phone'],
                    'whatsapp' => $artisanData['phone'],
                    'adresse' => $faker->address,
                    'ville' => $artisanData['city'],
                    'type_compte' => 'professionnel',
                    'role' => 'artisan',
                    'statut' => 'actif',
                    'email_verified_at' => now()
                ]);

                // Création du profil artisan via la relation
                $categorie = $categories->where('slug', $artisanData['categorie_slug'])->first();
                
                $artisan = $user->artisan()->create([
                    'categorie_id' => $categorie->id,
                    'rccm' => 'RB/'.strtoupper(substr($artisanData['city'], 0, 2)).'/2023/'.rand(100,999),
                    'ifu' => rand(100000000,999999999),
                    'description' => $artisanData['description'],
                    'photo_profil' => 'https://picsum.photos/id/'.rand(1,1000).'/600/600',
                    'galerie_photos' => json_encode([
                        'https://picsum.photos/id/'.rand(1001,2000).'/600/400',
                        'https://picsum.photos/id/'.rand(2001,3000).'/600/400'
                    ]),
                    'est_verifie' => true,
                    'verifie_le' => now()
                ]);

                // Création des produits via la relation artisan->produits()
                foreach ($artisanData['products'] as $product) {
                    $artisan->produits()->create([
                        'categorie_id' => $categorie->id,
                        'nom' => $product[0],
                        'description' => $faker->paragraph(2),
                        'prix' => $product[1],
                        'stock' => rand(5, 50),
                        'slug' => strtolower(str_replace(' ', '-', $product[0])).'-'.rand(100,999),
                        'est_actif' => true
                    ]);
                }

            } catch (\Exception $e) {
                $this->command->error("Erreur création artisan: ".$e->getMessage());
                continue;
            }
        }

        $this->command->info(count($artisans).' artisans et leurs produits créés avec succès!');
    }
}