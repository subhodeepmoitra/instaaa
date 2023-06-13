<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    public function index(){
        $feed = DB::table('posts')->select('username','description','post')->get();
        return view('index', compact('feed'));
    }

    public function search(Request $request){
        $search = $request['search'] ?? "";
        if ($search != "") {
            $feed = DB::table('posts')->where('username', 'LIKE', '%' . $search .'%')->get();
        } else {
            $feed = DB::table('posts')->select('username','description','post')->get();
        }
        $feed = compact('feed', 'search');
        return view('index')->with($feed);
    }
}
