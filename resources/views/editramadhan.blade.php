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
            <form method="post" action="{{ url('/ramadhan/'.$post->id_qurban) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="form-group">
                    <label for="title">Judul</label>
                <input type="text" name="judul" class="form-control" id="title" value="{{$post->judul}}" aria-describedby="judul" placeholder="Masukkan Judul Konten">
                </div>
                <div class="form-group">
                <div class="input-group">
                        <div class="input-group-btn">
                        <button type="button" class="btn" disabled style="background-color: gray; color: white;">berbagibahagia.org/program/</button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" name="link" class="form-control" id="link" aria-describedby="writer" placeholder="Masukkan link Ringkas" value="{{($post->link)}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <br />
                    <img id="output" style="height:80px; margin-bottom:10px;" src="{{asset('gambarUpload/'.$post->gambar)}}" >
                    <input type="file" name="gambar" class="form-control"  id="limit1mb" accept="image/*" onchange="loadFile(event)" value="{{$post->gambar}}"  aria-describedby="gambar">
                </div>
                <div class="form-group">
                    <label for="name">Campaigner</label>
                    <input type="text" name="name" class="form-control" id="name"  value="{{$post->name}}"  aria-describedby="name" placeholder="add campaigner">
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga"  aria-describedby="writer" onkeyup="convertToRupiah(this);" placeholder="Rp.0" value="{{($post->harga)}}" required class="form-control">
                    <!-- <input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals -->
                   
                  @error('id_category')
                <div class="form-text text-danger">{{$message}}</div>
                  @enderror
                    
                </div>
                
                <!--<div class="form-group">-->
                <!--    <label for="artikel">Deskripsi</label>-->
                <!--    <textarea name="deskripsi" class="form-control summernote" id="artikel" aria-describedby="artikel" >{{$post->deskripsi}}</textarea>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="summernotes" name="deskripsi" placeholder="Masukkan Deskripsi Lengkap" class="note-editor"></textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection