<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //

    public function getPosts(Request $request){
        $posts = DB::table('posts')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->get();
    return view('dashboard',['posts'=>$post]);
    //    return $posts;
    }

    public function addPost(Request $request){
        if(session()->has('user-token')){
            $data = $request->validate([
                'content'=>'required|string',
            ]); 
    
            $post = Post::create([
                'content'=>$data['content'],
                'user_id'=>session('user-token')->id]);
            return redirect('/dashboard')->with('message','Record Added Successfully👍!');
            } else{
                return redirect('/login')->with('message','Login to continue 😒!');
            }
    }

    // public function commentForPost(Request $request){

    // }
}
