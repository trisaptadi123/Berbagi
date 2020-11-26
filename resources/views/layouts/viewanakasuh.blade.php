<div class="section" style="padding:0 0 10px 0; background:#fff; margin:5px 0 0 0;">
  <div class="container">
	<div class="row">
      <div class="col-md-12">
        <div class="full">
		<table class="table head" style="border-top:2px solid #fffffe;">
		<tr><td>
          <h3 style="margin: 0 0 5px 0;">Berbagi Pendidikan</h3>
		  <hr/>
		</td>
		<td align="right">
		  <a href="{{url('/semuadonasi')}}" class="btn main_bt">Lihat Semua</a>
		</td></tr></table>
        </div>
      </div>
    </div>
    <div class="row" id="anak">
	<div class="swiper-container" style=" z-index:0;">
	<div class="swiper-wrapper">
    @foreach ($anak as $anak)
	  <div class="swiper-slide">
		<a href="{{url('/program/detail_pendidikan')}}">
			<a href="#">
        <div class="c_list">
          <div class="c_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$anak->foto_anak)}}" alt="#"> </div>
          <div class="c_detail_btm">
            <h4>{{$anak->nama}}</h4>
			<hr style="margin:0;">
            <div class="c_price shopping-cart" style="font-size:10px;">
              <table class="table">
              <tr style="margin-bottom:-10px;">
              <td align="left" width="65%"><span class="fa fa-book"></span> {{$anak->kriteria}}</td> 
              <td align="right" width="35%" style="text-align:right; "><span class="fa fa-graduation-cap"></span> {{$anak->jp}}</td>
              </tr>
              </table>
            </div>
          </div>
        </div>
		</a>
      </div>
      
      @endforeach
	</div>
	</div>	
    </div>
  </div>
</div>