<div class="modal fade" role="dialog" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1.5rem;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-primary text-dark" style="border-radius: 1rem;">
                        <button class="btn-close btn-close-white ms-auto p-4 " aria-label="Close"
                            data-bs-dismiss="modal"></button>
                        <div class="card-body px-5 pb-2 text-center">
                            <div class="mb-md-5 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase mb-4">Update Book</h2>
                                {{-- {{ dd(session('update')) }} --}}
                                <form action="{{route('buku.update', session('update'))}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')
                                    <div class="form-outline form-white mb-4">
                                        <div class="form-floating mb-3">
                                            <input class="form-control mt-3" name="judul_edit" type="text" placeholder="Judul" value="{{ session('update')->judul }}" required/>
                                            <label>Judul</label>
                                            @error('judul_edit')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-form-label mt-3 col-4"><h5>Kategori :</h5></label>
                                            <div class="col-8">
                                                <select name="kategori" class="h-100 col-md-12 rounded form-select">
                                                    @foreach ($kategori as $data)
                                                    <option @if(session('update')->kategori_id==$data->id) selected @endif value="{{$data->id}}">{{$data->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control mt-3" name="deskripsi_edit" rows="5" cols="50" placeholder="Deskripsi" required>{{ session('update')->deskripsi }}</textarea>
                                            <label>Deskripsi</label>
                                            @error('deskripsi_edit')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control mt-3" name="jumlah_edit" type="number" placeholder="Jumlah" value="{{ session('update')->jumlah }}" min="1" required/>
                                            <label>Jumlah</label>
                                            @error('jumlah_edit')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img src="{{asset('foto/'.session('update')->cover)}}" class="rounded shadow border border-dark"style="width: auto; height: 15rem;">
                                        <div class="row mb-3">
                                            <label class="col-form-label mt-3 col-4"><h5>Cover :</h5></label>
                                            <div class="col-8">
                                                <input type="file" name="cover_edit" class="form-control form-control-lg mt-3"
                                                    placeholder="Cover" required />
                                            </div>
                                            @error('cover_edit')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <a href="{{asset('file/'.session('update')->file)}}" target="_blank" class="text-warning" style="width: 2rem; height: 2rem;" download="{{ session('update')->file }}">Current file -> {{ session('update')->file }}</a>
                                        <div class="row mb-3">
                                            <label class="col-form-label mt-3 col-4"><h5>File :</h5></label>
                                            <div class="col-8">
                                                <input type="file" name="file_edit" class="form-control form-control-lg mt-3"
                                                    placeholder="File" required />
                                            </div>
                                            @error('file_edit')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center gap-5">
                                        <button class="btn btn-outline-light btn-danger btn-lg px-5 mt-4 shadow col-5" type="reset">Reset</button>
                                        <button class="btn btn-outline-light btn-warning btn-lg px-5 mt-4 shadow col-5" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @extends('master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="card bg-primary text-dark" style="border-radius: 1rem;">
                    <button class="btn-close btn-close-white ms-auto p-4 " aria-label="Close"
                        data-bs-dismiss="modal"></button>
                    <div class="card-body px-5 pb-2 text-center">
                        <div class="mb-md-5 mt-md-4">
                            <h2 class="fw-bold mb-2 text-uppercase mb-4">Update Book</h2>
                            <form action="buku/update/{{ $id->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-outline form-white mb-4">
                                    <div class="form-floating mb-3">
                                        <input class="form-control mt-3" name="judul_edit" type="text" placeholder="Judul" value="{{ $id->judul }}" required/>
                                        <label>Judul</label>
                                        @error('judul_edit')
                                        <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-form-label mt-3 col-4"><h5>Kategori :</h5></label>
                                        <div class="col-8">
                                            <select name="kategori" class="h-100 col-md-12 rounded form-select">
                                                @foreach ($kategori as $data)
                                                <option @if($id->kategori_id==$data->id) selected @endif value="{{$data->id}}">{{$data->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control mt-3" name="deskripsi_edit" rows="5" cols="50" placeholder="Deskripsi" required>{{ $id->deskripsi }}</textarea>
                                        <label>Deskripsi</label>
                                        @error('deskripsi_edit')
                                        <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control mt-3" name="jumlah_edit" type="number" placeholder="Jumlah" value="{{ $id->jumlah }}" min="1" required/>
                                        <label>Jumlah</label>
                                        @error('jumlah_edit')
                                        <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-form-label mt-3 col-4"><h5>Cover :</h5></label>
                                        <div class="col-8">
                                            <input type="file" name="cover_edit" class="form-control form-control-lg mt-3"
                                                placeholder="Cover" required />
                                        </div>
                                        @error('cover_edit')
                                        <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-form-label mt-3 col-4"><h5>File :</h5></label>
                                        <div class="col-8">
                                            <input type="file" name="file_edit" class="form-control form-control-lg mt-3"
                                                placeholder="File" required />
                                        </div>
                                        @error('file_edit')
                                        <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center gap-5">
                                    <button class="btn btn-outline-light btn-danger btn-lg px-5 mt-4 shadow col-5" type="reset">Reset</button>
                                    <button class="btn btn-outline-light btn-warning btn-lg px-5 mt-4 shadow col-5" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}
