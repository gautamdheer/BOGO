<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        Post::create($data);
        $postData = ['title' => $data['title'], 'author' => auth()->user()->name];
        event(new PostCreated($postData));

        return redirect()->back()->withSuccess('Post Created');
    }
}
