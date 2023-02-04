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
    Semua Akun
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('tambahuser')}}" class="btn btn-primary btn-sm" >Tambah Akun</a>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Semua Akun</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <?php if ($users->count() >= 5) { ?>
                <div id="wrapper2">
                <div id="div2">
            <?php }else{ ?>
            <?php } ?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($users as $use)
             <tr>
              <td>{{$no++}}</td>
             <td>{{$use->name}}</td>
             <td>{{$use->email}}</td>
             <td>
            <form action="{{url('/level')}}" method="post">
                @csrf
                <input type="hidden" name="id_user" value="{{$use->id}}">
                <div class="form-group">
                    <select class="form-control" name="level" id="level"
                        onchange="this.form.submit()">
                        <option
                            {{old('level',$use->level)=="admin"? 'selected':''}}
                            value="admin">Admin</option>
                        <option
                            {{old('level',$use->level)=="campaign"? 'selected':''}}
                            value="campaign">Campaign</option>
                        <option
                            {{old('level',$use->level)=="keuangan"? 'selected':''}}
                            value="keuangan">Keuangan</option>
                        <option
                            {{old('level',$use->level)=="user"? 'selected':''}}
                            value="user">User</option>
                    </select>
                </div>
            </form> 
                 
             </td>
           
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="{{ url('/editusers/'.$use->id.'/edit') }}">Edit</a>
              </div>
            <form method="post" action="{{url('/kabarbaik/'.$use->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             
             <td>
              {{$use->updated_at}}
             </td>
             </tr>
            
                 
             @endforeach
              </tbody>
              <tfoot>
            
              </tfoot>
            </table>
            <?php if ($users->count() >= 5) { ?>
                </div>
                </div>
            <?php }else{ ?>
            <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection
  <?php if ($users->count() >= 5) { ?>
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
  <?php }else{ ?>
  <?php } ?>