@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
    </h1>
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
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Jumlah Donasi</th>
                <th>Nama Donatur</th>
                <th>Email</th>
                <th>Nomer Hp</th>
                <th>Komentar</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
             {{-- @foreach ($list_post as $post) --}}
             <tr>
             {{-- <td>{{$post->title}}</td>
             <td>{{$post->deskripsi}}</td>
             <td>{{$post->gambar}}</td>
             <td> {{$post->kategori}}</td>
             <td> {{$post->id_category}}</td>
             <td>{{$post->artikel}}</td> --}}
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-success btn-sm" >View</a>
                <a class="btn btn-warning btn-sm" >Edit</a>
              </div>
           
                <button type="submit" class="btn btn-danger">Delete</button>

              </form>
               
             </td>
             
             <td>
            
             </td>
             </tr>
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