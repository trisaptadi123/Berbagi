<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = "Metode Pembayaran";
        $list_bank = Bank::all();
        return view('bank.index',compact('title','list_bank'));
    }

    public function create(){
        $title = "Tambah Post";
        return view ('bank.create', compact('title'));
}


    public function store(Request $request){
        $input = $request->all();
        // $bank = new \App\Bank;
        // $bank->nama = $request->nama;
        // $bank->norek = $request->norek;

        if($request->hasFile('logo')){
            $image = $request->file('logo');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'gambarUpload';
                $image->move($upload_path, $image_name);
                // $bank->gambar = $image_name;
                $input['logo'] = $image_name;
            }
        }

        $request->validate([
            'nama' => 'required|string|max:20', 
            'norek' => 'required', 
            
        ]); 
        Bank::create($input);
        // $bank->save();
        return redirect('bank');

    }

    public function edit($id)

  {
      $title = "Edit";
      $bank = Bank::findOrFail($id);
      return view('bank.edit',compact('title','bank'));
  }

  public function update($id, Request $request)

  {
      $title = "Update";
      $bank = Bank::findOrFail($id);

      $input = $request->all();
    
      $bank->update($input);
      return redirect('bank');
  }

  public function destroy($id)

  {
      
      $bank = Bank::findOrFail($id);
      $bank->delete();
      return redirect('bank');
  }
}
