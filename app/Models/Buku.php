<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory,HasUuids;
    protected $table="Buku";
    protected $fillable=["judul","kategori","deskripsi","jumlah","file","cover"];
}
