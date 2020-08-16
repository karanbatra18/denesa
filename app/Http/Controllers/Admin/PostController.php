<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where(['type' => 'post'])->get();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * @param StorePost $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePost $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        if(isset($data['category_id']))
        {
            $category_id = $data['category_id'];
            unset($data['category_id']);
        }

        $post = Post::create($data);
        if(!empty($category_id)) {
            $post->categories()->attach($category_id);
        }

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       // dd($post);
        $categories = Category::where(['type' => 'post'])->get();
        $categoryPosts = $post->categories()->pluck('categories.id')->toArray();
        return view('admin.post.create', compact('post','categories','categoryPosts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $data['user_id'] = auth()->id();
        $category_id = [];
        if(isset($data['category_id']))
        {
            $category_id = $data['category_id'];
            unset($data['category_id']);
        }

        Post::whereId($id)->update($data);
        $post = Post::find($id);
        $post->categories()->sync($category_id);

        return redirect()->route('admin.post.index');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }

    
    public function editCounters() {

    }

    public function updateCounters() {

    }
}
