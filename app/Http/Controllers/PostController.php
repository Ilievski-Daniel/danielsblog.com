<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategories;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('/add-post', ['categories' => $categories, 'posts' => $posts]);
    }
    
    public function insert(Request $request){
        $post = new Post;
        $post->postName = $request->postName;
        $post->author = $request->author;
        $post->shortDesc = $request->shortDesc;
        $post->content = $request->content;
        $post->save();
        
        $postcategories = new PostCategories;
        $postcategories->post_id = $post->id;
        $postcategories->category_id = $request->category;
        $postcategories->save();
        return redirect('/');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/admin');
    }

    public function update(Request $request, $id)
    {
        //
    }
}
