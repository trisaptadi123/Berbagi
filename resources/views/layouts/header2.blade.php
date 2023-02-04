
<header id="default_header" class="header_style_1" >
  <!-- header top -->
<!--<div class="header_top">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--      </div> -->
<!--    </div> -->
<!--</div>-->
  <!-- end header top -->
  <!-- header bottom -->

   
  <div class="header_bottom">
          <nav>
              <div class="hah">
               @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            </div>
            @endif
           
            
            @if(Auth::check())
          
    <!--<div class="menu-icon"><span><i class="fa fa-bars"></i></span></div>-->
    <!--<div class="cancel2-icon"><i class="fa fa-times"></i></div>-->
    <div class="logo nyumput2" ><a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo" /></a></div>
    <div class="nav-items justify-content-center">
      <li>
        <div class="logo nyumput " ><a href="{{url('/')}}" ><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo" /></a></div>
      </li>
      <!--<li>-->
      <!--<form class="nyumput2">-->
      <!--  <input type="search" placeholder=" Cari disini... ">-->
      <!--</form>-->
      <!--</li>-->

      <!-- ada -->
      <!-- <li><a href="{{url('/semuadonasi')}}">Donasi</a></li> -->
      
      <!-- ada -->
      <!-- <div class="dropdown2">
        <button class="dropbtn2">ZIS <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown2-content">
          <a href="{{url('/zis')}}">Zakat</a>
          <a href="https://berbagibahagia.org/program/Infak">Infak / Sedekah</a>
        </div>
      </div> -->

      <!-- ada -->
      <!-- <div class="dropdown2">
        <button class="dropbtn2">Program Unggulan <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown2-content">
          <a href="https://berbagibahagia.org/layouts/semuaanakasuh">Berbagi Pendidikan</a>
          <a href="https://berbagibahagia.org/program/berbagikesehatan">Berbagi Kesehatan</a>
          <a href="https://berbagibahagia.org/program/berbagialquran">Berbagi Al-Qur'an</a>
          <a href="https://berbagibahagia.org/program/berbagimakanan">Berbagi Makanan</a>
        </div>
      </div> -->

      <!-- ada -->
      <!-- <li><a href="{{url('/berbagiinfo')}}">Berbagi Info</a></li> -->


      <!--<li><a href="#" data-toggle="modal" data-target="#login">Galang Dana</a></li>-->
      <?php 
         $qurban = \App\Qurban::where(['jenis' => 'qurban'])->get(); 
         $ramadhan = \App\Qurban::where(['jenis' => 'ramadhan'])->get();
      ?>
      @if(!empty($qurban->count()))
        @if($qurban[0]['aktif'] == 1)
          <!-- <li><a href="{{url('prog/qurban')}}">Qurban </a></li> -->
        @endif
      @else
      @endif
      @if(!empty($ramadhan->count()))
          @if($ramadhan[0]['aktif'] == 1)
          <li><a href="{{url('prog/ramadhan')}}">Ramadhan </a></li>
          @endif
      @else
      @endif

      <li style="margin-top: 15px; ">
      <form action="{{url('cariartikel')}}" method="GET" class="nyumput">
        <input type="search" name="cari" class="cari " placeholder="Cari Artikel " style="width: 220px;padding-right: 50%">
      </form>
      </li>
    </div>

    <!-- ada -->
    <!-- <div class="nyumput" style="margin-bottom:10px; ">
      <a href="{{url('galangdana')}}" class="btn main_bt">Galang Dana</a>
    </div> -->


    <div class="search-icon nyumput2">
      
      <form action="{{url('cariartikel')}}" method="GET" class="">
        <input type="search" name="cari" class="cari2" placeholder="Cari Artikel">
      </form>
    </div>


    
    <!--<div class="dropdown2">-->
    <!--  <button class="dropbtn2">{{Auth::user()->name}}<i class="fa fa-caret-down"></i>-->
    <!--  </button>-->
    <!--  <div class="dropdown2-content">-->
    <!--    <a href="{{ route('logout') }}"-->
    <!--    onclick="event.preventDefault();-->
    <!--                  document.getElementById('logout-form').submit();" class="fa fa-power-off">Logout</a>-->
    <!--                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
    <!--                    @csrf-->
    <!--                  </form>-->
    <!--    <a href="#">Profil</a>-->
    <!--  </div>-->
    <!--</div>-->
    
    @else
    <!--<div class="menu-icon"><span><i class="fa fa-bars"></i></span></div>-->
    <!--<div class="cancel2-icon"><i class="fa fa-times"></i></div>-->
    <div class="logo nyumput2" ><a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo" /></a></div>

    <!-- <div class="logo nyumput " ><a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo" /></a></div> -->
    <div class="nav-items justify-content-center">
      <li>
        <div class="logo nyumput " ><a href="{{url('/')}}" ><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo" /></a></div>
      </li>
      <!--<li>-->
      <!--<form class="nyumput2">-->
      <!--  <input type="search" placeholder=" Cari disini... ">-->
      <!--</form>-->
      <!--</li>-->

      <!-- ada -->
      <!-- <li><a href="{{url('/semuadonasi')}}">Donasi</a></li> -->
      
      <!-- ada -->
      <!-- <div class="dropdown2">
        <button class="dropbtn2">ZIS <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown2-content">
          <a href="{{url('/zis')}}">Zakat</a>
          <a href="https://berbagibahagia.org/program/Infak">Infak / Sedekah</a>
        </div>
      </div> -->

      <!-- ada -->
      <!-- <div class="dropdown2">
        <button class="dropbtn2">Program Unggulan <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown2-content">
          <a href="https://berbagibahagia.org/layouts/semuaanakasuh">Berbagi Pendidikan</a>
          <a href="https://berbagibahagia.org/program/berbagikesehatan">Berbagi Kesehatan</a>
          <a href="https://berbagibahagia.org/program/berbagialquran">Berbagi Al-Qur'an</a>
          <a href="https://berbagibahagia.org/program/berbagimakanan">Berbagi Makanan</a>
        </div>
      </div> -->

      <!-- ada -->
      <!-- <li><a href="{{url('/berbagiinfo')}}">Berbagi Info</a></li> -->


      <!--<li><a href="#" data-toggle="modal" data-target="#login">Galang Dana</a></li>-->
      <?php 
         $qurban = \App\Qurban::where(['jenis' => 'qurban'])->get(); 
         $ramadhan = \App\Qurban::where(['jenis' => 'ramadhan'])->get();
      ?>
      <!--@if(!empty($qurban->count()))
        @if($qurban[0]['aktif'] == 1)
          <li><a href="{{url('prog/qurban')}}">Qurban </a></li>
        @endif
      @else
      @endif-->
      @if(!empty($ramadhan->count()))
          @if($ramadhan[0]['aktif'] == 1)
          <li><a href="{{url('prog/ramadhan')}}">Ramadhan </a></li>
          @endif
      @else
      @endif

      <li style="margin-top: 15px; ">
      <form action="{{url('cariartikel')}}" method="GET" class="nyumput">
        <input type="search" name="cari" id="cari" class="cari " placeholder="Cari Artikel" style="width: 220px;padding-right: 50%">
      </form>
      </li>
    </div>

    <!-- ada -->
    <!-- <div class="nyumput" style="margin-bottom:10px; ">
      <a href="href="#" data-toggle="modal" data-target="#login"" class="btn main_bt">Galang Dana</a>
    </div> -->

    <!-- adaa -->
    <div class="search-icon">
    <!-- <div class="nyumput">
    <a href="#" data-toggle="modal" data-target="#login" style="display:flex;">
    <i class="fa fa-sign-in"></i><div id="showlogin" style="font-size:14px;">&nbsp;Login</div>
    </a>
    </div> -->
      <form action="{{url('cariartikel')}}" method="GET" class="">
        <input type="search" name="cari" class="cari2" placeholder="Cari Artikel">
      </form>
    </div>
    
    <!--<div class="cancel-icon"><i class="fa fa-times"></i></div>-->
    @endif
    </div>
  </nav>   
  </div>
  <!--@if ($message = Session::get('success'))-->
  <!--          <div class="alert alert-success alert-block">-->
  <!--          <button type="button" class="close" data-dismiss="alert">×</button> -->
  <!--          <strong>{{ $message }}</strong>-->
  <!--          </div>-->
  <!--          @endif-->
</header>