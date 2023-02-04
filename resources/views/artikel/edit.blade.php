@extends('admin')
@section('css')
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.0/cropper.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>

    $(document).ready(function () {

        $("#tag, #tag").select2({

            placeholder: "Pilih Tag"

        });

    });

</script>
   


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
        font-size: 14px;
        text-align: justify;
        font-family: 'Open Sans' !important; 
    }
    
</style>

<div class="container mt-10">

    <div class="#">
        <div class="#" style="width: 60%;">
            <div>
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

                <form method="post" action="{{ url('/artikel/'.$artikel->id_artikel) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukan Judul Artikel" value="{{$artikel->judul}}">
                    </div>
                    <!--<div class="form-group">
                        <label for="deskripsi">Deskripsi Url</label>
                        <input type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi" value="{{$artikel->deskripsi}}">
                    </div>-->                   
                    <div class="form-group">
                        <label for="id">Kategori Artikel</label>
                        <select id="id" class="form-control" name="id">
                            <option selected="selected" value="" >pilih Kategori</option>
                            @foreach ($list_category as $c)
                            <option value="{{$c->id}}" <?php if ($c->id == $artikel->id) echo ' selected="selected"'; ?>>{{$c->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    
                    <div class="form-group">
                        <label for="id">Tag Artikel</label>
                        <select id="tag" class="form-control" name="tag[]" multiple="multiple">
                            <!-- <option selected="selected" value="" >pilih Tag</option> -->
                            @foreach ($list_tag as $tag)
                            <option value="{{$tag->id}}" <?php if ($tag->id == $artikel->id) echo ' selected="selected"'; ?>>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="gambar">Gambar Artikel</label>
                        <input type="file" name="gambar" class="form-control image">
                    </div>
                    <input type="hidden" name="bases" id="base">
                    <div class="form-group">
                        <label for="artikel">Isi Artikel</label>
                        <textarea id="summernotes" name="isi" class="note-editor">{{$artikel->isi}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Laravel Cropper Js - Crop Image Before Upload - Tutsmake.com</h5>
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
<script>
    // var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;
  
$("body").on("change", ".image", function(e){
    var files = e.target.files;
    var done = function (url) {
      image.src = url;
    //   window.$modal.modal();
      $('#modal1').modal('show');
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

$('#modal1').on('shown.bs.modal', function () {
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
            $('#modal1').modal('hide');

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