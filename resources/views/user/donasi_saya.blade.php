<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service" style="background:#fff;">

@include('layouts.header')

<div class="section blog_list" style="padding:50px 0 50px 0;">
  <div class="container" style="max-width: 540px">
    <div class="row">
      
    <!-- @ include('user.sidemenu') -->

     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:650px;">
     <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         
         <div class="row">
            <div class="col-md-6 col-sm-6">
            <h2 class="topuser nyumput">Donasi</h2> 
        </div>
        <div class="col-md-6 col-sm-6" >
            <a href="{{url('user')}}"  class=" btn btn-info col-md-6 nyumput " style="float: right; margin-bottom: 40px">Kembali</a>
        </div>
         </div>
         
        <a href="{{url('/semuadonasi')}}" type="submit" class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
        DONASI SEKARANG
        </a>
        <h3 class="topuser" >Riwayat Donasi</h3>
        @foreach ($donatur as $data)
        @if($data->id_users == Auth::user()->id)
        <div class="cardus blue a_list" style="margin-bottom:7px;">
          <a href="{{url('/semuadonasi')}}" style="color:#666;">
		     <div class="title"><b> {{$data->namakonten}} </b></div>
		     <i class="zmdi fa {{($data->status == 1)? 'fa-check-square':'fa-clock-o'}}" title="{{($data->status == 1)? 'Status Pembayaran : Terkonfirmasi':'Status Pembayaran : Pending'}}"></i>

		  	 <div class="stat">{{$data->created_at}}<b style="float:right;">Rp.{{number_format($data->jumlah+$data->kode)}}</b></div>
		  	  <!--<div class="stat">status pembayaran<b style="margin-left:20px"></b><label class="label {{($data->status == 1)? 'label-success':'label-danger'}}">{{($data->status == 1)? 'Paid':'Pending'}}</label></div>-->
		  </a>
        </div>
        @endif
        @endforeach
        
     </div>
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
      <!-- @ include('user.footer_user') -->
    </div>
     </div>
     </div>

    </div>
  </div>
</div>

@include('layouts.modal')

      <!-- <div class="cprt col-md-12 center nyumput2"  style="height: 50px; bottom:0px; position: relative;">
        <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>
      </div>  -->
      
			<a href="{{url('semuadonasi')}}" type="submit" class="btbot main_bt col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
	  
@include('layouts.js')
</body>
</html>
