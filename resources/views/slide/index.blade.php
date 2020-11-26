@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
     {{$title}}
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('slide/create')}}" class="btn btn-primary btn-sm" >Slide Baru</a>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Slide</h3>
          </div>
          <!-- /.box-header -->
          <div class="table-responsive">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Gambar</th>
                 <th>Title</th>
                  <th>Subtitle</th>
                   <th>Link</th>
                     <th>Tombol Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($slider as $slide)
             <tr>
                <td>{{$slide->id}}</td>
                <td>{{$slide->gambar_slide}}</td>
                  <td>{{$slide->title}}</td>
                    <td>{{$slide->subtitle}}</td>
                      <td>{{$slide->link}}</td>
                       <td>{{$slide->button}}</td>
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning" href="{{url('/slide/'.$slide->id.'/edit') }}">Edit</a>
              </div>
              <form method="post" action="{{url('/slide/'.$slide->id)}}">
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
