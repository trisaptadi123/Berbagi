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
            <form method="post" action="{{ url('/slide/'.$slider->id) }}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="gambar">Upload</label>
                <input type="file" name="gambar_slide" class="form-control" id="gambar_slide"  value="{{$slider->gambar_slide}}"  aria-describedby="gambar" placeholder="Upload Gambar">
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title"  value="{{$slider->title}}"  aria-describedby="title" placeholder="Masukan Title">
            </div>
            <div class="form-group">
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" id="subtitle"  value="{{$slider->subtitle}}"  aria-describedby="subtitle" placeholder="Masukan Subtitle">
            </div>
            <div class="form-group">
                <label for="button">Button</label>
                <input type="text" name="button" class="form-control" id="button"  value="{{$slider->button}}"  aria-describedby="button" placeholder="Masukan Decs Button">
            </div>

            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" id="link"  value="{{$slider->link}}"  aria-describedby="link" placeholder="Masukan Link">
            </div>
               
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection