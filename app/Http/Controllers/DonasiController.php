<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;

class DonasiController extends Controller
{
    public function index (){
        return Donasi::all();
    }
    
    public function create(Request $request){
        $donasi = new Donasi;
        $donasi->email = $request->email;
        $donasi->nomerhape = $request->nomerhape;
        $donasi->jumlahdonasi = $request->jumlahdonasi;
        $donasi->save();

        return "Membuat Data";
    }

    public function update(Request $request, $id){
        $email = $request->email;
        $nomerhape = $request->nomerhape;

        $donasi = Donasi::find($id);
        $donasi->email = $request->email;
        $donasi->nomerhape = $request->nomerhape;
        $donasi->jumlahdonasi = $request->jumlahdonasi;
        $donasi->save();
    }

    public function delete($id){
      

        $donasi = Donasi::find($id);
       
        $donasi->delete();
    }

}
