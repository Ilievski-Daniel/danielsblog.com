<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        $posts = Post::all();
        $comments = Comment::all();
        return view('/admin', ['categories' => $categories, 'posts' => $posts, 'comments' => $comments]);     
    }
}
