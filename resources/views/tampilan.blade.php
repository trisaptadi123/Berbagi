<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<style type="text/css">
	/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>

<body id="default_theme" class="it_service" style="background:#f7f7f7;">
{{-- <!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>--> --}}

<!--<img src="{{asset('gambarUpload/maintenance.png')}}" style="width:100%; height:100%; object-fit:cover; position:fixed; z-index:9999;">-->
@include('layouts.header')
	
<div class="container" style="max-width: 540px;">



@include('layouts.slide')
<!-- end section -->

@include('layouts.menu')

@include('layouts.menuicon')

@include('layouts.viewunggulan')

@include('layouts.viewdonasi')

@include('layouts.artikel')

@include('layouts.viewanakasuh')

@include('layouts.cerita')

@include('layouts.foot')
@include('layouts.footer_new')


</div>

@include('layouts.modal')

<!-- @ include('layouts.footer') -->

@include('layouts.footer_plus')

@include('layouts.js')
</body>
</html>
