<?php

namespace Database\Factories;

use App\Models\Famille;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Utilisation de Factory pour générer des articles 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Définition des valeurs générées automatiquement pour un article
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Génération du prix HT entre 1000 et 10 000 F
        $prixHt = $this->faker->numberBetween(1000, 10000);
        $prixAchat = $this->faker->numberBetween(500, $prixHt - 1);

        return [
            'nom' => $this->faker->word(),
            'prix_ht' => $prixHt,
            'prix_achat' => $prixAchat,
            'taux_tgc' => $this->faker->randomElement([3, 6, 11, 22]),
            'famille_id' => Famille::inRandomOrder()->first()->id,
        ];
    }
}
