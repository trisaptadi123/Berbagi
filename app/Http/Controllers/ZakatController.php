<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zakat;
use App\Bank;

class ZakatController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(){
        $zakat = Zakat::orderBy('created_at','desc')->paginate(1000);
        return view('zakat.index',compact('zakat'));
    }

     public function create(){
        return view ('zakat.create');
    }
  
    public function store(Request $request){
        // $input = $request->all(); 
        // Zakat::create($input);
        $zakat = new Zakat;
        $zakat->jumlah = $request->jumlah;
        $zakat->nama = $request->nama;
        $zakat->email = $request->email;
        $zakat->nomorhp = $request->nomorhp;
        $zakat->bank = $request->bank;
        $zakat->kode_unik =  mt_rand(100,999);

        $request->validate([
           
            'jumlah' => 'required', 
            'bank' => 'required', 
            'nama' => 'required|alpha', 
            'email' => 'required|email', 
            'nomorhp' => 'required|numeric',  
        ],
        [
            'jumlah.required' => 'Nominal Harus diisi',
            'bank.required' => 'Bank Harus diisi',
            'nama.required' => 'Nama Harus diisi',
            'email.required' => 'Email Harus diisi',
            'nomorhp.required' => 'Kontak Harus diisi',
        ]
    
    );
        
        $zakat->save();
        return redirect('bayarzakat');
    }


    public function destroy($id)
    { 
        $zakat = Zakat::findOrFail($id);
        $zakat->delete();
        return redirect('zakat');
    }


}
