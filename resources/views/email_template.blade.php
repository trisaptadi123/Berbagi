<div class="section padding_layout_1 checkout_section">
    <div class="container">
<div class="row" style="margin-top:10px;">
    <div class="center">
      <div class="col-md-5">
        <div class="checkout-form">
          <form action="#" class=" center" style="font-family:arial;">
            <fieldset>
            <div class="row">
              
			  <div class="col-md-12">
                @foreach ($list_donatur as $donatur)
				<div class="form-field">
				<h4 class="center">Pembayaran</h4>
				<hr />
				<p class="center" style="font-size:12px;">Mohon Transfer Tepat </p>
                <h2 class="center">Rp.{{number_format($donatur->jumlah+$donatur->kode)}}</h2>
				<div class="alert alert-primary" role="alert" style="font-size: 12px; line-height: 22px; text-align:justify;">
                    <p>Transfer ke rekening a/n <b style="font-size: 15px">Kilau Indonesia</b> berikut ini :</p>
                <table class="table" style="font-size:12px;">
                    <tr><td align="left" style="font-size:14px;"><b>{{$donatur->bank}}</b></td>
                    </table>
				</div>
                <table class="table" style="font-size:12px;">
                    <div>
                        <div>
                            <tr><td>Donasi untuk campaign :</td></tr>
                            <td align="right"><b>{{$donatur->namakonten}}</b></td>
                        </div>
                    </div>
                    
                </table>
                <p>Semoga apa yang diberikan dibalas berlipat ganda oleh Allah SWT. Aamiin</p>
                </div>
                @endforeach
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
 
  


