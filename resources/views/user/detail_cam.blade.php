<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<head>
    <?php
  $data = strip_tags($post->artikel);
  $wa_data = substr($data,0, 100);
?>
    <meta property="og:url" content="https://berbagibahagia.org/galangdanaku/{{$post->deskripsi}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Berbagi Bahagia">
    <meta property="og:title" content="{{($post->title)}}" />
    <meta property="og:description" content="{{($data)}}" />
    <meta property="og:image" content="https://berbagibahagia.org/thumbnail/{{($post->gambar)}}" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:secure_url" content="https://berbagibahagia.org/thumbnail/{{($post->gambar)}}" />
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
</head>

<body id="default_theme" class="it_service" >
    
<script>
 fbq('track', 'View Content');
</script>

<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>-->


@include('layouts.header')


<div class="section d-flex justify-content-center" style="display:flex; justify-content: center; ">
    
    <div class="a_list navtool">
      <!-- <a href="#" class="nav__link nav__link--active"> -->
      <a href="{{url('pencairandana/'.$post->deskripsi.'/'.Crypt::encrypt($post->id_konten))}}" class="nav__link">
        <i class="fa fa-money nav__icon"></i>
        <span class="nav__text">Form Pencairan Dana</span>
      </a>
      <a href="{{route('newinfo.detail',$post->deskripsi)}}" class="nav__link">
        <i class="fa fa-files-o nav__icon"></i>
        <span class="nav__text">Input Info Terbaru</span>
      </a>
      <a href="{{ url('/editgalangdana/'.$post->id_konten.'/edit') }}" class="nav__link">
        <i class="fa fa-pencil-square-o nav__icon"></i>
        <span class="nav__text">Edit Campaign Ini</span>
      </a>
      <!-- <a href="{{url('/zis')}}" class="nav__link">
        <i class="fa fa-briefcase nav__icon"></i>
        <span class="nav__text">Zakat</span>
      </a>
      <a href="{{url('user/index')}}" class="nav__link">
        <i class="fa fa-user nav__icon"></i>
        <span class="nav__text">Akun</span>
      </a> -->
    </div>
    
</div>

