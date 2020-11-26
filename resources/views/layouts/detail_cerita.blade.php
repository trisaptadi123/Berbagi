<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div>


@include('layouts.header')

<!-- section -->
<div class="section blog_grid">
  <div class="container">
    <div class="row">
  <div class="center">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
        <div class="full">
          <div class="blog_section margin_bottom_0">
            <div class="blog_feature_img"> <img class="img-responsive" src="{{asset('kuy/images/s4.jpg')}}" alt="#"> </div>
            <div class="blog_feature_cantant">
              <p class="blog_head">Kita Punya Impian</p>
              <div class="post_info">
                <ul>
                  <li><i class="fa fa-user" aria-hidden="true"></i>Berbagipendidikan.org</li>
                  <li><i class="fa fa-calendar" aria-hidden="true"></i> 10/10/2020</li>
                </ul>
              </div>
              <p style="align:center;">  <br>
              <br>
              </p>
            <div class="bottom_info margin_bottom_30_all">
              <div class="pull-right">
                <div class="shr">Share: </div>
                <div class="social_icon">
                  <ul>
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  </ul>
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
<!-- end section -->
@include('layouts.modal')

@include('layouts.footer')

@include('layouts.js')

</body>
</html>
