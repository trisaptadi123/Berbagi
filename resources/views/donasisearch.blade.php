<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<style type="text/css">
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

}

</style>

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #f2f2f2">
  <!-- loader -->
  @include('layouts.header')
  <div class="section" style="padding:10px 0 10px 0;  ">
    <div class="container d-flex justify-content-center" style="max-width: 540px; background:#fff; padding: 30px ">
      <div class="row">
        <div class="col-md-12 col-sm-6">
          <form action="{{url('filterah')}}" method="GET">
            @csrf
            <div class="row">
              <div class="col-md-4 ">
                <div class="form-field">
                  <label>Kategori</label>
                  
                  <select id="id_category" class="from-control" name="id_category">
                   <option selected="selected" value="" >- Pilih -</option>
                   @foreach($kategori as $data)
                   <option value="{{$data->id}}">{{$data->name}}</option>
                   @endforeach
                 </select>
               </div>
             </div>
             <div class="col-md-4 ">
              <div class="form-field">
               <label>Wilayah</label>

               <select id="wilayah" class="from-control" name="wilayah">
                 <option selected="selected" value="" >- Pilih -</option>
                 @foreach($wilayah as $datas)
                 <option value="{{$datas->nama_kota}}">{{$datas->nama_kota}}</option>
                 @endforeach
               </select>
             </div>
           </div>
           <div class="col-md-4 mt-4">
            <button type="submit" class="hyuwan" style="border-radius:5px; max-width: ">Filter</button>
                <!-- <div class="form-field">
                </div> -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @if(count($result))


  <div class="section ">
    <div class="container hyu" style="max-width: 540px; background:#fff; margin-bottom: 30px">
      <div style="margin-top: 5px">
        <div class="row">

         @foreach ($result as $post)
         <div class="col-md-12 margin_bottom_30_all">

          <a href="{{route('program.detail',$post->deskripsi)}}">
            <div class="product_list">
              <div class="product_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""> </div>
              <div class="product_detail_btm">
                <div class="center-cam">
                  <h4>{{ substr($post->title,0,50) }}</h4>
                </div>
                
                <p class="center-cam">{{($post->kategori)}}<span class="fa fa-check" style="color:#1f5daa;"></span>
                  <hr style="margin:0;">
                  <div class="product_price shopping-cart" style="font-size:10px;">
                    <table class="table">
                      <tr style="margin-bottom:-10px;">
                        <td align="left" >Terkumpul</td> 
                        <td align="right" style="text-align:right; ">Sisa Waktu</td>
                      </tr>
                      <tr  style=" border-top: 2px solid #ffffff;">
                        <td align="left"><b>Rp.{{number_format($post->terkumpul,0,",",".")}}</b></td>

                        @if ($post->id_category == 'Open Goals'  )
                        <td align="right" style="text-align:right; font-size:20px; line-height:10px;"><span>&#8734;</span></td>
                        @else
                        <td align="right" style="text-align:right;"><b> <?php
                        $date1 = strtotime($post->end_date);
                        $date2 = time();
                        $subTime = $date1 - $date2;
                        $d = ($subTime/(60*60*24))%365;
                        $h = ($subTime/(60*60))%24;
                        $m = ($subTime/60)%60;

                        if ($d>0) {
                         echo $d." hari\n";             
                       }          
                       ?></b></td>
                       @endif
                     </tr>
                   </table>
                 </div>  
               </p>
             </div>
             <div class="starratin center">
              @if ($post->id_category == 'Open Goals'  )
              <div class="progress" style="width:100%;">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              @else
              <div class="progress" style="width:100%;">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{($post->terkumpul/$post->id_category*100)}}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              @endif
            </div>
          </div>
        </a>
      </div>
      @endforeach
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

<!-- @include('layouts.footer_cam') -->

@include('layouts.js')
</body>
</html>
