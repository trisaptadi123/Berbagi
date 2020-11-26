<div class="section" style="padding:10px 0 10px 0; background:#fff; margin:5px 0 0 0;">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="text_align_center bottom_20">
              <h3>Program Unggulan</h3>
              <div class="head center">
              <hr style="margin:-10px 0 20px 0;"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="campaign">
	    <div class="swiper-container" style=" z-index:0;">
    	<div class="swiper-wrapper" >
           @foreach ($post_list as $post)
         
	    <div class="swiper-slide">
          <a href="{{route('program.detail',$post->deskripsi)}}">
          <div class="product_list2">
            <div class="product_img2"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""> </div>
            <div class="product_detail_btm2">
              <div class="center">
                <h4>{{($post->title)}}</h4>
              </div>
              <p class="center author">{{($post->kategori)}}<span class="fa fa-check" style="color:#1f5daa;"></span>
              <hr style="margin:0;">
              <div class="product_price2 shopping-cart" style="font-size:10px;">
                <table class="table">
                <tr style="margin-bottom:-10px;">
                <td align="left" >Terkumpul</td> 
                <td align="right" style="text-align:right; ">Sisa Waktu</td>
                </tr>
                <tr  style=" border-top: 2px solid #ffffff;">
                <td align="left"><b>Rp.{{($post->terkumpul)}}</b></td> 
                <td align="right" style="text-align:right;"><b> <?php
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
              <div class="starratin2 center">
                  <div class="progress" style="width:100%;">
                      <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
          </div>
          </a>
        </div>
        @endforeach
        </div>
        </div>
              <div class="center">
                  <div class="col-md-6 text-center">
          <p><a href="{{url('/semuadonasi')}}" class="col-md-6 btn main_bt" style="margin-top:20px; width:250px; border-radius:10px;">Lihat Semua</a></p>
                  </div>
              </div>
      </div>
    </div>
  </div>

