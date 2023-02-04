<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Slide;
use App\Bank;
use App\DataDonatur;
use App\Anak;
use App\AnakAsuh;
use App\Zakat;
use App\Category;
use App\Tag;
use App\Kabarbaik;
use App\Fundraiser;
use App\Infocerita;
use App\Disclaimer;
use App\Donatefundraiser;
use App\User;
use App\Qurban;
use App\Dataqurban;
use App\Provinsi;
use App\Kota;
use App\CairDana;
use App\Artikel;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Session;
use Response;
use Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Auth;


class PostCategoryController extends Controller
{

    public function index(){
        $post_list = Post::where('campaign', 1)->orderByRaw('RAND()')->take(4)->paginate();
        $post_listen = Post::where('unggulan', 1)->orderByRaw('RAND()')->take(4)->get();
        $slider = Slide::where('qurban', null)->where('penempatan','slide_atas')->get();
        $poster = Slide::where('qurban','!=',null)->where('penempatan','slide_atas')->get();
        $anak = Anak::orderByRaw('RAND()')->take(5)->get();
        $kabar = Kabarbaik::all();
        $jumlah = DataDonatur::where('status', 1)->paginate(1);
        $artikel = Slide::where('penempatan','slide_artikel')->orderBy('created_at','DESC')->take(1)->get();
        return view ('index', compact('post_list','post_listen','slider','anak','kabar','jumlah','poster','artikel'));

    } 

    public function readmore(Post $post){
        $list_donatur = DataDonatur::where('status',1)->where('id_konten',$post->id_konten)->orderBy('created_at','desc')->paginate(50);
        $total_donatur = DataDonatur::where('status',1)->where('id_konten',$post->id_konten)->orderBy('created_at','desc')->count();
        $list_fundraiser = Fundraiser::where('id_konten',$post->id_konten)->get();
        $list_donatefundraiser = DonateFundraiser::where('status',1)->where('id_konten',$post->id_konten)->orderBy('created_at','desc')->get();
        $jum_donatefundraiser = DonateFundraiser::where('status',1)->where('id_konten',$post->id_konten)->orderBy('created_at','desc')->count();
        $jumlah = DataDonatur::where('id_konten',$post->id_konten)->where('status', 1)->sum('jumlah');
        $kode = DataDonatur::where('id_konten',$post->id_konten)->where('status', 1)->sum('kode');
        $info = Infocerita::where('id_konten',$post->id_konten)->where('status', 1)->orderBy('created_at', 'desc')->get();
        $post_list = Post::all();
        $disclaimer = Disclaimer::where('id_disclaimer', 1)->first();
        
        $detail_dana = Post::where('id_konten',$post->id_konten)->get();
        
        $jum_donate = $total_donatur + $jum_donatefundraiser;
        // dd($post->id_category);
        return view ('readmore', compact('post','list_donatur','jumlah','kode','list_fundraiser','total_donatur','info','disclaimer','list_donatefundraiser','jum_donate','detail_dana'));

    }
    
    function load_data_donatur(Request $request)
    {
       // dd($request->id_konten);
       if($request->ajax())
       {
          if($request->id > 0)
          {
             $data = DataDonatur::where('id_konten',$request->id_konten)
             ->where('id', '<', $request->id)
             ->where('status',1)
             ->orderBy('id', 'DESC')
             ->limit(10)
             ->get();
         }
         else
         {
             $data = DataDonatur::where('id_konten',$request->id_konten)
             ->where('status',1)
             ->orderBy('id', 'DESC')
             ->limit(10)
             ->get();
         }
         $output = '';
         $last_id = '';

         if(!$data->isEmpty())
         {
             foreach($data as $donatur)
             {
                if($donatur->anonim == 1) {
                 $halo = '<td width="55%" style="padding-left:30px;" align="left">Anonim</td>';
             }

             if($donatur->anonim != 1) {
                 $halo = '<td width="55%" style="padding-left:30px; margin-top: -80px" align="left">'.($donatur->nama).'</td>';
             }

         $output .= '
         <tr>
            <td rowspan="3" width="1%"><img src="'.asset('kuy/images/userabu.png').'" style="max-height:50px; margin-top: 20px"></td>

            '.$halo.'

            <td rowspan="3" width="35%" align="right" style="padding-left:10px; color:#1f5daa;"><b>Rp. '.number_format($donatur->jumlah+$donatur->kode,0,",",".").'</b></td>
         </tr>
         <tr>
             <td style="padding-left:30px;">'.($donatur->created_at->isoFormat('dddd, D MMMM Y')).'</td>
         </tr>
         <tr >
            <td style="padding-left:30px;">'.($donatur->komentar).'</td>
         </tr>
         <tr>
            <td colspan="3"><hr></td>
         </tr>
         ';
         $last_id = $donatur->id;
         // dd($last_id);
     }
     $output .= '
     <div class="d-flex justify-content-center">
     <div id="load_more">
     <tr>
     <td colspan="3" align="center">
     <a href="javascript:void(0)" style="color: #00aeef" name="load_more_button" data-id="'.$last_id.'" id="load_more_button">Lihat Lainnya</a>
     </td>
     </tr>
     </div>
     </div>
     ';
 }
 else
 {
     $output .= '
     <div class="d-flex justify-content-center">
     <div id="load_more">
     <tr>
     <td align="center" colspan="3">
     <a href="javascript:void(0)" style="color: #00aeef" name="load_more_button" >Data tidak ditemukan</a>
     </td>
     </tr>
     </div>
     </div>
     ';
 }
 echo $output;
}
} 

    public function readanak($nama){
       
       $anak = Anak::where('nama', str_replace("-"," ", $nama))->first();
       $data = Disclaimer::where('id_disclaimer', $anak->id_disclaimer)->first();
       return view ('readanak', compact('anak','data'));

   }

   public function kabarbaiks($kabar){

       $data = Kabarbaik::where('link', $kabar)->first();

       return view ('layouts.detail_cerita', compact('kabar','data'));

   }

   public function rd(Post $post){
        //  $bank = Bank::find([1,2,3]);
        // $bak = Bank::get();
        // $list_donatur = DataDonatur::get();
        // return view ('menudonasi.donasinow', compact('bank','post','list_donatur','bak'));

        /*$bank = Bank::where('norek','!=','.')->get();
        $bak = Bank::get();*/
        
        $bank = Bank::where('norek','!=','.')->get();
        $bank_instan = Bank::where('jenis','QRIS')->get();
        $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        
        // if(date('m' == 01)){
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // if(date('m' == 01)){
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        if(date('m') == 01){
            // dd('asd');
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=', date('Y')-1)->get();    
        }else{
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        }
        
        // dd($bank_rek);
        
        $bak = Bank::get();

        $list_donatur = DataDonatur::get();
        return view ('menudonasi.donasinow', compact('bank','post','list_donatur','bak','bank_instan','bank_tf','bank_rek'));


    }

    public function mail(){
        $list_donatur = DataDonatur::orderBy('created_at','desc')->paginate(1);
        // $list_donatur = DataDonatur::orderBy('created_at','desc')->first();
        foreach($list_donatur as $donat){
            $i = explode(' ',$donat->bank);
        }
        $t = Bank::where('nama', $i[0])->first();
        // dd($bank);
        return view ('email_template',compact('t','list_donatur'));

    }

    // public function bank(){
    //     $bank_list = Bank::orderBy('created_at','desc')->paginate(6);
    //     return view ('donatur', compact('bank_list'));

    // }

    public function semuadonasi(Request $request){
        // $sma_list = Post::where('status',1)->orderBy('created_at','desc')->paginate(12);
        // $jumlah = DataDonatur::where('status', 1)->paginate(1);
        // return view ('semuadonasi', compact('sma_list','jumlah'));
        $sc = $request->get('cari');
        $kategori = Category::all();
        $wilayah = DB::table('posts')->distinct()->where('nama_kota','!=',null)->get(['nama_kota']);
        return view ('semuadonasi',compact('kategori','wilayah')); 

    }
    
