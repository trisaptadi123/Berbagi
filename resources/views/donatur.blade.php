<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="{{asset('public/kuy/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div>

<!-- header -->
<header id="default_header" class="header_style_1">
  <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="{{url('/')}}"><img src="{{asset('public/kuy/images/loaders/bb.png')}}" alt="logo"/></a> </div>
          <!-- logo end -->
        </div>
        
      </div>
    </div>
</header>

<div class="section padding_layout_1 checkout_section">
  <div class="container">
    
	<div class="row" style="margin-top: -120px;">
    <div class="col-md-4">
        <div class="checkout-form">
		<div class="product_list">
          <div class="product_img"> <img class="img-responsive" src="" alt=""> </div>
          <div class="product_detail_btm">
            <div class="center" style="height:75px;">
           
			</div>
		
          </div>
        </div>
		</div>
	</div>
      <div class="col-md-8">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Wow !</strong> Data masih kosong<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="checkout-form">
          <form method="post" action="{{ url('bayar') }}" class=" center">
            @csrf
            <fieldset>
            <div class="row">
              
			  <div class="col-md-12">
				<div class="form-field">
				<p>Silahkan pilih nominal dengan <b><a href="#nominal" class="" data-toggle="collapse" style="color:#039ee3;">Klik Disini</a></b> atau isi nominal dibawah</p>
				<div id="nominal" class="collapse">
				<div class="coupen-form">
					<form action="#">
						<fieldset>
			<div class="tags" style="font-size:14px;">
              <ul>
                <li><a onclick="reply_click(this)" data-product-name="Rp. 50.000,-">Rp. 50.000,-</a></li>
                <li><a onclick="reply_click(this)" data-product-name="Rp. 100.000,-">Rp. 100.000,-</a></li>
                <li><a onclick="reply_click(this)" data-product-name="Rp. 200.000,-">Rp. 200.000,-</a></li> 	
                <li><a onclick="reply_click(this)" data-product-name="Rp. 500.000,-">Rp. 500.000,-</a></li> 	
              </ul>
            </div>
						</fieldset>
					</form>
				</div>
				</div>
				</div>
			  </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <label>Nominal Donasi <span class="red"></span></label>
                  <input type="text" name="jumlah" class="form-control" id="product_name" aria-describedby="jumlah" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Metode Pembayaran</label>
                    <select id="id_category" class="from-conrol" name="id_category">
                    <option selected="selected" value="#" >- Pilih Metode Pembayaran -</option>
                      @foreach ($bank_list as $bank)
                  <option value="{{$bank->id}}">{{$bank->nama}}</option>
                      @endforeach
                  </select>
                  
              </div>
               
              </div>
              <div class="form-field">
                <label>Nama <span class="red"></span></label>
                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" >
              </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <input name="tc" type="checkbox"> anonim
                </div>
              </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <label>Email <span class="red"></span></label>
                  <input type="text" name="email" class="form-control" id="email" aria-describedby="email" >
                </div>
              </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <label>Nomor Kontak <span class="red"></span></label>
                  <input type="text" name="nomorhp" class="form-control" id="nomorhp" aria-describedby="nomorhp" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Dukungan atau Do'a <span class="red">(Opsional)</span></label>
                  <textarea  name="komentar" class="form-control" id="komentar" aria-describedby="komentar" ></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <button type="submit" class="btn btn-primary">Lanjut</button>
                  {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Lanjut Pembayaran</a> --}}
              </div>
            </div>
            </fieldset>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>


@include('layouts.js')

</body>
</html>
