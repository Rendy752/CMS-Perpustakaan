<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(){
        $data['kategori']=Kategori::all()->count();
        $data['buku']=Buku::all()->count();
        $data['user']=User::all()->count();
        $data['max_buku']=DB::select('SELECT COUNT(buku.id) AS max_buku FROM kategori JOIN buku ON kategori.id=buku.kategori_id GROUP BY kategori.id ORDER BY COUNT(buku.id) DESC LIMIT 1;');
        $data['bukuKategori']=DB::select('SELECT k.nama AS nama_kategori, COUNT(b.id) AS jumlah_buku FROM kategori k JOIN buku b ON k.id = b.kategori_id GROUP BY k.nama;');
        $data['bukuUser']=DB::select('SELECT u.name AS nama_user, COUNT(b.id) AS jumlah_buku FROM users u JOIN buku b ON u.id = b.user_id GROUP BY u.id;');
        // dd($data);
        return view('dashboard', $data);
    }
}
