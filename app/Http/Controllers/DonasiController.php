<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donasi;
use App\DataDonatur;

use DateTime;

use App\Imports\RekeningImport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Support\Collection; 

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
    
    public function import(){
        return view('testing');
    }
    
    public function import_rek(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
// 		$file = $request->file('file');
 
// 		// membuat nama file unik
// 		$nama_file = rand().$file->getClientOriginalName();
		
// 		// upload ke folder file_siswa di dalam folder public
// 		$file->move('file_rekening',$nama_file);
        
		// import data
// 		$data = Excel::import(new RekeningImport, '/home/akhmad/public_html/file_rekening/'.$nama_file);
        $data = Excel::toArray(new RekeningImport, $request->file('file'));
        $i = 0;
        $c = [];
        foreach($data[0] as $k => $v){
            // $n = ;
            // $tgl[] = $v[0];
            // $transaksi = $v[$n][3];
            $c[] = [
                // 'tgl' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($v[0]),
                'transaksi' => $v[3],
            ];
            
        }
        
        
        
        $donatur = DataDonatur::all();
        foreach($donatur as $x => $y){
            $z[] = [
                'kode' =>$y->kode,
                'jumlah' => $y->jumlah,
                'total' => $y->jumlah + $y->kode,
                // 'tgl_tf' => $y->created_at,
                ];
            
        }
        $l = array_map(function ($arr) { return $arr['transaksi']; }, $c);
        $d = array_map(function ($arr) { return $arr['total']; }, $z);
        
        $e = array_intersect_key($l, $d);
        // dd($e['total'][0]);
        
        $dat = [];
        foreach($z as $q => $p){
            for($count = 0; $count < count($e); $count++){
               if($e[$count] == $p['total']){
                   DataDonatur::where('jumlah', $p['jumlah'])->where('kode', $p['kode'])->where('status',0)->update([
                    'test' => 1,
                ]);
                    $b[] = ['benar'];
               }else{
                    $b[] = ['salah'];
               }
            }
        }
        // foreach($z as $k => $v){
        //     if($v['total'] == $e[$count]){
        //         
        //     }
        // }
        // dd($b);
        // dd($e);
        // dd($c);
        // for($j=0; $j<count($donatur);$j++){
        //     for($i=0; $i<count($data);$i++){
        //         // if(date_format($c[$i]['tgl'],"Y-m-d") == date_format($z[$j]['tgl_tf'],"Y-m-d")){
        //             if($c[$i]['transaksi'] == $z[$j]['total']){
        //                 DataDonatur::where('jumlah', $z[$j]['jumlah'])->where('kode', $z[$j]['kode'])->update([
        //                     'test' => 1,
        //                 ]);
        //                 $b[] = ['benar'];
                        
        //             }else{
        //                 $b[] = ['salah'];
        //             }
        //         // } else{
        //         //     $b[] = ['salah'];
        //         // }
        //     }
        // }
        
        // foreach($z as $o => $m){
        //     foreach($c as $j => $l){
            
        //         if($l['transaksi'] == $m['total']){
        //              DataDonatur::where('id_donatur', $m['id'])->update([
        //                 'test' => 1,
        //             ]);
        //             $b[] = ['benar'];
        //         }else{
        //             $b[] = ['salah'];
                    
        //         }
        //     }
        // }
        // dd($b);
        return redirect('/datadonatur');
    }

}
