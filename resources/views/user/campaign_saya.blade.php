<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service" >

@include('layouts.header')

<div class="section blog_list" style="padding:50px 0 50px 0; background:#fff;">
  <div class="container" style="max-width: 540px">
    <div class="row" id="camp">
      
    <!-- @ include('user.sidemenu') -->
    <!--<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="min-height:650px;">
    <h2 class="topuser bottom_20 nyumput">Galang Dana</h2>
    <a href="{{url('buat-galang-dana')}}" type="submit" class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
    BUAT GALANG DANA SEKARANG
    </a>
    <h3 class="topuser">Galang Dana Saya</h3>  
         <div class="row">
            @foreach ($galang as $post)
            @if($post->id_users == Auth::user()->id)
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
            <a href="{{route('galangdana.detail',$post->deskripsi)}}">
            <div class="product_list">
              <div class="product_img">
                <img class="img-responsive" src="{{ asset('gambarUpload/'.$post->gambar)}}" alt=""> 
		            <p class="status" style="{{($post->status == 1)? 'background:#1f5daa;':'background:#d90000;'}} left:12.5px;"> {{($post->status == 1)? 'Status: Aktif':'Status: Pending'}}</p>
              </div>
              <div class="product_detail_btm">
                <div class="center-cam">
                  <h4>{{substr($post->title,0,50)}}</h4>
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
                  <td align="left"><b>Rp. {{($post->terkumpul)}}</b></td> 
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
          </div>-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:650px;">
          <h2 class="topuser bottom_20 nyumput">Galang Dana</h2>
          <h2 class="topuser bottom_20 nyumput2">Galang Dana</h2>
          <hr class="nyumput2">
          <a href="{{url('buat-galang-dana')}}" type="submit" class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
            BUAT GALANG DANA SEKARANG
          </a>
              <div class="row">
                <div class="col-md-12">
                  <div class="full">
                    <table class="table head" style="border-top:2px solid #fffffe;">
                      <tr><td>
                        <h3 style="margin: 0 0 5px 0;">Galang Dana Saya</h3>
                        <hr/>
                      </td>
                    </tr></table>
                  </div>
                </div>
              </div>
              @if($galang->count() == 0)
                <p style="text-align:center">Belum ada Galang dana</p>
              @else
              <div class="row" id="campaignnn">
               <div class="swiper-container" style=" z-index:0; padding:5px; width: 500px; overflow-x: scroll;">
                 <div class="swiper-wrapper" >
                   
                   @foreach ($galang as $post)
                   @if($post->id_users == Auth::user()->id)
                   <div class="swiper-slide" style="padding-bottom: 15px">
                    <a href="{{route('galangdana.detail',$post->deskripsi)}}">
                      <div class="product_list2">
                        <div class="product_img2"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt="">
                          <p class="status" style="{{($post->status == 1)? 'background:#1f5daa;':'background:#d90000;'}} left:12.5px;"> {{($post->status == 1)? 'Status: Aktif':'Status: Pending'}}</p>
                        </div>
                        <div class="product_detail_btm2">
                          <div class="center">
                            <?php
                              $kalimat_kecil = strtolower($post->title);
                              $kalimat_new = ucwords($kalimat_kecil);
                              $arr = explode(" ", $kalimat_new);
                              
                              ?>
                            <h4 style="font-size: 14px; margin: 5px;"><?= implode(" ",array_splice($arr,0,4))."..."?></h4>
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
                     </div>
                   </a>
                 </div>
                 @else
                 <h3 style="margin: 0 0 5px 0;"></h3>
                 @endif
                 @endforeach
               </div>
             </div>
             @endif
             @if($galang->count() != 0)
             <div class="center">
              <div class="col-md-6 text-center">
                <p><a href="{{url('galangdana/semua')}}" class="col-md-6 btn main_bt" style="margin-top:20px; width:250px; border-radius:10px;">Lihat Semua</a></p>
              </div>
            </div>
            @endif
            
          </div>

          <div class="row" id="campaignnn">
                <div class="col-md-12">
                  <div class="full">
                    <table class="table head" style="border-top:2px solid #fffffe;">
                      <tr><td>
                        <h3 style="margin: 0 0 5px 0;">Fundraiser</h3>
                        <hr/>
                      </td>
                    </tr></table>
                  </div>
                </div>
              </div>
              @if($fundraiser->count() == 0)
                <p style="text-align:center">Belum ada Fundraiser</p>
              @else
              <div class="row" id="campaignnn">
                  
               <div class="swiper-container" style=" z-index:0; padding:5px; width: 500px; overflow-x: scroll;">
                 <div class="swiper-wrapper" >
                   
                   @foreach ($fundraiser as $fun)
                   @if($fun->id_users == Auth::user()->id)
                   <div class="swiper-slide" style="padding-bottom: 15px">
                    <a href="{{route('programfdn.detail',$fun->deskripsi)}}">
                      <div class="product_list2">
                        <div class="product_img2"> <img class="img-responsive" src="{{asset('gambarUpload/'.$fun->gambar_fdn)}}" alt="">
                          <p class="status" style="{{($fun->status == 1)? 'background:#1f5daa;':'background:#d90000;'}} left:12.5px;"> {{($fun->status == 1)? 'Status: Aktif':'Status: Pending'}}</p>
                        </div>
                        <div class="product_detail_btm2">
                          <div class="center">
                              <?php
                                $kalimat_kecil = strtolower($fun->title);
                                $kalimat_new = ucwords($kalimat_kecil);
                                $arr2 = explode(" ", $kalimat_new);
                              ?>
                            <h4 style="font-size: 14px; margin: 5px;">{{implode(" ",array_splice($arr2,0,4))."..."}}</h4>
                          </div>
                          <p class="center author">{{($fun->kategori)}}<span class="fa fa-check" style="color:#1f5daa;"></span>
                            <hr style="margin:0;">
                            <div class="product_price2 shopping-cart" style="font-size:10px;">
                              <table class="table">
                                <tr style="margin-bottom:-10px;">
                                  <td align="left" >Terkumpul</td> 
                                  <td align="right" style="text-align:right; ">Sisa Waktu</td>
                                </tr>
                                <tr  style=" border-top: 2px solid #ffffff;">
                                  <td align="left"><b>Rp. {{number_format($fun->terkumpul,0,",",".")}}</b></td> 
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
                     </div>
                   </a>
                 </div>
                 @else
                 <h3 style="margin: 0 0 5px 0;"></h3>
                 @endif
                 @endforeach
                 
               </div>
             </div>
             @endif
             @if($fundraiser->count() != 0)
             <div class="center">
              <div class="col-md-6 text-center">
                <p><a href="{{url('/allfundraiser')}}" class="col-md-6 btn main_bt" style="margin-top:20px; width:250px; border-radius:10px;">Lihat Semua</a></p>
              </div>
            </div>
            @endif
            
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      @include('layouts.footer_new')
    </div>
  
    </div>

    

    </div>
  </div>
</div>

@include('layouts.modal')

     <!--  <div class="cprt col-md-12 center nyumput2"  style="height: 50px; bottom:0px; position: relative;">
        <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
      </div>  -->
      
			<a href="{{url('buat-galang-dana')}}" type="submit" class="btbot main_bt col-md-12" style="border-radius:0px;">GALANG DANA SEKARANG</a>
	  
@include('layouts.js')
</body>
</html>
