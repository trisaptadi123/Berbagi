<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $title = "category";
        $list_category = Category::all();
        return view('postCategory.index',compact('title','list_category'));
    }

    public function create(){
        $title = "Tambah Post";
        return view ('postcategory.create', compact('title'));
}


    public function store(Request $request){
        $input = $request->all();
        // $category = new \App\Category;
        // $category->name = $request->name;

        $request->validate([
            'name' => 'required|string|max:20', 
            
        ]); 
        Category::create($input);
        // $category->save();
        return redirect('postcategory');

    }

    public function edit($id)

  {
      $title = "Edit";
      $category = Category::findOrFail($id);
      return view('postcategory.edit',compact('title','category'));
  }

  public function update($id, Request $request)

  {
      $title = "Update";
      $category = Category::findOrFail($id);

      $input = $request->all();
    
      $category->update($input);
      return redirect('postcategory');
  }

  public function destroy($id)

  {
      
      $category = Category::findOrFail($id);
      $category->delete();
      return redirect('postcategory');
  }
}