<a href="https://api.whatsapp.com/send?phone=+628112484484Whatsap&text=Assalamu'alaikum admin Berbagi Bahagia" target="_blank" class="wa">
  <img src="{{asset('gambarUpload/wa.png')}}">
</a>

<!-- js section -->
<script src="{{asset('kuy/js/jquery.min.js')}}"></script>
<script src="{{asset('kuy/js/bootstrap.min.js')}}"></script>
<!-- menu js -->
<script src="{{asset('kuy/js/menumaker.js')}}"></script>
<!-- wow animation -->
<script src="{{asset('kuy/js/wow.js')}}"></script>
<!-- custom js -->
<script src="{{asset('kuy/js/custom.js')}}"></script>
<!-- revolution js files -->
<script src="{{asset('kuy/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.carousel.mines.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('kuy/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>

<script src="{{asset('kuy/js/swiper-bundle.js')}}"></script>
<script src="{{asset('kuy/js/swiper-bundle.min.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.js"></script>

<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $(document).ready(function() {
    $('.datatab').DataTable( {
      scrollX: true
      // scrollCollapse: true
    } );
  } );
</script>
@if(Session::get('success'))
<script type="text/javascript">
    // console.log(Session::get('success'));

    alert("E-mail Sudah Terpakai");

  </script>
  @endif
  <script>
    $('#summernotes').summernote({
      focus: true, 
      placeholder: 'Masukan teks disini',
      tabsize: 2,
      height: 320,
    codemirror: { // codemirror options
      theme: 'monokai'
    },
    popover: {
      image: [
      ['imagesize', ['imageSize100', 'imageSize75','imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']]
      ],
    },

    blockquoteBreakingLevel: 0,
    callbacks: { onPaste: function (e) { var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text'); e.preventDefault(); document.execCommand('insertText', false, bufferText); } },
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
    
    
  });

</script>

<script>
    $('#summernotesss').summernote({
      focus: true, 
      placeholder: 'Masukan teks disini',
      tabsize: 2,
      height: 200,
    codemirror: { // codemirror options
      theme: 'monokai'
    },
    popover: {
      image: [
      ['imagesize', ['imageSize100', 'imageSize75','imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']]
      ],
    },

    blockquoteBreakingLevel: 0,
    callbacks: { onPaste: function (e) { var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text'); e.preventDefault(); document.execCommand('insertText', false, bufferText); } },
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

</script>

<script>
  $('#summernotes1').summernote({
    focus: true, 
    placeholder: 'Masukan teks disini',
    tabsize: 2,
    height: 320,
    codemirror: { // codemirror options
      theme: 'monokai'
    },
    popover: {
      image: [
      ['imagesize', ['imageSize100', 'imageSize75','imageSize50', 'imageSize25']],
      ['float', ['floatLeft', 'floatRight', 'floatNone']],
      ['remove', ['removeMedia']]
      ],

    },

    blockquoteBreakingLevel: 0,
    callbacks: { onPaste: function (e) { var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text'); e.preventDefault(); document.execCommand('insertText', false, bufferText); } },
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

</script>
<!--<script>
  $('#summernotes').summernote({
    focus: true, 
    placeholder: 'Masukan teks disini',
    tabsize: 2,
    height: 320,
    callbacks: { onPaste: function (e) { var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text'); e.preventDefault(); document.execCommand('insertText', false, bufferText); } },
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

</script>
<script>
  $('#summernote1').summernote({
    focus: true, 
    placeholder: 'Masukan teks disini',
    tabsize: 2,
    height: 320,
    callbacks: { onPaste: function (e) { var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text'); e.preventDefault(); document.execCommand('insertText', false, bufferText); } },
    toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

</script>-->

<script type="text/javascript">

	$(function provinsi(){
    console.log('cc');
        // document.getElementById("b").innerHTML="dasdjkasd";

        $.get('/prof', function(data){
          var isi = '';
          for (var i=0; i < data.length; i++) {
            isi += `<option value='`+data[i]['province_id']+`'>`+data[i]['name']+`</option>`;
          } 
          document.getElementById("b").innerHTML=isi;
        // console.log(actualData['rajaongkir']);
      });

        $('#b').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#b').val();
      console.log(prov);

      $.ajax({
       type : 'GET',
       url : '/cek_kab',
       data : { id_prov: prov},
       success: function (data) {
        var add = '';
        for (var i=0; i < data.length; i++) {
          add += `<option value='`+data[i]['name']+`'>`+data[i]['name']+`</option>`;
        } 
        document.getElementById("a").innerHTML=add;
					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					// $("#kabupaten").html(data);
				}
     });
    });
        
        // $.ajax({
        // type:'GET',
        // url:'/../prof',
        // headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        
        // dataType: 'json',
        // success :function(response) {
        // //   var data = response;
        //       console.log(response);
        //     //   
        //     // document.getElementById("list").innerHTML=response;
        //     // response
        //     // for (var i=0; i < response['rajaongkir']['results'].length; i++) {
        //     //     isi += `<option value='`+response['rajaongkir']['results'][i]['province_id']+`'>`+response['rajaongkir']['results'][i]['province']+`</option>`;
        //     // }
        //     // $("#mycart").slideToggle();

        // }
        // });



      });
    </script>

    <script>
      function myFunction() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
    <!--<script>-->
      <!--  $('#summernote').summernote({-->
      <!--    placeholder: 'Hello stand alone ui',-->
      <!--    tabsize: 2,-->
      <!--    height: 120,-->
      <!--    toolbar: [-->
      <!--      ['style', ['style']],-->
      <!--      ['font', ['bold', 'underline', 'clear']],-->
      <!--      ['color', ['color']],-->
      <!--      ['para', ['ul', 'ol', 'paragraph']],-->
      <!--      ['table', ['table']],-->
      <!--      ['insert', ['link', 'picture', 'video']],-->
      <!--      ['view', ['fullscreen', 'codeview', 'help']]-->
      <!--    ]-->
      <!--  });-->
      <!--</script>-->
      <script>
       $(function () {
        $("#cek").click(function () {
          // var p=$("#nama");
          document.getElementById('id_category').readOnly=this.checked;
          
          $.each($("input[name='cek']:checked"), function () { 
            var n =$(this).val();
            console.log(n);    
            document.getElementById("id_category").value= n;
          });

        });
      });
    </script>
    <script>
      function reply_click_tf(element)
      {
        
        document.getElementById('bankid').value = element.getAttribute('data-bankid-name');
        document.getElementById('bank').value = element.getAttribute('data-bank-name');
        document.getElementById('jenis').value = element.getAttribute('data-jenis-name');
        document.getElementById('qris').value = element.getAttribute('data-qris-name');
        document.getElementById('url').value = element.getAttribute('data-url-name');
      }   
    </script>
        
    <script>
      function reply_click_asuh(element)
      {
        document.getElementById('bank').value = element.getAttribute('data-bank-name');
        document.getElementById('url').value = element.getAttribute('data-url-name');
      }   
    </script>    
    
    <script>
      function reply_click_zkt(element)
      {
        document.getElementById('bank').value = element.getAttribute('data-bank-name');
        document.getElementById('jenis').value = element.getAttribute('data-jenis-name');
        document.getElementById('url').value = element.getAttribute('data-url-name');
      }   
    </script>

    <script>
      var i = 0;
      function buttonplus() {
        i += 1;
        $("#jumlah").val(i);
        var harga = $(".harga").val();
        var a = $(".harga1").val();
        var jumlah = $("#jumlah").val();

    // harga = isNaN(harga) ? a : harga;
    if (isNaN(harga)){

    	var d = Math.round(a);
    	var reverse = d.toString().split('').reverse().join(''),
      e = reverse.match(/\d{1,3}/g);
      e = e.join('.').split('').reverse().join('');
      document.qurban.harga.value= 'Rp. ' + e;
      
    }

    
    jumlah = isNaN(jumlah) ? 0 : jumlah;
    var total = parseInt(a.replace(/\D/g, '')) * parseInt(jumlah.replace(/\D/g, ''));
    
    total = isNaN(total) ? a : total;
    // $(".harga").attr("value", total);
    // $(".harga").val(total);
    var d = Math.round(total);
    var reverse = d.toString().split('').reverse().join(''),
    e = reverse.match(/\d{1,3}/g);
    e = e.join('.').split('').reverse().join('');
    document.qurban.harga.value= 'Rp. ' + e;

  }

  function buttonmin() {
    if(i == 1){
      document.getElementById('jumlah').value = 1;

    } else {
      i -= 1;
      document.getElementById('jumlah').value = i;
      var harga = $(".harga").val();
      var a = $(".harga1").val();
      var jumlah = $("#jumlah").val();

    // harga = isNaN(harga) ? a : harga;
    if (isNaN(harga)){

    	var d = Math.round(a);
    	var reverse = d.toString().split('').reverse().join(''),
      e = reverse.match(/\d{1,3}/g);
      e = e.join('.').split('').reverse().join('');
      document.qurban.harga.value= 'Rp. ' + e;
      
    }

    
    jumlah = isNaN(jumlah) ? 0 : jumlah;
    var total = parseInt(a.replace(/\D/g, '')) * parseInt(jumlah.replace(/\D/g, ''));
    
    total = isNaN(total) ? a : total;
    // $(".harga").attr("value", total);
    // $(".harga").val(total);
    var d = Math.round(total);
    var reverse = d.toString().split('').reverse().join(''),
    e = reverse.match(/\d{1,3}/g);
    e = e.join('.').split('').reverse().join('');
    document.qurban.harga.value= 'Rp. ' + e;
  }
}
</script>
<script>
  $('document').ready(function(){
    $('#donasi').on('keyup',function() {
      separator = ".";
      a = $('#donasi').val();
      b = a.replace(/[^\d]/g,"");
      c = "";
      panjang = b.length; 
      j = 0; 
      for (i = panjang; i > 0; i--) {
       j = j + 1;
       if (((j % 3) == 1) && (j != 1)) {
         c = b.substr(i-1,1) + separator + c;
       } else {
         c = b.substr(i-1,1) + c;
       }
     }
     if (c <= 0){
      $('#donasi').val('');
    }else{
      $('#donasi').val('Rp. '+c);
    }
    // console.log(donasi);
    // $('#donasi').val(donasi);
    if($('#donasi').val() != ''){
      $('.harga').val(0);
      $('#jumlah').val(0);
      $('#btnadd').addClass('disabled', true);
      $('#btnmin').addClass('disabled', true);
      $('.harga').attr('disabled', true);
      $('#jumlah').attr('disabled', true);
    } else {

      var coba = $('.harga1').val();
      var d = Math.round(coba);
      var reverse = d.toString().split('').reverse().join(''),
      e = reverse.match(/\d{1,3}/g);
      e = e.join('.').split('').reverse().join('');
      var harga = 'Rp. '+e;
      $('.harga').val(harga);
      $('#jumlah').val(1);
      $('#btnadd').removeClass('disabled', true);
      $('#btnmin').removeClass('disabled', true);
      $('.harga').removeAttr('disabled', true);
      $('#jumlah').removeAttr('disabled', true);
    }
  });
    $('#btnadd').on('click',function() {

    // console.log('Rp. '+e);
    $('#donasi').attr('disabled', true);
  });
    $('#btnmin').on('click',function() {
      var d = Math.round($('.harga1').val());
      var reverse = d.toString().split('').reverse().join(''),
      e = reverse.match(/\d{1,3}/g);
      e = e.join('.').split('').reverse().join('');
      var harga = 'Rp. '+e;
    // console.log(harga);
    if($('.harga').val() == harga){
      // console.log('Rp. '+e);
      $('#donasi').removeAttr('disabled', true);
    }
  });


  });
</script>

<script>
  $('document').ready(function(){
   var x = 1;
  $('#btnadd').click(function(e){ //on add input button click
   console.log($('#jumlah').val());
   e.preventDefault();
      // console.log($('#jumlah').val());
      if(x <= $('#jumlah').val()){ //max input box allowed
          x++; //text box increment
          $('#newqurban').append('<div class="col-md-12 mt-2"><div class="card" id="remove'+x+'"><div class="card-body"><h6 class="card-title"><b>Hewan '+x+'</b></h6><hr><div class="form-field"><label>Nama Pequrban</label><input type="text" name="nama_qurban[]" style="background:#dddddd;" class="form-control" aria-describedby="nama_qurban" value=""  required></div></div></div></div>');
        }
      });
  $('#btnmin').click(function(e){
    // if(x > $('#jumlah').val()){
    // for(x<$('#jumlah').val(); x--){
      if(x == 1 ){
        x = 1;
      }else{

        e.preventDefault(); $('#remove'+x+'').parent().remove();  x--;

      }
    // }
  // console.log(x);
});
});
</script>

<script>
// $(document).ready(function(){
//   var current = 1, current_step,next_step,steps;
//   steps = $("fieldset").length;
//   $(".next").click(function(){
//     current_step = $(this).parent();
//     next_step =  $(this).parent().next();
//     next_step.show();
//     current_step.hide();
//   });
//   $(".prev").click(function(){
//     current_step = $(this).parent();
//     next_step =  $(this).parent().prev();
//     next_step.show();
//     current_step.hide();
//   });


// });

// const steps = Array.from(document.querySelectorAll('form .step'));
// const nextBtn = document.querySelectorAll('form .next-btn');
// const prevBtn = document.querySelectorAll('form .prev-btn');
// const form = document.querySelector('form');


// nextBtn.forEach(button=>{
//   button.addEventListener('click', (e) => {
//     changeStep('next');
//   });
// });

// prevBtn.forEach(button=>{
//   button.addEventListener('click', (e) => {
//     changeStep('prev');
//   });
// });

// function changeStep(btn){
//   let index = 0;
//   const active =document.querySelector('form .step.active');
//   index = steps.indexOf(active);
//   steps[index].classList.remove('active');
//   if(btn === 'next'){
//     index ++;
//   }else if (btn === 'prev'){
//     index--;
//   }
//   steps[index].classList.add('active');
//   console.log(index);
// }


$(".step.step-1 .button").click(function() {
  var form = $(".coba");
  form.validate({
    errorClass: "erooor",
    // validClass: "my-valid-class",
    rules: {
      jumlah: {
        required: true,
      },
      
      nama: {
        required: true,
      },
    },
    username:{ 
        required: true,
        minlength: 8,
      // email:{
      //   required: true,
      //   email:true
      // },
      // nomorhp:{
      //   required: true,
      //   minlength: 8,
      // },
      komentar:{
        required: true,
      },
    },
    messages: {
      jumlah: {
        required: "Isi Jumlah Donasi Anda",
      },
      
      nama: { 
        required: "Isi Nama Anda",
      },
      username: { 
        required: "Isi E-Mail Atau Nomor HP Anda",
        nomel: "isi E-mail Atau Nomor HP yang Valid"
      },
      // email: { 
      //   required: "Isi E-mail Anda",
      //   email: "Isi dengan E-mail yang valid"
      // },
      // nomorhp: { 
      //   required: "Isi Nomor Hp Anda",
      //   minlength: "Isi dengan nomor Hp yang valid"
      // },
      komentar: { 
        required: "Isi komentar Anda",
      },
    }
  });

  //disini nom
  if (form.valid() === true) {
    document.getElementById('rupiah').value = document.getElementById('nomrupiah').value;
    $(".step.step-1").removeClass("active");
    $(".step.step-2").addClass("active");

  }
});

$(".prev-btn1").click(function() {
  $(".step.step-2").removeClass("active");
  $(".step.step-1").addClass("active");
});

$(".prev-btn2").click(function() {
  $(".step.step-3").removeClass("active");
  $(".step.step-2").addClass("active");
});

$(".step.step-2 .button").click(function() {

 // configure your validation
 var form = $(".coba");
 form.validate({
  rules: {

  },
  messages: {

  }  
});
 if (form.valid() === true) {
  $(".step.step-2").removeClass("active");
  $(".step.step-3").addClass("active");
}
});

function pilih(){
  var form = $(".coba");
  form.validate({
    rules: {

    },
    messages: {

    }  
  });
  if (form.valid() === true) {
    $(".step.step-2").removeClass("active");
    $(".step.step-3").addClass("active");
  }
}

$(".submit .button").click(function() {

 // configure your validation
 var form = $(".coba");
 form.validate({
  rules: {

  },
  messages: {

  }  
});
 if (form.valid() === true) {
  $("#btnTest").attr("disabled", true);
  $("#btnTest").html("Sedang diproses");
  $(".coba").submit();
}
});

</script>


<script src="{{asset('kuy/editor/rte.js')}}"></script>
<script>
  var editor1cfg = {}
  editor1cfg.toolbar = "basic";
  editor1cfg.toolbarMobile = "basic";
  var editor1 = new RichTextEditor(".editor", editor1cfg);
</script>

<script>
 $(window).scroll(function () {
  var totalHeight = $(window).scrollTop();
  if (totalHeight > 600) {
    $(".don").fadeIn();
    $(".share-don").fadeIn();
  } else {
    $(".don").fadeOut();
    $(".share-don").fadeOut();
  }
});

 $(window).scroll(function () {
  var totalHeight = $(window).scrollTop();
  if (totalHeight < 500) {
    $(".dik").fadeIn();
    $(".share-dik").fadeIn();
  } else {
    $(".dik").fadeOut();
    $(".share-dik").fadeOut();
  }
});
</script>
<script type="text/javascript">

  function reply_click(element)
  {
    document.getElementById('nomrupiah').value = element.getAttribute('data-product-name');
    document.getElementById('rupiah').value = element.getAttribute('data-product-name');
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#myCarousel").on("slide.bs.carousel", function(e) {
      var $e = $(e.relatedTarget);
      var idx = $e.index();
      var itemsPerSlide = 4;
      var totalItems = $(".carousel-item").length;

      if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
          .eq(i)
          .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
          .eq(0)
          .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
  });
</script>

<script type="text/javascript">

  $("#rupiah").keyup(function() {
    var clone = $(this).val();
    var cloned = clone.replace(/[A-Za-z$. ,-]/g, "")
    $("#angka").val(cloned);
  });


  function convertToRupiah(objek) {
   separator = ".";
   a = objek.value;
   b = a.replace(/[^\d]/g,"");
   c = "";
   panjang = b.length; 
   j = 0; 
   for (i = panjang; i > 0; i--) {
     j = j + 1;
     if (((j % 3) == 1) && (j != 1)) {
       c = b.substr(i-1,1) + separator + c;
     } else {
       c = b.substr(i-1,1) + c;
     }
   }
   if (c <= 0){
    objek.value = '';
  }else{
   objek.value = 'Rp. ' + c;
 }

} 

</script>

<script type="text/javascript">
  <!-- Zakat Profesi -->
  function HitungProfesi(){
    interval=setInterval("CalcProf()",10);
  }
  function CalcProf(){
    var pendapatan=document.profesi.pendapatan.value;
    var bonus=document.profesi.bonus.value;
    var a = parseInt(pendapatan.replace(/\D/g, ''));
    var b = (bonus.replace(/\D/g, ''));

    if ( b >= 1) {
      var b = parseInt(b);
    } 
    var c = (a + b)*2.5/100;
    if (!isNaN(c)){

     var d = Math.round(c);
     var reverse = d.toString().split('').reverse().join(''),
     e = reverse.match(/\d{1,3}/g);
     e = e.join('.').split('').reverse().join('');
     document.profesi.jumlah.value= 'Rp. ' + e;

   }
 }
 function stopCalc(){
  clearInterval(interval);
}

<!-- Zakat Dagang -->
function HitungDagang(){
  interval=setInterval("CalcDagang()",10);
}
function CalcDagang(){
  var modal=document.dagang.modal.value;
  var keuntungan=document.dagang.keuntungan.value;
  var kerugian=document.dagang.kerugian.value;
  var hjt=document.dagang.hjt.value;
  var piutang=document.dagang.piutang.value;
  var a = parseInt(modal.replace(/\D/g, ''));
  var b = (keuntungan.replace(/\D/g, ''));
  var c = (kerugian.replace(/\D/g, ''));
  var d = (hjt.replace(/\D/g, ''));
  var e = (piutang.replace(/\D/g, ''));

  if ( b >= 1) {
    var b = parseInt(b);
  } 
  if ( c >= 1) {
    var c = parseInt(c);
  }
  if ( d >= 1) {
    var d = parseInt(d);
  }
  if ( e >= 1) {
    var e = parseInt(e);
  }

  var f = (a + b + c + d + e)*2.5/100;
  if (!isNaN(f)){

   var g = Math.round(f);
   var reverse = g.toString().split('').reverse().join(''),
   h = reverse.match(/\d{1,3}/g);
   h = h.join('.').split('').reverse().join('');
   document.dagang.jumlah.value= 'Rp. ' + h;

 }
}
function stopCalc(){
  clearInterval(interval);
}

<!-- zakat simpanan -->
function HitungSimpanan(){
  interval=setInterval("CalcSimpan()",10);
}
function CalcSimpan(){
  var saldo=document.simpanan.saldo.value;
  var bagi=document.simpanan.bagi.value;
  var a = parseInt(saldo.replace(/\D/g, ''));
  var b = (bagi.replace(/\D/g, ''));

  if ( b >= 1) {
    var b = parseInt(b);
  } 
  var c = (a + b)*2.5/100;
  if (!isNaN(c)){

   var d = Math.round(c);
   var reverse = d.toString().split('').reverse().join(''),
   e = reverse.match(/\d{1,3}/g);
   e = e.join('.').split('').reverse().join('');
   document.simpanan.jumlah.value= 'Rp. ' + e;

 }
}
function stopCalc(){
  clearInterval(interval);
}

<!-- Zakat Emas -->
function HitungEmas(){
  interval=setInterval("CalcEmas()",10);
}
function CalcEmas(){
  var Jemas=document.emas.Jemas.value;
  var a = parseInt(Jemas.replace(/\D/g, ''));
  var b = 975000;

  var c = (a*b)*2.5/100;
  if (!isNaN(c)){	
   var d = Math.round(c);
   var reverse = d.toString().split('').reverse().join(''),
   e = reverse.match(/\d{1,3}/g);
   e = e.join('.').split('').reverse().join('');
   document.emas.jumlah.value= 'Rp. ' + e;

 }
}
function stopCalc(){
  clearInterval(interval);
}
</script>

<script>
	
 var swiper = new Swiper('#anak .swiper-container', {
  slidesPerView: 2.15,
  spaceBetween: 7,
  freeMode: true,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      }
    });	

 var swiper = new Swiper('#cerita .swiper-container', {
  slidesPerView: 2.15,
  spaceBetween: 7,
  freeMode: true,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      }
    });

 var swiper = new Swiper('#artikel .swiper-container', {
  slidesPerView: 1.5,
  spaceBetween: 8,
  freeMode: true,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      }
    });  

 var swiper = new Swiper('#campaign .swiper-container', {
  slidesPerView: 1.5,
  spaceBetween: 7,
  freeMode: true,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      }
    });
    
    var swiper = new Swiper('#campaignnn .swiper-container', {
  slidesPerView: 1.5,
  spaceBetween: 7,
  freeMode: true,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2.25,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 2.25,
          spaceBetween: 15,
        },
      }
    });    

 var swiper = new Swiper('#menu .swiper-container', {
  slidesPerView: 5,
  spaceBetween: 10,
  freeMode: true,
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      }
    });
  </script>

  <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const cancel2Btn = document.querySelector(".cancel2-icon");
    const items = document.querySelector(".nav-items");
    const items2 = document.querySelector(".nav-items2");
    const navbar = document.querySelector("nav");
    // menuBtn.onclick = () => {
    //   items.classList.add("active");
    //   menuBtn.classList.add("hide");
    //   cancelBtn.classList.add("hide");
    //   cancel2Btn.classList.add("show");
    // }
    // cancelBtn.onclick = () => {
    //   items2.classList.remove("active");
    //   searchBtn.classList.remove("hide");
    //   cancelBtn.classList.remove("show");
    // }
    // cancel2Btn.onclick = () => {
    //   items.classList.remove("active");
    //   menuBtn.classList.remove("hide");
    //   cancel2Btn.classList.remove("show");
    // }
    // searchBtn.onclick = () => {
    //   items2.classList.add("active");
    //   searchBtn.classList.add("hide");
    //   cancelBtn.classList.add("show");
    //   cancel2Btn.classList.add("hide");
    // }
    // window.onscroll = ()=>{
    //   this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
    //   this.scrollY > 20 ? items.classList.add("sticky") : items.classList.remove("sticky");
    //   this.scrollY > 20 ? items2.classList.add("sticky") : items2.classList.remove("sticky");
    // }
  </script>
  
  <script type="text/javascript">
    $(document).ready(function(){
     var readMoreHTML = $(".read-more").html();
     var lessText = readMoreHTML.substr(0, 1000);

     if(readMoreHTML.length > 1000){
      $(".read-more").html(lessText + " ....").append("<a href='' class='read-more-link'> Selengkapnya -></a>");
    } else {
      $("read-more").html(readMoreHTML);
    }

    $("body").on("click", ".read-more-link", function(event){
      event.preventDefault();
      $(this).parent(".read-more").html(readMoreHTML).append("<a href='' class='show-less-link'><- Tampilkan Sebagian</a>");
    });

    $("body").on("click", ".show-less-link", function(){
      event.preventDefault();
      $(this).parent(".read-more").html(readMoreHTML.substr(0, 1000) + " ....").append("<a href='' class='read-more-link'> Selengkapnya -></a>");
    });
  });

    var loadFile = function(event) {
     var output = document.getElementById('output');
     output.src = URL.createObjectURL(event.target.files[0]);
   };

   $("#nospace").on({
     keydown: function(e) {
       if (e.which === 32)
        return false;
    },
    keyup: function(){
    	this.value = this.value.toLowerCase();
    },
    change: function() {
      this.value = this.value.replace(/\s/g, "");
    }
  });

   var uploadField = document.getElementById("limit1mb");
   uploadField.onchange = function() {
            if(this.files[0].size > 1000000){ // 1000000 untuk 1 MB.
              alert("Maaf, Ukuran Gambar Terlalu Besar. Maksimal Upload 1 MB");
              this.value = "";
              var output = document.getElementById('output');
              output.src = "";
            } else {
             var output = document.getElementById('output');
             output.src = URL.createObjectURL(event.target.files[0]);
           };
         };
       </script>


<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
  // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{$snap_token}');
  // customer will be redirected after completing payment pop-up
      });
</script> 