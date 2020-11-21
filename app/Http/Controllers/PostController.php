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
    public function index(Request $request)
    {
        $search = !empty($request->search) ? $request->search : null;
        if(!empty($search)) {
            $query = Post::whereStatus('publish')->where(function($q) {
                $q->where('published_at', '<=' , Carbon::now())
                    ->orWhereNull('published_at');
            })->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhereNull('description', 'LIKE', "%{$search}%");
            });
        } else{
            $query = Post::whereStatus('publish')->where(function($q) {
                $q->where('published_at', '<=' , Carbon::now())
                    ->orWhereNull('published_at');
            });
        }


        $posts = $query->paginate(10);

        $totalCount = $query->count();

        $featuredPost = Post::where('is_featured',1)->orderBy('updated_at','desc')->first();

        $categories = Category::where(['type' => 'post'])->get();

        return view('post.index', compact('posts', 'categories',  'totalCount', 'featuredPost'));

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

    public function addComment(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255',
            'designation' => 'required|min:3|max:255',
            'comment' => 'required|min:3',
        ]);
        //dd($request->all());
        $data = $request->all();
        $post = Post::where('id',$request->post_id)->firstOrFail();
        $post->comments()->create($data);
        return redirect()->back()->with('message', 'Your comment has been sent for Admin Approval.');
    }







    
}
