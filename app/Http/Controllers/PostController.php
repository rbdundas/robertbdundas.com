<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Post;

class PostController extends Controller
{
    public function viewPost(Request $request)
    {
        $post = Post::where([['id', '=', $request['post_id']],['published', '=', 1]])->get()->first();
        $post->load('author');
        Log::debug($post);
        return view('post', ['post' => $post]);
    }
}
