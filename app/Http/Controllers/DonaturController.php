<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataDonatur;
use App\Bank;

class DonaturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = "Metode Pembayaran";
        $list_donatur = DataDonatur::all();
        return view('datadonatur.index',compact('title','list_donatur'));
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
      $title = "Edit";
      $donatur = DataDonatur::findOrFail($id);
      return view('datadonatur.edit',compact('title','datadonatur'));
  }

  public function update($id, Request $request)

  {
      $title = "Update";
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
            'status'=>1
        ]);
    }
    return redirect('datadonatur');
}

}
