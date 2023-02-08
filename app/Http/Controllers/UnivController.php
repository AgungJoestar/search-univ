<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Univ;

class UnivController extends Controller
{
    public function index()
    {
        $univ = Univ::oldest()->paginate(10);

        return view('index', compact('univ'));
    }

    public function search(Request $request)
    {
        $search = strtoupper($request->search);
        if ($search=="UIN"){
        	$search="Universitas Islam Negeri";
        }
        if($search=="IT"){
        	$search="INSTITUT TEKNOLOGI";
        }
        if($search=="UIN BANDUNG"){
        	$search="Universitas Islam Negeri Sunan Gunung Djati";
        }
        if($search=="UNISBA"){
        	$search="Universitas Islam Bandung";
        }
        
        $univ = Univ::oldest()->where('name','like',"%".strtoupper($search)."%")->paginate(10);
        return view('index', compact('univ'));
        // return $search_ex;
    }
}
