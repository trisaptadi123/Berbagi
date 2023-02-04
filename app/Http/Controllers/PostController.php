<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\DataDonatur;
use App\User;
use Auth;
use Image;
use Illuminate\Support\Facades\Stroge;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = "Semua Campaign";
        $list_post = Post::orderBy('created_at','desc')->get();
        return view ('post.index', compact('title','list_post'));

    }

    // public function tampilan($id){
    //     $post = Post::find($id);
    //     return view ('layouts.viewdonasi', compact('post'))-> with(array('post'=>$post));

    // }

    function get(){
        $data = Post::all();
        return response()->json(
            [
                "massage"=>"Berhasil",
                "data"=>$data
            ]
            );
    }



    public function create(){
        $title = "Tambah Post";
        $user = Auth::user()->id ;
        $category = Category::get();
        $tag = Tag::get();
        $campaign = Post::where('cam_utama', 1)->get();
        return view ('post.create', compact('title','category', 'tag', 'user','campaign'));
}

public function galang(){
    $title = "Tambah Post";
    $category = Category::get();
    return view ('user.galang_dana', compact('title','category'));
}

    public function store(Request $request){
        $input = $request->all();
        // $post = new \App\Post;
        // $post->title = $request->title;
        // $post->id_category = $request->id_category;
        // $post->deskripsi = $request->deskripsi;
        // $post->kategori = $request->kategori;
        
        if($request->hasFile('gambar')){
            $image = $request->file('gambar');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $input['imagename'] = $image_name;
                // // dd($input['imagename']);

                $destinationPath = 'thumbnail';
                $imge = Image::make($image->getRealPath());
                $imge->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
                
                $img = $_POST['bases'];
                if($img == null){
                    // $image_name = $image->getClientOriginalName();
                    $upload_path = 'gambarUpload/';
                    $image->move($upload_path, $image_name);
                    $input['gambar'] = $image_name;
                }else{
    				$img = str_replace('data:image/png;base64,', '', $img);
    				$img = str_replace(' ', '+', $img);
    				$data = base64_decode($img);
    				$name = uniqid() . '.png';
    				$file = "gambarUpload/" .$name;
    				file_put_contents($file, $data);
    
    				$input['gambar'] = $name;
                }
            }
        }
        
        if($request->hasFile('rincian')){
        $image = $request->file('rincian');

        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            // $request->rincian = $image_name;
            $input['rincian'] = $image_name;
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
        if($request->id_category == 'Open Goals'){
            $input['id_category'] = $request->id_category;
        }else{
            $input['id_category'] = preg_replace("/[^0-9]/", "", $request->id_category);
            
        }
        $input['dana_iklan'] = 0;
      

        $request->validate([
            'title' => 'required', 
            'deskripsi' => 'required', 
            'artikel' => 'required', 
            'id_category' => 'required', 
        ],[
            'id_category.required' => 'yoi' 
        ]); 

        // dd($request->id_category);
        

        // $post->save();
        Post::create($input);
        return redirect('post');
        
       

    }

    function post(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->deskripsi = $request->deskripsi;
        $post->kategori = $request->kategori;
        $post->tag = $request->tag;
        $post->gambar = $request->gambar;
        $post->artikel = $request->artikel;
        $post->save();
        return response()->json(
            [
           
                "pesan"=>"upload sukses",
                "data"=> $post
            ]
        );
       
    }

    public function show(Post $post){
        $list_post = Post::get();
        return view ('post.show',compact('post'));
    }

//   public function edit($id)

//   {
//       $title = "Edit";
//       $category = Category::get();
//       $post = Post::findOrFail($id);
//       return view('post.edit',compact('title','post','category'));
//   }

//   public function update($id, Request $request)

//   {
//       $title = "Update";
//       $post = Post::findOrFail($id);

//       $input = $request->all();
//       if($request->hasFile('gambar')){
//         $image = $request->file('gambar');
//         if(isset($post->gambar)&&file_exists('gambarUpload/'.$post->gambar)){
//             unlink('gambarUpload/'.$post->gambar);
//         }

//         if($image->isValid()){
//             $image_name = $image->getClientOriginalName();
//             $upload_path = 'gambarUpload';
//             $image->move($upload_path, $image_name);
//             $input['gambar'] = $image_name;
//         }

        

//       }

//       $post->update($input);
//       return redirect('post');
//   }

