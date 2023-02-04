<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div>-->

@include('layouts.header')

<div class="section checkout_section" style="padding:50px 0 50px 0; padding-top: 80px">
   
  <div class="container" style="max-width: 540px">
    <div class="row">
    <!-- @ include('user.sidemenu') -->

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
    <div class="cardus a_list">
        
      <form method="get" action="#" class=" center">
        
        <fieldset>
           
        <div class="checkout-form" style="margin-bottom:10px; border:none;">
           
            <div class="row">
                @foreach ($users as $use)
                @if($use->id == Auth::user()->id)
              <div class="col-md-12">
                
                <div class="center form-field">
                  <div class="fileUpload">
                  <img id="output" style="height:80px; width:80px;" src="{{asset('kuy/images/userid.png')}}" >
                    <span class="fa fa-camera"></span>
                  </div> 
                </div>
                
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Nama</label>
                  <input type="text" name="nama" style="" class="" id="nama" placeholder="Nama Akun" value="{{$use->name}}" readonly> 
                </div>
               
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>No HP / Whatsapp</label>
                  <input type="text" name="no_hp" style="" class="" id="" placeholder="No HP / Whatsapp" value="{{$use->nomorhp}}" readonly>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Email</label>
                  <input type="email" name="email" style="" class="mb-4" id="" placeholder="Email" value="{{$use->email}}" readonly>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <a href="{{ url('/edituser/'.$use->id.'/edit') }}" type="submit" class="btn main_bt col-md-12 mb-3" style="border-radius:5px;">Edit Profile</a>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <a href="{{ url('/editpass/') }}" class="btn btn-block btn-primary col-md-12" style="border-radius:5px;">Ubah Kata Sandi</a>
                </div>
              </div>
              @endif
              @endforeach
            </div>
                            
        
        </div>
        </fieldset>
      
		  </form>
        
    </div>
    
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <!-- @ include('user.footer_user') -->
    </div>

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
