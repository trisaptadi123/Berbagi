@extends('admin')
@section('konten')
@section('meta_keywords', $cat ??'')
    
<style>
     .hyu {
       overflow: hidden;
       text-overflow: ellipsis;
       display: -webkit-box;
       -webkit-line-clamp: 4; /* number of lines to show */
       -webkit-box-orient: vertical;
       height: auto;
       margin-bottom :-5px;
    }
</style>
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
    <a href="{{url('artikel/create')}}" class="btn btn-primary btn-sm" >Tambah Data Artikel</a>
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
            <div id="wrapper2">
            <div id="div2">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Tag</th>
                <th>Penulis</th>
                <th>Isi</th>
                @if(Auth::user()->level == "admin")
                <th>Status</th>
                @endif
                <th>Kelola</th>
              </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach ($list_artikel as $artikel)
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                    @if($artikel->gambar == null)
                    <img src="{{ asset('gambarUpload/noimg.jpg') }}" width="80">
                    @else
                    <img src="{{ asset('gambarUpload/artikel/'.$artikel->gambar) }}" width="80">
                    @endif
                  </td>
                  <td>{{$artikel->name}}</td>
                  <td>{{$artikel->judul}}</td>
                  <td>{{$artikel->tag}}</td>
                  <?php $level = \App\User::where('id', $artikel->id_user)->first(); ?>
                  <td>{{$artikel->penulis}} <b>({{$level->level}})</b></td>
                  <td >
                      <?php
                        $kalimat_kecil = strtolower($artikel->isi);
                        $kalimat_new = ucwords($kalimat_kecil);
                        $arr = explode(" ", $kalimat_new);
                      ?>
                      {!! implode(" ",array_splice($arr,0,25))."..."!!}
                      
                      
                  </td>
                  @if(Auth::user()->level == "admin")
                    <td>
                        @if($artikel->status == 0)
                        <label class="label label-warning">Pending</label>
                        @else
                        <label class="label label-success">ACC</label>
                        @endif
                    </td>
                  @endif
                  <td>
                    <div class="btn-group">
                    @if(Auth::user()->level == "admin")
                      @if ($artikel->status == 1)
                      <a class="btn btn-warning" href="{{ url('/artikel/'.$artikel->id_artikel.'/acc') }}">Pending</a>
                      @else
                      <a class="btn btn-success" href="{{ url('/artikel/'.$artikel->id_artikel.'/acc') }}">ACC</a>
                      @endif
                    @endif
                      <a class="btn btn-info btn-sm" href="{{ url('/artikel/'.$artikel->id_artikel.'/edit') }}">Edit</a>
                    </div>
                     <form method="post" action="{{url('/artikel/'.$artikel->id_artikel)}}">
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
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
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
  @endsection