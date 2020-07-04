<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

    public function editPost(Request $request)
    {
        $post = Post::where('id', '=', $request['post_id'])->get()->first();
        Log::debug($post);
        return view('editpost', ['post' => $post]);
    }

    public function savePost(Request $request)
    {
        if ($request['post_id']) {
            $post = Post::where('id', '=', $request['post_id'])->get()->first();
        } else {
            $post = new Post();
        }

        $post['title'] = $request['title'];
        $post['subtitle'] = $request['subtitle'];
        $post['summary'] = $request['summary'];
        $post['article'] = $request['article'];
        $post['user_id'] = Auth::user()->id;

        Log::debug($post);
        $post->save();
        return redirect()->route('post.view', ['post_id' => $post['id']]);
    }
}
