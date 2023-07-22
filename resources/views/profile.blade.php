<div class="modal fade" role="dialog" id="profil" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 1.5rem;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <button class="btn-close btn-close-white ms-auto p-4 " aria-label="Close" data-bs-dismiss="modal"></button>
                        <div class="card-body px-4 pb-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <div><i class="fa fa-user-circle fa-5x mb-2"></i></div>
                                <h2 class="fw-bold text-uppercase">Profil</h2>
                                @if(Auth::user()->role=='A')
                                    <div class="mb-5"><span class="bg-warning rounded p-2"><i class="fas fa-user-cog"></i><strong> Admin</strong></span></div>
                                @else
                                    <div class="mb-5"><span class="bg-success rounded p-2"><i class="fas fa-user-check"></i><strong> User</strong></span></div>
                                @endif
                                <form action="/profile" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="name_profile" class="form-control form-control-lg"
                                            placeholder="Name" value="{{Auth::user()->name}}" required />
                                        @error('name_profile')
                                            <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" class="form-control form-control-lg"
                                            placeholder="Email" value="{{Auth::user()->email}}" disabled />
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