    function filterah(Request $request)
    {
        $id = $request->id_category;
        $kota = $request->wilayah;
        $kategori = Category::all();
        $wilayah = DB::table('posts')->distinct()->where('nama_kota','!=',null)->get(['nama_kota']);
        if($id == null && $kota != null){
            $result = Post::where('nama_kota', $kota)->where('status', 1)->paginate(2);
        }
        if($id != null && $kota == null){
            $result = $result = Post::where('id', $id)->where('status', 1)->paginate(2);
        }
        if($id != null && $kota != null){
            $result = $result = Post::where('id', $id)->where('status', 1)->paginate(2);
        }
        // dd($result);
        $sma_list = [];

        return view ('donasisearch',compact('sma_list','result','wilayah','kategori'));
    }
    
    function load_data_donasi(Request $request)
    {
       if($request->ajax())
       {
          if($request->id > 0)
          {
             $data = Post::where('id_konten', '<', $request->id)
             ->where('status',1)
             ->orderBy('created_at', 'DESC')
             ->limit(10)
             ->get();
         }
         else
         {
             $data = Post::where('status',1)
             ->orderBy('created_at', 'DESC')
             ->limit(10)
             ->get();
         }
         $output = '';
         $last_id = '';

         if(!$data->isEmpty())
         {
             foreach($data as $post)
             {

                if($post->id_category == "Open Goals"  ) {
                    $hasil = '<div class="progress" style="width:100%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                }else {

                    $hasil = '<div class="progress" style="width:100%;">
                    <div class="progress-bar" role="progressbar" aria-valuenow='.($post->terkumpul/$post->id_category*100).'" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>';
                }

                $kalimat_kecil = strtolower($post->title);
                $kalimat_new = ucwords($kalimat_kecil);
                $arr = explode(" ", $kalimat_new);
                //  $limit = 4;

                $jumlah = $post->terkumpul + $post->terkumpul_fnd;

                

                if($post->id_category == 'Open Goals') {
                    $okkk = '<td align="right" style="text-align:right; font-size:20px; line-height:10px;"><span>&#8734;</span></td>';
                }else{
                    $date1 = strtotime($post->end_date);
                    $date2 = time();
                    $subTime = $date1 - $date2;
                    $d = ($subTime/(60*60*24))%365;
                    $h = ($subTime/(60*60))%24;
                    $m = ($subTime/60)%60;

                    if ($d>0) {
                        $ohh =  $d.' hari';             
                    }else{
                        $ohh =  '';
                    }
                
                    $okkk= '<td align="right" style="text-align:right;"><b> '.$ohh.'</b></td>'; 
                }

                $output .= '
                <a href="'.url('program',$post->deskripsi).'">
                <div class="col-md-12">
                <div class="product_list" style="margin-bottom:20px">
                <div class="product_img"> <img class="img-responsive" src="'.asset('gambarUpload/'.$post->gambar).'" alt=""> </div>
                <div class="product_detail_btm">
                <div class="center-cam">

                <h4> '.implode(" ",array_splice($arr,0,4))."..." .'</h4>
                </div>

                <p class="center-cam">'.($post->kategori).'<span class="fa fa-check" style="color:#1f5daa;"></span>
                <hr style="margin:0;">
                <div class="product_price shopping-cart" style="font-size:10px;">
                <table class="table">
                <tr style="margin-bottom:-10px;">
                <td align="left" >Terkumpul</td> 
                <td align="right" style="text-align:right; ">Sisa Waktu</td>
                </tr>
                <tr  style=" border-top: 2px solid #ffffff;">
                
                <td align="left"><b>Rp.'.number_format($jumlah,0,",",".").' </b></td>

                    '.$okkk.'

                 </tr>
                 </table>
                 </div>  
                 </p>
                 </div>
                 <div class="starratin center"> 
                 '.$hasil.'
                 </div>
                 </div>
                 </div>
                 </a>
                 ';
             $last_id = $post->id_konten;
         }
         $output .= '
         <div class="d-flex justify-content-center" >
         <div id="load_more">
         <a href="javascript:void(0)" style="color: #00aeef" name="load_more_button" data-id="'.$last_id.'" id="load_more_button">Lihat Lainnya</a>
         </div>
         </div>
         ';
     }
     else
     {
         $output .= '
         <div class="d-flex justify-content-center ">
         <div id="load_more">
         <a href="#" name="load_more_button" style="color: #00aeef">Data tidak ada</a>
         </div>
         </div>
         ';
     }
     echo $output;
    }
} 

    public function datadonatur(){
        return view ('datadonatur');

    }

    public function bayar(){
        $list_donatur = DataDonatur::orderBy('created_at', 'desc')->limit(1)->paginate(1);
        $list_bank = Bank::orderBy('id')->paginate(1);
        return view('bayar',compact('list_donatur','list_bank'));
    }

