<!DOCTYPE html>
<html lang="en">
 <head>
     @include('layouts.css')
    
    <?php
      $data = strip_tags($fdn->kutama);
      $wa_data = substr($data,0, 100);
    ?>
    <meta property="og:url" content="https://berbagibahagia.org/programfundraiser/{{$fdn->deskripsi}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Berbagi Bahagia">
    <meta property="og:title" content="{{($fdn->title)}}" />
    <meta property="og:description" content="{{($data)}}" />
    <meta property="og:image" content="https://berbagibahagia.org/thumbnail/{{($fdn->gambar)}}" />
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:secure_url" content="https://berbagibahagia.org/thumbnail/{{($fdn->gambar)}}" />
    
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




<body id="default_theme" class="it_service">
    
<script>
 fbq('track', 'View Content');
</script>

<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>-->


@include('layouts.header')


<div class="section product_detail" style="margin-top:30px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
             
              <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$fdn->gambar_fdn)}}" alt="#"> </div>
                 
            </div>
            <div id="div1" class="col-xl-4 col-lg-4 col-md-4 product_detail_side detail_style1 fixed-content" style="margin-bottom:-50px; margin-top:-5px;">
            
              <div class="product-heading">
                <h2>{{($fdn->title)}}</h2>
              </div>
              <div class="product-detail-side">
                  
               <p style="margin-bottom:-35px;">{{($fdn->nama)}}<span class="fa fa-check" style="color:#17a5e9;"></span> </p>
              <div class="detail-contant ">	
               @if($fdn->id_konten != null)
              <table class="table" style="margin-bottom:-20px;">
              <tr style="border-top:2px solid #fff;">
                <td align="right"><p style="font-size:12px;">Sisa Waktu <b> <?php
                  $date1 = strtotime($fdn->end_date);
                       $date2 = time();
                       $subTime = $date1 - $date2;
                       $d = ($subTime/(60*60*24))%365;
                       $h = ($subTime/(60*60))%24;
                       $m = ($subTime/60)%60;
                      
                       if ($d>0) {
                           echo $d." hari\n";             
                       }          
                   ?></b></p></td>  
              </tr>
              </table>
                  <div class="progress" style="width:100%;  margin-bottom:-10px; ">
                      <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="{{($fdn->terkumpul/$fdn->target*100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              <table class="table" style="margin-bottom:-20px;">
              <tr style="border-top:2px solid #fff;">
            
              <td align="left"><p style="font-size:12px;">Terkumpul <b>Rp. {{number_format($fdn->terkumpul,0,",",".")}}</b></p></td>
          
              <td align="right"><p style="font-size:12px;">Target <b>Rp. {{number_format($fdn->target,0,",",".")}}</b></p></td> 
         
              </tr>
              
              </table>
               <a href="{{route('fdndonasi.detail',$fdn->deskripsi)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
              @else
            
                <h4>Harga per ekor</h4>
                <p style="margin-bottom:0px; "><b>Rp. {{number_format($fdn->hrgqurban,0,",",".")}}</b></p>
                 <a href="{{route('fdndonasi.detail',$fdn->deskripsi)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">QURBAN SEKARANG</a>
             @endif

                 
              </div>
              <div><div class="tags center" style="font-size:12px; text-align:center;">
              <ul>
                <li><p style="margin-top:5px;">Bagikan : &nbsp &nbsp</p></li>
                 <li><a href="https://www.facebook.com/sharer/sharer.php?u=https://berbagibahagia.org/programfundraiser/{{($fdn->deskripsi)}}"
                  onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;"
                  target="_blank" title="Share on Facebook" target="_blank" style="width:110px;"><i class="fa fa-facebook"></i>&nbsp &nbsp <b>Facebook</b></a></li>
				<li>&nbsp &nbsp </li>
                <li><a href="https://api.whatsapp.com/send?text={{($fdn->title)}}%0a%0a{{($wa_data)}}...%0a%0ainformasi selengkapnya klik https://berbagibahagia.org/programfundraiser/{{$fdn->deskripsi}}" style="width:110px;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a></li> 	
              </ul>
              </div>
              </div>
              </div>
			<table class="table" style="margin-bottom:-20px; ">
			<tr align="center"><td>
			</td></tr>
      </table>
               <br />
			   <p style="font-size:12px;">Campaign ini mencurigakan? <b><a href="https://api.whatsapp.com/send?phone=+6285223231818Whatsap&text=Campaign Ini Mencurigakan {{($fdn->title)}}" style="color:#17a5e9;">Laporkan</a></b></p>
            </div>
          </div>
          <div class="col-md-12" style=" margin-bottom:70px;">
              <div class="full">
                <div class=" accordion border_circle" style="padding-top:50px;">
                  <div class="bs-example ">
                    <div class="panel-group col-md-8" id="accordion" >
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-pencil"></i> Deskripsi<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseOne" class="panel-collapse active">
                          <div class="panel-body">
                              <table class="table">
                              <tr><td align="justify" class="read-more">
                                <p class="read-more">{!!html_entity_decode($fdn->artikel)!!}</p>
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
                            <p>bsk</p>
                              </td></tr>
                              </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-users"></i> Donatur {{($list_donatur->count())}}<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body shopping-cart">
                              <table class="table" style="font-size:12px;">
                                @foreach ($list_donatur as $donatur)
                              @if($donatur->status == 1)
                              <tr>
                              <td rowspan="3" width="20%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>
                              <td width="40%" style="font-size:14px;">{{($donatur->nama)}}</td>
                              <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>{{number_format($donatur->jumlah+$donatur->kode)}}</b></td>
                              </tr>
                              <tr>
                              <td>{{($donatur->created_at->isoFormat('dddd, D MMMM Y'))}}</td>
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
			<a href="{{route('donasi.detail',$fdn->deskripsi)}}" type="submit" class="don main_bt col-md-8" style="border-radius:0px;">DONASI SEKARANG</a>-->
	  <div class="cprt col-md-12 center"  style="bottom:0px; position: relative;">
        <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
      </div> 

@include('layouts.js')
<script>
var element = document.getElementById("div1");
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
element.classList.remove("fixed-content");
}
</script>
      
</body>
</html>
