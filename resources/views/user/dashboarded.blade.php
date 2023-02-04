<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service" style="background:#fff;">
<!-- loader -->
@include('layouts.header')

<div class="section blog_list" style="padding:50px 0 50px 0;padding-top: 80px">
  <div class="container" style="max-width: 540px">
    <div class="row">
      
    <!-- @ include('user.sidemenu') -->

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:400px;">
    <div class="row">

    <!-- div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="topuser cardus a_list nyumput2">
      <img style="width: 10%; height: 10%; margin-left: 2%" src="{{asset('kuy/images/userid.png')}}">
      <table class="table">
      <tr style="border-top:2px solid #fff; font-size:16px; bottom: 40%;"><td><b>{{Auth::user()->name}}</b></td></tr>
      <tr style="border-top:2px solid #fff">
      <td>
      <a href="{{url('akun')}}" type="submit" class="btn main_bt">
       Edit Profil
      </a>
      <a href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" type="submit" class="btn main_bt" style="margin-right:-10px;">
       Keluar
      </a>
      </td></tr>
      </table>
    </div>
    </div> -->

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
       
       <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h2 class=" nyumput2" style="margin-top: -3px;">Dashboard</h2>
        <h3 class=" nyumput2" style="margin-top: -3px;">Donatur</h3>

        <h2 class="topuser nyumput">Dashboard</h2>
        <h3 class="topuser nyumput">Donatur</h3>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <a href="{{url('user')}}" class="btn btn-info nyumput" style=" width: 40px; float: right;">Kembali</a>
      </div>
    </div>


        <a href="{{url('/donasisaya')}}" style="color:#1f5daa;">
        <div class="cardus blue a_list">
         
         <div class="title">Riwayat Donasi</div>
          <i class="zmdi fa fa-folder"></i>
          <!--@foreach ($jml as $user)
          @if($user->id_users == Auth::user()->id)-->
         <!--<div class="value">{{$user->where('id_users',Auth::user()->id)->count('id_users')}}</div>
         <div class="stat">Total Donasi<b style="float:right;">Rp.{{number_format($user->where('id_users',Auth::user()->id)->sum('jumlah')+$user->where('id_users',Auth::user()->id)->sum('kode')),0,",","."}}</b></div>--> 
         <!--@else
         @endif
         @endforeach-->
        </div>
        </a>
        
      </div>

      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @foreach ($campaign as $user)
          
        <h3 class="topuser nyumput">Campaigner</h3>
        <div class="cardus blue a_list">
         <a href="{{url('galangdana')}}" style="color:#1f5daa;">
         <div class="title">Jumlah Campaign</div>
          <i class="zmdi fa fa-flag"></i>
         <div class="value">{{$user->where('id_users',Auth::user()->id)->count('id_users')}}</div>
         <div class="stat">Total Terkumpul<b style="float:right;">Rp. {{$user->where('id_users',Auth::user()->id)->sum('terkumpul')}}</b></div>
         </a>
        </div>
        
        @endforeach
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h3 class="topuser nyumput">Berbagi Info</h3>
        <div class="cardus blue a_list">
         <a href="{{url('berbagiinfo-me/'.Auth::user()->name)}}" style="color:#1f5daa;">
         <div class="title">Info Yang Saya Bagikan</div>
          <i class="zmdi fa fa-book"></i>
         @foreach ($campaign as $user)
         <div class="value">{{$artikel}}</div>
         <a href="{{url('buat-info/'.Auth::user()->id)}}" type="submit" class="btn main_bt" style="float:right">
               <i class="fa fa-plus"></i> Buat Info
              </a>
         <div class="stat">Total Info<b style="float:right;">{{$tot_artikel}}</b></div>
         </a>
         @endforeach
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- @ include('user.footer_user') -->
      </div>



    </div>
    </div>

    </div>
  </div>
</div>

@include('layouts.modal')

<!-- @ include('layouts.footer_plus') -->

@include('layouts.js')
</body>
</html>
