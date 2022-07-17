<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;


class PostController extends Controller
{
    public function create(){
        return view('form');
    }

    public function store(StorePostRequest $request){
        DB::table('post')->insert([[
            'title'=>$request->input("title"),
            'body'=>$request->input("body"),
            'image'=>mb_substr($request->photo->store('/public/images'),strlen('public/'))],
        ]);
        return view ('form');
    }
}
