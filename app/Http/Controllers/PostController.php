<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Post;

class PostController extends Controller
{
    public function listArticles(Request $request)
    {
        $articles = DB::table('posts')
            ->join('post_types', 'posts.post_type_id', '=', 'post_types.id')
            ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
            ->join('post_tags', 'posts.post_tag_id', '=', 'post_tags.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('post_types.type', '=', 'article')
            ->select('posts.*', 'post_types.type', 'post_tags.tag', 'post_categories.category', 'users.name', 'users.email')
            ->orderByRaw('posts.id DESC')
            ->get();

        Log::debug($articles);
        return view('articles', ['articles' => $articles]);
    }

    public function viewPost(Request $request)
    {
        $post = Post::where([['id', '=', $request['post_id']],['published', '=', 1]])->get()->first();
        $post->load('author');

        Log::debug($post);
        if ($request['alert']) {
            $alert = $request['alert'];
        } else {
            $alert = [];
        }

        return view('post', [
            'post' => $post,
            'alert' => $alert
        ]);
    }

    public function editPost(Request $request)
    {
        if ($request['post_id']) {
            $post = Post::where('id', '=', $request['post_id'])->get()->first();
        } else {
            $post = new Post();
        }
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
        $post['user_id'] = 1; //Auth::user()->id;

        Log::debug($post);
        $alert = [];

        if (Gate::allows('update-post', $post)) {
            $post->save();
            $alert['type'] = 'success';
            $alert['message'] = 'The post was saved.';
        } else {
            $alert['type'] = 'danger';
            $alert['message'] = 'You do not have sufficient privileges to perform this action.';
        }
        return redirect()->route('post.view', [
            'post_id' => $post['id'],
            'alert' => $alert]
        );

    }
}
