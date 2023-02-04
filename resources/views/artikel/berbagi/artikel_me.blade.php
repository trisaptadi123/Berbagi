@extends('artikel.berbagi.index')
@section('content')
<style type="text/css">
  .box-1 {
 padding: 20px;
 color: white;
 margin: 0 auto; /* code ini akan membuat div berada di tengah atas */
}
</style>
<style type="text/css">
      .box-hyu {
         background : #f2f2f2;
         padding: 10px;
         color: white;
         margin: 0 auto; /* code ini akan membuat div berada di tengah atas */
    }
    .btn-hyuwan{
        background : #1f5daa;
        color : white;
        padding : 10px 15px 10px 15px;
        border-radius : 20px;
        float:right;
    }
    .btn-hyuwan:hover{
        background : #03cffc;
        color : white;
        padding : 10px 20px 10px 20px;
        border-radius : 20px;
        float:right;
    }
    </style>
<div class="section" style="padding:10px 0 10px 0; background:#fff; margin:5px 0 0 0;">
    <div class="container">
    <div class="row">
     <div class="center">
         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right" style="padding-top:20px;">
            
                <h4 style="margin-left:15px; font-size:22px; float:left; margin-top:10px;">Info yang saya bagikan</h4>
        </div>
      </div>
    </div>
@foreach ($list_artikel as $artikel)

    <div class="row nyumput2" style="margin-bottom: -30px; background:#fff;">
        <div class="center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all box-1" >
            <div class="full">
            <?php $char = array(" ");
		          $judul = str_replace($char,"-", $artikel->judul); ?>
		      
                  <img class="img-responsive" src="{{asset('gambarUpload/artikel/'.$artikel->gambar)}}" alt=""> 
                  <p class="status" style="{{($artikel->status == 1)? 'background:#00d604;':'background:#d90000;'}} left:12.5px; margin-top:20px;"> {{($artikel->status == 1)? 'Status: ACC':'Status: Pending'}}</p>
                  <?php
                        $kalimat_kecil = strtolower($artikel->judul);
                        $kalimat_new = ucwords($kalimat_kecil);
                        $arr = explode(" ", $kalimat_new);
                      ?>
                    <h4 style="font-size: 15px;">{!! implode(" ",array_splice($arr,0,4))."..." !!}</h4>
                    <hr style="margin-top: -10px;">
                    <?php
                        $kalimat_kecil = strtolower($artikel->isi);
                        $kalimat_new = ucwords($kalimat_kecil);
                        $is = explode(" ", $kalimat_new);

                        $read = "<a href='".url('berbagiinfo-me')."/$artikel->name/$artikel->deskripsi'><u style='color:#1f5daa'>Baca Selengkapnya!</u></a>"
                    ?>
                    <p style="font-size: 12px; margin-top: -10px;">{!! implode(" ",array_splice($is,0,15))."... ".$read!!} </p>
                    <hr style="margin-top: -10px;">
                
              <!--<div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    
                </div>
              </div>-->
            </div>
        </div>
        </div>
    </div>

@endforeach
@foreach ($list_artikel as $artikel)

    <div class="row nyumput" style="margin-bottom: 0; background:#fff;">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin_bottom_30_all box-1" >
          <?php $char = array(" ");
		          $judul = str_replace($char,"-", $artikel->judul); ?>
          
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <div class="product_img"> <img class="img-responsive" src="{{asset('gambarUpload/artikel/'.$artikel->gambar)}}" alt=""> </div>
                  <p class="status" style="{{($artikel->status == 1)? 'background:#00d604;':'background:#d90000;'}} left:12.5px;"> {{($artikel->status == 1)? 'Status: ACC':'Status: Pending'}}</p>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <?php
                        $kalimat_kecil = strtolower($artikel->judul);
                        $kalimat_new = ucwords($kalimat_kecil);
                        $arr = explode(" ", $kalimat_new);
                      ?>
                    <h4 style="top:0; margin : 0;">{!! implode(" ",array_splice($arr,0,4))."..." !!}</h4>
                    <p style="margin-top: 10px;">{{($artikel->name)}} <span class="fa fa-check" style="color:#1f5daa;"></span></p>
                    <hr style="margin-top: -10px;">
                    <?php
                        $kalimat_kecil = strtolower($artikel->isi);
                        $kalimat_new = ucwords($kalimat_kecil);
                        $is = explode(" ", $kalimat_new);

                        $read = "<a href='".url('berbagiinfo-me')."/$artikel->name/$artikel->deskripsi'><u style='color:#1f5daa'>Baca Selengkapnya!</u></a>"
                    ?>
                    <p style="font-size: 14px; margin-top: -10px; ">{!! implode(" ",array_splice($is,0,20))."... ".$read!!} </p>
                    
                </div>
            </div>
          
        </div>
    </div>
    
@endforeach

<div class="center" style=" z-index:0;background:#fff;">
            {{ $list_artikel->links() }}
        </div>
</div>

</div>



<div class="section" style="padding:10px 0 10px 0; background:#fff; ">
    <div class="container">
<div class="row">
 <div class="center">
     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin_bottom_30_all box-1" style="margin-bottom:50px;">
        <div class="full">
      <div class="row box-hyu" style="margin-bottom: -20px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all box-1" >
          <div style="background:#1f5daa; left:12.5px; color: #fff;padding:10px; width:fit-content;display: flex;align-items: center; border-top-left-radius:10px; border-bottom-right-radius:10px; margin-bottom : 15px;">
                Kategori Berbagi Info
          </div>
          <div class="row" style="width :100%; color : grey">
                @foreach ($kategoriall as $kategori)
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 " style="margin-top:10px; font-size:12px;">
            <?php $nama_kate = strtoupper($kategori->name); ?>
            <a href="{{url('berbagiinfo-kategori')}}/{{$kategori->name}}">{{$nama_kate}}</a>
          </div>
            @endforeach
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection



