@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
     {{$title}}
    </h1>
    
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
          </div>
          <!-- /.box-header -->
          <div class="table-responsive">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Anak</th>
                <th>Bulan</th>
                <th>Total</th>
                <th>Nama </th>
                <th>Email</th>
                <th>Nomer Hp</th>
                <th hidden>Kode Unik</th>
                <th>Bank</th>
                <th hidden>id</th>
                <th hidden>url</th>
                <th>Waktu</th>
                <th>pesan</th>
                <th>Status</th>
                <th>Kelola</th>
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($list_donatur as $donatur)
             <tr>
             <td>{{$no++}}</td>
             <td>{{$donatur->nama_anak}}</td>
             <td>{{$donatur->bulan}}</td>
             <td>Rp. {{number_format($donatur->total+$donatur->kode,"0",",",".")}}</td>
             <td>{{$donatur->name}}</td>
             <td>{{$donatur->email}}</td>
             <td>{{$donatur->nohp}}</td>
             <td hidden>{{$donatur->kode}}</td>
             <td>{{Str::limit($donatur->bank,10)}}</td>
             <td hidden>{{$donatur->id}}</td>
             <td hidden>{{Str::limit($donatur->url,10)}}</td>
             
             <td>
              {{$donatur->created_at}}
             </td>
             <td>{{$donatur->pesan}}</td>
             <td><label class="label {{($donatur->status == 1)? 'label-success':'label-danger'}}">{{($donatur->status == 1)? 'aktif':'Pending'}}</label></td>
             <td>
               
              <div class="btn-group">
                @if ($donatur->status == 1)
                <a class="btn btn-danger" href="{{ url('/status_anakasuh/'.$donatur->id_anakasuh) }}">Pending</a>
                @else
                <a class="btn btn-primary" href="{{ url('/status_anakasuh/'.$donatur->id_anakasuh) }}">Acc</a>
                @endif
              
              </div>
            <form method="post" action="{{url('/datadonaturanak/'.$donatur->id_anakasuh)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             </tr>
            
                 
             @endforeach
              </tbody>
              <tfoot>
            
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection