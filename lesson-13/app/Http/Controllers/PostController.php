<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{

    public function getAllPosts(){


        return view("Posts",["Posts"=>Post::get()]);
    }
    public function getRecentPosts()
    {
        $posts = Post::get();
        return view("Posts",["Posts"=>
            collect($posts)->reject(
                function($post){
                    $createTime = Carbon::parse($post->created_at)->addHour(2);
                    $nowDate = new Carbon;
                    return $createTime<$nowDate;
            })]);
    }
    public function getPost($title){
        $post = Post::select(['title','body'])->where("title",$title)
            ->first();
        return view('Post',['title'=>$post->title,'body'=>$post->body]);
    }

    public function createPost(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/posts');
    }
    public function getForm(){
        return view('form');
    }
}