public function edit($id)

  {
      $title = "Edit";
      $category = Category::get();
      $tag = Tag::get();
      $post = Post::findOrFail($id);
      $campaign = Post::where('cam_utama', 1)->get();
      $detail=$post->artikel;

        $dom = new \domdocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml(mb_convert_encoding($detail, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        //loop over img elements, decode their base64 src and save them to public folder,
        //and then replace base64 src with stored image URL.
        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            $data = base64_encode(file_get_contents('/home/akhmad/public_html' .$data));
            $base = 'data:image/png;base64,';
            $img->removeattribute('src');
            $img->setattribute('src', $base.$data);
        }

        $detail = $dom->savehtml();
        $post['artikel'] = $detail;

        return view('post.edit',compact('title','post','category','campaign'));
  }

  public function update($id, Request $request)

  {
      $title = "Update";
      $post = Post::findOrFail($id);

      $input = $request->all();
      if($request->hasFile('gambar')){
        $image = $request->file('gambar');
        if(isset($post->gambar)&&file_exists('gambarUpload/'.$post->gambar)){
            unlink('gambarUpload/'.$post->gambar);
        }
        
        if($image->isValid()){
            $image_name = $image->getClientOriginalName();
            $upload_path = 'gambarUpload';
            $image->move($upload_path, $image_name);
            $input['gambar'] = $image_name;
        }
        
        

    //     if($image->isValid()){
    //          $image_name = $image->getClientOriginalName();
    //         $input['imagename'] = $image_name;
    //         // dd($input['imagename']);

    //         $destinationPath = 'thumbnail';
    //         $img = Image::make($image->getRealPath());
    //         $img->resize(300, 300, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save($destinationPath.'/'.$input['imagename']);
            
    //       if($img == null){
    //             // $image_name = $image->getClientOriginalName();
    //             $upload_path = 'gambarUpload/';
    //             $image->move($upload_path, $image_name);
    //             $input['gambar'] = $image_name;
    //         }else{
				// $img = str_replace('data:image/png;base64,', '', $img);
				// $img = str_replace(' ', '+', $img);
				// $data = base64_decode($img);
				// $name = uniqid() . '.png';
				// $file = "gambarUpload/" .$name;
				// file_put_contents($file, $data);

				// $input['gambar'] = $name;
    //         }
    //     }

        

      }
      
      if($request->hasFile('rincian')){
        $image = $request->file('rincian');
        if(isset($post->rincian)&&file_exists('gambarUpload/'.$post->rincian)){
            unlink('gambarUpload/'.$post->rincian);
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
            $input['rincian'] = $image_name;
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
         if($request->id_category == 'Open Goals'){
            $input['id_category'] = $request->id_category;
        }else{
            $input['id_category'] = preg_replace("/[^0-9]/", "", $request->id_category);
            
        }

      $post->update($input);
      DataDonatur::where('id_konten', $id)->update([
          'id_camutama' => $request->id_camutama,
      ]);
      
      return redirect('post');
  }

  public function statused($id){
    $date = Post::where('id_konten',$id)->first();

    $status_now = $date->status;

    if($status_now == 1){
        Post::where('id_konten',$id)->update([
            'status'=>0
        ]);
    }else{
        Post::where('id_konten',$id)->update([
            'status'=>1
        ]);
    }
    return redirect('post');
}

public function ketubah($id){
    

        Post::where('id_konten',$id)->update([
            'keterangan_dokumen' => '1'
    ]);
    // dd($date->keterangan_dokumen);
    return redirect('post');
}

public function ketubahs($id){
    
        Post::where('id_konten',$id)->update([
            'keterangan_dokumen' => '0'
        ]);
    // dd($data);
    return redirect('post');
}













//   -----------------------DATA API-----------------------------------

  function put($id, Request $request){
    $post = Post::where('id', $id)->first();
    if($post){
        $post->judul = $request->title? $request->judul : $post->title;
        $post->deskripsi = $request->deskripsi? $request->deskripsi : $post->deskripsi;
        $post->kategori = $request->kategori? $request->kategori: $post->kategori;
        $post->tag = $request->tag? $request->tag: $post->tag;
        $post->gambar = $request->gambar? $request->gambar: $post->gambar;
        $post->artikel = $request->artikel? $request->artikel: $post->artikel;
        $post->save();
     
        return response()->json(
            [
                "massage"=>"Berhasil ",
                "data"=> $post
            ]
            );
    }
    return response()->json(
        [
            "massage"=>"Gagal ! " .$id
        ], 400
        );
}

  public function destroy($id)

  {
      
      $post = Post::findOrFail($id);
      if(isset($post->gambar)&&file_exists('gambarUpload/'.$post->gambar)){
        unlink('gambarUpload/'.$post->gambar);
    }

      $post->delete();
      return redirect('post');
  }

  function delete($id){
    $post = Post::where('id', $id)->first();
    if($post){
        $post->delete();
        return response()->json(
            [
           
                "pesan"=>"delete sukses".$id
            ]
        );
    }
  
   
}




}