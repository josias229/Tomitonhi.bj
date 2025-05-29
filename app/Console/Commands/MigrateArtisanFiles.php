<?php

namespace App\Console\Commands;

use App\Models\Artisan;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class MigrateArtisanFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-artisan-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   // Dans App\Console\Commands\MigrateImagesCommand.php
public function handle()
{
    // Migrer les photos de profil
    Artisan::chunk(200, function ($artisans) {
        foreach ($artisans as $artisan) {
            if ($artisan->photo_profil && !Str::startsWith($artisan->photo_profil, 'http')) {
                $artisan->update([
                    'photo_profil' => 'https://picsum.photos/200/200?random=' . $artisan->id
                ]);
            }
        }
    });

    // Migrer les galeries
    Artisan::whereNotNull('galerie_photos')->chunk(200, function ($artisans) {
        foreach ($artisans as $artisan) {
            $galerie = json_decode($artisan->galerie_photos, true);
            $newGalerie = array_map(fn() => 'https://picsum.photos/600/600?random=' . rand(1, 1000), $galerie);
            $artisan->update(['galerie_photos' => json_encode($newGalerie)]);
        }
    });
}
}
