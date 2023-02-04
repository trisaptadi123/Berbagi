<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <div class="side_bar">
    <div class="a_list nyumput">

    <div class="prof">
      <div class="center"><img src="{{asset('kuy/images/userid.png')}}"></div>
      <h4 class="center" style="margin-top:30px;">{{Auth::user()->name}}</h4>
    </div>
    
    <li class="active"><a href="{{url('dashboarded')}}"><span class="fa fa-dashboard"></span>&nbsp;&nbsp;&nbsp;Dashboard</a></li>
    <li><a href="{{url('donasisaya')}}"><span class="fa fa-gift"></span>&nbsp;&nbsp;&nbsp;Donasi Saya</a></li>
    <li><a href="{{url('qurbansaya')}}"><span class="fa fa-gift"></span>&nbsp;&nbsp;&nbsp;Ramadhan & Qurban</a></li>
    <li><a href="{{url('galangdana')}}"><span class="fa fa-flag"></span>&nbsp;&nbsp;&nbsp;Galang Dana Saya</a></li>
    <li><a href="{{url('akun')}}"><span class="fa fa-gear"></span>&nbsp;&nbsp;&nbsp;Pengaturan</a></li>
     @if (Auth::user()->level == 'admin')
     <li><a href="https://berbagibahagia.org/home"><span class="fa fa-gear"></span>&nbsp;&nbsp;&nbsp;Menu Admin</a></li>
     @else
            @endif
    <li><a href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><span class="fa fa-sign-out"></span>&nbsp;&nbsp;&nbsp;Keluar</a></li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>

    </div>
    </div>
    </div>