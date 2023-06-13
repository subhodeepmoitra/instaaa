<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\like;
use App\Models\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       /*  $posts = DB::table('posts')->select('username','description','post')->where('userEmail', Auth::user()->email)->get();
        return view('home', compact('posts')); */
        $posts = DB::table('posts')->select('id','username','description','post','likes')->get();
        return view('ManagePost.home', compact('posts'));


    }

    public function profile(){
/*
        $posts = DB::table('posts')->select('username','description','post')->get();
        return view('ManagePost.home', compact('posts')); */

        $posts = DB::table('posts')->select('username','description','post','likes')->where('userEmail', Auth::user()->email)->get();
        return view('home', compact('posts'));

    }

    public function like($postid, $like){
       // return "test";
      if($like > 0){
        $likedata = new like();
        $likedata->postid=$postid;
        $likedata->like=$like;
        $likedata->useremail=Auth::user()->email;
        $likedata->save();
      } else {
        like::where('postid', $postid)->where('useremail', Auth::user()->email)->delete();
      }

       $post = Post::find($postid);
       $post->likes=$post->likes + $like;
       $post->save();
       // $likedata = like::create([$postid, $like, Auth::user()->email]);
        //return redirect('/home');
        return "Like Success";
    }
}
