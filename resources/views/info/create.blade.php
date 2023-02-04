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
            Update Info Terbaru
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
         
            <form method="post" action="{{ url('add_info') }}" enctype="multipart/form-data" >
            @csrf
                <div class="form">
                    <label for="nama">ID Campaign</label>
                    @if($data['deskripsi'] == $post)
                    <input type="text" name="id_konten" class="form-control" value="{{$data->id_konten}}" aria-describedby="nama" placeholder="{{$data->id_konten}}">
                    <input type="hidden" name="id_qurban" class="form-control" aria-describedby="nama" >
                    @else
                    <input type="text" name="id_qurban" class="form-control" value="{{$qurban->id_qurban}}" aria-describedby="nama" placeholder="{{$qurban->id_qurban}}">
                    <input type="hidden" name="id_konten" class="form-control"  aria-describedby="nama" ">
                    @endif
                </div>

                <div class="form-group">
                    <label for="judul">Judul Info</label>
                    <input type="text" name="judul" class="form-control" aria-describedby="judul" placeholder="Masukan Judul">
                </div>
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