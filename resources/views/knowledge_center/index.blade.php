@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Knowledge Center</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- Knowledge Center Item Start Here -->

    <section class="  py-5">
        <div class="container py-4 text-center">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="row ">
                        @if( !empty($knowledgeCenters) )
                            @foreach($knowledgeCenters as $knowledgeCenter)
                        <div class="col-md-6 mb-5">
                            <div class="blog-item with-ease knowledge bg-white position-relative">
                                @if( !empty($knowledgeCenter->featured_image ))
                                <img src="{{ asset($knowledgeCenter->featured_image) }}" alt=""/>
                                @endif
                                <ul class="list-unstyled d-flex px-4 pt-3 justify-content-center">
                                    <li class="pr-4"><img class="pr-2" src="assets/images/user.png" alt=""/>By
                                        {{ !empty($knowledgeCenter->user) ? $knowledgeCenter->user->name : ''}}
                                    </li>
                                    <li><img class="pr-2" src="assets/images/date.png" alt=""/>{{ !empty($knowledgeCenter->published_at) ? date('M d, Y',strtotime($knowledgeCenter->published_at)) : date('M d, Y',strtotime($knowledgeCenter->created_at)) }}</li>
                                </ul>
                                <div class="px-4 ">
                                    <h6 class="fw-600 ">{{ $knowledgeCenter->title }}</h6>
                                    <p> {!! substr($knowledgeCenter->short_description, 0, 400) !!}</p>
                                </div>
                                <div class=" x-0 position-absolute b-0 text-center"><a href="{{ route('knowledge-center.show', ['slug' => $knowledgeCenter->slug]) }}"
                                                                                       class="themebtn ">READ MORE</a>
                                </div>

                            </div>
                        </div>
                            @endforeach
                        @endif



                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="blog-sidebar text-left">
                        <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">RESOURCE
                            COTEGORIES</h6>
                        <ul class="list-unstyled mb-0 px-4">
                            <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('knowledge-center') }}">All ({{ $totalCount }}) <i
                                            class="fas fa-chevron-right"></i></a></li>
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                    <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('knowledge-center.category', $category->slug) }}">{{ $category->name }}
                                            ({{ $category->knowledge_centers->count() }})<i class="fas fa-chevron-right"></i></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="blog-sidebar text-left mt-5">
                        <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">RESOURCE TOPICS</h6>
                        <ul class="p-2 list-unstyled">
                            @if(!empty($topics))
                                @foreach($topics as $topic)
                                <a class="py-1 m-2 px-3 bg-light d-inline-block rounded" href="{{ route('knowledge-center.topic', $topic->slug) }}">{{ $topic->name }} </a>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 happy-patients mt-5">

                    <ul class="pagination justify-content-center">
                        {!! $knowledgeCenters->links() !!}
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <!-- Knowledge Center Item Eend Here -->
@endsection