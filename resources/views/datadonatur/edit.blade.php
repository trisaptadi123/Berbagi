@extends('admin')
@section('konten')
    
<div class="container mt-5">
   
    <div class="#">
        <div class="card" style="width: 60%;">
            <div class="card-header">
            <p style="margin-top:20px;font-size:20px;">{{$title}}</p>
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
            <form method="post" action="{{ url('/datadonatur/'.$donatur->id_donatur) }}">
            @csrf
            @method('patch')
                <div class="form-group">
                    <label for="name">Kode Unik</label>
                    <input type="number" name="kode" class="form-control" id="kode" value="{{$donatur->kode}}" >
                </div>
                <div class="form-group">
                    <label for="name">Jumlah Donasi</label>
                    <input type="text" name="jumlah" class="form-control" id="donasi" value="{{ $donatur->jumlah }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Judul Campign</label>
                    <input type="text" name="konten" class="form-control" id="konten" value="{{ $donatur->namakonten }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Nama Donatur</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ $donatur->nama }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ $donatur->email }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Nomor HP</label>
                    <input type="text" name="nomorhp" class="form-control" id="nomorhp" value="{{ $donatur->nomorhp }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Bank</label>
                    <input type="text" name="bank" class="form-control" id="bank" value="{{ $donatur->bank }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Waktu</label>
                    <input type="date" name="created_at" class="form-control" id="Waktu" value="{{ date('Y-m-d',strtotime($donatur->created_at)) }}" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Komentar</label>
                    <input type="text" name="komentar" class="form-control" id="komentar" value="{{$donatur->komentar}}" >
                </div>
                
               
            <a href="{{url('datadonatur')}}" class="btn btn-danger" style="margin-right:5px;">Batal</a><button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection