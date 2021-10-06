@extends('template_backend.home')
@section('sub-judul','tambah-tag')
@section('content')
@include('validasi')
<form action="{{route('tag.store')}}" method="post">
@csrf
    <div class="form-group">
        <label>Tag</label>
        <input type="text" class="form-control" name="name" placeholder="masukan nama tag">
    </div>

    <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Tag</button>
    </div>
</form>
@endsection