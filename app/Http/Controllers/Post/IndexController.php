<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $recentPosts = Post::orderBy('created_at', 'desc')->paginate(6);
        $randomPosts = Post::get()->random(4);
        $mostLikedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'desc')->take(4)->get();
        return view('post.index', compact('recentPosts', 'randomPosts', 'mostLikedPosts'));
    }
}
