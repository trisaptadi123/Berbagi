  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>B</b>B</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
      
      
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
            
             <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ada 4 Data Transaksi Baru </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <h4>
                        Berbagi Makanan
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Rp.50.000</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <h4>
                        Berbagi Makanan
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Rp.90.000</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h4>
                        Berbagi Makanan
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Rp.150.000</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                       <h4>
                        Berbagi Makanan
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Rp.250.000</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h4>
                        Berbagi Makanan
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Rp.350.000</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> 
            <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Selamat bekerja, {{ Auth::user()->name }}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/preferences"><i class="fa fa-cogs"></i> Pengaturan</a></li>
                            <li><a href="/help/support"><i class="fa fa-user-circle"></i> Profil</a></li>
                            <li class="divider"></li>
                            <li> <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="fa fa-power-off">  Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form></li>
                        </ul>
                    </li>
                </ul>
              </div>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>