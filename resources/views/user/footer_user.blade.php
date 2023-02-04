<!-- <div class="section" >
      <div class="cprt col-md-12 center"  style="bottom:0px; position: relative;">
        <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
      </div>
</div> -->      
    <!--<div class="container">-->
    <!--  <div class="row">-->
    <!--    <div class="col-md-12">-->
    <!--      <div class="full">-->
    <!--        <div class="text_align_left bottom_50">-->
    <!--          <p style="margin-top: 1%;">BerbagiBahagia ©Copyrights <script>document.write(new Date().getFullYear());</script></p>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
      <!--</div>-->
      <!--</div>-->

<div class="d-flex justify-content-center nyumput navbot" style="
/*display: flex;*/
    /*margin-left: 390px;*/
    width: 575px;
    position: fixed;
    justify-content: center;
    bottom: 0;
    height: 60px;
    box-shadow: 0px -3px 3px -2px rgba(0, 0, 0, 0.2);
    background-color: #fff;
    overflow-x: auto;">
        

  <a href="{{url('/')}}" class="nav__link {{ Request::is('/') ? 'nav__link--active' : '' }}">
    <i class="fa fa-home nav__icon"></i>
    <span class="nav__text">Beranda</span>
  </a>
  <a href="{{url('/semuadonasi')}}" class="nav__link {{ Request::segment(1) == 'semuadonasi' ? 'nav__link--active' : '' }}">
    <i class="fa fa-gift nav__icon"></i>
    <span class="nav__text">Donasi</span>
  </a>
  <a href="{{url('galangdana')}}" class="nav__link nav__link {{ Request::segment(1) == 'galangdana' ? 'nav__link--active' : '' }}">
    <i class="fa fa-plus-square nav__icon"></i>
    <span class="nav__text">Galang Dana</span>
  </a>
  <a href="{{url('/zis')}}" class="nav__link {{ Request::segment(1) == 'zis' ? 'nav__link--active' : '' }}">
    <i class="fa fa-briefcase nav__icon"></i>
    <span class="nav__text">Zakat</span>
  </a>
  @if(Auth::check())
  <a href="{{url('user')}}" class="nav__link {{ Request::segment(1) == 'user' ? 'nav__link--active' : '' }}">
    <i class="fa fa-user nav__icon"></i>
    <span class="nav__text">Akun</span>
  </a>
  
@else
  
  <a href="#" data-toggle="modal" data-target="#login" class="nav__link">
    <i class="fa fa-user nav__icon"></i>
    <span class="nav__text">Akun</span>
  </a>
@endif        

  </div>
    <!-- </div> -->
  
  