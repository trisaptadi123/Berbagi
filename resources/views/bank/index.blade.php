@extends('admin')
@section('konten')
    
<style>
#wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
#wrapper2{height: 80%; }
#div2 {width:100%; height: 95%;
overflow: auto;}
</style>

<section class="content-header">
    <h1>
     {{$title}}
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('bank/create')}}" class="btn btn-primary btn-sm" >Tambah Pembayaran</a>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <?php if ($list_bank->count() >= 5) { ?>
                <div id="wrapper2">
                <div id="div2">
            <?php }else{ ?>
            <?php } ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Logo</th>
                <th>Bank</th>
                <th>Norek</th>
                <th>Langkah Pembayaran</th>
                <!--<th>logo</th>-->
                 <th>Url</th>
                <th> Kelola</th>
                  
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
             @foreach ($list_bank as $bank)
             <tr>
             <td>{{$bank->id}}</td>
             <td>
                @if($bank->logo == null)
                <img src="{{ asset('gambarUpload/noimg.jpg') }}" width="80">
                @else
                <img src="{{ asset('gambarUpload/'.$bank->logo) }}" width="80">
                @endif
              </td>
             <td>{{$bank->nama}}</td>
             <td>
                @if($bank->norek == null)
                <i style="color: grey">Tidak ada</i>
                @else
                {{$bank->norek}}
                @endif
             </td>
             <!--<td>{{$bank->logo}}</td>-->
             <td>
                @if($bank->deskripsi == null)
                <i style="color: grey">Tidak ada</i>
                @else
                {!!$bank->deskripsi!!}
                @endif
              </td>
             <td>{{$bank->url}}</td>
           
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="{{ url('/bank/'.$bank->id.'/edit') }}">Edit</a>
              </div>
            <form method="post" action="{{url('/bank/'.$bank->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

              </form>
               
             </td>
             
             <td>
              {{$bank->updated_at}}
             </td>
             </tr>
            
                 
             @endforeach
              </tbody>
              <tfoot>
            
              </tfoot>
            </table>
            <?php if ($list_bank->count() >= 5) { ?>
                </div>
                </div>
            <?php }else{ ?>
            <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection
  <?php if ($list_bank->count() >= 5) { ?>
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
  <?php }else{ ?>
  <?php } ?>