    public function store(Request $request){
        // $input = $request->all();
        $mail = $request->email;
        $kode = $request->kode;

        $datadonatur = new DataDonatur;
        $datadonatur->id_donatur = Uuid::generate(4);
        $datadonatur->jumlah = preg_replace("/[^0-9]/", "", $request->jumlah);
        $datadonatur->id_bank = $request->bankid;
        $datadonatur->bank = $request->bank;
        $datadonatur->namakonten = $request->namakonten;
        $datadonatur->nama = $request->nama;
        $datadonatur->id_konten = $request->id_konten;
        $datadonatur->id_users = $request->id_users;
        $datadonatur->email = $request->email;
        $datadonatur->nomorhp = $request->nomorhp;
        $datadonatur->komentar = $request->komentar;
        $datadonatur->status = $request->status;
        $datadonatur->url = $request->url;
        $datadonatur->anonim = $request->anonim;
        $datadonatur->kode = mt_rand(100,999);
        

        $request->validate([

            'jumlah' => 'required', 
            'bank' => 'required', 
            'nama' => 'required', 
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



        // dd($datadonatur);
        // DataDonatur::create($input);
        $datadonatur->save();

    // dd($data);


   return redirect('bayar');



}

public function donaturshow($id){
        // $donatur = DataDonatur::where('id_donatur', $id)->first();
        // return view ('donasipay')->with('donatur', $donatur);
    $donatur = DataDonatur::where('id_donatur', $id)->first();
        // dd($donatur);
    $data = explode(" ",$donatur->bank);
    $bank = Bank::where('nama', $data[0])->first();
        // dd($bank);
    return view ('donasipay', compact('donatur', 'bank'));
}

public function download($id){
    $data = Bank::where('id',$id)->first();
    $filepath = 'gambarUpload/'.$data->QR;
    return Response::download($filepath);
}


public function zakatprof(){
        // $bank = Bank::find([1,2,3]);
    // $bank = Bank::where('norek','!=','.')->get();
    // $bak = Bank::all();
    $bank = Bank::where('norek','!=','.')->get();
    
    $bank_instan = Bank::where('jenis','QRIS')->get();
        $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        
        // $bank_instan = Bank::where('jenis','QRIS')->get();
        // if(date('m' == 01)){
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // if(date('m' == 01)){
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        if(date('m') == 01){
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y')-1)->get();    
        }else{
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        }

        // $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        $bak = Bank::get();

        // dd($bank_tf);

    $zakat = Zakat::get();
    return view ('layouts.zakatnow',compact('bank','zakat','bak','bank_instan','bank_rek','bank_tf'));
}


public function zakatsimpan(){
   // $bank = Bank::find([1,2,3]);
 // $bak = Bank::all();
$bank = Bank::where('norek','!=','.')->get();
        // $bank_instan = Bank::where('jenis','QRIS')->get();
        
        $bank_instan = Bank::where('jenis','QRIS')->get();
        $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        
        // if(date('m' == 01)){
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // if(date('m' == 01)){
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // if(date('m' == 01)){
        //     $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        $bak = Bank::get();

 $zakat = Zakat::get();
 return view ('layouts.zakatnow',compact('bank','zakat','bak','bank_instan','bank_rek','bank_tf'));
}

public function zakatdagang(){
   // $bank = Bank::find([1,2,3]);
 // $bak = Bank::all();
$bank = Bank::where('norek','!=','.')->get();
$bank_instan = Bank::where('jenis','QRIS')->get();
        $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        // $bank_instan = Bank::where('jenis','QRIS')->get();
        // if(date('m' == 01)){
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // if(date('m' == 01)){
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        if(date('m') == 01){
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y')-1)->get();    
        }else{
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        }

        // $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        $bak = Bank::get();

 $zakat = Zakat::get();
 return view ('layouts.zakatnow',compact('bank','zakat','bak','bank_instan','bank_rek','bank_tf'));
}

public function zakatemas(){
    // $bank = Bank::find([1,2,3]);
    // $bak = Bank::all();
    $bank = Bank::where('norek','!=','.')->get();
        // $bank_instan = Bank::where('jenis','QRIS')->get();
        $bank_instan = Bank::where('jenis','QRIS')->get();
        $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        // if(date('m' == 01)){
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // if(date('m' == 01)){
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        if(date('m') == 01){
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y')-1)->get();    
        }else{
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        }

        // $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        $bak = Bank::get();
    $zakat = Zakat::get();
    return view ('layouts.zakatnow',compact('bank','zakat','bak','bank_instan','bank_rek','bank_tf'));
}

public function bayarzakat(){
    $zakat = Zakat::orderBy('created_at', 'desc')->limit(1)->paginate(1);
    return view ('bayarzakat',compact('zakat'));
}

public function stored(Request $request){
    // $input = $request->all(); 
    // Zakat::create($input);
    $zakat = new Zakat;
    $zakat->id_zakat = Uuid::generate(4);
    $zakat->jumlah = preg_replace("/[^0-9]/", "", $request->jumlah);
    $zakat->nama = $request->nama;
    $zakat->jenis = $request->jenis;
    $zakat->email = $request->email;
    $zakat->nomorhp = $request->nomorhp;
    $zakat->bank = $request->bank;
    $zakat->kode_unik =  mt_rand(100,999);
    $zakat->url = $request->url;

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
    Session::flash('sukses','Transaksi telah diproses');
    return redirect('bayarzakat');
}

public function show($id){
    $zakat = Zakat::where('id_zakat', $id)->first();
    $data = explode(" ",$zakat->bank);
        // dd($data[0]);
    $bank = Bank::where('nama', $data[0])->first();
    return view ('pay', compact('zakat','bank'));
    // return view ('pay')->with('zakat', $zakat);
}

public function galang(){
    $title = "Tambah Post";
    $category = Category::get();
    return view ('user.galang_dana', compact('title','category'));
}

public function storestir(Request $request){
    $input = $request->all();
    if($request->hasFile('gambar')){
        $image = $request->file('gambar');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $input['imagename'] = $image_name;

            $destinationPath = 'thumbnail';
            // $imge = Image::make($image->getRealPath());
            // $imge->resize(300, 300, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($destinationPath.'/'.$input['imagename']);
            
            
            // $image_name = $image->getClientOriginalName();
            // $upload_path = 'gambarUpload/artikel';
            // $image->move($upload_path, $image_name);
            // $input['gambar'] = $image_name;
            
            $img = $_POST['bases'];
            if($img == null){
                // $image_name = $image->getClientOriginalName();
                $upload_path = 'gambarUpload';
                $image->move($upload_path, $image_name);
                $input['gambar'] = $image_name;
            }else{
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $name = uniqid() . '.png';
                $file = "gambarUpload/" .$name;
                file_put_contents($file, $data);

                $input['gambar'] = $name;
            }
        }
    }
    
    if($request->hasFile('rincian')){
        $image = $request->file('rincian');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            // $request->rincian = $image_name;
            $input['rincian'] = $image_name;
        }
    }

    $detail=$request->artikel;

    $dom = new \domdocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
    foreach($images as $k => $img){
        $data = $img->getattribute('src');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name= time().$k.'.png';
        $path = '/home/akhmad/public_html/upload/'. $image_name;

        file_put_contents($path, $data);

        $img->removeattribute('src');
        $img->setattribute('src', '/upload/'.$image_name);
    }

    $detail = $dom->savehtml();
    $input['artikel'] = $detail;
    $input['id_category'] = preg_replace("/[^0-9]/", "", $request->id_category);
    $input['id_disclaimer'] = 1;



    $request->validate([
        'title' => 'required', 
        'deskripsi' => 'required', 
        'artikel' => 'required', 
        'id_category' => 'required', 
    ],[
        'id_category.required' => 'yoi' 
    ]); 
    Post::create($input);
    Session::flash('sukses','Galangdana berhasil dibuat ');
    return redirect('/');



}

public function allgalang(Post $post){
  $id_user = Auth::user()->id;
  $galang = Post::where('id_users', $id_user)->paginate(12);
  return view ('user.semua_campaign', compact('galang','post'));
}
public function allfundraiser(Fundraiser $post){
  $id_user = Auth::user()->id;
  $fundraiser = Fundraiser::where('id_users', $id_user)->paginate(12);
  return view ('user.semua_fundraiser', compact('fundraiser','post'));
}

public function menu(Post $post){
    $id_user = Auth::user()->id;
    $galang = Post::where('id_users', $id_user)->limit(10)->get();
    $fundraiser = Fundraiser::where('id_users', $id_user)->get();
    return view ('user.campaign_saya', compact('galang','fundraiser'));
}

public function userr(User $user){
    $jml = DataDonatur::paginate(1);
    $campaign = Post::paginate(1);
    $id_user = Auth::user()->id;
    $artikel = Artikel::where('id_user', $id_user)->where('status', 1)->count();
    $tot_artikel = Artikel::where('id_user', $id_user)->count();
        // $fdn = Fundraiser::paginate(1);
    return view ('user.index', compact('jml','campaign','artikel','tot_artikel'));
}

public function dashbor(User $user){
    $jml = DataDonatur::paginate(1);
    $campaign = Post::paginate(1);
    $id_user = Auth::user()->id;
    $artikel = Artikel::where('id_user', $id_user)->where('status', 1)->count();
    $tot_artikel = Artikel::where('id_user', $id_user)->count();
        // $fdn = Fundraiser::paginate(1);
    return view ('user.dashboarded', compact('jml','campaign','artikel','tot_artikel'));
}

public function donasisaya(){
    $donatur = Datadonatur::get();
    return view ('user.donasi_saya',compact('donatur'));
}

public function cari(Request $request){
    $sc = $request->get('cari');
    $kategori = Category::all();
    $wilayah = DB::table('posts')->distinct()->where('nama_kota','!=',null)->get(['nama_kota']);
    $result = Post::where('title','LIKE','%'.$sc.'%')->where('status',1)->paginate(2);
    $sma_list = Qurban::where('judul','LIKE','%'.$sc.'%')->paginate(2);
    return view ('cari',compact('sc','result','sma_list', 'kategori', 'wilayah'));
}

public function cariartikel(Request $request){
    $sc = $request->cari;
    $kategori = Category::all();
    $result = Artikel::join('category', 'artikel.id', '=', 'category.id')->where('judul','LIKE','%'.$sc.'%')->where('status',1)->get();
    // return($result);
    return view ('cariartikel',compact('sc','result', 'kategori'));
}

public function tag(Request $request){
    $sc = $request->tag;
    $tag = Tag::all();
    $result = Artikel::join('tag', 'artikel.id', '=', 'tag.id')->where('judul','LIKE','%'.$sc.'%')-> get();
    // return($result);
    return view ('tag',compact('sc','result', 'tag'));
}

public function filter(Request $request){
    $id = $request->id_category;
    $kota = $request->wilayah;
    $kategori = Category::all();
    $wilayah = DB::table('posts')->distinct()->where('nama_kota','!=',null)->get(['nama_kota']);
    if($id == null && $kota != null){
        $result = Post::where('nama_kota', $kota)->get();
    }
    if($id != null && $kota == null){
        $result = $result = Post::where('id', $id)->get();
    }
    if($id != null && $kota != null){
        $result = $result = Post::where('nama_kota', $kota)->where('id', $id)->get();
    }
        // dd($result);
    $sma_list = [];
    return view ('cari',compact('result', 'kategori','sma_list','wilayah'));

}


public function showgalangdana(Post $post){
    $list_donatur = DataDonatur::where('id_konten',$post->id_konten)->get();
    $jumlah = DataDonatur::where('id_konten',$post->id_konten)->where('status', 1)->sum('jumlah');
    $kode = DataDonatur::where('id_konten',$post->id_konten)->where('status', 1)->sum('kode');
    $post_list = Post::all();
    $newfo = Infocerita::where('id_konten',$post->id_konten)->orderBy('created_at', 'desc')->get();
    return view ('user.detail_cam',compact('post','list_donatur','jumlah','kode','post_list','newfo'));
}




public function newinfo(Post $post){
   $info = Infocerita::where('id_konten', $post->id_konten)->get();
   return view ('user.info_cam',compact('post','info'));
}

public function hapus_info($id){
  $data = Infocerita::findOrFail($id);
  $data->delete();
  return back();
}

public function pencairan($judul, $id){
    $i = Crypt::decrypt($id);
    $datas = CairDana::where('id', Auth::user()->id)->where('id_konten', $i)->where('status', 1)->get();
    $cairs= CairDana::where('id', Auth::user()->id)->where('id_konten', $i)->orderBy('created_at','desc')->get();
    $data = Post::where('deskripsi', $judul)->first();

    return view ('user.pencairan',compact('data','datas','cairs'));
}


public function editgalang($id)

{

  $category = Category::get();
  $post = Post::findOrFail($id);

  $detail=$post->artikel;

  $dom = new \domdocument();
  libxml_use_internal_errors(true);
  $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
  $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
  foreach($images as $k => $img){
    $data = $img->getattribute('src');

    $data = base64_encode(file_get_contents('/home/akhmad/public_html' .$data));
    $base = 'data:image/png;base64,';
    $img->removeattribute('src');
    $img->setattribute('src', $base.$data);
}

$detail = $dom->savehtml();
$post['artikel'] = $detail;

return view ('user.edit_cam',compact('post','category'));
}

public function updategalang($id, Request $request)

{
  $title = "Update";
  $post = Post::findOrFail($id);

  $input = $request->all();
  if($request->hasFile('gambar')){
    $image = $request->file('gambar');
    if(isset($post->gambar)&&file_exists('gambarUpload/'.$post->gambar)){
        unlink('gambarUpload/'.$post->gambar);
    }

    if($image->isValid()){
        $image_name = $image->getClientOriginalName();
        $upload_path = 'gambarUpload';
        $image->move($upload_path, $image_name);
        $input['gambar'] = $image_name;
    }



}

$detail=$request->artikel;

@$dom = new \domdocument();
@$dom->loadHtml($detail, libxml_use_internal_errors(true));
$images = @$dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
foreach($images as $k => $img){
    $data = $img->getattribute('src');

    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);

    $data = base64_decode($data);
    $image_name= time().$k.'.png';
    $path = '/home/akhmad/public_html/upload/'. $image_name;

    file_put_contents($path, $data);

    $img->removeattribute('src');
    $img->setattribute('src', '/upload/'.$image_name);
}

$detail = @$dom->savehtml();
$input['artikel'] = $detail;
$input['id_category'] = preg_replace("/[^0-9]/", "", $request->id_category);

$post->update($input);
return redirect('/');
}

