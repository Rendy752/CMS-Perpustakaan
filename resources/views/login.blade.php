<div class="modal fade" role="dialog" id="login" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 1.5rem;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <button class="btn-close btn-close-white ms-auto p-4 " aria-label="Close"
                            data-bs-dismiss="modal"></button>
                        <div class="card-body px-5 pb-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your email and password!</p>
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email_login" class="form-control form-control-lg"
                                            placeholder="Email" value="{{old('email_login')}}" required />
                                        @error('email_login')
                                            <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password_login" class="form-control form-control-lg"
                                            placeholder="Password" value="{{old('password_login')}}" required />
                                        @error('password_login')
                                            <div class="text-danger">&times {{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button class="btn btn-outline-light btn-lg px-5 mt-4" type="submit">Login</button>
                                </form>
                            </div>
                            <div>
                                <p>Don't have an account? <a data-bs-toggle="modal"
                                        data-bs-target="#register" data-bs-dismiss="modal"
                                        class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
