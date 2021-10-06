@extends('template_backend.home')
@section('sub-judul','edit-post')
@section('content')
@include('validasi')
<form action="{{route('pos.update', $post->id)}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" value="{{$post->judul}}">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="category_id">
            <option value="" holder>Pilih Kategori</option>
           @foreach($categories as $result)
           <option value="{{$result->id}}"
            @if($result->id == $post->category_id)
              selected
            @endif
           >{{$result->name}}</option> 
           @endforeach
        </select>
    </div>
    <div class="form-group">
      <label>Pilih Tags</label>
        <select class="form-control select2" multiple="" name="tags[]">
        @foreach($tags as $tag)
          <option value="{{$tag->id}}"
          @foreach($post->tags as $value)
            @if($tag->id == $value->id)
             selected
            @endif
          @endforeach
          >{{$tag->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Konten</label>
        <textarea class="form-control" id="content" name="content">{{$post->content}}</textarea>
    </div>
   
    <div class="form-group">
        <label>thumbnail</label><br>
        <img src="{{url('uploads/post/'.$post->gambar)}}" style="width:100px;" alt="">
        <input type="file" name="gambar" class="form-control">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Update Post</button>
    </div>
</form>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection