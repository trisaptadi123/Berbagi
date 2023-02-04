<!DOCTYPE html>
    <html lang="en">
    @include('layouts.css')
  <style type="text/css">
      .box-1 {
    padding: 20px;
    color: white;
    margin: 0 auto; /* code ini akan membuat div berada di tengah atas */
    }
</style>
<style type="text/css">
      .box-hyu {
         background : #f2f2f2;
         padding: 5px;
         color: white;
         margin: 0 auto; /* code ini akan membuat div berada di tengah atas */
    }
    .btn-hyuwan{
        background : #1f5daa;
        color : white;
        padding : 10px 15px 10px 15px;
        border-radius : 20px;
        float:right;
    }
    .btn-hyuwan:hover{
        background : #03cffc;
        color : white;
        padding : 10px 20px 10px 20px;
        border-radius : 20px;
        float:right;
    }
    </style>
    <!-- <style type="text/css">
      .hyuwan{
        background: #1f5daa;
        padding: 5px;
        border-radius: 5px;
        width: 100%;
        color: white;
        border-color: #1f5daa;
      }
      .hyuwan:hover{
        background: #1f5dff;
        padding: 5px;
        border-radius: 5px;
        width: 100%;
        color: white;
        border-color: #1f5dff;
      }
    </style>
    <style type="text/css">
@media screen and (max-device-width : 768px) {
  .hyu{
    padding: 20px;
  }
}
@media screen and (min-device-width : 768px) {
  .siz {
    max-width: 540px;
  }
  .hyu{
    padding: 40px;
  }

  .warn{
    background: #fff;
  }

  .mntp{
    padding-bottom: 30px; 
  }

  .product_list {
    min-height: auto;
    padding: 10px 10px 10px 10px;
  transition: ease all 0.5s;
  height:140px;
    margin-bottom: -10px;
    margin-top: -12px;
    margin-left: -5%;
  border: 1px solid #ccc;
  border-radius: 7px;
  border-bottom: 1px solid #ccc;
  box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
  width: 110%;
  /*padding-right: 20px;*/
}

.product_list:hover{
  border: 1px solid #ccc;
}

.product_img {
  width: 200px;
  float: left;
}

.product_img img {
  height: 115px;
  float: left;
  border-radius: 0px;
}

.product_detail_btm{
  float:right;
  margin-top:-22px;
  width: 200px;
  margin-right: 20px;
  position: relative;
  display: block;
}

.product_detail_btm h4{
  float:right;
  text-align: left;
  font-size: 12px;
  margin-bottom: -0px;
}

.center-cam{
  justify-content: left;
}

.center-cam h4{
  justify-content: left;
}

.center-cam p{
  justify-content: left;
}

.product_detail_btm p {
  margin: 0;
  text-align: left;
  font-size:12px;
}
.product_price {
  margin: 0;
}

.starratin {
  padding: 0;
}

.progress {
  margin-top: -2px;
  height:5px;
}

.swiper-container {
  width:90%;
  margin-top:-35px;
}

.c_img img {
    height: 150px;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.c_detail_btm h4{
  font-size: 12px;
}

.c2_list {
  height: 135px;
}

.c2_img img {
    height: 85px;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.c2_detail_btm h4{
  margin: 5px 2px 5px 2px;
  font-size: 10px;
}

.c2_price {
  font-size:10px;
}

.product_list2 {
  min-height: 190px;
  transition: ease all 0.5s;
  box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
  border: 1px solid #dddddd;
  /* border-bottom: solid #aaaaaa 5px; */
  border-radius: 5px;
  background: #fff;
}

.cleaning .product_list2 {
  min-height: 340px;
  transition: ease all 0.5s;
}

.product_list2:hover,
.product_list2:focus {
  box-shadow: none;
  /* border-bottom: solid #1f5daa  5px; */
}

.product_img2 {
    display: inline;
  overflow: hidden;
  background: #f3f3f3;
}


.product_img2 img {
    height: 115px;
  width: 100%;
  object-fit: cover;
  border-radius: 5px;
}

.cleaning2 .product_img2 img {
  padding: 0;
}

.product_detail_btm2 h4 {
  margin: 10px 5px 0px 5px;
  font-size: 13px;
  text-align: center;
  height:35px;
}

} -->
  
</style>
    
    <body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #f2f2f2">
    <!-- loader -->
    @include('layouts.header2')
    
    @if(count($result) > 0)
    
    <div class="section">
    <!-- <div class="container hyu" style="max-width: 540px; background:#fff; margin-bottom: 30px"> -->
    <!-- <div class="section" style="padding:10px 0 10px 0; background:#fff; margin:5px 0 0 0;"> -->
      <div style="margin-top: 10px">
      <div class="container mt-3">
      <div class="mx-auto" style="max-width: 1000px">
        <div class="row">
          <div class="center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        
        @foreach ($result as $post)

           <div class="row" style="margin-bottom: 0; background:#fff;">
           <div class="p-4">
          <!-- <div class="center"> -->
              <?php $char = array(" ");
		                $judul = str_replace($char,"-", $post->judul); ?>
              <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="product_img"><img class="img-responsive" src="{{asset('gambarUpload/artikel/'.$post->gambar)}}" alt=""></div>
										</div>
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php
                  $kalimat_kecil = strtolower($post->judul);
                  $kalimat_new = ucwords($kalimat_kecil);
                  $arr = explode(" ", $kalimat_new);
                ?>
              <h4 style="font-size: 15px; margin-top: 0">{!! implode(" ",array_splice($arr,0,5))."..." !!}</h4>
              <p style="margin-top: 10px; font-size: 12px">{{($post->name)}} <span class="fa fa-check" style="color:#1f5daa;"></span></p>
              <hr style="margin-top: -10px;">
                <?php
                        $kalimat_kecil = strtolower($post->isi);
                        $kalimat_new = ucwords($kalimat_kecil);
                        $is = explode(" ", $kalimat_new);

                        $read = "<a href='".url('berbagiinfo')."/$post->name/$post->deskripsi'><u style='color:#1f5daa'>Baca Selengkapnya!</u></a>"
                    ?>
                <p style = "font-size: 14px; margin-top: -10px;">{!! implode(" ",array_splice($is,0,16)). "... ". $read!!}</p>
              <!-- </div> -->
            </div>    
          </div>
        </div>
      </div> 
          @endforeach
              <!-- </div> -->
              <!-- </div> -->
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
        @else 
        <div class="section">
          <div class="container " style="max-width: 540px; background:#fff; padding: 20px; margin-bottom: 30px">
              <div class="row">
                 <div class="col-md-12" style="justify-content: center; text-align: center; padding: 50px"><h1>Data Tidak Ditemukan </h1></div>
              </div>
          </div>
        </div>
    @endif
    @include('layouts.modal')
    
    @include('layouts.footer_cam')
    
    @include('layouts.js')

    </body>
    </html>
    