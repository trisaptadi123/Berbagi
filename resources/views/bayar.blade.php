<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page">
<!-- loader -->

<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- header top -->
  
  <!-- end header top -->
  <!-- header bottom -->
    {{-- <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/bb.png')}}" alt="logo"/></a> </div>
          <!-- logo end -->
        </div>
        
      </div>
    </div> --}}
  <!-- header bottom end -->
</header>
<!-- end inner page banner -->
<div class="section padding_layout_1 checkout_section">
  <div class="container">
    
	<div class="row" style="margin-top: -120px;">
    <div class="center">
      <div class="col-md-5">
        <div class="checkout-form">
          <form action="post" class=" center" style="font-family:arial;">
            {{ csrf_field() }}        
            <fieldset>
            <div class="row">
              
			  <div class="col-md-12">
                @foreach ($list_donatur as $donatur)
				<div class="form-field">
				<h4 class="center">Instruksi Pembayaran</h4>
				<hr />
				<p class="center" style="font-size:12px;">Segera transfer TEPAT sesuai nominal berikut</p>
                <h2 class="center">Rp.<?php echo number_format($donatur->jumlah+$donatur->kode,0,",",".");?></h2>
				<div class="alert alert-primary" role="alert" style="font-size: 12px; line-height: 22px; text-align:justify;">
				<b>Terimakasih</b> Telah mendonasikan
				</div>
				<table class="table" style="font-size:12px;">
        <tr><td>Jumlah Donasi</td><td align="right">{{$donatur->jumlah}}</td></tr>
    
        <tr><td>Kode Unik <b style="color:#13acea">*</b></td><td align="right">{{$donatur->kode}}</td></tr>
				<tr><td colspan="2"><b style="color:#13acea">* akan dimasukan dalam donasi</b></td></tr>
				</table>
                </div>
                @endforeach
			  </div>
			</div>  
            </fieldset>
          </form>
        </div>
      </div>
    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
    <div class="center">
      <div class="col-md-5">
        <div class="checkout-form">
          <form action="#" class=" center" style="font-family:arial; font-size:12px;">
            <fieldset>
            <div class="row">
              
			  <div class="col-md-12">
				<div class="form-field" style="text-align:center;">
        <p>Transfer ke rekening a/n <b>Kilau Indonesia</b> berikut ini :</p>
        {{-- @foreach ($list_bank as $bank)
				<img style="height:30px; margin-bottom:20px; width:auto;" src="{{asset('gambarUpload/'.$bank->logo)}}">
        @endforeach --}}
        <table class="table" style="font-size:12px;">
				<tr><td align="left" style="font-size:14px;"><b>{{$donatur->bank}}</b></td>
				<td align="right"><a href="#" class="sal">Salin</a></td></tr>
				
				{{-- <tr><td colspan="2">Segera lakukan pembayaran sebelum <b>Senin, 14 Sep 2020 21:47 WIB</b></td></tr> --}}
				</table>
				</div>
			  </div>
			</div>  
            </fieldset>
          </form>
        </div>
      </div>
    </div>
	</div>
	<div class="row" style="margin-top: 10px;">
    <div class="center">
      <div class="col-md-5">
        <div class="checkout-form">
          <form action="#" class=" center" style="font-family:arial; font-size:12px;">
            <fieldset>
            <div class="row">
              
			  <div class="col-md-12">
				<div class="form-field" style="text-align:center;">
				<p>Bantu <b>Kilau Indonesia</b> dengan sebarkan campaign ini</p>
				
				<div class="tags center" style="font-size:12px;">
              <ul>
                <li><a href="#" style="color:#265cff;"><i class="fa fa-facebook"></i>&nbsp &nbsp <b>Facebook</b></a></li>
				<li>&nbsp &nbsp &nbsp &nbsp &nbsp </li>
                <li><a href="#" style="color:#1ba160;"><i class="fa fa-whatsapp"></i>&nbsp &nbsp <b>Whatsapp</b></a></li> 	
              </ul>
				</div>
				<p>atau</p>
				<a href="{{url('/')}}" class="btn main_bt  col-md-9" style="margin-top: -5px; border-radius:5px;">Kembali ke halaman campaign</a>

				</div>
			  </div>
			</div>  
            </fieldset>
          </form>
        </div>
      </div>
    </div>
	</div>
  </div>

</div>
<!-- end section -->


@include('layouts.js')

<script type="text/javascript"> 
  history.pushState(null, null, location.href);
      window.onpopstate = function () {
          history.go(-2);
      };
      </script> 
</body>
</html>



