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
         
            <form method="post" action="{{ url('kabarbaik') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukan Judul Cerita">
            </div>
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <input type="file" name="gambar_cerita" class="form-control">
                </div>
                <!--<div class="form-group">-->
                <!--    <label for="artikel">Artikel</label>-->
                <!--    <textarea class="form-control summernote" name="artikel" id="editor_classic"  placeholder="Masukkan Artikel Lengkap"></textarea>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea id="summernotes" name="artikel" placeholder="Masukkan Artikel Lengkap" class="note-editor"></textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection