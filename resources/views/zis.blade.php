<!DOCTYPE html>
<html lang="en">

@include('layouts.css')
<style>
.fixed-content {
     /* top: 0;
     bottom:0; */
     margin-left:800px;
     max-width:390px;

     position: fixed;
     top: 60px;
     right: 90px;

 }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #f2f2f2">

	@include('layouts.header')

	<div class="container" style="max-width: 540px; min-height: 100%;">
		<div class="section product_detail" style="background:#fff">
			<div class="row">
				<div class="col-md-12">
					<div class="full">
						<div class="main_heading text_align_left" style="margin-bottom:-20px; margin-left: 10px">
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
								<div class="col-sm-12">
								<select class="form-control selectpicker kkk" id="zakat" name="zakat">
									<option label="--Pilih Zakat--"></option>
									<option value="profesi" >Profesi</option>
									<option value="dagang" >Perdagangan</option>
									<option value="simpanan" >Simpanan</option>
									<option value="emas" >Emas</option>
								</select>

								<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
								<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
							</div>
									<!-- <ul class="nav nav-tabs nyumput" role="tablist" style="text-align: center; font-size: 10px; margin-left: 5px;">
										<li style="width:250px; padding:1px;" class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profesi">Profesi</a> </li>
										<li style="width:250px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dagang">Perdagangan</a> </li>
										<li style="width:250px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#simpanan">Simpanan</a> </li>
										<li style="width:250px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#emas">Emas</a> </li>
									</ul>

									<ul class="nav nav-tabs nyumput2" role="tablist" style="text-align: center; margin-left: 10px">
										<li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profesi">Profesi</a> </li>
										<li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#dagang">Perdagangan</a> </li>
										<li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#simpanan">Simpanan</a> </li>
										<li style="width:160px; padding:1px;" class="nav-item"> <a class="nav-link" data-toggle="tab" href="#emas">Emas</a> </li>
									</ul> -->
									<!-- Tab panes -->
									<div class="tab-content">
										<div id="profesi" style="display: none">
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

																<div class="col-md-12">
																	<div class="form-field">
																		<label>Jumlah zakat profesi yang anda bayar</label>
																		<input name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()" required>
																	</div>
																	<p class="mt-2">Kenapa harus bayar zakat profesi ? <b><a href="#" data-toggle="modal" data-target="#exampleModalCenter" style="color:#039ee3;">Klik Disini</a></b></p>

																	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
																		<div class="modal-dialog modal-dialog-centered" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																					<!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						<span aria-hidden="true">&times;</span>
																					</button>
																				</div>
																				<div class="modal-body">
																					<p style="text-align: justify; line-height: 150%;"><b>Zakat Penghasilan / Profesi</b></p>
																					<p style="text-align: justify; line-height: 150%;">Zakat Penghasilan adalah zakat yang
																						dikeluarkan dari penghasilan bila telah mencapai nishab, zakat ini dikeluarkan
																					setiap kita menerima penghasilan</p>
																					<p style="text-align: justify; line-height: 150%;">Salah satu landasannya ada pada Q.S
																					Al-Baqarah ayat 267 berikut:</p>
																					<p style="text-align: justify; line-height: 150%;">“Wahai orang-orang yang beriman!
																						Infakkanlah sebagian dari hasil usahamu yang baik-baik dan sebagian dari apa
																						yang Kami keluarkan dari bumi untukmu. Janganlah kamu memilih yang buruk untuk
																						kamu keluarkan, padahal kamu sendiri tidak mau mengambilnya melainkan dengan
																						memicingkan mata (enggan) terhadapnya. Dan ketahuilah bahwa Allah Mahakaya,
																					Maha Terpuji.”</p>
																					<p style="text-align: justify; line-height: 150%;">Nishab zakat penghasilan sebesar 5
																						wasaq/652,8 kg gabah atau setara 520 kg beras, dengan besaran zakat 2,5% dari
																					penghasilan.</p>
																					<p style="text-align: justify; line-height: 150%;">Adapun untuk perhitungan zakatnya,
																					ada dua cara:</p>
																					<p style="text-align: justify; line-height: 150%;">* Pertama, zakat dihitung dari
																						penghasilan keseluruhan, tanpa dikurangi kebutuhan pokok seperti sandang, pagan
																					dan papan.</p>
																					<p style="text-align: justify; line-height: 150%;">Maka penghitungan zakatnya adalah:
																					Penghasilan Keseluruhan X 2,5%</p>
																					<p style="text-align: justify; line-height: 150%;">* Kedua, zakat dihitung dari
																					penghasilan setelah dikurangi kebutuhan pokok.</p>
																					<p style="text-align: justify; line-height: 150%;">Maka penghitungan zakatnya adalah:
																					(Penghasilan Keseluruhan -Pengeluaran Pokok) x 2,5%</p>
																					<p style="text-align: justify; line-height: 150%;">* Namun untuk menjaga kehati-hatian
																					Zakat sebaiknya dihitung dari penghasilan bruto</p>
																					<p style="text-align: justify; line-height: 150%; font-size:10px;">Sumber :
																					https://www.rumahzakat.org/zakat/zakat-penghasilan/</p>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
																					<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
																				</div>
																			</div>
																		</div>
																	</div>

								<!-- <div id="des-prof" class="a_list collapse " style="padding:20px;">
				
				    
									

								</div> -->
							</div>
							<div class="form-field">
								<input name="zaprov" type="hidden" value="zakat profesi" placeholder="zaprov" >
							</div>
							<div id="ca" class="col-md-12">
								<p style="margin-top:5px; font-size:18px; margin-top:20px; margin-bottom:-10px; color:black;">Terkumpul : <b>Rp. {{number_format($jum_profesi->total,0,",",".")}}</b></p>

								<div class="form-field" style="padding-top:15px;">
									<button type="submit" class="btn main_bt  col-md-12"  id="kirim" style="border-radius:5px;">Bayar Zakat</button>
								</div>

								<div class=" accordion border_circle" style="padding-top:50px; margin-top: -50px;">
									<div class="bs-example ">
										<div class="panel-group col-md-12" id="accordion" >
											<div class="panel panel-default">
												<div class="panel-heading">
													<p class="panel-title" style="font-size: 13px;"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseZa"><i class="fa fa-users"></i> Donatur Zakat Profesi ({{($d_profesi->count())}})<i class="fa fa-angle-down"></i></a> </p>
												</div>
											</div>
											<div id="collapseZa" class="panel-collapse collapse">
												<div class="panel-body shopping-cart">
													<table class="table" style="font-size:12px;">
														@foreach ($d_profesi->get() as $profesi)

														<tr>
															<td rowspan="3" width="10%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>
															<td width="55%" style="padding-left:10px;" align="left">{{($profesi->nama)}}</td>
															<td rowspan="3" width="35%" align="right" style="padding-left:10px; color:#1f5daa;"><b>Rp. {{number_format($profesi->jumlah+$profesi->kode,0,",",".")}}</b></td>
														</tr>
														<tr>
															<td style="padding-left:10px;">{{($profesi->created_at->isoFormat('dddd, D MMMM Y'))}}</td>
														</tr>
														<tr><td colspan="3"><hr></td></tr>


														@endforeach

													</table>

												</div>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
							{{ csrf_field() }}
						</form>
						
						<br />		


					</div>
				</div>
			</div>

			{{-- zakat dagang --}}
			<div id="dagang" style="display: none">
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

									<div class="col-md-12">
										<div class="form-field">
											<label>Jumlah zakat perdagangan yang anda bayar</label>
											<input required name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()">
										</div>
										<p class="mt-2">Kenapa harus bayar zakat perdagangan ? <b><a href="#" data-toggle="modal" data-target="#perdagangan" style="color:#039ee3;">Klik Disini</a></b></p>

										<div class="modal fade" id="perdagangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p style="text-align: justify; line-height: 150%;"><b>Zakat Perdagangan</b></p>
														<p style="text-align: justify; line-height: 150%;">Ketentuan :</p>
														<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt; line-height: 150%;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</span></span></span>Telah mencapai haul</p>
														<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt; line-height: 150%;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</span></span></span>Mencapai nishab 85 gr emas</p>
														<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt; line-height: 150%;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</span></span></span>Besar zakat 2,5 %</p>
														<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt; line-height: 150%;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														</span></span></span>Dapat dibayar dengan barang atau uang</p>
														<p style="text-align: justify; line-height: 150%;">Berlaku untuk perdagangan secara
														individu atau badan usaha ( CV, PT, koperasi)</p>
														<p style="text-align: justify; line-height: 150%;">Cara Hitung :</p>
														<p style="text-align: justify; line-height: 150%;">Zakat Perdagangan = (Modal yang
															diputar + keuntungan + piutang yang dapat dicairkan) – (hutang-kerugian) x 2,5
														%</p>
														<p style="text-align: justify; line-height: 150%; font-size:10px;">Sumber : https://www.rumahzakat.org/zakat/zakat-perdagangan/</p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
														<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
													</div>
												</div>
											</div>
										</div>

										<!-- <div id="des-dag" class="a_list collapse " style="padding:20px;">

										</div> -->

									</div>
									<div class="form-field">
										<input name="zaprov" type="hidden" value="zakat dagang" placeholder="zaprov" >
									</div>
									<div id="cb" class="col-md-12">
										<p style="margin-top:5px; font-size:18px; margin-top:20px; margin-bottom:-10px; color:black;">Terkumpul : <b>Rp. {{number_format($jum_dagang->total,0,",",".")}}</b></p>
										<div class="form-field" style="padding-top:15px;">
											<button type="submit"  class="btn main_bt  col-md-12"  style="border-radius:5px;" >Bayar Zakat</button>
										</div>
										<div class=" accordion border_circle" style="padding-top:50px;margin-top: -50px;">
											<div class="bs-example ">
												<div class="panel-group col-md-12" id="accordion" >
													<div class="panel panel-default">
														<div class="panel-heading">
															<p class="panel-title" style="font-size: 13px;"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseDa"><i class="fa fa-users"></i> Donatur Zakat Perdagangan ({{($d_dagang->count())}})<i class="fa fa-angle-down"></i></a> </p>
														</div>
													</div>
													<div id="collapseDa" class="panel-collapse collapse">
														<div class="panel-body shopping-cart">
															<table class="table" style="font-size:12px;">
																@foreach ($d_dagang->get() as $dagang)

																<tr>
																	<td rowspan="3" width="10%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>
																	<td width="55%" style="padding-left:10px;" align="left">{{($dagang->nama)}}</td>
																	<td rowspan="3" width="35%" align="right" style="padding-left:10px; color:#1f5daa;"><b>Rp. {{number_format($dagang->jumlah+$profesi->kode,0,",",".")}}</b></td>
																</tr>
																<tr>
																	<td style="padding-left:10px;">{{($dagang->created_at->isoFormat('dddd, D MMMM Y'))}}</td>
																</tr>
																<tr><td colspan="3"><hr></td></tr>


																@endforeach

															</table>

														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</form>

								<br />		


							</div>
						</div>
					</div>
					{{-- zakat simpanan --}}
					<div id="simpanan" style="display: none">
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
											
											<div class="col-md-12">
												<div class="form-field">
													<label>Jumlah zakat simpanan yang anda bayar</label>
													<input required name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()">
												</div>
												<p class="mt-2">Kenapa harus bayar zakat simpanan ? <b><a href="#" data-toggle="modal" data-target="#sim" style="color:#039ee3;">Klik Disini</a></b></p>

												<div class="modal fade" id="sim" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<p style="text-align: justify; line-height: 150%;"><b>Zakat Simpanan</b></p>
																<p style="text-align: justify; line-height: 150%;">Uang simpanan dikenakan zakat dari
																jumlah saldo akhir bila :</p>
																<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt; line-height: 150%;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</span></span></span>Telah mencapai haul. </p>
																<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt; line-height: 150%;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</span></span></span>Besarnya nisab senilai 85 gr emas.</p>
																<p style="text-align: left; margin-left: 21.3pt; text-indent: -18pt; line-height: 150%;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</span></span></span>Besar zakat yang harus dikeluarkan 2,5 %</p>
																<p style="text-align: justify; margin-left: 21.3pt; line-height: 150%;">&nbsp;</p>
																<p style="text-align: justify; line-height: 150%;">Zakat simpanan Tabungan</p>
																<p style="text-align: justify; line-height: 150%;">Saldo akhir : saldo akhir – Bagi
																hasil/bunga</p>
																<p style="text-align: justify; line-height: 150%;">Besarnya zakat : 2,5 % x saldo
																akhir</p>
																<p style="text-align: justify; line-height: 150%;">&nbsp;</p>
																<p style="text-align: justify; line-height: 150%;">Zakat Simpanan Deposito</p>
																<p style="text-align: justify; line-height: 150%;">Penghitungan sama dengan zakat
																simpanan Tabungan.</p>
																<p style="text-align: justify; line-height: 150%; font-size:10px;">Sumber :
																https://www.rumahzakat.org/zakat/zakat-simpanan/</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
															</div>
														</div>
													</div>
												</div>
<!-- 
												<div id="des-sim" class="a_list collapse" style="padding:20px;">
													

												</div> -->
											</div>
											<div class="form-field">
												<input name="zaprov" type="hidden" value="zakat simpanan" placeholder="zaprov" >
											</div>
											<div id="cd" class="col-md-12">
												<p style="margin-top:5px; font-size:18px; margin-top:20px; margin-bottom:-10px;color:black;">Terkumpul : <b>Rp. {{number_format($jum_simpanan->total,0,",",".")}}</b></p>
												<div class="form-field" style="padding-top:15px;">
													<button type="submit"  class="btn main_bt  col-md-12"  style="border-radius:5px;" >Bayar Zakat</button>
												</div>
												<div class=" accordion border_circle" style="padding-top:50px;margin-top: -50px;">
													<div class="bs-example ">
														<div class="panel-group col-md-12" id="accordion" >
															<div class="panel panel-default">
																<div class="panel-heading">
																	<p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSi"><i class="fa fa-users"></i> Donatur Zakat Simpanan ({{($d_simpanan->count())}})<i class="fa fa-angle-down"></i></a> </p>
																</div>
															</div>
															<div id="collapseSi" class="panel-collapse collapse">
																<div class="panel-body shopping-cart">
																	<table class="table" style="font-size:12px;">
																		@foreach ($d_simpanan->get() as $simpan)

																		<tr>
																			<td rowspan="3" width="10%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>
																			<td width="55%" style="padding-left:10px;" align="left">{{($simpan->nama)}}</td>
																			<td rowspan="3" width="35%" align="right" style="padding-left:10px; color:#1f5daa;"><b>Rp. {{number_format($simpan->jumlah+$profesi->kode,0,",",".")}}</b></td>
																		</tr>
																		<tr>
																			<td style="padding-left:10px;">{{($simpan->created_at->isoFormat('dddd, D MMMM Y'))}}</td>
																		</tr>
																		<tr><td colspan="3"><hr></td></tr>


																		@endforeach

																	</table>

																</div>
															</div>
														</div>
													</div>
												</div>
											</fieldset>
										</form>

										<br />		


									</div>
								</div>
							</div>

							<div id="emas" style="display: none">
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

													<div class="col-md-12">
														<div class="form-field">
															<label>Jumlah zakat Emas yang anda bayar</label>
															<input required name="jumlah" type="text" onkeyup="convertToRupiah(this);" placeholder="Rp. 0" onblur="stopCalc()">
														</div>
														<p class="mt-2">Kenapa harus bayar zakat emas ? <b><a href="#" data-toggle="modal" data-target="#emasemas" style="color:#039ee3;">Klik Disini</a></b></p>

														<div class="modal fade" id="emasemas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p class="MsoNormalM" style="text-align: justify;"><b>Zakat Emas dan Perak</b></p>
																		<p class="MsoNormalM" style="text-align: justify;">&nbsp;</p>
																		<p class="MsoNormalM" style="text-align: justify;">Zakat Emas dan Zakat Perak : zakat atas batang emas/perak
																			atau uang atau barang-barang atau perhiasan wanita yang lebih dari kewajaran
																		yang telah mencapai haul dan nishabnya.</p>
																		<p class="MsoNormalM" style="text-align: justify;">Dalil : QS. 9:35</p>
																		<p class="MsoNormalM" style="text-align: justify;">“Tidak ada seorangpun yang mempunyai emas dan perak yang dia
																			tidak berikan zakatnya, melainkan pada hari kiamat dijadikan hartanya itu
																			beberapa keping api neraka dan disetrikakan pada punggung dan jidatnya…” (HR.
																		Muslim)</p>
																		<p class="MsoNormalM" style="text-align: justify;">&nbsp;</p>
																		<p class="MsoNormalM" style="text-align: justify;">Ketentuan :</p>
																		<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		</span></span></span>Mencapai haul</p>
																		<p style="text-align: left; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		</span></span></span>Mencapai nishab = 85 gr emas murni</p>
																		<p style="text-align: left; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		</span></span></span>20 dinar = (1 dinar = 4,25 gr; 20 x 4,25 gr = 85
																	gr)</p>
																	<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	</span></span></span>Besar zakat 2,5 %</p>
																	<p class="MsoNormalM" style="text-align: justify;">&nbsp;</p>
																	<p class="MsoNormalM" style="text-align: justify;">Cara Menghitung :</p>
																	<p class="MsoNormalM" style="text-align: justify;">Jika seluruh emas yang dimiliki, tidak dipakai atau
																	dipakainya hanya setahun sekali</p>
																	<p class="MsoNormalM" style="text-align: justify;">* Zakat = emas yang dimiliki x harga emas x 2,5 %</p>
																	<p class="MsoNormalM" style="text-align: justify;">Jika emas yang dimiliki ada yang dipakai</p>
																	<p class="MsoNormalM" style="text-align: justify;">* Zakat = (emas yang dimiliki – emas yang dipakai) x harga
																	emas x 2,5 %</p>
																	<p class="MsoNormalM" style="text-align: justify;">&nbsp;</p>
																	<p class="MsoNormalM" style="text-align: justify;">Zakat Perak</p>
																	<p class="MsoNormalM" style="text-align: justify;">Ketentuan :</p>
																	<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	</span></span></span>Mencapai haul</p>
																	<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	</span></span></span>Mencapai nishab = 595 gr</p>
																	<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																	</span></span></span>200 dirham = (1 dirham = 2,975 gr, 200 x 2,975
																gr = 595 gr)</p>
																<p style="text-align: justify; margin-left: 21.3pt; text-indent: -18pt;"><span><span>-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																</span></span></span>Besar zakat 2,5 %</p>
																<p class="MsoNormalM" style="text-align: justify;">&nbsp;</p>
																<p class="MsoNormalM" style="text-align: justify;">Cara Menghitung :</p>
																<p class="MsoNormalM" style="text-align: justify;">Jika seluruh perak yang dimiliki, tidak dipakai atau
																dipakainya hanya setahun sekali</p>
																<p class="MsoNormalM" style="text-align: justify;">* Zakat = perak yang dimiliki x harga perak x 2,5 %</p>
																<p class="MsoNormalM" style="text-align: justify;">Jika perak yang dimiliki ada yang dipakai</p>
																<p class="MsoNormalM" style="text-align: justify;">* Zakat = (perak yang dimiliki – perak yang dipakai) x harga
																perak x 2,5 %</p>
																<p class="MsoNormalM" style="text-align: justify; font-size:10px;">Sumber :
																https://www.rumahzakat.org/zakat/zakat-emas-dan-perak/</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>

														<!-- <div id="des-emas" class="a_list collapse " style="padding:20px;">

														</div> -->
													</div>
													<div class="form-field">
														<input name="zaprov" type="hidden" value="zakat emas" placeholder="zaprov" >
													</div>
													<div id="cc" class="col-md-12">
														<p style="margin-top:5px; font-size:18px; margin-top:20px; margin-bottom:-10px;color:black;">Terkumpul : <b>Rp. {{number_format($jum_emas->total,0,",",".")}}</b></p>
														<div class="form-field" style="padding-top:15px;">
															<button type="submit"  class="btn main_bt  col-md-12"  style="border-radius:5px;" >Bayar Zakat</button>
														</div>
														<div class=" accordion border_circle" style="padding-top:50px; margin-top: -50px;">
															<div class="bs-example ">
																<div class="panel-group col-md-12" id="accordion" >
																	<div class="panel panel-default">
																		<div class="panel-heading">
																			<p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseSi"><i class="fa fa-users"></i> Donatur Zakat Emas ({{($d_emas->count())}})<i class="fa fa-angle-down"></i></a> </p>
																		</div>
																	</div>
																	<div id="collapseSi" class="panel-collapse collapse">
																		<div class="panel-body shopping-cart">
																			<table class="table" style="font-size:12px;">
																				@if($d_emas->count() == 0)
																				<tr>
																					<td>Tidak ada</td>
																				</tr>
																				@else
																				@foreach ($d_emas->get() as $emas)

																				<tr>
																					<td rowspan="3" width="10%"><img src="{{asset('kuy/images/userabu.png')}}" style="max-height:50px"></td>
																					<td width="55%" style="padding-left:10px;" align="left">{{($emas->nama)}}</td>
																					<td rowspan="3" width="35%" align="right" style="padding-left:10px; color:#1f5daa;"><b>Rp. {{number_format($emas->jumlah+$profesi->kode,0,",",".")}}</b></td>
																				</tr>
																				<tr>
																					<td style="padding-left:10px;">{{($emas->created_at->isoFormat('dddd, D MMMM Y'))}}</td>
																				</tr>
																				<tr><td colspan="3"><hr></td></tr>

																				@endforeach
																				@endif

																			</table>

																		</div>
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
												</form>

												<br />		



											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					@include('layouts.footer_new')
				</div>
			</div>

		</div>

		<script>
		// $(document).ready(function(){
		$('.kkk').on('change', function() {
			// alert($(this).val())
			if($(this).val() == 'dagang'){
				document.getElementById('dagang').style.display = 'block';
				document.getElementById('profesi').style.display = 'none';
			}else if($(this).val() == 'profesi'){
				document.getElementById('dagang').style.display = 'none';
				document.getElementById('profesi').style.display = 'block';
			}else if($(this).val() == 'simpanan'){
				document.getElementById('simpanan').style.display = 'block';
				document.getElementById('emas').style.display = 'none';
				document.getElementById('profesi').style.display = 'none';
				document.getElementById('dagang').style.display = 'none';
			}else if($(this).val() == 'emas'){
				document.getElementById('emas').style.display = 'block';
				document.getElementById('simpanan').style.display = 'none';
				document.getElementById('dagang').style.display = 'none';
				document.getElementById('profesi').style.display = 'none';
			}else{
				document.getElementById('dagang').style.display = 'none';
				document.getElementById('profesi').style.display = 'none';
				document.getElementById('simpanan').style.display = 'none';
				document.getElementById('emas').style.display = 'none';
			}
		})
