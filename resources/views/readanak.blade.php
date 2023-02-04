<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<style>
  .fixed-content {
     /* top: 0;
    bottom:0; */
    margin-left:800px;
    max-width: 400px;
    position:fixed;
    /* overflow-y:scroll; */
    /* overflow-x:hidden; */
}
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
<body id="default_theme" class="it_service" style="background: #f2f2f2">
<!-- loader -->
@include('layouts.header')

<div class="section product_detail" style="padding-bottom:75px; margin-bottom:100px;">
    <div class="container" style="max-width: 510px; background: #fff; padding-top:30px;">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
              <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$anak->gambar_anak)}}" alt="#" style="height:auto;"> </div>  
            </div>
			      <div class="col-xl-12 col-lg-12 col-md-12">
              <table class="table" style="font-size:12px;">
                <tr style="border-top:2px solid #fff;"><td>Nama</td><td>: {{$anak->nama}}</td></tr>
                {{-- <tr><td>Nama Panggilan</td><td>: Data</td></tr> --}}
                <tr><td>Tempat, Tanggal Lahir</td><td>: {{$anak->ttl}}</td></tr>
                <tr><td>Jenis Kelamin</td><td>: {{$anak->jk}}</td></tr>
                {{-- <tr><td>Pelajaran Favorit</td><td>: Data</td></tr> --}}
                <tr><td>Hobi</td><td>: {{$anak->hobi}}</td></tr>
                {{-- <tr><td>Prestasi</td><td>: Data</td></tr>
                <tr><td>Jarak Rumah ke Shelter</td><td>: Data</td></tr>
                <tr><td>Transportasi</td><td>: Data</td></tr> --}}
              </table> 
            </div>
            <div id="div1" class="col-xl-12 col-lg-12 col-md-12 product_detail_side detail_style1 " style="margin-bottom:-50px; margin-top:-5px;">
              <div class="product-heading">
                <h2>Pendidikan dan Prestasi</h2>
              </div>	
              
              <div class="product_price2 shopping-cart">
              <table class="table">
              <tr style=" height:30px;">
              <td><span class="fa fa-graduation-cap"></span>{{$anak->jp}}</td> 
              <td><span class="fa fa-book"></span> {{$anak->kriteria}}</td>
              </tr>
			        <tr  style=" height:30px; border-top: 2px solid #ffffff;">
              <td><span class="fa fa-signal"></span> Kelas {{$anak->kls}}</td> 
              <td><span class="fa fa-child"></span> {{$anak->shelter}}</td>
              </tr>
			        <tr  style=" border-top: 2px solid #ffffff;">
              <td><span class="fa fa-university"></span>{{$anak->sekolah}}</td> 
              <td><span class="fa fa-map-marker"></span> {{$anak->cabang}}</td>
              </tr>
              </table>
              </div>
                  <a href="{{url('/menudonasi',$anak->nama)}}" type="submit" class="btn main_bt  col-md-12" style="border-radius:0px;">JADI ORANG TUA ASUH</a>
                    @if($anak->id_disclaimer != null)
                      <div class="card mt-2" style="background:#f5f5f5;height:80px;">
                        <div class="card-body">
                        <p style="font-size:12px;text-align:center;"><b>Disclaimer :</b> {!!html_entity_decode($data->deskripsi)!!}</p>
                        </div>
                      </div>
                      @endif
              
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
                          <div >
                              <table class="table">
                              <tr><td align="justify" class="read-more" id="artikel">
                                <p class="read-more">{!!html_entity_decode($anak->deskripsi)!!}</p>
                              </td></tr>
                              </table>
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
<!--<div class="cprt col-md-12 center"  style="bottom:0px; position: relative;">-->
<!--        <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>-->
<!--      </div> -->
      
       
			<div class="nyumput2">
			
                  <a href="{{url('/menudonasi',$anak->nama)}}" type="submit" class="don main_bt col-md-12" style="border-radius:0px;">JADI ORANG TUA ASUH</a>
                                     
              
             </div>
      <div id="fb-root"></div>


@include('layouts.js')
<script>
var element = document.getElementById("div1");
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
element.classList.remove("fixed-content");
}
</script>

</body>
</html>
