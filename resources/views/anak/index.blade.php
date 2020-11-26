@extends('admin')
@section('konten')
    


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
                
                
              </tr>
              </thead>
              <tbody>
             @foreach ($anak as $anak)
             <tr>
              <td>{{$anak->id}}</td>
             <td>{{$anak->nama}}</td>
             <td>{{$anak->foto_anak}}</td>
             <td>{{$anak->kriteria}}</td>
             <td>{{$anak->jk}}</td>
             <td>{{$anak->hobi}}</td>
             <td>{{$anak->ttl}}</td>
             <td>{{$anak->jp}}</td>
             <td>{{$anak->kls}}</td>
             <td>{{$anak->sekolah}}</td>
            
           
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="#">Edit</a>
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
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection