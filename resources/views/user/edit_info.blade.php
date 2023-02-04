<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
@include('layouts.header')

<div class="section checkout_section" style="padding:50px 0 50px 0;">
  <div class="container">
    <div class="row">
    <h2 style="margin-left:25px;">Update Info Baru</h2>
      <div class="center col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="a_list">
	
      <form method="post" action="{{ url('/editinfo/'.$info->id) }}" class=" center" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <fieldset>
        <div class="checkout-form" style="margin-bottom:10px; border:none;">
            <div class="row">

              <div class="col-md-12">
                <div class="form-field">
                  <label>Deskripsi / Cerita Lengkap</label>
		              <textarea class="editor" name="artikel"  style="width: 100%">{{$info->artikel}}
                  </textarea>
                </div>
              </div>
                  <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Edit Info Campaign</button>
               

             
            
            </div>
        </div>
        </fieldset>
		  </form>
      
      </div>
      </div>

    </div>
  </div>
</div>

@include('layouts.modal')

@include('layouts.footer')

@include('layouts.js')
</body>
</html>