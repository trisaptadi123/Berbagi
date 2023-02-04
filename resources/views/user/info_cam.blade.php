

<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<style>
.bb {
    display: inline-block;
    /* width: 80px; */
    height: 35px;
    /* background: #4E9CAF; */
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    /* margin-top: 25px; */
}
</style>

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
@include('layouts.header')

<div class="section checkout_section" style="padding:50px 0 50px 0;">
    <div class="row">
  <div class="container">
    <h2 style="margin-left:25px;">Info Update</h2>
      <div class="col-md-8" style="margin-left:auto; margin-right:auto;">
      <div class="card">
      <div class="card-body">
      <button class="btn main_bt btn-sm" style="border-radius:5px; margin-bottom:20px; float:right;" data-toggle="modal" data-target="#addinfo"><i class="fa fa-plus"></i> Tambah Info</button><br>
      <table id="tab1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Status</th>
                <th style="width:150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
            @foreach($info as $infos)
            <tr>
                <td>{{$no++}}</td>
                <td>{!!$infos->judul!!}</td>
                <td>
                @if($infos->status == 1)
                <span class="badge badge-success">Published</span>
                @else
                <span class="badge badge-danger">Pending</span>
                @endif
                </td>
                <td>
                <a class="bb btn-danger btn-sm" style="border-radius:5px; margin-bottom:20px; width:50px"
                    href="{{url('/hapus_info/'.$infos->id)}}" onclick="return confirm('Yakin data akan dihapus?')"><i class="fa fa-trash"></i></a>
                <a class="bb btn-sm btn-primary" style="color: white; border-radius:5px; margin-bottom:20px; width:50px" data-toggle="modal"
                    data-target="#editinfo{{$infos->id}}"  href=""><i class="fa fa-edit"></i></a>
                </td>
                
            </tr>

            <div class="modal fade" id="editinfo{{$infos->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Edit Info</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{url('editinfo/'.$infos->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="col-md-12">
                                  <div class="form-field">
                                    <input type="hidden" name="id" value="{{$infos->id}}" readonly> 
                                    <input type="hidden" name="link" value="{{Request::segment(2)}}" readonly>
                                    <input type="hidden" name="status" value="0" readonly>                  
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-field">
                                  <label>Judul Info</label>
                                    <input type="text" name="judul" value="{{$infos->judul}}" placeholder="Judul Info">               
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-field">
                                    <label>Apa ada yang baru pada campaign ini ?</label>
                                    <textarea id="tx{{$no}}" class="cc" name="artikel"  style="width: 100%">{{$infos->artikel}}
                                    </textarea>
                                  </div>
                                </div>
                              </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-primary" name="submit"
                                type="submit">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
           @endforeach
        </tbody>
    </table>

      </div>



    <input type="hidden" id="no" value="{{$no}}">









      <!-- <form method="post" action="{{url('sukainfo')}}" class=" center" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
        <div class="checkout-form" style="margin-bottom:10px; border:none;">
            <div class="row">
              <div class="col-md-12">
                <div class="form-field">
                  <input type="text" name="id_konten" value="{{$post->id_konten}}" placeholder="Lokasi Penyaluran" readonly>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Apa ada yang baru pada campaign ini ?</label>
		              <textarea class="editor" name="artikel"  style="width: 100%">
                  </textarea>
                </div>
              </div>
                  <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Simpan Info Terbaru</button>
               

             
            
            </div>
        </div>
        </fieldset>
		  </form> -->
      
      </div>
      </div>

    </div>
  </div>
</div>



<div class="modal fade" id="addinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Tambah Info</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{url('sukainfo')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                <div class="form-field">
                  <input type="hidden" name="id_konten" value="{{$post->id_konten}}" readonly> 
                  <input type="hidden" name="link" value="{{Request::segment(2)}}" readonly>
                  <input type="hidden" name="status" value="0" readonly>                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                <label>Judul Info</label>
                  <input type="text" name="judul" placeholder="Judul Info">               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Apa ada yang baru pada campaign ini ?</label>
		              <textarea id="summernotes" name="artikel"  style="width: 100%" class="note-editor"></textarea>
                  
                </div>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Simpan Info Terbaru</button>
            </div>
        </div>
        </form>
    </div>
</div>
@include('layouts.modal')

@include('layouts.footer')

@include('layouts.js')
<script>
console.log();
// $('document').ready(function(){
//     $('#t').on('click',function(){
for(x=1; x <= $('#no').val(); x++){
  $('#tx'+x).summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
}
      
//     });
// });
</script>
</body>
</html>