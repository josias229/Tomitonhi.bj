<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestStorage extends Command
{
    protected $signature = 'test:storage';
    protected $description = 'Test the storage system';

    public function handle()
    {
        try {
            Storage::disk('public')->put('test.txt', 'Test content from command');
            $this->info('✅ Fichier créé avec succès dans storage/app/public/test.txt');
            
            $url = asset('storage/test.txt');
            $this->line("🖥️ Accédez au fichier via: $url");
        } catch (\Exception $e) {
            $this->error('❌ Erreur: ' . $e->getMessage());
        }
    }
}