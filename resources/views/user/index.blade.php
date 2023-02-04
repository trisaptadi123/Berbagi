<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service" >
  <!-- loader -->
  @include('layouts.header')

  <style type="text/css">
    .btnEdit {
      background: #fff;
      color: black;
      border: 1.5px solid #008CBA;
      padding: 5px 15px 5px 15px;
      font-size: 12px;
      border-radius: 5px;
      margin-left: 20px;
    } 
    .btnEdit:hover{
      background: #f2f2f2;
      color: black;
      border: 1.5px solid #f7f7f7;
      padding: 5px 15px 5px 15px;
      font-size: 12px;
      border-radius: 5px;
      margin-left: 20px;
    }
  </style>
  <div class="section blog_list " style="padding:30px 0 50px 0; height: 650px">
    <div class="container" style="max-width: 540px; background:#fff;">
      <div class="row">

        <!-- @ include('user.sidemenu') -->

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
          <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="side_bar">
                <div class="a_list">

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="display: flex;align-items:center; margin-left: 20px; margin-top:20px;">
                      <img style="width: 10%; height: 10%; margin-left: 2%;" src="{{asset('kuy/images/userid.png')}}">
                      <div > 
                        <b style="text-transform: capitalize; font-size: 18px; margin-left: 20px; display:block; margin-bottom: 10px;">{{Auth::user()->name}}</b>
                        <a href="{{url('akun')}}" class="btnEdit"  ">Edit Profil</a>  
                      </div>
                   </div>
                 </div>
                 <hr style="margin-left: 30px; margin-right: 30px; margin-top: 30px;">

                 <li class="active"><a href="{{url('dashboarded')}}"><span class="fa fa-dashboard"></span>&nbsp;&nbsp;&nbsp;Dashboard<span style="float:right;" class="fa fa-chevron-right"></span></a></li>
                 <li><a href="{{url('donasisaya')}}"><span class="fa fa-gift"></span>&nbsp;&nbsp;&nbsp;Donasi Saya<span style="float:right;" class="fa fa-chevron-right"></span></a></li>
                 <li><a href="{{url('qurbansaya')}}"><span class="fa fa-gift"></span>&nbsp;&nbsp;&nbsp;Ramadhan & Qurban<span style="float:right;" class="fa fa-chevron-right"></span></a></li>
                 <li><a href="{{url('galangdana')}}"><span class="fa fa-flag"></span>&nbsp;&nbsp;&nbsp;Galang Dana Saya<span style="float:right;" class="fa fa-chevron-right"></span></a></li>
                 <li><a href="{{url('akun')}}"><span class="fa fa-gear"></span>&nbsp;&nbsp;&nbsp;Pengaturan<span style="float:right;" class="fa fa-chevron-right"></span></a></li>
                 @if (Auth::user()->level == 'admin')
                 <li><a href="https://berbagibahagia.org/home"><span class="fa fa-gear"></span>&nbsp;&nbsp;&nbsp;Menu Admin<span style="float:right;" class="fa fa-chevron-right"></span></a></li>
                 @else
                 @endif
                 <li><a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span>&nbsp;&nbsp;&nbsp;Keluar<span style="float:right;" class="fa fa-chevron-right"></span></a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                </div>
              </div>
            </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      @include('layouts.footer_new')
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
