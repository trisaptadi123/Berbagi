
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
    @if(Auth::user()->level == 'admin')
    <?php 
      $active_parent = request()->is('dashboard') | request()->is('post') | request()->is('post/create') |  request()->is('artikel') |  request()->is('artikel/create') |  request()->is('dashboard') 
      |  request()->is('postcategory') |  request()->is('postcategory/create') |  request()->is('info') |  request()->is('unggulan') |  request()->is('utama') 
      |  request()->is('slide') |  request()->is('slide/create') |  request()->is('disclaimer') ? 'active' : '';
    ?>
    <li class=" treeview {{$active_parent}}">
      <a href="#">
        <i class="fa fa-pencil fa-fw"></i> <span>Konten</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('dashboard') ? 'active' : ''}}"><a href="{{url('home')}}"><i class="fa fa-bar-chart"></i>Grafik Pengunjung</a></li>
        <li class="{{ request()->is('artikel') |  request()->is('artikel/create') ? 'active' : ''}}"><a href="{{url('artikel')}}"><i class="fa fa-pencil"></i>Artikel</a></li>
        <li class="{{ request()->is('post') | request()->is('post/create') ? 'active' : ''}}"><a href="{{url('post')}}"><i class="fa fa-pencil"></i>Buat Konten</a></li>
        <li class="{{ request()->is('postcategory') |  request()->is('postcategory/create') ? 'active' : ''}}"><a href="{{url('postcategory')}}"><i class="fa fa-tachometer"></i>Kategori</a></li>
        <li class="{{ request()->is('posttag') |  request()->is('posttag/create') ? 'active' : ''}}"><a href="{{url('posttag')}}"><i class="fa fa-tachometer"></i>Tag</a></li>
        <li class="{{ request()->is('info') ? 'active' : ''}}"><a href="{{url('info')}}"><i class="fa fa-newspaper-o"></i>Update Terbaru</a></li>
        <li class="{{ request()->is('unggulan') ? 'active' : ''}}"><a href="{{url('unggulan')}}"><i class="fa fa-newspaper-o"></i>Campaign Unggulan</a></li>
        <li class="{{ request()->is('utama') ? 'active' : ''}}"><a href="{{url('utama')}}"><i class="fa fa-newspaper-o"></i>Campaign Utama</a></li>
         <li class="{{ request()->is('slide') |  request()->is('slide/create') ? 'active' : ''}}"><a href="{{url('slide')}}"><i class="fa fa-picture-o"></i>Update Tampilan Slide</a></li>
         <li class="{{ request()->is('disclaimer') ? 'active' : ''}}"><a href="{{url('disclaimer')}}"><i class="fa fa-circle-o"></i>Disclaimer</a></li>
      </ul>
    </li>

    <li class=" treeview {{ request()->is('anak/create') |  request()->is('anak') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-book fa-fw"></i> <span>Program Anak Asuh</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <li class="{{ request()->is('anak/create') |  request()->is('anak') ? 'active' : '' }}"><a href="{{url('anak')}}"><i class="fa fa-user-o"></i>Data Anak</a></li>

      </ul>
    </li>

    <li class=" treeview {{ request()->is('kabarbaik/create') |  request()->is('kabarbaik') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-cog fa-fw"></i> <span>Form Penyaluran</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('kabarbaik/create') |  request()->is('kabarbaik') ? 'active' : '' }}"><a href="{{url('kabarbaik')}}"><i class="fa fa-circle-o"></i>Kabar Bahagia</a></li>
      </ul>
    </li>

    <!--<li class=" treeview {{ request()->is('zakat') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-home fa-fw"></i> <span>Zakat & Infaq</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('zakat') ? 'active' : '' }}"><a href="{{url('zakat')}}"><i class="fa fa-heart-o"></i>Semua Zakat</a></li>
      </ul>
    </li>-->
    
    <li class=" treeview {{ request()->is('ramadhan') | request()->is('create/ramadhan') | request()->is('inforamadhan') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-home fa-fw"></i> <span>Ramadhan & Qurban</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('ramadhan') | request()->is('create/ramadhan') ? 'active' : '' }}"><a href="{{url('ramadhan')}}"><i class="fa fa-heart-o"></i>Semua Ramadhan & Qurban</a></li>
        <li class="{{ request()->is('inforamadhan') ? 'active' : '' }}"><a href="{{url('inforamadhan')}}"><i class="fa fa-heart-o"></i>Info Terbaru</a></li>
        <!-- <li><a href="{{url('postcategory')}}"><i class="fa fa-circle-o"></i>Infaq</a></li> -->
      </ul>
    </li>

    <li class=" treeview {{ request()->is('datadonatur') | request()->is('dataramadhan') | request()->is('fundraise')
    | request()->is('donatefundraiser') | request()->is('zakat') | request()->is('datadonaturanak') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-book fa-fw"></i> <span>Donasi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <li class="{{ request()->is('datadonatur') ? 'active' : '' }}"><a href="{{url('datadonatur')}}"><i class="fa fa-user-o"></i>Data Donatur Donasi</a></li>
          <li class="{{ request()->is('datadonaturanak') ? 'active' : '' }}"><a href="{{url('datadonaturanak')}}"><i class="fa fa-user-o"></i>Data Donatur Anak</a></li>
          <li class="{{ request()->is('dataramadhan') ? 'active' : '' }}"><a href="{{url('dataramadhan')}}"><i class="fa fa-user-o"></i>Data Ramadhan & Qurban</a></li>
          <li class="{{ request()->is('fundraise') ? 'active' : '' }}"><a href="{{url('fundraise')}}"><i class="fa fa-user-o"></i>Data Fundraiser</a></li>
          <li class="{{ request()->is('donatefundraiser') ? 'active' : '' }}"><a href="{{url('donatefundraiser')}}"><i class="fa fa-user-o"></i>Donatur Fundraiser</a></li>
          <li class="{{ request()->is('zakat') ? 'active' : '' }}"><a href="{{url('zakat')}}"><i class="fa fa-heart-o"></i>Semua Zakat</a></li>
      </ul>
    </li>

    <li class=" treeview {{ request()->is('bank') | request()->is('bank/create') | request()->is('pencairan_dana') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-credit-card"></i> <span>Transaksi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
       <li class="{{ request()->is('bank') | request()->is('bank/create') ? 'active' : '' }}"><a href="{{url('bank')}}"><i class="fa fa-usd"></i>Metode Pembayaran Bank</a></li>
       <li class="{{ request()->is('pencairan_dana') ? 'active' : '' }}"><a href="{{url('pencairan_dana')}}"><i class="fa fa-usd"></i>Pencairan Dana</a></li>
      </ul>
    </li>
    
      <li class=" treeview {{ request()->is('allakun') | request()->is('tambahuser') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-credit-card"></i> <span>Akun</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
       <li class="{{ request()->is('allakun') | request()->is('tambahuser') ? 'active' : '' }}"><a href="{{url('allakun')}}"><i class="fa fa-usd"></i>User dan Admin</a></li>
      </ul>
    </li>
    @elseif(Auth::user()->level == 'campaign')
    <?php 
      $active_parent = request()->is('dashboard') | request()->is('post') | request()->is('post/create') |  request()->is('artikel') |  request()->is('artikel/create') |  request()->is('dashboard') 
      |  request()->is('postcategory') |  request()->is('postcategory/create') |  request()->is('info') |  request()->is('unggulan') |  request()->is('utama') 
      |  request()->is('slide') |  request()->is('slide/create') |  request()->is('disclaimer') ? 'active' : '';
    ?>
    <li class=" treeview {{$active_parent}}">
      <a href="#">
        <i class="fa fa-pencil fa-fw"></i> <span>Konten</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('dashboard') ? 'active' : ''}}"><a href="{{url('home')}}"><i class="fa fa-bar-chart"></i>Grafik Pengunjung</a></li>
        <li class="{{ request()->is('artikel') |  request()->is('artikel/create') ? 'active' : ''}}"><a href="{{url('artikel')}}"><i class="fa fa-pencil"></i>Artikel</a></li>
        <li class="{{ request()->is('post') | request()->is('post/create') ? 'active' : ''}}"><a href="{{url('post')}}"><i class="fa fa-pencil"></i>Buat Konten</a></li>
        <li class="{{ request()->is('postcategory') |  request()->is('postcategory/create') ? 'active' : ''}}"><a href="{{url('postcategory')}}"><i class="fa fa-tachometer"></i>Kategori</a></li>
        <li class="{{ request()->is('info') ? 'active' : ''}}"><a href="{{url('info')}}"><i class="fa fa-newspaper-o"></i>Lihat Info Terbaru</a></li>
        <li class="{{ request()->is('unggulan') ? 'active' : ''}}"><a href="{{url('unggulan')}}"><i class="fa fa-newspaper-o"></i>Campaign Unggulan</a></li>
        <li class="{{ request()->is('utama') ? 'active' : ''}}"><a href="{{url('utama')}}"><i class="fa fa-newspaper-o"></i>Campaign Utama</a></li>
        <li class="{{ request()->is('slide') |  request()->is('slide/create') ? 'active' : ''}}"><a href="{{url('slide')}}"><i class="fa fa-picture-o"></i>Update Tampilan Slide</a></li>
        <li class="{{ request()->is('disclaimer') ? 'active' : ''}}"><a href="{{url('disclaimer')}}"><i class="fa fa-circle-o"></i>Disclaimer</a></li>
        <!--<li><a href="{{url('dashboard')}}"><i class="fa fa-bar-chart"></i>Grafik Pengunjung</a></li>
        <li><a href="{{url('artikel')}}"><i class="fa fa-pencil"></i>Artikel</a></li>
        <li><a href="{{url('post')}}"><i class="fa fa-pencil"></i>Buat Konten</a></li>
        <li><a href="{{url('postcategory')}}"><i class="fa fa-tachometer"></i>Kategori</a></li>
        <li><a href="{{url('info')}}"><i class="fa fa-newspaper-o"></i>Lihat Info Terbaru</a></li>
        <li><a href="{{url('unggulan')}}"><i class="fa fa-newspaper-o"></i>Campaign Unggulan</a></li>
        <li><a href="{{url('utama')}}"><i class="fa fa-newspaper-o"></i>Campaign Utama</a></li>
         <li><a href="{{url('slide')}}"><i class="fa fa-picture-o"></i>Update Tampilan Slide</a></li>
         <li><a href="{{url('disclaimer')}}"><i class="fa fa-circle-o"></i>Disclaimer</a></li>-->
      </ul>
    </li>
    <li class=" treeview {{ request()->is('anak/create') |  request()->is('anak') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-book fa-fw"></i> <span>Program Anak Asuh</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
      <li class="{{ request()->is('anak/create') |  request()->is('anak') ? 'active' : '' }}"><a href="{{url('anak')}}"><i class="fa fa-user-o"></i>Data Anak</a></li>

      </ul>
    </li>

    <li class=" treeview {{ request()->is('kabarbaik/create') |  request()->is('kabarbaik') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-cog fa-fw"></i> <span>Form Penyaluran</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu ">
        <li class="{{ request()->is('kabarbaik/create') |  request()->is('kabarbaik') ? 'active' : '' }}"><a href="{{url('kabarbaik')}}"><i class="fa fa-circle-o"></i>Kabar Baik</a></li>
      </ul>
    </li>

    <li class=" treeview {{ request()->is('ramadhan') | request()->is('create/ramadhan') | request()->is('inforamadhan') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-home fa-fw"></i> <span>Ramadhan & Qurban</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('ramadhan') | request()->is('create/ramadhan') ? 'active' : '' }}"><a href="{{url('ramadhan')}}"><i class="fa fa-heart-o"></i>Semua Ramadhan & Qurban</a></li>
        <li class="{{ request()->is('inforamadhan') ? 'active' : '' }}"><a href="{{url('inforamadhan')}}"><i class="fa fa-heart-o"></i>Info Terbaru</a></li>
        <!-- <li><a href="{{url('postcategory')}}"><i class="fa fa-circle-o"></i>Infaq</a></li> -->
      </ul>
    </li>
    @elseif(Auth::user()->level == 'keuangan')
    <!--<li class=" treeview {{ request()->is('zakat') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-home fa-fw"></i> <span>Zakat & Infaq</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('zakat') ? 'active' : '' }}"><a href="{{url('zakat')}}"><i class="fa fa-heart-o"></i>Semua Zakat</a></li>
      </ul>
    </li>-->
    <li class=" treeview {{ request()->is('datadonatur') | request()->is('dataramadhan') | request()->is('fundraise') | request()->is('pencairan_dana')
    | request()->is('donatefundraiser') | request()->is('zakat') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-book fa-fw"></i> <span>Donasi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
          <li class="{{ request()->is('datadonatur') ? 'active' : '' }}"><a href="{{url('datadonatur')}}"><i class="fa fa-user-o"></i>Data Donatur Donasi</a></li>
           <li class="{{ request()->is('datadonaturanak') ? 'active' : '' }}"><a href="{{url('datadonaturanak')}}"><i class="fa fa-user-o"></i>Data Donatur Anak</a></li>
          <li class="{{ request()->is('dataramadhan') ? 'active' : '' }}"><a href="{{url('dataramadhan')}}"><i class="fa fa-user-o"></i>Data Ramadhan & Qurban</a></li>
          <li class="{{ request()->is('fundraise') ? 'active' : '' }}"><a href="{{url('fundraise')}}"><i class="fa fa-user-o"></i>Data Fundraiser</a></li>
          <li class="{{ request()->is('donatefundraiser') ? 'active' : '' }}"><a href="{{url('donatefundraiser')}}"><i class="fa fa-user-o"></i>Donatur Fundraiser</a></li>
          <li class="{{ request()->is('zakat') ? 'active' : '' }}"><a href="{{url('zakat')}}"><i class="fa fa-heart-o"></i>Semua Zakat</a></li>
          <!--<li><a href="{{url('datadonatur')}}"><i class="fa fa-user-o"></i>Data Donatur Donasi</a></li>
          <li><a href="{{url('dataramadhan')}}"><i class="fa fa-user-o"></i>Data Ramadhan & Qurban</a></li>
          <li><a href="{{url('pencairan_dana')}}"><i class="fa fa-circle-o"></i>Pencairan Dana</a></li>
          <li><a href="{{url('fundraise')}}"><i class="fa fa-user-o"></i>Data Fundraiser</a></li>
          <li><a href="{{url('donatefundraiser')}}"><i class="fa fa-user-o"></i>Donatur Fundraiser</a></li>-->
      </ul>
        
    </li>

    <li class=" treeview {{ request()->is('bank') | request()->is('bank/create') | request()->is('pencairan_dana') ? 'active' : '' }}">
      <a href="#">
        <i class="fa fa-credit-card"></i> <span>Transaksi</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
       <li class="{{ request()->is('bank') | request()->is('bank/create') ? 'active' : '' }}"><a href="{{url('bank')}}"><i class="fa fa-usd"></i>Metode Pembayaran Bank</a></li>
       <li class="{{ request()->is('pencairan_dana') ? 'active' : '' }}"><a href="{{url('pencairan_dana')}}"><i class="fa fa-usd"></i>Pencairan Dana</a></li>
      </ul>
    </li>
    @endif
  </ul>
</section>