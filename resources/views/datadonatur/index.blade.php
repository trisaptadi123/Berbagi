@extends('admin')
@section('konten')
    
<style>
#wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
#wrapper2{height: 80%; }
#div2 {width:100%; height: 95%;
overflow: auto;}
</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .input-icons i {
    position: absolute;
  }

  .input-icons {
    margin-left: 20px;
    width: 100%;
    height: 30px;
    margin-bottom: 10px;
  }
  
  .input-select {
    margin-left: 20px;
    width: 100%;
    margin-bottom: 10px;
  }

  .icon {
    padding: 5px;
    min-width: 40px;
  }
  .input-field {
    width: 100%;
    text-align: center;
  }

</style>
<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale: {
        format: 'YYYY-MM-DD hh:mmA',
        cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD hh:mmA') + ' - ' + picker.endDate.format('YYYY-MM-DD hh:mmA'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
<script>
  $('document').ready(function (){
      var table = $('#n').DataTable({})
       $("#filter").on('click', function(){
         var tgl = $(".tgl").val();
          var bank = $(".bank").val();
          var campaign = $(".campaign").val();
          $.ajax({
              type: 'POST',
              url:'/../filter_tgl',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
              date:tgl,
              bank:bank,
              campaign:campaign,
            },
            success:function(response) {

              // console.log(response);
              table.destroy();
              var isi = ' ';
              var status = ' ';
              var btn = ' ';
              for(var i = 0; i <  Object.keys(response).length; i++){
                  var num = i + 1;
              var ped = response[i]['status'];
                var k = parseInt(response[i]['jumlah']) + parseInt(response[i]['kode']);
                // console.log(k);
                var	reverse = k.toString().split('').reverse().join(''),
                  ribuan 	= reverse.match(/\d{1,3}/g);
                  ribuan	= ribuan.join('.').split('').reverse().join('');
                var str = response[i]['namakonten'];
                // console.log(response[i]['id_donatur']);
                if(ped == 1){
                  status = `<label class="label label-success">aktif</label>`;
                  btn = ` <a class="btn btn-danger" href="{!! url('/status').'/'."`+response[i]['id_donatur']+`" !!}">Pending</a>`;
                }else{
                  status = `<label class="label label-danger">pending</label>`;
                  btn = ` <a class="btn btn-primary" href="{!! url('/status').'/'."`+response[i]['id_donatur']+`" !!}">Acc</a>`;
                }
                isi += `<tr>
             <td>`+num+`</td>
             <td>Rp. `+ribuan+`</td>
             <td>`+str.substr(0,20)+`</td>
             <td>`+response[i]['nama']+`</td>
             <td>`+response[i]['email']+`</td>
             <td>`+response[i]['nomorhp']+`</td>
             <td hidden>`+response[i]['kode']+`</td>
             <td>`+response[i]['bank'].substr(0,10)+`</td>
             <td hidden>`+response[i]['id_konten']+`</td>
             <td hidden>`+response[i]['url'].substr(0,10)+`</td>
             
             <td>
              `+response[i]['created_at']+`
             </td>
             <td>`+response[i]['komentar']+`</td>
             <td>`+status+`</td>
             <td>
               
              <div class="btn-group">
                `+btn+`
              </div>
            <form method="post" action="{!! url('/datadonatur/'."`+response[i]['id_donatur']+`") !!}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             </tr>
              
            `;
              // console.log(ped);
              }
              
              $('#pil').empty().append(isi);
              table = $('#n').DataTable({});
              
              // document.getElementById("total_items").value=response;
            // $('#example1').DataTable();
            }

          });
      });
      $("#reset").on('click', function(){
          window.location.reload();
      });
  });
</script>
<style>
    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
        #web{
        display: block
        }
        .hyu {
            margin-left : 0px;
        }
    }
    @media only screen and (min-width : 321px){
        #web{
        display: block
        }
        .hyu {
            margin-left : 0px;
        }
    }
    @media only screen and (max-width : 320px) {
        #web{
        display: block
        }
        .hyu {
            margin-left : 0px;
        }
    }
    @media only screen and (min-width : 1224px){
        #web{
        display: block
        }
        .hyu {
            margin-left : 0px;
        }
    }
    @media only screen and (min-width : 1824px){
        #web{
        display: block
        }
        .hyu {
            margin-left : 0px;
        }
    }
