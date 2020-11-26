@extends('admin')
@section('konten')
    
<div class="container mt-10">
   
    <div class="#">
        <div class="#" style="width: 60%;">
            <div class="card-header">
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
         
            <form method="post" action="{{ url('zakat') }}" >
                @csrf
                    <div class="form">
                        <label for="name">nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="kategori">
                    </div>
                    <div class="form">
                        <label for="name">jumlah</label>
                        <input type="text" name="jumlah" class="form-control" id="jumlah" aria-describedby="name" placeholder="kategori">
                    </div>
                    <div class="form">
                        <label for="name">email</label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="name" placeholder="kategori">
                    </div>
                    <div class="form">
                        <label for="name">nomorhp</label>
                        <input type="text" name="nomorhp" class="form-control" id="nomorhp" aria-describedby="name" placeholder="kategori">
                    </div>
                  
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection