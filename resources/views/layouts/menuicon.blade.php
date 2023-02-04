<div class="section nyumput2" style="padding:40px 0 10px 0; background:#fff; margin:5px 0 0 0;">
    <div class="container">
        
        <div class="row" id="menu">
          <div class="swiper-container" style=" z-index:0; padding:5px;">
          <div class="swiper-wrapper" >
	        <div class="swiper-slide a_list" style="padding:0;">
            <a href="{{url('semuadonasi')}}" class=""><img class="img-responsive" src="{{asset('gambarUpload/donasi-o.png')}}"></a>
            </div>
	        <div class="swiper-slide a_list" style="padding:0;">
            <a href="{{url('zis')}}" class=""><img class="img-responsive" src="{{asset('gambarUpload/zakat-o.png')}}"></a>
            </div>
	        <div class="swiper-slide a_list" style="padding:0;">
            <a href="{{url('https://berbagibahagia.org/program/Infak')}}" class=""><img class="img-responsive" src="{{asset('gambarUpload/infak-o.png')}}"></a>
            </div>
            @if(Auth::check())
	        <div class="swiper-slide a_list" style="padding:0;">
            <a href="{{url('galangdana')}}" class=""><img class="img-responsive" src="{{asset('gambarUpload/galang-o.png')}}"></a>
            </div>
            @else
	        <div class="swiper-slide a_list" style="padding:0;">
            <a href="#" data-toggle="modal" data-target="#login" class=""><img class="img-responsive" src="{{asset('gambarUpload/galang-o.png')}}"></a>
            </div>
            @endif
            <div class="swiper-slide a_list" style="padding:0;">
            <a href="{{url('https://berbagibahagia.org/berbagiinfo')}}" class=""><img class="img-responsive" src="{{asset('gambarUpload/Info-o.png')}}"></a>
            </div>
          </div>
          </div>
        </div>
        
      </div>
    </div>
  
  