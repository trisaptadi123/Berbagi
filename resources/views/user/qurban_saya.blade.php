<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_service" style="background:#fff;">

@include('layouts.header')

<div class="section blog_list" style="padding:50px 0 50px 0;">
  <div class="container" style="max-width:540px">
    <div class="row">
      
    <!--@ include('user.sidemenu')-->

     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height:650px;">
     <div class="row">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         
        <h2 class="topuser nyumput">Ramadhan & Qurban</h2>
        @if($data->aktif == 1) 
        <a href="{{url('prog/qurban')}}" type="submit" class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
        Qurban SEKARANG </a>
        @elseif($data1->aktif == 1)
        <a href="{{url('prog/ramadhan')}}" type="submit" class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">
        Ramadhan SEKARANG </a>
        @else
        <button class="a_list nyumput btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px; background-color:gray;"> 
        Event telah BERAKHIR </button>
        @endif
        
        <h3 class="topuser">Riwayat  </h3>
        @foreach ($donatur as $i)
        @if($data->id_users == Auth::user()->id)
        
        <div class="cardus blue a_list" style="margin-bottom:7px;">
       
        @if($data->jenis == 'qurban')
          <a href="{{url('prog/qurban')}}" style="color:#666;">
          @elseif ($data->jenis == 'ramadhan')
          <a href="{{url('prog/ramadhan')}}" style="color:#666;">
          @else
          <a href="#" style="color:#666;">
          @endif
		     <div class="title"><b> {{$i->judul}} </b></div>
		     <i class="zmdi fa {{($data->status == 1)? 'fa-check-square':'fa-clock-o'}}" title="{{($data->status == 1)? 'Status Pembayaran : Terkonfirmasi':'Status Pembayaran : Pending'}}"></i>

		  	 <div class="stat">{{$i->created_at}}<b style="float:right;">Rp.{{number_format($i->total+$i->kode)}}</b></div>
		  	  <!--<div class="stat">status pembayaran<b style="margin-left:20px"></b><label class="label {{($data->status == 1)? 'label-success':'label-danger'}}">{{($data->status == 1)? 'Paid':'Pending'}}</label></div>-->
		      </a>
        </div>
        
        
        
        @endif
        @endforeach
        
     </div>
     </div>
     </div>

    </div>
  </div>
</div>

@include('layouts.modal')

      <!--<div class="cprt col-md-12 center"  style="height: 50px; bottom:0px; position: relative;">-->
      <!--  <p>BerbagiBahagia © Copyrights <script>document.write(new Date().getFullYear());</script></p>-->
      <!--</div> -->
      
			<a href="{{url('semuadonasi')}}" type="submit" class="btbot main_bt col-md-12" style="border-radius:0px;">DONASI SEKARANG</a>
	  
@include('layouts.js')
</body>
</html>
