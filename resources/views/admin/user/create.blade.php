@extends('template_backend.home')
@section('sub-judul','Tambah-user')
@section('content')
@include('validasi')
@include('notifikasi')
<form action="{{route('user.store')}}" method="post">
@csrf
    <div class="form-group">
        <label>Nama User</label>
        <input type="text" class="form-control" name="name" placeholder="masukan nama User">
    </div>
    <div class="form-group">
        <label>Email User</label>
        <input type="email" class="form-control" name="email" placeholder="masukann Email User">
    </div>
    <div class="form-group">
        <label>Tipe User</label>
        <select class="form-control" name="tipe">
        	<option value="" holder>Pilih Tipe User</option>
        	<option value="1" holder>Administrator</option>
        	<option value="0" holder>Penulis</option>
        </select>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password" placeholder="masukann Email User">
    </div>
    <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan User</button>
    </div>
</form>
@endsection