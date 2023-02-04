<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donatefundraiser;

class DonatefundraiserController extends Controller
{
    public function index(){
        $donatefdn = Donatefundraiser::all();
        return view('donaturfundraiser.index',compact('donatefdn'));
    }

    public function destroy($id)
    {
        $donatur = Donatefundraiser::findOrFail($id);
        $donatur->delete();
        return redirect('donatefundraiser');
    }

    public function statusfdn($id){
        $data = Donatefundraiser::where('id_donaturfdn',$id)->first();
    
        $status_sekarang = $data->status;
    
        if($status_sekarang == 1){
            Donatefundraiser::where('id_donaturfdn',$id)->update([
                'status'=>0
            ]);
        }else{
            Donatefundraiser::where('id_donaturfdn',$id)->update([
                'status'=>1
            ]);
        }
        return redirect('donatefundraiser');
    }
}
