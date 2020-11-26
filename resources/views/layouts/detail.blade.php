<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div>


@include('layouts.header')

<div class="section product_detail">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8">
              <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('kuy/images/s5.jpg')}}" alt="#"> </div>
                 
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 product_detail_side detail_style1" style="margin-bottom:-50px; margin-top:-5px;">
              <div class="product-heading">
                <h2>Bantu Renovasi Rumah Pak </h2>
              </div>
              <div class="product-detail-side">
                  
               <p>BerbagiBahagia.org <span class="fa fa-check" style="color:#17a5e9;"></span> </p>
              <div class="detail-contant ">	
                  <div class="progress" style="width:100%;">
                      <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              <table class="table" style="margin-bottom:-20px;">
              <tr>
              <td align="left"><p style="font-size:12px;">Terkumpul <b>Rp. <?php echo number_format(150000,0,",",".");?></b></p></td> 
              <td align="right"><p style="font-size:12px;">Sisa Waktu <b>100 Hari</b></p></td>
              </tr>
              </table>
                  <a href="{{url('/menudonasi/donasinow')}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
              </div>
              <div class="share-post"> <a href="#" class="share-text">Bantu Share</a>
                <ul class="social_icons">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
              </div>
			<table class="table" style="margin-bottom:-20px; ">
			<tr align="center"><td>
			   <p style="font-size:12px;">Bantu campaign ini dengan menjadi Fundraiser</p>
			</td></tr>
			</table>
               <a href="{{url('/menudonasi/donasinow')}}" type="submit" class="btn abu_bt  col-md-12" style="border-radius:0px;">JADI FUNDRAISER</a>
			   <br />
			   <p style="font-size:12px;">Campaign ini mencurigakan? <b><a href="#" style="color:#17a5e9;">Laporkan</a></b></p>
            </div>
          </div>
          <div class="col-md-12">
              <div class="full">
                <div class=" accordion border_circle" style="padding-top:50px;">
                  <div class="bs-example ">
                    <div class="panel-group col-md-8" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-pencil" aria-hidden="true"></i> Deskripsi<i class="fa fa-angle-down"></i></a> </p>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                          <div class="panel-body">
                              <table class="table">
                              <tr><td align="justify">
                            <p>Pak Nana Sukarsah (72 tahun) adalah seorang pemulung yang tinggal di Sumedang. Ia tinggal bersama istri, anak, dan cucu.
							Sekilas melihat tempat tinggalnya cukup layak. Sebelum seperti ini, kondisinya sangat mengkhawatirkan.
							Lokasinya di pinggiran Sungai Cipeles, banyak sampah, gelap, dan kotor. Siapapun pasti tak mau menempatinya. Tapi dengan susah payah, 
							Pak Nana dibantu aparat dan warga setempat membangun rumah di tempat ini. Sudah 4 tahun Pak Nana menempati rumah ini, akhir-akhir ini 
							banyak yang mengaku-ngaku tanah yang ditinggali keluarga Pak Nana. Akhirnya berdasarkan kesepakatan, solusinya rumah Pak Nana akan 
							dipindahkan kurang lebih 10 meter dari lokasi sekarang.<br />
							<b>Namun untuk pemindahan rumah bukan hal mudah untuk Pak Nana. Jika mengandalkan penghasilannya sebagai pemulung, maka Pak Nana tidak mampu. 
							Namun mereka pun butuh tempat tinggal. Bantu keluarga Pak Nana pindahkan rumahnya, klik DONASI SEKARANG.</b>
                             </p>
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
                              <tr>
                              <td rowspan="3" width="20%"><img src="{{asset('kuy/images/user.png')}}" style="max-height:50px"></td>
                              <td width="40%" style="font-size:14px;">Nama Donatur</td>
                              <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>Rp. <?php echo number_format(50000,0,",",".");?></b></td>
                              </tr>
                              <tr>
                              <td>Tanggal</td>
                              </tr>
                              <tr >
                              <td>Dukungan / Do'a</td>
                              </tr>
                              <tr><td colspan="3"><hr></td></tr>
                              <tr>
                              <td rowspan="3" width="20%"><img src="{{asset('kuy/images/user.png')}}" style="max-height:50px"></td>
                              <td width="40%" style="font-size:14px;">Nama Donatur</td>
                              <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>Rp. <?php echo number_format(50000,0,",",".");?></b></td>
                              </tr>
                              <tr>
                              <td>Tanggal</td>
                              </tr>
                              <tr >
                              <td>Dukungan / Do'a</td>
                              </tr>
                              <tr><td colspan="3"><hr></td></tr>
                              </table>
                              <div class="center">
                                  <ul class="pagination style_1">
                                      <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                      <li class="active"><a href="#">1</a></li>
                                      <li><a href="it_blog_grid.html">2</a></li>
                                      <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
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
                              <td rowspan="3" width="20%"><img src="{{asset('kuy/images/user.png')}}" style="max-height:50px"></td>
                              <td width="40%" style="font-size:14px;">Nama Fundraiser</td>
                              <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>Rp. <?php echo number_format(50000,0,",",".");?></b></td>
                              </tr>
                              <tr>
                              <td>Judul Campaign</td>
                              </tr>
                              <tr >
                              <td>Telah mengajak <b>5</b> untuk berdonasi</td>
                              </tr>
                              <tr><td colspan="3"><hr></td></tr>
                              <tr>
                              <td rowspan="3" width="20%"><img src="{{asset('kuy/images/user.png')}}" style="max-height:50px"></td>
                              <td width="40%" style="font-size:14px;">Nama Fundraiser</td>
                              <td rowspan="3" width="40%" align="right" style="font-size:15px;"><b>Rp. <?php echo number_format(50000,0,",",".");?></b></td>
                              </tr>
                              <tr>
                              <td>Judul Campaign</td>
                              </tr>
                              <tr >
                              <td>Telah mengajak <b>5</b> untuk berdonasi</td>
                              </tr>
                              <tr><td colspan="3"><hr></td></tr>
                              </table>
                              <div class="center">
                                  <ul class="pagination style_1">
                                      <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                      <li class="active"><a href="#">1</a></li>
                                      <li><a href="it_blog_grid.html">2</a></li>
                                      <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
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

@include('layouts.footer_cam')

@include('layouts.js')

</body>
</html>
