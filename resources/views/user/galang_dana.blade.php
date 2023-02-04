<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.0/cropper.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.0/cropper.js"></script>

<style type="text/css">
img {
    display: block;
    max-width: 100%;
}

.preview {
    overflow: hidden;
    width: 160px;
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.modal-lg {
    max-width: 1000px !important;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #f7f7f7;">
    @include('layouts.header')

    <div class="section checkout_section" style="padding:50px 0 50px 0;">
        <div class="container">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
                <h2>Galang Dana</h2>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
                    <div class="a_list">

                        <form method="post" action="{{url('new-galang-dana')}}" class=" center"
                            enctype="multipart/form-data">
                            {{csrf_field()}}
                            <fieldset>
                                <input type="hidden" value="0" name="keterangan_dokumen">
                                <div class="checkout-form" style="margin-bottom:10px; border:none;">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Judul Campaign</label>
                                                <input type="text" name="title" style="" class="" id="judul"
                                                    placeholder="Judul Campaign" maxlength="100" required>
                                                <p style="font-size:11px; margin-bottom:-10px;">Maksimal 100 karakter
                                                </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="terkumpul" class="form-control" id="terkumpul"
                                                aria-describedby="terkumpul" placeholder="himpun dana" value="0">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id_users" class="form-control"
                                                value="{{Auth::user()->id}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="status" class="form-control" value="0" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input hidden type="text" name="kategori" class="form-control"
                                                value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Target Dana</label>
                                                <input type="text" name="id_category" style="" class="" id="id_category"
                                                    onkeyup="convertToRupiah(this);" placeholder="Rp.0" required>
                                                <!--<input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals-->
                                                <!--<input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals-->
                                                <!--<input type="text" name="id_category" style="" class="" id="id_category" onkeyup="convertToRupiah(this);" placeholder="Rp.0" required>-->
                                                <!--  <select id="id_category" class="from-conrol" name="id_category">-->
                                                <!--    <option selected="selected" value="" >Pilih Target Dana</option>-->
                                                <!--    @foreach ($category as $c)-->
                                                <!--<option value="{{$c->name}}">{{$c->name}}</option>-->
                                                <!--    @endforeach-->
                                                <!--</select>-->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Deadline Penggalangan Dana</label>
                                                <input type="date" name="end_date" style="" class="" id="nam"
                                                    placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Lokasi penyaluran</label>
                                                <input type="text" name="alamat" style="" class="" id=""
                                                    placeholder="Lokasi Penyaluran" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Tentukan link untuk campaign</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend" style="width:100%;">
                                                        <span
                                                            class="input-group-text nyumput">berbagibahagia.org/program/</span>
                                                        <input type="text" name="deskripsi" style="" class=""
                                                            id="nospace" placeholder="contoh : bantupaknana" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-field">
                                                <label>Kategori</label>

                                                <select id="id" class="from-control" name="id">
                                                    <option selected="selected" value="">Pilih Kategori</option>
                                                    @foreach ($category as $c)
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-field">
                                                <label for="prof">Profinsi</label>

                                                <select id="b" class="from-control">
                                                    <option selected="selected" value="">pilih provinsi</option>



                                                </select>
                                                @error('id_category')
                                                <div class="form-text text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-field">
                                                <label for="kota">Kota</label>

                                                <select id="a" class="from-control" name="nama_kota">
                                                    <option selected="selected" value="">pilih kota</option>


                                                </select>
                                                @error('id_category')
                                                <div class="form-text text-danger">{{$message}}</div>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="col-md-12" hidden id="rincians">
                                            <div class="form-field">
                                                <label>Dokumen Medis</label>
                                                <br />
                                                <img id="keluar" style="height:80px; margin-bottom:10px;" src="">
                                                <input type="file" name="rincian" id="limit1mbb" accept="image/*"
                                                    onchange="soang(event)">
                                            </div>
                                        </div>

                                        <!--  <div class="col-md-6" hidden id="rinciant">-->
                                        <!--    <div class="form-field">-->
                                        <!--      <label>Rincian Dana</label>-->
                                        <!--      <input type="text" name="rincian_dana" placeholder="masukan rincian dana">-->
                                        <!--<textarea id="summernotesss" name="rincian_text" placeholder="Masukkan rincian Lengkap" class="note-editor"></textarea>-->
                                        <!--</textarea>-->
                                        <!--  </div>-->
                                        <!--</div>-->

                                        <!--<div class="col-md-6" hidden id="dana">-->
                                        <!--    <div class="form-field">-->
                                        <!--      <label>Dana</label>-->
                                        <!--      <input type="text" name="dana" placeholder="masukan jumlah dana">-->
                                        <!--<textarea id="summernotesss" name="rincian_text" placeholder="Masukkan rincian Lengkap" class="note-editor"></textarea>-->
                                        <!--</textarea>-->
                                        <!--  </div>-->
                                        <!--</div>-->

                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label for="gambar">Foto Cover</label>
                                                <br />
                                                <input type="file" name="gambar" class="form-control image"
                                                     accept="image/*" >
                                                <input type="hidden" name="bases" id="base">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Deskripsi / Cerita Lengkap</label>
                                                <textarea id="summernotes" name="artikel"
                                                    placeholder="Masukkan Artikel Lengkap"
                                                    class="note-editor"></textarea>
                                                </textarea>
                                            </div>
                                        </div>
                                        @if(Auth::user()->level == 'admin')
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Disclaimer</label>
                                                <textarea id="summernote1" name="des_disclaimer" style="width: 100%">
                    </textarea>
                                            </div>
                                        </div>
                                        @endif

                                        <button type="submit" class="btn main_bt col-md-12"
                                            style="border-radius:5px;">Buat Campaign</button>

                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <img id="image"
                                                        src="https://avatars0.githubusercontent.com/u/3456749">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>

    @include('layouts.modal')

    <!--@ include('layouts.footer')-->

    @include('layouts.js')
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
     -->

    <script type="text/javascript">
    // var $modal = $('#modal');
    var image = document.getElementById('image');
var cropper;
  
$("body").on("change", ".image", function(e){
    var files = e.target.files;
    var done = function (url) {
      image.src = url;
    //   window.$modal.modal();
      $('#modal').modal('show');
    };
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
      file = files[0];

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
});

$('#modal').on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
	  aspectRatio: 2,
	  viewMode: 3,
	  preview: '.preview'
    });
}).on('hidden.bs.modal', function () {
  cropper.destroy();
  cropper = null;
});

