<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("judul");
            $table->enum("kategori",["Novel","Majalah","Kamus","Ensiklopedia","Komik","Manga","Biografi"]);
            $table->string("deskripsi");
            $table->integer("jumlah");
            $table->string("file");
            $table->string("cover");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
