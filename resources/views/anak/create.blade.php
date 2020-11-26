@extends('admin')
@section('konten')
    
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
                <div class="form-group">
                    <label for="foto_anak">Upload</label>
                    <input type="file" name="foto_anak" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kriteria">Kriteria</label>
                    <input type="text" name="kriteria" class="form-control" placeholder="Tahfidz or Non tahfidz">
                </div>
                <div class="form-group">
                    <label for="jk">Jenis Kelamain</label>
                    <input type="text" name="jk" class="form-control" placeholder="Masukan Jenis Kelamin">
                </div>
                <div class="form-group">
                    <label for="hobi">Hobi</label>
                    <input type="text" name="hobi" class="form-control"  placeholder="Masukan Hobi">
                </div>
    
                <div class="form-group">
                    <label for="ttl">TTL</label>
                    <input type="text" name="ttl" class="form-control" placeholder="Masukan TTL">
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
              
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection