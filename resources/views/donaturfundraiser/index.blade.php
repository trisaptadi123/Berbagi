@extends('admin')
@section('konten')
    


<section class="content-header">
    <ol class="breadcrumb">
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Post List</h3>
          </div>
          <!-- /.box-header -->
          <div class="table-responsive">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Jumlah Donasi</th>
                <th>Konten ID</th>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>Nomer Hp</th>
                <th>Komentar</th>
                <th>Kode Unik</th>
                <th>Bank</th>
                <th hidden>id</th>
                <th hidden>id_users</th>
                <th hidden>id_fundraiser</th>
                <th>status</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($donatefdn as $donatur)
             <tr>
             <td>{{$no++}}</td>
             @if($donatur->id_konten != null)
             <td>{{number_format($donatur->jumlah+$donatur->kode)}}</td>
             @else
             <td>{{number_format($donatur->total+$donatur->kode)}}</td>
             @endif
             <td>{{$donatur->namakonten}}</td>
             <td>{{$donatur->nama}}</td>
             <td>{{$donatur->email}}</td>
             <td>{{$donatur->nomorhp}}</td>
             <td>{{$donatur->komentar}}</td>
             <td>{{$donatur->kode}}</td>
             <td>{{$donatur->bank}}</td>
             <td hidden>{{$donatur->id_konten}}</td>
             <td hidden>{{$donatur->id_users}}</td>
             <td hidden>{{$donatur->id_fundraise}}</td>
             <td><label class="label {{($donatur->status == 1)? 'label-success':'label-danger'}}">{{($donatur->status == 1)? 'aktif':'Pending'}}</label></td>
             <td>
               
              <div class="btn-group">
                @if ($donatur->status == 1)
                <a class="btn btn-danger" href="{{ url('/statusfdn/'.$donatur->id_donaturfdn) }}">Pending</a>
                @else
                <a class="btn btn-primary" href="{{ url('/statusfdn/'.$donatur->id_donaturfdn) }}">Acc</a>
                @endif
              
              </div>
            <form method="post" action="{{url('/donatefundraiser/'.$donatur->id_donaturfdn)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             
             <td>
              {{$donatur->updated_at}}
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