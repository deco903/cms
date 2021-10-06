@extends('template_backend.home')
@section('sub-judul','Edit-user')
@section('content')
@include('validasi')
@include('notifikasi')
<form action="{{route('user.update', $user->id)}}" method="post">
@csrf
    <div class="form-group">
        <label>Nama User</label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label>Email User</label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}" readonly="">
    </div>
    <div class="form-group">
        <label>Tipe User</label>
        <select class="form-control" name="tipe">
        	<option value="" holder>Pilih Tipe User</option>
        	<option value="1" holder
            @if($user->tipe == 1)
            selected
            @endif
            >Administrator</option>
        	<option value="0" holder
            @if($user->tipe == 0)
            selected
            @endif
            >Penulis</option>
        </select>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password" placeholder="masukann Email User">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Update User</button>
    </div>
</form>
@endsection