<!DOCTYPE html>
<html lang="en">

<head>
<?php
  $data = strip_tags($post->artikel);
  $wa_data = substr($data,0, 100);
?>

    <meta property="og:url" content="https://657e147121e7.ngrok.io/program/{{($post->deskripsi)}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Berbagi Bahagia">
    <meta property="og:title" content="{{($post->title)}}" />
    <meta property="og:description" content="{{($data)}}" />
    <meta property="og:image" content="https://657e147121e7.ng rok.io/thumbnail/{{($post->gambar)}}" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:secure_url" content="https://657e147121e7.ngrok.io/thumbnail/{{($post->gambar)}}" />
    <!-- <meta property="og:locale" content="id_ID"> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-190585504-1">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-190585504-1');
</script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9R5DEQ4RQQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9R5DEQ4RQQ');
</script>
    <meta name="google-site-verification" content="Fmlb12VoM4qM8dqNecMaOVjWruES3uwCdjHdqySpmCo" />
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>berbagibahagia.org</title>
    

   
    

      <!-- site icons -->
      <link rel="icon" href="{{asset('kuy/images/loaders/BB.png')}}" type="image/gif" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('kuy/css/bootstrap.min.css')}}" />
      <!-- Site css -->
      <link rel="stylesheet" href="{{asset('kuy/css/style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('kuy/css/responsive.css')}}" />
      <!-- colors css -->
      <link rel="stylesheet" href="{{asset('kuy/css/colors1.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('kuy/css/custom.css')}}" />
      <!-- wow Animation css -->
      <link rel="stylesheet" href="{{asset('kuy/css/animate.css')}}" />
      <!-- revolution slider css -->
      
      
      <link rel="stylesheet" type="text/css" href="{{asset('kuy/revolution/css/settings.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('kuy/revolution/css/layers.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('kuy/revolution/css/navigation.css')}}" />
      <link rel="stylesheet" href="{{asset('kuy/css/car.css')}}" />
     
      <link rel="stylesheet" href="{{asset('kuy/css/swiper-bundle.css')}}" />
      <link rel="stylesheet" href="{{asset('kuy/css/swiper-bundle.min.css')}}" />
      
      <link rel="stylesheet" href="{{asset('kuy/editor/rte_theme_default.css')}}" />
        
        <style>
          .fixed-content {
             /* top: 0;
            bottom:0; */
            margin-left:800px;
            max-width:450px;
            position:fixed;
            /* overflow-y:scroll; */
            /* overflow-x:hidden; */
        }
        </style>
            
  
  
  
  <!-- Pixel Berbagibahagiaorg -->
  <!-- <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1331468317200906');
  fbq('track', 'PageView');
  </script>
  
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1331468317200906&ev=PageView&noscript=1"
  /></noscript> -->
 
  <!-- End Facebook Pixel Code -->
      </head>
      

<body id="default_theme" class="it_service" style="background:#f7f7f7;">
    
<script>
 fbq('track', 'View Content');
</script>

<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>-->

@include('layouts.header')

