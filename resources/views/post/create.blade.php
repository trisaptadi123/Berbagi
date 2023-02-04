@extends('admin')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css"></script>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>-->
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.0/cropper.css"/>
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
.modal-lg{
max-width: 1000px !important;
}
</style>
@endsection
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
         
            <form method="post" action="{{ url('post') }}" enctype="multipart/form-data">
            @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Jenis Campaign</label>
                        <select id="jenis_campaign" class="form-control" name="cam_utama">
                            <option selected="selected" value="" >- pilih -</option>
                            <option value="0">Campaign Normal</option>
                            <option value="1">Campaign Utama</option>
                        </select>
                    </div>
                </div>
                    
                <div class="col-md-12" >
                    <div class="form-group" id="camutama" hidden>
                        <label for="title">Pilih Campaign Utama</label>
                        <select id="camutama" class="form-control" name="id_camutama">
                            <option selected="selected" value="" >- pilih -</option>
                            @foreach($campaign as $v)
                            <option value="{{$v->id_konten}}">{{$v->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Masukkan Judul Konten">
                    </div>
                </div>
                <div  class="col-md-12">
                    <div class="form-group">
                        <label for="deskripsi">Tentukan Link</label>
                        <!--<div class="input-group">-->
                        <!--<div class="input-group-prepend" style="width:100%;">-->
                        <!--  <span class="input-group-text nyumput">berbagibahagia.org/program/</span>-->
                        <!--  <input type="text" name="deskripsi" style="" class="form-control" id="nospace" aria-describedby="writer" placeholder="contoh : bantupaknana" required>               -->
                        <!--</div>-->
                        <!--</div>-->
                        <!--<input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="writer" placeholder="Masukkan Deskripsi Ringkas">-->
                         <div class="input-group">
                            <div class="input-group-btn">
                            <button type="button" class="btn" disabled style="background-color: gray; color: white;">berbagibahagia.org/program/</button>
                            </div>
                            <!-- /btn-group -->
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="writer" placeholder="Masukkan Deskripsi Ringkas" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="gambar">Upload</label>
                        <br />
                        <!--<img id="output" style="height:80px; margin-bottom:10px;" src="" >-->
                        <input type="file" name="gambar" class="image" id="limit1mb" accept="image/*" onchange="loadFile(event)">
                        <input type="hidden" name="bases" id="base">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="kategori">campaigner</label>
                        <input type="text" name="kategori" class="form-control" id="kategori"  value="{{Auth::user()->name}}" readonly>
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="id_category">Target Dana</label>
                        <input type="text" name="id_category" class="form-control" id="id_category"  aria-describedby="writer" onkeyup="convertToRupiah(this);" placeholder="Rp.0" required class="form-control">
                        <input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals
                        <!--<select id="id_category" class="from-conrol" name="id_category">-->
                        <!--    <option selected="selected" value="" >pilih target dana</option>-->
                        <!--    @foreach ($category as $c)-->
                        <!--<option value="{{$c->name}}">{{$c->name}}</option>-->
                        <!--    @endforeach-->
                        <!--</select>-->
                    <!--  @error('id_category')-->
                    <!--<div class="form-text text-danger">{{$message}}</div>-->
                    <!--  @enderror-->
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <input type="hidden" name="terkumpul" class="form-control" id="terkumpul" aria-describedby="terkumpul" placeholder="himpun dana" value="0">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end_date">Batas Waktu</label>
                        <input type="date" name="end_date" class="form-control" id="end_date" aria-describedby="end_date" placeholder="batas waktu">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">Kategori</label>
                        
                       <select id="id" class="form-control" name="id">
                            <option selected="selected" value="" >pilih Kategori</option>
                            @foreach ($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                      @error('id_category')
                    <div class="form-text text-danger">{{$message}}</div>
                      @enderror
                        
                    </div>
                </div>
                
                <div class="col-md-12" hidden id="rincians">
                    <div class="form-group">
                      <label>Dokumen Medis</label>
                      <br />
                      <img id="keluar" style="height:80px; margin-bottom:10px;" src="" >
                      <input type="file" name="rincian" id="limit1mbb" accept="image/*" onchange="soang(event)">               
                    </div>
                  </div>
                  
                <!-- <div class="col-md-6" hidden id="rinciant">-->
                <!--    <div class="form-group">-->
                <!--      <label>Rincian Dana</label>-->
                <!--      <input type="text" name="rincian_dana" placeholder="masukan rincian dana" class="form-control">-->
                      <!--<textarea id="summernotesss" name="rincian_text" placeholder="Masukkan rincian Lengkap" class="note-editor"></textarea>-->
                    <!--</textarea>-->
                <!--  </div>-->
                <!--</div>-->
                
                <!--<div class="col-md-6" hidden id="dana">-->
                <!--    <div class="form-group">-->
                <!--      <label>Dana</label>-->
                <!--      <input type="number" name="dana" placeholder="contoh 1000000" class="form-control" min="0">-->
                      <!--<textarea id="summernotesss" name="rincian_text" placeholder="Masukkan rincian Lengkap" class="note-editor"></textarea>-->
                    <!--</textarea>-->
                <!--  </div>-->
                <!--</div>-->
               
                <div class="form-group">
                    <input type="hidden" name="id_users" class="form-control" value="{{Auth::user()->id}}"> 
                </div>
                <div class="form-group">
                    <input type="hidden" name="status" class="form-control" value="0" readonly> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="end_date">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="end_date" aria-describedby="end_date" placeholder="Alamat lengkap campaign ini">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prof">Provinsi</label>
                        
                       <select id="b" class="form-control select2">
                            <option selected="selected" value="" >pilih provinsi</option>
                            
                            
                            
                            
                        </select>
                      @error('id_category')
                    <div class="form-text text-danger">{{$message}}</div>
                      @enderror
                        
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="kota">Kota</label>
                        
                       <select id="a" class="form-control select2" name="nama_kota">
                            <option selected="selected" value="" >pilih kota</option>
                           
                            
                        </select>
                      @error('id_category')
                    <div class="form-text text-danger">{{$message}}</div>
                      @enderror
                        
                    </div>
                </div>
               
               <div class="col-md-12">
                    <div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea id="summernotes" name="artikel" placeholder="Masukkan Artikel Lengkap" class="note-editor"></textarea>
                </div>
                <div class="form-group">
                    <label for="des_disclaimer">Disclaimer</label>
                    <textarea class="form-control note-editor" name="des_disclaimer" id="summernotes1"  placeholder="Masukkan disclaimer Lengkap"></textarea>
                </div>
               </div>
               
                <!--<div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea class="form-control summernote" name="artikel" id="editor_classic"  placeholder="Masukkan Artikel Lengkap"></textarea>
                </div>-->
                <!--<div class="form-group">-->
                   
                <!--    <input name="id_disclaimer" style="background:#dddddd;" id="id_disclaimer" type="checkbox" value="1">Disclaimer-->
                   
                <!--  @error('id_category')-->
                <!--<div class="form-text text-danger">{{$message}}</div>-->
                <!--  @enderror-->
                    
                <!--</div>-->
                <div class="col-md-12">
                    
            <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
            
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
    @endsection
     @section('js')
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>-->
    <script type="text/javascript">
    

	    $('#jenis_campaign').change(function(){
	        var jc = $('#jenis_campaign').val();
	        console.log(jc);
	        if(jc == 0){
	            $('#camutama').prop('hidden',false);
	        } else {
	            $('#camutama').prop('hidden',true);
	        }
	    })
	$(function provinsi(){
        // console.log('cc');
        // document.getElementById("b").innerHTML="dasdjkasd";

        $.get('/../prof', function(data){
            var isi = '';
            console.log(data[1]);
        for (var i=0; i < data.length; i++) {
            isi += `<option value='`+data[i]['province_id']+`'>`+data[i]['name']+`</option>`;
        } 
        document.getElementById("b").innerHTML=isi;
        // console.log(actualData['rajaongkir']);
        });

        $('#b').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#b').val();
            console.log(prov);

      		$.ajax({
            	type : 'GET',
           		url : '/../cek_kab',
            	data : { id_prov: prov},
					success: function (data) {
                    var add = '';
                    for (var i=0; i < data.length; i++) {
                        add += `<option value='`+data[i]['name']+`'>`+data[i]['name']+`</option>`;
                    } 
                    document.getElementById("a").innerHTML=add;
					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					// $("#kabupaten").html(data);
				}
          	});
		});
        
        // $.ajax({
        // type:'GET',
        // url:'/../prof',
        // headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        
        // dataType: 'json',
        // success :function(response) {
        // //   var data = response;
        //       console.log(response);
        //     //   
        //     // document.getElementById("list").innerHTML=response;
        //     // response
        //     // for (var i=0; i < response['rajaongkir']['results'].length; i++) {
        //     //     isi += `<option value='`+response['rajaongkir']['results'][i]['province_id']+`'>`+response['rajaongkir']['results'][i]['province']+`</option>`;
        //     // }
        //     // $("#mycart").slideToggle();
            
        // }
        // });
			

		
	});
	
	 var soang = function(event) {
    var output = document.getElementById('keluar');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

  var uploadField = document.getElementById("limit1mbb");
  uploadField.onchange = function() {
    if(this.files[0].size > 1000000){ // 1000000 untuk 1 MB.
      alert("Maaf, Ukuran Gambar Terlalu Besar. Maksimal Upload 1 MB");
      this.value = "";
      var output = document.getElementById('keluar');
      output.src = "";
    } else {
     var output = document.getElementById('keluar');
     output.src = URL.createObjectURL(event.target.files[0]);
    };
 };

  $('#id').change(function(){
  if($(this).val() == 12){
      // $('#milih').attr('hidden', 'hidden');
      $('#rincians,#rinciant,#dana').removeAttr('hidden');
    }else{
      $('#rincians,#rinciant,#dana').attr('hidden', 'hidden');
    }
  });
</script>

<script>
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
 </script>

@endsection