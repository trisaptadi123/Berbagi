<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Category;
use App\Tag;
use Auth;
use Image;

class BerbagiinfoController extends Controller
{
	// public function index(){
	// 	$title = "Berbagi Info";
	// 	$kategoriall = Category::all();
	// 	$list_artikel = Artikel::join('category', 'artikel.id', '=', 'category.id')->where('status', 1)->orderByDesc('id_artikel')->paginate(10);
	// 	return view('artikel.berbagi.info', compact('title', 'list_artikel','kategoriall'));
	// }

	public function index(){
		$title = "Berbagi Info";
		$kategoriall = Category::all();
		$list_artikel = Artikel::join('category', 'artikel.id', '=', 'category.id')->where('status', 1)->orderByDesc('id_artikel')->paginate(10);
		return view('artikel.berbagi.info', compact('title', 'list_artikel','kategoriall'));
	}
	

	function load_data_artikel(Request $request)
	{
  		if($request->ajax())
  		{
      		if($request->id > 0)
      		{
				$data = Artikel::join('category', 'artikel.id', '=', 'category.id')
				->where('id_artikel', '<', $request->id)
				->orderBy('id_artikel', 'DESC')
				->where('status',1)
				->limit(10)
				->get();
     		}
     		else
     		{
				$data = Artikel::join('category', 'artikel.id', '=', 'category.id')
				->orderBy('id_artikel', 'DESC')
				->where('status',1)
				->limit(10)
				->get();
     		}
     		$output = '';
     		$last_id = '';

     		if(!$data->isEmpty())
     		{
         	foreach($data as $artikel)
         	{
				$char = array(' ');
		        $judul = str_replace($char,'-', $artikel->judul);
				$kalimat_kecil = strtolower($artikel->judul);
                $kalimat_new = ucwords($kalimat_kecil);
                $arr = explode(" ", $kalimat_new);
				$read = '<a href="'.url('berbagiinfo/'.$artikel->name.'/'.$artikel->deskripsi).'"><u style="color:#1f5daa">Baca Selengkapnya!</u></a>';
				$kalimat_kecil = strtolower($artikel->isi);
				$kalimat_new = ucwords($kalimat_kecil);
				$is = explode(" ", $kalimat_new);
				if($artikel->gambar == null){
					$p = '';
				}else{
					$p = $artikel->gambar;
				}
				$output .= '<div class="row" style="margin-bottom: 0px; background:#fff;">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all box-1" >
									<div class="row">
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<div class="full nyumput2">
												<img class="img-responsive" src="'.asset('gambarUpload/artikel/'.$p).'" alt="#">
											</div>
											<div class="product_img nyumput">
												<img class="img-responsive" src="'.asset('gambarUpload/artikel/'.$p).'" alt="#">
											</div>
										</div>
										<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
											<h4 style="top:0; margin : 0;">'.implode(" ",array_splice($arr,0,10)). '</h4>
											<p style="margin-top: 10px; font-size: 12px;">'.$artikel->name.' <span class="fa fa-check" style="color:#1f5daa;"></span></p>
											<hr style="margin-top: -10px;">
											<p align = "font-size: 14px; margin-top: -10px;">'.implode(" ",array_splice($is,0,20)). "... ".$read .' </p>
										</div>
									</div>
								</div>
							</div>';     

				$last_id = $artikel->id_artikel;        
        	}
			// return($last_id);
			$output .= '<br><br>
			<div class="d-flex justify-content-center">
			<div id="load_more">
			<a href="javascript:void(0)" style="color: #00aeef" name="load_more_button" data-id="'.$last_id.'" id="load_more_button">Lihat Lainnya</a>
			</div>
			</div>
			';
    		}
    		else
    		{
			$output .= '
			<div class="d-flex justify-content-center">
			<div id="load_more">
			<a href="#" name="load_more_button" style="color: #00aeef">Data tidak ada</a>
			</div>
			</div>
			';
 			}
 			echo $output;
		}
	}

