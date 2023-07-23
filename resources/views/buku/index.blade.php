@extends('master')
@section('content')
<div class="card mb-4">
    <div class="text-center card-header">
        <i class="fas fa-book mt-3"></i> Book -> <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">&plus;</button>
        @include('buku.create')
        <div class="row my-3 px-sm-5">
            <label class="col-form-label mt-3 col-4"><h5>Filter :</h5></label>
            <div class="col-8">
                <select name="kategori" class="h-100 col-md-12 rounded form-select" onchange="window.location.href=this.value">
                    <option>--</option>
                    <option value={{route('buku.index')}}>All</option>
                    @foreach($kategori as $data)
                    <option value="{{route('buku.show', $data->id)}}" 
                        value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div
            class='container-fluid card-container d-flex justify-content-center align-items-center gap-5 flex-wrap'>
            @foreach($buku as $data)
            <section class="fw-bolder float-left card col-lg-3 col-md-4 shadow p-3">
                <table>
                    <tr>
                        <td>Cover</td>
                        <td>:</td>
                        <td><img src="{{asset('foto/'.$data->cover)}}" style="width: 2rem; height: 2rem;"></td>
                    </tr>
                    <tr>
                        <td>ID</td>
                        <td>:</td>
                        <td>{{ $data->id }}</td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>:</td>
                        <td>{{ $data->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td>{{ $data->judul }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>{{ $data->kategori->nama }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td>{{ $data->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td>{{ $data->jumlah }}</td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td>:</td>
                        <td><a href="{{asset('file/'.$data->file)}}" target="_blank" style="width: 2rem; height: 2rem;">{{ $data->file }}</td>
                    </tr>
                </table>
                <div class="text-center mt-3">
                    <a class="btn btn-secondary border border-light rounded py-2 px-3 shadow" href={{ "buku/edit/".$data->id }}><i
                        class="fas fa-edit text-warning"></i></a>
                    <a class="btn btn-secondary border border-light rounded py-2 px-3 shadow" href={{ "buku/delete/".$data->id }}><i
                        class="fa fa-trash text-danger"></i></a>
                </div>
            </section>
            @endforeach
        </div>
    </div>
</div>
@section('error')
@if ($errors->has('judul')||$errors->has('deskripsi')||$errors->has('jumlah')||$errors->has('cover')||$errors->has('file'))
    <script>
        $(document).ready(function () {
            $('#add').modal('show')
        })
    </script>
@elseif ($errors->has('judul_edit')||$errors->has('deskripsi_edit')||$errors->has('jumlah_edit')||$errors->has('cover_edit')||$errors->has('file_edit')||session()->has('update'))
@include('buku.edit')
<script>
    $(document).ready(function () {
        $('#edit').modal('show')
    })
</script>
@elseif (session()->has('delete'))
@include('buku.delete')
<script>
    $(document).ready(function () {
        $('#delete').modal('show')
    })
</script>
@endif
@endsection
@endsection
