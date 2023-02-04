<!DOCTYPE html>
<html lang="en">
@include('layouts.css')
<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background:#fff;">
@include('layouts.header')
@include('artikel.berbagi.css_summernote')

<div class="section checkout_section" style="padding:50px 0 50px 0;">
  <div class="container">
  
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
  <h2 >Buat Info</h2>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
    <div class="a_list">
      
      @if(Session::has('gagal'))
      <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12" style="margin-left:auto; margin-right:auto;">
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-warning"></i> Peringatan</h4>
        {{Session::get('gagal')}}
      </div>
      </div>
      @endif
      <form method="post" action="{{url('artikel-user')}}" class=" center" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
        <div class="checkout-form" style="margin-bottom:10px; border:none;">
            <div class="row">
              
              <div class="col-md-12">
                <div class="form-field">
                  <label>Judul Artikel</label>
                  <input type="text" name="judul" placeholder="Judul Artikel" required>               
                  
                </div>
              </div>

              <!-- <div class="col-md-12">
                <div class="form-field">
                  <label>Meta Description</label>
                  <input type="text" name="description" placeholder="Masukan description artikel" required>                 
                </div>
              </div> -->
              
              <div class="col-md-12">
                <div class="form-field">
                  <label>Kategori</label>
                  <select id="id" class="from-control" name="id">
                        <option selected="selected" value="" >pilih Kategori</option>
                    @foreach ($list_category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                 </select>      
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-field">
                  <label>Gambar</label>
                  <input type="file" name="gambar" placeholder="" required> 
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-field">
                  <label>Isi Artikel</label>
		              <textarea id="summernotes" name="isi" class="note-editors"></textarea>
                </div>
              </div>
              <button type="submit" class="btn main_bt " style="border-radius:5px; margin:auto;">Upload Info</button>

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

@include('layouts.footer_plus')
@include('artikel.berbagi.js_summernote')
   
</body>
</html>