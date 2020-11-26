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
        document.getElementById('rupiah').value = element.getAttribute('data-product-name');
    }    


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
      slidesPerView: 2.25,
      spaceBetween: 5,
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
      slidesPerView: 2.25,
      spaceBetween: 5,
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
    
 var swiper = new Swiper('#campaign .swiper-container', {
      slidesPerView: 1.5,
      spaceBetween: 5,
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
</script>

<script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const cancel2Btn = document.querySelector(".cancel2-icon");
    const items = document.querySelector(".nav-items");
    const items2 = document.querySelector(".nav-items2");
    const navbar = document.querySelector("nav");
    menuBtn.onclick = () => {
      items.classList.add("active");
      menuBtn.classList.add("hide");
      cancelBtn.classList.add("hide");
      cancel2Btn.classList.add("show");
    }
    cancelBtn.onclick = () => {
      items2.classList.remove("active");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
    }
    cancel2Btn.onclick = () => {
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      cancel2Btn.classList.remove("show");
    }
    searchBtn.onclick = () => {
      items2.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
      cancel2Btn.classList.add("hide");
    }
    window.onscroll = ()=>{
      this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
      this.scrollY > 20 ? items.classList.add("sticky") : items.classList.remove("sticky");
      this.scrollY > 20 ? items2.classList.add("sticky") : items2.classList.remove("sticky");
    }
  </script>