<?php

namespace App\Http\Controllers;

use App\Fundraiser;
use Illuminate\Http\Request;

class FundraiserController extends Controller
{
    public function index(){
        $fundraiser = Fundraiser::all();
        return view('fundraiser.index',compact('fundraiser'));
    }

    public function destroy($id)
    {
        $donatur = Fundraiser::findOrFail($id);
        $donatur->delete();
        return redirect('fundraise');
    }

    
}