public function semuaanakasuh(){
    // $anak = Anak::all();
    // return view ('layouts.semuaanakasuh', compact('anak'));
    return view ('layouts.semuaanakasuh');

}

function load_data(Request $request)
{
  if($request->ajax())
  {
      if($request->id > 0)
      {
         $data = Anak::where('id', '<', $request->id)
         ->orderBy('id', 'DESC')
         ->where('status',1)
         ->limit(10)
         ->get();
     }
     else
     {
         $data = Anak::orderBy('id', 'DESC')
         ->where('status',1)
         ->limit(10)
         ->get();
     }
     $output = '';
     $last_id = '';

     if(!$data->isEmpty())
     {
         foreach($data as $row)
         {
            $nama = str_replace(" ","-", $row->nama);
            $output .= '
            <a href="'.url('programs/'.$nama).'" >
            <div class="product_list" style="margin-bottom:20px;">
            <div class="product_img"> <img class="img-responsive" src="'.asset('gambarUpload/'.$row->gambar_anak).'" alt="#"> </div>
            <div class="product_detail_btm">
            <div class="center-cam">
            <h4> '.$row->nama.' </h4>
            </div>
            <hr style="margin:0;">
            <div class="product_price shopping-cart" style="font-size:10px;">
            <table class="table">
            <tr style="margin-bottom:-10px;">
            <td align="left" width="60%"><span class="fa fa-book"></span> '.$row->kriteria.' </td> 
            <td align="right" width="40%" style="text-align:right; "><span class="fa fa-graduation-cap"></span> '.$row->jp.' </td>
            </tr>
            <tr style="margin-bottom:-10px;">
            <td align="left" width="60%"><span class="fa fa-map-marker"></span> '.$row->cabang.' </td> 
            <td align="right" width="40%" style="text-align:right; "><span class="fa fa-child"></span> '.$row->shelter.' </td>
            </tr>
            </table>
            </div>
            </div>
            </div>
            </a>
            ';
            $last_id = $row->id;
        }
        $output .= '
        <div class="d-flex justify-content-center">
        <div id="load_more">
        <a href="javascript:void(0)" style="color: #00aeef" name="load_more_button" data-id="'.$last_id.'" id="load_more_button">Lihat Lainnya</a>
        </div>
        </div>
        ';
    }
    else
    {
     $output .= '
     <div class="d-flex justify-content-center">
     <div id="load_more">
     <a href="#" name="load_more_button" style="color: #00aeef">Data tidak ada</a>
     </div>
     </div>
     ';
 }
 echo $output;
}
} 


public function fundraiser($post){
 $data = Post::where('deskripsi', $post)->first();
 $category = Category::all();
 $qurban = Qurban::where('link', $post)->first();
        // dd($post);
 return view ('user.fundraiser',compact('post','data','category','qurban'));
}

public function storefdn(Request $request){
    $input = $request->all();
    if($request->hasFile('gambar_fdn')){
        $image = $request->file('gambar_fdn');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
                // $post->gambar = $image_name;
            $input['gambar_fdn'] = $image_name;
        }
    } 
    if($input['id_konten'] == null){
        $input['hrgqurban'] = preg_replace("/[^0-9]/","", $request->hrgqurban);
            // dd('coba');
        Fundraiser::create($input);
        Session::flash('sukses','Fundraiser telah dibuat ');
        return redirect('/');
    }else{
        $input['target'] = preg_replace("/[^0-9]/", "", $request->target);
        Fundraiser::create($input);
        Session::flash('sukses','Fundraiser telah dibuat ');
        return redirect('/');
    }
}

public function fdn(Fundraiser $fdn){
    $list_donatur = Donatefundraiser::where('id_fundraise',$fdn->id_fundraise)->get();
    return view ('readfundraiser', compact('fdn','list_donatur'));

}

public function donasifdn(Fundraiser $fd){
    $bank = Bank::where('norek','!=','.')->get();
    $bank_instan = Bank::where('jenis','QRIS')->get();
    $bank_tf = Bank::where('jenis','Transfer Bank')->get();
    $bak = Bank::get();

    $list_donatur = DataDonatur::get();
    return view ('menudonasi.donasifund', compact('bank','fd','list_donatur','bak','bank_instan','bank_tf'));

}

public function bayarfdn(){
    $list_donatur = Donatefundraiser::orderBy('created_at', 'desc')->limit(1)->paginate(1);
    $list_bank = Bank::orderBy('id')->paginate(1);
    return view('bayarfdn',compact('list_donatur','list_bank'));
}

