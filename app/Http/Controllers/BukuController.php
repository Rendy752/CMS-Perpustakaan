<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id=auth()->user()->role;
        $id==='A'?$buku=Buku::all():$buku=Buku::where('user_id',auth()->user()->id)->get();
        $kategori=Kategori::all();
        return view('buku.index')->with('buku', $buku)->with('kategori',$kategori);
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
        $validate=$request->validate([
            'judul'=>'required|string|unique:buku',
            'deskripsi'=>'required|string',
            'jumlah' => 'required|numeric|min:1',
            'cover'=>'required|file|mimes:jpeg,jpg,png|max:1024',
            'file'=>'required|file|mimes:pdf|max:1024',
        ],[
            'cover.max'=>'The cover field must not be greater than 1 mb.',
            'file.max'=>'The file field must not be greater than 1 mb.'
        ]);

        // dd($validate['judul'].'.'.$request->cover->getClientOriginalExtension(),$validate['judul'].'.'.$request->file->getClientOriginalExtension());
        $covername=$validate['judul'].'.'.$request->cover->getClientOriginalExtension();
        // move (public), store (storage)
        $request->cover->move('foto', $covername);
        $filename=$validate['judul'].'.'.$request->file->getClientOriginalExtension();
        $request->file->move('file', $filename);

        Buku::create([
            'user_id'=>auth()->user()->id,
            'judul'=>$validate['judul'],
            'kategori_id'=>$request->kategori,
            'deskripsi'=>$validate['deskripsi'],
            'jumlah'=>$validate['jumlah'],
            'cover'=>$covername,
            'file'=>$filename
        ]);

        toastr()->success($validate['judul']." berhasil ditambahkan");
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id=Buku::find($id);
        return back()->with('update',$id)->with('kategori',kategori::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id=Buku::find($id);
        $namaAwal=$id->judul;
        // dd($request);
        $coverAwal=$id->cover;
        $fileAwal=$id->file;
        // dd($namaAwal,$id);
        $validate=$request->validate([
            // 'judul_edit'=>'required|string|unique:buku,judul',
            // 'deskripsi_edit'=>'required|string',
            // 'jumlah_edit' => 'required|numeric|min:1',
            // 'cover_edit'=>'required|file|mimes:jpeg,jpg,png|max:1024',
            // 'file_edit'=>'required|file|mimes:pdf|max:1024',
        ],[
            // 'cover_edit.max'=>'The cover field must not be greater than 1 mb.',
            // 'file_edit.max'=>'The file field must not be greater than 1 mb.'
        ]);

        if($request->judul_edit!=$namaAwal){//ada perubahan nama
            unlink(public_path().'/foto/'.$coverAwal);
            unlink(public_path().'/file/'.$fileAwal);
        }

        $covername=$request->judul_edit.'.'.$request->cover_edit->getClientOriginalExtension();
        $request->cover_edit->move('foto', $covername);
        $filename=$request->judul_edit.'.'.$request->file_edit->getClientOriginalExtension();
        $request->file_edit->move('file', $filename);

        $id->update([
            'judul'=>$request->judul_edit,
            'kategori_id'=>$request->kategori,
            'deskripsi'=>$request->deskripsi_edit,
            'jumlah'=>$request->jumlah_edit,
            'cover'=>$covername,
            'file'=>$filename
        ]);

        if($request->judul_edit!=$namaAwal){
            toastr()->success("Kategori ".$namaAwal." berhasil diupdate menjadi ".$request->judul_edit);
        } else {
            toastr()->success("Kategori ".$namaAwal." berhasil diupdate");
        }
        return back();
    }

    public function delete($id)
    {
        $id=Buku::find($id);
        return back()->with('delete',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        unlink(public_path().'/foto/'.$buku->cover);
        unlink(public_path().'/file/'.$buku->file);
        $buku->delete();

        toastr()->success("Buku $buku->judul berhasil dihapus");
        return back();
    }
}
