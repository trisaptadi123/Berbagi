<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide carousel-home" data-ride="carousel">
    <ol class="#">
      <li data-target="#carouselExampleCaptions" data-slide-to="0"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
         @foreach ($slider as $key => $slide)
      <div class="carousel-item  {{$key == 0 ? 'active' : '' }}">
        <img src="{{asset('gambarUpload/'.$slide->gambar_slide)}}" class="d-block w-100" alt="gambar">
        <div class="carousel-caption">
          <h3 class="carousel-title bounceInDown animated slow" style="color: #fff;">{{($slide->title)}}</h3>
          <h4 class="carousel-subtitle bounceInUp animated slow" style="color: #fff;">{{($slide->subtitle)}}</h4>
          <a class="btn min_bt bounceInUp animated slow" href="{{($slide->link)}}" >{{($slide->button)}}</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>