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
            Edit Disclaimer
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
            <form method="post" action="{{ url('/disclaimer/'.$data->id_disclaimer.'/edit') }}">
            @csrf
                <!--<div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control summernote" id="artikel" aria-describedby="artikel" >{{$data->deskripsi}}</textarea>
                </div>-->
                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea id="summernotes" name="deskripsi" placeholder="Masukkan Artikel Lengkap" class="note-editor">{{$data->deskripsi}}</textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection