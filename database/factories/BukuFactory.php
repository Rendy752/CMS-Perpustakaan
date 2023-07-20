<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=faker::create();
        $judul=$faker->word();
        return [
            "judul"=>$judul,
            "kategori"=>$faker->randomElement(["Novel","Majalah","Kamus","Ensiklopedia","Komik","Manga","Biografi"]),
            "deskripsi"=>$faker->text(150),
            "jumlah"=>$faker->numberBetween(1,100),
            "file"=>$judul.".pdf",
            "cover"=>$judul.$faker->randomElement([".jpeg",".jpg",".png"]),
        ];
    }
}
