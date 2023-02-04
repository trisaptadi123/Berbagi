@extends('artikel.berbagi.index')
@section('content')
<style type="text/css">
  .box-1 {
 padding: 20px;
 color: white;
 margin: 0 auto; /* code ini akan membuat div berada di tengah atas */
}

</style>
<style type="text/css">
      .box-hyu {
         background : #f2f2f2;
         padding: 10px;
         color: white;
         margin: 0 auto; /* code ini akan membuat div berada di tengah atas */
    }
    .btn-hyuwan{
        background : #1f5daa;
        color : white;
        padding : 10px 15px 10px 15px;
        border-radius : 20px;
        float:right;
    }
    .btn-hyuwan:hover{
        background : #03cffc;
        color : white;
        padding : 10px 20px 10px 20px;
        border-radius : 20px;
        float:right;
    }
    
    </style>
<body id="default_theme" class="it_service" style="background: #f2f2f2">
    
<div class="section" style=" margin-bottom:10px;">
    <div class="container" style="max-width: 510px; background: #fff; padding-top:10px;">
    <div class="row">
     <div class="center">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-right" style="padding-top:20px;">
            
                <h4 style="margin-left:15px; font-size:22px; float:left; margin-top:10px;">Berbagi Info</h4>
                @if(Auth::check())
                <a href="{{url('buat-info/'.Auth::user()->id)}}" class="btn-hyuwan" ><i class="fa fa-plus"></i> Buat Info</a>
                @endif
        </div>
      </div>
    </div>

    
<div id="post_data">

</div>
<!-- <div class="center" style=" z-index:0;background:#fff;">
            {{ $list_artikel->links() }}
        </div> -->


        <script>
        $(document).ready(function(){

         var _token = $('input[name="_token"]').val();

         load_data_artikel('', _token);

         function load_data_artikel(id="", _token)
         {
          $.ajax({
           url:"http://127.0.0.1:8000/berbagiinfo",
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
          load_data_artikel(id, _token);
        });

      });
    </script>
</div>

</div>





<div class="section" style="padding:10px 0 10px 0;">
    <div class="container" style="max-width: 510px; background:#fff;">
<div class="row">
 <div class="center">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all box-1" style="margin-bottom:0px;">
        <div class="full">
      <div class="row box-hyu" style="margin-bottom: 10px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all box-1" >
          <div style="background:#1f5daa; left:12.5px; color: #fff;padding:10px; width:fit-content;display: flex;align-items: center; border-top-left-radius:10px; border-bottom-right-radius:10px; margin-bottom : 0px;">
                Kategori Berbagi Info
          </div>
          <div class="row" style="width :100%; color : grey">
                @foreach ($kategoriall as $kategori)
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 " style="margin-top:10px; font-size:12px;">
            <?php $nama_kate = strtoupper($kategori->name); ?>
            <a href="{{url('berbagiinfo')}}/{{$kategori->name}}">{{$nama_kate}}</a>
          </div>
            @endforeach
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
</div>
</div>
  </body>
@endsection



