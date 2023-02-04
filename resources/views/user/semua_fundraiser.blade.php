<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service" style="background:#fff;">

  @include('layouts.header')

  <div class="section blog_list" style="padding:50px 0 50px 0;">
    <div class="container">
      <div class="row" id="camp">

        @include('user.sidemenu')
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="min-height:650px;">
          <h2 class="topuser bottom_20 nyumput">Fundraiser</h2>
          <h2 class="topuser bottom_20 nyumput2">Fundraiser</h2>
          <hr class="nyumput2">
          <a href="{{url('buat-galang-dana')}}" type="submit" class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
            BUAT GALANG DANA SEKARANG
          </a>
              

      <div class="row">
        @foreach ($fundraiser as $fun)
        @if($fun->id_users == Auth::user()->id)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
          <a href="{{route('programfdn.detail',$fun->deskripsi)}}">
            <div class="product_list">
              <div class="product_img">
                <img class="img-responsive" src="{{ asset('gambarUpload/'.$fun->gambar_fdn)}}" alt=""> 
                <p class="status" style="{{($fun->status == 1)? 'background:#1f5daa;':'background:#d90000;'}} left:12.5px;"> {{($fun->status == 1)? 'Status: Aktif':'Status: Pending'}}</p>
              </div>
              <div class="product_detail_btm">
                <div class="center-cam">
                    <?php
                                $kalimat_kecil = strtolower($fun->title);
                                $kalimat_new = ucwords($kalimat_kecil);
                                $arr2 = explode(" ", $kalimat_new);
                              ?>
                            <h4 >{{implode(" ",array_splice($arr2,0,4))."..."}}</h4>
                </div>
                <p class="center-cam">{{($fun->kategori)}}<span class="fa fa-check"></span>
                  <hr style="margin:0;">
                  <div class="product_price shopping-cart" style="font-size:10px;">
                    <table class="table">
                      <tr style="margin-bottom:-10px;">
                        <td align="left" >Terkumpul</td> 
                        <td align="right" style="text-align:right; ">Sisa Waktu</td>
                      </tr>
                      <tr  style=" border-top: 2px solid #ffffff;">
                        <td align="left"><b>Rp. {{number_format($post->terkumpul,0,",",".")}}</b></td> 
                        <td align="right" style="text-align:right;"><b><?php
                        $date1 = strtotime($fun->end_date);
                        $date2 = time();
                        $subTime = $date1 - $date2;
                        $d = ($subTime/(60*60*24))%365;
                        $h = ($subTime/(60*60))%24;
                        $m = ($subTime/60)%60;

                        if ($d>0) {
                         echo $d." hari\n";             
                       }          
                       ?></b></td>
                     </tr>
                   </table>
                 </div>	
               </p>
             </div>
             <!--<div style="margin-left: 1px">-->
              <!--    <td align="right" style="text-align:right; "><label class="label {{($fun->status == 1)? 'label-success':'label-danger'}}">{{($fun->status == 1)? 'status:aktif':'status:pending'}}</label></td>-->

              <!--</div>-->
              <div class="starratin center">
                <div class="progress" style="width:100%;">
                  <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </a>
        </div>
        @else
        <h3 style="margin: 0 0 5px 0;"></h3>
        @endif
        @endforeach
        <div class="center" style="margin-bottom:50px; z-index:0;">
            {{ $fundraiser->links() }}
          </div>
      </div>

    </div>

  </div>
</div>
</div>

@include('layouts.modal')

<div class="cprt col-md-12 center"  style="height: 50px; bottom:0px; position: relative;">
  <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
</div> 

<a href="{{url('buat-galang-dana')}}" type="submit" class="btbot main_bt col-md-12" style="border-radius:0px;">GALANG DANA SEKARANG</a>

@include('layouts.js')
</body>
</html>
