<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Famille>
 */
class FamilleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //Définition des catégories réalistes
        $categories = ['Multimédia', 'Alimentaire', 'Vêtements', 'Mobilier', 'Sport', 'Animaux', 'Boissons'];
        return [
            'nom' => $this->faker->unique()->randomElement($categories),
        ];
    }
}
