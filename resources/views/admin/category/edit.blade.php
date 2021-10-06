@extends('template_backend.home')
@section('sub-judul','Edit-kategori')
@section('content')
@include('validasi')
<form action="{{route('cat.update',$categories->id)}}" method="post">
@csrf

    <div class="form-group">
        <label>Kategori</label>
        <input type="text" class="form-control" name="name" value="{{$categories->name}}" required=>
    </div>

    <div class="form-group">
      <button class="btn btn-primary btn-block">Update Kategori</button>
    </div>
</form>
@endsection