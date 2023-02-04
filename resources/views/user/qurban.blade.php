<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page">
<!-- loader -->
@include('layouts.header')

<div class="section checkout_section" style="padding-top:10px;">
    <div class="container" style="max-width: 510px; background: #fff; padding-top:30px;">
      <div style="margin-top: 18px">
        <div class="row">
            
        @if(Auth::check())
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <a href="{{url('qurbansaya')}}" type="submit" class="a_list btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
        RIWAYAT Ramadhan & Qurban SAYA
        </a>
        </div>
        @else
        @endif
        
          @foreach ($sma_list as $post)
          <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
          
            <a href="{{url('prog')}}/{{Request::segment(2)}}/{{$post->link}}">
            <div class="product_list">
              <div class="product_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""> </div>
              <div class="product_detail_btm">
                <div class="center-cam">
                  <h4><?php echo substr($post->judul,0,50)?></h4>
                </div>
                
              <p class="center-cam">{{($post->name)}}<span class="fa fa-check" style="color:#1f5daa;"></span>
               	
              </p>
              </div>
               
            </div>
            </a>
          </div>
          
          @endforeach
          
          <div class="center" style="margin-bottom:50px; z-index:0;">
            {{ $sma_list->links() }}
          </div>
        </div>
      </div>
      </div>
    </div>

@include('layouts.modal')

@include('layouts.footer_plus')

@include('layouts.js')
</body>
</html>