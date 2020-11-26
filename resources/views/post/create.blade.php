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
         
            <form method="post" action="{{ url('post') }}" enctype="multipart/form-data">
            @csrf
                <div class="form">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Masukkan Judul Konten">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="writer" placeholder="Masukkan Deskripsi Ringkas">
                </div>
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <input type="file" name="gambar" >
                </div>
                <div class="form-group">
                    <label for="kategori">campaigner</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" aria-describedby="kategori" placeholder="Masukkan Deskripsi Ringkas">
                    {{-- <select id="kategori" class="from-conrol" name="kategori">
                        <option selected="selected" value="#" >pilih kategori</option>
                        @foreach ($category as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select> --}}
                    
                </div>
                <div class="form-group">
                    <label for="id_category">kategori</label>
                    <select id="id_category" class="from-conrol" name="id_category">
                        <option selected="selected" value="" >pilih kategori</option>
                        @foreach ($category as $c)
                    <option value="{{$c->name}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                  @error('id_category')
                <div class="form-text text-danger">{{$message}}</div>
                  @enderror
                    
                </div>
                <div class="form-group">
                    <label for="terkumpul">Terkumpul</label>
                    <input type="text" name="terkumpul" class="form-control" id="terkumpul" aria-describedby="terkumpul" placeholder="himpun dana">
                </div>
                <div class="form-group">
                    <label for="end_date">Batas Waktu</label>
                    <input type="text" name="end_date" class="form-control" id="end_date" aria-describedby="end_date" placeholder="batas waktu">
                </div>
                <div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea class="textarea" name="artikel" class="form-control" id="artikel" aria-describedby="artikel" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Masukkan Artikel Lengkap"></textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection