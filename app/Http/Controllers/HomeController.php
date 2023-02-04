<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zakat;
use App\Donatefundraiser;
use App\DataDonatur;
use App\Dataqurban;
use App\AnakAsuh;
use DB;
use Carbon\Carbon;
use Analytics; 
use Spatie\Analytics\Period;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jum_zakat = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('status', 1)->first();
        $jum_fundraiser = Donatefundraiser::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->first();
        $jum_donatur = DataDonatur::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->first();
        $jum_qurban = Dataqurban::select(DB::raw('sum(total + kode) as total'))->where('status', 1)->first();
        $jum_anakasuh = AnakAsuh::select(DB::raw('sum(total + kode) as total'))->where('status',1)->first();
        
        $don_zakat = Zakat::where('status', 1)->count();
        $don_fundraiser = Donatefundraiser::where('status', 1)->count();
        $don_donatur = DataDonatur::where('status', 1)->count();
        $don_qurban = Dataqurban::where('status', 1)->count();
        $don_anakasuh = AnakAsuh::where('status',1)->count();
        
        
        $dis_donatur = DataDonatur::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
        $dis_fun = Donatefundraiser::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
        $dis_zakat = Zakat::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
        $dis_qurban = Dataqurban::where('status', '1')->distinct('email', 'nohp')->count('email', 'nohp');
        $dis_anakasuh = Anakasuh::where('status', '1')->distinct('email', 'nohp')->count('email', 'nohp');
       
        
        $jum_total = $jum_zakat->total + $jum_fundraiser->total + $jum_donatur->total + $jum_qurban->total + $jum_anakasuh->total ;
        return view('dashboard',compact('jum_zakat','jum_fundraiser','jum_donatur', 'jum_qurban', 'jum_total', 'don_zakat', 'don_fundraiser', 'don_donatur', 'don_qurban','dis_donatur','dis_zakat','dis_fun','dis_qurban','jum_anakasuh','don_anakasuh','dis_anakasuh'));
    }
    function fetch_data(Request $request)
	{
		if($request->ajax())
		{
			if($request->from_date != '' && $request->to_date != '')
			{
				//donasi & fundraiser
				//donatur
				$data['d_fun'] = Donatefundraiser::where('status', '1')->whereBetween('created_at', [$request->from_date, $request->to_date])->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				$data['d_donatur'] = DataDonatur::where('status', '1')->whereBetween('created_at', [$request->from_date, $request->to_date])->distinct('email', 'nomorhp')->count();
				//transaksi
				$data['t_fun']= Donatefundraiser::where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->count();
				$data['t_donatur'] = DataDonatur::where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->count();
				//jumlah uang
				$data['jum_fun'] = Donatefundraiser::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->first();
				$data['jum_donatur'] = DataDonatur::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->first();

				//Zakat
				//donatur
				$data['d_zakat'] = Zakat::where('status', '1')->whereBetween('created_at', [$request->from_date, $request->to_date])->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				//transaksi
				$data['t_zakat'] = Zakat::where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->count();
				//jumlah uang
				$data['jum_zakat'] = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->first();

				//qurban
				//donatur
				$data['d_qurban'] = Dataqurban::where('status', '1')->whereBetween('created_at', [$request->from_date, $request->to_date])->distinct('email', 'nohp')->count('email', 'nohp');
				//transaksi
				$data['t_qurban'] = Dataqurban::where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->count();
				//jumlah uang
				$data['jum_qurban'] = Dataqurban::select(DB::raw('sum(total + kode) as total'))->where('status', 1)->whereBetween('created_at', [$request->from_date, $request->to_date])->first();
			    
			    //total
				$data['total'] = $data['jum_fun']->total + $data['jum_donatur']->total + $data['jum_zakat']->total + $data['jum_qurban']->total;
			    
			}
			else if($request->from_date != '' && $request->to_date == '')
			{
				//donasi & fundraiser
				//donasi
				$data['d_fun'] = Donatefundraiser::where('status', '1')->where('created_at', $request->from_date)->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				$data['d_donatur'] = DataDonatur::where('status', '1')->where('created_at', $request->from_date)->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				//transaksi
				$data['t_fun']= Donatefundraiser::where('status', 1)->where('created_at', $request->from_date)->count();
				$data['t_donatur'] = DataDonatur::where('status', 1)->where('created_at', $request->from_date)->count();
				//jumlah uang
				$data['jum_fun'] = Donatefundraiser::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->where('created_at', $request->from_date)->first();
				$data['jum_donatur'] = DataDonatur::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->where('created_at', $request->from_date)->first();

				//Zakat
				//donatur
				$data['d_zakat'] = Zakat::where('status', '1')->where('created_at', $request->from_date)->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				//transaksi
				$data['t_zakat'] = Zakat::where('status', 1)->where('created_at', $request->from_date)->count();
				//jumlah uang
				$data['jum_zakat'] = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('status', 1)->where('created_at', $request->from_date)->first();

				//qurban
				//donatur
				$data['d_qurban'] = Dataqurban::where('status', '1')->where('created_at', $request->from_date)->distinct('email', 'nohp')->count('email', 'nohp');
				//transaksi
				$data['t_qurban'] = Dataqurban::where('status', 1)->where('created_at', $request->from_date)->count();
				//jumlah uang
				$data['jum_qurban'] = Dataqurban::select(DB::raw('sum(total + kode) as total'))->where('status', 1)->where('created_at', $request->from_date)->first();
                
                //total
				$data['total'] = $data['jum_fun']->total + $data['jum_donatur']->total + $data['jum_zakat']->total + $data['jum_qurban']->total;

			}else if($request->from_date == '' && $request->to_date != '')
			{
				//donasi & fundraiser
				//donasi
				$data['d_fun'] = Donatefundraiser::where('status', '1')->where('created_at', $request->to_date)->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				$data['d_donatur'] = DataDonatur::where('status', '1')->where('created_at', $request->to_date)->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				//transaksi
				$data['t_fun']= Donatefundraiser::where('status', 1)->where('created_at', $request->to_date)->count();
				$data['t_donatur'] = DataDonatur::where('status', 1)->where('created_at', $request->to_date)->count();
				//jumlah uang
				$data['jum_fun'] = Donatefundraiser::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->where('created_at', $request->to_date)->first();
				$data['jum_donatur'] = DataDonatur::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->where('created_at', $request->to_date)->first();

				//Zakat
				//donatur
				$data['d_zakat'] = Zakat::where('status', '1')->where('created_at', $request->to_date)->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				//transaksi
				$data['t_zakat'] = Zakat::where('status', 1)->where('created_at', $request->to_date)->count();
				//jumlah uang
				$data['jum_zakat'] = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('status', 1)->where('created_at', $request->to_date)->first();

				//qurban
				//donatur
				$data['d_qurban'] = Dataqurban::where('status', '1')->where('created_at', $request->to_date)->distinct('email', 'nohp')->count('email', 'nohp');
				//transaksi
				$data['t_qurban'] = Dataqurban::where('status', 1)->where('created_at', $request->to_date)->count();
				//jumlah uang
				$data['jum_qurban'] = Dataqurban::select(DB::raw('sum(total + kode) as total'))->where('status', 1)->where('created_at', $request->to_date)->first();
                
                //total
				$data['total'] = $data['jum_fun']->total + $data['jum_donatur']->total + $data['jum_zakat']->total + $data['jum_qurban']->total;

			}else{
				//donasi & fundraiser
				//donasi
				$data['d_fun'] = Donatefundraiser::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				$data['d_donatur'] = DataDonatur::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				//transaksi
				$data['t_fun']= Donatefundraiser::where('status', 1)->count();
				$data['t_donatur'] = DataDonatur::where('status', 1)->count();
				//jumlah uang
				$data['jum_fun'] = Donatefundraiser::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->first();
				$data['jum_donatur'] = DataDonatur::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->first();

				//Zakat
				//donatur
				$data['d_zakat'] = Zakat::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
				//transaksi
				$data['t_zakat'] = Zakat::where('status', 1)->count();
				//jumlah uang
				$data['jum_zakat'] = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('status', 1)->first();

				//qurban
				//donatur
				$data['d_qurban'] = Dataqurban::where('status', '1')->distinct('email', 'nohp')->count('email', 'nohp');
				//transaksi
				$data['t_qurban'] = Dataqurban::where('status', 1)->count();
				//jumlah uang
				$data['jum_qurban'] = Dataqurban::select(DB::raw('sum(total + kode) as total'))->where('status', 1)->first();

				/*dd($data['jum_qurban'], $data['jum_zakat'], $data['jum_donatur'], $data['jum_fun']);*/
                //total
				$data['total'] = $data['jum_fun']->total + $data['jum_donatur']->total + $data['jum_zakat']->total + $data['jum_qurban']->total;

			}
			$datas = json_encode($data);
// 			dd($datas);
			return $datas;
		}
	}
    
    public function chart(){
        $startDate = carbon::now()->subYear();
        $endDate = carbon::now();
        // $startDate = date_create('2021-06-01');
        // $endDate = date_create();
        
        $diff = date_diff($startDate, $endDate);
        // $da = Period::create($startDate, $endDate);
        $coba = Analytics::fetchTotalVisitorsAndPageViews(Period::days(1));
        // dd($coba);
        
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days($diff->days));
        $data['semua'] = Analytics::fetchMostVisitedPages(Period::days($diff->days));;
        // dd($analyticsData[0]['date']->isoFormat('Y-MM-D'));
        $totvis_jan =0;
        $totvis_feb =0;
        $totvis_mar =0;
        $totvis_apr =0;
        $totvis_mei =0;
        $totvis_jun =0;
        $totvis_jul =0;
        $totvis_agu =0;
        $totvis_sep =0;
        $totvis_okt =0;
        $totvis_nov =0;
        $totvis_des =0;

        $januari = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '01';
        });
        foreach($januari as $v){
            $totvis_jan += $v['visitors'];
        }

        $febuari = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '02';
        });
        foreach($febuari as $v){
            $totvis_feb += $v['visitors'];
        }

        $maret = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '03';
        });
        foreach($maret as $v){
            $totvis_mar += $v['visitors'];
        }

        $april = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '04';
        });
        foreach($april as $v){
            $totvis_apr += $v['visitors'];
        }

        $mei = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '05';
        });
        foreach($mei as $v){
            $totvis_mei += $v['visitors'];
        }

        $juni = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '06';
        });
        foreach($juni as $v){
            $totvis_jun += $v['visitors'];
        }

        $juli = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '07';
        });
        foreach($juli as $v){
            $totvis_jul += $v['visitors'];
        }
        
        $agustus = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '08';
        });
        foreach($agustus as $v){
            $totvis_agu += $v['visitors'];
        }
        
        $september = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '09';
        });
        foreach($september as $v){
            $totvis_sep += $v['visitors'];
        }
        
        $oktober = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '10';
        });
        foreach($oktober as $v){
            $totvis_okt += $v['visitors'];
        }
        
        $november = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '11';
        });
        foreach($november as $v){
            $totvis_nov += $v['visitors'];
        }
        
        $desember = $analyticsData->filter(function($value, $key) {
            return $value['date']->isoFormat('MM') == '12';
        });
        foreach($desember as $v){
            $totvis_des += $v['visitors'];
        }
        
        $data['label'] = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $data['chart'] = [$totvis_jan, $totvis_feb, $totvis_mar, $totvis_apr, $totvis_mei, $totvis_jun, $totvis_jul, $totvis_agu, $totvis_sep,$totvis_okt,$totvis_nov,$totvis_des];
        return $data;
        
    //    $data =  Analytics::performQuery(
    //     Period::years(1),
    //        'ga:sessions',
    //        [
    //            'metrics' => 'ga:sessions, ga:pageviews',
    //            'dimensions' => 'ga:yearMonth'
    //        ]
    //  );
     
    //    echo $data[0]['date'];
        // 
    //    die();
    }
}
