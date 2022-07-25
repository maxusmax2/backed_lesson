<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
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

    public function getPost($id){
        $comments = Post::with('comments')
            ->find($id)->comments;
        $post = Post::select(['title','body','id'])->find($id);
        return view('Post',['id'=>$id ,'title'=>$post->title,'body'=>$post->body,'userName'=>$post->name,'Comment'=>$comments]);
    }


    public function createPost(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->name = $request->name;
        $post->save();
        return redirect('/posts');
    }
    public function getForm(){
        return view('form');
    }

    public function createComment(Request $request){
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect("/post/$request->post_id");
    }

    public function getAuthorComment($id){
        $targetPost = DB::table('posts')->where('id',$id);
        $comment = DB::table('comments')
            ->joinSub($targetPost,'targetPost',function($join){
                $join->on('targetPost.name','=','comments.name')
                    ->on('targetPost.id','=','comments.post_id');
            })
            ->select('comments.*')
            ->get();

        return view('comments',['Comments'=>$comment]);
    }

}
