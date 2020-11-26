<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Stroge;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = "Publish Konten";
        $list_post = Post::all();
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
        $category = Category::get();
        return view ('post.create', compact('title','category'));
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
                $upload_path = 'gambarUpload';
                $image->move($upload_path, $image_name);
                // $post->gambar = $image_name;
                $input['gambar'] = $image_name;
            }
        }
       
        // $post->artikel = $request->artikel;

        $request->validate([
            'title' => 'required', 
            'deskripsi' => 'required', 
            'artikel' => 'required', 
            'id_category' => 'required', 
        ],[
            'id_category.required' => 'yoi' 
        ]); 

        // $post->save();
        Post::create($input);
        return redirect('post');
        
       

    }

    function post(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->deskripsi = $request->deskripsi;
        $post->kategori = $request->kategori;
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

  public function edit($id)

  {
      $title = "Edit";
      $category = Category::get();
      $post = Post::findOrFail($id);
      return view('post.edit',compact('title','post','category'));
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

        

      }
      
    

      $post->update($input);
      return redirect('post');
  }

  function put($id, Request $request){
    $post = Post::where('id', $id)->first();
    if($post){
        $post->judul = $request->title? $request->judul : $post->title;
        $post->deskripsi = $request->deskripsi? $request->deskripsi : $post->deskripsi;
        $post->kategori = $request->kategori? $request->kategori: $post->kategori;
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
