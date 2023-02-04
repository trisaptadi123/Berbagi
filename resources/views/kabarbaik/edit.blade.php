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
            <form method="post" action="{{ url('/kabarbaik/'.$kabar->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukan Judul Cerita" value="{{$kabar->judul}}">
            </div>
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <input type="file" name="gambar_cerita" class="form-control"  value="{{$kabar->gambar}}">
                </div>
                <!--<div class="form-group">-->
                <!--    <label for="artikel">Artikel</label>-->
                <!--  <textarea name="artikel" class="form-control summernote" id="artikel" aria-describedby="artikel" >{{$kabar->artikel}}</textarea>-->
                <!--</div>-->
              <div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea id="summernotes" name="artikel" placeholder="Masukkan Artikel Lengkap" class="note-editor">{{$kabar->artikel}}</textarea>
                </div>
               
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection