<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Infocerita;
use\App\Post;
use\App\Qurban;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
         
         /*$info = Infocerita::select('posts.title','info.id_konten', 'info.artikel','info.status')->join('posts', 'info.id_konten','=','posts.id_konten')->whereNotNull('info.id_konten')->orderByDESC('info.created_at')->get();*/
         /*foreach($infodata as $data){
             $info = Infocerita::join('posts', 'info.id_konten','=','posts.id_konten')->where('info.id_konten', $data->id_konten)->orderByDESC('info.created_at')->get();
             $infos [] = [
                 ];
         }*/
        //  dd($info);
        // $info = Infocerita::join('posts', 'info.id_konten', '=', 'posts.id_konten')
        //         ->where('info.id_konten', '!=', null)
        //         ->select('info.*','posts.title')
        //         ->get();
        $info = Infocerita::where('id_konten', '!=',null)->orderByDesc('id')->get();
        $data = [];
        $nama = '';
        foreach($info as $k =>$v){
            $data[$v['id_konten']][] = [
                'id' => $v->id,
                'artikel' => $v->artikel,
                'status' => $v->status,
                'created_at' => $v->created_at,
            ];
            // $post = Post::where('id_konten', $v->id_konten)->first();
            
            // $cc[] = [
            //         'id' =>  $data[$v['id_konten']],
            //         'artikel' => $h[]
            //     ];
        }
        
        
            
        // dd($data);
        // $info = Infocerita::select('posts.title','info.id_konten', 'info.artikel','info.status','info.created_at')->join('posts', 'posts.id_konten','=','info.id_konten')->where('info.id_konten', '!=', null)->groupBy('info.id_konten')->get();
        return view('info.index',compact('info','data'));
    }
    
    public function inforamadhan(){
        $info = Infocerita::where('id_qurban', '!=', null)->get();
        // dd($info);
        return view('info.inforamadhan',compact('info'));
    }

    public function create($post){
        $data = Post::where('deskripsi', $post)->first();
        $qurban = Qurban::where('link', $post)->first();
        // dd('bnm');
        $link = $post;

        return view ('info.create',compact('data', 'qurban', 'post'));
}

public function store(Request $request){
    // dd('ghf');
    $input = $request->all();
    // dd('kjhjk');
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
    if($input['id_konten'] != null){
    $input['status']=0;
    }else{
    $input['status']=1;
    }
        
  

    $request->validate([
        'artikel' => 'required',  
    ],[
        'artikel.required' => 'yoi' 
    ]); 
    Infocerita::create($input);
    if($input['id_konten'] != null){
    
    return redirect('info');
    }else{
    return redirect('inforamadhan');
    }

}


public function edit($id)

{
    $info = Infocerita::findOrFail($id);
    return view('info.edit',compact('info'));
}

public function update($id, Request $request)

{
    $info = Infocerita::findOrFail($id);

    $input = $request->all();
    /*$detail=$request->artikel;
    
    

      @$dom = new \domdocument();
      @$dom->loadHtml($detail, libxml_use_internal_errors(true));
      $images = @$dom->getelementsbytagname('img');

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
      $input['artikel'] = $detail;*/

    $info->update($input);
    if($input['id_konten'] != null){
        
        return redirect('info');
    }else{
        return redirect('inforamadhan');
    }
}

public function destroy($id)
{ 
    $info = Infocerita::findOrFail($id);
    $info->delete();
    return redirect('info');
}

public function statusinf($id){
    $data = Infocerita::where('id', $id)->first();
    // dd($data);
    if($data->status == 1){
        Infocerita::where('id', $id)->update(['status' => 0]);
        return redirect('info');
    } else {
        Infocerita::where('id', $id)->update(['status' => 1]);
        return redirect('info');
    }

}



}
