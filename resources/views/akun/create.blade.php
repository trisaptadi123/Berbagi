@extends('admin')
@section('konten')
    
<div class="container mt-10">
   
    <div class="#">
        <div class="#" style="width: 60%;">
            <div class="card-header">
            Tambah Akun
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Wow !</strong> Data masih kosong<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
         
            <form method="post" action="{{url('tambahuser')}}" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="email_verified_at" class="form-control" value="2021-06-15" >
                <div class="form">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" class="form-control" value="" aria-describedby="nama" placeholder="Nama Lengkap"> 
                </div>
                <div class="form">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" value="" aria-describedby="email" placeholder="E-mail Valid"> 
                </div>
                <div class="form">
                    <label for="nama">Level</label>
                    <select class="form-control" name="level">
                        <option>- Pilih -</option>
                        <option value="admin">Admin</option>
                        <option value="campaign">campaign</option>
                        <option value="keuangan">keuangan</option>
                        <option value="user">User</option>
                        
                        
                    </select>
                </div>
                <div class="form">
                    <label for="no">No Hp / WA</label>
                    <input type="text" name="nomorhp" class="form-control" value="" aria-describedby="no" placeholder="No Hp / WA"> 
                </div>
                <div class="form">
                    <label for="pass">Password</label>
                    <input type="password" name="password" class="form-control" value="" aria-describedby="pass" placeholder="No Hp / WA"> 
                </div>
               
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection