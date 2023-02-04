<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $data = strip_tags($post->artikel);
  $wa_data = substr($data,0, 100);
  ?>

  <meta property="og:url" content="https://berbagibahagia.org/program/{{($post->deskripsi)}}" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Berbagi Bahagia">
  <meta property="og:title" content="{{($post->title)}}" />
  <meta property="og:description" content="{{($data)}}" />
  <meta property="og:image" content="https://berbagibahagia.org/thumbnail/{{($post->gambar)}}" />
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="300" />
  <meta property="og:image:height" content="300" />
  <meta property="og:image:secure_url" content="https://berbagibahagia.org/thumbnail/{{($post->gambar)}}" />
  <!-- <meta property="og:locale" content="id_ID"> -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
  @include('layouts.css')
<style type="text/css">
  /* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
</head>


<body id="default_theme" class="it_service" style="background: #f2f2f2">

  <script>
   fbq('track', 'View Content');
 </script>

 <!-- loader -->
 <!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>-->

 @include('layouts.header')
 <div class="container" style="max-width: 540px">
 <div class="section d-flex justify-content-center" style="background:#fff; margin:0px 0 0 0; ">
 <div class="container" style="margin-top: 20px">
    <!-- <div class="row">
      <div class="col-md-12"> -->
        <div class="row hyu-cu">
          <div class="col-md-12">

            <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt="#"> </div>
            <input type="hidden" name="id_konten" value="{{$post->id_konten}}">
          </div>
          <div id="div1" class="col-xl-12 col-lg-12 col-md-12 product_detail_side detail_style1" style="margin-bottom:-50px; ">

            <div class="product-heading">
              <h2>{{($post->title)}}</h2>
            </div>
            <div class="product-detail-side">

             <p style="margin-bottom:-30px; text-align: left; font-size: 20px; padding-left: 10px">{{($post->kategori)}}<span class="fa fa-check" style="color:#17a5e9;"></span> </p>
             <div class="detail-contant "> 
              <table class="table" style="margin-bottom:-20px;">
                <tr style="border-top:2px solid #fff;">
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
                  <td><p style="font-size:12px;">
                      @if($post->id == 12)
                    @if($post->keterangan_dokumen == 1)
                    <span  style="font-size: 12px" class="badge badge-info">Disertai dokumen medis</span>
                    @else
                    <span style="font-size: 12px"  class="badge badge-warning">Belum Disertai dokumen medis</span>
                    @endif
                    @else
                    
                    @endif
                  </p>
                </td>

                @if($post->id_category == 'Open Goals'  )
                <td align="right"><p style="font-size:12px; color:#fff;">unlimited</p></td>
                @elseif($d > 0)
                <!-- <td  style="font-size:12px;"><b>{{($d)}} </b></td> -->
                <td align="right"><p style="font-size:12px;"><b>Sisa Waktu : {{($d)}} Hari </b></p></td>
                @elseif($d == 0)
                <!-- <td  style="font-size:12px;"><b>{{($d)}} </b></td> -->
                <td align="right"><p style="font-size:12px;"><b>Sisa Waktu : 1 Hari </b></p></td>
                @elseif($d < 0)
                <td align="right"><p style="font-size:12px;"><b> Sisa Waktu : 0 Hari </b></p></td>
                @endif  
              </tr>
            </table>
            @if($post->id_category == 'Open Goals')
            <div class="progress" style="width:100%;  margin-bottom:-10px; ">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            @else
            <div class="progress" style="width:100%;  margin-bottom:-10px; ">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{($post->terkumpul/$post->id_category*100)}}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            @endif
            <table class="table" style="margin-bottom:-20px;">
              <tr style="border-top:2px solid #fff;">
                <?php $jumlah = $post->terkumpul + $post->terkumpul_fnd; ?>
                <td align="left"><p style="font-size:12px;">Terkumpul <b>Rp. {{number_format($jumlah,0,",",".")}}</b></p></td>
                @if ($post->id_category == 'Open Goals'  )
                <td align="right"><p style="font-size:12px;"><b>{{($post->id_category)}}</b></p></td>
                @else
                <td align="right"><p style="font-size:12px;">Target <b>Rp. {{number_format($post->id_category,0,",",".")}}</b></p></td> 
                @endif
              </tr>

            </table>
            @if($d > 0 || $post->id_category == 'Open Goals')
            <a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
            @elseif ($d == 0)
            <a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
            @elseif ($d < 0)
            <button type="button" class="btn disabled col-md-12"
            style="border-radius:5px; background-color: gray;">CAMPIGN TELAH BERAKHIR</button>
            @endif
            <!--<a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>-->
          </div>
          <div><div class="tags center" style="font-size:12px; text-align:center;">
            <ul>
              <li><p style="margin-top:5px;">Bagikan : &nbsp &nbsp</p></li>
              <li>

                <!-- <div class="button" data-href="http://192.168.100.50:8000/program/{{$post->deskripsi}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://192.168.100.50:8000/program/{{$post->deskripsi}}" class="fb-xfbml-parse-ignore">Bagikan</a></div> -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://berbagibahagia.org/program/{{$post->deskripsi}}"
                  onclick="javascript:window.open(this.href, '', 'menubar=yes,toolbar=yes,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                  target="" title="Share on Facebook" target="_blank" style="width:110px;"><i class="fa fa-facebook"></i>&nbsp &nbsp <b>Facebook</b></a>
                </li>
                <li>&nbsp &nbsp </li>
                <li>
                <!-- <link itemprop="thumbnailUrl" href="https://192.168.100.50:8000/program/{{($post->deskripsi)}}"> 
                  <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> 
                    <link itemprop="url" href="https://192.168.100.50:8000/program/{{($post->deskripsi)}}"> 
                  </span>
                </link> -->
                
                <a href="https://api.whatsapp.com/send?text={{($post->title)}}%0a%0a{{($wa_data)}}...%0a%0ainformasi selengkapnya klik https://berbagibahagia.org/program/{{($post->deskripsi)}}" style="width:110px;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a>
              </li>   
            </ul>
          </div>
        </div>
      </div>
      <table class="table" style="margin-bottom:-20px; ">
        <tr align="center"><td>
         <p style="font-size:12px;">Bantu campaign ini dengan menjadi Fundraiser</p>
       </td></tr>
     </table>
     @if(Auth::check())
     <a href="{{route('fundraiser.detail',$post->deskripsi)}}" type="submit" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
     @else
     <a href="#" type="submit" data-toggle="modal" data-target="#login" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
     @endif
     <br />
     <p style="font-size:12px;">Campaign ini mencurigakan? <b><a href="https://api.whatsapp.com/send?phone=+628112484484Whatsap&text=Campaign Ini Mencurigakan {{($post->title)}}" style="color:#17a5e9;">Laporkan</a></b></p>
   </div>
 </div>
 <div style="width: 100%">
  <div class="full">
    <div class=" accordion border_circle" style="padding-top:50px;">
      <div class="bs-example ">
        <div class="panel-group col-md-12" id="accordion" >
          <div class="panel panel-default">
            <div class="panel-heading">
              <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-pencil"></i> Deskripsi<i class="fa fa-angle-down"></i></a> </p>
            </div>
            
            <div id="collapseOne" class="panel-collapse active">
              <div align="justify" class="read-more">
                              <!--<table class="table">
                                <tr><td align="justify" class="read-more">-->
                                  <p class="read-more" >{!!html_entity_decode($post->artikel)!!}
                                    @if($post->id_disclaimer != null)
                                    <div class="card mb-2 nyumput" style="margin-left:auto;margin-right:auto;width:80%;background:#f5f5f5;min-height:80px;">
                                      <div class="card-body">
                                        <p style="font-size:12px;text-align:center;"><b>Disclaimer :</b> {!!html_entity_decode($disclaimer->deskripsi)!!}</p>
                                      </div>
                                    </div>
                                    <div class="card mb-2 nyumput2" style="margin-left:auto;margin-right:auto;width:100%;background:#f5f5f5;min-height:80px;">
                                      <div class="card-body">
                                        <p style="font-size:12px;text-align:center;"><b>Disclaimer :</b> {!!html_entity_decode($disclaimer->deskripsi)!!}</p>
                                      </div>
                                    </div>
                                    @elseif($post->des_disclaimer != null)
                                    <div class="card mb-2 nyumput" style="margin-left:auto;margin-right:auto;width:80%;background:#f5f5f5;min-height:80px;">
                                      <div class="card-body">
                                        <p style="font-size:12px;text-align:center;"><b>Disclaimer :</b> {!!html_entity_decode($post->des_disclaimer)!!}</p>
                                      </div>
                                    </div>
                                    <div class="card mb-2 nyumput2" style="margin-left:auto;margin-right:auto;width:100%;background:#f5f5f5;min-height:80px;">
                                      <div class="card-body">
                                        <p style="font-size:12px;text-align:center;"><b>Disclaimer :</b> {!!html_entity_decode($post->des_disclaimer)!!}</p>
                                      </div>
                                    </div>
                                    @elseif($post->id_disclaimer == null && $post->des_disclaimer == null)
                                    @endif



                              <!--</td></tr>
                              </table>-->
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-bullhorn"></i> Update Terbaru<i class="fa fa-angle-down"></i></a> </p>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">

                              @foreach ($info as $ifk)
                              <?php 
                            // $apa = explode(' ', $ifk->artikel);

                              if($ifk->id_cairdana != null){
                                ?>
                                <div class="card mt-2" style="background-color:#f2f2f2">
                                <?php }else{?>
                                  <div class="card mt-2">
                                  <?php } ?>
                                  <div class="card-body">
                                    <span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>{{$ifk->created_at->isoFormat('dddd, D MMMM Y')}}</span>
                                    <hr>
                                    <p class="text-small mt-2 font-weight-light">{!!html_entity_decode($ifk->artikel)!!}</p>
                                  </div>
                                </div>
                                @endforeach 
                                <!--  <table class="table">-->
                                  <!--  <tr><td align="justify">-->
                                    <!--@foreach ($info as $ifk)-->
                                    <!--    <p >{!!html_entity_decode($ifk->artikel)!!}</p>-->
                                    <!--    @endforeach-->
                                    <!--  </td></tr>-->
                                    <!--  </table>-->
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-users"></i> Donatur ({{($jum_donate)}})<i class="fa fa-angle-down"></i></a> </p>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                  <div class="panel-body shopping-cart">
                                    <table class="table" style="font-size:12px; color:black;">
                                      {{ csrf_field() }}
                                      <div id="post_data">

                                      </div>
                                      <!--<tr><td colspan="3"><p>Total Donatur : {{($total_donatur)}}</p></td></tr>-->
                                    </table>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-child" aria-hidden="true"></i> Fundraiser<i class="fa fa-angle-down"></i></a> </p>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse in">
                                  <div class="panel-body shopping-cart">
                                    <table class="table" style="font-size:12px;">
                                      @foreach ($list_fundraiser as $fdn)
                                      @if($fdn->terkumpul != 0)
                                      <tr>
                                        <td rowspan="3" width="10%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>
                                        <td width="20%" style="font-size:14px;">{{$fdn->nama}}</td>
                                        <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>Rp.{{number_format($fdn->terkumpul,0,",",".")}}</b></td>
                                      </tr>
                                      <tr>
                                        <td>  <a href="{{route('programfdn.detail',$fdn->deskripsi)}}" type="submit">{{$fdn->title}}</a></td>
                                      </tr>
                                      <tr >
                                        <!--<td>Telah mengajak <b>5</b> untuk berdonasi</td>-->
                                      </tr>
                                      <tr><td colspan="3"><hr></td></tr>
                                      <tr>
                                        <!--<td rowspan="3" width="20%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>-->
                                        <!--<td width="40%" style="font-size:14px;">Nama Fundraiser</td>-->
                                        <!--<td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>Rp. </b></td>-->
                                      </tr>
                                      <tr>
                                        <!--<td>Judul Campaign</td>-->
                                      </tr>
                                      <tr >
                                        <!--<td>Telah mengajak <b>5</b> untuk berdonasi</td>-->
                                      </tr>
                                      <tr><td colspan="3"><hr></td></tr>
                                      @endif
                                      @endforeach
                                    </table>
                                    <div class="center">
                                      <ul class="pagination style_1">
                                        <!--<li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>-->
                                        <!--<li class="active"><a href="#">1</a></li>-->
                                        <!--<li><a href="it_blog_grid.html">2</a></li>-->
                                        <!--<li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>-->
                                      </ul>
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
                </div>

              <!-- </div>
              </div> -->
            </div>
          </div>

          @include('layouts.modal')

          <!-- <div class="cprt col-md-12 center"  style="bottom:0px; position: relative;">
            <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
          </div>  -->

          <!--<div class="share-don col-md-4"> <a href="#" class="share-text">Bantu Share</a>-->
            <!--  <ul class="social_icons">-->
              <!--    <li><a href="#" style="color:#000;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
              <!--    <li><a href="#" style="color:#000;"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>-->
              <!--    <li><a href="#" style="color:#000;"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
              <!--    <li><a href="#" style="color:#000;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
              <!--    <li><a href="#" style="color:#000;"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
              <!--  </ul>-->
              <!--</div>    -->
              <!--<a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="don main_bt col-md-12" style="border-radius:0px; z-index:999;">DONASI SEKARANG</a>-->
              <div class="nyumput2">
               @if($d > 0 || $post->id_category == 'Open Goals')
               <a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="don main_bt col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
               @elseif ($d < 0)
               <a href="#" type="submit" class="don disabled col-md-12"  style="border-radius:0px; background-color: gray;">CAMPIGN TELAH BERAKHIR</a>
               <!--<button type="button" class="btn don disabled col-md-12"-->
                <!--                              style="border-radius:5px; background-color: gray;">CAMPIGN TELAH BERAKHIR</button>-->
                @endif
              </div>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>

              <script>
                var element = document.getElementById("div1");
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
                  element.classList.remove("fixed-content");
                }
              </script>

              @include('layouts.js')

              <script>
                $(document).ready(function(){

                 var _token = $('input[name="_token"]').val();
                 var id_konten = $('input[name="id_konten"]').val();

                 load_data('', _token);

                 function load_data(id="", _token)
                 {
                  $.ajax({
                    url:"https://berbagibahagia.org/program",
                    method:"POST",
                    data:{id:id, _token:_token,id_konten:id_konten},
                    success:function(data)
                    {
                      $('#load_more_button').remove();
                      $('#post_data').append(data);
                    }
                  })
                }

                $(document).on('click', '#load_more_button', function(){
                  var id = $(this).data('id');
                  $('#load_more_button').html('<b>Loading...</b>');
                  load_data(id, _token);
                });

              });
            </script>
          </body>
          </html>
