@extends('admin')
@section('konten')
    
<style>
#wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}
#wrapper2{height: 80%; }
#div2 {width:100%; height: 95%;
overflow: auto;}
</style>
<div id="wrapper2">
<div id="div2">
<section class="content-header">
    <h1>
     {{$title}}
    </h1>
    <ol class="breadcrumb">
    <a href="{{url('slide/create')}}" class="btn btn-primary btn-sm" >Slide Baru</a>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Slide</h3>
          </div>
          <!-- /.box-header -->
          <div class="table-responsive">
          <div id="wrapper2">
            <div id="div2">
            <table id="example1" class="table table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                 <th>Title</th>
                  <th>Subtitle</th>
                  <th>Penempatan</th>
                   <th>Link</th>
                     <th>Tombol Aksi</th>
              </tr>
              </thead>
              <tbody>
                    @php $no = 1; @endphp
                @foreach ($slider as $slide)
             <tr>
                <td>{{$no++}}</td>
                <td>{{$slide->gambar_slide}}</td>
                  <td>{{$slide->title}}</td>
                    <td>{{$slide->subtitle}}</td>
                    <td>
                      @if($slide->penempatan == 'slide_atas')
                      {{'Slide Atas'}}
                      @else
                      {{'Slide Artikel'}}
                      @endif
                    </td>
                      <td>{{$slide->link}}</td>
                       <td>{{$slide->button}}</td>
             <td>
               
              <div class="btn-group">
                <a class="btn btn-warning" href="{{url('/slide/'.$slide->id_slider.'/edit') }}">Edit</a>
              </div>
              <form method="post" action="{{url('/slide/'.$slide->id_slider)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus?')">Delete</button>

              </form>
               
             </td>
             
             <td>
            
             </td>
             </tr>
            
                 
         
              </tbody>
              @endforeach
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
       <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Poster Qurban & Ramadhan</h3>
                </div>
                <!-- /.box-header -->
                <div class="table-responsive">
                    <?php if ($poster->count() >= 10) { ?>
                      <div id="wrapper2">
                      <div id="div2">
                    <?php }else{ ?>
                    <?php } ?>
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <!-- <th>Title</th>
                  <th>Subtitle</th> -->
                                <th>Link</th>
                                <th>Tombol Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($poster as $slide)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$slide->gambar_slide}}</td>
                                <!-- <td>{{$slide->title}}</td>
                    <td>{{$slide->subtitle}}</td> -->
                                <td>{{$slide->link}}</td>
                                <!-- <td>{{$slide->button}}</td> -->
                                <td>

                                    <div class="btn-group">
                                        <a class="btn btn-warning"
                                            href="{{url('/slide/'.$slide->id_slider.'/edit') }}">Edit</a>
                                    </div>

                                </td>

                                <td>

                                </td>
                            </tr>



                        </tbody>
                        @endforeach
                        <tfoot>

                        </tfoot>
                    </table>
                    <?php if ($poster->count() >= 10) { ?>
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
  </div>
  </div>
  
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
 
