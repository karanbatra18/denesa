<?php

namespace App\Http\Controllers;

use App\KnowledgeCenter;
use App\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKnowledgeCenter;
use App\Http\Requests\UpdateKnowledgeCenter;
use App\Category;

class KnowledgeCenterController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $query = KnowledgeCenter::whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $knowledgeCenters = $query->paginate(10);

        $totalCount = $query->count();

        $categories = Category::where(['type' => 'news'])->get();
        $topics = Topic::where(['type' => 'news'])->get();
        return view('knowledge_center.index', compact('knowledgeCenters', 'categories', 'topics', 'totalCount'));

    }

    public function indexCategory($slug)
    {
        $category = Category::where(['slug' => $slug])->first();
        $query = $category->knowledge_centers()->whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $knowledgeCenters = $query->paginate(10);

        $totalCount = KnowledgeCenter::whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        })->count();

        $categories = Category::where(['type' => 'news'])->get();
        $topics = Topic::where(['type' => 'news'])->get();
        return view('knowledge_center.index', compact('knowledgeCenters', 'categories', 'topics', 'totalCount'));

    }

    public function indexTag($slug)
    {
        $topic = Topic::where(['slug' => $slug])->first();
        $query = $topic->knowledgeCenters()->whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $knowledgeCenters = $query->paginate(10);

        $totalCount = $query->count();

        $categories = Category::where(['type' => 'news'])->get();
        $topics = Topic::where(['type' => 'news'])->get();
        return view('knowledge_center.index', compact('knowledgeCenters', 'categories', 'topics', 'totalCount'));

    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $query = KnowledgeCenter::whereStatus('publish')->where(function($q) {
            $q->where('published_at', '<=' , Carbon::now())
                ->orWhereNull('published_at');
        });

        $totalCount = $query->count();

        $knowledgeCenter = KnowledgeCenter::whereSlug($slug)->firstOrFail();
        $categories = Category::where(['type' => 'news'])->get();
        $recentKnowledgeCenters = KnowledgeCenter::where('id','!=',$knowledgeCenter->id)->latest()->limit(3)->get();
        $similarKnowledgeCenters = KnowledgeCenter::where('id','!=',$knowledgeCenter->id)->latest()->limit(3)->get();
        return view('knowledge_center.show', compact('knowledgeCenter', 'recentKnowledgeCenters' , 'categories', 'totalCount'));
    }

    
}
