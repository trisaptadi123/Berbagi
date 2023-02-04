@extends('admin')
@section('konten')
    
<div class="container mt-5">
   
    <div class="#">
        <div class="card" style="width: 60%;">
            <div class="card-header">
            </div>
            <div class="card-body">
            <form method="post" action="{{ url('/editusers/'.$users->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Masukan Nama" value="{{$users->name}}">
            </div>
                <div class="form-group">
                    <label for="gambar">Email</label>
                    <input type="text" name="email" id="foto_anak"  class="form-control" value="{{$users->email}}">
                </div>
                <div class="form-group">
                      <label>Level</label>
                        <select required id="bank" style="background:#dddddd;" class="from-conrol" name="level" >
                        <option selected="selected" value="{{$users->level}}">- Level-</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                      </select> 
                  </div>
                <div class="form-group">
                    <label for="jk">Google_id</label>
                    <input type="text" name="google_id" class="form-control" placeholder="Masukan Jenis Kelamin" value="{{$users->google_id}}">
                </div>
                <div class="form-group">
                    <label for="ttl">Email Verifed</label>
                    <input type="text" name="email_verified_at" class="form-control" placeholder="Masukan TTL" value="{{$users->email_verified_at}}">
                </div>

                <div class="form-group">
                    <label for="jp">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Masukan Jenjang Pendidikan" value="{{$users->password}}">
                </div>

                <div class="form-group">
                    <label for="jp">Nomor HP</label>
                    <input type="text" name="nomorhp" class="form-control" placeholder="nomor hp" value="{{$users->nomorhp}}">
                </div>

                <div class="form-group">
                    <label for="kls">Remember token</label>
                    <input type="text" name="remember_token" class="form-control" value="{{$users->remember_token}}">
                </div>
               
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection