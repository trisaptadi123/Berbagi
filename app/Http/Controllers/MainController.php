<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zakat;

class MainController extends Controller
{
    public function login (){
        return view('layouts.login');
    }
    
    // public function alldonate (){
    //     return view('semuadonasi');
    // }

    public function zis (){
        return view('zis');
    }

    public function detail (){
        return view('layouts.detail');
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
}
