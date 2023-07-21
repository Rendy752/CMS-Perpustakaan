<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
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
        $user=User::pluck('id')->toArray();
        $kategori=Kategori::pluck('id')->toArray();
        return [
            "user_id"=>$faker->randomElement($user),
            "judul"=>$judul,
            "kategori_id"=>$faker->randomElement($kategori),
            "deskripsi"=>$faker->text(150),
            "jumlah"=>$faker->numberBetween(1,100),
            "file"=>$judul.".pdf",
            "cover"=>$judul.$faker->randomElement([".jpeg",".jpg",".png"]),
        ];
    }
}