	/*public function infoberbagi(Artikel $infoberbagi){
	    $id = $infoberbagi->id;
	    $kategori = Category::findOrFail($id);
	    $kategoriall = Category::all();
		return view ('artikel.berbagi.detail', compact('infoberbagi','kategori','kategoriall'));
	}*/
	public function berbagiinfo($kategori, $deskripsi){
	    $kate = Category::where('name', '=' ,$kategori)->first();
	    $id = $kate->id;
	    $kategori = Category::findOrFail($id);
	    
	    $kategoriall = Category::all();
	    $infoberbagi = Artikel::select('artikel.id_user','artikel.id', 'artikel.judul','artikel.penulis','artikel.isi','artikel.deskripsi','artikel.gambar','artikel.created_at')->join('category', 'artikel.id', '=', 'category.id')->where('artikel.id','=' ,$id)->Where('artikel.deskripsi','=' ,$deskripsi)->first();
	    
		return view ('artikel.berbagi.detail', compact('infoberbagi','kategori','kategoriall'));
	}
	public function berbagiinfo_me($kategori, $deskripsi){
	    $kate = Category::where('name', '=' ,$kategori)->first();
	    $id = $kate->id;
	    $kategori = Category::findOrFail($id);
	    $name = Auth::user()->name;
	    $kategoriall = Category::all();
	    $infoberbagi = Artikel::select('artikel.id_user','artikel.id', 'artikel.judul','artikel.penulis','artikel.isi','artikel.deskripsi','artikel.gambar','artikel.created_at')->join('category', 'artikel.id', '=', 'category.id')->where('artikel.id','=' ,$id)->Where('artikel.deskripsi','=' ,$deskripsi)->first();
	    
		return view ('artikel.berbagi.details', compact('infoberbagi','kategori','kategoriall','name'));
	}
	public function kategori($kategori){
	    $kate = Category::where('name', '=' ,$kategori)->first();
	    
	    $id = $kate->id;
	    $list_artikel = Artikel::join('category', 'artikel.id', '=', 'category.id')->where('artikel.id','=' ,$id)->where('status', 1)->orderByDesc('id_artikel')->paginate(10);
	    $kategoriall = Category::all();
		return view ('artikel.berbagi.kategori', compact('list_artikel','kategori','kategoriall'));
	}
	public function kategori_me($kategori){
	    $kate = Category::where('name', '=' ,$kategori)->first();
	    
	    $id = $kate->id;
	    $id_user = Auth::user()->id;
	    $list_artikel = Artikel::join('category', 'artikel.id', '=', 'category.id')->where('artikel.id_user','=' ,$id_user)->where('artikel.id','=' ,$id)->orderByDesc('id_artikel')->paginate(10);
	    $kategoriall = Category::all();
		return view ('artikel.berbagi.kategori_me', compact('list_artikel','kategori','kategoriall'));
	}

	// public function cariartikel(Request $request){
	// 	$sc = $request->get('cari');
    // $kategori = Category::all();
    // $wilayah = DB::table('posts')->distinct()->where('nama_kota','!=',null)->get(['nama_kota']);
    // $result = Post::where('title','LIKE','%'.$sc.'%')->where('status',1)->paginate(2);
    // $sma_list = Qurban::where('judul','LIKE','%'.$sc.'%')->paginate(2);
    // return view ('cariartikel',compact('sc','result','sma_list', 'kategori', 'wilayah'));
	// }

	public function buat_info($user){
	    $list_category = Category::all();
		return view ('artikel.berbagi.add_artikel', compact('user', 'list_category'));
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
		$input['status'] = 0;
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
                // // dd($input['imagename']);

                $destinationPath = 'thumbnail';
                $img = Image::make($image->getRealPath());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
                
                
                $image_name = $image->getClientOriginalName();
                $upload_path = 'gambarUpload/artikel';
                $image->move($upload_path, $image_name);
                // $post->gambar = $image_name;
                $input['gambar'] = $image_name;
            }
        }


		Artikel::create($input);
		return redirect('dashboarded');

	}

	public function edit($id)
	{
		$title = "Edit Artikel";
		$list_category = Category::all();
		$list_tag = Tag::all();
		$artikel = Artikel::findOrFail($id);
		return view('artikel.edit',compact('title','artikel','list_category', 'list_tag'));
	}
	
	public function infome($nama){
		$title = "Berbagi Info - ".$nama;
		$kategoriall = Category::all();
		$tagall = Tag::all();
		$id = Auth::user()->id;
		$list_artikel = Artikel::join('category', 'artikel.id', '=', 'category.id')->where('id_user', $id)->orderByDesc('id_artikel')->paginate(10);
		$list_artikel = Artikel::join('tag', 'artikel.id', '=', 'tag.id')->where('id_user', $id)->orderByDesc('id_artikel')->paginate(10);
		return view('artikel.berbagi.artikel_me', compact('title', 'list_artikel','kategoriall', 'tagall'));
	}

	public function seo($id)
    {
        //Tambahkan meta tag title
        meta('title', $article->title);

        //tambahkan meta tag description
        meta('description', $article->description);

    }

	public function showArticle($id)
{
    $article = Article::find($id);
    $tagall = Tag::all();

    return view('artikel.berbagi.detail', [
        'article' => $article,
        'tagall' => $tagall,
    ]);
}


}
