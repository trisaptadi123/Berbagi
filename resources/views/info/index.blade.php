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
          <div id="wrapper2">
            <div id="div2">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Campaign</th>
                <th>Info Terbaru</th>
                <th>Waktu</th>
                <!--<th>Status</th>
                <th> Kelola</th>
                <th>Waktu</th>-->
                
              </tr>
              </thead>
              <tbody>
            <?php $no = 1;?>
            @foreach($data as $key => $datas)
            <?php $post = \App\Post::where('id_konten', $key)->first(); ?>
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$post['title']}}</td>
                    <td>
                        @foreach($datas as $j => $i)
                        <div class="row">
                            <div class="col-md-6">{!! substr(strip_tags($i['artikel']),0,250)!!}</div>
                            <div class="col-md-2">
                                        @if($i['status'] == 0)
                                       <span class="badge badge-danger" style="background:#db1c02; ">Pending</span>
                                       @else
                                       <span class="badge badge-success" style="background:#19ab09; ">Published</span>
                                       @endif
                            </div>
                            <div class="col-md-4">            
                                        <form method="post" action="{{url('/info/'.$i['id'])}}" >
                                            @csrf
                                            @if($i['status'] == 0)
                                            <a class="btn btn-primary btn-sm" href="{{url('statusinf/'.$i['id'])}}">Acc</a>
                                            @else
                                            <a class="btn btn-danger btn-sm" href="{{url('statusinf/'.$i['id'])}}">Pending</a>
                                            @endif
                                            
                                            <a class="btn btn-warning btn-sm" href="{{ url('/info/'.$i['id'].'/edit') }}">Edit</a>
                                            
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            
                                            
                                        </form>
                                </div>
                                
                            </div>
                            
                            
                            
                          </div><br>
                            <?php if (count($datas) > 1) { ?>
                                <hr>
                            <?php } ?>
                        @endforeach
                        
                    </td>
                    <td>{{$post['created_at']}}</td>
                </tr>
            @endforeach
            <!--@foreach ($info as $inf)-->
             <!-- <?php $infoss = \App\Infocerita::select('posts.title','info.id_konten', 'info.artikel','info.status','info.created_at')->join('posts', 'posts.id_konten','=','info.id_konten')->where('info.id_konten', $inf->id_konten)->get(); ?>-->
             <!--<tr>-->
             <!-- <td>{{$no++}}</td>-->
             <!-- <td>{{$inf->title}}</td>-->
             <!-- <td>-->
             <!--   @foreach ($infoss as $in)-->
                <!--<div class="row">
                    <div class="col-md-8">{!! substr(strip_tags($in->artikel),0,250)!!}</div>
                    <div class="col-md 2">
                        <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="{{ url('/info/'.$inf->id.'/edit') }}">Edit</a>
                            
                          </div>
                           @if($inf->status == 0)
                            <a class="btn btn-primary btn-md" href="{{url('statusinf/'.$inf->id)}}">Acc</a>
                            @else
                            <a class="btn btn-danger btn-md" href="{{url('statusinf/'.$inf->id)}}">Pending</a>
                            @endif
                        <form method="post" action="{{url('/info/'.$inf->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
            
                          </form>
                    </div>
                    <div class="col-md-2">@if($inf->status == 0)
                       <span class="badge badge-danger" style="background:#db1c02">Pending</span>
                       @else
                       <span class="badge badge-success" style="background:#19ab09">Published</span>
                       @endif
                    </div>
                    
                  </div>-->
             <!--     <?php if ($infoss->count() > 1) { ?>-->
             <!--       <hr>-->
             <!--     <?php } ?>-->
                  
             <!--    @endforeach-->
             <!--  </td>-->
               
             <!--    <td>-->
             <!--     {{$inf->created_at}}-->
             <!--    </td>-->
             <!--</tr>-->
            
                 
             <!--@endforeach-->
             <!--@foreach ($info as $inf)
             <tr>
              <td>{{$no++}}</td>
              <td>{{$inf->title}}</td>
             <td>{!! substr(strip_tags($inf->artikel),0,250)!!}<br>coba</td>
              <td>
               @if($inf->status == 0)
               <span class="badge badge-danger" style="background:#db1c02">Pending</span>
               @else
               <span class="badge badge-success" style="background:#19ab09">Published</span>
               @endif
              </td>
            
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning btn-sm" href="{{ url('/info/'.$inf->id.'/edit') }}">Edit</a>
                
              </div>
               @if($inf->status == 0)
                <a class="btn btn-primary btn-md" href="{{url('statusinf/'.$inf->id)}}">Acc</a>
                @else
                <a class="btn btn-danger btn-md" href="{{url('statusinf/'.$inf->id)}}">Pending</a>
                @endif
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
            
                 
             @endforeach-->
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