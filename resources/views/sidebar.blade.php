<div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset('kuy/images/userid.png')}}" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <a href="#"><i class="fa fa-circle text-success"></i>Sedang Bertugas</a>
    </div>
  </div>
  <!-- template pencarian -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
    </div>
  </form>
 {{-- Menu slidebar --}}
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active treeview">
      <a href="#">
        <i class="fa fa-pencil fa-fw"></i> <span>Konten</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-bar-chart"></i>Grafik Pengunjung</a></li>
        <li><a href="{{url('post')}}"><i class="fa fa-pencil"></i>Buat Konten</a></li>
        <li><a href="{{url('postcategory')}}"><i class="fa fa-tachometer"></i>Target Dana Konten</a></li>
        <li><a href="#"><i class="fa fa-bars"></i>List Kategori Konten</a></li>
         <li><a href="{{url('slide')}}"><i class="fa fa-picture-o"></i>Update Tampilan Slide</a></li>
      </ul>
    </li>

    <li class="active treeview">
      <a href="#">
        <i class="fa fa-book fa-fw"></i> <span>Program Anak Asuh</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <li><a href="{{url('anak')}}"><i class="fa fa-user-o"></i>Data Anak</a></li>

      </ul>
    </li>

    <li class="active treeview">
      <a href="#">
        <i class="fa fa-cog fa-fw"></i> <span>Program Open Goals</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('slide')}}"><i class="fa fa-circle-o"></i>Konten Urgent</a></li>
      </ul>
    </li>

    <li class="active treeview">
      <a href="#">
        <i class="fa fa-home fa-fw"></i> <span>Zakat & Infaq</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{url('zakat')}}"><i class="fa fa-heart-o"></i>Semua Zakat</a></li>
        <li><a href="{{url('postcategory')}}"><i class="fa fa-circle-o"></i>Infaq</a></li>
      </ul>
    </li>

    <li class="active treeview">
      <a href="#">
        <i class="fa fa-book fa-fw"></i> <span>Donasi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <li><a href="{{url('datadonatur')}}"><i class="fa fa-user-o"></i>Data Donatur Donasi</a></li>

      </ul>
    </li>

    <li class="active treeview">
      <a href="#">
        <i class="fa fa-credit-card"></i> <span>Transaksi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
       <li><a href="{{url('bank')}}"><i class="fa fa-usd"></i>Metode Pembayaran Bank</a></li>
      </ul>
    </li>
  </ul>
</section>