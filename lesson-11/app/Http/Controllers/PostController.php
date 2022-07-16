<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function create(){
        return view('form');
    }

    public function store(Request $request){
        DB::table('post')->insert([[
            'title'=>$request->input("title"),'body'=>$request->input("body")]]);
        return view ('form');
    }
}
