<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<style>
    hr.dashed {
    border-top: 2px dashed #999;
}

hr.dotted {
    border-top: 2px dotted #999;
}

hr.solid {
    border-top: 2px solid #999;
}


hr.hr-text {
  position: relative;
    border: none;
    height: 1px;
    background: #999;
}

hr.hr-text::before {
    content: attr(data-content);
    display: inline-block;
    background: #fff;
    font-weight: bold;
    font-size: 16px;
    color: #999;
    border-radius: 30rem;
    padding: 0.2rem 2rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>


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
        <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-P6WRb1LRF7jFQvum">
        </script>
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
  <!--      <form method="post" action="{{url('bayar')}}" class=" center">-->
  <!--      <fieldset>-->
  <!--          @csrf-->
  <!--      <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">-->
  <!--          <div class="row" style="margin-bottom:-20px;">-->
  <!--              <div class="col-md-4 col-sm-4 col-xm-4">   -->
  <!--              <div class="form-field" style="float:left"> -->
  <!--                <div class="img-don"><img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""></div>-->
  <!--              </div>-->
  <!--              </div>-->
  <!--              <div class="col-md-8 col-sm-8 col-xm-8"> -->
  <!--              <div class="form-field">-->
		<!--		<div class="detail-don">-->
  <!--                <label>Anda akan berbagi untuk :</label>-->
  <!--                <br />-->
  <!--                <label>{{($post->title)}}</label>-->
  <!--              <input type="hidden" name="namakonten" class="form-control" id="namakonten"  aria-describedby="namakonten" value="{{($post->title)}}" >-->
  <!--              </div>-->
  <!--              </div>-->
  <!--              </div> -->
		<!--	</div>-->
		<!--</div>-->
		<!--	<div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--              <input type="hidden" name="id_konten" class="form-control" id="id_konten" aria-describedby="id_konten" value="{{($post->id_konten)}}" >-->
  <!--            </div> -->
  <!--            </div>-->
              
  <!--             @if(Auth::check())-->
  <!--            <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--              <input name="id_users" type="hidden" class="form-control" value="{{Auth::user()->id}}" >-->
  <!--            </div> -->
  <!--            </div>-->
  <!--            @else-->
  <!--            <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--              <input name="id_users" type="hidden" class="form-control" value="0" >-->
  <!--            </div> -->
  <!--            </div>-->
  <!--            @endif-->
              
		<!--<div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--              <input type="hidden" name="status" class="form-control" id="status" aria-describedby="status" value="0" >-->
  <!--            </div> -->
  <!--            </div>-->
  <!--      <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">-->
  <!--          <div class="row">-->
  <!--            <div class="form-field">       -->
		<!--	  <div class="col-md-12">-->
		<!--		<div class="form-field">-->
		<!--		<p>Nominal Donasi</p>-->
		<!--			<form action="#">-->
		<!--				<fieldset>-->
		<!--	<div class="tags center" style="font-size:14px;">-->
  <!--            <ul>-->
  <!--              <li ><a onclick="reply_click(this)" data-product-name="Rp.50.000">Rp. <?php echo number_format(50000,0,",",".");?></a></li>-->
  <!--              <li ><a onclick="reply_click(this)" data-product-name="Rp.100.000">Rp. <?php echo number_format(100000,0,",",".");?></a></li>-->
  <!--              <li ><a onclick="reply_click(this)" data-product-name="Rp.200.000">Rp. <?php echo number_format(200000,0,",",".");?></a></li>-->
  <!--              <li ><a onclick="reply_click(this)" data-product-name="Rp.500.000">Rp. <?php echo number_format(500000,0,",",".");?></a></li>		-->
  <!--            </ul>-->
  <!--          </div>-->
		<!--				</fieldset>-->
		<!--			</form>-->
		<!--		</div>-->
		<!--	  </div>-->
		<!--	  <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--                <label>Masukan Donasi <span class="red"></span></label>-->
  <!--                <input type="text" name="jumlah" style="background:#dddddd;" class="form-control" id="rupiah" placeholder="Contoh : Rp.50.000" onkeyup="convertToRupiah(this);" aria-describedby="jumlah" value="{{old('jumlah')}}" required>-->
  <!--               @if ($errors->has('jumlah'))-->
  <!--                <small class="form-text text-danger" >{{ $errors->first('jumlah')}}</small>-->
  <!--                  @endif-->
  <!--              </div>-->
  <!--            </div>-->
  <!--            <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--                <label>Pembayaran</label>-->
  <!--                  <select required id="bank" style="background:#dddddd;" class="from-conrol" name="bank" value="{{old('bank')}}">-->
  <!--                  <option selected="selected" value="" >- Saat Ini Hanya Tersedia Transfer Bank -</option>-->
  <!--                 @foreach ($bank as $c)-->
  <!--                  <option value="{{$c->nama}} : {{$c->norek}}">{{$c->nama}}</option>-->
  <!--                        @endforeach-->
  <!--                </select> -->
  <!--                 @if ($errors->has('bank'))-->
  <!--              <small class="form-text text-danger" >{{ $errors->first('bank')}}</small>-->
  <!--                @endif-->
  <!--            </div> -->
  <!--            </div>-->
  <!--            <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--                <label>Ingin Transfer via Bank</label>-->
  <!--                  <select required id="bank" style="background:#dddddd;" class="from-conrol" name="url" value="{{old('bank')}}">-->
  <!--                  <option selected="selected" value="" >- Silahkan Pilih -</option>-->
  <!--                 @foreach ($bak as $c)-->
  <!--                  <option value="{{$c->url}}">{{$c->nama}}</option>-->
  <!--                        @endforeach-->
  <!--                </select> -->
  <!--                 @if ($errors->has('bank'))-->
  <!--              <small class="form-text text-danger" >{{ $errors->first('bank')}}</small>-->
  <!--                @endif-->
  <!--            </div> -->
  <!--            </div>-->
  <!--            </div>-->
		<!--	</div>-->
		<!--</div>-->
  <!--      <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">-->
  <!--          <div class="row">-->
  <!--            <div class="form-field">-->
  <!--            <div class="col-md-12">-->
  <!--                 @if(Auth::check())-->
  <!--              <input type="text" name="nama" style="background:#dddddd;" class="form-control" id="nama" aria-describedby="nama" value="{{Auth::user()->name}}" hidden>-->
  <!--            </div>-->
			  <!--<div class="col-md-12">-->
     <!--           <div class="form-field">-->
     <!--             <input name="tc" style="background:#dddddd;" type="checkbox"> Tampilkan sebagai anonim-->
     <!--           </div>-->
     <!--         </div>-->
		<!--	  <div class="col-md-12">-->
                
  <!--                <input type="text" name="email" style="background:#dddddd;" class="form-control" id="email" aria-describedby="email" value="{{Auth::user()->email}}" hidden>-->
  <!--            </div>-->
			  
  <!--              <div class="col-md-12">-->
  <!--                <input type="number" name="nomorhp" style="background:#dddddd;" class="form-control" id="nomorhp" aria-describedby="nomorhp" value="0" hidden>-->
  <!--              </div>-->
           
  <!--             @else-->
		<!--	  <div class="col-md-12">-->
  <!--             <div class="form-field">-->
  <!--              <label>Nama <span class="red"></span></label>-->
  <!--              <input type="text" name="nama" style="background:#dddddd;" class="form-control" id="nama" aria-describedby="nama" value="{{old('nama')}}" required>-->
  <!--               @if ($errors->has('nama'))-->
  <!--            <small class="form-text text-danger" >{{ $errors->first('nama')}}</small>-->
  <!--              @endif-->
  <!--            </div>-->
  <!--            </div>-->
			  <!--<div class="col-md-12">-->
     <!--           <div class="form-field">-->
     <!--             <input name="tc" style="background:#dddddd;" type="checkbox"> Tampilkan sebagai anonim-->
     <!--           </div>-->
     <!--         </div>-->
		<!--	  <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--                <label>Email <span class="red"></span></label>-->
  <!--                <input type="text" name="email" style="background:#dddddd;" class="form-control" id="email" aria-describedby="email" value="{{old('email')}}" required>-->
  <!--                @if ($errors->has('email'))-->
  <!--                <small class="form-text text-danger" >{{ $errors->first('email')}}</small>-->
  <!--                  @endif-->
  <!--              </div>-->
  <!--            </div>-->
		<!--	  <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--                <label>Nomor Kontak <span class="red"></span></label>-->
  <!--                <input type="text" name="nomorhp" style="background:#dddddd;" class="form-control" id="nomorhp" aria-describedby="nomorhp" value="{{old('nomorhp')}}" required>-->
  <!--                  @if ($errors->has('nomorhp'))-->
  <!--                <small class="form-text text-danger" >{{ $errors->first('nomorhp')}}</small>-->
  <!--                  @endif-->
  <!--              </div>-->
  <!--            </div>-->
  <!--            @endif-->
  <!--            <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--                <label>Dukungan atau Do'a </label>-->
  <!--                <textarea  name="komentar" style="background:#dddddd;" class="form-control" id="komentar" aria-describedby="komentar" placeholder="untuk : {{$post->title}}"></textarea>-->
  <!--                 @if ($errors->has('komentar'))-->
  <!--              <small class="form-text text-danger" >{{ $errors->first('komentar')}}</small>-->
  <!--                @endif-->
  <!--              </div>-->
  <!--            </div>-->
  <!--            <div class="col-md-12">-->
  <!--              <div class="form-field">-->
  <!--                <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Lanjut Pembayaran</button>-->
  <!--                {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Lanjut Pembayaran</a> --}}-->
  <!--            </div>-->
  <!--          </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--      </fieldset>-->
		<!--</form>-->
		
		<form method="post" action="{{url('bayar')}}" class="coba center">
            <fieldset>
                @csrf
                <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                    <div class="row" style="margin-bottom:-20px;">
                        <div class="col-md-4 col-sm-4 col-xm-4">
                            <div class="form-field" style="float:left">
                                <div class="img-don"><img class="img-responsive"
                                        src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""></div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xm-8">
                            <div class="form-field">
                                <div class="detail-don">
                                    <label>Anda akan berbagi untuk :</label>
                                    <br />
                                    <label>{{($post->title)}}</label>
                                    <input type="hidden" name="namakonten" class="form-control" id="namakonten"
                                        aria-describedby="namakonten" value="{{($post->title)}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-field">
                        <input type="hidden" name="id_camutama" class="form-control" id="id_camutama"
                            aria-describedby="id_camutama" value="{{($post->id_camutama)}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-field">
                        <input type="hidden" name="id_konten" class="form-control" id="id_konten"
                            aria-describedby="id_konten" value="{{($post->id_konten)}}">
                    </div>
                </div>

                @if(Auth::check())
                <div class="col-md-12">
                    <div class="form-field">
                        <input name="id_users" type="hidden" class="form-control" value="{{Auth::user()->id}}">
                    </div>
                </div>
                @else
                <div class="col-md-12">
                    <div class="form-field">
                        <input name="id_users" type="hidden" class="form-control" value="0">
                    </div>
                </div>
                @endif

                <div class="col-md-12">
                    <div class="form-field">
                        <input type="hidden" name="status" class="form-control" id="status" aria-describedby="status"
                            value="0">
                    </div>
                </div>
                <div class="step step-1 active">
                    <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                        <div class="row">
                            <div class="form-field">
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Nominal Donasi</label>
                                        <form action="#">
                                            <fieldset>
                                                <div class="btn-list-price button" onclick="reply_click(this)"  data-product-name="Rp.10.000" style="font-size:14px;">
                                                    <ul>
                                                      <li>
                                                        <a ><b>Rp. <?php echo number_format(10000,0,",",".");?></b></a><i style="color: #D4D4D4; float: right;" class="fa fa-chevron-right"></i>
                                                        <div class="nominal-info mt-2">Nominal minimal donasi</div>
                                                      </li>
                                                    </ul>
                                                </div>
                                                <div class="btn-list-price button mt-2" onclick="reply_click(this)"  data-product-name="Rp.20.000" style="font-size:14px;">
                                                    <ul>
                                                      <li>
                                                        <a ><b>Rp. <?php echo number_format(20000,0,",",".");?></b></a><i style="color: #D4D4D4; float: right;" class="fa fa-chevron-right"></i>
                                                      </li>
                                                    </ul>
                                                </div>
                                                <div class="btn-list-price button mt-2" onclick="reply_click(this)"  data-product-name="Rp.50.000" style="font-size:14px;">
                                                    <ul>
                                                      <li>
                                                        <a ><b>Rp. <?php echo number_format(50000,0,",",".");?></b></a><i style="color: #D4D4D4; float: right;" class="fa fa-chevron-right"></i>
                                                      </li>
                                                    </ul>
                                                </div>
                                                <div class="btn-list-price button mt-2" onclick="reply_click(this)"  data-product-name="Rp.100.000" style="font-size:14px;">
                                                    <ul>
                                                      <li>
                                                        <a ><b>Rp. <?php echo number_format(100000,0,",",".");?></b></a><i style="color: #D4D4D4; float: right;" class="fa fa-chevron-right"></i>
                                                      </li>
                                                    </ul>
                                                </div>
                                                <div class="btn-list-price button mt-2" onclick="reply_click(this)"  data-product-name="Rp.200.000" style="font-size:14px;">
                                                    <ul>
                                                      <li>
                                                        <a ><b>Rp. <?php echo number_format(200000,0,",",".");?></b></a><i style="color: #D4D4D4; float: right;" class="fa fa-chevron-right"></i>
                                                      </li>
                                                    </ul>
                                                </div>
                                                <!--<div class="tags center" style="font-size:14px;">-->
                                                <!--    <ul>-->
                                                        
                                                <!--        <li><a onclick="reply_click(this)" class="button"-->
                                                <!--                data-product-name="Rp.20.000">Rp.-->
                                                <!--                <?php echo number_format(20000,0,",",".");?></a></li>-->
                                                <!--        <li><a onclick="reply_click(this)" class="button"-->
                                                <!--                data-product-name="Rp.50.000">Rp.-->
                                                <!--                <?php echo number_format(50000,0,",",".");?></a></li>-->
                                                <!--        <li><a onclick="reply_click(this)" class="button"-->
                                                <!--                data-product-name="Rp.100.000">Rp.-->
                                                <!--                <?php echo number_format(100000,0,",",".");?></a></li>-->
                                                <!--        <li><a onclick="reply_click(this)" class="button"-->
                                                <!--                data-product-name="Rp.200.000">Rp.-->
                                                <!--                <?php echo number_format(200000,0,",",".");?></a></li>-->
                                                <!--    </ul>-->
                                                <!--</div>-->
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Masukan Donasi <span class="invalid"></span></label>
                                        <input type="text" name="jumlah" style="background:#dddddd;"
                                            class="form-control" id="nomrupiah" placeholder="Contoh : Rp.50.000"
                                            onkeyup="convertToRupiah(this);" aria-describedby="jumlah"
                                            value="{{old('jumlah')}}" required>
                                        <!-- @if ($errors->has('jumlah'))
                                        <small class="form-text text-danger">{{ $errors->first('jumlah')}}</small>
                                        @endif -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <button type="button" class="button btn main_bt col-md-12 next-btn"
                                            style="border-radius:5px;">Lanjut
                                            Pembayaran</button>
                                        <!-- {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt
                                        col-md-12"
                                        style="border-radius:5px;">Lanjut Pembayaran</a> --}} -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="step step-3">
                    <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                    <div class="prev-btn1"><a href="#"><i class="fa fa-arrow-left"></i> Kembali</a></div>
                    
                    <hr>
                        <div class="row">
                            <div class="form-field">
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <h4 style="font-family: Arial, Helvetica, sans-serif; color: #4A4A4A;">Metode Pembayaran</h4>
                                        <div>
                                        <div class="nominal-info mt-2">Rekomendasi </div>
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_tf(this)" data-bank-name="{{($bank[0]->nama)}} : {{($bank[0]->norek)}}" data-url-name="{{($bank[0]->url)}}" data-jenis-name="{{($bank[0]->jenis)}}" data-qris-name="{{($bank[0]->QR)}}" data-bankid-name="{{($bank[0]->bankid)}}">
                                                <img src="{{asset('gambarUpload/'.$bank[0]->logo)}}" alt="logo" class="img-responsive" width="80" /><a  style="display: inline; margin-left: 10px; color: black; font-size: 14px;">{{($bank[0]->nama)}}</a>
                                                <hr class="hr-hyu">
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="nominal-info mt-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">Pembayaran Lainnya</div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                              <hr data-content="Pembayaran QRIS" class="hr-text" style="margin: 40px; font-size: 15px">
                                            @foreach ($bank_instan as $banks)
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_tf(this)" data-bank-name="{{($banks->nama)}} : {{($banks->norek)}}" data-url-name="{{($banks->url)}}" data-bankid-name="{{($banks->bankid)}}" data-jenis-name="{{($banks->jenis)}}" data-qris-name="{{($banks->QR)}}" data-bankid-name="{{($banks->bankid)}}">
                                                <img src="{{asset('gambarUpload/'.$banks->logo)}}" alt="logo" class="img-responsive" width="80" /><a  style="display: inline; margin-left: 10px; color: black; font-size: 14px;">{{($banks->nama)}}</a>
                                                <hr class="hr-hyu">
                                            </div>
                
                                            @endforeach -->
                                          <!-- </div>
                                        </div> -->
                                        <!-- <div class="accordion"> -->
                                            <!-- <hr data-content="Transfer bank" class="hr-text" style="margin: 40px; font-size: 15px">
                                            @foreach ($bank_tf as $banktf)
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_tf(this)" data-bank-name="{{($banktf->nama)}} : {{($banktf->norek)}}" data-url-name="{{($banktf->url)}}" data-bankid-name="{{($banktf->bankid)}}" data-jenis-name="{{($banktf->jenis)}}" data-bankid-name="{{($banktf->bankid)}}">
                                                <img src="{{asset('gambarUpload/'.$banktf->logo)}}" alt="logo" class="img-responsive" width="80" /><a  style="display: inline; margin-left: 10px; color: black; font-size: 14px;">{{($banktf->nama)}}</a>
                                                <hr class="hr-hyu">
                                            </div>
                                            @endforeach
                                          </div>
                                            <input type="hidden" name="bank" style="background:#dddddd;"
                                            class="form-control" id="bank" placeholder="BRI"
                                            >
                                            <input type="hidden" name="url" style="background:#dddddd;"
                                            class="form-control" id="url" placeholder="BRI"
                                            >
                                            <input type="hidden" name="jenis" style="background:#dddddd;"
                                            class="form-control" id="jenis" placeholder="BRI"
                                            >
                                            <input type="hidden" name="qris" style="background:#dddddd;"
                                            class="form-control" id="qris" placeholder="BRI"
                                            >
                                            <input type="hidden" name="bankid" style="background:#dddddd;"
                                            class="form-control" id="bankid" placeholder="BRI"
                                            > -->
                                            
                                        <!--<label>Metode Pembayaran</label>
                                        <select style="background:#dddddd;" class="from-conrol"
                                            name="bank" value="{{old('bank')}}" required>
                                            <option selected="selected" value="">- silahkan pilih
                                                -
                                            </option>
                                            @foreach ($bank as $c)
                                            <option value="{{$c->nama}} : {{$c->norek}}">{{$c->nama}}</option>
                                            @endforeach
                                        </select>-->
                                        <!-- @if ($errors->has('bank'))
                                        <small class="form-text text-danger">{{ $errors->first('bank')}}</small>
                                        @endif -->
                                    <!-- </div>
                                </div>
                                <div class="col-md-12"> -->
                                    <!--<div class="form-field">
                                        <label>Ingin Transfer via Bank</label>
                                        <select id="bank1" style="background:#dddddd;" class="from-conrol"
                                            name="url" value="{{old('bank1')}}" onchange="pilih()" required>
                                            <option selected="selected" value="">- Silahkan Pilih -</option>
                                            @foreach ($bak as $c)
                                            <option value="{{$c->url}}">{{$c->nama}}</option>
                                            @endforeach
                                        </select>-->
                                        <!-- @if ($errors->has('bank1'))
                                        <small class="form-text text-danger">{{ $errors->first('bank1')}}</small>
                                        @endif -->
                                    <!-- </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <button type="button" class="btn button main_bt next-btn col-md-12 "
                                            style="border-radius:5px; float: right" onclick="reply_click_tf(this)" data-bank-name="{{($bank[0]->nama)}} : {{($bank[0]->norek)}}" data-url-name="{{($bank[0]->url)}}" data-jenis-name="{{($bank[0]->jenis)}}" data-qris-name="{{($bank[0]->QR)}}" data-bankid-name="{{($bank[0]->bankid)}}">Lanjut
                                            Pembayaran</button>
                                        {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt
                                        col-md-12"
                                        style="border-radius:5px;">Lanjut Pembayaran</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="step step-2">
                <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                <div  class ="prev-btn2"><a href=""><i class="fa fa-arrow-left"></i> Kembali</a></div>
                    <hr>
                    <div class="row">
                        <div class="form-field">
                                <div class="col-md-12">
                                    @if(Auth::check())
                                    <input type="text" name="nama" style="background:#dddddd;" class="form-control"
                                        id="nama" aria-describedby="nama" value="{{Auth::user()->name}}" hidden>
                                </div>
                                <!--<div class="col-md-12">-->
                                <!--           <div class="form-field">-->
                                <!--             <input name="tc" style="background:#dddddd;" type="checkbox"> Tampilkan sebagai anonim-->
                                <!--           </div>-->
                                <!--         </div>-->
                                <div class="col-md-12">

                                    <input type="text" name="email" style="background:#dddddd;" class="form-control"
                                        id="email" aria-describedby="email" value="{{Auth::user()->email}}" hidden>
                                </div>

                                <!-- <div class="col-md-12">
                                    <input type="number" name="nomorhp" style="background:#dddddd;" class="form-control"
                                        id="nomorhp" aria-describedby="nomorhp" value="0" hidden>
                                </div> -->
                                @else
                                    <div class="col-md-12">
                                        <div class="form-field">
                                            <label>Jumlah Donasi <span class="invalid"></span></label>
                                            <input type="text" id="rupiah" name="jumlah" style="background:#dddddd;"
                                            onkeyup="convertToRupiah(this);" aria-describedby="jumlah"
                                                value="{{old('jumlah')}}" required>
                                            <!-- @if ($errors->has('jumlah'))
                                            <small class="form-text text-danger">{{ $errors->first('jumlah')}}</small>
                                            @endif -->
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Nama <span class="red"></span></label>
                                        <input type="text" name="nama" style="background:#dddddd;" class="form-control"
                                            id="namaaa" aria-describedby="nama" value="{{old('nama')}}" placeholder="Masukan Nama Anda"required>
                                        <!-- @if ($errors->has('nama'))
                                        <small class="form-text text-danger">{{ $errors->first('nama')}}</small>
                                        @endif -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <input name="anonim" style="background:#dddddd;" type="checkbox" value="1"> Tampilkan sebagai
                                        anonim
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-field">
                                            <label>Email / Nomor HP<span class="red"></label>
                                            <input type="text" name="username" style="background:#dddddd;" class="form-control"
                                                id="nomel" aria-describedby="email_hp" value="" placeholder="Masukan E-Mail Atau Nomor HP yang Valid" required>
                                            <!-- @if ($errors->has('email'))
                                            <small class="form-text text-danger">{{ $errors->first('email')}}</small>
                                            @endif -->
                                        </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Nomor Kontak <span class="red"></span></label>
                                        <input type="text" name="nomorhp" style="background:#dddddd;"
                                            class="form-control" id="nomorhp" aria-describedby="nomorhp"
                                            value="{{old('nomorhp')}}" placeholder="Masukan Nomor Hp yang Valid" required> -->
                                        <!-- @if ($errors->has('nomorhp'))
                                        <small class="form-text text-danger">{{ $errors->first('nomorhp')}}</small>
                                        @endif -->
                                    <!-- </div>
                                </div> -->
                                @endif
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Dukungan atau Do'a </label>
                                        <textarea name="komentar" style="background:#dddddd;" class="form-control"
                                            id="komentar" aria-describedby="komentar"
                                            placeholder="untuk : {{$post->title}}"></textarea>
                                        <!-- @if ($errors->has('komentar'))
                                        <small class="form-text text-danger">{{ $errors->first('komentar')}}</small>
                                        @endif -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field">
                                <div class="submit">
                                <button type="button" id="pay-button" class="button btn main_bt col-md-12 center-block "
                                                style="border-radius:5px;">Lanjut Pembayaran</button>
                                <!-- <button type="button" id="btnTest" class="button btn main_bt col-md-12 center-block "
                                            style="border-radius:5px;">Lanjut
                                            Pembayaran</button> -->
                                            </div>
                                    <!-- {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt
                                    col-md-12"
                                    style="border-radius:5px;">Lanjut Pembayaran</a> --}} -->
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