</style>
<section class="content-header">
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Transaksi</h3>
          </div>
          
          <div class="row" id="web">
            <!--<form method="post" action="{{ url('datadonatur') }}" >-->
            <div class="col-lg-8">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                          <div class="input-icons">
                              <i class="fa fa-calendar icon"></i>
                              <input class="input-field tgl" type="text" name="datefilter">
                          </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 hyu">
                          <div class="input-icons">
                            <select class="form-control select2 bank" name="bank">
                              <option selected="selected" value="">Pilih Bank</option>
                              @foreach($bank as $banks)
                              <option value="{{$banks->nama}}" >{{$banks->nama}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 hyu" >
                          <div class="input-icons">
                            <select class="form-control select2 campaign" name="campaign">
                              <option selected="selected" value="">Pilih Campaign</option>
                              @foreach($posts as $post)
                              <option value="{{$post->title}}" >{{$post->title}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="input-icons">
                            <div class="col-lg-6">
                              <button class="btn btn-danger btn-sm col-md-12" id="reset">Reset</button>
                            </div>
                            <div class="col-lg-6" >
                              <button class="btn btn-primary btn-sm col-md-12" id="filter" >Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                      <form action="{{url('../import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                                <div class="input-icons">
                                    <input type="file" class="form-control" name="file">
                                    <button type="submit" class="btn btn-primary btn-sm col-md-12" style="margin-top:15px;">Submit</button>
                                    <!--<button type="submit" class="form-control">submit</button>-->
                                </div>
                           </form>
            </div>
            
            <!--</form>-->
          </div>
          <!--<form action="{{url('/testing')}}" method="POST" enctype="multipart/form-data">
                        @csrf
          <div class="col-lg-8">
              <div class="row">
                <div class="col-lg-6 hyu">
                    <div class="input-icons">
                        <input type="file" class="form-control" name="file">
                        <button type="submit" class="form-control">submit</button>
                    </div>
                </div>
              </div>
           </div>
           </form>-->
           
          <hr style="margin-top:30px; margin-bottom:20px;border:1px solid gray">
          <!-- /.box-header -->
          <div class="table-responsive">
          <div id="wrapper2">
            <div id="div2">
            <table id="n" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Jumlah Donasi</th>
                <th>Judul Campaign</th>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>Nomer Hp</th>
                <th hidden>Kode Unik</th>
                <th>Bank</th>
                <th hidden>id</th>
                 <th hidden>url</th>
                <th>Waktu</th>
                <th>Komentar</th>
                <th>Status</th>
                <th>Kelola</th>
                
              </tr>
              </thead>
              <tbody id="pil">
                @php $no = 1; @endphp
             @foreach ($list_donatur as $donatur)
             <tr>
             <td>{{$no++}}</td>
             <td>Rp. {{number_format($donatur->jumlah+$donatur->kode,"0",",",".")}}</td>
             <td>{{Str::limit($donatur->namakonten,20)}}</td>
             <td>{{$donatur->nama}}</td>
             <td>{{$donatur->email}}</td>
             <td>{{$donatur->nomorhp}}</td>
             <td hidden>{{$donatur->kode}}</td>
             <td>{{Str::limit($donatur->bank,10)}}</td>
             <td hidden>{{$donatur->id_konten}}</td>
             <td hidden>{{Str::limit($donatur->url,10)}}</td>
             
             <td>
              {{$donatur->created_at->isoFormat('dddd, D MMMM Y H:mm')}}
             </td>
             <td>{{$donatur->komentar}}</td>
             <td><label class="label {{($donatur->status == 1)? 'label-success':'label-danger'}}">{{($donatur->status == 1)? 'aktif':'Pending'}}</label></td>
             <td>
               
              <div class="btn-group">
                @if ($donatur->status == 1)
                <a class="btn btn-danger" href="{{ url('/status/'.$donatur->id_donatur) }}">Pending</a>
                @else
                <a class="btn btn-primary" href="{{ url('/status/'.$donatur->id_donatur) }}">Acc</a>
                @endif
                <a class="btn btn-warning btn-sm" href="{{ url('/datadonatur/'.$donatur->id_donatur.'/edit') }}">Edit</a>
              </div>
            <form method="post" action="{{url('/datadonatur/'.$donatur->id_donatur)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             </tr>
            
                 
             @endforeach
              </tbody>
              <tfoot>
            
              </tfoot>
            </table>
            </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection
  <script>
    var wrapper1 = document.getElementById('wrapper1');
    var wrapper2 = document.getElementById('wrapper2');
    wrapper1.onscroll = function() {
      wrapper2.scrollLeft = wrapper1.scrollLeft;
    };
    wrapper2.onscroll = function() {
      wrapper1.scrollLeft = wrapper2.scrollLeft;
    };
    </script>