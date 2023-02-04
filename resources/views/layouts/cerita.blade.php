<style>
    #slideshow { 
  margin: 0px auto; 
  position: relative; 
  width: 100%; 
  height: 100px; 
  padding: 10px; 
}

#slideshow > div { 
  position: absolute; 
  top: 10px; 
  left: 10px; 
  right: 10px; 
}
</style>

<div class="section d-flex justify-content-center" style="padding:0px 0 10px 0; background:#fff; margin:5px 0 5px 0;">
  <div class="container">
	<div class="row">
      <div class="col-md-12">
        <div class="full">
		<table class="table head" style="border-top:2px solid #fffffe;">
              <tr><td>
                    <h5 style="margin: 0 0 5px 0; text-transform: capitalize;">Kabar Bahagia</h5>
                <hr/>
              </td>
              </tr></table>
        </div>
      </div>
    </div>
    <!-- tambahin id="cerita" -->
    <div class="row" id="campaignnn">
	<div class="swiper-container"  style=" z-index:0; width: 500px;padding: 5px; overflow-x: scroll;">
	<div class="swiper-wrapper" >
    @foreach ($kabar as $post)
	  <div class="swiper-slide" style=" padding-bottom: 15px">
		<a href="{{route('cerita.detail',$post->link)}}">
        <div class="c2_list">
          <div class="c2_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar_cerita)}}" alt="#"> </div>
          <div class="c2_detail_btm">
            <h4 style="font-size: 12px">{{$post->judul}}</h4>
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
