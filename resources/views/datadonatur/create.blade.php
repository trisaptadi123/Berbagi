@extends('admin')
@section('konten')
    
<div class="container mt-10">
   
    <div class="#">
        <div class="#" style="width: 60%;">
            <div class="card-header">
            Tambah Campaign
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
         
            <form method="post" action="{{ url('datadonatur') }}" >
            @csrf

            <div class="form">
                <label for="id_posts">Id </label>
                <input type="text" name="id_posts" class="form-control" id="id_posts" aria-describedby="id_posts" placeholder="jumlah">
            </div>
                <div class="form">
                    <label for="jumlah">jumlah</label>
                    <input type="text" name="jumlah" class="form-control" id="jumlah" aria-describedby="jumlah" placeholder="jumlah">
                </div>

                <div class="form-group">
                    <label for="bank">Bank Transfer</label>
                    <select id="bank" class="from-conrol" name="bank">
                        <option selected="selected" value="#" >pilih bank</option>
                        @foreach ($bank as $c)
                    <option value="{{$c->nama}}">{{$c->nama}}</option>
                        @endforeach
                    </select>
                    
                </div>

                <div class="form">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="nama">
                </div>

                <div class="form">
                    <label for="namakonten">namakonten</label>
                    <input type="text" name="namakonten" class="form-control" id="namakonten" aria-describedby="namakonten" placeholder="namakonten">
                </div>

                <div class="form">
                    <label for="id_konten">Id</label>
                    <input type="text" name="id_konten" class="form-control" id="id_konten" aria-describedby="id_konten" placeholder="id_konten">
                </div>


                <div class="form">
                    <label for="email">email</label>
                    <input type="text" name="email" class="form-control" id="email" aria-describedby="email" placeholder="email">
                </div>

                <div class="form">
                    <label for="nomorhp">nomor hp</label>
                    <input type="text" name="nomorhp" class="form-control" id="nomorhp" aria-describedby="nomorhp" placeholder="nomorhp">
                </div>

                <div class="form">
                    <label for="kode">kode</label>
                    <input type="text" name="kode" class="form-control" id="kode" aria-describedby="kode" placeholder="kode">
                </div>

                <div class="form">
                    <label for="komentar">komentar</label>
                    <input type="text" name="komentar" class="form-control" id="komentar" aria-describedby="komentar" placeholder="komentar">
                </div>
              
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection