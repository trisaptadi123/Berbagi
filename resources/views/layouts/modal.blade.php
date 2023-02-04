<div class="modal fade" id="search_bar" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
              <div class="navbar-search">
                <form action="#" method="get" id="search-global-form" class="search-global">
                  <input type="text" placeholder="Cari Disini" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                  <button class="search-global__btn"><i class="fa fa-search"></i></button>
                  <div class="search-global__note">Mau berbagi apa hari ini?</div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="login" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 offset-lg-4 offset-md-4 offset-sm-4 col-xs-10 col-xs-offset-1">
              <div class="navbar-search">
                <form method="POST" action="{{ route('login') }}" id="search-global-form" class="search-global">
                  {{ csrf_field() }}
                  <input type="text" placeholder="Email" autocomplete="off" name="email" value="{{ old('email') }}" id="search" class="search-global__input" required>
                  @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
                  <input type="password" id="pass"  placeholder="Password" autocomplete="off"  name="password" id="search" value="" class="search-global__input" required>
                  @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
                  <table class="table"><tr class="search-global__note"><td align="left"><input type="checkbox" onclick="myFunction()">Show Password</td><td align="right"><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#lupa">Lupa password?</a></td></tr></table>
                  {{-- <a type="submit" class="btn min_bt col-md-12">Masuk</a> --}}
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  <div class="search-global__note center">Masuk Melalui</div>
                  <a type="submit" href="{{url('auth/login')}}" class="btn gg_bt col-md-12">gmail</a>
                  <!--<a type="submit" class="btn fb_bt col-md-12">Facebook</a>-->
                <div class="search-global__note">Belum punya akun? <a href="{{url('layouts/login')}}" data-dismiss="modal" data-toggle="modal" data-target="#daftar">Daftar disini</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="daftar" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 offset-lg-4 offset-md-4 offset-sm-4 col-xs-10 col-xs-offset-1">
              <div class="navbar-search">
                <form action="{{ route('register') }}" method="post" id="search-global-form" class="search-global">
                  @csrf
                  <input type="text" placeholder="Nama" autocomplete="off" name="name" id="search" value="" class="search-global__input" required>
                  <input type="text" placeholder="No HP / Whatsapp" autocomplete="off" name="nomorhp" id="search" value="" class="search-global__input">
                  <input type="text" placeholder="Email" autocomplete="off" name="email" id="search" value="" class="search-global__input" required>
                  <input type="password" placeholder="Password" autocomplete="off" name="password" id="search" value="" class="search-global__input" required>
                  <input hidden value="user" id="user-password" class="form-content" name="level"/>
                  <input hidden value="2021-06-15" class="form-content" name="email_verified_at"/>
                   <input type="password" placeholder="Konfirmasi Password" autocomplete="off" name="password_confirmation" id="search" value="" class="search-global__input" required>
                  <table class="table"><tr></tr></table>
                  <input id="submit-btn" type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Daftar" />
                  <div class="search-global__note">Sudah punya akun? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#login">Masuk disini</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="lupa" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 offset-lg-4 offset-md-4 offset-sm-4 col-xs-10 col-xs-offset-1">
              <div class="navbar-search">
                <form action="#" method="get" id="search-global-form" class="search-global">
                  <input type="text" placeholder="Masukan alamat email yang terdaftar" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                  <table class="table"><tr></tr></table>
                  <a type="submit" class="btn min_bt col-md-12">reset password</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
   <!--<div id="popupmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
   <!--     <div class="modal-header">-->
   <!--         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
   <!--         <h3>Notification: Please read</h3>-->
   <!--     </div>-->
   <!--     <div class="modal-body">-->
   <!--         <p>-->
   <!--             {{ Session::get('success') }}-->
   <!--         </p>-->
   <!--     </div>-->
   <!--     <div class="modal-footer">-->
   <!--         <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>-->
   <!--     </div>-->
   <!-- </div>-->
  
<!--@if(Session::get('success'))-->
  <!--<div class="modal fade" role="dialog">-->
  <!--<div class="modal-dialog">-->
  <!--    <div class="modal-content">-->
  <!--      <div class="modal-header">-->
  <!--        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>-->
  <!--      </div>-->
  <!--      <div class="modal-body">-->
  <!--        <div class="row">-->
  <!--          <div class="col-lg-4 col-md-4 col-sm-4 offset-lg-4 offset-md-4 offset-sm-4 col-xs-10 col-xs-offset-1">-->
              {{Session::get('success')}}
              
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
<!--@endif-->