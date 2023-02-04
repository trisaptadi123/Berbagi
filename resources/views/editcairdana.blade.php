@extends('admin')
@section('konten')

<style type="text/css">
    .note-editor {
        line-height: 1.0;
        text-align: justify;
        font-family: 'Open Sans' !important; 
    }
    
</style>
    
<div class="container mt-5">
   
    <div class="#">
        <div class="card" style="width: 60%;">
            <div class="card-header">
            Edit Pencairan Dana
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
            <form method="post" action="{{ url('/pencairan_dana/'.$data->id_cairdana.'/edit') }}">
            @csrf
                <!--<div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control summernote" id="artikel" aria-describedby="artikel" >{{$data->deskripsi}}</textarea>
                </div>-->
                <div class="form-group">
                    <label for="campaigner">Campaigner</label>
                    <input type="text" class="form-control" name="campaigner" value="{{$data->campaigner}}">
                </div>
                <div class="form-group">
                    <label for="nama_campaign">Nama Campaign</label>
                    <input type="text" class="form-control" name="judul_campaign" value="{{$data->judul_campaign}}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" class="form-control" row="3">{{$data->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="ajuan_dana">Ajuan Dana</label>
                    <input type="text" class="form-control" name="ajuan_dana" value="Rp. {{number_format($data->ajuan_dana,0,",",".")}}" onkeyup="convertToRupiah(this);">
                </div>
                <div class="form-group">
                    <label for="ren_dana">Rencana Penggunaan Dana</label>
                    <textarea id="summernotes" name="ren_dana" placeholder="Masukkan Rencana Penggunaan Dana" class="note-editor">{{$data->ren_dana}}</textarea>
                </div>
                <div class="form-group">
                    <label for="tgl_penyaluran">Tanggal penyaluran</label>
                    <input type="date" class="form-control" name="tgl_penyaluran" value="{{$data->tgl_penyaluran}}">
                </div>
                <div class="form-group">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" name="bank" value="{{$data->bank}}">
                </div>
                <div class="form-group">
                    <label for="norek">No Rekening</label>
                    <input type="text" class="form-control" name="norek" value="{{$data->norek}}">
                </div>
                <div class="form-group">
                    <label for="a_n">Atas Nama</label>
                    <input type="text" class="form-control" name="a_n" value="{{$data->a_n}}">
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
    @endsection