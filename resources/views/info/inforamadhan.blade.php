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
                <th>ID Campaign</th>
                <th>Info Terbaru</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
             @foreach ($info as $inf)
             <tr>
              <td>{{$inf->id_qurban}}</td>
             <td>{{Str::limit($inf->artikel,30)}}</td>
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="{{ url('/info/'.$inf->id.'/edit') }}">Edit</a>
              </div>
            <form method="post" action="{{url('/info/'.$inf->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>

              </form>
               
             </td>
             
             <td>
              {{$inf->created_at}}
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