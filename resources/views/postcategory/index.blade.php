@extends('admin')
@section('konten')
    

<style>
#wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
#wrapper2{height: 80%; }
#div2 {width:100%; height: 95%;
overflow: auto;}
</style>
<section class="content-header">
    <h1>
     {{$title}}
    
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('postcategory/create')}}" class="btn btn-primary btn-sm" >Tambah Kategori</a>
    </ol>
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
          <div id="wrapper2">
            <div id="div2">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Kategori</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
                     @php $no = 1; @endphp
             @foreach ($list_category as $category)
             <tr>
              <td>{{$no++}}</td>
             <td>{{$category->name}}</td>
           
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="{{ url('/postcategory/'.$category->id.'/edit') }}">Edit</a>
              </div>
            <form method="post" action="{{url('/postcategory/'.$category->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

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
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection
  <script>
    var wrapper1 = document.getElementById('wrapper1');
    var wrapper2 = document.getElementById('wrapper2');
    wrapper1.onscroll = function() {
      wrapper2.scrollLeft = wrapper1.scrollLeft;
    };
    wrapper2.onscroll = function() {
      wrapper1.scrollLeft = wrapper2.scrollLeft;
    };
</script>