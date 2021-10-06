
@extends('template_backend.home')
@section('sub-judul','kategori')
@section('content')
@include('notifikasi') 
<a href="{{route('cat.create')}}" class="btn btn-info btn-sm">Tambah Kategori</a>
<br><br>
   <table class="table table-striped table-hover table-sm table-bordered">
      <thead>
         <tr>
           <th>No</th>
           <th>Nama Category</th>
           <th>Action</th>
         </tr>
      </thead>
      <tbody>
      @foreach($categories as $result => $hasil)
         <tr>
            <td>{{$result + $categories->firstitem() }}</td>   
            <td>{{$hasil->name}}</td>    
            <td>
             
              <form action="{{route('cat.delete',$hasil->id )}}" method="POST">
               @csrf
               @method('delete')
               <a href="{{route('cat.edit', $hasil->id)}}" class="btn btn-primary btn-sm">edit</a>
              <button type="submit" href="" class="btn btn-danger btn-sm">delete</button>
               </form>
            </td>  
         </tr>
       @endforeach
      </tbody>
   </table>
    {{$categories->links()}}
@endsection