public function storefundrais(Request $request){
        // $input = $request->all();
    $mail = $request->email;
    $kode = $request->kode;

    if ($request->id_konten != null){
        $datadonatur = new Donatefundraiser;
        $datadonatur->id_donaturfdn = Uuid::generate(4);
        $datadonatur->jumlah = preg_replace("/[^0-9]/", "", $request->jumlah);
        $datadonatur->bank = $request->bank;
        $datadonatur->namakonten = $request->namakonten;
        $datadonatur->nama = $request->nama;
        $datadonatur->id_konten = $request->id_konten;
        $datadonatur->id_users = $request->id_users;
        $datadonatur->id_fundraise = $request->id_fundraise;
        $datadonatur->email = $request->email;
        $datadonatur->nomorhp = $request->nomorhp;
        $datadonatur->komentar = $request->komentar;
        $datadonatur->status = $request->status;
        $datadonatur->kode = mt_rand(100,999);
        $datadonatur->url = $request->url;

        $datadonatur->save();
        $data = array(
            'nama'      =>  $request->nama,
            'bank'      =>  $request->bank,
            'kode'      =>  $request->kode,
            'namakonten' => $request->namakonten,
            'jumlah'   =>   $request->jumlah

        );


        // Mail::to($mail)->send(new SendMail($data));
        return redirect('bayarkan');
    }else{
        $datadonatur = new Donatefundraiser;
        $datadonatur->id_donaturfdn = Uuid::generate(4);
        $datadonatur->id_qurban = $request->id_qurban;
        $datadonatur->qty = $request->qty;
        $datadonatur->bank = $request->bank;
        $datadonatur->namakonten = $request->namakonten;
        $datadonatur->nama = $request->nama;
        $datadonatur->nama_qurban = $request->nama_qurban;
        $datadonatur->total = preg_replace("/[^0-9]/", "", $request->harga);
        $datadonatur->id_users = $request->id_users;
        $datadonatur->id_fundraise = $request->id_fundraise;
        $datadonatur->email = $request->email;
        $datadonatur->nomorhp = $request->nomorhp;
        $datadonatur->komentar = $request->komentar;
        $datadonatur->status = $request->status;
        $datadonatur->kode = mt_rand(100,999);
        $datadonatur->url = $request->url;
        
        $datadonatur->save();
        $data = array(
            'nama'      =>  $request->nama,
            'bank'      =>  $request->bank,
            'kode'      =>  $request->kode,
            'namakonten' => $request->namakonten,
            'total'   =>   $request->total

        );


        // Mail::to($mail)->send(new SendMail($data));
        return redirect('bayarkan');
    }
        // dd($datadonatur);

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
        // dd('gg');





}

public function donaturfdnshow($id){
    $donatur = Donatefundraiser::where('id_donaturfdn', $id)->first();
        // dd($donatur);
    $data = explode(" ",$donatur->bank);
    $bank = Bank::where('nama', $data[0])->first();

    return view ('bayardonasi', compact('donatur','data','bank'));
}

public function editprof(){
    $users = User::all();
    return view ('user.edit_profil',compact('users'));

}

public function editusers($id)

{
   $users = User::findOrFail($id);
   return view('user.edit_profiles',compact('users'));
}

public function updateusr($id, Request $request)

{
   $usr = User::findOrFail($id);
   $usr->name = $request->name;
   $usr->email = $request->email;
   $usr->nomorhp = $request->nomorhp;

   $usr->save();
   Session::flash('sukses','Profil berhasil diupdate ');
   return redirect('dashboarded');
}

public function editpass()
{
    $id = Auth::user()->id;
    $users = User::findOrFail($id);
    return view('user.edit_pass',compact('users'));
}

public function updatepass(Request $request)
{
    $request->validate([
        'password_lama' => 'required|min:8',
        'password_baru' => 'required_with:konfirmasi|same:konfirmasi|min:8',
        'konfirmasi' => 'required|min:8'
    ]);

    $id = $request->id_hidden;
    $hashedPassword = Auth::user()->password;

    if (\Hash::check($request->password_lama , $hashedPassword )) {
        if (!\Hash::check($request->password_baru , $hashedPassword)) {
            $users =user::find(Auth::user()->id);
            $users->password = bcrypt($request->password_baru);
            user::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));

            Session::flash('sukses','Kata Sandi berhasil diupdate ');
            return redirect('dashboarded');
        }else{
          return redirect('editpass')->with('error', 'kata sandi baru tidak boleh sama dengan kata sandi lama');
        }
    }else{
        return redirect('editpass')->with('error', 'kata sandi lama tidak cocok');
    }

}

public function semuauser(){
    $users = User::all();
    return view ('akun.index',compact('users'));

}

public function tambahuser(){
   return view('akun.create');
}

public function level (Request $request){
   $id = $request->id_user;
   $data = User::find($id);
        //  dd($data);
   $data->update([
    'level' => $request->level,
]);
   return redirect('allakun');
}

public function adduser(Request $request){
   $user = new User;
   $user->name = $request->name;
   $user->email_verified_at = $request->email_verified_at;
   $user->email = $request->email;
   $user->level = $request->level;
   $user->nomorhp = $request->nomorhp;
   $user->password = Hash::make($request->password);
        //  dd($user);
   $user->save();
   return redirect('allakun');
}


public function rombakuser($id)

{
   $users = User::findOrFail($id);
   return view('akun.edit',compact('users'));
}

public function rombakan($id, Request $request)

{
    $us = User::find($id);
    $us->name = $request->name;
    $us->level = $request->level;
    $us->nomorhp = $request->nomorhp;
    $us->email = $request->email;
    $us->password = Hash::make($request->password);
    $us->save();

    return redirect('allakun');
}


public function editinfos($id)

{
    $info = Infocerita::findOrFail($id);
    return view('user.edit_info',compact('info'));
}

public function updateinfos($id, Request $request)

{
    $info = Infocerita::findOrFail($id);

    $input = $request->all();
    $detail=$request->artikel;

    @$dom = new \domdocument();
    @$dom->loadHtml($detail, libxml_use_internal_errors(true));
    $images = @$dom->getelementsbytagname('img');

    foreach($images as $k => $img){
      $data = $img->getattribute('src');

      list($type, $data) = explode(';', $data);
      list(, $data)      = explode(',', $data);

      $data = base64_decode($data);
      $image_name= time().$k.'.png';
      $path = '/home/akhmad/public_html/upload/'. $image_name;

      file_put_contents($path, $data);

      $img->removeattribute('src');
      $img->setattribute('src', '/upload/'.$image_name);
  }

  $detail = @$dom->savehtml();
  $input['artikel'] = $detail;

  $info->update($input);
  Session::flash('sukses','Info Campaign Telah Di Edit ');
  return redirect('galangdana');
}

public function storeinfo(Request $request){
    $input = $request->all();
    $detail=$request->artikel;

    $dom = new \domdocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
    foreach($images as $k => $img){
        $data = $img->getattribute('src');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name= time().$k.'.png';
        $path = '/home/akhmad/public_html/upload/'. $image_name;

        file_put_contents($path, $data);

        $img->removeattribute('src');
        $img->setattribute('src', '/upload/'.$image_name);
    }

    $detail = $dom->savehtml();
    $input['artikel'] = $detail;



    $request->validate([
        'artikel' => 'required', 
    ],[
        'artikel.required' => 'yoi' 
    ]); 
    Infocerita::create($input);
    Session::flash('sukses','Berhasil Update Info ');
    return redirect('galangdana');
}


public  function unggulan(){
    $list = Post::all();
    $data = Post::where('unggulan', 1)->get();
    return view ('unggulan' ,compact('data', 'list'));
}

public function post_unggulan(Request $request){
    $id = $request->id_konten;
    $data = Post::find($id);
    $data->update([
        'unggulan' => 1,
    ]);
    return redirect('unggulan');
}

public function hapus_unggulan($id){
    $data = Post::find($id);
    $data->update([
        'unggulan' => null,
    ]);
    return redirect('unggulan');
}

public  function utama(){
    $list = Post::all();
    $data = Post::where('campaign', 1)->get();
    return view ('cam_utama' ,compact('data', 'list'));
}

public function post_utama(Request $request){
    $id = $request->id_konten;
    $data = Post::find($id);

    $data->update([
        'campaign' => 1,
    ]);

    return redirect('utama');
}

public function hapus_utama($id){
    $data = Post::find($id);
    $data->update([
        'campaign' => null,
    ]);
    return redirect('utama');
}



public function ramadhan(){
    $list_post = Qurban::orderBy('created_at','desc')->paginate(50);
    $qurban = Qurban::where('jenis','qurban')->get();
    $ramadhan = Qurban::where('jenis','ramadhan')->get();

        // dd($qurban);


        // dd($list_donatur);
    return view ('ramadhan', compact('list_post','qurban','ramadhan'));

}

