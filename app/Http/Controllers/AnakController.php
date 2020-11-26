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
        $anak = Anak::all();
        return view('anak.index',compact('anak','title'));
    }

    public function create(){
        $title = "Tambah Data Anak";
        return view ('anak.create', compact('title'));
}

public function store(Request $request){
    $input = $request->all();        
    if($request->hasFile('foto_anak')){
        $image = $request->file('foto_anak');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            // $post->gambar = $image_name;
            $input['foto_anak'] = $image_name;
        }
    }
    // $post->save();
    Anak::create($input);
    return redirect('anak');
    
   

}

public function destroy($id)
{ 
    $anak = Anak::findOrFail($id);
    $anak->delete();
    return redirect('anak');
}

    
}
