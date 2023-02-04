<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
<!-- loader -->
<!--<div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div>-->

@include('layouts.header')

<div class="section checkout_section" style="padding:50px 0 50px 0;">
  <div class="container">
    <div class="row">
    <h2 style="margin-left:25px;">Edit Campaign</h2>	
      <form method="post" action="{{ url('/editgalangdana/'.$post->id_konten) }}" class=" center" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <fieldset>
      <div class="center col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="a_list">

        <div class="checkout-form" style="margin-bottom:10px; border:none;">
            <div class="row">

              <div class="col-md-12">
                <div class="form-field">
                  <label>Judul Campaign</label>
                  <input type="text" name="title" style="" class="" id="judul" placeholder="Judul Campaign" value="{{$post->title}}" maxlength="100" required>               
                  <p style="font-size:11px; margin-bottom:-10px;">Maksimal 100 karakter</p>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Target Dana</label>
                  <input type="text" name="id_category" style="" value="{{$post->id_category}}" class="" id="id_category" onfocus="convertToRupiah(this);" onkeyup="convertToRupiah(this);" placeholder="Rp.0" required>
                      <!--<input name="cek" style="background:#dddddd;" id="cek" type="checkbox" value="Open Goals">Open Goals-->
                <!--  <select id="id_category" class="from-conrol" name="id_category">-->
                <!--    <option selected="selected" value="{{$post->id_category}}" >Pilih Target Dana</option>-->
                <!--    @foreach ($category as $c)-->
                <!--<option value="{{$c->name}}">{{$c->name}}</option>-->
                <!--    @endforeach-->
                <!--</select>-->
                </div>
              </div>
             
                <div class="form-field">
                  <input type="hidden" name="terkumpul" style="" class="" id="" placeholder="Rp. 0"  onkeyup="convertToRupiah(this);" disabled value="0">               
                </div>
             
              <div class="col-md-3">
                <div class="form-field">
                  <label>Deadline Penggalangan Dana</label>
                  <input type="date" name="end_date" style="" value="{{$post->end_date}}" class="" id="nam" placeholder="" required>               
                </div>
              </div>
              <div class="col-md-3">
              <div class="form-field">
                    <label for="id">Kategori</label>
                    
                   <select id="id" class="from-control" name="id">
                        <option selected="selected" value="" >pilih Kategori</option>
                        @foreach ($category as $c)
                    <option value="{{$c->id}}" <?php if ($c->id == $post->id) echo ' selected="selected"'; ?>>{{$c->name}}</option>
                        @endforeach
                    </select>
                  @error('id_category')
                <div class="form-text text-danger">{{$message}}</div>
                  @enderror
                    
                </div>
                </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Alamat penyaluran</label>
                  <input type="text" name="alamat" style=""  value="{{$post->alamat}}" class="" id="" placeholder="Alamat Penyaluran" required>               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Tentukan link untuk campaign</label>
                  <div class="input-group">
                    <div class="input-group-prepend" style="width:100%;">
                      <span class="input-group-text nyumput">berbagibahagia.org/program/</span>
                      <input type="text"  value="{{$post->deskripsi}}" name="deskripsi" style="" class="" id="nospace" placeholder="contoh : bantupaknana" required>               
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Foto Cover</label>
                  <br />
                  <img id="output" src="{{asset('gambarUpload/'.$post->gambar)}}" style="height:80px; margin: 5px 0 10px 0;">
                  <input type="file" name="gambar" value="{{$post->gambar}}" style="" class="" id="limit1mb" accept="image/*" onchange="loadFile(event)">               
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-field">
                  <label>Deskripsi / Cerita Lengkap</label>
		               <textarea id="summernotes" name="artikel" placeholder="Masukkan Artikel Lengkap" class="note-editor">{{$post->artikel}}
	              	</textarea>
                </div>
              </div>
              <button type="submit" class="btn main_bt col-md-12" style="border-radius:5px;">Simpan Campaign</button>

            </div>
        </div>
      
      </div>
      </div>  
        </fieldset>
	  </form>

    </div>
  </div>
</div>

@include('layouts.modal')

@include('layouts.footer_plus')

@include('layouts.js')
</body>
</html>