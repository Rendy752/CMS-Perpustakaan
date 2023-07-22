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
                                <h2 class="fw-bold mb-2 text-uppercase mb-4">Edit Categories</h2>
                                <form action="kategori/update/{{ session('update')->id }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="nama_edit" class="form-control form-control-lg"
                                            placeholder="Kategori" value="{{ session('update')->nama }}" required />
                                        @error('nama_edit')
                                            <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-outline-light btn-warning btn-lg px-5 mt-4 shadow" type="submit">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>