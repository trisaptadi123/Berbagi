
@extends('admin')
@section('konten')
<style type="text/css">
    .note-editor {
        line-height: 1.0;
        text-align: justify;
        font-family: 'Open Sans' !important; 
    }
    
</style>
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
         
            <form method="post" action="{{ url('post/ramadhan') }}" enctype="multipart/form-data">
            @csrf
                <div class="form">
                    <label for="judul">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" placeholder="Masukkan Judul Konten">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Tentukan Link</label>
                    <div class="input-group">
                        <div class="input-group-btn">
                        <button type="button" class="btn" disabled style="background-color: gray; color: white;">berbagibahagia.org/program/</button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" name="link" class="form-control" id="link" aria-describedby="writer" placeholder="Masukkan link Ringkas" class="form-control">
                    </div>
                    <!--<div class="input-group">-->
                    <!--<div class="input-group-prepend" style="width:100%;">-->
                    <!--  <span class="input-group-text nyumput">berbagibahagia.org/program/</span>-->
                    <!--  <input type="text" name="deskripsi" style="" class="form-control" id="nospace" aria-describedby="writer" placeholder="contoh : bantupaknana" required>               -->
                    <!--</div>-->
                    <!--</div>-->
                    <!-- <span></span><input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="writer" placeholder="Masukkan Deskripsi Ringkas"> -->
                </div>
                 <div class="form-group">
                  <label>Jenis Campaign</label>
                  <select class="form-control" name="jenis">
                    <option>- pilih jenis campaign -</option>
                    <option value="ramadhan">Ramadhan</option>
                    <option value="qurban">Qurban</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Upload</label>
                    <br />
                    <img id="output" style="height:80px; margin-bottom:10px;" src="" >
                    <input type="file" name="gambar" id="limit1mb" accept="image/*" onchange="loadFile(event)">
                </div>
                <div class="form-group">
                    <label for="kategori">campaigner</label>
                    <input type="text" name="name" class="form-control" id="kategori"  value="{{Auth::user()->name}}" readonly>
                    
                </div>
                
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" id="harga"  aria-describedby="writer" onkeyup="convertToRupiah(this);" placeholder="Rp.0" required class="form-control">
                    <!-- <input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals -->
                   
                  @error('id_category')
                <div class="form-text text-danger">{{$message}}</div>
                  @enderror
                    
                </div>
                <!-- <div class="form-group">
                    <label for="id_category">Target Dana</label>
                    <input type="text" name="id_category" class="form-control" id="id_category"  aria-describedby="writer" onkeyup="convertToRupiah(this);" placeholder="Rp.0" required class="form-control">
                    <input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals
                
                  @error('id_category')
                <div class="form-text text-danger">{{$message}}</div>
                  @enderror
                    
                </div> -->
                <!-- <div class="form-group">
                    <input type="hidden" name="id_users" class="form-control" id="id_users" value="0">
                </div> -->
                <!-- <div class="form-group">
                    <label for="end_date">Batas Waktu</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" aria-describedby="end_date" placeholder="batas waktu">
                </div> -->
                <div class="form-group">
                    <input type="hidden" name="id_users" class="form-control" value="{{Auth::user()->id}}"> 
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" class="form-control" value="0" readonly> 
                </div>
                <div class="form-group">
                    <label for="end_date">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="end_date" aria-describedby="end_date" placeholder="Alamat lengkap campaign ini">
                </div>
                <!--<div class="form-group">-->
                <!--    <label for="artikel">Deskripsi</label>-->
                <!--    <textarea class="form-control summernote" name="deskripsi" id="editor_classic"  placeholder="Masukkan Deskripsi Lengkap"></textarea>-->
                <!--</div>-->
                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea id="summernotes" name="deskripsi" placeholder="Masukkan Deskripsi Lengkap" class="note-editor"></textarea>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
           
            </div>
        </div>
    </div>
    </div>
    @endsection