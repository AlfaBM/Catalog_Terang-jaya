<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\catalog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catalog>
 */
class CatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gambar' => null,
            'nama' => fake()->name(),
            'deskripsi' => fake()->paragraph(),
            'ukuran' => fake()->bothify('##-??'),
            'harga' => fake()->bothify('RP.###.###'),
            'produsen' => fake()->company(),
            'category_id' => '63bb8015b0aed6c765d224b7'

        ];
    }
}
