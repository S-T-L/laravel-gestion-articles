<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Famille;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Création de 5 familles d'articles
        Famille::factory(5)->create();
        //Création de 50 articles
        Article::factory(50)->create();
    }
}