<div class="section product_detail" style="padding-top: 80px">
    <div class="container" style="max-width: 540px;">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
             
              <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt="#"> </div>
                 
            </div>
            <div id="div1" class="col-xl-12col-lg-12 col-md-12 product_detail_side detail_style1" style="margin-bottom:-50px; margin-top:-5px;">
            
              <div class="product-heading pt-4">
                <h2>{{($post->title)}}</h2>
              </div>
              <div class="product-detail-side">
                  
               <p style="margin-bottom:-35px;">{{($post->kategori)}}<span class="fa fa-check" style="color:#17a5e9;"></span> </p>
              <div class="detail-contant ">	
              <table class="table" style="margin-bottom:-20px;">
              <tr style="border-top:2px solid #fff;">
                  
              @if ($post->id_category == 'Open Goals'  )
                <td align="right"><p style="font-size:12px; color:#fff;">unlimited</p></td>
              @else
                <td align="right"><p style="font-size:12px;">Sisa Waktu <b> <?php
                  $date1 = strtotime($post->end_date);
                       $date2 = time();
                       $subTime = $date1 - $date2;
                       $d = ($subTime/(60*60*24))%365;
                       $h = ($subTime/(60*60))%24;
                       $m = ($subTime/60)%60;
                      
                       if ($d>0) {
                           echo $d." hari\n";             
                       }          
                   ?></b></p></td>
              @endif   
              </tr>
              </table>
              @if ($post->id_category == 'Open Goals'  )
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
              
              <td align="left"><p style="font-size:12px;">Terkumpul <b>Rp. {{number_format($jumlah+$kode,0,",",".")}}</b></p></td>
              @if ($post->id_category == 'Open Goals'  )
              <td align="right"><p style="font-size:12px;"><b>{{($post->id_category)}}</b></p></td>
              @else
              <td align="right"><p style="font-size:12px;">Target <b>Rp. {{number_format($post->id_category,0,",",".")}}</b></p></td> 
              @endif
              </tr>
              
              </table>
                  <a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
              </div>
              <div><div class="tags center" style="font-size:12px; text-align:center;">
              <ul>
                <li><p style="margin-top:5px;">Bagikan : &nbsp &nbsp</p></li>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://berbagibahagia.org/galangdanaku/{{$post->deskripsi}}"
                  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                  target="_blank" title="Share on Facebook" target="_blank" style="width:110px;"><i class="fa fa-facebook"></i>&nbsp &nbsp <b>Facebook</b></a></li>
				<li>&nbsp &nbsp </li>
                <li><a href="https://api.whatsapp.com/send?text={{($post->title)}}%0a%0a{{($wa_data)}}...%0a%0ainformasi selengkapnya klik https://berbagibahagia.org/galangdanaku/{{$post->deskripsi}}" style="width:110px;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a></li> 	
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
               <a href="{{url('fundraiser')}}" type="submit" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
               @else
               <a href="#" type="submit" data-toggle="modal" data-target="#login" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
              @endif
               <br />
			   <p style="font-size:12px;">Campaign ini mencurigakan? <b><a href="https://api.whatsapp.com/send?phone=+6285223231818Whatsap&text=Campaign Ini Mencurigakan {{($post->title)}}" style="color:#17a5e9;">Laporkan</a></b></p>
            </div>
          </div>
          <div  style=" margin-bottom:70px;">
              <div class="full">
                <div class=" accordion border_circle" style="padding-top:50px;">
                  <div class="bs-example ">
                    <div class="panel-group col-md-12" id="accordion" >
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-pencil"></i> Preview & Edit Artikel<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseOne" class="panel-collapse active">
                          <div class="panel-body">
                              <table class="table">
                              <tr><td align="justify" class="read-more">
                                <p class="read-more">{!!html_entity_decode($post->artikel)!!}</p>
                                 <a href="{{ url('/editgalangdana/'.$post->id_konten.'/edit') }}" type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Edit Deskripsi</a>
                              </td></tr>
                              </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-bullhorn"></i> Preview & Edit Info Update Terbaru<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="panel-body">
                          @foreach ($newfo as $nfw)
                          @if($nfw->status == 1)
                          <div class="card mt-2" style="background-color:#f2f2f2">
                            <div class="card-body">
                            <span class="small text-gray"><i class="fa fa-clock-o mr-1"></i>{{$nfw->created_at->isoFormat('dddd, D MMMM Y')}}</span>
                            <hr>
                            <p class="text-small mt-2 font-weight-light">{!!html_entity_decode($nfw->artikel)!!}</p>
                            </div>
                          </div>
                          @else
                          @endif
                          @endforeach 
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-users"></i>Preview Donatur<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body shopping-cart">
                              <table class="table" style="font-size:12px;">
                                @foreach ($list_donatur as $donatur)
                              @if($donatur->status == 1)
                              <tr>
                              <td rowspan="3" width="20%"><img src="{{asset('kuy/images/user.png')}}" style="max-height:50px"></td>
                              <td width="40%" style="font-size:14px;">{{($donatur->nama)}}</td>
                              <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>{{number_format($donatur->jumlah+$donatur->kode)}}</b></td>
                              </tr>
                              <tr>
                              <td>{{($donatur->created_at)}}</td>
                              </tr>
                              <tr >
                              <td>{{($donatur->komentar)}}</td>
                              </tr>
                              <tr><td colspan="3"><hr></td></tr>
                              @else
                              <h1></h1>
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
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-child" aria-hidden="true"></i> Preview Fundraiser<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse in">
                          <div class="panel-body shopping-cart">
                              <table class="table" style="font-size:12px;">
                              <tr>
                              <!--<td rowspan="3" width="20%"><img src="{{asset('kuy/images/user.png')}}" style="max-height:50px"></td>-->
                              <!--<td width="40%" style="font-size:14px;">Nama Fundraiser</td>-->
                              <!--<td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>Rp.</b></td>-->
                              </tr>
                              <tr>
                              <!--<td>Judul Campaign</td>-->
                              </tr>
                              <tr >
                              <!--<td>Telah mengajak <b>5</b> untuk berdonasi</td>-->
                              </tr>
                              <tr><td colspan="3"><hr></td></tr>
                              <tr>
                              <!--<td rowspan="3" width="20%"><img src="{{asset('kuy/images/user.png')}}" style="max-height:50px"></td>-->
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


            <!--<div class="share-don col-md-4"> <a href="#" class="share-text">Bantu Share</a>
              <ul class="social_icons">
                <li><a href="#" style="color:#000;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              </ul>
            </div>	  
			<a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="don main_bt col-md-8" style="border-radius:0px;">DONASI SEKARANG</a>-->
	  <!--<div class="cprt col-md-12 center"  style="bottom:0px; position: relative;">-->
   <!--     <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>-->
   <!--   </div> -->

@include('layouts.js')
<script>
var element = document.getElementById("div1");
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
element.classList.remove("fixed-content");
}
</script>
      
</body>
</html>
