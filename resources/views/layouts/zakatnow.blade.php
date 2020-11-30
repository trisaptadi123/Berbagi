<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #dddddd;" >

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
            <form action="{{url('zakat-yuk')}}" method="post"  class=" center" style="font-family:arial;">
              <fieldset>
          <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
              <div class="row">
                
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
        
            {{ csrf_field() }}
            <div class="checkout-form" style="margin-bottom:10px; border-radius:10px;">
            <div class="row" style="margin-bottom:-20px;">

                 @foreach ($zakat as $z)
              <input type="hidden" name="kode_unik" class="form-control" id="rupiah" aria-describedby="kode_unik" onkeyup="convertToRupiah(this);" value="{{($z->kode_unik)}}" >
              @endforeach
            
        <div class="form-field">       
                <div class="col-md-12">
                <div class="form-field">
                  <label for="nominal">Jumlah Zakat yang anda bayar</label>
                  <input type="text" name="jumlah" style="background:#dddddd;" class="form-control" id="rupiah" onkeyup="convertToRupiah(this);" aria-describedby="jumlah" value="  <?php
                  $nama     = $_GET ['jumlah'];
                  echo ''.$nama;
                  ?>" required>
                
                  @if ($errors->has('jumlah'))
                  <small class="form-text text-danger" >{{ $errors->first('jumlah')}}</small>
                    @endif
                </div>
                <div class="form-field">
                  <input type="hidden" name="jenis" style="background:#dddddd;" class="form-control" id="jenis"  value="  <?php
                  $nama     = $_GET ['zaprov'];
                  echo ''.$nama;
                  ?>" required>
                
                  @if ($errors->has('jumlah'))
                  <small class="form-text text-danger" >{{ $errors->first('jumlah')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Metode Pembayaran</label>
                  <select required id="bank" style="background:#dddddd;" class="from-conrol" name="bank" value="{{old('bank')}}">
                    <option selected="selected" value="">- Pilih Metode Pembayaran -</option>
                    @foreach ($bank as $c)
                    <option value="{{$c->nama}} {{$c->norek}}">{{$c->nama}}</option>
                    @endforeach
                  </select> 
                  @if ($errors->has('bank'))
                  <small class="form-text text-danger" >{{ $errors->first('bank')}}</small>
                  @endif
                </div> 
              </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <input type="text" name="nama" style="background:#dddddd;" class="form-control" id="nama" aria-describedby="nama" placeholder="Nama Lengkap" value="{{old('nama')}}" required>
                  @if ($errors->has('nama'))
                  <small class="form-text text-danger" >{{ $errors->first('nama')}}</small>
                  @endif
                </div>
              </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <input type="text" name="email" style="background:#dddddd;" class="form-control" id="email" aria-describedby="email" placeholder="Email" value="{{old('email')}}" required>
                  @if ($errors->has('email'))
                  <small class="form-text text-danger" >{{ $errors->first('email')}}</small>
                    @endif
                </div>
              </div>
			  <div class="col-md-12">
                <div class="form-field">
                  <input type="text" name="nomorhp" style="background:#dddddd;" class="form-control" id="nomorhp" aria-describedby="nomorhp" placeholder="No HP" value="{{old('nomorhp')}}" required>
                  @if ($errors->has('nomorhp'))
                  <small class="form-text text-danger" >{{ $errors->first('nomorhp')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <button type="submit" class="btn main_bt col-md-12"  style="border-radius:5px;">Lanjut Pembayaran</button>
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
</div>
</div>


@include('layouts.js')

</body>
</html>
