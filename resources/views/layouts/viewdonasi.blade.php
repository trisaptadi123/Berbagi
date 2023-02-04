<div class="section d-flex justify-content-center" style="padding:10px 0 10px 0; background:#fff; margin:5px 0 0 0;">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <table class="table head" style="border-top:2px solid #fffffe;">
              <tr><td>
                    <h5 style="margin: 0 0 5px 0; text-transform: capitalize;">Berbagi Bersama Kami</h5>
                <hr/>
              </td><td align="right">
            <a href="{{url('semuadonasi')}}" style="color: #00aeef">Lihat Semua</a>
          </td>
              </tr></table>
          </div>
        </div>
      </div>
      <!-- kaih id="campaign" -->
      <div class="row" id="campaignnn">
	    <div class="swiper-container" style=" z-index:0; width: 500px;padding: 5px; overflow-x: scroll;">
    	<div class="swiper-wrapper">
           @foreach ($post_list as $post)
          @if($post->status == 1)
	    <div class="swiper-slide" style="padding-bottom: 15px">
          <a href="{{route('program.detail',$post->deskripsi)}}">
          <div class="product_list2">
            <div class="product_img2"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""> </div>
            <div class="product_detail_btm2">
              <div class="center">
                  <?php
                  $kalimat_kecil = strtolower($post->title);
                  $kalimat_new = ucwords($kalimat_kecil);
                  
                  ?>
                <h4 style="font-size: 11px"><b>{{ substr($kalimat_new,0,50) }}</b></h4>
              </div>
              <br>
              <p class="center author" style="font-size: 12px">{{($post->kategori)}}<span class="fa fa-check" style="color:#1f5daa;"></span>
              <hr style="margin:0;">
              <div class="product_price2 shopping-cart" style="font-size:12px;">
                <table class="table">
                <tr style="margin-bottom:-10px;">
                <td align="left" >Terkumpul</td> 
                <td align="right" style="text-align:right; ">Sisa Waktu</td>
                </tr>
                <tr  style=" border-top: 2px solid #ffffff;">
                    <?php $jumlah = $post->terkumpul + $post->terkumpul_fnd; ?>
                <td align="left"><b>Rp.{{number_format($jumlah,0,",",".")}}</b></td>
                <?php
                  $date1 = strtotime($post->end_date);
                       $date2 = time();
                       $subTime = $date1 - $date2;
                       $d = ($subTime/(60*60*24))%365;
                       $h = ($subTime/(60*60))%24;
                       $m = ($subTime/60)%60;
                      
                    //   if ($d>0) {
                    //       echo $d." hari\n";             
                    //   }          
                   ?>
              @if ($post->id_category == 'Open Goals'  )
                <td align="right" style="text-align:right; font-size:20px; line-height:10px;"><span>&#8734;</span></td>
              @elseif($d > 0)
                <td align="right" style="text-align:right;"><b>{{($d)}} Hari </b></td>
              @elseif($d < 0)
                <td align="right" style="text-align:right;"><b>0 Hari </b></td>
              @endif
                </tr>
                </table>
              </div>	
              </p>
            </div>
              <div class="starratin2 center">
              @if ($post->id_category == 'Open Goals'  )
              <div class="progress" style="width:100%;">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              @else
              <div class="progress" style="width:100%;">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{($post->terkumpul/$post->id_category*100)}}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              @endif
              </div>
          </div>
          </a>
        </div>
         @else
        <h3 style="margin: 0 0 5px 0;"></h3>
        @endif
        @endforeach
        </div>
        </div>
          <!--    <div class="center">-->
          <!--        <div class="col-md-6 text-center">-->
          <!--<p><a href="{{url('/semuadonasi')}}" class="col-md-6" style="margin-top:20px; width:250px; border-radius:10px;color:#00aeef">Semua Campaign</a></p>-->
          <!--        </div>-->
          <!--    </div>-->
      </div>
    </div>
  </div>

