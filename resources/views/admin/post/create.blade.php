@extends('template_backend.home')
@section('sub-judul','tambah-post')
@section('content')
@include('validasi')
<form action="{{route('pos.store')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="masukan nama judul">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="category_id">
            <option value="" holder>Pilih Kategori</option>
           @foreach($categories as $result)
           <option value="{{$result->id}}">{{$result->name}}</option> 
           @endforeach
        </select>
    </div>
    <div class="form-group">
      <label>Pilih Tags</label>
        <select class="form-control select2" multiple="" name="tags[]" >
        @foreach($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Konten</label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <div class="form-group">
        <label>thumbnail</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Post</button>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection