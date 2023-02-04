<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #dddddd;">

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
        <div class="col-md-6">

        <form method="post" action="{{url('zakat')}}" class="coba center">
            <fieldset>
                @csrf
                <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                    <div class="row" style="margin-bottom:-20px;">
                      <div class="col-md-12">
                        <div class="form-field">
                        <h4 class="center">Niat Mengeluarkan Zakat</h4>
                        <h4 class="center">نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ مَالِى فَرْضًا لِلَّهِ تَعَالَى</h4>
                        
                          <div class="form-field" style="text-align:center; margin-bottom:-20px;">
                            <p class="center" style="font-size:12px;">Nawaitu an Ukhrija Zakaata Maali Fardhon Lillaahi Ta’aala</p>
                            <p class="center" style="font-size:12px;">Artinya: "Saya berniat sengaja mengeluarkan zakat fardhu karena Allah Ta'ala"</p>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="step step-1 active">
                    <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                        <div class="row">
                            <div class="form-field">
                            @foreach ($zakat as $z)
                            <input type="hidden" name="kode_unik" class="form-control" id="rupiah" aria-describedby="kode_unik" onkeyup="convertToRupiah(this);" value="{{($z->kode_unik)}}" >
                            @endforeach
                          
                                    
                            <div class="col-md-12">
                              <div class="form-field">
                                <label for="nominal">Jumlah Zakat</label>
                                <input type="text" name="jumlah" class="form-control" style="background:#dddddd;" id="rupiah" onkeyup="convertToRupiah(this);" aria-describedby="jumlah" value="  <?php
                                $nama     = $_GET ['jumlah'];
                                echo ''.$nama;
                                ?>" required>
                              
                                @if ($errors->has('jumlah'))
                                <small class="form-text text-danger" >{{ $errors->first('jumlah')}}</small>
                                  @endif
                              </div>
                            </div>
                            <input type="hidden" name="jenis" style="background:#dddddd;" class="form-control" id="jenis"  value="  <?php
                              $nama     = $_GET ['zaprov'];
                              echo(''.$nama);
                              ?>" required>
                            
                              @if ($errors->has('jumlah'))
                              <small class="form-text text-danger" >{{ $errors->first('jumlah')}}</small>
                                @endif
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
                <div class="step step-2">
                    <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                    <div class="prev-btn1"><a href="#"><i class="fa fa-arrow-left"></i> Kembali</a></div>
                    
                    <hr>
                        <div class="row">
                            <div class="form-field">
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <div class="form-field">
                                        <h4 style="font-family: Arial, Helvetica, sans-serif; color: #4A4A4A;">Metode Pembayaran</h4>
                                        <div>
                                        <div class="nominal-info mt-2">Rekomendasi </div>
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_zkt(this)" data-bank-name="{{($bank_rek[0]->nama)}} : {{($bank_rek[0]->norek)}}" data-url-name="{{($bank_rek[0]->url)}}" data-qris-name="{{($bank_rek[0]->QR)}}" style="cursor: pointer;">
                                                <img src="{{asset('gambarUpload/'.$bank_rek[0]->logo)}}" alt="logo" class="img-responsive" width="80" /><a  style="display: inline; margin-left: 10px; color: black; font-size: 14px;">{{($bank_rek[0]->nama)}}</a>
                                                <hr class="hr-hyu">
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="nominal-info mt-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">Pembayaran Lainnya</div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                              <hr data-content="Pembayaran QRIS" class="hr-text" style="margin: 40px; font-size: 15px">
                                            @foreach ($bank_instan as $banks)
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_zkt(this)" data-bank-name="{{($banks->nama)}} : {{($banks->norek)}}" data-url-name="{{($banks->url)}}" data-qris-name="{{($banks->QR)}}"  style="cursor: pointer;">
                                                <img src="{{asset('gambarUpload/'.$banks->logo)}}" alt="logo" class="img-responsive" width="80" /><a  style="display: inline; margin-left: 10px; color: black; font-size: 14px;">{{($banks->nama)}}</a>
                                                <hr class="hr-hyu">
                                            </div>
                
                                            @endforeach
                                          <!-- </div>
                                        </div> -->
                                        <!-- <div class="accordion"> -->
                                            <hr data-content="Transfer bank" class="hr-text" style="margin: 40px; font-size: 15px">
                                            @foreach ($bank_tf as $banktf)
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_zkt(this)" data-bank-name="{{($banktf->nama)}} : {{($banktf->norek)}}" data-url-name="{{($banktf->url)}}"  style="cursor: pointer;">
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
                                            id="jenis"  value="  <?php $nama = $_GET ['zaprov']; echo(''.$nama);?>" required
                                            >
                                            <!-- <input type="hidden" name="jenis" style="background:#dddddd;"
                                            class="form-control" id="jenis" placeholder="BRI"
                                            > -->
                                            <!-- <input type="hidden" name="qris" style="background:#dddddd;"
                                            class="form-control" id="qris" placeholder="BRI"
                                            > -->
                                            
                                   
                                    </div>
                                </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <!--<div class="form-field">-->
                                    <!--    <button type="button" class="btn button main_bt next-btn col-md-12 "-->
                                    <!--        style="border-radius:5px; float: right">Lanjut-->
                                    <!--        Pembayaran</button>-->
                                        <!-- {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt
                                        col-md-12"
                                        style="border-radius:5px;">Lanjut Pembayaran</a> --}} -->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="step step-3">
                <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                <div  class ="prev-btn2"><a href="#"><i class="fa fa-arrow-left"></i> Kembali</a></div>
                    <hr>
                   
                    <div class="row">
                        
                             @if(Auth::check())
                             <div class="form-field">
                        <div class="col-md-12">
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

                                <div class="col-md-12">
                                    <input type="number" name="nomorhp" style="background:#dddddd;" class="form-control"
                                        id="nomorhp" aria-describedby="nomorhp" value="0" hidden>
                                </div>
                                </div>
                                <div class="col-md-12">
                                <div class="form-field">
                                <div class="submit">
                                <button type="button" id="btnTest" class="button btn main_bt col-md-12 center-block "
                                            style="border-radius:5px;">Bayar</button>
                                            </div>
                                    <!-- {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt
                                    col-md-12"
                                    style="border-radius:5px;">Lanjut Pembayaran</a> --}} -->
                                </div>
                            </div>
                                @else
                        <div class="col-md-12">

              <div class="form-field">
                <label>Nama <span class="red"></span></label>
              <input type="text" name="nama" class="form-control" style="background:#dddddd;" id="nama" aria-describedby="nama" placeholder="Masukan Nama Anda" value="{{old('nama')}}" required>
                @if ($errors->has('nama'))
              <small class="form-text text-danger" >{{ $errors->first('nama')}}</small>
                @endif
              </div>
              </div>
			     <div class="col-md-12">
                <div class="form-field">
                  <label>Email <span class="red"></span></label>
                  <input type="text" name="email" class="form-control" style="background:#dddddd;" id="email" aria-describedby="email" placeholder="Masukan E-mail yang valid"  value="{{old('email')}}" required>
                  @if ($errors->has('email'))
                  <small class="form-text text-danger" >{{ $errors->first('email')}}</small>
                    @endif
                </div>
              </div>
			      <div class="col-md-12">
                <div class="form-field">
                  <label>Nomor Kontak <span class="red"></span></label>
                  <input type="text" name="nomorhp" class="form-control" style="background:#dddddd;" id="nomorhp" aria-describedby="nomorhp" value="{{old('nomorhp')}}" placeholder="Masukan Nomor Hp yang valid" required>
                  @if ($errors->has('nomorhp'))
                  <small class="form-text text-danger" >{{ $errors->first('nomorhp')}}</small>
                    @endif
                </div>
              </div>
              
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-field">
                                <div class="submit">
                                <button type="button" id="btnTest" class="button btn main_bt col-md-12 center-block "
                                            style="border-radius:5px;">Lanjut
                                            Pembayaran</button>
                                            </div>
                                    <!-- {{-- <a href="{{url('/menudonasi/bayar')}}" type="submit" class="btn main_bt
                                    col-md-12"
                                    style="border-radius:5px;">Lanjut Pembayaran</a> --}} -->
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>    
    </div>
  </div>
  </div>
</div>
</div>



@include('layouts.js')

</body>
</html>
