<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anak;

class AnakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $title = "Data Anak";
        $anak = Anak::orderBy('created_at', 'desc')->get();
        return view('anak.index',compact('anak','title'));
    }

    public function create(){
        $title = "Tambah Data Anak";
        return view ('anak.create', compact('title'));
}

public function store(Request $request){
    $input = $request->all();        
    if($request->hasFile('gambar_anak')){
        $image = $request->file('gambar_anak');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            // $post->gambar = $image_name;
            $input['gambar_anak'] = $image_name;
        }
    }
    // $post->save();
    Anak::create($input);
    return redirect('anak');
    
   

}
  public function edit($id)

  {
      $title = "Edit";
      $anak = Anak::findOrFail($id);
      return view('anak.edit',compact('title','anak'));
  }

  public function update($id, Request $request)

  {
      $title = "Update";
      $anak = Anak::findOrFail($id);

      $input = $request->all();
      if($request->hasFile('gambar_anak')){
        $image = $request->file('gambar_anak');
        if(isset($anak->gambar_anak)&&file_exists('gambarUpload/'.$anak->gambar_anak)){
            unlink('gambarUpload/'.$anak->gambar_anak);
        }

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            $input['gambar_anak'] = $image_name;
        }

        

      }

      $anak->update($input);
      return redirect('anak');
  }
  
  public function statusanak($anak){
        // dd($donatur);
        $data = Anak::where('id',$anak)->first();
    
        $status_sekarang = $data->status;
    
        if($status_sekarang == 1){
            Anak::where('id',$anak)->update([
                'status'=>0
            ]);
        }else{
            Anak::where('id',$anak)->update([
                'status'=>1
            ]);
        }
        return redirect('anak');
    }


public function destroy($id)
{ 
    $anak = Anak::findOrFail($id);
    $anak->delete();
    return redirect('anak');
}

    
}
