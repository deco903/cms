@extends('template_backend.home')
@section('sub-judul','tambah-kategori')
@section('content')
@include('validasi')
<form action="{{route('cat.store')}}" method="post">
@csrf
    <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" name="name" placeholder="masukan nama kategori">
    </div>

    <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Kategori</button>
    </div>
</form>
@endsection