<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ["Novel","Majalah","Kamus","Ensiklopedia","Komik","Manga","Biografi"]

        return [
            ['nama' => 'Novel'],
            ['nama' => 'Majalah'],
            ['nama' => 'Kamus'],
            ['nama' => 'Ensiklopedia'],
            ['nama' => 'Komik'],
            ['nama' => 'Manga'],
            ['nama' => 'Biografi'],
        ];
    }
}
