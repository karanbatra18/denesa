<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KnowledgeCenter;
use App\SiteModule;
use App\Topic;
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
        $knowledgeCenters = KnowledgeCenter::get();
        return view('admin.knowledge_center.index', compact('knowledgeCenters'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','News')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_write == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

        $categories = Category::where(['type' => 'news'])->get();
        $topics = Topic::where(['type' => 'news'])->get();
        return view('admin.knowledge_center.create', compact('categories', 'topics'));
    }

    /**
     * @param StoreKnowledgeCenter $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreKnowledgeCenter $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        if(isset($data['category_id']))
        {
            $category_id = $data['category_id'];
            unset($data['category_id']);
        }

        if(isset($data['topic_id']))
        {
            $topic_id = $data['topic_id'];
            unset($data['topic_id']);
        }

        $knowledgeCenter = KnowledgeCenter::create($data);
        if(!empty($category_id)) {
            $knowledgeCenter->categories()->attach($category_id);
        }

        if(!empty($topic_id)) {
            $knowledgeCenter->topics()->attach($topic_id);
        }

        return redirect()->route('admin.knowledge_center.index');
    }

    /**
     * @param KnowledgeCenter $knowledgeCenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(KnowledgeCenter $knowledgeCenter)
    {
        return view('admin.knowledge_center.show', compact('knowledgeCenter'));
    }

    /**
     * @param KnowledgeCenter $knowledgeCenter
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(KnowledgeCenter $knowledgeCenter)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','News')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_edit == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

        $categories = Category::where(['type' => 'news'])->get();
        $categoryKnowledgeCenters = $knowledgeCenter->categories()->pluck('categories.id')->toArray();

        $topics = Topic::where(['type' => 'news'])->get();
        $topicTestimonials = $knowledgeCenter->topics()->pluck('topics.id')->toArray();

        return view('admin.knowledge_center.create', compact('knowledgeCenter','categories','categoryKnowledgeCenters','topics','topicTestimonials'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateKnowledgeCenter $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $data['user_id'] = auth()->id();
        $category_id = [];
        if(isset($data['category_id']))
        {
            $category_id = $data['category_id'];
            unset($data['category_id']);
        }

        if(isset($data['topic_id']))
        {
            $topic_id = $data['topic_id'];
            unset($data['topic_id']);
        }



        KnowledgeCenter::whereId($id)->update($data);
        $knowledgeCenter = KnowledgeCenter::find($id);

        if(!empty($category_id)) {
            $knowledgeCenter->categories()->sync($category_id);
        }

        if(!empty($topic_id)) {
            $knowledgeCenter->topics()->sync($topic_id);
        }

        return redirect()->route('admin.knowledge_center.index');
    }

    /**
     * @param KnowledgeCenter $knowledgeCenter
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(KnowledgeCenter $knowledgeCenter)
    {
        $user = auth()->user();
        $getModule = SiteModule::where('name','News')->first();
        if($user->role_id != 1) {
            $permission = getModulePermission($user->id,$getModule->id);
            if(empty($permission) || $permission->can_delete == 0) {
                $response = messageResponse(true, 'error', 'Unauthorised Access');
                return redirect()->route('dashboard')->with($response);
            }
        }

        $knowledgeCenter->delete();
        $response = messageResponse(true, 'success', 'News Successfully Deleted');
        return redirect()->route('admin.knowledge_center.index')->with($response);
    }
}
