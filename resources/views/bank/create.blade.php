@extends('admin')
@section('konten')
    
<div class="container mt-10">
   
    <div class="#">
        <div class="#" style="width: 60%;">
            <div class="card-header">
            Tambah Campaign
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
         
            <form method="post" action="{{ url('bank') }}" enctype="multipart/form-data" >
            @csrf
                <div class="form">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="nama bank">
                </div>

                <div class="form">
                    <label for="norek">norek</label>
                    <input type="text" name="norek" class="form-control" id="norek" aria-describedby="norek" placeholder="no rek">
                </div>

                <div class="form-group">
                    <label for="logo">Upload</label>
                    <input type="file" name="logo" id="logo" aria-describedby="logo" >
                </div>
              
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection