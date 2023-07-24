@extends('master')
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
@section('content')
<div class="container-fluid py-5">
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">PAGE NOT FOUND</p>
        <a href="/home">&larr; Back to Dashboard</a>
    </div>
</div>

</html>
@endsection