public function qurbansaya(){
    $data = Qurban::where('jenis','qurban')->first();
    $data1 = Qurban::where('jenis','ramadhan')->first();
    $donatur = Dataqurban::get();
    return view ('user.qurban_saya',compact('donatur','data','data1'));
}


public function create_ramadhan(){
    return view('create_ramadhan');
}

public function add_ramadhan(Request $request){
        // $i = Qurban::where('jenis', $request->jenis)->first();
    $input = $request->all();
        // dd($input);
        // $post = new \App\Post;
        // $post->title = $request->title;
        // $post->id_category = $request->id_category;
        // $post->deskripsi = $request->deskripsi;
        // $post->kategori = $request->kategori;

    if($request->hasFile('gambar')){
        $image = $request->file('gambar');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $input['imagename'] = $image_name;
                // dd($input['imagename']);

                // $destinationPath = 'thumbnail';
                // $img = Image::make($image->getRealPath());
                // $img->resize(300, 300, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$input['imagename']);

            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
                // $post->gambar = $image_name;
            $input['gambar'] = $image_name;
                // dd($input['gambar']);


        }
    }

        // dd('selesai');

    $detail=$request->deskripsi;

    $dom = new \domdocument();
    libxml_use_internal_errors(true);
    $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
    foreach($images as $k => $img){
        $data = $img->getattribute('src');

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);

        $data = base64_decode($data);
        $image_name= time().$k.'.png';
        $path = '/home/akhmad/public_html/upload/'. $image_name;
        $path = 'upload/'. $image_name;
        file_put_contents($path, $data);

        $img->removeattribute('src');
        $img->setattribute('src', '/upload/'.$image_name);
    }

    $detail = $dom->savehtml();
    $input['deskripsi'] = $detail;
        // $input['aktif'] = 0;
    $input['harga'] = preg_replace("/[^0-9]/", "", $request->harga);


    $request->validate([
        'judul' => 'required', 
        'deskripsi' => 'required', 
        'link' => 'required', 
            // 'id_' => 'required', 
    ]); 

        // dd($request->gambar);

        // $post->save();
    Qurban::create($input);
    return redirect('ramadhan');
}

public function edit_ramadhan($id)

{
  $title = "Edit";
    //   $category = Category::get();
  $post = Qurban::findOrFail($id);

  $detail=$post->deskripsi;

  $dom = new \domdocument();
  libxml_use_internal_errors(true);
  $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
  $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
  foreach($images as $k => $img){
    $data = $img->getattribute('src');

    $data = base64_encode(file_get_contents('/home/akhmad/public_html' .$data));
    $base = 'data:image/png;base64,';
    $img->removeattribute('src');
    $img->setattribute('src', $base.$data);
}

$detail = $dom->savehtml();
$post['deskripsi'] = $detail;

return view('editramadhan',compact('title','post'));
}

public function update_ramadhan($id, Request $request)

{
  $title = "Update";
  $post = Qurban::findOrFail($id);

  $input = $request->all();
  if($request->hasFile('gambar')){
    $image = $request->file('gambar');
    if(isset($post->gambar)&&file_exists('gambarUpload/'.$post->gambar)){
        unlink('gambarUpload/'.$post->gambar);
    }

    if($image->isValid()){
        $image_name = $image->getClientOriginalName();
        $input['imagename'] = $image_name;
            // dd($input['imagename']);

            // $destinationPath = 'thumbnail';
            // $img = Image::make($image->getRealPath());
            // $img->resize(300, 300, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($destinationPath.'/'.$input['imagename']);
            // $image_name = $image->getClientOriginalName();
        $upload_path = 'gambarUpload';
        $image->move($upload_path, $image_name);
        $input['gambar'] = $image_name;
    }



}

$detail=$request->deskripsi;

@$dom = new \domdocument();
@$dom->loadHtml($detail, libxml_use_internal_errors(true));
$images = @$dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
foreach($images as $k => $img){
    $data = $img->getattribute('src');

    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);

    $data = base64_decode($data);
    $image_name= time().$k.'.png';
    $path = '/home/akhmad/public_html/upload/'. $image_name;

    file_put_contents($path, $data);

    $img->removeattribute('src');
    $img->setattribute('src', '/upload/'.$image_name);
}

$detail = @$dom->savehtml();
$input['deskripsi'] = $detail;

$post->update($input);
return redirect('ramadhan');
}

public function destroy_ramadhan($id)

{

  $post = Qurban::findOrFail($id);

    //   $data = Dataqurban::where('id_qurban', $id)->first();
    //   if(isset($post->gambar)&&file_exists('gambarUpload/'.$post->gambar)){
    //     unlink('gambarUpload/'.$post->gambar);
    //   }
    // dd($post);

  $post->delete();
    //   $data->delete();
  return redirect('ramadhan');
}


public function status_acc($id){
    $date = Qurban::where('id_qurban',$id)->first();
        // dd($date);
    $status_now = $date->status;
    
    if($status_now == 1){
        Qurban::where('id_qurban',$id)->update([
            'status'=>0
        ]);
    }else{
        Qurban::where('id_qurban',$id)->update([
            'status'=>1
        ]);
    }
    return redirect('ramadhan');
}

public function qurban($coba){
    $sma_list = Qurban::where('status',1)->where('aktif',1)->where('jenis', $coba)->orderBy('created_at','desc')->paginate(12);
        //  $jumlah = DataDonatur::where('status', 1)->paginate(1);
        // dd('yyy');
    return view ('user.qurban', compact('sma_list'));

}

public function read_qurban($coba,Qurban $post){
    $list_donatur = Dataqurban::where('status',1)->where('id_qurban',$post->id_qurban)->orderBy('created_at','desc')->paginate(50);
    $total_donatur = Dataqurban::where('status',1)->where('id_qurban',$post->id_qurban)->orderBy('created_at','desc')->count();
    $list_fundraiser = Fundraiser::where('id_qurban',$post->id_qurban)->get();
    $jumlah = Dataqurban::where('id_qurban',$post->id_qurban)->where('status', 1)->sum('total');
        // $kode = DataDonatur::where('id_konten',$post->id_konten)->where('status', 1)->sum('kode');
    $info = Infocerita::where('id_qurban',$post->id_qurban)->get();
    $post_list = Qurban::all();
        // dd($list_donatur);
    return view ('readqurban', compact('post','list_donatur', 'list_fundraiser','total_donatur','info', 'jumlah'));

}

public function pembayaran($coba,Qurban $post){
    // $bank = Bank::where('norek','!=','.')->get();
    // $bak = Bank::get();
    $bank = Bank::where('norek','!=','.')->get();
    $bank_instan = Bank::where('jenis','QRIS')->get();
    $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        
        
    if(date('m') == 01){
           // dd('asd');
        $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=', date('Y')-1)->get();    
    }else{
        $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
    }
        
        // dd($bank_rek);
        
        $bak = Bank::get();

    $list_qurban = Dataqurban::get();
    return view ('menudonasi.qurbannow', compact('bank','post','list_qurban','bak','bank_instan','bank_tf','bank_rek'));

}

public function bayarqurbanview(){
    $list_donatur = Dataqurban::orderBy('created_at', 'desc')->limit(1)->paginate(1);
    $list_bank = Bank::orderBy('id')->paginate(1);
    return view('bayarqurban',compact('list_donatur','list_bank'));
}

