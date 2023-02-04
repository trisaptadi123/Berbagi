<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Category;
use App\Tag;
use Auth;
use Image;
class ArticleController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		$title = "Data Artikel";
		
		$id_user = Auth::user()->id;
		$user = Auth::user()->level;
		if ($user == "admin"){
		    $list_artikel = Artikel::join('category', 'artikel.id', '=', 'category.id')->orderByDesc('id_artikel')->get();
		}else{
		    $list_artikel = Artikel::where('id_user', $id_user)->join('category', 'artikel.id', '=', 'category.id')->orderByDesc('id_artikel')->get();
		}
		
		return view('artikel.index', compact('title', 'list_artikel'));
	}

	public function create(){
		$title = "Tambah Data Artikel";
		$list_category = Category::all();
		$list_tag = Tag::all();
		return view ('artikel.create', compact('title','list_category','list_tag'));
	}

	public function add(Request $request){
		$input = $request->all();
		$penulis = Auth::user()->name;
		$id_user = Auth::user()->id;
		
		$input['id_user'] = $id_user;
		$input['penulis'] = $penulis;
		
		$id = $request->id;
		$kat = Category::findOrFail($id);
		$kat = $kat->name;
		$kategori = str_replace(" ","-", $kat);
		
		$jud = $request->judul;
		$string = str_replace(array('[\', \']'), '', $jud);
        $string = preg_replace('/\[.*\]/U', '', $jud);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $jud);
        $string = htmlentities($jud, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $jud );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $jud);
        $judul = strtolower(trim($string, '-'));
		$input['deskripsi'] = $judul;
		$input['status'] = 1;
		/*if($request->hasFile('gambar')){
			$image = $request->file('gambar');

			if($image->isValid()){
				$image_name = $image->getClientOriginalName();
				$upload_path = 'gambarUpload/artikel';
				$image->move($upload_path, $image_name);
				$input['gambar'] = $image_name;
			}
		}*/
		if($request->hasFile('gambar')){
            $image = $request->file('gambar');

            if($image->isValid()){
                $image_name = $image->getClientOriginalName();
                $input['imagename'] = $image_name;

                $destinationPath = 'thumbnail';
                // $imge = Image::make($image->getRealPath());
                // $imge->resize(300, 300, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$input['imagename']);
                
                
                // $image_name = $image->getClientOriginalName();
                // $upload_path = 'gambarUpload/artikel';
                // $image->move($upload_path, $image_name);
                // $input['gambar'] = $image_name;
                
                $img = $_POST['bases'];
                if($img == null){
                    // $image_name = $image->getClientOriginalName();
                    $upload_path = 'gambarUpload/artikel';
                    $image->move($upload_path, $image_name);
                    $input['gambar'] = $image_name;
                }else{
    				$img = str_replace('data:image/png;base64,', '', $img);
    				$img = str_replace(' ', '+', $img);
    				$data = base64_decode($img);
    				$name = uniqid() . '.png';
    				$file = "gambarUpload/artikel/" .$name;
    				file_put_contents($file, $data);
    
    				$input['gambar'] = $name;
                }
            }
        }


		Artikel::create($input);
		return redirect('artikel');

	}

	public function edit($id)
	{
		$title = "Edit Artikel";
		$list_category = Category::all();
		$list_tag = Tag::all();
		$artikel = Artikel::findOrFail($id);
		return view('artikel.edit',compact('title','artikel','list_category','list_tag'));
	}

	public function update($id, Request $request)

	{
		$title = "Update";
		$artikel = Artikel::findOrFail($id);
		$user = Auth::user()->level;
		$id_user = Auth::user()->id;
		$penulis = Auth::user()->name;

		$input = $request->all();
		
		if($user != "admin"){
		    $input['penulis'] = $penulis;
		}
		
		$id = $request->id;
		$kat = Category::findOrFail($id);
		$kat = $kat->name;
		$kategori = str_replace(" ","-", $kat);
		
		$jud = $request->judul;
		$string = str_replace(array('[\', \']'), '', $jud);
        $string = preg_replace('/\[.*\]/U', '', $jud);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $jud);
        $string = htmlentities($jud, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $jud );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $jud);
        $judul = strtolower(trim($string, '-'));
		$input['deskripsi'] = $judul;
		$input['status'] = 1;

		if($request->hasFile('gambar')){
			$image = $request->file('gambar');

			if($image->isValid()){
			    $image_name = $image->getClientOriginalName();
                $input['imagename'] = $image_name;
                // // dd($input['imagename']);

                $destinationPath = 'thumbnail';
                // $imge = Image::make($image->getRealPath());
                // $imge->resize(300, 300, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/'.$input['imagename']);
                
				$img = $_POST['bases'];
                if($img == null){
                    // $image_name = $image->getClientOriginalName();
                    $upload_path = 'gambarUpload/artikel';
                    $image->move($upload_path, $image_name);
                    $input['gambar'] = $image_name;
                }else{
    				$img = str_replace('data:image/png;base64,', '', $img);
    				$img = str_replace(' ', '+', $img);
    				$data = base64_decode($img);
    				$name = uniqid() . '.png';
    				$file = "gambarUpload/artikel/" .$name;
    				file_put_contents($file, $data);
    
    				$input['gambar'] = $name;
                }
			}
		}

		$artikel->update($input);
		return redirect('artikel');
	}

	public function destroy($id)
	{
		$artikel = Artikel::findOrFail($id);
		$artikel->delete();
		return redirect('artikel');
	}
	
	public function acc($id){
        $data = Artikel::where('id_artikel',$id)->first();

        $status_sekarang = $data->status;

        if($status_sekarang == 1){
            Artikel::where('id_artikel',$id)->update([
                'status'=>0
            ]);
        }else{
            Artikel::where('id_artikel',$id)->update([
                'status'=>1
            ]);
        }
        return redirect('artikel');
    }

	public function berbagiinfo(){
		$title = "Berbagi Info";
		$list_artikel = Artikel::join('category', 'artikel.id', '=', 'category.id','category.id')->get();
		return view('artikel.berbagi.index', compact('title', 'list_artikel'));
	}
}
