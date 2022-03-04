<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('/admin', ['categories' => $categories, 'posts' => $posts]);     
    }
}
