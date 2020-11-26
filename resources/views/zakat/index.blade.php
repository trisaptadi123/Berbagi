@extends('admin')
@section('konten')
    


<section class="content-header">
   <div>
    <ol class="breadcrumb">
      <a href="{{url('zakat/create')}}" class="btn btn-primary btn-sm" >tambah</a>
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
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>jumlah</th>
                <th>nama</th>
                <th>Jenis Zakat</th>
                <th>email</th>
                <th>nomorhp</th>
                <th>Bank</th>
                <th>Kode Unik</th>
                <th>Waktu</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($zakat as $zakat)
             <tr>
              <td>{{($zakat->id_zakat)}}</td>
              <td>Rp.<?php echo number_format($zakat->jumlah+$zakat->kode_unik,0,",",".");?></td>
                <td>{{$zakat->nama}}</td>
                <td>{{$zakat->jenis}}</td>
                <td>{{$zakat->email}}</td>
                <td>{{$zakat->nomorhp}}</td>
                <td>{{$zakat->bank}}</td>
                <td>{{$zakat->kode_unik}}</td>
                <td>{{$zakat->created_at}}</td>
             <td>
              <form method="post" action="{{url('/zakatdel/'.$zakat->id_zakat)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

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
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection
