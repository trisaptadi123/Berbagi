@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
     {{$title}}
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('post/create')}}" class="btn btn-primary btn-sm" >Tambah Konten</a>
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
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Campaigner</th>
                <th>Target</th>
                <th>Terkumpul</th>
                <th>Batas Hari</th>
                <th> Artikel</th>
                <th> Kelola</th>
                <th>Waktu</th>
                <th>Donatur</th>
                
              </tr>
              </thead>
              <tbody>
             @foreach ($list_post as $post)
             <tr>
              <td>{{$post->id_konten}}</td>
             <td>{{$post->title}}</td>
             <td>{{$post->deskripsi}}</td>
             <td>{{$post->gambar}}</td>
             <td> {{$post->kategori}}</td>
             <td> {{$post->id_category}}</td>
             <td> {{$post->terkumpul}}</td>
             <td>  {{($post->end_date)}} <?php
              $date1 = new DateTime($post->created_at);
              $date2 = new DateTime($post->end_date);
              echo $date1->diff($date2)->days." hari <br \>";
              ?></td>
             <td >{{Str::limit($post->artikel,120)}}</td>
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-success btn-sm" href="{{ url('/post/'.$post->id_konten) }}">View</a>
                <a class="btn btn-warning btn-sm" href="{{ url('/post/'.$post->id_konten.'/edit') }}">Edit</a>
              </div>
              <form method="post" action="{{ url('/post/'.$post->id_konten) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

              </form>
               
             </td>
             
             <td>
              {{$post->updated_at}}
             </td>
             <td>
              {{$post->updated_at}}
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

  {{-- <style>
    .max.title {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    </style> --}}