<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
<!-- loader -->
<!-- <div class="bg_load"> <img class="loader_animation" src="{{asset('gass/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div> -->

@include('layouts.header')

<div class="section checkout_section" style="padding:30px 0 50px 0;">
  <div class="container">
    <div class="row">
    <table class="col-md-12">
    <tr align="center"><td><h2>Galang Dana Sebagai Fundraiser</h2></td></tr>
    <tr align="center"><td><p style="margin-bottom:-1px;">Anda akan menjadi Fundraiser dari campaign &nbsp;<b>@if($data['deskripsi'] == $post){{$data['title']}}@else{{$qurban['judul']}}@endif</b></p></td></tr>
    <tr align="center"><td><p>Semua donasi yang anda kumpulkan akan disalurkan ke &nbsp;<b>Berbagi Bahagia</b></p></td></tr>
    </table>
      <div class="center col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="a_list">
	
      <form method="post" action="{{url('fundra')}}" class=" center" enctype="multipart/form-data">
          @csrf
        <fieldset>
        <div class="checkout-form" style="margin-bottom:10px; border:none;">
            <div class="row">
            @if($data['deskripsi'] == $post)
              <div class="col-md-12">
                <div class="form-field">
                  <label>Judul Campaign</label>
                  <input type="text" name="title" style="" class="" id="judul" placeholder="Judul Campaign" maxlength="50" required>               
                  <p style="font-size:11px; margin-bottom:-10px;">Maksimal 50 karakter</p>
                </div>
              </div>
                <div class="col-md-12">
                <input type="hidden" name="kutama" style="" class="" id="judul" maxlength="50" value="{{($data->title)}}">               
              </div>
              <div class="col-md-12">
                <input type="hidden" name="id_users" style="" class="" id="judul" maxlength="50" value="{{Auth::user()->id}}">               
              
              </div>
              <div class="col-md-12">
                <input type="hidden" name="nama" style="" class="" id="judul" maxlength="50" value="{{Auth::user()->name}}">               
          
              </div>
              <div class="col-md-12">
                <input type="hidden" name="id_konten" style="" class="" id="judul" maxlength="50" value="{{($data->id_konten)}}">               
                <input type="hidden" name="id_qurban" style="" class="" id="judul" maxlength="50">   
              </div>
              <div class="col-md-12">
                <input type="hidden" name="terkumpul" style="" class="" id="judul" maxlength="50" value="0" readonly>               
                <p style="font-size:11px; margin-bottom:-10px;"></p>
              </div>
              <div class="col-md-12">
                <input type="hidden" name="gambar_fdn" value="{{$data->gambar}}" style="" class="" id="">               
              </div>
              <div class="col-md-12">
                <input type="hidden" name="end_date" style="" class="" id="judul" maxlength="50" value="{{($data->end_date)}}">               
                <p style="font-size:11px; margin-bottom:-10px;"></p>
              </div>
              <div class="col-md-12">
                <input type="hidden" name="artikel" style="" class="" id="judul" maxlength="50" value="{{($data->artikel)}}">               
              </div>
               <div class="col-md-12">
                <div class="form-field">
                  <label>Target Dana</label>
                  <input type="text" name="target" style="" class="" id="target" onkeyup="convertToRupiah(this);" placeholder="Rp.0" required>
                <!--  <select id="id_category" class="from-conrol" name="target">-->
                <!--    <option selected="selected" value="" >Pilih Target Dana</option>-->
                <!--    @foreach ($category as $c)-->
                <!--<option value="{{$c->name}}">{{$c->name}}</option>-->
                <!--    @endforeach-->
                <!--</select>-->
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Tentukan link untuk campaign</label>
                  <div class="input-group">
                    <div class="input-group-prepend" style="width:100%;">
                      <span class="input-group-text nyumput">berbagibahagia.org/programfundraiser/</span>
                      <input type="text" name="deskripsi" style="" class="" id="nospace" placeholder="contoh : bantupaknana" required>               
                    </div>
                  </div>
                </div>
              </div>

              @else
               
              <div class="col-md-12">
                <div class="form-field">
                  <label>Judul Campaign</label>
                  <input type="text" name="title" style="" class="" id="judul" placeholder="Judul Campaign" maxlength="50" required>               
                  <p style="font-size:11px; margin-bottom:-10px;">Maksimal 50 karakter</p>
                </div>
              </div>
                <div class="col-md-12">
                <input type="hidden" name="kutama" style="" class="" id="judul" maxlength="50" value="{{($qurban->judul)}}">
                <input type="hidden" name="id_konten" style="" class="" id="judul" maxlength="50" >               
              </div>
              <div class="col-md-12">
                <input type="hidden" name="id_users" style="" class="" id="judul" maxlength="50" value="{{Auth::user()->id}}">               
              
              </div>
              <div class="col-md-12">
                <input type="hidden" name="nama" style="" class="" id="judul" maxlength="50" value="{{Auth::user()->name}}">               
          
              </div>
              <div class="col-md-12">
                <input type="hidden" name="id_qurban" style="" class="" id="judul" maxlength="50" value="{{($qurban->id_qurban)}}">               
            
              </div>
              <div class="col-md-12">
                <input type="hidden" name="hrgqurban" style="" class="" id="judul" maxlength="50" value="{{$qurban->harga}}" readonly>               
                <p style="font-size:11px; margin-bottom:-10px;"></p>
              </div>
              <div class="col-md-12">
                <input type="hidden" name="gambar_fdn" value="{{$qurban->gambar}}" style="" class="" id="">               
              </div>
            
              <div class="col-md-12">
                <input type="hidden" name="artikel" style="" class="" id="judul" maxlength="50" value="{{($qurban->deskripsi)}}">               
              </div>
               
              <div class="col-md-12">
                <div class="form-field">
                  <label>Tentukan link untuk campaign</label>
                  <div class="input-group">
                    <div class="input-group-prepend" style="width:100%;">
                      <span class="input-group-text nyumput">berbagibahagia.org/programfundraiser/</span>
                      <input type="text" name="deskripsi" style="" class="" id="nospace" placeholder="contoh : bantupaknana" required>               
                    </div>
                  </div>
                </div>
              </div>

              @endif



               <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Jadi Fundraiser</button>

            </div>
        </div>
        </fieldset>
		  </form>
      
      </div>
      </div>

    </div>
  </div>
</div>

@include('layouts.modal')

@include('layouts.footer_plus')

@include('layouts.js')
</body>
</html>