public function bayarqurban(Request $request){
        // $input = $request->all();
    $mail = $request->email;
    $kode = $request->kode;
    if($request->nama_qurban != null){
        $nama_qurban = implode(',', $request->nama_qurban);
        $dataqurban = new Dataqurban;
        $dataqurban->id_pequrban = Uuid::generate(4);
        $dataqurban->qty = $request->jumlah;
        $dataqurban->total = preg_replace("/[^0-9]/", "",$request->harga);
        $dataqurban->nama_qurban = $nama_qurban;
        $dataqurban->bank = $request->bank;
        $dataqurban->judul = $request->namakonten;
        $dataqurban->name = $request->nama;
        $dataqurban->id_qurban = $request->id_qurban;
        $dataqurban->id_users = $request->id_users;
        $dataqurban->email = $request->email;
        $dataqurban->nohp = $request->nomorhp;
        $dataqurban->pesan = $request->komentar;
        $dataqurban->status = $request->status;
        $dataqurban->url = $request->url;
        $dataqurban->anonim = $request->anonim;
        $dataqurban->kode = mt_rand(100,999);
    } else {
        $dataqurban = new Dataqurban;
        $dataqurban->id_pequrban = Uuid::generate(4);
        $dataqurban->qty = $request->jumlah;
        if($request->donasi == null){
            $dataqurban->total = preg_replace("/[^0-9]/", "",$request->harga);
        } else {
            $dataqurban->total = preg_replace("/[^0-9]/", "",$request->donasi);
        }

        $dataqurban->nama_qurban = 0;
        $dataqurban->bank = $request->bank;
        $dataqurban->judul = $request->namakonten;
        $dataqurban->name = $request->nama;
        $dataqurban->id_qurban = $request->id_qurban;
        $dataqurban->id_users = $request->id_users;
        $dataqurban->email = $request->email;
        $dataqurban->nohp = $request->nomorhp;
        $dataqurban->pesan = $request->komentar;
        $dataqurban->status = $request->status;
        $dataqurban->url = $request->url;
        $dataqurban->anonim = $request->anonim;
        $dataqurban->kode = mt_rand(100,999);
    }


    //     $request->validate([

    //         'jumlah' => 'required', 
    //         'bank' => 'required', 
    //         'nama' => 'required', 
    //         'email' => 'required|email', 
    //         'nomorhp' => 'required|numeric', 
    //         // 'komentar' => 'required', 



    //     ],
    //     [
    //         'jumlah.required' => 'Nominal Harus diisi',
    //         'bank.required' => 'Bank Harus diisi',
    //         'nama.required' => 'Nama Harus diisi',
    //         'email.required' => 'Email Harus diisi',
    //         'nomorhp.required' => 'Kontak Harus diisi',
    //         // 'komentar.required' => 'Sampaikanlah Dukungan atau doa untuk kami .',
    //     ]
    
    // );
    

//    dd($dataqurban);

        // DataDonatur::create($input);
    $dataqurban->save();
    $data = array(
        'nama'      =>  $request->nama,
        'bank'      =>  $request->bank,
        'kode'      =>  $request->kode,
        'namakonten' => $request->namakonten,
        'jumlah'   =>   $request->jumlah
        
    );


    // Mail::to($mail)->send(new SendMail($data));
    return redirect('bayarqurban');



}



public function qurbanshow($id){
    $qurban = Dataqurban::where('id_pequrban', $id)->first();
    $data = explode(" ",$qurban->bank);
        // dd($data[0]);
    $bank = Bank::where('nama', $data[0])->first();
        // dd($bank);
    return view ('qurbanpay', compact('qurban', 'bank'));
}


public function data_ramadhan(){

    $title = "Data Perqurban & Ramadhan";
    $list_donatur = Dataqurban::orderBy('created_at', 'desc')->get();
    return view('datapequrban',compact('title','list_donatur'));

}

public function status_datarm($id){
    $data = Dataqurban::where('id_pequrban',$id)->first();
    
    $status_sekarang = $data->status;
    
    if($status_sekarang == 1){
        Dataqurban::where('id_pequrban',$id)->update([
            'status'=>0
        ]);
    }else{
        Dataqurban::where('id_pequrban',$id)->update([
            'status'=>1
        ]);
    }
    return redirect('dataramadhan');
}

public function delete_datarm($id)

{
    $donatur = Dataqurban::findOrFail($id);
    $donatur->delete();
    return redirect('dataramadhan');
}

public function statusmn($coba){
    $data = Qurban::where('jenis', $coba)->first();
    if($data->aktif == 1){
        Qurban::where('jenis', $coba)->update(['aktif' => 0]);
        return redirect('ramadhan');
    } else {
        Qurban::where('jenis', $coba)->update(['aktif' => 1]);
        return redirect('ramadhan');
    }
}

public function disclaimer(){
    $datas = Disclaimer::all();
    return view('disclaimer', compact('datas'));
}

public function edit_disclaimer($id){
    $data = Disclaimer::where('id_disclaimer', $id)->first();
    return view('editdisclaimer', compact('data'));
}

