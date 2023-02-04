<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<style>
.ajax-loading{
 text-align: center;
}


</style>

<style type="text/css">
@media screen and (min-device-width : 768px) {
  .siz {
    max-width: 540px;
  }
      /* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

  .warn{
    background: #fff;
  }

  .mntp{
    padding-bottom: 30px; 
  }

  .product_list {
    min-height: auto;
    padding: 10px 10px 10px 10px;
  transition: ease all 0.5s;
  height:175px;
    margin-bottom: -10px;
    margin-top: -12px;
    margin-left: -5%;
  border: 1px solid #ccc;
  border-radius: 7px;
  border-bottom: 1px solid #ccc;
  box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
  width: 110%;
  /*padding-right: 20px;*/
}

.product_list:hover{
  border: 1px solid #ccc;
}

.product_img {
  width: 150px;
  float: left;
}

.product_img img {
  height: 140px;
  float: left;
  border-radius: 0px;
}

.product_detail_btm{
  float:right;
  margin-top:15px;
  width: 200px;
  margin-right: 20px;
  position: relative;
  display: block;
}

.product_detail_btm h4{
  float:right;
  text-align: left;
  font-size: 12px;
  margin-bottom: -0px;
}

.center-cam{
  justify-content: center;
}

.center-cam h4{
  justify-content: left;
}

.center-cam p{
  justify-content: left;
}

.product_detail_btm p {
  margin: 0;
  text-align: left;
  font-size:12px;
}
.product_price {
  margin: 0;
}

.starratin {
  padding: 0;
}

.progress {
  margin-top: -2px;
  height:5px;
}

.swiper-container {
  width:90%;
  margin-top:-35px;
}

.c_img img {
    height: 150px;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.c_detail_btm h4{
  font-size: 12px;
}

.c2_list {
  height: 135px;
}

.c2_img img {
    height: 85px;
  width: 100%;
  object-fit: cover;
  border-radius: 10px;
}

.c2_detail_btm h4{
  margin: 5px 2px 5px 2px;
  font-size: 10px;
}

.c2_price {
  font-size:10px;
}

.product_list2 {
  min-height: 190px;
  transition: ease all 0.5s;
  box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
  border: 1px solid #dddddd;
  /* border-bottom: solid #aaaaaa 5px; */
  border-radius: 5px;
  background: #fff;
}

.cleaning .product_list2 {
  min-height: 340px;
  transition: ease all 0.5s;
}

.product_list2:hover,
.product_list2:focus {
  box-shadow: none;
  /* border-bottom: solid #1f5daa  5px; */
}

.product_img2 {
    display: inline;
  overflow: hidden;
  background: #f3f3f3;
}


.product_img2 img {
    height: 115px;
  width: 100%;
  object-fit: cover;
  border-radius: 5px;
}

.cleaning2 .product_img2 img {
  padding: 0;
}

.product_detail_btm2 h4 {
  margin: 10px 5px 0px 5px;
  font-size: 13px;
  text-align: center;
  height:35px;
}

}

@media screen and (max-device-width : 425px) {
  .product_list {
    min-height: auto;
    padding: 5px 5px 5px 5px;
	transition: ease all 0.5s;
	height:120px;
    margin-bottom: -10px;
		margin-top: -12px;
		margin-left: -5%;
	border: 1px solid #ccc;
	border-radius: 7px;
	border-bottom: 1px solid #ccc;
	box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
	width: 110%;
}

.product_list:hover{
	border: 1px solid #ccc;
}

.product_img {
	width: 100px;
	float: left;
}

.product_img img {
	height: 95px;
	float: left;
	border-radius: 0px;
}

.img-don {
	margin-top: 10px;
	margin-right: 5px;
	width: 100px;
	float: left;
	margin-bottom: -25px;
}

.img-don img {
	height: auto;
	float: left;
}

.detail-don {
	float:right;
	margin-top:-52px;
	width: 170px;
	padding-left: 5px;
	position: relative;
	display: block;
}

.product_detail_btm{
	float:right;
	margin-top:-22px;
	width: 190px;
	margin-right: 2px;
	position: relative;
	display: block;
}

.product_detail_btm h4{
	float:right;
	text-align: left;
	font-size: 12px;
	margin-bottom: -0px;
}

.center-cam{
	justify-content: left;
}

.center-cam h4{
	justify-content: left;
}

.center-cam p{
	justify-content: left;
}

.product_detail_btm p {
	margin: 0;
	text-align: left;
	font-size:12px;
}

.product_price {
	margin: 0;
}

.starratin {
	padding: 0;
}

.progress {
	margin-top: -2px;
	height:5px;
}

.swiper-container {
	width:90%;
	margin-top:-35px;
}

.c_img img {
    height: 150px;
	width: 70%;
	object-fit: cover;
	border-radius: 10px;
}

.c_detail_btm h4{
	font-size: 12px;
}

.c2_list {
	height: 135px;
}

.c2_img img {
    height: 85px;
	width: 100%;
	object-fit: cover;
	border-radius: 10px;
}

.c2_detail_btm h4{
	margin: 5px 2px 5px 2px;
	font-size: 10px;
}

.c2_price {
	font-size:10px;
}

.product_list2 {
	min-height: 190px;
	transition: ease all 0.5s;
	box-shadow: 3px 3px 2px 0px rgba(0, 0, 0, 0.2);
	border: 1px solid #dddddd;
	/* border-bottom: solid #aaaaaa 5px; */
	border-radius: 5px;
	background: #fff;
}

.cleaning .product_list2 {
	min-height: 340px;
	transition: ease all 0.5s;
}

.product_list2:hover,
.product_list2:focus {
	box-shadow: none;
	/* border-bottom: solid #1f5daa  5px; */
}

.product_img2 {
    display: inline;
	overflow: hidden;
	background: #f3f3f3;
}


.product_img2 img {
    height: 115px;
	width: 100%;
	object-fit: cover;
	border-radius: 5px;
}

.cleaning2 .product_img2 img {
	padding: 0;
}

.product_detail_btm2 h4 {
	margin: 10px 5px 0px 5px;
	font-size: 13px;
	text-align: center;
	height:35px;
}

.product_price2 {
	margin: 5px 15px 0 15px;
	text-align: left;
}


}
  
</style>



<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page" style="background: #f2f2f2">
  <!-- loader -->
  <!-- <div class="bg_load"> <img class="loader_animation" src="{{asset('kuy/images/loaders/bb.png')}}" style="max-height:50px;" alt="#" /> </div> -->



  @include('layouts.header')
  <div class="container" style="width: 540px" >
    <div class="section" style="background: #fff; display: flex;justify-content: center;">
      <div class="row">
        <div class="col-md-12 margin_bottom_30_all" style="padding-top:20px">
          <div class="row" style="padding:10px;">
            {{ csrf_field() }}
            <div id="post_data">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){

   var _token = $('input[name="_token"]').val();

   load_data('', _token);

   function load_data(id="", _token)
   {
    $.ajax({
     url:"http://127.0.0.1:8000/layouts/semuaanakasuh",
     method:"POST",
     data:{id:id, _token:_token},
     success:function(data)
     {
      $('#load_more_button').remove();
      $('#post_data').append(data);
    }
  })
  }

  $(document).on('click', '#load_more_button', function(){
    var id = $(this).data('id');
    $('#load_more_button').html('<b>Loading...</b>');
    load_data(id, _token);
  });

});
</script>


@include('layouts.modal')

<!-- @ include('layouts.footer_plus') -->

@include('layouts.js')
</body>
</html>
