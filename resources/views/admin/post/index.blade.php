
@extends('template_backend.home')
@section('sub-judul','Post')
@section('content')
@include('notifikasi') 
<a href="{{route('pos.create')}}" class="btn btn-info btn-sm">Tambah Post</a>
<br><br>
   <table class="table table-striped table-hover table-sm table-bordered">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Post</th>
            <th>Kategori</th>
            <th>Tag</th>
            <th>Creator</th>
            <th>Thumbnail</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
      @foreach($post as $result => $hasil)
         <tr>
            <td>{{$result + $post->firstitem() }}</td>   
            <td>{{$hasil->judul}}</td>
            <td>{{ $hasil->category->name}}</td>
            <td>@foreach($hasil->tags as $tag)
                <ul>
                  <h6><span class="badge badge-info">{{$tag->name}}</span></h6>    
                </ul>
                @endforeach
            </td>
            <td>{{$hasil->users->name}}</td>
            <td><img src="{{url('uploads/post/'.$hasil->gambar)}}" style="width:100px;"></td>
            <td>
              <form action="{{route('pos.delete', $hasil->id)}}" method="POST">
               @csrf
               @method('delete')
               <a href="{{route('pos.edit', $hasil->id)}}" class="btn btn-primary btn-sm">edit</a>
              <button type="submit" href="" class="btn btn-danger btn-sm">delete</button>
               </form>
            </td>  
         </tr>
       @endforeach
      </tbody>
   </table>
    {{$post->links()}}
@endsection
