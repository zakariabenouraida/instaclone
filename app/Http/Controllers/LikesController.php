<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __constuct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post)
    {
        return auth()->user()->liking()->toggle($post->id);
    }
}
