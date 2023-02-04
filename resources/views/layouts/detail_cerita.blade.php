<!DOCTYPE html>
<html lang="en">


<head>
    <?php
  $i = strip_tags($data->artikel);
  $wa_data = substr($i,0, 100);
?>
<meta property="og:url" content="https://berbagibahagia.org/cerita/{{($data->link)}}"/>
<meta property="og:type" content="website" />
<meta property="og:site_name" content="Berbagi Bahagia">
<meta property="og:title" content="{{($data->judul)}}" />
<meta property="og:description" content="{{$i}}" />
<meta property="og:image" content="https://berbagibahagia.org/thumbnail/{{($data->gambar_cerita)}}" />
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />
<meta property="og:image:secure_url" content="https://berbagibahagia.org/thumbnail/{{($data->gambar_cerita)}}" />
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
            /*widht:400px;*/
            /*min-width:300px;*/
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

<body id="default_theme" class="it_service">
<!-- loader -->


@include('layouts.header')

<!-- section -->
<div class="section blog_grid" style="padding-top:30px;">
  <div class="container" style="max-width: 540px">
    <div class="row">
  <div class="center">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right">
        <div class="full">
          <div class="blog_section margin_bottom_0">
            <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$data->gambar_cerita)}}" alt="#"> </div>
            <div class="blog_feature_cantant">
              <p class="blog_head">{{$data->judul}}</p>
              <p>{!!html_entity_decode($data->artikel)!!}</p>
              <div class="post_info">
                <ul>
                  <li><i class="fa fa-user" aria-hidden="true"></i> BerbagiBahagia.org</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$data->created_at->isoFormat('dddd, D MMMM Y')}}</li>
                </ul>
              </div>
              <p style="align:center;">  <br>
              <br>
              </p>
            <div class="bottom_info margin_bottom_30_all">
              <div class="pull-right">
                <div class="shr">Share: </div>
                <div class="social_icon">
                  <ul>
                  <li> <a href="https://www.facebook.com/sharer/sharer.php?u=https://berbagibahagia.org/cerita/{{$data->link}}"
                  onclick="javascript:window.open(this.href, '', 'menubar=yes,toolbar=yes,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                  target="" title="Share on Facebook" target="_blank" style="width:110px;"><i class="fa fa-facebook"></i>&nbsp &nbsp <b>Facebook</b></a></li>
                  
                  
                  <li><a href="https://api.whatsapp.com/send?text={{($data->judul)}}%0a%0a{{($wa_data)}}...%0a%0ainformasi selengkapnya klik https://berbagibahagia.org/cerita/{{$data->link}}" style="width:110px;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a></li>
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
<!-- end section -->
@include('layouts.modal')

<!--@ include('layouts.footer')-->
@include('layouts.footer_plus')
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@include('layouts.js')

</body>
</html>
