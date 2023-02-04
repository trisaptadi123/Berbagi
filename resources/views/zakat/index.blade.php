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
   <div>
    <ol class="breadcrumb">
      </ol>
   </div>
     
    
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Donatur Zakat</h3>
          </div>
          <!-- /.box-header -->
          <div class="table-responsive">
             <?php if ($zakat->count() >= 5) { ?>
                <div id="wrapper2">
                <div id="div2">
            <?php }else{ ?>
            <?php } ?>
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>jumlah</th>
                <th>nama</th>
                <th>Jenis Zakat</th>
                <th>email</th>
                <th>nomorhp</th>
                <th>Bank</th>
                <th>Kode Unik</th>
                <th hidden>Url</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                
  	          @php $no = 1; @endphp
                @foreach ($zakat as $zakat)
             <tr>
              <td>{{ $no++ }}</td>
              <td>Rp.<?php echo number_format($zakat->jumlah+$zakat->kode_unik,0,",",".");?></td>
                <td>{{$zakat->nama}}</td>
                <td>{{$zakat->jenis}}</td>
                <td>{{$zakat->email}}</td>
                <td>{{$zakat->nomorhp}}</td>
                <td>{{$zakat->bank}}</td>
                <td>{{$zakat->kode_unik}}</td>
                  <td hidden>{{$zakat->url}}</td>
                <td>{{$zakat->created_at}}</td>
                <td>
                  @if ($zakat->status == 1)
                  <label class="label label-success">Aktif</label>
                  @else
                  <label class="label label-danger">Pending</label>
                  @endif
                </td>
             <td>
              <div class="btn-group">
                <a class="btn btn-success btn-sm" href="{{ url('/zakatshow/'.$zakat->id_zakat) }}">View</a>
              </div>
              <div class="btn-group">
                  @if ($zakat->status == 1)
                  <a class="btn btn-warning" href="{{ url('/status_zakat/'.$zakat->id_zakat) }}">Pending</a>
                  @else
                  <a class="btn btn-primary" href="{{ url('/status_zakat/'.$zakat->id_zakat) }}">ACC</a>
                  @endif
                  <!-- <a class="btn btn-primary" href="">Acc</a> -->
                </div>
              <form method="post" action="{{url('/zakatdel/'.$zakat->id_zakat)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             
             <td>
            
             </td>
             </tr>
            
                 
         
              </tbody>
              @endforeach
              <tfoot>
            
              </tfoot>
            </table>
            <?php if ($zakat->count() >= 5) { ?>
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
  <?php if ($zakat->count() >= 5) { ?>
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
  
