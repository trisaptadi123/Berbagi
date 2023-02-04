<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataDonatur;
use App\Bank;
use App\Post;
use App\AnakAsuh;
use App\Anak;

class DonaturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = "Metode Pembayaran";
        $bank = Bank::all();
        $posts = Post::all();
        $list_donatur = DataDonatur::orderBy('created_at', 'desc')->get();
        return view('datadonatur.index',compact('title','list_donatur','bank','posts'));
    }

    public function create(){
        $title = "Tambah Post";
        $bank = Bank::get();
        return view ('datadonatur.create', compact('title','bank'));
}


    public function store(Request $request){
        $input = $request->all();
        // $category = new \App\Category;
        // $category->name = $request->name;
      
        $request->validate([
            'jumlah' => 'required', 
            'nama' => 'required', 
            'email' => 'required', 
            'nomorhp' => 'required', 
            // 'komentar' => 'required', 
            
        ]); 
        DataDonatur::create($input);
        // $category->save();
        return redirect('datadonatur');

    }

    public function edit($id)

      {
          $title = "Edit Data Donatur";
          $donatur = DataDonatur::findOrFail($id);
          return view('datadonatur.edit',compact('title','donatur'));
      }

  public function update($id, Request $request)

  {
      $title = "Update Data Donatur";
      $donatur = DataDonatur::findOrFail($id);

      $input = $request->all();
    
      $donatur->update($input);
      return redirect('datadonatur');
  }

  public function destroy($id)

  {
      $donatur = DataDonatur::findOrFail($id);
      $donatur->delete();
      return redirect('datadonatur');
  }

  public function status($id){
    $data = DataDonatur::where('id_donatur',$id)->first();

    $status_sekarang = $data->status;

    if($status_sekarang == 1){
        DataDonatur::where('id_donatur',$id)->update([
            'status'=>0
        ]);
    }else{
        DataDonatur::where('id_donatur',$id)->update([
            'status'=>1,
            'tanggal_acc' => date('Y-m-d H:i:s')
        ]);
    }
    return redirect('datadonatur');
}
 public function donatur_anak(){
        $title = "Data Donatur Anak";
        $list_donatur = AnakAsuh::orderBy('created_at', 'desc')->get();
        return view('dataanakasuh',compact('title','list_donatur'));
    }

    public function status_anak($donatur){
        // dd($donatur);
        $data = AnakAsuh::where('id_anakasuh',$donatur)->first();
    
        $status_sekarang = $data->status;
    
        if($status_sekarang == 1){
            AnakAsuh::where('id_anakasuh',$donatur)->update([
                'status'=>0
            ]);
        }else{
            AnakAsuh::where('id_anakasuh',$donatur)->update([
                'status'=>1,
            'tanggal_acc' => date('Y-m-d H:i:s')
            ]);
            
            Anak::where('id', $data->id)->update([
                'orangtua_asuh' => $data->name
            ]);
        }
        return redirect('datadonaturanak');
    }

    public function hapus_anak($donatur)

  {
      $data = AnakAsuh::findOrFail($donatur);
    //   dd($data);
      $data->delete();
      return redirect('datadonaturanak');
  }

}
