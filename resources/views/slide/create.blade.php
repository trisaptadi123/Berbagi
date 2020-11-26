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
         
            <form method="post" action="{{ url('slide') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="gambar_slide">Upload</label>
                    <input type="file" name="gambar_slide" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Masukan Title">
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" placeholder="Masukan Subtitle">
                </div>
                <div class="form-group">
                    <label for="button">Button</label>
                    <input type="text" name="button" class="form-control"  placeholder="Masukan Decs Button">
                </div>
    
                <div class="form-group">
                    <label for="link">Link</label>
                    <input type="text" name="link" class="form-control" placeholder="Masukan Link">
                </div>
              
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection