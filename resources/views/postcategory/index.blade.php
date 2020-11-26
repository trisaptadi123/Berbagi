@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
     {{$title}}
    
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('postcategory/create')}}" class="btn btn-primary btn-sm" >Tambah Konten</a>
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
                <th>Kategori</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
             @foreach ($list_category as $category)
             <tr>
              <td>{{$category->id}}</td>
             <td>{{$category->name}}</td>
           
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="{{ url('/postcategory/'.$category->id.'/edit') }}">Edit</a>
              </div>
            <form method="post" action="{{url('/postcategory/'.$category->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

              </form>
               
             </td>
             
             <td>
              {{$category->updated_at}}
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