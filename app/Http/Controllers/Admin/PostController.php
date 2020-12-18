<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Post;
use App\SiteModule;
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
        $user = auth()->user();
        $getModule = SiteModule::where('name','Blogs')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_write == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

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
        $user = auth()->user();
        $getModule = SiteModule::where('name','Blogs')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

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
        $user = auth()->user();
        $getModule = SiteModule::where('name','Blogs')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_delete == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

        $post->delete();
        $response = messageResponse(true, 'success', 'Post Successfully Deleted');
        return redirect()->route('admin.post.index')->with($response);
    }

    
    public function editCounters() {

    }

    public function updateCounters() {

    }

    public function comments(Request $request, $id) {
        $post = Post::where('id',$id)->firstOrFail();
        return view('admin.post.comments', compact('post'));
    }

    public function deleteComment(Request $request, $id) {
        $comment = Comment::where('id',$id)->firstOrFail();
        $comment->delete();
        return redirect()->back();
    }

    public function updateCommentStatus(Request $request, $id) {
        $comment = Comment::where('id',$id)->firstOrFail();
        $comment->update(['is_approved' => 1]);
        return redirect()->back();
    }
}
