<!DOCTYPE HTML>
<html>
<head>
	<title>Berbagibahagia.org</title>
	<!-- <link href="{{ asset('css/404.css') }}" rel="stylesheet" type="text/css"  media="all" /> -->
	@include('layouts.css')

</head>
<body style="background-color: #f2f2f2;">
	@include('layouts.header')
	<div class="container" style="max-width: 600px; background: #fff; min-height: 700px;  ">
	<div class="section padding_layout_1" style="margin-top: -150px">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 30%">
					<div class="center margin_bottom_30_all"> <img class="img_rensponsive" src="{{ asset('gambarUpload/404_error_img.png') }}" alt="#" style="width: 50%"> </div>
					<div class="heading text_align_center">
						<h2>Maaf, halaman tidak ditemukan</h2>
						<h4>Halaman yang kamu cari tidak ada atau sedang mengalami gangguan</h4>
					</div>
					<div class="center"> <a class="btn sqaure_bt light_theme_bt" href="{{ url()->previous() }}">Kembali</a> </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
