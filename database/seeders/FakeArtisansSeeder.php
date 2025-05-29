<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakeArtisansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Categorie::all();
        
        $artisans = [
            [
                'name' => 'Jean Koffi '.rand(100,999),
                'email' => 'jean.koffi'.rand(100,999).'@artisan.com',
                'phone' => '+2296'.rand(10000000,99999999),
                'city' => 'Cotonou',
                'rccm' => 'RB/COT/2023/'.rand(100,999),
                'workshop_name' => 'Atelier Bois Sacré',
                'description' => 'Spécialiste en sculpture sur bois depuis 15 ans',
                'ifu' => 'IFU'.rand(100000000,999999999),
                'categorie_id' => $categories->where('slug', 'sculpture-sur-bois')->first()->id,
                'password' => 'Password123!'
            ],
            [
                'name' => 'Amina Ouedraogo '.rand(100,999),
                'email' => 'amina.ouedraogo'.rand(100,999).'@artisan.com',
                'phone' => '+2296'.rand(10000000,99999999),
                'city' => 'Porto-Novo',
                'rccm' => 'RB/PN/2023/'.rand(100,999),
                'workshop_name' => 'Tissages Africains',
                'description' => 'Création de textiles traditionnels et vêtements sur mesure',
                'ifu' => 'IFU'.rand(100000000,999999999),
                'categorie_id' => $categories->where('slug', 'textile-traditionnel')->first()->id,
                'password' => 'Password123!'
            ],
            [
                'name' => 'Komlan Gbédji '.rand(100,999),
                'email' => 'komlan.gbedji'.rand(100,999).'@artisan.com',
                'phone' => '+2296'.rand(10000000,99999999),
                'city' => 'Abomey-Calavi',
                'rccm' => 'RB/AC/2023/'.rand(100,999),
                'workshop_name' => 'Vannerie du Bénin',
                'description' => 'Fabrication artisanale de paniers et objets en vannerie',
                'ifu' => null,
                'categorie_id' => $categories->where('slug', 'vannerie')->first()->id,
                'password' => 'Password123!'
            ],
            [
                'name' => 'Fatou Diop '.rand(100,999),
                'email' => 'fatou.diop'.rand(100,999).'@artisan.com',
                'phone' => '+2296'.rand(10000000,99999999),
                'city' => 'Ouidah',
                'rccm' => 'RB/OU/2023/'.rand(100,999),
                'workshop_name' => 'Bijoux Ancestraux',
                'description' => 'Création de bijoux traditionnels en argent et perles',
                'ifu' => 'IFU'.rand(100000000,999999999),
                'categorie_id' => $categories->where('slug', 'bijouterie')->first()->id,
                'password' => 'Password123!'
            ],
            [
                'name' => 'Yao Adjo '.rand(100,999),
                'email' => 'yao.adjo'.rand(100,999).'@artisan.com',
                'phone' => '+2296'.rand(10000000,99999999),
                'city' => 'Parakou',
                'rccm' => 'RB/PK/2023/'.rand(100,999),
                'workshop_name' => 'Savons Naturels',
                'description' => 'Fabrication de savons artisanaux à base de produits locaux',
                'ifu' => 'IFU'.rand(100000000,999999999),
                'categorie_id' => $categories->where('slug', 'savonnerie-artisanale')->first()->id,
                'password' => 'Password123!'
            ]
        ];

        foreach ($artisans as $artisanData) {
            $profileImage = "https://picsum.photos/id/".rand(1,1000)."/600/600";
            $galleryImages = json_encode([
                "https://picsum.photos/id/".rand(1001,2000)."/600/400",
                "https://picsum.photos/id/".rand(2001,3000)."/600/400",
                "https://picsum.photos/id/".rand(3001,4000)."/600/400"
            ]);

            $user = User::create([
                'name' => $artisanData['name'],
                'email' => $artisanData['email'],
                'whatsapp' => $artisanData['phone'],
                'ville' => $artisanData['city'],
                'password' => Hash::make($artisanData['password']),
                'role' => 'artisan',
                'statut' => 'actif',
                'email_verified_at' => now()
            ]);

            $user->artisan()->create([
                'categorie_id' => $artisanData['categorie_id'],
                'rccm' => $artisanData['rccm'],
                'ifu' => $artisanData['ifu'],
                'description' => $artisanData['description'],
                'photo_profil' => $profileImage,
                'galerie_photos' => $galleryImages,
                'cni_path' => 'https://picsum.photos/id/'.rand(4001,5000).'/600/400',
                'rccm_path' => 'https://picsum.photos/id/'.rand(5001,6000).'/600/400'
            ]);
        }

        $this->command->info('5 artisans fictifs créés avec succès!');
    }
}
