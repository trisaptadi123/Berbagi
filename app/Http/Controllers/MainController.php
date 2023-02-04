<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zakat;
use DB;

class MainController extends Controller
{
    public function login (){
        return view('layouts.login');
    }
    
    // public function alldonate (){
    //     return view('semuadonasi');
    // }

    public function zis (){
        $d_profesi = Zakat::where('jenis','zakat profesi')->Where('status', '=', 1);
        $d_dagang = Zakat::where('jenis','zakat dagang')->Where('status', '=', 1);
        $d_simpanan = Zakat::where('jenis','zakat simpanan')->Where('status', '=', 1);
        $d_emas = Zakat::where('jenis','zakat emas')->Where('status', '=', 1);
        
        /*$jum_profesi = Zakat::where('jenis','zakat profesi')->Where('status', '=', 1)->sum('jumlah' + 'kode_unik');*/
        $jum_profesi = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('jenis', 'zakat profesi')->where('status', 1)->first();
        $jum_dagang = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('jenis', 'zakat dagang')->where('status', 1)->first();
        $jum_simpanan = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('jenis', 'zakat simpanan')->where('status', 1)->first();
        $jum_emas = Zakat::select(DB::raw('sum(jumlah + kode_unik) as total'))->where('jenis', 'zakat emas')->where('status', 1)->first();
        
        
        return view('zis', compact('d_profesi','d_dagang','d_simpanan','d_emas','jum_profesi','jum_dagang','jum_simpanan','jum_emas'));
    }

    public function detail (){
        return view('layouts.detail');
    }
	
    public function semuaanakasuh (){
        return view('layouts.semuaanakasuh');
    }
    
    public function detail_cerita (){
        return view('layouts.detail_cerita');
    }

    public function zakatnow (){
        return view('layouts.zakatnow');
    }

    public function donasinow (){
        return view('menudonasi.donasinow');
    }
	
	public function bayar (){
        return view('menudonasi.bayar');
    }
	
	public function pendidikan (){
        return view('program.pendidikan');
    }
	
	public function detail_pendidikan (){
        return view('program.detail_pendidikan');
    }
	
	public function user (){
        return view('user.index');
    }
	public function galang_dana (){
        return view('user.galang_dana');
    }
	public function fundraiser (){
        return view('user.fundraiser');
    }
	public function donasi_saya (){
        return view('user.donasi_saya');
    }
	public function campaign_saya (){
        return view('user.campaign_saya');
    }
	public function  detail_cam(){
        return view('user.detail_cam');
    }
	public function  edit_cam(){
        return view('user.edit_cam');
    }
	public function  info_cam(){
        return view('user.info_cam');
    }
	public function  pencairan(){
        return view('user.pencairan');
    }
// 	public function  edit_profil(){
//         return view('user.edit_profil');
//     }
}
