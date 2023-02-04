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
         
            <form method="post" action="{{ url('anak') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
            </div>
            <input type="hidden" name="status" value="1">
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <input type="file" name="gambar_anak" class="form-control" id="limit1mb" accept="image/*" onchange="loadFile(event)">
                </div>
                <div class="form-group">
                    <label for="kriteria">Kriteria</label>
                    <select class="form-control" name="kriteria">
                        <option selected disable>pilih kriteria</option>
                        <option value="Non Tahfidz">Non Tahfidz</option>
                        <option value="Tahfidz">Tahfidz</option>
                    </select> 
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamain</label>
                    <select class="form-control" name="jk">
                        <option selected disable>Pilih Jenis Kelamin</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-laki</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hobi">Hobi</label>
                    <input type="text" name="hobi" class="form-control"  placeholder="Masukan Hobi">
                </div>
    
                <div class="form-group">
                    <label for="ttl">TTL</label>
                    <input type="text" name="ttl" class="form-control" placeholder="Masukan TTL contoh Sumedang, 01-01-20201">
                </div>

                <div class="form-group">
                    <label for="jp">Jenjang Pendidikan</label>
                    <input type="text" name="jp" class="form-control" placeholder="Masukan Jenjang Pendidikan">
                </div>

                <div class="form-group">
                    <label for="kls">Kelas</label>
                    <input type="text" name="kls" class="form-control" placeholder="Masukan Kelas">
                </div>

                <div class="form-group">
                    <label for="sekolah">Nama Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" placeholder="Masukan Nama Sekolah">
                </div>
                <div class="form-group">
                    <label for="shelter">Shelter</label>
                    <input type="text" name="shelter" class="form-control" placeholder="Masukan Nama Cabang">
                </div>
                <div class="form-group">
                    <label for="cabang">Cabang</label>
                    <input type="text" name="cabang" class="form-control" placeholder="Masukan Nama Cabang">
                </div>
                <!--<div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control summernote" name="deskripsi" id="editor_classic"  placeholder="Masukkan Deskripsi Lengkap"></textarea>
                </div>-->
                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea id="summernotes" name="deskripsi" placeholder="Masukkan Deskripsi Lengkap" class="note-editor"></textarea>
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