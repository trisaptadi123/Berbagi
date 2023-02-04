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
    <a href="{{url('post/create')}}" class="btn btn-primary btn-sm" >Tambah Campaign</a>
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
          <div id="wrapper2">
            <div id="div2">
            <table id="example1" class="table table-bordered table-striped" width="100%" border="0" cellspacing="0" cellpadding="0">
              <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Campaigner</th>
                <th>Target</th>
                <th>Terkumpul</th>
                <th>Berakhir</th>
                 <th>Alamat Campaign</th>
                 <th>Dokumen</th>
                  <th>Status</th>
                <th>Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($list_post as $post)
             <tr>
              <td>{{$no++}}</td>
             <td >{{Str::limit($post->title,30)}}</td>
             <td>{{$post->deskripsi}}</td>
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
                    <td>
                        @if($post->id == 12)
                            @if($post->rincian != NULL)
                                <a href="{{ asset('gambarUpload/'.$post->rincian) }}" target="blank"><img src="{{ asset('gambarUpload/'.$post->rincian) }}" width="80"><br>Lihat Bukti</a>
                                <!--<label class="label {{($post->keterangan_dokumen == 1)? 'label-success':'label-danger'}} ">{{($post->keterangan_dokumen == 1)? 'sudah di acc':'belum di acc'}}</label>-->
                            @else
                                -
                                <!--<label class="label {{($post->keterangan_dokumen == 1)? 'label-success':'label-danger'}} ">{{($post->keterangan_dokumen == 1)? 'sudah di acc':'belum di acc'}}</label>-->
                            @endif
                        @endif
                        
                        <br>
                        <div class="btn-group">
                @if($post->id == 12)
                    @if ($post->keterangan_dokumen == 1)
                        <a class="btn btn-danger btn-sm mt-2 btn-block" href="{{ url('/ketubahs/'.$post->id_konten) }}">Pending</a>
                        
                    @else
                        @if($post->rincian == NULL)
                        <a class="btn btn-primary btn-sm mt-2 btn-block" disabled href="{{ url('/ketubah/'.$post->id_konten) }}">Acc</a>
                        @else
                        <a class="btn btn-primary btn-sm mt-2 btn-block" href="{{ url('/ketubah/'.$post->id_konten) }}">Acc</a>
                        @endif
                    @endif
                @endif
              
              </div>
                    </td>
                    <!--<td >{{Str::limit($post->artikel,30)}}</td>-->
                     <td><label class="label {{($post->status == 1)? 'label-success':'label-danger'}}">{{($post->status == 1)? 'aktif':'Pending'}}</label></td>
             
            
             <td>
                 
                  <div class="btn-group">
                @if ($post->status == 1)
                <a class="btn btn-warning" href="{{ url('/statused/'.$post->id_konten) }}">Pending</a>
                @else
                <a class="btn btn-primary" href="{{ url('/statused/'.$post->id_konten) }}">Acc</a>
                @endif
              
              </div>
              
               
              <div class="btn-group">
                <!--<a class="btn btn-success btn-sm" href="{{ url('/post/'.$post->id_konten) }}">View</a>-->
                <a class="btn btn-success" href="{{ url('/post/'.$post->id_konten.'/edit') }}">Edit</a>
                <a class="btn btn-info" href="{{route('info.detail',$post->deskripsi)}}">+ Info</a>
              </div>
              <form method="post" action="{{ url('/post/'.$post->id_konten) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             
             
             <td>
              {{$post->created_at->isoFormat('dddd, D MMMM Y')}}
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
  
    <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Rincian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tunggu Gambarnya Belum Muncul
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
  
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