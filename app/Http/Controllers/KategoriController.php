<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori=Kategori::all();
        return view('kategori.index')->with('kategori',$kategori);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nama"=>"required|string|unique:kategori",
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        toastr()->success("$request->nama berhasil ditambahkan");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id=Kategori::find($id);
        return back()->with('update',$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $id)
    {
        $validate=$request->validate([
            "nama_edit"=>"required|string|unique:kategori,nama",
        ]);
        // dd($id);
        $namaAwal=$id->nama;
        $id->update(['nama' => $request->nama_edit]);

        toastr()->success("Kategori ".$namaAwal." berhasil diupdate menjadi ".$validate['nama_edit']);
        return back();
    }

    public function delete($id)
    {
        $id=Kategori::find($id);
        return back()->with('delete',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nama=Kategori::find($id)->nama;
        Kategori::find($id)->delete();

        toastr()->success("Kategori $nama berhasil dihapus");
        return back();
    }
}
