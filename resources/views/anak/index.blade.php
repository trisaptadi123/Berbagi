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
    <a href="{{url('anak/create')}}" class="btn btn-primary btn-sm" >Tambah Data Anak</a>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
    
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php if ($anak->count() >= 5) { ?>
                <div id="wrapper2">
                <div id="div2">
            <?php }else{ ?>
            <?php } ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Kriteria</th>
                <th>Jenis Kelamin</th>
                <th>Hobi</th>
                <th>TTL</th>
                <th>Pendidikan</th>
                <th>Kelas</th>
                <th>Sekolah</th>
                <th>Shelter</th>
                <th>Cabang</th>
                <th>Orang Tua Asuh</th>
                <th>tgl input</th>
                <th>tgl update</th>
                <th>Kelola</th>
                
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($anak as $anak)
             <tr>
              <td>{{$no++}}</td>
             <td>{{$anak->nama}}</td>
             <td>{{$anak->gambar_anak}}</td>
             <td>{{$anak->kriteria}}</td>
             <td>{{$anak->jk}}</td>
             <td>{{$anak->hobi}}</td>
             <td>{{$anak->ttl}}</td>
             <td>{{$anak->jp}}</td>
             <td>{{$anak->kls}}</td>
             <td>{{$anak->sekolah}}</td>
             <td>{{$anak->shelter}}</td>
             <td>{{$anak->cabang}}</td>
             <td>{{$anak->orangtua_asuh}}</td>
            <td>{{date('Y-m-d H:i',strtotime($anak->created_at))}}</td>
            <td>{{date('Y-m-d H:i',strtotime($anak->created_at))}}</td>
           
            
             <td>
                <div class="btn-group">
                @if ($anak->status == 1)
                <a class="btn btn-danger" href="{{ url('anak/statusanak/'.$anak->id) }}">Pending</a>
                @else
                <a class="btn btn-primary" href="{{ url('anak/statusanak/'.$anak->id) }}">Acc</a>
                @endif
              
              </div>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="{{ url('/anak/'.$anak->id.'/edit') }}">Edit</a>
              </div>
            <form method="post" action="{{url('/anak/'.$anak->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

              </form>
               
             </td>
            
             </tr>
            
                 
             @endforeach
              </tbody>
              <tfoot>
            
              </tfoot>
            </table>
            <?php if ($anak->count() >= 5) { ?>
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
  <?php if ($anak->count() >= 5) { ?>
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
  
  
  
  