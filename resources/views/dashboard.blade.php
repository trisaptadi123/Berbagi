@extends('admin')
@section('konten')
    


<section class="content-header">
    <h1>
     {{-- {{$title}} --}}
      <small>Grafik Web Masih Dummy</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Grafik Pengunjung</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body chart-responsive">
      <div class="chart" id="revenue-chart" style="height: 300px;"></div>
    </div>
    <!-- /.box-body -->
  </div>
  @endsection