public function update_disclaimer(Request $request, $id){
    $data = Disclaimer::where('id_disclaimer', $id)->update([
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect('disclaimer');
}

public function anak_asuh(Anak $post){

    $bank = Bank::where('norek','!=','.')->get();
    $bank_instan = Bank::where('jenis','QRIS')->get();
        $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        // $bank_instan = Bank::where('jenis','QRIS')->get();
        // if(date('m' == 01)){
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_instan = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','qris')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        // if(date('m' == 01)){
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y'))->get();    
        // }else{
        //     $bank_tf = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->where('jenis','Transfer Bank')->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        // }

        if(date('m') == 01){
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m')+11)->whereYear('datadonatur.created_at','>=',date('Y')-1)->get();    
        }else{
            $bank_rek = Bank::join('datadonatur','bank.id','=','datadonatur.id_bank')->select('datadonatur.*','bank.*',DB::raw('count(datadonatur.bank) as b, bank.id as bankid'))->groupBY('datadonatur.bank')->orderBy('b','Desc')->where('status',1)->whereMonth('datadonatur.created_at','>=',date('m') -1)->whereYear('datadonatur.created_at','>=',date('Y'))->get();
        }

        // $bank_tf = Bank::where('jenis','Transfer Bank')->get();
        $bak = Bank::get();

    return view('menudonasi.anakasuh', compact('post','bank', 'bak','bank_tf','bank_rek','bank_instan'));
}

public function bayar_anakasuh(Request $request){
        // $input = $request->all();
    $mail = $request->email;
    $kode = $request->kode;



    $anakasuh = new AnakAsuh;
    $anakasuh->id_anakasuh = Uuid::generate(4);
    $anakasuh->id_users = $request->id_users;
    $anakasuh->id = $request->id;
    $anakasuh->nama_anak = $request->nama_anak;
    $anakasuh->bulan = $request->jumlah;
    $anakasuh->total = preg_replace("/[^0-9]/", "",$request->harga);
    $anakasuh->name = $request->nama;
    $anakasuh->email = $request->email;
    $anakasuh->nohp = $request->nohp;
    $anakasuh->pesan = $request->komentar;
    $anakasuh->bank = $request->bank;
    $anakasuh->kode = mt_rand(100,999);
    $anakasuh->url = $request->url;
    $anakasuh->status = $request->status;
    $anakasuh->anonim = $request->anonim;
    $anakasuh->save();

   
    //     $request->validate([

    //         'jumlah' => 'required', 
    //         'bank' => 'required', 
    //         'nama' => 'required', 
    //         'email' => 'required|email', 
    //         'nomorhp' => 'required|numeric', 
    //         // 'komentar' => 'required', 



    //     ],
    //     [
    //         'jumlah.required' => 'Nominal Harus diisi',
    //         'bank.required' => 'Bank Harus diisi',
    //         'nama.required' => 'Nama Harus diisi',
    //         'email.required' => 'Email Harus diisi',
    //         'nomorhp.required' => 'Kontak Harus diisi',
    //         // 'komentar.required' => 'Sampaikanlah Dukungan atau doa untuk kami .',
    //     ]
    
    // );
    

//    dd($dataqurban);

        // DataDonatur::create($input);
    $data = array(
        'nama'      =>  $request->nama,
        'bank'      =>  $request->bank,
        'kode'      =>  $request->kode,
        'nama anak asuh' => $request->nama_anak,
        'jumlah'   =>   $request->total
        
    );


    // Mail::to($mail)->send(new SendMail($data));
    return redirect('bayaranakasuh');



}

public function bayar_anakshow(){
    $list_donatur = AnakAsuh::orderBy('created_at', 'desc')->limit(1)->paginate(1);
    $list_bank = Bank::orderBy('id')->paginate(1);
    return view('bayaranakasuh',compact('list_donatur','list_bank'));
}

public function anakasuh_pay($id){
    $anakasuh = AnakAsuh::where('id_anakasuh', $id)->first();
    $data = explode(" ",$anakasuh->bank);
        // dd($data[0]);
    $bank = Bank::where('nama', $data[0])->first();
        // dd($bank);
    return view ('anakasuh-pay', compact('anakasuh', 'bank'));
}

public function cek_kab(){
    $provinsi_id = $_GET['id_prov'];
    $data = Kota::where('province_id', $provinsi_id)->get();

        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        // CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$provinsi_id",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => "",
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 30,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => "GET",
        // CURLOPT_HTTPHEADER => array(
        //     "key: cf4c74b41a82bde0ce903d76d7296038"
        // ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // } else {
        // //echo $response;
        // }

        // $data = json_decode($response, true);
        // for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        //     echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
        // }
    return $data;
}

public function cek_prof(){
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => "",
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 30,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => "GET",
        // CURLOPT_HTTPHEADER => array(
        //     "key: cf4c74b41a82bde0ce903d76d7296038"
        // ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        // echo "cURL Error #:" . $err;
        // } else {
        // // echo $response;
        // }
        // $data = json_decode($response, true);
        // $data['prof'] = $response;
    $data = Provinsi::all();
        // $data = json_decode($data1, true);

    return $data;
}

public function cair_dana(){

    $data = CairDana::orderBy('created_at', 'desc')->get();
    return view('pencairan_dana', compact('data'));
}

public function status_cd($id){
    $dana = CairDana::where('id_cairdana', $id)->first();
    $info = Infocerita::where('id_cairdana', $id)->count();
    $isi = "<p><b>Pencairan Dana Rp. ".number_format($dana->ajuan_dana,0,",",".")."</b></p><br><p>ke Rekening ".$dana->bank." ".substr($dana->norek,0,3)." **** **** **** ****  a/n - ".$dana->a_n."</p><br><p>Rencana Penggunaan Dana Pencairan : ".$dana->ren_dana."</p>";

    if($info <= 0){
        if($dana->status == 0){
                // dd($isi);
            $info = new Infocerita;
            $info->id_cairdana = $id;
            $info->id_konten = $dana->id_konten;
            $info->judul = 'Pencairan Dana';
            $info->artikel = $isi;
            $info->status = 1;
            $info->save();
            CairDana::where('id_cairdana', $id)->update([
                'status' => 1,
            ]);
        }
    } else {
        if($dana->status == 1){
            CairDana::where('id_cairdana', $id)->update([
                'status' => 0,
            ]);
            $data = Infocerita::where('id_cairdana',$id)->first();
            $data->delete();
        }else{
            CairDana::where('id_cairdana', $id)->update([
                'status' => 1,
            ]);
        }

    }



    return redirect('/pencairan_dana');
        // dd($id);

}

public function cairdana(Request $request){
        // dd($request->all());
    if(preg_replace("/[^0-9]/", "", $request->dana) < $request->danacair ){
        $data = new CairDana;
        $data->id = Auth::user()->id;
        $data->id_konten = $request->id_campaign;
        $data->campaigner = $request->nama_campaign;
        $data->judul_campaign = $request->campaign;
        $data->alamat = $request->lokasi;
        $data->tipe_pencairan = $request->tipe;
        $data->ajuan_dana = preg_replace("/[^0-9]/", "", $request->dana);
        $data->ren_dana = $request->rencana_dana;
        $data->tgl_penyaluran = $request->tgl_penyaluran;
        $data->bank = $request->bank;
        $data->norek = $request->norek;
        $data->a_n = $request->a_n;
        
        if($request->tipe == 'santunan_kematian')
        {
            if($request->hasFile('gambar')){
                $image = $request->file('gambar');

                if($image->isValid()){
                    $image_name = $image->getClientOriginalName();
                    $upload_path = 'gambarUpload';
                    $image->move($upload_path, $image_name);
                    $data->gambar = $image_name;
                    $input['gambar'] = $image_name;
                }
            }
            // dd($image_name);
        }else{
            $data->gambar = 'no_image';
        }
        
        $data->status = 0;
            // dd($request->link);
        $data->save();
        return redirect('/galangdanaku/'.$request->link);
    } else {
        return redirect()->back()->with('gagal', 'Nominal yang Anda ajukan tidak dapat dicairkan');
    }


}

public function hapus_danas($id){
 $data = CairDana::findOrFail($id);
 $data->delete();

 return redirect('/pencairan_dana');
}

public function edit_cair($id){
    $data = CairDana::where('id_cairdana', $id)->first();
    return view('editcairdana', compact('data'));
        // dd('')
}

public function update_cairdana(Request $request, $id){
    CairDana::where('id_cairdana', $id)->update([
        'campaigner' => $request->campaigner,
        'judul_campaign' => $request->judul_campaign,
        'alamat' => $request->alamat,
        'ajuan_dana' => preg_replace("/[^0-9]/", "", $request->ajuan_dana),
        'ren_dana' => $request->ren_dana,
        'tgl_penyaluran' => $request->tgl_penyaluran,
        'bank' => $request->bank,
        'norek' => $request->norek,
        'a_n' => $request->a_n,
    ]);
    $dana = CairDana::where('id_cairdana', $id)->first();
    $isi = "<p><b>Pencairan Dana Rp. ".number_format($dana->ajuan_dana,0,",",".")."</b></p><br><p>ke Rekening ".$dana->bank." ".substr($dana->norek,0,3)." **** **** **** ****  a/n - ".$dana->a_n."</p><br><p>Rencana Penggunaan Dana Pencairan : ".$dana->ren_dana."</p>";
    Infocerita::where('id_cairdana', $id)->update([
       'artikel' => $isi,
   ]);

    return redirect('/pencairan_dana');
}

public function filter_tgl(Request $request){
   if($request->date != null && $request->bank == null && $request->campaign == null){
    $i = explode(' ',$request->date);
    $tgl_mulai = $i[0].' '.date("G:i", strtotime($i[1]));
    $tgl_berakhir = $i[3].' '.date("G:i", strtotime($i[4]));
    $data = DataDonatur::where('created_at','>=',$tgl_mulai)->where('created_at','<=',$tgl_berakhir)->get();
}
elseif($request->bank != null && $request->date == null && $request->campaign == null) {
    $data = DataDonatur::where('bank', 'like', '%'.$request->bank.'%')->get();
}
elseif($request->campaign != null && $request->bank == null && $request->date == null){
    $data = DataDonatur::where('namakonten', $request->campaign)->get();
}
elseif($request->date != null && $request->bank != null && $request->campaign == null){
    $i = explode(' ',$request->date);
    $tgl_mulai = $i[0].' '.date("G:i", strtotime($i[1]));
    $tgl_berakhir = $i[3].' '.date("G:i", strtotime($i[4]));
    $data = DataDonatur::where('bank', 'like', '%'.$request->bank.'%')->WhereBetween('created_at', [$tgl_mulai, $tgl_berakhir])->get();
}
elseif($request->date != null && $request->campaign != null && $request->bank == null){
    $i = explode(' ',$request->date);
    $tgl_mulai = $i[0].' '.date("G:i", strtotime($i[1]));
    $tgl_berakhir = $i[3].' '.date("G:i", strtotime($i[4]));
    $data = DataDonatur::where('namakonten', $request->campaign)->whereBetween('created_at', [$tgl_mulai, $tgl_berakhir])->get();
}
elseif($request->bank != null && $request->campaign != null && $request->date == null){
    $data = DataDonatur::where('namakonten', $request->campaign)->where('bank', 'like', '%'.$request->bank.'%')->get();
}
elseif($request->date != null && $request->bank != null && $request->campaign != null){
    $i = explode(' ',$request->date);
    $tgl_mulai = $i[0].' '.date("G:i", strtotime($i[1]));
    $tgl_berakhir = $i[3].' '.date("G:i", strtotime($i[4]));
    $data = DataDonatur::where('namakonten', $request->campaign)->where('bank', 'like', '%'.$request->bank.'%')->whereBetween('created_at', [$tgl_mulai, $tgl_berakhir])->get();
}

return $data;
}



}
