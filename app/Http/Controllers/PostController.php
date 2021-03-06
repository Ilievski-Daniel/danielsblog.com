<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostCategories;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $post->user_id = $request->author;
        $post->shortDesc = $request->shortDesc;
        $post->content = $request->content;
        $post->save();
        
        $postcategories = new PostCategories;
        $postcategories->post_id = $post->id;
        $postcategories->category_id = $request->category;
        $postcategories->save();
        return redirect('/home');
    }

    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('/home');
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->postName = $request->postName;
        $post->user_id = $request->author;
        $post->shortDesc = $request->shortDesc;
        $post->content = $request->content;
        $post->save();
        return redirect('/home');
    }

    public function showPost($id){
        $categories = Category::all();
        $comments = DB::table('post_comment')->where('post_id', $id)->get();
        $comm = Comment::all();
        $category_id = DB::table('post_category')->where('post_id', $id)->first();
        $post = Post::find($id);
        return view('post')
        ->with('id', $id)
        ->with('categories', $categories)
        ->with('comments', $comments)
        ->with('comm', $comm)
        ->with('category_id', $category_id)
        ->with('post', $post);
    }

    public function showEdits($id){
        $post = Post::find($id);
        $categories = Category::all();
        $category_id = DB::table('post_category')->where('post_id', $id)->first();
        return view('/edit-post')
        ->with('id', $id)
        ->with('categories', $categories)
        ->with('category_id', $category_id)
        ->with('post', $post);
    }

    public function showDashPosts($id){
        $posts = DB::table('posts')->where('user_id', $id)->get();
        $post_categories = DB::table('post_category')->where('post_id', $id)->get();
        $categories = Category::all();
        return view('/posts-dash')
        ->with('id', $id)
        ->with('post_categories', $post_categories)
        ->with('posts', $posts)
        ->with('categories', $categories);
    }

    public function authorPosts($id){
        $categories = Category::all();
        $posts = Post::all();
        $user = DB::table('users')->where('id', $id)->first();
        return view('/author-posts')
        ->with('id', $id)
        ->with('categories', $categories)
        ->with('posts', $posts)
        ->with('user', $user);
    }

}
