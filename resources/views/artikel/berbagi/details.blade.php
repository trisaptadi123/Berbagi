<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<head>
<?php
  $data = strip_tags($infoberbagi->isi);
  $wa_data = substr($data,0, 100);
  $link = $kategori->name."/".$infoberbagi->deskripsi;
?>
    <meta property="og:url" content="https://berbagibahagia.org/berbagiinfo/{{$link}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Berbagi Bahagia">
    <meta property="og:title" content="{{($infoberbagi->judul)}}" />
    <meta property="og:description" content="{{($data)}}" />
    <meta property="og:image" content="https://berbagibahagia.org/thumbnail/{{($infoberbagi->gambar)}}" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:secure_url" content="https://berbagibahagia.org/thumbnail/{{($infoberbagi->gambar)}}" />
    <style type="text/css">
      .box-hyu {
         background : #f2f2f2;
         padding: 20px;
         color: white;
         margin: 0 auto; /* code ini akan membuat div berada di tengah atas */
        
    }
     blockquote {
            overflow:hidden;
            max-width: 100%;
            height : auto;
            font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
            color: #428bca;
            padding : 0 20px 0 0;
            border-left: 4px solid #428bca;
        }
        blockquote p a {
            color : #1f5daa;
            padding : 0;
        }
        blockquote p {
            padding : 0;
            margin-left : 20px;
            margin-right : auto;
            margin-bottom : auto;
            margin-top : auto;
            width: max-content;
            height: max-content;
        }

    
    </style>
    
</head>

<body id="default_theme" class="it_service">
<!-- loader -->
@include('layouts.header')

<!-- section -->
<div class="section blog_grid" style="padding-top:30px;">
  <div class="container">
    <div class="row">
  <div class="center">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
        <div class="full">
          <a href="{{url('berbagiinfo-me/'.$name)}}">Berbagi Info <i class="fa fa-chevron-right" style="color:#1f5daa"></i></a> <a href="{{url('berbagiinfo-kategori')}}/{{$kategori->name}}">{{$kategori->name}}</a>
          <div class="blog_section margin_bottom_0 mt-2">
            <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/artikel/'.$infoberbagi->gambar)}}" alt="#"> </div>
            <div class="blog_feature_cantant">
              <p class="blog_head">{{$infoberbagi->judul}}</p>
              <p >{!!$infoberbagi->isi!!}</p>
              <div class="post_info">
                <ul>
                  <li><i class="fa fa-user" aria-hidden="true"></i> {{$infoberbagi->penulis}}</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> {{($infoberbagi->created_at->isoFormat('dddd, D MMMM Y'))}}</li>
                </ul>
              </div>
              <!--<p style="align:center;">  <br>
              <br>
              </p>-->
              <div class="bottom_info margin_bottom_30_all box-hyu" style="margin-top:20px;">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 ">
                    <div style="background:#1f5daa; left:12.5px; color: #fff;padding:10px; width:fit-content;display: flex;align-items: center; border-top-left-radius:10px; border-bottom-right-radius:10px; margin-bottom : 15px;">
                        Kategori Berbagi Info
                    </div>
                    <div class="row" style="width :100%; color : grey">
                     @foreach ($kategoriall as $kategori)
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 " style="margin-top:10px; font-size:12px;">
                         <?php $nama_kate = strtoupper($kategori->name); ?>
                         <a href="{{url('berbagiinfo-kategori')}}/{{$kategori->name}}">{{$nama_kate}}</a>
                     </div>
                     @endforeach
                    </div>
                </div>
                </div>
              </div>
              <div class="bottom_info margin_bottom_30_all">
              <div class="pull-right">
                <div class="shr">Share: </div>
                <div class="social_icon">
                  <ul>
                  <li> <a href="https://www.facebook.com/sharer/sharer.php?u=https://berbagibahagia.org/berbagiinfo/{{$link}}"
                  onclick="javascript:window.open(this.href, '', 'menubar=yes,toolbar=yes,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                  target="" title="Share on Facebook" target="_blank" style="width:110px;"><i class="fa fa-facebook"></i>&nbsp &nbsp <b>Facebook</b></a></li>
                  
                  
                  <li><a href="https://api.whatsapp.com/send?text={{($infoberbagi->judul)}}%0a%0a{{($wa_data)}}...%0a%0ainformasi selengkapnya klik https://berbagibahagia.org/berbagiinfo/{{$link}}" style="width:110px;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a></li>
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

@include('layouts.footer_plus')

@include('layouts.js')

</body>
</html>
