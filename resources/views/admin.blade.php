<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">  
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @yield('css')
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('gaya/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('gaya/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('gaya/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('gaya/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('gaya/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('gaya/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('gaya/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('gaya/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('gaya/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('gaya/bower_components/select2/dist/css/select2.min.css')}}">
  
  <!-- bootstrap wysihtml5 - text editor -->
  {{-- <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}"> --}}
 
  <link rel="stylesheet" href="{{asset('gaya/editor/suneditor.min.css')}}">

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  
  <!--<meta name="_token" content="{{ csrf_token() }}">-->
  
  
  
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
   <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
  @include('header')
               
  </header>

  {{-- slide bar menu --}}
  <aside class="main-sidebar">
    @include('sidebar')
  </aside>

 {{-- Halaman Konten --}}
  <div class="content-wrapper">
    @yield('konten')
  </div>
  {{-- Halaman untuk copyright --}}
  <footer class="main-footer fixed">
  @include('footer')
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!--suneditor-->
<script src="{{asset('gaya/editor/codemirror.min.js')}}"></script>
<script src="{{asset('gaya/editor/common.js')}}"></script>
<script src="{{asset('gaya/editor/customtool.js')}}"></script>
<script src="{{asset('gaya/editor/katex.min.js')}}"></script>
<script src="{{asset('gaya/editor/suneditor.min.js')}}"></script>
<!-- jQuery 3 -->
<script src="{{asset('gaya/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('gaya/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('gaya/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('gaya/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('gaya/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('gaya/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('gaya/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('gaya/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('gaya/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('gaya/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('gaya/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script> 
<!-- datepicker -->
<script src="{{asset('gaya/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
{{-- <script src="{{asset('gaya/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> --}}
{{-- <script src="{{asset('gaya/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script> --}}
{{-- Data table --}}
<script src="{{asset('gaya/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('gaya/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('gaya/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('gaya/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('gaya/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('gaya/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('gaya/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('gaya/dist/js/demo.js')}}"></script>
<script>$('.select2').select2();</script>

<script>
  $(function () {
    $('#example1').DataTable()
    // $('#example3').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
@yield('js')
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

<!--<script>
      $(document).ready(function() {
          $('.summernote').summernote({
        placeholder: 'Masukan teks disini',
        tabsize: 2,
        height: 320,
      
      
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
            if(this.files[0].size > 1000000){ 
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
-->
<script>
  $('#summernotes').summernote({
    focus: true, 
    placeholder: 'Masukan teks disini',
    tabsize: 2,
    height: 320,
    codemirror: { // codemirror options
      theme: 'monokai'
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


</body>
</html>
