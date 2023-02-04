<style>
    .responsive {
        width : 100%;
        height: auto;
    }
    @media only screen and (min-width: 420px) {
      .hyu {
        height: 250px;
      }
    }
    @media only screen and (max-width: 400px) {
      .hyu {
        height: 200px;
      }
    }
</style>

<div class="section" style="padding:0 0 5px 0; margin:5px 0 0 0;">
  <div class="bd-example" style="max-width:1200px; min-width:280px; overflow:auto; margin:auto">
    <div id="carouselExampleCaptions" class="carousel slide carousel-home" data-ride="carousel">
      <ol class="#">
        <li data-target="#carouselExampleCaptions" data-slide-to="0"></li>
      </ol>
      <div class="carousel-inner" >
       @foreach ($artikel as $key => $slide)
       <div class="carousel-item  {{$key == 0 ? 'active' : '' }}">
        <a href="{{($slide->link)}}"><img src="{{asset('gambarUpload/'.$slide->gambar_slide)}}" class="d-block w-100 responsive hyu" style=" border-radius:5px; alt="gambar"></a>
        <!--<div class="carousel-caption">-->
          <!--  <h3 class="carousel-title bounceInDown animated slow" style="color: #fff;">{{($slide->title)}}</h3>-->
          <!--  <h4 class="carousel-subtitle bounceInUp animated slow" style="color: #fff;">{{($slide->subtitle)}}</h4>-->
          <!--  <a class="btn min_bt bounceInUp animated slow" href="{{($slide->link)}}" >{{($slide->button)}}</a>-->
          <!--</div>-->
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

