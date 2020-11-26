<div class="section checkout_section">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="full">
              <div class="checkout-form" style="border:0px;">
                <form action="#">
                  <fieldset>
                    <div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-field">
                  <label>Kategori</label>
                        <select name="cn">
                              <option >Semua</option>
                    <option value="">Pendidikan</option>
                    <option value="">Kesehatan</option>
                    <option value="">Infrastruktur</option>
                         </select>
                      </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-field">
                  <label>Wilayah</label>
                        <select name="cn">
                              <option >Semua</option>
                    <option value="">Indramayu</option>
                    <option value="">Sumedang</option>
                    <option value="">Bandung</option>
                         </select>
                      </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-field">
                  <label>Urutkan</label>
                        <select name="cn">
                              <option >Semua</option>
                    <option value="">Terpopuler</option>
                    <option value="">Terbaru</option>
                    <option value="">Terlama</option>
                         </select>
                      </div>
                </div>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                        <button class="bt_main" style="margin-top:12px;">Terapkan Filter</button>
                      </div>
                    </div>
                  </fieldset>
                 </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach ($sma_list as $post)
          <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
          
            <a href="{{route('program.detail',$post->deskripsi)}}">
            <div class="product_list">
              <div class="product_img"> <img class="img-responsive" src="{{asset('gambarUpload/'.$post->gambar)}}" alt=""> </div>
              <div class="product_detail_btm">
                <div class="center-cam">
                  <h4>{{($post->title)}}</h4>
                </div>
                <p class="center-cam">{{($post->kategori)}}<span class="fa fa-check"></span>
                <hr style="margin:0;">
                <div class="product_price shopping-cart" style="font-size:10px;">
                  <table class="table">
                  <tr style="margin-bottom:-10px;">
                  <td align="left" >Terkumpulan</td> 
                  <td align="right" style="text-align:right; ">Sisa Waktu</td>
                  </tr>
                  <tr  style=" border-top: 2px solid #ffffff;">
                  <td align="left"><b>Rp. <?php echo number_format(0,0,",",".");?></b></td> 
                  <td align="right" style="text-align:right;"><b>100 Hari</b></td>
                  </tr>
                  </table>
                </div>	
                </p>
                <div class="starratin center">
                    <div class="progress" style="width:100%;">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
              </div>
            </div>
            </a>
          </div>
          @endforeach
          <div class="center">
            <ul class="pagination style_1" style="margin-bottom:100px;">
                <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>