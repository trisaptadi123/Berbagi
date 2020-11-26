<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodak;

class ProdakController extends Controller
{
    function post(Request $request){
        $produk = new Prodak;
        $produk->name = $request->name;
        $produk->price = $request->price;
        $produk->quantity = $request->quantity;
        $produk->active = $request->active;
        $produk->description = $request->description;
        
        $produk->save();
        return response()->json(
            [
                "massage"=>"Berhasil",
                "data"=>$produk
            ]
            );
    }

    function get(){
        $data = Prodak::all();
        return response()->json(
            [
                "massage"=>"Berhasil",
                "data"=>$data
            ]
            );
    }

    function getById($id){
        $data = Prodak::where('id', $id)->get();
        return response()->json(
            [
                "massage"=>"Berhasil",
                "data"=>$data
            ]
            );
    }


    function put($id, Request $request ){
        $produk = Prodak::where('id', $id)->first();
        if($produk){
            $produk->name = $request->name ? $request->name : $produk->name;
            $produk->price = $request->price ? $request->price : $produk->price;
            $produk->quantity = $request->quantity ? $request->quantity : $produk->quantity;
            $produk->active = $request->active ? $request->active : $produk->active;
            $produk->description = $request->description ? $request->description : $produk->description;
            return response()->json(
                [
                    "massage"=>"Berhasil " .$id
                ]
                );
        }
        return response()->json(
            [
                "massage"=>"Gagal ! " .$id
            ], 400
            );
       
    }

    function delete($id){
        return response()->json(
            [
                "massage"=>"DELETE Method Succes" .$id
            ]
            );
    }

}
