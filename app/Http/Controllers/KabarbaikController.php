<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kabarbaik;
use Image;

class KabarbaikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $title = "Kabar Baik";
        $kabar = Kabarbaik::orderBy('created_at', 'desc')->paginate();
        return view('kabarbaik.index',compact('kabar','title'));
    }

    public function create(){
        $title = "Tambah Cerita Penyaluran";
        return view ('kabarbaik.create', compact('title'));
}

public function store(Request $request){
    $input = $request->all();        
    if($request->hasFile('gambar_cerita')){
        $image = $request->file('gambar_cerita');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $input['imagename'] = $image_name;
             $destinationPath = 'thumbnail';
                $img = Image::make($image->getRealPath());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
                
             $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            // $post->gambar = $image_name;
            $input['gambar_cerita'] = $image_name;
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
    $input['link'] = str_replace(' ', '', $request->judul);
    // $post->save();
    Kabarbaik::create($input);
    return redirect('kabarbaik');
    
   

}
  public function edit($id)

  {
      $title = "Edit";
      $kabar = kabarbaik::findOrFail($id);

      $detail=$kabar->artikel;

        $dom = new \domdocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            $data = base64_encode(file_get_contents('/home/akhmad/public_html/'.$data));
            $base = 'data:image/png;base64,';
            $img->removeattribute('src');
            $img->setattribute('src', $base.$data);
        }

        $detail = $dom->savehtml();
        $kabar['artikel'] = $detail;
      return view('kabarbaik.edit',compact('title','kabar'));
  }

  public function update($id, Request $request)

  {
      $title = "Update";
      $kabar = Kabarbaik::findOrFail($id);

      $input = $request->all();
      if($request->hasFile('gambar_cerita')){
        $image = $request->file('gambar_cerita');
        if(isset($kabar->gambar_cerita)&&file_exists('gambarUpload/'.$kabar->gambar_cerita)){
            unlink('gambarUpload/'.$kabar->gambar_cerita);
        }

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $input['imagename'] = $image_name;
            // dd($input['imagename']);

            $destinationPath = 'thumbnail';
            $img = Image::make($image->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
            
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            $input['gambar_cerita'] = $image_name;
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

      $kabar->update($input);
      return redirect('kabarbaik');
  }


public function destroy($id)
{ 
    $kabar = Kabarbaik::findOrFail($id);
    $kabar->delete();
    return redirect('kabarbaik');
}
}
