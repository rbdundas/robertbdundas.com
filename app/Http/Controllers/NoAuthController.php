<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NoAuthController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $articles = DB::table('posts')
            ->join('post_types', 'posts.post_type_id', '=', 'post_types.id')
            ->where('post_types.type', '=', "article")
            ->select('posts.*', 'post_types.type')
            ->get();

        $projects = DB::table('posts')
            ->join('post_types', 'posts.post_type_id', '=', 'post_types.id')
            ->where('post_types.type', '=', "project")
            ->select('posts.*', 'post_types.type')
            ->get();

        Log::debug($articles);
        Log::debug($projects);
        return view('welcome', ['projects'=> $projects, 'articles' => $articles]);
    }

    public function viewPost(Request $request)
    {
        $post = Post::where('id', '=', $request['id']);
        return view('post', ['post' => $post]);
    }
}
