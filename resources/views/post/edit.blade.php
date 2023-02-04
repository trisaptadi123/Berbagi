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
        line-height: 1.5;
        text-align: justify;
        font-family: 'Open Sans' !important; 
    }
    
</style>
    
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
            <form method="post" action="{{ url('/post/'.$post->id_konten) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Jenis Campaign</label>
                        <select id="jenis_campaign" class="form-control" name="cam_utama">
                            <option selected="selected" value="">- pilih -</option>
                            <option value="0" <?php if ($post->cam_utama == 0) echo ' selected="selected"'; ?>>Campaign Normal</option>
                            <option value="1" <?php if ($post->cam_utama == 1) echo ' selected="selected"'; ?>>Campaign Utama</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" >
                    <div class="form-group" id="camutama" hidden>
                        <label for="title">Pilih Campaign Utama</label>
                        <select id="camutama" class="form-control" name="id_camutama">
                            <option selected="selected" value="" >- pilih -</option>
                            @foreach($campaign as $v)
                            <option value="{{$v->id_konten}}" <?php if ($v->id_konten == $post->id_camutama) echo ' selected="selected"'; ?>>{{$v->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}" aria-describedby="title" placeholder="Masukkan Judul Konten">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="deskripsi">Tentukan Link</label>
                        <!--<div class="input-group">-->
                        <!--<div class="input-group-prepend" style="width:100%;">-->
                        <!--  <span class="input-group-text nyumput">berbagibahagia.org/program/</span>-->
                        <!--  <input type="text" name="deskripsi" style="" class="form-control" id="nospace" value="{{$post->deskripsi}}" aria-describedby="writer" placeholder="contoh : bantupaknana" required>               -->
                        <!--</div>-->
                        <!--</div>-->
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{$post->deskripsi}}" aria-describedby="writer" placeholder="Masukkan Deskripsi Ringkas">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="gambar">Upload</label>
                        <br />
                        <img id="output" style="height:80px; margin-bottom:10px;" src="{{asset('gambarUpload/'.$post->gambar)}}" >
                        <input type="file" name="gambar" class="form-control image"  id="limit1mb" accept="image/*" onchange="loadFile(event)" value="{{$post->gambar}}"  aria-describedby="gambar">
                        <input type="hidden" name="bases" id="base">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="kategori">Campaigner</label>
                        <input type="text" name="kategori" class="form-control" id="kategori"  value="{{$post->kategori}}"  aria-describedby="kategori" placeholder="add kategori">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="id_category">Target Dana</label>
                         <input type="text" name="id_category" class="form-control" id="id_category" value="{{$post->id_category}}"  aria-describedby="writer" onkeyup="convertToRupiah(this);" placeholder="Rp.0" required class="form-control">
                        <input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals
                        <!--<select id="id_category" class="from-conrol" name="id_category" aria-describedby="id_category">-->
                        <!--<option selected="selected" value="{{$post->id_category}}" >pilih target dana</option>-->
                        <!--    @foreach ($category as $c)-->
                        <!--<option value="{{$c->name}}">{{$c->name}}</option>-->
                        <!--    @endforeach-->
                        <!--</select>-->
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="terkumpul">Terkumpul</label>
                        <input type="text" name="terkumpul" class="form-control" id="terkumpul"  value="{{$post->terkumpul}}"  aria-describedby="terkumpul" placeholder="himpun dana">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="end_date">Batas Waktu</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" aria-describedby="end_date" placeholder="batas waktu" value="{{$post->end_date}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="id">Kategori</label>
                        
                       <select id="id" class="form-control" name="id">
                            <option selected="selected" value="" >pilih Kategori</option>
                            @foreach ($category as $c)
                        <option value="{{$c->id}}" <?php if ($c->id == $post->id) echo ' selected="selected"'; ?>>{{$c->name}}</option>
                            @endforeach
                        </select>
                      @error('id_category')
                    <div class="form-text text-danger">{{$message}}</div>
                      @enderror
                        
                    </div>
                </div>
                
                @if($post->id == 12)
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Dokumen Medis</label>
                      <br />
                      <!--<img id="keluar" style="height:80px; margin-bottom:10px;" src="" >-->
                      
                      <img id="keluar" style="height:80px; margin-bottom:10px;" src="{{asset('gambarUpload/'.$post->rincian)}}" >
                        <input type="file" name="rincian" class="form-control image"  id="limit1mbb" accept="image/*" onchange="soang(event)" value="{{$post->rincian}}"  aria-describedby="rincian">
                        <input type="hidden" name="bases" id="base">
                      
                      <!--<input type="file" name="rincian" id="limit1mbb" accept="image/*" onchange="soang(event)">               -->
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="id">Keterangan Dokumen</label>
                        
                       <select id="id" class="form-control" name="keterangan_dokumen">
                            <option selected="selected" value="">pilih Kategori</option>
                        <option value="1" {{ $post->keterangan_dokumen == '1' ? 'selected' : '' }}>Publish</option>
                        <option value="0" {{ $post->keterangan_dokumen == '0' ? 'selected' : '' }}>Pause</option>
                        </select>
                    </div>
                </div>
                  @endif
                 
                <!--<a class="btn btn-primary" onclick="ganti_wil()">Ganti Wilayah</a>-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="end_date">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="end_date" aria-describedby="end_date" value="{{$post->alamat}}" placeholder="Alamat lengkap campaign ini">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label>Wilayah</label>
                        <input type="text" name="nama_kota" id="v" class="form-control" value="{{$post->nama_kota}}" readOnly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                         <!--<label></label>-->
                        <a class="btn btn-primary btn-sm" id="bt" style="margin-top:25px" onclick="pil()">ganti wilayah</a>
                    </div>
                </div>
                <div id="muncul" style="display:none">
                <div class="col-md-12">
                     <div class="form-group row">
                        <div class="col-md-5">
                       <select id="b" class="form-control select2 c1" style="width:100%;">
                            <option selected="selected" value="" >pilih provinsi</option>
                        </select>
                      @error('id_category')
                    <div class="form-text text-danger">{{$message}}</div>
                      @enderror
                      </div>
                      <div class="col-md-5">
                        
                        
                       <select id="a" class="form-control select2 c2" onchange="reply_click()" style="width:100%;">
                            <option selected="selected" value="" >pilih kota</option>
                        </select>
                      @error('id_category')
                    <div class="form-text text-danger">{{$message}}</div>
                      @enderror
                        
                    </div>
                <div class="col-md-2">
                        <a class="btn btn-danger btn-sm col-sm-12" onclick="pul()"> Batal </a>
                </div>
                </div>
                </div>
                </div>
               
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="artikel">Artikel</label>
                        <textarea id="summernotes" name="artikel" placeholder="Masukkan Artikel Lengkap" class="note-editor">{{$post->artikel}}</textarea>
                    </div>
                </div>
               <div class="col-md-12">
                   <div class="form-group">
                        <label for="des_disclaimer">Disclaimer</label>
                        <textarea class="form-control " name="des_disclaimer"  placeholder="Masukkan disclaimer Lengkap">{{$post->des_disclaimer}}</textarea>
                    </div>
               </div>
               <div class="col-md-4">
                   <div class="form-group">
                        <label for="dana_iklan">Dana Iklan</label>
                        
                  <div class="input-group">
                    <input type="text" class="form-control" name="dana_iklan" value="{{$post->dana_iklan}}">
                    <span class="input-group-addon">%</span>
                  </div>
                    </div>
               </div>
                
                <!--<div class="form-group">
                    <label for="artikel">Artikel</label>
                    <textarea name="artikel" class="form-control summernote" id="artikel" aria-describedby="artikel" >{{$post->artikel}}</textarea>
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
    
     function reply_click()
    {
        document.getElementById('v').value = document.getElementById('a').value;
    } 
    
    function pil(){
         document.getElementById("muncul").style.display='block';
    }
     function pul(){
         document.getElementById("muncul").style.display='none';
    }
    
	$(function provinsi(){
	    if($('#jenis_campaign').val() == 0){
            $('#camutama').prop('hidden',false);
        } else {
            $('#camutama').prop('hidden',true);
        }
        // console.log('cc');
        // document.getElementById("b").innerHTML="dasdjkasd";

        $.get('/../prof', function(data){
            var isi = '';
        for (var i=0; i < data.length; i++) {
            isi += `<option value='`+data[i]['province_id']+`'>`+data[i]['name']+`</option>`;
        } 
        document.getElementById("b").innerHTML=isi;
        // console.log(actualData['rajaongkir']);
        });
        
  

        $('#b').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#b').val();
            // console.log(prov);

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
	  aspectRatio: 1,
	  viewMode: 3,
	  preview: '.preview'
    });
}).on('hidden.bs.modal', function () {
  cropper.destroy();
  cropper = null;
});

$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
	    width: 160,
	    height: 160,
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