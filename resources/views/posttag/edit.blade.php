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
            <form method="post" action="{{ url('/posttag/'.$tag->id) }}">
            @csrf
            @method('patch')
                <div class="form-group">
                    <label for="name">Judul</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$tag->name}}" aria-describedby="name" placeholder="Masukkan Judul Tag">
                </div>
               
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection