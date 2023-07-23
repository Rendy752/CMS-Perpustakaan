<div class="modal fade" role="dialog" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1.5rem;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-primary text-dark" style="border-radius: 1rem;">
                        <button class="btn-close btn-close-white ms-auto p-4 " aria-label="Close"
                            data-bs-dismiss="modal"></button>
                        <div class="card-body px-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-2">
                                <h2 class="fw-bold mb-2 text-uppercase mb-4 text-danger">Delete Book</h2>
                                <form method="POST" action="{{route('buku.destroy', session('delete'))}}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-outline form-white mb-4">
                                        <h3>Are you sure want to delete {{ session('delete')->judul }} ?</h3>
                                    </div>
                                    <div>
                                        <button class="btn btn-outline-light btn-secondary btn-lg px-5 mt-4 shadow me-3" data-bs-dismiss="modal">Cancel</button>
                                        <button class="btn btn-outline-light btn-danger btn-lg px-5 mt-4 shadow" type="submit">Delete</button>
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
