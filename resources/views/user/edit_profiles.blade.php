<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div>-->

@include('layouts.header')

<div class="section checkout_section" style="padding:50px 0 50px 0;padding-top: 80px">
   
  <div class="container" style="max-width: 540px">
    <div class="row">
    <!-- @ include('user.sidemenu') -->

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
    
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
    <div class="cardus a_list">
        
      <form method="post" action="{{ url('/edituser/'.$users->id) }}" class=" center">
        @csrf
        @method('patch')
        @if ($users->id == Auth::user()->id)
        <fieldset>
        <div class="checkout-form" style="margin-bottom:10px; border:none;">
           
            <div class="row">
              <div class="col-md-12">
                
                <div class="center form-field">
                  <div class="fileUpload">
                  <img id="output" style="height:80px; width:80px;" src="{{asset('kuy/images/userid.png')}}" >
                   <span class="fa fa-camera"></span>
                   <input type="file" accept="image/*" onchange="loadFile(event)" name="foto" class="upload" />
                  </div> 
                </div>
                
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Nama</label>
                  <input type="text" name="name" style="" class="" id="nospace" placeholder="Nama Akun" value="{{$users->name}}" required> 
                </div>
               
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>No HP / Whatsapp</label>
                  <input type="text" name="nomorhp" style="" class="" id="" placeholder="No HP / Whatsapp" value="{{$users->nomorhp}}" required>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Email</label>
                  <input type="email" name="email" style="" class="mb-4" id="" placeholder="Email" value="{{$users->email}}" required>               
                </div>
              </div>
              <!-- <div class="col-md-12">
                <div class="form-field">
              <b><a href="#col-pass" class="" data-toggle="collapse" style="color:#1f5daa;">Klik Disini Untuk Ganti Password</a></b></p>
                </div>
              </div> -->
             <!--  <div id="col-pass" class="collapse">
              <div class="col-md-12">
                <div class="form-field">
                  <label>Password Lama</label>
                  <input type="password" name="p_lama" style="" class="" id="" placeholder="Password Lama">               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Password Baru</label>
                  <input type="password" name="p_baru" style="" class="" id="" placeholder="Password Baru">               
                </div>
              </div>
              <div class="col-md-12 mb-4">
                <div class="form-field">
                  <label>Konfirmasi Password Baru</label>
                  <input type="password" name="konfirmasi" style="" class="mb-4" id="" placeholder="Konfirmasi Password Baru">               
                </div>
              </div>
              </div> -->
              <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Simpan Profile</button>
            </div>
                            
        
        </div>
        </fieldset>
        @else
        Oops....data tidak ditemukan(404);
        @endif
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
