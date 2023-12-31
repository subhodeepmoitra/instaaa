<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use DB;

use App\Models\like;

class ManagePostController extends Controller
{
    public function RendercreatePost(Request $resquest){
        //function for rendering create post front end
        return view('ManagePost.createPost');
    }

    public function store(Request $request){
        $requestData = $request->all();
        $post = time().$request->file('post')->getClientOriginalName();
        $path = $request->file('post')->storeAs('post',$post,'public');
        $upload_path = 'post/';
        $requestData["post"] = $upload_path.$post;

        $data = Post::create($requestData);
        //dd($data);
        $likeData = new like();
        $likeData->postid =$data->id;
        //$likeData->username = $data->username;
        $likeData->save();
        return redirect('/')->with('success', "Product registration details sent successfully.");

    }
}
