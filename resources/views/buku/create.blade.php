<div class="modal fade" role="dialog" id="add" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1.5rem;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-primary text-dark" style="border-radius: 1rem;">
                        <button class="btn-close btn-close-white ms-auto p-4 " aria-label="Close"
                            data-bs-dismiss="modal"></button>
                        <div class="card-body px-5 pb-2 text-center">
                            <div class="mb-md-5 mt-md-4">
                                <h2 class="fw-bold mb-2 text-uppercase mb-4">Add Book</h2>
                                <form action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline form-white mb-4">
                                        <div class="form-floating mb-3">
                                            <input class="form-control mt-3" name="judul" type="text" placeholder="Judul" value="{{old('judul')}}" required/>
                                            <label>Judul</label>
                                            @error('judul')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-form-label mt-3 col-4"><h5>Kategori :</h5></label>
                                            <div class="col-8">
                                                <select name="kategori" class="h-100 col-md-12 rounded form-select">
                                                    @foreach($kategori as $data)
                                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control mt-3" name="deskripsi" rows="5" cols="50" placeholder="Deskripsi" required>{{old('deskripsi')}}</textarea>
                                            <label>Deskripsi</label>
                                            @error('deskripsi')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control mt-3" name="jumlah" type="number" placeholder="Jumlah" value="{{old('jumlah')}}" min="1" required/>
                                            <label>Jumlah</label>
                                            @error('jumlah')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-form-label mt-3 col-4"><h5>Cover :</h5></label>
                                            <div class="col-8">
                                                <input type="file" name="cover" class="form-control form-control-lg mt-3"
                                                    placeholder="Cover" required />
                                            </div>
                                            @error('cover')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-form-label mt-3 col-4"><h5>File :</h5></label>
                                            <div class="col-8">
                                                <input type="file" name="file" class="form-control form-control-lg mt-3"
                                                    placeholder="File" required />
                                            </div>
                                            @error('file')
                                            <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center gap-5">
                                        <button class="btn btn-outline-light btn-danger btn-lg px-5 mt-4 shadow col-5" type="reset">Reset</button>
                                        <button class="btn btn-outline-light btn-success btn-lg px-5 mt-4 shadow col-5" type="submit">Add</button>
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
