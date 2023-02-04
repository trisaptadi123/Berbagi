<div class="section" >
      <!--<div class="cprt col-md-6 center nyumput2"  style="bottom:0px; position: relative;">-->
      <!--  <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>-->
      <!--</div>-->
      
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
      

<div class="nyumput2 navbot">
        
<a href="{{url('/')}}" class="nav__link {{ Request::is('/') ? 'nav__link--active' : '' }}">
    <i class="fa fa-home nav__icon"></i>
    <span class="nav__text">Beranda</span>
  </a>
  <a href="{{url('/semuadonasi')}}" class="nav__link {{ Request::segment(1) == 'semuadonasi' ? 'nav__link--active' : '' }}">
    <i class="fa fa-gift nav__icon"></i>
    <span class="nav__text">Donasi</span>
  </a>
  
  @if(Auth::check())
  <a href="{{url('/buat-galang-dana')}}" class="nav__link nav__link {{ Request::segment(1) == 'galangdana' ? 'nav__link--active' : '' }}">
    <i class="fa fa-plus-square nav__icon"></i>
    <span class="nav__text">Galang Dana</span>
  </a>
  @else
    <a href="#" data-toggle="modal" data-target="#login" class="nav__link">
    <i class="fa fa-plus-square nav__icon"></i>
    <span class="nav__text">Galang Dana</span>
  </a>
  @endif
  
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
    </div>
  
  