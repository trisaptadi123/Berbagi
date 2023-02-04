<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<style type="text/css">
@media screen and (min-device-width : 768px) {
  .siz {
    max-width: 540px;
  }

  .product_list {
    min-height: auto;
    padding: 5px 5px 5px 5px;
  transition: ease all 0.5s;
  height:140px;
    margin-bottom: -10px;
    margin-top: -12px;
    margin-left: -2.5%;
  border: 1px solid #ccc;
  border-radius: 7px;
  border-bottom: 1px solid #ccc;
  box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
  width: 105%;
}

.product_list:hover{
  border: 1px solid #ccc;
}

.product_img {
  width: 200px;
  float: left;
}

.product_img img {
  height: 115px;
  float: left;
  border-radius: 0px;
}

.img-don {
  margin-top: 10px;
  margin-right: 5px;
  width: 100px;
  float: left;
  margin-bottom: -25px;
}

.img-don img {
  height: auto;
  float: left;
}

.detail-don {
  float:right;
  margin-top:-52px;
  width: 170px;
  padding-left: 5px;
  position: relative;
  display: block;
}

.product_detail_btm{
  float:right;
  margin-top:-22px;
  width: 205px;
  margin-right: 40px;
  position: relative;
  display: block;
}

.product_detail_btm h4{
  float:right;
  text-align: left;
  font-size: 12px;
  margin-bottom: -0px;
}

.center-cam{
  justify-content: left;
}

.center-cam h4{
  justify-content: left;
}

.center-cam p{
  justify-content: left;
}

.product_detail_btm p {
  margin: 0;
  text-align: left;
  font-size:12px;
}

.product_price {
  margin: 0;
}

.starratin {
  padding: 0;
}

.progress {
  margin-top: -2px;
  height:5px;
}

.swiper-container {
  width:90%;
  margin-top:-35px;
}

.c_img img {
    height: 150px;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.c_detail_btm h4{
  font-size: 12px;
}

.c2_list {
  height: 135px;
}

.c2_img img {
    height: 85px;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.c2_detail_btm h4{
  margin: 5px 2px 5px 2px;
  font-size: 10px;
}

.c2_price {
  font-size:10px;
}

.product_list2 {
  min-height: 190px;
  transition: ease all 0.5s;
  box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
  border: 1px solid #dddddd;
  /* border-bottom: solid #aaaaaa 5px; */
  border-radius: 5px;
  background: #fff;
}

.cleaning .product_list2 {
  min-height: 340px;
  transition: ease all 0.5s;
}

.product_list2:hover,
.product_list2:focus {
  box-shadow: none;
  /* border-bottom: solid #1f5daa  5px; */
}

.product_img2 {
    display: inline;
  overflow: hidden;
  background: #f3f3f3;
}


.product_img2 img {
    height: 115px;
  width: 100%;
  object-fit: cover;
  border-radius: 5px;
}

.cleaning2 .product_img2 img {
  padding: 0;
}

.product_detail_btm2 h4 {
  margin: 10px 5px 0px 5px;
  font-size: 13px;
  text-align: center;
  height:35px;
}

.product_price2 {
  margin: 5px 15px 0 15px;
  text-align: left;
}
  }
</style>

<body id="default_theme" class="it_service" style="background:#fff;">

  @include('layouts.header')

    <div class="container siz" >
  <div class="section blog_list" style="padding:50px 0 50px 0;">
      <div class="row" id="camp">

        <!-- @ include('user.sidemenu') -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:650px;">
          <h2 class="topuser bottom_20 nyumput">Galang Dana</h2>
          <h2 class="topuser bottom_20 nyumput2">Galang Dana</h2>
          <hr class="nyumput2">
          <a href="{{url('buat-galang-dana')}}" type="submit" class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
            BUAT GALANG DANA SEKARANG
          </a>
              

      
      <div class="row">
        @foreach ($galang as $post)
        @if($post->id_users == Auth::user()->id)
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
          <a href="{{route('galangdana.detail',$post->deskripsi)}}">
            <div class="product_list">
              <div class="product_img">
                <img class="img-responsive" src="{{ asset('gambarUpload/'.$post->gambar)}}" alt=""> 
                <p class="status" style="{{($post->status == 1)? 'background:#1f5daa;':'background:#d90000;'}} left:12.5px;"> {{($post->status == 1)? 'Status: Aktif':'Status: Pending'}}</p>
              </div>
              <div class="product_detail_btm">
                <div class="center-cam">
                  <?php
                              $kalimat_kecil = strtolower($post->title);
                              $kalimat_new = ucwords($kalimat_kecil);
                              $arr = explode(" ", $kalimat_new);
                              
                              ?>
                            <h4><?= implode(" ",array_splice($arr,0,4))."..."?></h4>
                </div>
                <p class="center-cam">{{($post->kategori)}}<span class="fa fa-check"></span>
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
                        $date1 = strtotime($post->end_date);
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
              <!--    <td align="right" style="text-align:right; "><label class="label {{($post->status == 1)? 'label-success':'label-danger'}}">{{($post->status == 1)? 'status:aktif':'status:pending'}}</label></td>-->

              <!--</div>-->
              <div class="starratin center pt-2">
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
            {{ $galang->links() }}
          </div>
      </div>

    </div>

  </div>
</div>
</div>

@include('layouts.modal')
<!-- 
<div class="cprt col-md-12 center"  style="height: 50px; bottom:0px; position: relative;">
  <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
</div> 
 -->
<a href="{{url('buat-galang-dana')}}" type="submit" class="btbot main_bt col-md-12" style="border-radius:0px;">GALANG DANA SEKARANG</a>

@include('layouts.js')
</body>
</html>
