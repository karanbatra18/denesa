@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Knowledge Center {{--{{ $testimonial->title }}--}}</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- testimonial Start Here -->

    <div class="container py-4 ">
        <div class="row ">
            <div class="col-lg-8">

                <div class=" position-relative">
                    <img class="border" src="{{ asset($knowledgeCenter->featured_image) }}" alt=""/>
                    <ul class="list-unstyled d-flex pr-4 pt-3 ">
                        <li class="pr-4"><img class="pr-2" src="assets/images/user.png"
                                              alt=""/>By {{ !empty($knowledgeCenter->user) ? $knowledgeCenter->user->name : ''}}
                        </li>
                        <li><img class="pr-2" src="assets/images/date.png"
                                 alt=""/>{{ !empty($knowledgeCenter->published_at) ? date('M d, Y',strtotime($knowledgeCenter->published_at)) : date('M d, Y',strtotime($knowledgeCenter->created_at)) }}
                        </li>
                    </ul>

                    <h2 class="fw-600 section-title text-left">{{ $knowledgeCenter->title }}</h2>
                    {!! $knowledgeCenter->description !!}

                </div>

            </div>

            <div class="col-lg-4 ">
                @if(!empty($recentKnowledgeCenters))
                <div class="blog-sidebar text-left mb-4">
                    <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">RECENT RESOURCES</h6>
                    <ul class="list-unstyled mb-0 px-4">
                        @foreach($recentKnowledgeCenters as $recentKnowledgeCenter)
                            <li>
                                <a class="py-3 d-flex justify-content-between " href="{{ route('knowledge-center.show', ['slug' => $recentKnowledgeCenter->slug]) }}">
                                    <div class="w-25"><img class="shadow"
                                                           src="{{ asset($recentKnowledgeCenter->featured_image) }}"
                                                           alt/></div>
                                    <div class="w-75 pl-3"><h6 class="fw-600">{{ $recentKnowledgeCenter->title }}</h6>
                                        <img class="pr-2" src="assets/images/date.png"
                                             alt=""/>{{ !empty($recentKnowledgeCenter->published_at) ? date('M d, Y',strtotime($recentKnowledgeCenter->published_at)) : date('M d, Y',strtotime($recentKnowledgeCenter->created_at)) }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(!empty($categories))
                <div class="blog-sidebar text-left mb-4">
                    <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">CATEGORIES</h6>
                    <ul class="list-unstyled mb-0 px-4">

                        <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('knowledge-center') }}">All ({{ $totalCount }}) <i
                                        class="fas fa-chevron-right"></i></a></li>
                        @foreach($categories as $category)
                        <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('knowledge-center.category', $category->slug) }}">{{ $category->name }} ( {{ $category->knowledge_centers->count() }}) <i
                                        class="fas fa-chevron-right"></i></a></li>
                            @endforeach

                    </ul>
                </div>
                @endif
                @if(!empty($similarKnowledgeCenters))
                <div class="blog-sidebar text-left ">
                    <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">SIMILAR RESOURCES</h6>
                    <ul class="list-unstyled mb-0 px-4">
                        @foreach($similarKnowledgeCenters as $similarKnowledgeCenter)
                        <li>
                            <a class="py-3 d-flex justify-content-between " href="{{ route('knowledge-center.show', ['slug' => $similarKnowledgeCenter->slug]) }}">
                                <div class="w-25"><img class="shadow" src="{{ asset($similarKnowledgeCenter->featured_image) }}" alt/></div>
                                <div class="w-75 pl-3"><h6 class="fw-600">{{ $similarKnowledgeCenter->title }}</h6><img class="pr-2" src="assets/images/date.png"
                                                                               alt=""/>{{ !empty($similarKnowledgeCenter->published_at) ? date('M d, Y',strtotime($similarKnowledgeCenter->published_at)) : date('M d, Y',strtotime($similarKnowledgeCenter->created_at)) }}
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                    @endif
            </div>
            <div class="col-lg-12 happy-patients ">
            </div>
        </div>
    </div>
    </section>

    <!-- Knowledge Center Item Eend Here -->
@endsection
