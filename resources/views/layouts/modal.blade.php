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
                  <form action="#" method="get" id="search-global-form" class="search-global">
                    <input type="text" placeholder="No HP atau Email" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                    <input type="password" placeholder="Password" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                  <table class="table"><tr class="search-global__note"><td align="right"><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#lupa">Lupa password?</a></td></tr></table>
                    <a type="submit" class="btn min_bt col-md-12">Masuk</a>
                    <div class="search-global__note center">atau masuk dengan</div>
                    <a type="submit" class="btn gg_bt col-md-12">Google</a>
                    <a type="submit" class="btn fb_bt col-md-12">Facebook</a>
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
                  <form action="#" method="get" id="search-global-form" class="search-global">
                    <input type="text" placeholder="Nama" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                    <input type="text" placeholder="No HP / Whatsapp" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                    <input type="text" placeholder="Email" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                    <input type="password" placeholder="Password" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                    <input type="password" placeholder="Konfirmasi Password" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                    <table class="table"><tr></tr></table>
                    <a type="submit" class="btn min_bt col-md-12">Daftar</a>
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