<div class="modal fade" role="dialog" id="register" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 1.5rem;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <button class="btn-close btn-close-white ms-auto p-4 " aria-label="Close" data-bs-dismiss="modal"></button>
                        <div class="card-body px-4 pb-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-5 text-uppercase">Register</h2>
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="name" class="form-control form-control-lg"
                                            placeholder="Name" value="{{old('name')}}" required />
                                        @error('name')
                                            <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            placeholder="Email" value="{{old('email')}}" required />
                                        @error('email')
                                            <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-outline form-white mb-4 col-md-6">
                                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" value="{{old('password')}}" required />
                                            @error('password')
                                                <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-outline form-white mb-4 col-md-6">
                                            <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" value="{{old('confirm_password')}}" required />
                                            @error('confirm_password')
                                                <div class="text-danger">&times {{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="role" class="form-control form-control-lg"
                                            placeholder="Input token if you're an admin"/>
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
