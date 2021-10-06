@extends('template_backend.home')
@section('sub-judul','Edit-Tag')
@section('content')
@include('validasi')
<form action="{{route('tag.update',$tag->id)}}" method="post">
@csrf
    <div class="form-group">
        <label>Tag</label>
        <input type="text" class="form-control" name="name" value="{{$tag->name}}" required=>
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Update Tag</button>
    </div>
</form>
@endsection