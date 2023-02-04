<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #dddddd;">
<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>-->
<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- header top -->
  
  <!-- end header top -->
  <!-- header bottom -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div  class="center">  
          <!-- logo start -->
          <div class="logo2"> <a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo"/></a> </div>
          <!-- logo end -->
        </div>
        </div>
        
      </div>
    </div>
  <!-- header bottom end -->
</header>
<!-- end inner page banner -->
<div class="section padding_layout_1 checkout_section">
  <div class="container">
    
	<div class="row" style="margin-top: -120px;">
    <div class="center">
      <div class="col-md-4">
        <div class="checkout-form" style="border-radius:10px;">
          <form action="get" class=" center" style="font-family:arial;">
            {{ csrf_field() }}        
            <fieldset>
            <div class="row">
			  <div class="col-md-12"> 
				<div class="form-field">
				<h4 class="center">Instruksi Pembayaran Zakat</h4>
				<hr />
				<p class="center" style="font-size:12px;">Segera transfer TEPAT sesuai nominal berikut</p>
        <h2 class="center">Rp.<?php echo number_format($zakat->jumlah+$zakat->kode_unik,0,",",".");?></h2>
				<div class="alert alert-primary" role="alert" style="font-size: 12px; line-height: 22px; text-align:justify;">
        Beserta Dengan Kode unik *
        </div>
        
				<table class="table" style="font-size:12px;">
        <tr><td>Jumlah Zakat</td><td align="right">Rp.<?php echo number_format($zakat->jumlah,0,",",".");?></td></tr>
    
        <tr><td>Kode Unik <b style="color:#13acea">*</b></td><td align="right">Rp.{{$zakat->kode_unik}}</td></tr>
        <tr><td><button class="sal" type="button" onclick="copy_text()">Copy</button></td><td align="right"><input style="margin-left: 38%; width: 110px;" type="text" value="Rp.<?php echo number_format($zakat->jumlah+$zakat->kode_unik,0,",",".");?>" id="pilih" readonly /></td></tr>
        <tr><td colspan="2"><b style="color:#13acea">*kode unik akan dimasukan dalam donasi campaign lainnya</b></td></tr>
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
      <div class="col-md-4">
        <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
          <form action="#" class=" center" style="font-family:arial; font-size:12px;">
            <fieldset>
            <div class="row">
              
			  <div class="col-md-12">
				<div class="form-field" style="text-align:center;">
        <p>Transfer ke rekening a/n <b>Kilau Indonesia</b> berikut ini :</p>
        <?php

            if($bank->QR != null){
        ?>
            <img class="img-responsive" src="{{asset('gambarUpload/'.$bank->QR)}}" alt=""><br><br>
            <button class="btn main_bt btn-small" style="margin-top: -5px; border-radius:5px;">Download QR Kode</button><br>
            <!-- <a href="{{url('/download',['id'=>$bank->id])}}"  class="btn btn-small btn-primary">download QR kode</a> -->
            <br>
        <?php
            } else {
        ?>
        
          
        <table class="table" style="font-size:12px;">
          <tr><td> <button class="sal" type="button" onclick="copy_bank()">Copy</button> </td><td align="right"><input type="text" value="{{$zakat->bank}}" id="bank" readonly /></td></tr>
				{{-- <tr><td align="left" style="font-size:14px;"><b>{{$z->bank}}</b></td> --}}
				<!--<td align="right"><a href="#" class="sal">Salin</a></td></tr>-->
				
				{{-- <tr><td colspan="2">Segera lakukan pembayaran sebelum <b>Senin, 14 Sep 2020 21:47 WIB</b></td></tr> --}}
				</table>
		<?php 
            }
		?>
				</div>
			  </div>
			</div>  
            </fieldset>
          </form>
        </div>
      </div>
    </div>
	</div>
<div class="row">
    <div class="center">
      <div class="col-md-4">
        <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
          <form action="#" class=" center" style="font-family:arial; font-size:12px;">
            <fieldset>
            <div class="row">
              
			  <div class="col-md-12">
				<div class="form-field" style="text-align:center;">
				<p>“Jazakumullah khairan khasiran”</p>
				<br/>
				{{-- <a href="{{url('https://ibank.bankmandiri.co.id/retail3/')}}" class="btn main_bt  col-md-10" style="margin-top: -5px; border-radius:5px;">Bayar Sekarang</a> --}}
        <button class="btn main_bt" style="margin-top: -5px; border-radius:5px;" onClick="newTab();">Bayar Sekarang</button>
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
          history.go("http://berbagibahagia.org/zis");
      };
      </script> 

<script type="text/javascript">
  function copy_text() {
      document.getElementById("pilih").select();
      document.execCommand("copy");
      alert("Nominal berhasil dicopy");
  }
</script>

<script type="text/javascript">
  function copy_bank() {
      document.getElementById("bank").select();
      document.execCommand("copy");
      alert("Norek berhasil dicopy");
  }
</script>

<script>
  function newTab(url){
      var x = window.open('{{$zakat->url}}','_blank');
      x.focus();
  }
  
  </script>
</body>
</html>




