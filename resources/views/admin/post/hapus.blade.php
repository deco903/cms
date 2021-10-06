
@extends('template_backend.home')
@section('sub-judul','Post yang sudah dihapus')
@section('content')
@include('notifikasi') 

   <table class="table table-striped table-hover table-sm table-bordered">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Post</th>
            <th>Kategori</th>
            <th>Tag</th>
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
                   <li>{{$tag->name}}</li>     
                </ul>
                @endforeach
            </td>
            <td><img src="{{asset($hasil->gambar)}}" style="width:100px;"></td>
            <td>
              <form action="{{route('pos.kill', $hasil->id)}}" method="POST">
               @csrf
               @method('delete')
               <a href="{{route('pos.restore', $hasil->id)}}" class="btn btn-info btn-sm">restore</a>
              <button type="submit" href="" class="btn btn-danger btn-sm">delete</button>
               </form>
            </td>  
         </tr>
       @endforeach
      </tbody>
   </table>
    {{$post->links()}}
@endsection
