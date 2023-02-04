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
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
        </div>
      @endif
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
              <div class="form-field">
                @foreach ($zakat as $z)
              <div class="row">
                <div class="col-md-12">
                <div class="form-field" style="text-align:center;">
                <br/>
                <tr><td colspan="2">Mengalihkan....<b style="color:#13acea"></b></td></tr>
                <a href="{{url('/pay-zakat/'.$z->id_zakat)}}"></a>
                </div>
                </div>
              </div>  
              @endforeach
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
  window.location = "{{url('/pay-zakat/'.$z->id_zakat)}}";
  </script>
</body>
</html>



