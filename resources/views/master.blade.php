<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    </script>
</head>

<body class="sb-nav-fixed">
    <nav id="navbar" class="sb-topnav navbar navbar-expand navbar-dark bg-dark text-light px-lg-5">
        <a class="navbar-brand">Menu</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 mx-auto" onclick="set()"><i id="mode" class="fa fa-toggle-off"></i></button>
        <a class="nav-link ms-auto" href="">
            <div class="text-center"><i class="fa fa-book"></i></div>
            Buku
        </a>
        <form class="d-none d-md-inline-block form-inline mx-md-5">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <h4 class="navbar-nav mx-2">{{ Auth::check()?Auth::user()->name:'Anonymous' }}</h4>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-2x"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @if (Auth::check())
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profil">Profil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="/logout" onclick="">Logout</a></li>
                    @else
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#login">Login</a></li>
                    @endif
                </ul>
            </li>
        </ul>
    </nav>
    <main>
        <div class="container-fluid px-lg-5 py-lg-3">
            @yield('content')
            <h1>Dashboard</h1>

            @if (Auth::check())
                @include('profile')
            @else
                @include('login')
                @include('register')
            @endif
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="text-center small">
                <div class="text-muted">Copyright &copy; Perpustakaan {{ date('Y') }}</div>
            </div>
        </div>
    </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('js/darkLightMode.js')}}"></script>
@if ($errors->has('email_login')||$errors->has('password_login'))
    <script>
        $(document).ready(function () {
            $('#login').modal('show')
        })
    </script>
@elseif ($errors->has('name')||$errors->has('email')||$errors->has('password')||$errors->has('confirm_password'))
<script>
    $(document).ready(function () {
        $('#register').modal('show')
    })
</script>    
@elseif ($errors->has('name_profile'))
<script>
    $(document).ready(function () {
        $('#profil').modal('show')
    })
</script>              
@endif

</body>

</html>
