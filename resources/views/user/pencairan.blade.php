<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
@include('layouts.header')

<style>
  .y {
    max-width: auto ; 
    padding: 1px 10px 1px 10px;
    color: #fff;
    font-size: 11px;
    position: absolute;
    text-transform: uppercase;
    right: -2px;
    top: 15px;
}
</style>

<div class="section checkout_section" style="padding:50px 0 50px 0;">
  <div class="container">
  
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
  <h2 >Pencairan Dana</h2>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
    <div class="a_list">
      <div class="col-md-12"><a class="btn bt_main btn-sm float-right" data-toggle="modal" data-target="#riwayat" style="border-radius:5px;" href="#">riwayat</a></div>
      <br><br>
      <div class="col-md-12" style="margin-left:auto; margin-right:auto; margin-top:20px;">
      <div class="card">
        <div class="card-body" style="text-align:center;">
          <?php 
            
            $total_plt = $data->terkumpul * 5 / 100; 
            $total_iklan = $data->terkumpul * $data->dana_iklan / 100;
            $total = $data->terkumpul - $total_plt - $total_iklan ;
            $no = 1;
            foreach($datas as $j){
              $total = $total - $j->ajuan_dana;
            }
          ?>
          <h1><b>Rp. {{number_format($total,0,",",".")}}</b></h1>
           <p>dana dapat dicairkan</p>
           
        </div>
      </div>
      <h5 style="margin-top:20px;"><b>Detail Dana</b></h5>
      <hr>
      <table class="col-md-12" style="font-size:12px;">
            <tr  style="height:30px;">
              <td>Donasi Online</td>
            </tr >
            <tr style="height:30px; border-bottom:1px solid #f0f0f0">
              <td>keterangan Biaya</td>
              <td align="right"> Rp. {{number_format($data->terkumpul,0,",",".")}}</td>
            </tr>
            
            
            <tr style="height:30px;">
              <td>Biaya Platform Administrasi</td>
            </tr>
            <tr style="height:30px; border-bottom:1px solid #f0f0f0">
              <td >keterangan Biaya</td>
              <td align="right" style="color:red;">- Rp. {{number_format($total_plt,0,",",".")}}</td>
            </tr>
            <tr style="height:30px;">
              <td>Biaya Iklan</td>
            </tr>
            <tr style="height:30px; border-bottom:1px solid #f0f0f0">
              <td >keterangan Biaya</td>
              <td align="right" style="color:red;">- Rp. {{number_format($total_iklan,0,",",".")}}</td>
            </tr>
            @foreach($datas as $i)
            <tr style="height:30px;">
              <td >Pencairan Dana {{$no++}}</td>
            </tr>
            <tr style="height:30px; border-bottom:1px solid #f0f0f0">
              <td >keterangan Biaya</td>
              <td align="right" style="color:red;">- Rp. {{number_format($i->ajuan_dana,0,",",".")}}</td>
            </tr>
            @endforeach
           </table>
      </div>
      <br>


      <div>
      @if(Session::has('gagal'))
      <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i> Peringatan</h4>
        {{Session::get('gagal')}}
      </div>
      </div>
      @endif
      <form method="post" action="{{url('cairdana')}}" class=" center" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
        <div class="checkout-form" style="margin-bottom:10px; border:none;">
            <div class="row">
              <input type="hidden" name="link" value="{{Request::segment(2)}}">
              <input type="hidden" name="danacair" value="{{$total}}">
              <input type="hidden" name="id_campaign" value="{{$data->id_konten}}">
              <input type="hidden" name="campaign" value="{{$data->title}}">
              <input type="hidden" name="nama_campaign" value="{{$data->kategori}}">
              <input type="hidden" name="lokasi" value="{{$data->alamat}}">
              <div class="col-md-12">
                <div class="form-field">
                  <label>Ajuan Dana</label>
                  <input type="text" name="dana" style="" class="" id="dana" onkeyup="convertToRupiah(this);" placeholder="Ajuan Dana" max required>               
                  
                </div>
              </div>
              
              <div class="col-md-12">
                      <div class="form-field">
                        <label>Tipe Pencairan Dana</label>
                        <!-- <input type="date" name="tipe_pencairan" style="" class="" id="tipe" placeholder="" required>  -->
                        <select class="form-control" name="tipe" id="tipe" required>
                          <option selected disabled>pilih pencairan dana</option>
                          <option value="biaya_rumah_sakit">Biaya Rumah Sakit</option>
                          <option value="biaya_operasional">Biaya Operasional</option>
                          <option value="biaya_penunjang_pengobatan">Biaya Penunjang Pengobatan</option>
                          <option value="biaya_pendampingan_pasien">Biaya Pendampingan</option>
                          <option value="santunan_kematian">Santunan Kematian</option>
                        </select>
                      </div>
                    </div>
            
              <div class="col-md-12">
                <div class="form-field">
                  <label>Rencana Penggunaan Dana</label>
		              <textarea id="summernotes" name="rencana_dana"  style="width: 100%">
                  </textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Rencana Tanggal Penyaluran</label>
                  <input type="date" name="tgl_penyaluran" style="" class="" id="nam" placeholder="" required> 
                </div>
              </div>
              
              
                    <div class="col-md-12" hidden id="gambar">
                      <div class="form-field">
                        <label>Foto Bukti</label>
                        <br />
                        <img id="output" style="height:80px; margin-bottom:10px;" src="" >
                        <input type="file" name="gambar" id="limit1mb" accept="image/*" onchange="loadFile(event)">               
                      </div>
                    </div>

              <div class="col-md-12">
                <div class="form-field">
                  <label>Bank</label>
                  <input type="text" name="bank" style="" class="" id="bank" placeholder="Nama Bank" required>               
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>No. Rekening</label>
                  <input type="text" name="norek" style="" class="" id="norek" placeholder="No. Rekening" required>               
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Atas Nama</label>
                  <input type="text" name="a_n" style="" class="" id="a_n" placeholder="Atas Nama" required>               
                  
                </div>
              </div>
              <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Kirim</button>

            </div>
        </div>
        </fieldset>
		  </form>
      </div>
      </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="riwayat" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              @if(!empty($data))
              @foreach($cairs as $cair)
              <div class="card" style="margin-bottom:30px">
                <div class="card-body" style="margin-bottom:-20px">
                  @if($cair->status == 1)
                  <p class="y" style="background:#39b441">Success</p>
                  @else
                  <p class="y" style="background:#e50303">Pending</p>
                  @endif
                  <p>{{($cair->created_at->isoFormat('dddd, D MMMM Y'))}}</p>
                  <p><b>Rp. {{number_format($cair->ajuan_dana,0,",",".")}}</b> | {{$cair->judul_campaign}}</p>
                  <hr>
                  <p>{{$cair->campaigner}}</p>
                  <p>{{$cair->bank}} - {{$cair->norek}}</p>
                </div>
              </div>
              @endforeach
              @else
               <div class="card">
                <div class="card-body">
                    <h4 style="text-align:center">Riwayat Tidak Ada</h4>
                </div>
               </div>
               @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@include('layouts.modal')

@include('layouts.footer')
@include('layouts.js')
<!-- <script type="text/javascript">
$(function cair(){
   var terkumpul = <?php echo $data->terkumpul; ?>;
   console.log(terkumpul);
   var total = i * 5 / 100;
   $('#total').html("<h1>"+ total +"</h1");

});
</script> -->

<script type="text/javascript">
  $('#tipe').change(function(){
    if($(this).val() == 'santunan_kematian'){
      // $('#milih').attr('hidden', 'hidden');
      $('#gambar').removeAttr('hidden');
    }else{
      $('#gambar').attr('hidden', 'hidden');
    }
  });
</script>

</body>
</html>