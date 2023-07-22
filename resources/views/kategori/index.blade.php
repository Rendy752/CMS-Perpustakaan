@extends('master')
@section('content')
<div class="card mb-4">
    <div class="text-center card-header">
        <i class="fa fa-tag"></i> Category -> <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">&plus;</button>
        @include('kategori.create')
    </div>
    <div class="p-4">
        <div
            class='container-fluid card-container d-flex justify-content-center align-items-center gap-5 flex-wrap'>
            @foreach($kategori as $data)
            <section class="fw-bolder float-left card col-lg-3 col-md-4 shadow p-3 text-center rounded-circle">
                <strong>{{ $data->nama }}</strong>
                <div class="mt-3">
                    <a class="btn btn-secondary border border-light rounded py-2 px-3 shadow" href={{ "kategori/edit/".$data->id }}><i
                            class="fas fa-edit text-warning"></i></a>
                    <a class="btn btn-secondary border border-light rounded py-2 px-3 shadow" href={{ "kategori/delete/".$data->id }}><i
                            class="fa fa-trash text-danger"></i></a>
                </div>
            </section>
            @endforeach
        </div>
    </div>
</div>
@section('error')
@if ($errors->has('nama'))
    <script>
        $(document).ready(function () {
            $('#add').modal('show')
        })
    </script>
@elseif ($errors->has('nama_edit')||session()->has('update'))
@include('kategori.edit')
<script>
    $(document).ready(function () {
        $('#edit').modal('show')
    })
</script>
@elseif (session()->has('delete'))
@include('kategori.delete')
<script>
    $(document).ready(function () {
        $('#delete').modal('show')
    })
</script>
@endif
@endsection
@endsection
