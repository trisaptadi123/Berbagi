<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $title = "slider";
        $slider = Slide::all();
        return view('slide.index',compact('title','slider'));
    }

    public function create(){
        $title = "Tambah Slider";
        return view ('slide.create', compact('title'));
}

    public function store(Request $request){
        $input = $request->all();        
        if($request->hasFile('gambar_slide')){
            $image = $request->file('gambar_slide');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $upload_path = 'gambarUpload';
                $image->move($upload_path, $image_name);
                // $post->gambar = $image_name;
                $input['gambar_slide'] = $image_name;
            }
        }
        // $post->save();
        Slide::create($input);
        return redirect('slide');
        
       

    }

    public function edit($id)

    {
        $title = "Edit";
        $slider = Slide::findOrFail($id);
        return view('slide.edit',compact('title','slider'));
    }

    public function update($id, Request $request)

    {
        $title = "Update";
        $slider = Slide::findOrFail($id);
  
        $input = $request->all();
        if($request->hasFile('gambar_slide')){
          $image = $request->file('gambar_slide');
          if(isset($slider->gambar_slide)&&file_exists('gambarUpload/'.$slider->gambar_slide)){
              unlink('gambarUpload/'.$slider->gambar_slide);
          }
  
          if($image->isValid()){
              $image_name = $image->getClientOriginalName();
              $upload_path = 'gambarUpload';
              $image->move($upload_path, $image_name);
              $input['gambar'] = $image_name;
          }
  
          
  
        }
      
        $slider->update($input);
        return redirect('slide');
    }

    public function destroy($id)
    { 
        $slider = Slide::findOrFail($id);
        $slider->delete();
        return redirect('slide');
    }

}
