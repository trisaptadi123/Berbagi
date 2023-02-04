@extends('admin')
@section('konten')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<section class="content-header">
    <h1>
     {{-- {{$title}} --}}
      <small>Grafik Web Masih Dummy</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
    <table style="margin-top: 20px;">
      <tr class="input-daterange">
        <th><input type="date" name="from_date" id="from_date" class="form-control"></th>
        <th> <p style="margin-left: 5px; margin-right: 5px; margin-top: 10px;">s/d</p> </th>
        <th><input type="date" name="to_date" id="to_date" class="form-control"></th>
        <th><button type="button" name="filter" id="filter" class="btn btn-info btn-sm" style="margin-left: 5px; margin-right: 5px;">Filter</button></th>
        <th><button type="button" name="refresh" id="refresh" class="btn btn-primary btn-sm" style=" margin-right: 5px; ">Reset</button></th>
      </tr>
    </table>
    <div class="row" style="margin-top:20px;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon " style="background:#fcfcfc" ><img class="img-responsive" src="{{asset('gambarUpload/zakat_j.png')}}"></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:12px;">Total Zakat</span>
              <span class="info-box-number" style="margin-bottom:-18px; font-size:14px;"><p id="jum_zakat">Rp. {{number_format($jum_zakat->total,0,",",".")}}</p></span>
              <hr>
              <span class="info-box-text" style="margin-top:-15px; font-size:12px;"><b id="t_zakat">{{number_format($don_zakat,0,",",".")}}</b> Transaksi</span>
              <span class="info-box-text" style="margin-top:-0px; font-size:12px;"><b id="d_zakat">{{number_format($dis_zakat,0,",",".")}}</b> Donatur</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon" style="background:#fcfcfc" ><img class="img-responsive" src="{{asset('gambarUpload/donasi_j.png')}}"></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:12px;">Donasi & Fundraiser</span>
              <span class="info-box-number" style="margin-bottom:-18px; font-size:14px;"><p id="jum_don">Rp. {{number_format($jum_donatur->total + $jum_fundraiser->total,0,",",".")}}</p></span>
              <hr>
              <span class="info-box-text" style="margin-top:-15px; font-size:12px;"><b id="t_don">{{number_format($don_fundraiser + $don_donatur,0,",",".")}}</b> Transaksi</span>
              <span class="info-box-text" style="margin-top:-0px; font-size:12px;"><b id="don">{{number_format($dis_donatur + $dis_fun,0,",",".")}}</b> Donatur</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon" style="background:#fcfcfc; padding-top:10px;"><center><img class="img-responsive" src="{{asset('gambarUpload/sheep_loves.png')}}" ></center></span>

            <div class="info-box-content">
              <span class="info-box-text" style="font-size:12px;">Total Qurban</span>
              <span class="info-box-number" style="margin-bottom:-18px; font-size:14px;"><p id="jum_qurban">Rp. {{number_format($jum_qurban->total,0,",",".")}}</p></span>
              <hr>
              <span class="info-box-text" style="margin-top:-15px; font-size:12px;"><b id="t_qurban">{{number_format($don_qurban,0,",",".")}}</b> Transaksi</span>
              <span class="info-box-text" style="margin-top:-0px; font-size:12px;"><b id="d_qurban">{{number_format($dis_qurban,0,",",".")}}</b> Donatur</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon" style="background:#fcfcfc; padding-top:20px;"><center><img class="img-responsive" src="{{asset('gambarUpload/sigma_j.png')}}" width="50"></center></span>
            <div class="info-box-content">
              <span class="info-box-text" style="font-size:12px;">Jumlah Anak Asuh</span>
              <span class="info-box-number" style="margin-bottom:-18px; font-size:14px;"><p id="jum_anak">Rp. {{number_format($jum_anakasuh->total,0,",",".")}}</p></span>
              <hr>
              <span class="info-box-text" style="margin-top:-15px; font-size:12px;"><b id="t_total">{{number_format($don_anakasuh,0,",",".")}}</b> Trasaksi</span>
              <span class="info-box-text" style="margin-top:-0px; font-size:12px;"><b id="d_total">{{number_format($dis_anakasuh,0,",",".")}}</b> Donatur</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        
        
        <!-- /.col -->
        <div class="col-md-12 col-sm-12 col-xs-12 " >
          <div class="info-box" style="padding-left : 30%; padding-right: 30%">
            <span class="info-box-icon" style="background:#fcfcfc; padding-top:20px;" ><center><img class="img-responsive" src="{{asset('gambarUpload/sigma_j.png')}}" width="50"></center></span>
            <div class="info-box-content">
              <span class="info-box-text" style="font-size:12px;">Jumlah Total</span>
              <span class="info-box-number" style="margin-bottom:-18px; font-size:14px;"><p id="jum_total">Rp. {{number_format($jum_total,0,",",".")}}</p></span>
              <hr>
              <span class="info-box-text" style="margin-top:-15px; font-size:12px;"><b id="t_total">{{number_format($don_fundraiser + $don_donatur + $don_zakat + $don_qurban + $don_anakasuh,0,",",".")}}</b> Trasaksi</span>
              <span class="info-box-text" style="margin-top:-0px; font-size:12px;"><b id="d_total">{{number_format($dis_zakat + $dis_donatur + $dis_fun + $dis_qurban + $dis_anakasuh,0,",",".")}}</b> Donatur</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      
    <div class="row">
    <div class="col-md-6">
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
            <div class="chart">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Visitor</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body chart-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>URL</th>
                  <th>Page View</th>
                </tr>
              </thead>
              <tbody id="table">
                
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  </section>
  
  
  @endsection
  @section('js')
  <script src="{{asset('gaya/bower_components/chart.js/Chart.js')}}"></script>
  <script>
   $(function ji(){
      $('#tb').DataTable({});
   })
  </script>
  <script>
  $(function jo(){
  //   var areaChartData = {
  //   labels  : ['januari'],
  //   datasets: [
  //       {
  //       label               : 'Visitors',
  //       backgroundColor     : 'rgba(243, 156, 18, 0.9)',
  //       borderColor         : 'rgba(60,141,188, 0.8)',
  //       pointRadius          : false,
  //       pointColor          : '#3b8bba',
  //       pointStrokeColor    : 'rgba(60,141,188,1)',
  //       pointHighlightFill  : '#fff',
  //       pointHighlightStroke: 'rgba(60,141,188,1)',
  //       data                : ['20'],
  //       },
  //   ]
  //   }           
          
          

  //   var barChartCanvas = $('#barChart').get(0).getContext('2d')
  //   var barChartData = jQuery.extend(true, {}, areaChartData)
  //   var temp0 = areaChartData.datasets[0]
  //   barChartData.datasets[0] = temp0

  //   var barChartOptions = {
  //   responsive              : true,
  //   maintainAspectRatio     : false,
  //   datasetFill             : false
  //   }

  //   var barChart = new Chart(barChartCanvas, {
  //   type: 'bar',
  //   data: barChartData,
  //   options: barChartOptions
  //   })
  // })
  
    $.ajax({
        type : 'GET',
        url : '/chart',
        success: function(data){
          var all = data.semua
          var isi = ''
          $.each(all,function(key, val){
              isi += `<tr><td>`+val.url+`</td><td>`+val.pageViews+`</td></tr>`
          });
          $('#table').html(isi)
          console.log(data.cart)
          var areaChartData = {
            labels  : data.label,
            datasets: [
              {
                label               : 'Electronics',
                fillColor           : 'rgba(210, 214, 222, 1)',
                strokeColor         : 'rgba(210, 214, 222, 1)',
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : data.chart
              },
              // {
              //   label               : 'Digital Goods',
              //   fillColor           : 'rgba(60,141,188,0.9)',
              //   strokeColor         : 'rgba(60,141,188,0.8)',
              //   pointColor          : '#3b8bba',
              //   pointStrokeColor    : 'rgba(60,141,188,1)',
              //   pointHighlightFill  : '#fff',
              //   pointHighlightStroke: 'rgba(60,141,188,1)',
              //   data                : [28, 48, 40, 19, 86, 27, 90]
              // }
            ]
          }
            var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
            var barChart                         = new Chart(barChartCanvas)
            var barChartData                     = areaChartData
            barChartData.datasets[0].fillColor   = '#00a65a'
            barChartData.datasets[0].strokeColor = '#00a65a'
            barChartData.datasets[0].pointColor  = '#00a65a'
            var barChartOptions                  = {
              //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
              scaleBeginAtZero        : true,
              //Boolean - Whether grid lines are shown across the chart
              scaleShowGridLines      : true,
              //String - Colour of the grid lines
              scaleGridLineColor      : 'rgba(0,0,0,.05)',
              //Number - Width of the grid lines
              scaleGridLineWidth      : 1,
              //Boolean - Whether to show horizontal lines (except X axis)
              scaleShowHorizontalLines: true,
              //Boolean - Whether to show vertical lines (except Y axis)
              scaleShowVerticalLines  : true,
              //Boolean - If there is a stroke on each bar
              barShowStroke           : true,
              //Number - Pixel width of the bar stroke
              barStrokeWidth          : 2,
              //Number - Spacing between each of the X value sets
              barValueSpacing         : 5,
              //Number - Spacing between data sets within X values
              barDatasetSpacing       : 1,
              //String - A legend template
              legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
              //Boolean - whether to make the chart responsive
              responsive              : true,
              maintainAspectRatio     : true
            }

            barChartOptions.datasetFill = false
            barChart.Bar(barChartData, barChartOptions)
            
        }
    })
  })

 
  </script>
  <script>
  $(document).ready(function(){

  var _token = $('input[name="_token"]').val();

  $('#filter').on('click', function(){
    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    $.ajax({
      url:"/../daterange/fetch_data",
      method:"POST",
      data:
      {
        from_date:from_date, 
        to_date:to_date,
        _token:_token
      },
      dataType:"json",
      success:function(data)
      {
        //donasi & fundraiser
        var d_donatur = data['d_donatur'] + data['d_fun'];
        var t_donatur = data['t_donatur'] + data['t_fun'];
        const jum_donatur = convert(data['jum_donatur'].total + data['jum_fun'].total);
        $('#don').html(d_donatur);
        $('#t_don').html(t_donatur);
        $('#jum_don').html(jum_donatur);

        //zakat
        var z_rupiah = convert(Math.floor(data['jum_zakat'].total));
        $('#d_zakat').html(data['d_zakat']);
        $('#t_zakat').html(data['t_zakat']);
        $('#jum_zakat').html(z_rupiah);

        //qurban
        const z_qurban = convert(Math.floor(data['jum_qurban'].total));
        $('#d_qurban').html(data['d_qurban']);
        $('#t_qurban').html(data['t_qurban']);
        $('#jum_qurban').html(z_qurban);

        //total
        let z_total = data['total']; 
        $('#d_total').html(data['d_donatur'] + data['d_fun'] + data['d_zakat'] + data['d_qurban']);
        $('#t_total').html(data['t_donatur'] + data['t_fun'] + data['t_zakat'] + data['t_qurban']);
        $('#jum_total').html(convert(z_total));
      }
    })
 });
  function convert(data){
    const jum_donatur = String(data);
    const d_format = jum_donatur.toString().split('').reverse().join('');
    const d_convert = d_format.match(/\d{1,3}/g);
    const d_rupiah = 'Rp. ' + d_convert.join('.').split('').reverse().join('');
    return d_rupiah;
  }
  
  $('#refresh').click(function(){
    $('#from_date').val('');
    $('#to_date').val('');
    fetch_data();
  });


});
</script>
  @endsection