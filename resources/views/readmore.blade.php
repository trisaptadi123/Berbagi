<!DOCTYPE html>
<html lang="en">
@include('layouts.css')



<body id="default_theme" class="it_service">
    
<script>
 fbq('track', 'View Content');
</script>

<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>-->


@include('layouts.header')

<div class="section product_detail" style="margin-top:20px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
             
              <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt="#"> </div>
                 
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 product_detail_side detail_style1" style="margin-bottom:-50px; margin-top:-5px;">
            
              <div class="product-heading">
                <h2>{{($post->title)}}</h2>
              </div>
              <div class="product-detail-side">
                  
               <p style="margin-bottom:-35px;">{{($post->kategori)}}<span class="fa fa-check" style="color:#17a5e9;"></span> </p>
              <div class="detail-contant ">	
              <table class="table" style="margin-bottom:-20px;">
              <tr style="border-top:2px solid #fff;">
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
              </tr>
              </table>
                  <div class="progress" style="width:100%;  margin-bottom:-10px; ">
                      <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              <table class="table" style="margin-bottom:-20px;">
              <tr style="border-top:2px solid #fff;">
              
              <td align="left"><p style="font-size:12px;">Terkumpul <b>Rp. {{($post->terkumpul)}}</b></p></td>
              <td align="right"><p style="font-size:12px;">Target <b>Rp. {{($post->id_category)}}</b></p></td> 
         
              </tr>
              
              </table>
                  <a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
              </div>
              <div><div class="tags center" style="font-size:12px; text-align:center;">
              <ul>
                <li><p style="margin-top:5px;">Bagikan : &nbsp &nbsp</p></li>
                <li><a href="#" style="width:110px;"><i class="fa fa-facebook"></i>&nbsp &nbsp <b>Facebook</b></a></li>
				<li>&nbsp &nbsp </li>
                <li><a href="#" style="width:110px;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a></li> 	
              </ul>
              </div>
              </div>
              </div>
			<table class="table" style="margin-bottom:-20px; ">
			<tr align="center"><td>
			   <p style="font-size:12px;">Bantu campaign ini dengan menjadi Fundraiser</p>
			</td></tr>
			</table>
               <a href="#" type="submit" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
			   <br />
			   <p style="font-size:12px;">Campaign ini mencurigakan? <b><a href="#" style="color:#17a5e9;">Laporkan</a></b></p>
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
                                <p class="read-more">{!!html_entity_decode($post->artikel)!!}</p>
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
                            <p> update terbaru</p>
                              </td></tr>
                              </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-users"></i> Donatur<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body shopping-cart">
                              <table class="table" style="font-size:12px;">
                                @foreach ($list_donatur as $donatur)
                              
                              <tr>
                              <td rowspan="3" width="20%"><img src="{{($donatur->status == 1) ? asset('kuy/images/user.png'):''}}" style="max-height:50px"></td>
                              <td width="40%" style="font-size:14px;">{{($donatur->status == 1) ? ($donatur->nama):''}}</td>
                              <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>{{($donatur->status == 1) ? number_format($donatur->jumlah+$donatur->kode):''}}</b></td>
                              </tr>
                              <tr>
                              <td>{{($donatur->status == 1) ? ($donatur->created_at):''}}</td>
                              </tr>
                              <tr >
                              <td>{{($donatur->status == 1) ? ($donatur->komentar):''}}</td>
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
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-child" aria-hidden="true"></i> Fundraiser<i class="fa fa-angle-down"></i></a> </p>
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


            <div class="share-don col-md-4"> <a href="#" class="share-text">Bantu Share</a>
              <ul class="social_icons">
                <li><a href="#" style="color:#000;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#" style="color:#000;"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              </ul>
            </div>	  
			<a href="{{route('donasi.detail',$post->deskripsi)}}" type="submit" class="don main_bt col-md-8" style="border-radius:0px;">DONASI SEKARANG</a>
	  <div class="cprt col-md-12 center"  style="bottom:0px; position: relative;">
        <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
      </div> 

@include('layouts.js')

<!--// <script type="text/javascript"> -->
<!--//   history.pushState(null, null, location.href);-->
<!--//       window.onpopstate = function () {-->
<!--//           history.go(1);-->
<!--//       };-->
<!--//       </script> -->
      
</body>
</html>
