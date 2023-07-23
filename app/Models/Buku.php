<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory,HasUuids;
    protected $table="Buku";
    protected $fillable=["user_id","judul","kategori_id","deskripsi","jumlah","file","cover"];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id');
    }
}
