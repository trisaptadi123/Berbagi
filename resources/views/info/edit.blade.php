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
            Edit Info Terbaru
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
         
            <form method="post" action="{{ url('/info/'.$info->id) }}" enctype="multipart/form-data" >
            @csrf
            @method('patch')
                <div class="form">
                    <label for="nama">ID Campaign</label>
                    @if($info->id_konten != null)
                    <input type="text" name="id_konten" class="form-control" value="{{$info->id_konten}}" aria-describedby="nama" >
                    <input type="hidden" name="id_qurban" class="form-control"  aria-describedby="nama" >
                    @else
                    <input type="text" name="id_qurban" class="form-control" value="{{$info->id_qurban}}" aria-describedby="nama" >
                    <input type="hidden" name="id_konten" class="form-control" value="{{$info->id_konten}}" aria-describedby="nama" >
                    @endif
                </div>

                <div class="form">
                    <label for="norek">Judul Info</label>
                    <input type="text" name="judul" class="form-control" id="norek" value="{{$info->judul}}" aria-describedby="norek" placeholder="judul">
                </div>
                
                <div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea id="summernotes" name="artikel" placeholder="Masukkan Artikel Lengkap" class="note-editor">{{$info->artikel}}</textarea>
                </div>
                
                <!--<div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea class="form-control summernote" name="artikel" id="editor_classic"  placeholder="Masukkan Artikel Lengkap">{{$info->artikel}}</textarea>
                </div>-->

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection