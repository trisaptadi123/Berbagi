<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" >

<!-- header -->
<header id="default_header" class="header_style_1">
  <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          {{-- <div class="logo"> <a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo"/></a> </div> --}}
          <!-- logo end -->
        </div>
        
      </div>
    </div>
    
</header>

<div class="section padding_layout_1 checkout_section">
  <div class="container">

    <div class="row" style="margin-top: -120px;">
      <div class="center">
        <div class="col-md-6">
          <div class="checkout-form">
            <form action="#" style="font-family:arial;">
              <fieldset>
              <div class="row">
                
          <div class="col-md-12">
          <div class="form-field">
            <div  class="center">  
              <div class="logo2"> <a href="{{url('/')}}"><img src="{{asset('kuy/images/loaders/BB.png')}}" alt="logo"/></a> </div>
              </div>
          <h4 class="center">Niat Mengeluarkan Zakat</h4>
          <h4 class="center">نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ مَالِى فَرْضًا لِلَّهِ تَعَالَى</h4>
          
          <div class="form-field" style="text-align:center; margin-bottom:-20px;">
          <p class="center" style="font-size:12px;">Nawaitu an Ukhrija Zakaata Maali Fardhon Lillaahi Ta’aala</p>
          <p class="center" style="font-size:12px;">Artinya: "Saya berniat sengaja mengeluarkan zakat fardhu karena Allah Ta'ala"</p>
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
    
  <div class="row" style="margin-top:5px;">
    <div class="center">
      <div class="col-md-6">
        <div class="checkout-form">
          <form method="post" action="{{url('zakat')}}" class=" center">
            {{ csrf_field() }}
            <fieldset>
            <div class="row">

                 @foreach ($zakat as $z)
              <input type="hidden" name="kode_unik" class="form-control" id="rupiah" aria-describedby="kode_unik" onkeyup="convertToRupiah(this);" value="{{($z->kode_unik)}}" >
              @endforeach
            
                      <div class="form-field">       
                <div class="col-md-12">
                <div class="form-field">
                  <label for="nominal">Jumlah Zakat</label>
                  <input type="text" name="jumlah" class="form-control" id="rupiah" onkeyup="convertToRupiah(this);" aria-describedby="jumlah" value="  <?php
                  $nama     = $_POST ['jumlah'];
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
              <div class="form-field">
                <label>Nama <span class="red"></span></label>
              <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" value="{{old('nama')}}" required>
                @if ($errors->has('nama'))
              <small class="form-text text-danger" >{{ $errors->first('nama')}}</small>
                @endif
              </div>
			     <div class="col-md-12">
                <div class="form-field">
                  <label>Email <span class="red"></span></label>
                  <input type="text" name="email" class="form-control" id="email" aria-describedby="email"  value="{{old('email')}}" required>
                  @if ($errors->has('email'))
                  <small class="form-text text-danger" >{{ $errors->first('email')}}</small>
                    @endif
                </div>
              </div>
			      <div class="col-md-12">
                <div class="form-field">
                  <label>Nomor Kontak <span class="red"></span></label>
                  <input type="text" name="nomorhp" class="form-control" id="nomorhp" aria-describedby="nomorhp" value="{{old('nomorhp')}}"  required>
                  @if ($errors->has('nomorhp'))
                  <small class="form-text text-danger" >{{ $errors->first('nomorhp')}}</small>
                    @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <button type="submit" class="btn btn-primary" id="tombol">Lanjut</button>
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
