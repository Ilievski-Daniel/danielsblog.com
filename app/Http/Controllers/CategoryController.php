<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('/all-posts', ['categories' => $categories, 'posts' => $posts]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function insert(Request $request){
        $category = new Category;
        $category->name = $request->categoryName;
        $category->save();
        return redirect('/');
    }

    public function homeNavigation()
    {
        $categories = Category::all();
        $posts = Post::all();
        return view('/index', ['categories' => $categories, 'posts' => $posts]);     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->categoryName;
        $category->save();
        return redirect('/admin');
    }

    public function showEdits($id){
        $post = Post::find($id);
        $categories = Category::all();
        $category_id = DB::table('post_category')->where('post_id', $id)->first();
        return view('/edit-category')
        ->with('id', $id)
        ->with('categories', $categories)
        ->with('category_id', $category_id)
        ->with('post', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin');
    }
}
