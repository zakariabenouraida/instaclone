<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function store(Post $post)
    // {
    //     return $post->caption;
    // }

    public function store(User $user)
    {
        return auth()->user()->likes()->toggle($user->post);
        // return auth()->user()->likes()->toggle($user->post);

    }
}
