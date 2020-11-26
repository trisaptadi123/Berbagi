<!DOCTYPE html>
<html lang="en">
@include('layouts.css')


<body id="default_theme" class="it_service" style="background:#ccc;">
{{-- <!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>--> --}}

@include('layouts.header')
  
@include('layouts.slide')
<!-- end section -->
{{-- <div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="contact_us_section">
            <div class="inner_cont">
              <h2>TOTAL DONASI</h2>
            </div>
            <div class="button_Section_cont"> <h2>Rp. 12.000.000,-</h2></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

@include('layouts.viewanakasuh')

@include('layouts.viewdonasi')

@include('layouts.cerita')

@include('layouts.modal')

@include('layouts.footer')

@include('layouts.js')
</body>
</html>