<div class="section product_detail" style="padding-bottom:75px; margin-bottom:10px;">
    <div class="container" style="max-width: 510px;  background: #fff; padding-top:30px;">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
             
              <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt="#"> </div>
                 
            </div>
            <div id="div1" class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="max-width: 540px">
            
              <div class="product-heading">
                <h2>{{($post->judul)}}</h2>
              </div>
              <div class="product-detail-side">
                @if(Request::segment(2) == 'qurban')
                <h4>Harga per ekor</h4>
               @else
                <h4>Harga per paket</h4>
               @endif
                <p style="margin-bottom:0px; "><b>Rp. {{number_format($post->harga,0,",",".")}}</b></p>
               <p style="margin-bottom:0px;">{{($post->name)}}<span class="fa fa-check" style="color:#17a5e9;"></span> </p>
               <br>
               <p style="margin-bottom:0px; ">Sudah terkumpul <b>Rp. {{number_format($jumlah,0,",",".")}}</b></p>
              <div class="detail-contant ">	
              
             
              </table>
              @if(Request::segment(2) == 'qurban')
                  <a href="{{url('bayar')}}/{{Request::segment(2)}}/{{$post->link}}" type="submit" class="btn main_bt  col-lg-12 col-md-12 col-sm-6 col-xs-12" style="border-radius:0px;">QURBAN SEKARANG</a>
              @else
                  <a href="{{url('bayar')}}/{{Request::segment(2)}}/{{$post->link}}" type="submit" class="btn main_bt  col-lg-12 col-md-12 col-sm-6 col-xs-12" style="border-radius:0px;">DONASI SEKARANG</a>
              @endif
              </div>
              <div><div class="tags center" style="font-size:12px; text-align:center;">
              <ul>
                <li><p style="margin-top:5px;">Bagikan : &nbsp &nbsp</p></li>
                <li>
                
                <!-- <div class="button" data-href="http://192.168.100.50:8000/program/{{$post->deskripsi}}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://192.168.100.50:8000/program/{{$post->deskripsi}}" class="fb-xfbml-parse-ignore">Bagikan</a></div> -->
                 <a href="https://www.facebook.com/sharer/sharer.php?u=https://657e147121e7.ngrok.io/program/{{$post->link}}"
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
                
                <a href="https://api.whatsapp.com/send?text={{($post->link)}}%0a%0a{{($wa_data)}}...%0a%0ainformasi selengkapnya klik https://657e147121e7.ngrok.io/program/{{($post->deskripsi)}}" style="width:110px;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a>
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
               <a href="{{route('fundraiser.detail',$post->link)}}" type="submit" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
               @else
               <a href="#" type="submit" data-toggle="modal" data-target="#login" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
              @endif
               <br />
			   <p style="font-size:12px;">Campaign ini mencurigakan? <b><a href="https://api.whatsapp.com/send?phone=+6285223231818Whatsap&text=Campaign Ini Mencurigakan {{($post->title)}}" style="color:#17a5e9;">Laporkan</a></b></p>
            </div>
          </div>
          <div style="width: 100%">
              <div class="full">
                <div class=" accordion border_circle" style="padding-top:50px;">
                  <div class="bs-example ">
                    <div class="panel-group col-lg-12 col-md-8" id="accordion" >
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-pencil"></i> Deskripsi<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseOne" class="panel-collapse active">
                          <div >
                              <table class="table">
                              <tr><td align="justify" class="read-more">
                                <p class="read-more">{!!html_entity_decode($post->deskripsi)!!}</p>
                              </td></tr>
                              </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-bullhorn"></i> Update Terbaru<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="panel-body">
                          <table class="table">
                              <tr><td align="justify">
                            @foreach ($info as $ifk)
                                <p>{!!html_entity_decode($ifk->artikel)!!}</p>
                                @endforeach
                              </td></tr>
                              </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-users"></i> Donatur ({{($total_donatur)}})<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body shopping-cart">
                          <table class="table" style="font-size:12px;">
                                @foreach ($list_donatur as $donatur)
                              
                              <tr>
                              <td rowspan="3" width="10%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>
                              @if($donatur->anonim == 1)
                              <td width="55%" style="padding-left:10px;" align="left">Anonim</td>
                              @endif
                              @if($donatur->anonim != 1)
                              <td width="55%" style="padding-left:10px;" align="left">{{($donatur->nama)}}</td>
                              @endif
                              <td rowspan="3" width="35%" align="right" style="padding-left:10px; color:#1f5daa;"><b>Rp. {{number_format($donatur->total+$donatur->kode,0,",",".")}}</b></td>
                              </tr>
                              <tr>
                              <td style="padding-left:10px;">{{($donatur->created_at->isoFormat('dddd, D MMMM Y'))}}</td>
                              </tr>
                              <tr >
                              <td style="padding-left:10px;">{{($donatur->pesan)}}</td>
                              </tr>
                              <tr><td colspan="3"><hr></td></tr>
                              
                              
                              @endforeach
                              <!--<tr><td colspan="3"><p>Total Donatur : {{($total_donatur)}}</p></td></tr>-->
                              </table>
                              <div class="center" style="z-index:0;">
                                  
                                  <br/>
                                {{ $list_donatur->OnEachSide(1)->links() }}
                              </div>
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
          
        </div>
        
      </div>
    </div>

@include('layouts.modal')

      <div class="cprt col-md-12 center"  style="bottom:0px; position: relative;">
        <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
      </div> 
      
            <!--<div class="share-don col-md-4"> <a href="#" class="share-text">Bantu Share</a>-->
            <!--  <ul class="social_icons">-->
            <!--    <li><a href="#" style="color:#000;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
            <!--    <li><a href="#" style="color:#000;"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>-->
            <!--    <li><a href="#" style="color:#000;"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
            <!--    <li><a href="#" style="color:#000;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
            <!--    <li><a href="#" style="color:#000;"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>-->
            <!--  </ul>-->
            <!--</div>	  -->
            <div class="nyumput2">
            @if(Request::segment(2) == 'qurban')
                <a href="{{url('bayar')}}/{{Request::segment(2)}}/{{$post->link}}" type="submit" class="don main_bt col-md-12" style="border-radius:0px; z-index:999;">QURBAN SEKARANG</a>
            @else
                <a href="{{url('bayar')}}/{{Request::segment(2)}}/{{$post->link}}" type="submit" class="don main_bt col-md-12" style="border-radius:0px; z-index:999;">DONASI SEKARANG</a>
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
      
</body>
</html>
