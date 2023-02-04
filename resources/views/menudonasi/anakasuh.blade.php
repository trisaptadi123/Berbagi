<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<style>
.bb {
    display: inline-block;
    width: 80px;
    height: 35px;
    background: #1f5daa;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: #ffffff;
    /* margin-top: 25px; */
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
                    <div class="center">
                        <!-- logo start -->
                        <div class="logo2"> <a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}"
                                    alt="logo" /></a> </div>
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
          <div class="product_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar_anak)}}" alt="">
                </div>
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
        <form method="post" action="{{url('bayaranakasuh')}}" name="qurban" class="coba center">
            <fieldset> 
                @csrf
                <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
                    <div class="row" style="margin-bottom:-20px;">
                        <div class="col-md-4 col-sm-4 col-xm-4">
                            <div class="form-field" style="float:left">
                                <div class="img-don"><img class="img-responsive"
                                        src="{{asset('gambarUpload/'.$post->gambar_anak)}}" alt=""></div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xm-8">
                            <div class="form-field">
                                <div class="detail-don">
                                    <label>Anda akan berbagi untuk :</label>
                                    <br />
                                    <label>{{($post->nama)}}</label>
                                    <input type="hidden" name="nama_anak" class="form-control" id="nama"
                                        aria-describedby="nama" value="{{($post->nama)}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-field">
                        <input type="hidden" name="id" class="form-control" id="id"
                            aria-describedby="id" value="{{($post->id)}}">
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
                                    <label>Bulan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width:100%;">
                                            <a class="input-group-btn bb "  onclick="buttonmin()"><i class="fa fa-minus" style="color:white;"></i></a>
                                            <input type="text" name="jumlah"  style="background:#dddddd; height:35px;" class="form-control"
                                            id="jumlah" aria-describedby="jumlah"  value="0" readOnly  required>
                                            <a class="input-group-btn bb" onclick="buttonplus()" ><i class="fa fa-plus" style="color:white;"></i></a>               
                                        </div>
                                    </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Total <span class="invalid"></span></label>
                                        @if($post->jp == 'SD' && $post->kriteria == 'Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="250000">
                                        @elseif($post->jp == 'SD' && $post->kriteria == 'Non Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="150000">
                                        @elseif($post->jp == 'SMP' && $post->kriteria == 'Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="350000">
                                        @elseif($post->jp == 'SMP' && $post->kriteria == 'Non Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="250000">
                                        @elseif($post->jp == 'SMA' && $post->kriteria == 'Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="500000">
                                        @elseif($post->jp == 'SMA' && $post->kriteria == 'Non Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="300000">
                                        @elseif($post->jp == 'Mahasiswa' && $post->kriteria == 'Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="750000">
                                        @elseif($post->jp == 'Mahasiswa' && $post->kriteria == 'Non Tahfidz')
                                        <input type="hidden" name="harga1" class="harga1" value="500000">
                                        @endif
                                        <input type="text" name="harga" style="background:#dddddd;"
                                            class="form-control total"   placeholder="Rp. 0"
                                            onkeyup="convertToRupiah(this);" aria-describedby="total"
                                            readOnly required>
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
                <div class="step step-2">
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
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_asuh(this)" data-bank-name="{{($bank_rek[0]->nama)}} : {{($bank_rek[0]->norek)}}" data-url-name="{{($bank_rek[0]->url)}}" style="cursor: pointer;">
                                                <img src="{{asset('gambarUpload/'.$bank_rek[0]->logo)}}" alt="logo" class="img-responsive" width="80" /><a  style="display: inline; margin-left: 10px; color: black; font-size: 14px;">{{($bank_rek[0]->nama)}}</a>
                                                <hr class="hr-hyu">
                                            </div>
                                        </div>
                                        <div class="accordion">
                                            <div class="nominal-info mt-2" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">Pembayaran Lainnya</div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                              <hr data-content="Pembayaran QRIS" class="hr-text" style="margin: 40px; font-size: 15px">
                                            @foreach ($bank_instan as $banks)
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_asuh(this)" data-bank-name="{{($banks->nama)}} : {{($banks->norek)}}" data-url-name="{{($banks->url)}}"  style="cursor: pointer;">
                                                <img src="{{asset('gambarUpload/'.$banks->logo)}}" alt="logo" class="img-responsive" width="80" /><a  style="display: inline; margin-left: 10px; color: black; font-size: 14px;">{{($banks->nama)}}</a>
                                                <hr class="hr-hyu">
                                            </div>
                
                                            @endforeach
                                          <!-- </div>
                                        </div> -->
                                        <!-- <div class="accordion"> -->
                                            <hr data-content="Transfer bank" class="hr-text" style="margin: 40px; font-size: 15px">
                                            @foreach ($bank_tf as $banktf)
                                            <div class="button" style="margin: 30px 15px 15px 10px;" onclick="reply_click_asuh(this)" data-bank-name="{{($banktf->nama)}} : {{($banktf->norek)}}" data-url-name="{{($banktf->url)}}"  style="cursor: pointer;">
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

                                <div class="col-md-12">
                                    <input type="number" name="nohp" style="background:#dddddd;" class="form-control"
                                        id="nohp" aria-describedby="nohp" value="0" hidden>
                                </div>

                                @else
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Nama <span class="red"></span></label>
                                        <input type="text" name="nama" style="background:#dddddd;" class="form-control"
                                            id="namaaa" aria-describedby="nama" value="{{old('nama')}}" required>
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
                                        <label>Email <span class="red"></span></label>
                                        <input type="text" name="email" style="background:#dddddd;" class="form-control"
                                            id="email" aria-describedby="email" value="{{old('email')}}" required>
                                        <!-- @if ($errors->has('email'))
                                        <small class="form-text text-danger">{{ $errors->first('email')}}</small>
                                        @endif -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Nomor Kontak <span class="red"></span></label>
                                        <input type="text" name="nohp" style="background:#dddddd;"
                                            class="form-control" id="nohp" aria-describedby="nohp"
                                            value="{{old('nohp')}}" required>
                                        <!-- @if ($errors->has('nomorhp'))
                                        <small class="form-text text-danger">{{ $errors->first('nomorhp')}}</small>
                                        @endif -->
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-field">
                                        <label>Dukungan atau Do'a </label>
                                        <textarea name="komentar" style="background:#dddddd;" class="form-control"
                                            id="komentar" aria-describedby="komentar"
                                            placeholder="untuk : {{$post->nama}}"></textarea>
                                        <!-- @if ($errors->has('komentar'))
                                        <small class="form-text text-danger">{{ $errors->first('komentar')}}</small>
                                        @endif -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-field">
                                <div class="submit">
                                <button type="button" class="button btn main_bt col-md-12 center-block "
                                            style="border-radius:5px;">Lanjut
                                            Pembayaran</button>
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
