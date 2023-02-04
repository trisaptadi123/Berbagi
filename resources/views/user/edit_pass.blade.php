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

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                  <p>{{ $message }}</p>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  <button type="button" class="btn-close" data-bs-dismiss="alert"
                  aria-label="Close"></button>
                </div>
                @endif  

                <form method="post" action="{{ url('editpass') }}" class=" center">
                  @csrf
                  @method('post')
                  @if ($users->id == Auth::user()->id)
                  <fieldset>
                    <div class="checkout-form" style="margin-bottom:10px; border:none;">

                      <div class="row">

                        <div class="col-md-12">
                          <div class="form-field">
                            <label>Password Lama</label>
                            <input type="password" name="password_lama" style="" class="" id="pass_old" placeholder="Password Lama">
                            <input type="checkbox" onclick="myFunctiont()">Show Password</td><td align="right">
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-field">
                              <label>Password Baru</label>
                              <input type="password" name="password_baru" style="" class="" id="pass_new" placeholder="Password Baru">               
                              <input type="checkbox" onclick="myFunctiontt()">Show Password</td><td align="right">
                              </div>
                            </div>
                        <div class="col-md-12 mb-4">
                          <div class="form-field">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="konfirmasi" style="" class="" id="confirm" placeholder="Konfirmasi Password Baru">
                            <input type="checkbox" onclick="myFunctionttt()">Show Password</td><td align="right">               
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Simpan</button>
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
<script type="text/javascript">
            function myFunctiontt() {
              var x = document.getElementById("pass_new");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }

            function myFunctiont() {
              var x = document.getElementById("pass_old");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }

            function myFunctionttt() {
              var x = document.getElementById("confirm");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
        </script>

@include('layouts.modal')

@include('layouts.footer_plus')

@include('layouts.js')
</body>
</html>
