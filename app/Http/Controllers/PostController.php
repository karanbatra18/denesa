<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Category;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $query = Post::whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $posts = $query->paginate(10);

        $totalCount = $query->count();

        $categories = Category::where(['type' => 'post'])->get();

        return view('post.index', compact('posts', 'categories', 'topics', 'totalCount'));

    }

    public function indexCategory($slug)
    {
        $category = Category::where(['slug' => $slug])->first();
        $query = $category->posts()->whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $posts = $query->paginate(10);

        $totalCount = Post::whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        })->count();

        //$totalCount = $query->count();

        $categories = Category::where(['type' => 'post'])->get();



        return view('post.index', compact('posts', 'categories', 'topics', 'totalCount'));

    }


    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $relatedPosts = Post::where('id','!=',$post->id)->latest()->limit(3)->get();
        return view('post.show', compact('post','relatedPosts'));
    }

    
}
