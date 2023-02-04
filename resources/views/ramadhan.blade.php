@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
    Tambah Data {{Session::get('statusqurban')}}
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('create/ramadhan')}}" class="btn btn-primary btn-sm" >Tambah Data</a>
    @if(!empty($qurban->count()))
        @if($qurban[0]['aktif'] == 0)
        <a href="{{url('statusmn/qurban')}}" class="btn btn-success btn-sm" >Qurban : Aktif</a>
        @else
        <a href="{{url('statusmn/qurban')}}" class="btn btn-danger btn-sm" >Qurban : Nonaktif</a>
        @endif
    @else
    <a href="#" class="btn btn-success btn-sm" >Qurban</a>
    @endif
    
    @if(!empty($ramadhan->count()))
        @if($ramadhan[0]['aktif'] == 0 )
        <a href="{{url('statusmn/ramadhan')}}" class="btn btn-success btn-sm" >Ramadhan : Aktif</a>
        @else
        <a href="{{url('statusmn/ramadhan')}}" class="btn btn-danger btn-sm" >Ramadhan : Nonaktif</a>
        @endif
    @else
    <a href="" class="btn btn-success btn-sm" >Ramadhan</a>
    @endif
    
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Ramadhan & Qurban List</h3>
          </div>
          <!-- /.box-header -->
          <div class="table-responsive">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>link</th>
                <th>Gambar</th>
                <th>Campaigner</th>
                <th>Harga</th>
                <th>Alamat Campaign</th>
                <th>Status</th>
                <th>Deskripsi</th>
                <th>Kelola</th>
                <th>Waktu</th>
                
              </tr>
              </thead>
              <tbody>
                @php $no = 1; @endphp
             @foreach ($list_post as $post)
             <tr>
            <td>{{$no++}}</td>
             <td>{{$post->judul}}</td>
             <td>{{$post->link}}</td>
             <td>{{$post->gambar}}</td>
             <td>{{$post->name}}</td>
             <td>{{$post->harga}}</td>
            
                    <td> {{$post->alamat}}</td>
                     <td><label class="label {{($post->status == 1)? 'label-success':'label-danger'}}">{{($post->status == 1)? 'aktif':'Pending'}}</label></td>
             <td >{{Str::limit($post->deskripsi,120)}}</td>
            
             <td>
                  <div class="btn-group">
                @if ($post->status == 1)
                <a class="btn btn-danger" href="{{ url('/status_acc/'.$post->id_qurban) }}">Pending</a>
                @else
                <a class="btn btn-primary" href="{{ url('/status_acc/'.$post->id_qurban) }}">Acc</a>
                @endif
              
              </div>
               
              <div class="btn-group">
                <!--<a class="btn btn-success btn-sm" href="{{ url('/post/'.$post->id_konten) }}">View</a>-->
                <a class="btn btn-outline-warning" href="{{ url('/ramadhan/'.$post->id_qurban.'/edit') }}">Edit</a>
                <a class="btn btn-info" href="{{route('info.detail',$post->link)}}">+ Info</a>
              </div>
              <form method="post" action="{{ url('/ramadhan/'.$post->id_qurban) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
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
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>

  </section>
  @endsection


