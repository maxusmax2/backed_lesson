<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function getGalery(Request $request){
        $query = DB::table('post')
            ->select('image')
            ->get();
        foreach($query as $key=>$name)
        {
            $imageNames[] =$name->image;
        }
        return view('galery',['namesImage'=>$imageNames]);
    }
}
