<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Input\Input;

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
    public function show($buku)
    {
        $id=auth()->user()->role;
        // $buku=Buku::where('kategori_id',$buku)->get();
        
        $id==='A'?$buku=Buku::all()->where('kategori_id',$buku):$buku=Buku::where('user_id',auth()->user()->id)->where('kategori_id',$buku)->get();
        // dd($buku);
        // dd($kategori);
        return view('buku.index')->with('buku',$buku)->with('kategori',kategori::all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        if(auth()->user()->role==='U'&&auth()->user()->id!=$buku->user_id){
            abort(403);
        }
        return back()->with('update',$buku)->with('kategori',kategori::all());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Buku $buku)
    {
        if(auth()->user()->role==='U'&&auth()->user()->id!=$buku->user_id){
            abort(403);
        }
        // dd($request,$buku);
        $namaAwal=$buku->judul;
        // dd($request);
        $coverAwal=$buku->cover;
        $fileAwal=$buku->file;
        // dd($namaAwal,$id,$request->cover_edit);
        $validate=$request->validate([
            'judul_edit'=>'required|string|unique:buku,judul,'.$buku->id,
            'deskripsi_edit'=>'required|string',
            'jumlah_edit' => 'required|numeric|min:1',
            'cover_edit'=>'file|mimes:jpeg,jpg,png|max:1024',
            'file_edit'=>'file|mimes:pdf|max:1024',
        ],[
            back()->with('update',$buku),
            'cover_edit.max'=>'The cover field must not be greater than 1 mb.',
            'file_edit.max'=>'The file field must not be greater than 1 mb.'
        ]);

        // $file = Input::file('upfile')->getClientOriginalName();
        // dd(pathinfo(Input::file('foto')->getClientOriginalName(), $namaAwal));
        // dd(pathinfo('/foto/'.$namaAwal,PATHINFO_FILENAME));
        // dd(pathinfo(public_path().'/foto/'.$buku->cover));
        if($validate['judul_edit']!=$namaAwal){//ada perubahan nama
            // $locateCover=$namaAwal.".".pathinfo('/foto/'.$namaAwal)['extension'];
            // $locateFile=$namaAwal.".".pathinfo('/file/'.$namaAwal)['extension'];
            $renameCover=$validate['judul_edit'].".".pathinfo('/foto/'.$buku->cover)['extension'];
            $renameFile=$validate['judul_edit'].".".pathinfo('/file/'.$buku->file)['extension'];
            // dd($renameCover.$renameFile);
            $covername=$renameCover;
            $filename=$renameFile;
            // dd($covername);
            rename(public_path().'/foto/'.$buku->cover, public_path().'/foto/'.$renameCover);
            rename(public_path('/file/'.$buku->file), public_path('/file/'.$renameFile));
        }

        if($request->cover_edit){
            unlink(public_path().'/foto/'.$coverAwal);
            $covername=$validate['judul_edit'].'.'.$validate['cover_edit']->getClientOriginalExtension();
            $validate['cover_edit']->move('foto', $covername);
        } else {
            $covername=$coverAwal;
        }
        
        if($request->file_edit){
            unlink(public_path().'/file/'.$fileAwal);
            $filename=$validate['judul_edit'].'.'.$validate['file_edit']->getClientOriginalExtension();
            $validate['file_edit']->move('file', $filename);
        } else {
            $filename=$fileAwal;
        }

        $buku->update([
            'judul'=>$validate['judul_edit'],
            'kategori_id'=>$request->kategori,
            'deskripsi'=>$validate['deskripsi_edit'],
            'jumlah'=>$validate['jumlah_edit'],
            'cover'=>$covername,
            'file'=>$filename
        ]);

        if($validate['judul_edit']!=$namaAwal){
            toastr()->success("Kategori ".$namaAwal." berhasil diupdate menjadi ".$validate['judul_edit']);
        } else {
            toastr()->success("Kategori ".$namaAwal." berhasil diupdate");
        }
        return redirect('buku');
    }

    public function delete($id)
    {
        $id=Buku::find($id);
        if(auth()->user()->role==='U'&&auth()->user()->id!=$id->user_id){
            abort(403);
        }
        return back()->with('delete',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if(auth()->user()->role==='U'&&auth()->user()->id!=$buku->user_id){
            abort(403);
        }
        unlink(public_path().'/foto/'.$buku->cover);
        unlink(public_path().'/file/'.$buku->file);
        $buku->delete();

        toastr()->success("Buku $buku->judul berhasil dihapus");
        return back();
    }
}
