<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zakat;
use App\Donatefundraiser;
use App\DataDonatur;
use App\Dataqurban;
use DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index (){
        $title = "Dashboard";
        $jum_zakat = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('status', 1)->first();
        $jum_fundraiser = Donatefundraiser::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->first();
        $jum_donatur = DataDonatur::select(DB::raw('sum(jumlah + kode) as total'))->where('status', 1)->first();
        $jum_qurban = Dataqurban::select(DB::raw('sum(total + kode) as total'))->where('status', 1)->first();
        
        $don_zakat = Zakat::where('status', 1)->count();
        $don_fundraiser = Donatefundraiser::where('status', 1)->count();
        $don_donatur = DataDonatur::where('status', 1)->count();
        $don_qurban = Dataqurban::where('status', 1)->count();
        
        $dis_donatur = DataDonatur::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
        $dis_fun = Donatefundraiser::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
        $dis_zakat = Zakat::where('status', '1')->distinct('email', 'nomorhp')->count('email', 'nomorhp');
        $dis_qurban = Dataqurban::where('status', '1')->distinct('email', 'nohp')->count('email', 'nohp');
        
        $jum_total = $jum_zakat->total + $jum_fundraiser->total + $jum_donatur->total + $jum_qurban->total;
        return view('dashboard',compact('title','jum_zakat','jum_fundraiser','jum_donatur', 'jum_qurban', 'jum_total', 'don_zakat', 'don_fundraiser', 'don_donatur', 'don_qurban','dis_donatur','dis_zakat','dis_fun','dis_qurban'));
    }
}
