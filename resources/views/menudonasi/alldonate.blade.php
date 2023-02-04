<div class="section" style="padding:10px 0 10px 0; ">
  <div class="container d-flex justify-content-center" style="width: 510px; background:#fff; padding: 30px ">
    <div class="row">
      <div class="col-md-12 col-sm-6">
         <form action="{{url('filterah')}}" method="GET">
        @csrf
          <div class="row">
            <div class="col-md-4 ">
              <div class="form-field">
                <label>Kategori</label>

                <select id="id_category" class="from-control" name="id_category" id="filter-aktif">
                 <option selected="selected" value="" >- Pilih -</option>
                 @foreach($kategori as $data)
                 <option value="{{$data->id}}">{{$data->name}}</option>
                 @endforeach
               </select>
             </div>
           </div>

           <div class="col-md-4 ">
            <div class="form-field">
             <label>Wilayah</label>

             <select id="wilayah" class="from-control" name="wilayah">
               <option selected="selected" value="" >- Pilih -</option>
               @foreach($wilayah as $datas)
               <option value="{{$datas->nama_kota}}">{{$datas->nama_kota}}</option>
               @endforeach
             </select>
           </div>
         </div>

         <div class="col-md-4 mt-4">
          <button type="submit" class="hyuwan" style="border-radius:5px; max-width: ">Filter</button>
                <!-- <div class="form-field">
                </div> -->
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section" style="background: #fff; display: flex;justify-content: center;" >
    <div style="margin-top: 18px">
      <div class="row">

        <!--@if(Auth::check())-->
        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
          <!--  <a href="{{url('donasisaya')}}" type="submit" class="a_list btn main_bt col-md-12" style="border-radius:5px; margin-bottom:30px;">-->
            <!--    RIWAYAT DONASI SAYA-->
            <!--  </a>-->
            <!--</div>-->
            <!--@else-->
            <!--@endif-->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
              <div class="row">
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
           url:"http://127.0.0.1:8000/semuadonasi",
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