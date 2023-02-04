@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
    </h1>
    <ol class="breadcrumb">
    {{-- <a href="{{url('kabarbaik/create')}}" class="btn btn-primary btn-sm" >Buat Cerita</a> --}}
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Campaign Fundraiser</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Judul Utama</th>
                <th>Sub Judul</th>
                <th>Target</th>
                <th>Terkumpul</th>
                <th>Nama Fundraiser</th>
                <th hidden>ID konten</th>
                <th hidden>ID User</th>
                <th>Desk Url</th>
                <th hidden>Gambar</th>
                <th hidden>Artikel</th>
                <th>Berakir</th>

                <th> Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($fundraiser as $fdn)
             <tr>
              <td>{{$no++}}</td>
             <td>{{Str::limit($fdn->kutama,20)}}</td>
             <td>{{$fdn->title}}</td>
             <td>{{$fdn->target}}</td>
             <td>{{$fdn->terkumpul}}</td>
             <td>{{$fdn->nama}}</td>
             <td hidden>{{$fdn->id_konten}}</td>
             <td hidden>{{$fdn->id_users}}</td>
             <td>{{$fdn->deskripsi}}</td>
             <td hidden>{{$fdn->gambar_fdn}}</td>
             <td hidden>{{Str::limit($fdn->artikel,20)}}</td>
             <td>{{$fdn->end_date}}</td>
           
            
             <td>
            <form method="post" action="{{url('/fundraise/'.$fdn->id_fundraise)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             
             <td>
              {{$fdn->updated_at}}
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