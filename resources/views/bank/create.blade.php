@extends('admin')
@section('konten')

<style type="text/css">
    .note-editor {
        line-height: 1.0;
        text-align: justify;
        font-family: 'Open Sans' !important; 
    }
    
</style>
    
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
         
            <form method="post" action="{{ url('bank') }}" enctype="multipart/form-data" >
            @csrf
                <div class="form">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="nama bank">
                </div>

                <div class="form">
                    <label for="norek">norek</label>
                    <input type="text" name="norek" class="form-control" id="norek" aria-describedby="norek" placeholder="no rek">
                </div>
                
                <div class="form" style="margin-top:10px;">
                    <label for="jenis">Jenis</label>
                    <select id="jenis" class="form-control" name="jenis">
                        <option selected="selected" value="" >pilih Kategori</option>
                        <option value="QRIS" >QRIS</option>
                        <option value="Transfer Bank" >Transfer Bank</option>
                    </select>
                    
                </div>

                <div class="form-group">
                    <label for="QR">Upload kode QR</label>
                    <input type="file" name="QR" id="QR" aria-describedby="QR" >
                </div>
                <div class="form-group">
                    <label for="gambar">Logo Pembayaran</label>
                    <input type="file" name="gambar" id="gambar" aria-describedby="gambar" >
                </div>
                <div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea id="summernotes" name="deskripsi"></textarea>
                </div>
                <div class="form">
                    <label for="norek">url</label>
                    <input type="text" name="url" class="form-control" >
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection