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
     Campaign Utama
    </h1>
    <ol class="breadcrumb">
    
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            
          </div>
          <form action="{{url('/utama')}}" method="POST">
          @csrf
          <div class="row">
          <div class="col-md-4">
          <div class="form-group">
            <label>PIlih Campaign Utama</label>
            <select class="form-control select2" name="id_konten" id="select2" style="width: 100%;">
            <option value>- Pilih -</option>
            @foreach ($list as $post)
                <option value="{{$post->id_konten}}">{{$post->title}}</option>
            @endforeach
            </select>
            </div>
          </div>
          <div class="col-md-4">
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary" style="margin-top:25px">tambah</button>
            </div>
          </div>
          </div>
          </form>
          <hr>
          <!-- /.box-header -->
          <div class="table-responsive">
          <div id="wrapper2">
            <div id="div2">
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
                <th>Berakhir</th>
                 <th>Alamat Campaign</th>
                  <th>Status</th>
                <th> Artikel</th>
                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($data as $post)
             <tr>
              <td>{{$no++}}</td>
             <td>{{$post->title}}</td>
             <td>{{$post->deskripsi}}</td>
             <td>{{$post->gambar}}</td>
             <td> {{$post->kategori}}</td>
             <td> {{$post->id_category}}</td>
             <td> {{$post->terkumpul}}</td>
             <td> <?php
                  $date1 = strtotime($post->end_date);
                       $date2 = time();
                       $subTime = $date1 - $date2;
                       $d = ($subTime/(60*60*24))%365;
                       $h = ($subTime/(60*60))%24;
                       $m = ($subTime/60)%60;
                      
                       if ($d>0) {
                           echo $d." hari\n";             
                       }          
                   ?></td>
                    <td> {{$post->alamat}}</td>
                     <td><label class="label {{($post->status == 1)? 'label-success':'label-danger'}}">{{($post->status == 1)? 'aktif':'Pending'}}</label></td>
             <td >{{Str::limit($post->artikel,120)}}</td>
            
             <td>
                  
                <a class="btn btn-danger" href="{{ url('/hapusutama/'.$post->id_konten) }}">Hapus</a>
               
              
              </div>
               
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

  {{-- <style>
    .max.title {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    </style> --}}
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