// })
</script>
		<!--<div class="row">-->
			<!--    <div class="col-md-12">-->
				<!--      <div class="full center">-->
					<!--        <div class="main_heading ">-->
						<!--          <h2>INFAK / SEDEKAH</h2>-->
						<!--        </div>-->
						<!--      </div>-->
						<!--    </div>-->
						<!--  </div>-->
						<!--<div class="row" style="margin:-60px 0 55px 0;">-->
							<!--    <div class="col-md-12 margin_bottom_30_all">-->
								<!--      <div class="full">-->
									<!--        <div class="col-md-12">-->
										<!--	<form action="#">-->
											<!--	  <fieldset>-->
												<!--		<div class="row">-->
													<!--		  <div class="col-md-12">-->
														<!--			<div class="form-field" style="padding-top:15px;">-->
															<!--			  <a href="https://berbagibahagia.org/program/Infak" class="btn main_bt  col-md-12"">INFAK / SEDEKAH SEKARANG</a>-->
															<!--			</div>-->
															<!--		  </div>-->
															<!--		</div>-->
															<!--	  </fieldset>-->
															<!--	</form>-->
															<!--  </div>-->
															<!--      </div>-->
															<!--    </div>-->
															<!--  </div>-->


														</div> 
													</div>


													@include('layouts.modal')
													@include('layouts.footer_plus')

													@include('layouts.js')

													<script>
														var element = document.getElementById("cc");
														var element1 = document.getElementById("cd");
														var element2 = document.getElementById("cb");
														var element3 = document.getElementById("ca");
														if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
															element.classList.remove("fixed-content");
															element1.classList.remove("fixed-content");
															element2.classList.remove("fixed-content");
															element3.classList.remove("fixed-content");
														} else {
															window.onscroll = function() {scrollFunction()};

															function scrollFunction() {
																if (document.body.scrollTop > 230 || document.documentElement.scrollTop > 230) {
																	$('#cc').addClass('fixed-content');
																	$('#cd').addClass('fixed-content');
																	$('#cb').addClass('fixed-content');
																	$('#ca').addClass('fixed-content');
																}else{
																	$('#cc').removeClass('fixed-content');
																	$('#cd').removeClass('fixed-content');
																	$('#cb').removeClass('fixed-content');
																	$('#ca').removeClass('fixed-content');

																}
															}
														}


														$("#Zakat").on("change", function(e) {
														var $optionSelected = $("option:selected", this);
														$optionSelected.tab("show");
														});
												
												</script>

												</body>
												</html>
