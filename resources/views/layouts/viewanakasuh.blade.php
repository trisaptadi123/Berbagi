
<div class="section d-flex justify-content-center" style="padding:0 0 10px 0; background:#fff; margin:5px 0 0 0;">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
      <div class="full">
        <table class="table head" style="border-top:2px solid #fffffe;">
          <tr><td>
            <h5 style="margin: 0 0 5px 0; text-transform: capitalize;">Berbagi Pendidikan</h5>
            <hr/>
          </td>
          <td align="right">
            <a href="{{url('/layouts/semuaanakasuh')}}" style="color: #00aeef">Lihat Semua</a>
          </td></tr></table>
        </div>
      </div>
    </div>
    <!-- tambahkan id="anak" -->
    <div class="row"  id="campaignnn">
     <div class="swiper-container"  style=" z-index:0; width: 500px;padding: 5px; overflow-x: scroll;">
       <div class="swiper-wrapper" >
        @foreach ($anak as $anak)
        <div class="swiper-slide" style="padding-bottom: 15px">
          <!-- <a href="#"> -->
          <?php $nama = str_replace(" ","-", $anak->nama); ?>
           <a href="{{route('programs.detail',$nama)}}">
           <!--<a href="{{route('programs.detail',$anak->nama)}}">-->
            <div class="c_list">
              <div class="c_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$anak->gambar_anak)}}" alt="#"> </div>
              <div class="c_detail_btm">
                <h4 style="font-size: 12px"><b>{{$anak->nama}}</b></h4>
                <hr style="margin:0;">
                <div class="c_price shopping-cart" style="font-size:9px;">
                  <table class="table" style="font-size: 10px">
                    <tr style="margin-bottom:-10px;">
                      <td align="left" width="60%"><span class="fa fa-book"></span> {{$anak->kriteria}}</td> 
                      <td align="right" width="40%" style="text-align:right; "><span class="fa fa-graduation-cap"></span> {{$anak->jp}}</td>
                    </tr>
                    <tr style="margin-bottom:-10px;">
                      <td align="left" width="60%"><span class="fa fa-map-marker"></span> {{$anak->cabang}}</td> 
                      <td align="right" width="40%" style="text-align:right; "><span class="fa fa-child"></span> {{$anak->shelter}}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </a>
        </div>
        
        @endforeach
      </div>
    </div>	
  </div>
</div>
</div>