
@extends('template_backend.home')
@section('sub-judul','Tag')
@section('content')
@include('notifikasi') 
<a href="{{route('tag.create')}}" class="btn btn-info btn-sm">Tambah Tag</a>
<br><br>
   <table class="table table-striped table-hover table-sm table-bordered">
      <thead>
         <tr>
           <th>No</th>
           <th>Nama Tag</th>
           <th>Action</th>
         </tr>
      </thead>
      <tbody>
      @foreach($tag as $result => $hasil)
         <tr>
            <td>{{$result + $tag->firstitem() }}</td>   
            <td>{{$hasil->name}}</td>    
            <td>
              <form action="{{route('tag.delete', $hasil->id)}}" method="POST">
               @csrf
               @method('delete')
               <a href="{{route('tag.edit', $hasil->id)}}" class="btn btn-primary btn-sm">edit</a>
              <button type="submit" href="{{route('tag.delete', $hasil->id)}}" class="btn btn-danger btn-sm">delete</button>
               </form>
            </td>  
         </tr>
       @endforeach
      </tbody>
   </table>
    {{$tag->links()}}
@endsection