$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
	    width: 1066,
	    height: 600,
      });

    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
         reader.readAsDataURL(blob); 
         reader.onloadend = function() {
            var base64data = reader.result;	
            $('#modal').modal('hide');

            // document.getElementById('base').value = base64data;
            $("#base").val(base64data);
            // $.ajax({
            //     type: "POST",
            //     dataType: "json",
            //     url: "artikel/create",
            //     data: {'_token': $('meta[name="csrf_token"]').attr('content'), 'image': base64data},
            //     success: function(data){
            //         $modal.modal('hide');
            //         alert("success upload image");
            //     }
            //   });
         }
    });
})

    // var soang = function(event) {
    //     var output = document.getElementById('keluar');
    //     output.src = URL.createObjectURL(event.target.files[0]);
    // };

    // var uploadField = document.getElementById("limit1mbb");
    // uploadField.onchange = function() {
    //     if (this.files[0].size > 1000000) { // 1000000 untuk 1 MB.
    //         alert("Maaf, Ukuran Gambar Terlalu Besar. Maksimal Upload 1 MB");
    //         this.value = "";
    //         var output = document.getElementById('keluar');
    //         console.log(output);
    //         output.src = "";
    //     } else {
    //         var output = document.getElementById('keluar');
    //         console.log(output);
    //         output.src = URL.createObjectURL(event.target.files[0]);
    //     };
    // };

    $('#id').change(function() {
        if ($(this).val() == 12) {
            // $('#milih').attr('hidden', 'hidden');
            $('#rincians,#rinciant,#dana').removeAttr('hidden');
        } else {
            $('#rincians,#rinciant,#dana').attr('hidden', 'hidden');
        }
    });
    </script>

</body>

</html>