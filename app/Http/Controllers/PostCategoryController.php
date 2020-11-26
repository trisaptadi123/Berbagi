<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Slide;
use App\Bank;
use App\DataDonatur;
use App\Anak;
use App\Zakat;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class PostCategoryController extends Controller
{

    public function index(){
        $post_list = Post::orderBy('created_at','desc')->paginate(6);
        $slider = Slide::all();
        $anak = Anak::all();
        return view ('index', compact('post_list','slider','anak'));

    }

    public function readmore(Post $post){
        $list_donatur = Datadonatur::where('id_konten', $post->id_konten)->get();
        $post_list = Post::all();
       return view ('readmore', compact('post','list_donatur'));

    }

    public function rd(Post $post){
        $bank = Bank::get();
        $list_donatur = DataDonatur::get();
        return view ('menudonasi.donasinow', compact('bank','post','list_donatur'));
 
     }

     public function mail(){
        $list_donatur = DataDonatur::orderBy('created_at','desc')->paginate(1);
        return view ('email_template',compact('list_donatur'));
 
     }

    // public function bank(){
    //     $bank_list = Bank::orderBy('created_at','desc')->paginate(6);
    //     return view ('donatur', compact('bank_list'));

    // }

    public function semuadonasi(){
        $sma_list = Post::orderBy('created_at','desc')->paginate(6);
        return view ('semuadonasi', compact('sma_list'));

    }

    public function datadonatur(){
        return view ('datadonatur');
 
     }

     public function bayar(){
        $list_donatur = DataDonatur::orderBy('created_at','desc')->paginate(1);
        $list_bank = Bank::orderBy('id')->paginate(1);
        return view('bayar',compact('list_donatur','list_bank'));
     }

     public function store(Request $request){
        // $input = $request->all();
        $mail = $request->email;
        $kode = $request->kode;

        $datadonatur = new DataDonatur;
        $datadonatur->jumlah = preg_replace("/[^0-9]/", "", $request->jumlah);
        $datadonatur->bank = $request->bank;
        $datadonatur->namakonten = $request->namakonten;
        $datadonatur->nama = $request->nama;
        $datadonatur->id_konten = $request->id_konten;
        $datadonatur->email = $request->email;
        $datadonatur->nomorhp = $request->nomorhp;
        $datadonatur->komentar = $request->komentar;
        $datadonatur->status = $request->status;
        $datadonatur->kode = mt_rand(100,999);

        $request->validate([
           
            'jumlah' => 'required', 
            'bank' => 'required', 
            'nama' => 'required|alpha', 
            'email' => 'required|email', 
            'nomorhp' => 'required|numeric', 
            // 'komentar' => 'required', 
           
            
            
        ],
        [
            'jumlah.required' => 'Nominal Harus diisi',
            'bank.required' => 'Bank Harus diisi',
            'nama.required' => 'Nama Harus diisi',
            'email.required' => 'Email Harus diisi',
            'nomorhp.required' => 'Kontak Harus diisi',
            // 'komentar.required' => 'Sampaikanlah Dukungan atau doa untuk kami .',
        ]
    
    );
    
   
   

        // DataDonatur::create($input);
     $datadonatur->save();
     $data = array(
        'nama'      =>  $request->nama,
        'bank'      =>  $request->bank,
        'kode'      =>  $request->kode,
        'namakonten' => $request->namakonten,
        'jumlah'   =>   $request->jumlah
        
    );


    Mail::to($mail)->send(new SendMail($data));
        return redirect('bayar');

      

    }

    public function zakatprof(){
        $bank = Bank::get();
        $zakat = Zakat::get();
        return view ('layouts.zakatnow',compact('bank','zakat'));
    }

    
    public function zakatsimpan(){
        $bank = Bank::get();
        $zakat = Zakat::get();
      return view ('layouts.zakatnow',compact('bank','zakat'));
  }

  public function zakatdagang(){
    $bank = Bank::get();
    $zakat = Zakat::get();
  return view ('layouts.zakatnow',compact('bank','zakat'));
}

public function zakatemas(){
    $bank = Bank::get();
    $zakat = Zakat::get();
  return view ('layouts.zakatnow',compact('bank','zakat'));
}

public function bayarzakat(){
    $zakat = Zakat::orderBy('created_at','desc')->paginate(1);
    return view ('bayarzakat',compact('zakat'));
}

public function stored(Request $request){
    // $input = $request->all(); 
    // Zakat::create($input);
    $zakat = new Zakat;
    $zakat->jumlah = preg_replace("/[^0-9]/", "", $request->jumlah);
    $zakat->nama = $request->nama;
    $zakat->jenis = $request->jenis;
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

}
