<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['nom' => 'Sculpture sur bois', 'icone' => 'fa-hammer', 'slug' => 'sculpture-sur-bois'],
            ['nom' => 'Textile traditionnel', 'icone' => 'fa-tshirt', 'slug' => 'textile-traditionnel'],
            ['nom' => 'Vannerie', 'icone' => 'fa-basketball-ball', 'slug' => 'vannerie'],
            ['nom' => 'Poterie', 'icone' => 'fa-mortar-pestle', 'slug' => 'poterie'],
            ['nom' => 'Bijouterie', 'icone' => 'fa-gem', 'slug' => 'bijouterie'],
            ['nom' => 'Artisanat en cuir', 'icone' => 'fa-leather', 'slug' => 'artisanat-en-cuir'],
            ['nom' => 'Produits agricoles locaux', 'icone' => 'fa-apple-alt', 'slug' => 'produits-agricoles-locaux'],
            ['nom' => 'Épices locales', 'icone' => 'fa-pepper-hot', 'slug' => 'epices-locales'],
            ['nom' => 'Savonnerie artisanale', 'icone' => 'fa-soap', 'slug' => 'savonnerie-artisanale'],
            ['nom' => 'Cosmétiques traditionnels', 'icone' => 'fa-spa', 'slug' => 'cosmetiques-traditionnels'],
            ['nom' => 'Meubles artisanaux', 'icone' => 'fa-couch', 'slug' => 'meubles-artisanaux'],
            ['nom' => 'Décorations et objets d\'art', 'icone' => 'fa-paint-brush', 'slug' => 'decorations-et-objets-art'],
            ['nom' => 'Produits alimentaires locaux transformés', 'icone' => 'fa-utensils', 'slug' => 'produits-alimentaires-locaux-transformes'],
            ['nom' => 'Textiles et vêtements modernes produits localement', 'icone' => 'fa-tshirt', 'slug' => 'textiles-et-vetements-modernes-produits-localement'],
            ['nom' => 'Produits en métal forgé', 'icone' => 'fa-tools', 'slug' => 'produits-en-metal-forge'],
            ['nom' => 'Jouets artisanaux', 'icone' => 'fa-car', 'slug' => 'jouets-artisanaux'],
        ];
    
        foreach ($categories as $category) {
            Categorie::create([
                'nom' => $category['nom'],
                'icone' => $category['icone'],
                'slug' => $category['slug'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    
}
