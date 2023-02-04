@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
    Pencairan Dana
    </h1>
    
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Pencairan Dana</h3>
          </div>
          <!-- /.box-header -->
          <div class="table-responsive">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>Nama Campaigner</th>
                <th>Campaign</th>
                <th>Alamat</th>
                <th>Tipe Pencairan</th>
                <th>Ajuan Dana</th>
                <th>Rencana Penggunaan Dana</th>
                <th>Rencana Tanggal Penyaluran</th>
                <th>Bank</th>
                <th>No Rekening</th>
                <th>Atas Nama</th>
                <th>bukti</th>
                <th>kelola</th>
               
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($data as $post)
             <tr>
             <td>{{$post->campaigner}}</td>
             <td>{{$post->judul_campaign}}</td>
             <td>{{$post->alamat}}</td>
             <td>
                @if ($post->tipe_pencairan == 'santunan_kematian')
                Santunan Kematian
                @elseif($post->tipe_pencairan == 'biaya_rumah_sakit')
                Biaya Rumah Sakit
                @elseif($post->tipe_pencairan == 'biaya_operasional')
                Biaya Operasional
                @elseif($post->tipe_pencairan == 'biaya_penunjang_pengobatan')
                Biaya Penunjang Pengobatan
                @elseif($post->tipe_pencairan == 'biaya_pendampingan_pasien')
                Biaya Pendamingan Pasien
                @else
                -
                @endif
              </td>
             <td>{{$post->ajuan_dana}}</td>
             <td>{!!$post->ren_dana!!}</td>
             <td>{{$post->tgl_penyaluran}}</td>
             <td>{{$post->bank}}</td>
             <td>{{$post->norek}}</td>
             <td>{{$post->a_n}}</td>
             <td>
                    @if($post->gambar == null || $post->gambal == 'no_img')
                    <img src="{{ asset('gambarUpload/noimg.jpg') }}" width="80">
                    @else
                    <img src="{{ asset('gambarUpload/'.$post->gambar) }}" width="80">
                    @endif
                  </td>
             <td>
               
               <div class="btn-group">
                 @if ($post->status == 1)
                 <a class="btn btn-danger" href="{{ url('/statuscd/'.$post->id_cairdana) }}">Pending</a>
                 @else
                 <a class="btn btn-primary" href="{{ url('/statuscd/'.$post->id_cairdana) }}">Acc</a>
                 @endif
                
               </div>
               <a href="{{url('pencairan_dana/'.$post->id_cairdana)}}" class="btn btn-warning btn-sm">Edit</a>
               <!--<a href="{{url('hapus_dana/'.$post->id_cairdana)}}" class="btn btn-danger btn-sm"  onclick="return confirm('Yakin data akan dihapus?')">Delete</a>-->
               <form method="post" action="{{ url('/hapus_dana/'.$post->id_cairdana) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
          
                
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


