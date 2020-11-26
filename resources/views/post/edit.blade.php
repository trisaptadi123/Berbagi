@extends('admin')
@section('konten')
    
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
            <form method="post" action="{{ url('/post/'.$post->id_konten) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="form-group">
                    <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}" aria-describedby="title" placeholder="Masukkan Judul Konten">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{$post->deskripsi}}" aria-describedby="writer" placeholder="Masukkan Deskripsi Ringkas">
                </div>
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <input type="file" name="gambar" class="form-control" id="gambar"  value="{{$post->gambar}}"  aria-describedby="gambar" placeholder="Upload Gambar">
                </div>
                <div class="form-group">
                    <label for="kategori">Campaigner</label>
                    <input type="text" name="kategori" class="form-control" id="kategori"  value="{{$post->kategori}}"  aria-describedby="kategori" placeholder="add kategori">
                </div>
                <div class="form-group">
                    <label for="id_category">kategori</label>
                    <select id="id_category" class="from-conrol" name="id_category" aria-describedby="id_category">
                        <option selected="selected" value="#" >pilih kategori</option>
                        @foreach ($category as $c)
                    <option value="{{$c->name}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="terkumpul">Terkumpul</label>
                    <input type="text" name="terkumpul" class="form-control" id="terkumpul"  value="{{$post->terkumpul}}"  aria-describedby="terkumpul" placeholder="himpun dana">
                </div>
                <div class="form-group">
                    <label for="end_date">Batas Waktu</label>
                    <input type="text" name="end_date" class="form-control" id="end_date" aria-describedby="end_date" placeholder="batas waktu">
                </div>
                <div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea class="textarea" name="artikel" class="form-control" id="artikel" aria-describedby="artikel" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$post->artikel}}</textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection