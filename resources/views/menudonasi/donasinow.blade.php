<!DOCTYPE html>
<html lang="en">
@include('layouts.css')


<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #dddddd;">
<script>
 fbq('track', 'Add Payment Info');
</script>

<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/BB.png')}}" style="max-height:50px;" alt="#" /> </div>-->

<!-- header -->
<header id="default_header" class="header_style_1">
  <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div  class="center">    
          <!-- logo start -->
          <div class="logo2"> <a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo"/></a> </div>
          <!-- logo end -->
        </div>
        </div>
        
      </div>
    </div>
</header>

<div class="section padding_layout_1 checkout_section">
  <div class="container">
    
	<div class="row" style="margin-top: -120px;">
	    <div class="center">
    {{-- <div class="col-md-4">
        <div class="checkout-form">
		<div class="product_list">
          <div class="product_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""> </div>
          <div class="product_detail_btm">
            <div class="center" style="height:75px;">
           
			</div>
		
          </div>
        </div>
		</div>
	</div> --}}
      <div class="col-md-6">
    <!--    @if ($errors->any())-->
    <!--    <div class="alert alert-danger">-->
    <!--        <strong>Wow !</strong> Data masih kosong<br><br>-->
    <!--        <ul>-->
    <!--            @foreach ($errors->all() as $error)-->
    <!--                <li>{{ $error }}</li>-->
    <!--            @endforeach-->
    <!--        </ul>-->
    <!--    </div>-->
    <!--@endif-->
        <form method="post" action="{{url('bayar')}}" class=" center">
        <fieldset>
            @csrf
        <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
            <div class="row" style="margin-bottom:-20px;">
                <div class="col-md-4 col-sm-4 col-xm-4">   
                <div class="form-field" style="float:left"> 
                  <div class="img-don"><img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""></div>
                </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xm-8"> 
                <div class="form-field">
				<div class="detail-don">
                  <label>Anda akan berbagi untuk :</label>
                  <br />
                  <label>{{($post->title)}}</label>
                <input type="hidden" name="namakonten" class="form-control" id="namakonten"  aria-describedby="namakonten" value="{{($post->title)}}" >
                </div>
                </div>
                </div> 
			</div>
		</div>
			<div class="col-md-12">
                <div class="form-field">
                <input type="hidden" name="id_konten" class="form-control" id="id_konten" aria-describedby="id_konten" value="{{($post->id_konten)}}" >
              </div> 
              </div>
		<div class="col-md-12">
                <div class="form-field">
                <input type="hidden" name="status" class="form-control" id="status" aria-describedby="status" value="0" >
              </div> 
              </div>
        <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
            <div class="row">
              <div class="form-field">       
			  <div class="col-md-12">
				<div class="form-field">
				<p>Nominal Donasi</p>
					<form action="#">
						<fieldset>
			<div class="tags center" style="font-size:14px;">
              <ul>
                <li ><a onclick="reply_click(this)" data-product-name="50000">Rp. <?php echo number_format(50000,0,",",".");?></a></li>
                <li ><a onclick="reply_click(this)" data-product-name="100000">Rp. <?php echo number_format(100000,0,",",".");?></a></li>
                <li ><a onclick="reply_click(this)" data-product-name="200000">Rp. <?php echo number_format(200000,0,",",".");?></a></li>
                <li ><a onclick="reply_click(this)" data-product-name="500000">Rp. <?php echo number_format(500000,0,",",".");?></a></li>	
              </ul>
            </div>
						</fieldset>
					</form>
				</div>
			  </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <label>Masukan Donasi <span class="red"></span></label>
                  <input type="text" name="jumlah" style="background:#dddddd;" class="form-control" id="rupiah" placeholder="Rp.50.000" onkeyup="convertToRupiah(this);" aria-describedby="jumlah" value="{{old('jumlah')}}" required>
                 @if ($errors->has('jumlah'))
                  <small class="form-text text-danger" >{{ $errors->first('jumlah')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Metode Pembayaran</label>
                    <select required id="bank" style="background:#dddddd;" class="from-conrol" name="bank" value="{{old('bank')}}">
                    <option selected="selected" value="" >- Pilih Metode Pembayaran -</option>
                   @foreach ($bank as $c)
                    <option value="{{$c->nama}} : {{$c->norek}}">{{$c->nama}}</option>
                          @endforeach
                  </select> 
                   @if ($errors->has('bank'))
                <small class="form-text text-danger" >{{ $errors->first('bank')}}</small>
                  @endif
              </div> 
              </div>
              </div>
			</div>
		</div>
        <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
            <div class="row">
              <div class="form-field">
              <div class="col-md-12">
              <div class="form-field">
                <label>Nama <span class="red"></span></label>
                <input type="text" name="nama" style="background:#dddddd;" class="form-control" id="nama" aria-describedby="nama" value="{{old('nama')}}" required>
                 @if ($errors->has('nama'))
              <small class="form-text text-danger" >{{ $errors->first('nama')}}</small>
                @endif
              </div>
              </div>
			  <!--<div class="col-md-12">-->
     <!--           <div class="form-field">-->
     <!--             <input name="tc" style="background:#dddddd;" type="checkbox"> Tampilkan sebagai anonim-->
     <!--           </div>-->
     <!--         </div>-->
			  <div class="col-md-12">
                <div class="form-field">
                  <label>Email <span class="red"></span></label>
                  <input type="text" name="email" style="background:#dddddd;" class="form-control" id="email" aria-describedby="email" value="{{old('email')}}" required>
                  @if ($errors->has('email'))
                  <small class="form-text text-danger" >{{ $errors->first('email')}}</small>
                    @endif
                </div>
              </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <label>Nomor Kontak <span class="red"></span></label>
                  <input type="text" name="nomorhp" style="background:#dddddd;" class="form-control" id="nomorhp" aria-describedby="nomorhp" value="{{old('nomorhp')}}" required>
                    @if ($errors->has('nomorhp'))
                  <small class="form-text text-danger" >{{ $errors->first('nomorhp')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Dukungan atau Do'a </label>
                  <textarea  name="komentar" style="background:#dddddd;" class="form-control" id="komentar" aria-describedby="komentar" placeholder="untuk : {{$post->title}}"></textarea>
                   @if ($errors->has('komentar'))
                <small class="form-text text-danger" >{{ $errors->first('komentar')}}</small>
                  @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Lanjut Pembayaran</button>
                  {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Lanjut Pembayaran</a> --}}
              </div>
            </div>
        </div>
      </div>
    </div>
        </fieldset>
		</form>
    </div>
  </div>
</div>
</div>


@include('layouts.js')



</body>
</html>
