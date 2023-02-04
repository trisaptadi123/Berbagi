<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function y(){
        // if($request->jenis == 'Transfer Bank'){
//           $data = array(
//             'nama'      =>  $request->nama,
//             'bank'      =>  $request->bank,
//             'kode'      =>  $request->kode,
//             'namakonten' => $request->namakonten,
//             'jumlah'   =>   $request->jumlah

//         );
//           Mail::to($mail)->send(new SendMail($data));
//       }

//       if($request->jenis == 'QRIS'){
//       $data = array(
//         'nama'      =>  $request->nama,
//                 // ''        =>  $request->qris,
//         'namakonten'=> $request->namakonten,
//         'jumlah'    =>   $request->jumlah

//     );
//             // Mail::to($mail)->send(new SendMail($data));
//             // $mail = $request->email;
//             // Mail::send('email_template',$data,function($message) use($mail){
//             //     $message->to($mail);
//             //     $message->from('no-reply@berbagibahagia.org');
//             // });
//       Mail::to($mail)->send(new SendMail($data));
//   }
    }
}
