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
            <form method="post" action="{{ url('/anak/'.$anak->id) }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="{{$anak->nama}}">
            </div>
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <input type="file" name="gambar_anak"  class="form-control" value="{{$anak->foto_anak}}" id="limit1mb" accept="image/*" onchange="loadFile(event)">
                </div>
                <div class="form-group">
                    <label for="kriteria">Kriteria</label>
                    <input type="text" name="kriteria" class="form-control" placeholder="Tahfidz or Non tahfidz" value="{{$anak->kriteria}}">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamain</label>
                    <input type="text" name="jk" class="form-control" placeholder="Masukan Jenis Kelamin" value="{{$anak->jk}}">
                </div>
                <div class="form-group">
                    <label for="hobi">Hobi</label>
                    <input type="text" name="hobi" class="form-control"  placeholder="Masukan Hobi" value="{{$anak->hobi}}">
                </div>
    
                <div class="form-group">
                    <label for="ttl">TTL</label>
                    <input type="text" name="ttl" class="form-control" placeholder="Masukan TTL" value="{{$anak->ttl}}">
                </div>

                <div class="form-group">
                    <label for="jp">Jenjang Pendidikan</label>
                    <input type="text" name="jp" class="form-control" placeholder="Masukan Jenjang Pendidikan" value="{{$anak->jp}}">
                </div>

                <div class="form-group">
                    <label for="kls">Kelas</label>
                    <input type="text" name="kls" class="form-control" placeholder="Masukan Kelas" value="{{$anak->kls}}">
                </div>

                <div class="form-group">
                    <label for="sekolah">Nama Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah" value="{{$anak->sekolah}}">
                </div>
                <div class="form-group">
                    <label for="shelter">Shelter</label>
                    <input type="text" name="shelter" class="form-control" placeholder="Masukan Nama Cabang" value="{{$anak->shelter}}">
                </div>
                <div class="form-group">
                    <label for="cabang">Cabang</label>
                    <input type="text" name="cabang" class="form-control" placeholder="Masukan Nama Cabang" value="{{$anak->cabang}}">
                </div>
              <!--<div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control summernote" name="deskripsi" id="editor_classic"  placeholder="Masukkan Deskripsi Lengkap">{{$anak->deskripsi}}</textarea>
                </div>-->
                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea id="summernotes" name="deskripsi" placeholder="Masukkan Deskripsi Lengkap" class="note-editor">{{$anak->deskripsi}}</textarea>
                </div>
                
                <div class="form-group">
                   
                    <input name="id_disclaimer" style="background:#dddddd;" id="id_disclaimer" type="checkbox" value="2">Disclaimer
                   
               </div>
               
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection