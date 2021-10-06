
@extends('template_backend.home')
@section('sub-judul','User')
@section('content')
@include('notifikasi') 
<a href="{{route('user.create')}}" class="btn btn-info btn-sm">Tambah User</a>
<br><br>
   <table class="table table-striped table-hover table-sm table-bordered">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Type</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
      @foreach($user as $result => $hasil)
         <tr>
            <td>{{$result + $user->firstitem() }}</td>   
            <td>{{$hasil->name}}</td>
            <td>{{$hasil->email}}</td>
            <td>
              @if($hasil->tipe == 1)
                <span class="badge badge-info">Administrator</span></h1>
                @else
                <span class="badge badge-warning">Penulis</span></h1>
              @endif

            </td>
            <td>
              <form action="{{route('user.destroy', $hasil->id)}}" method="POST">
               @csrf
               @method('delete')
               <a href="{{route('user.edit', $hasil->id)}}" class="btn btn-primary btn-sm">edit</a>
              <button type="submit" href="" class="btn btn-danger btn-sm">delete</button>
               </form>
            </td>  
         </tr>
       @endforeach
      </tbody>
   </table>
    {{$user->links()}}
@endsection
