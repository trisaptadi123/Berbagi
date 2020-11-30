<!DOCTYPE html>
<html lang="en">
 
@include('layouts.css')
 
<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page">

@include('layouts.header')

<div class="section product_detail">
  <div class="container">
	<div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_left" style="margin-bottom:-20px;">
            <h2>ZAKAT</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 margin_bottom_20_all">
		<div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="full">
              <div class="tab_bar_section">
                <ul class="nav nav-tabs" role="tablist">
                  <li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profesi">Profesi</a> </li>
                  <li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dagang">Perdagangan</a> </li>
                  <li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#simpanan">Simpanan</a> </li>
                  <li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#emas">Emas</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="profesi" class="tab-pane active">
                    <div class="product_desc">
					<div class="col-md-12">
						{{-- zakat penghasilan --}}
						<form action="{{url('zakat-profesi')}}" name="profesi" method="GET">
							{{ csrf_field() }}
						<fieldset>
						  <div class="row">
			 <div class="col-md-12">
				<div class="form-field">
				<p>Silahkan masukan jumlah zakat anda, atau hitung dengan <b><a href="#col-prof" class="" data-toggle="collapse" style="color:#039ee3;">Klik Disini</a></b></p>
				<div id="col-prof" class="collapse">
                <div class="row">
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Pendapatan Perbulan (wajib di isi)</label>
								<input name="pendapatan" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungProfesi()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-6" conten>
							<div class="form-field" style="padding-top:20px;">
								<label>Bonus, THR Lainnya (jika ada)</label>
								<input contenteditable="true" name="bonus" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungProfesi()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-12"><hr /></div>
								</div>
								</div>
								</div>
							</div>
											
							<div class="col-md-8">
							<div class="form-field">
								
								<label>Jumlah zakat profesi yang anda bayar</label>
								<input name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()" required>
							
							</div>
							</div>
								<div class="form-field">
									<input name="zaprov" type="hidden" value="zakat profesi" placeholder="zaprov" >
								</div>
							<div class="col-md-4">
							<div class="form-field" style="padding-top:15px;">
								<button type="submit" class="btn main_bt  col-md-12"  id="kirim">Bayar Zakat</button>
								
							</div>
							</div>
						  </div>
						</fieldset>
						{{ csrf_field() }}
						</form>
					</div>
                    </div>
                  </div>
				  
				  {{-- zakat dagang --}}
                  <div id="dagang" class="tab-pane fade">
                    <div class="product_desc">
                      <div class="col-md-12">
						<form action="{{url('zakat-perdagangan')}}" name="dagang" method="GET">
							@csrf
										<fieldset>
										<div class="row">
							<div class="col-md-12">
								<div class="form-field">
								<p>Silahkan masukan jumlah zakat anda, atau hitung dengan <b><a href="#col-dagang" class="" data-toggle="collapse" style="color:#039ee3;">Klik Disini</a></b></p>
								<div id="col-dagang" class="collapse">
								<div class="row">
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Modal (1 Tahun)</label>
								<input name="modal" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungDagang()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Keuntungan (1 Tahun)</label>
								<input name="keuntungan" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungDagang()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Hutang / Kerugian (1 Tahun)</label>
								<input name="kerugian" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungDagang()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Hutang Jatuh Tempo</label>
								<input name="hjt" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungDagang()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Piutang Dagang</label>
								<input name="piutang" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungDagang()" onblur="stopCalc()" hidden>
							</div>
							</div>
							<div class="col-md-12"><hr /></div>
								</div>
								</div>
								</div>
							</div>
							
							<div class="col-md-8">
							<div class="form-field">
								<label>Jumlah zakat perdagangan yang anda bayar</label>
								<input required name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()">
							</div>
							</div>
							<div class="form-field">
								<input name="zaprov" type="hidden" value="zakat dagang" placeholder="zaprov" >
							</div>
							<div class="col-md-4">
							<div class="form-field" style="padding-top:15px;">
								<button type="submit"  class="btn main_bt  col-md-12"  >Bayar Zakat</button>
							</div>
							</div>
						  </div>
							</fieldset>
						</form>
					</div>
                    </div>
                  </div>
				  {{-- zakat simpanan --}}
                  <div id="simpanan" class="tab-pane fade">
                    <div class="product_desc">
					<div class="col-md-12">
						<form action="{{url('zakat-simpanan')}}" name="simpanan" method="GET">
							@csrf
						<fieldset>
						  <div class="row">
			 <div class="col-md-12">
				<div class="form-field">
				<p>Silahkan masukan jumlah zakat anda, atau hitung dengan <b><a href="#col-simpanan" class="" data-toggle="collapse" style="color:#039ee3;">Klik Disini</a></b></p>
				<div id="col-simpanan" class="collapse">
                <div class="row">
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Saldo Tabungan (wajib di isi)</label>
								<input name="saldo" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungSimpanan()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Bagi Hasil (jika ada)</label>
								<input name="bagi" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onfocus="HitungSimpanan()" onblur="stopCalc()">
							</div>
							</div>
							<div class="col-md-12"><hr /></div>
								</div>
								</div>
								</div>
							</div>
											
							<div class="col-md-8">
							<div class="form-field">
								<label>Jumlah zakat simpanan yang anda bayar</label>
								<input required name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()">
							</div>
							</div>
							<div class="form-field">
								<input name="zaprov" type="hidden" value="zakat simpanan" placeholder="zaprov" >
							</div>
							<div class="col-md-4">
							<div class="form-field" style="padding-top:15px;">
								<button type="submit"  class="btn main_bt  col-md-12"  >Bayar Zakat</button>
							</div>
							</div>
						  </div>
						</fieldset>
						</form>
					</div>
                    </div>
                  </div>
				  
				  <div id="emas" class="tab-pane fade">
                    <div class="product_desc">
					<div class="col-md-12">
						<form action="{{url('zakat-emas')}}" name="emas" method="GET">
							@csrf
						<fieldset>
						  <div class="row">
			 <div class="col-md-12">
				<div class="form-field">
				<p>Silahkan masukan jumlah zakat anda, atau hitung dengan <b><a href="#col-emas" class="" data-toggle="collapse" style="color:#039ee3;">Klik Disini</a></b></p>
				<div id="col-emas" class="collapse">
                <div class="row">
							<div class="col-md-6">
							<div class="form-field" style="padding-top:20px;">
								<label>Jumlah Emas per gram</label>
								<input name="Jemas" type="text" placeholder="0 gr" onfocus="HitungEmas()" onblur="stopCalc()">
								<p style="font-family:arial;">Harga Emas saat ini: Rp 975.000</p>
							</div>
							</div>
							<div class="col-md-12"><hr /></div>
				</div>
				</div>
				</div>
			  </div>
							
							<div class="col-md-8">
							<div class="form-field">
								<label>Jumlah zakat Emas yang anda bayar</label>
								<input required name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()">
							</div>
							</div>
							<div class="form-field">
								<input name="zaprov" type="hidden" value="zakat emas" placeholder="zaprov" >
							</div>
							<div class="col-md-4">
							<div class="form-field" style="padding-top:15px;">
								<button type="submit"  class="btn main_bt  col-md-12"  >Bayar Zakat</button>
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
      </div>
    </div>
  </div>
  
	
	
 </div> 
</div>

@include('layouts.modal')


@include('layouts.js')

</body>
</html>
