@extends('admin')
@section('konten')

<style type="text/css">
    .note-editor {
        line-height: 1.0;
        text-align: justify;
        font-family: 'Open Sans' !important; 
    }
    
</style>
<div class="container mt-5">
   
    <div class="#">
        <div class="card" style="width: 60%;">
            <div class="card-header">
            {{$title}}
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
            <form method="post" action="{{ url('/bank/'.$bank->id) }}" enctype="multipart/form-data" >
            @csrf
            @method('patch')
                <div class="form-group">
                    <label for="name">Judul</label>
                <input type="text" name="nama" class="form-control" id="name" value="{{$bank->nama}}" aria-describedby="name" placeholder="Masukkan Judul Konten">
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
                    <textarea id="summernotes" name="deskripsi">{{$bank->deskripsi}}</textarea>
                </div>
                <div class="form-group">
                    <label for="name">Url</label>
                <input type="text" name="url" class="form-control" id="url" value="{{$bank->url}}" aria-describedby="name" placeholder="Masukkan Url">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection