@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
     {{$title}}
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('datadonatur/create')}}" class="btn btn-primary btn-sm" >Tambah Konten</a>
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
                <th>Jumlah Donasi</th>
                <th>Konten ID</th>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>Nomer Hp</th>
                <th>Komentar</th>
                <th>Kode Unik</th>
                <th>Bank</th>
                <th>id</th>
                <th>status</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
             @foreach ($list_donatur as $donatur)
             <tr>
             <td>{{number_format($donatur->jumlah+$donatur->kode)}}</td>
             <td>{{$donatur->namakonten}}</td>
             <td>{{$donatur->nama}}</td>
             <td>{{$donatur->email}}</td>
             <td>{{$donatur->nomorhp}}</td>
             <td>{{$donatur->komentar}}</td>
             <td>{{$donatur->kode}}</td>
             <td>{{$donatur->bank}}</td>
             <td>{{$donatur->id_konten}}</td>
             <td><label class="label {{($donatur->status == 1)? 'label-success':'label-danger'}}">{{($donatur->status == 1)? 'aktif':'Pending'}}</label></td>
             <td>
               
              <div class="btn-group">
                @if ($donatur->status == 1)
                <a class="btn btn-danger" href="{{ url('/status/'.$donatur->id_donatur) }}">Pending</a>
                @else
                <a class="btn btn-primary" href="{{ url('/status/'.$donatur->id_donatur) }}">Acc</a>
                @endif
              
              </div>
            <form method="post" action="{{url('/datadonatur/'.$donatur->id_donatur)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-warning btn-sm">Delete</button>

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