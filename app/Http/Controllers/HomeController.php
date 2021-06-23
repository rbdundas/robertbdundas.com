<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

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
    public function home(Request $request)
    {
        $articles = DB::table('posts')
            ->join('post_types', 'posts.post_type_id', '=', 'post_types.id')
            ->where('post_types.type', '=', "article")
            ->select('posts.*', 'post_types.type')
            ->get();

        $wp_articles = DB::connection('wp')
            ->select('select * from hoainsur_a2wp965.wpnt_posts');

        $projects = DB::table('posts')
            ->join('post_types', 'posts.post_type_id', '=', 'post_types.id')
            ->where('post_types.type', '=', "project")
            ->select('posts.*', 'post_types.type')
            ->get();

        //Log::debug($articles);
        //Log::debug($projects);
        Log::debug((string)$wp_articles);
        return view('welcome', ['projects'=> $projects, 'articles' => $articles, 'wp_articles' => $wp_articles]);
    }
}
