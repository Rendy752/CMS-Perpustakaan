<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => 'user1234',
            'role' => 'A'
        ]);

        $kategori=["Novel","Majalah","Kamus","Ensiklopedia","Komik","Manga","Biografi"];
        for ($x = 0; $x < sizeof($kategori); $x++) {
            Kategori::create(['nama'=>$kategori[$x]]);
        }

        Buku::factory()->count(20)->create();
    }
}
