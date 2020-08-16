@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title" >
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Blog</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- Search Start Here -->
    <section class=" py-5 ">
        <div class="container py-4 text-center">
            <form class="blog-search mx-auto d-flex" action="{{ route('blog.index-front') }}">
                <input name="search" type="text" class="form-control" placeholder="Search Posts..." />
                <input type="submit"/>
            </form>
        </div>
    </section>
    <!-- Search End Here -->

    @if($featuredPost)
    <!-- Blog Start Here -->
    <section class=" pb-5 main-blog">
        <div class="container ">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    @if(!empty($featuredPost->featured_image))
                    <img src="{{ $featuredPost->featured_image }}" alt="" />
                    @endif
                    <ul class="list-unstyled d-flex pl-4 pt-3">
                        <li class="pr-4"><img class="pr-2" src="{{ asset('assets/images/user.png') }}" alt="" />By {{ !empty($featuredPost->user) ? $featuredPost->user->name : 'Admin' }}</li>
                        <li><img class="pr-2" src="{{ asset('assets/images/date.png') }}" alt="" />{{ !empty($featuredPost->published_at) ? date('M d, Y',strtotime($featuredPost->published_at)) : date('M d, Y',strtotime($featuredPost->created_at)) }}</li>
                    </ul>
                    <h4 class="fw-600">{{ $featuredPost->title }}</h4>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Blog End Here -->

    <!-- Fact Start -->

    <section class="fact-state ">
        <div class="container  text-center blue-border-top py-5">

            <div class="row">
                <div class=" col-md-4 mb-5 text-center text-md-left">
                    <div class="d-md-flex align-items-center ">
                        <div class="icon-box">
                            <span class="rounded-circle d-inline-block"></span>
                            <img class="pl-4" src="assets/images/hospitals.png" alt="" />
                        </div>
                        <div class="ml-md-5">
                            <span class="counter h2 fs-42 font-weight-bold " data-count="150">0</span> <span class="fs-42 font-weight-bold ">+</span>
                            <h4 class="open-sans fs-15 text-uppercase font-weight-bold">Hospitals</h4>
                        </div>
                    </div>
                </div>

                <div class=" col-md-4 mb-5 text-center text-md-left">
                    <div class="d-md-flex align-items-center ">
                        <div class="icon-box">
                            <span class="rounded-circle d-inline-block"></span>
                            <img class="pl-4" src="assets/images/doctor.png" alt="" />
                        </div>
                        <div class="ml-md-5">
                            <span class="counter h2 fs-42 font-weight-bold " data-count="1000">0</span> <span class="fs-42 font-weight-bold ">+</span>
                            <h4 class="open-sans fs-15 text-uppercase font-weight-bold">Doctors</h4>
                        </div>
                    </div>

                </div>

                <div class=" col-md-4 mb-5 text-center text-md-left">
                    <div class="d-md-flex align-items-center ">
                        <div class="icon-box">
                            <span class="rounded-circle d-inline-block"></span>
                            <img class="pl-4" src="assets/images/treatment.png" alt="" />
                        </div>
                        <div class="ml-md-5">
                            <span class="counter h2 fs-42 font-weight-bold " data-count="0">0</span> <span class="fs-42 font-weight-bold ">+</span>
                            <h4 class="open-sans fs-15 text-uppercase font-weight-bold">Dental and eye check-up</h4>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- Fact End -->


    <!-- Blog Item Start Here -->

    <section class="  py-5">
        <div class="container py-4 text-center">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="row ">
                        @if( !empty($posts) )
                            @foreach($posts as $post)
                        <div class="col-md-6 mb-5">
                            <div class="blog-item bg-white position-relative">
                                @if( !empty($post->featured_image ))
                                    <img src="{{ asset($post->featured_image) }}" alt=""/>
                                @endif
                                <ul class="list-unstyled d-flex px-4 pt-3 ">
                                    <li class="pr-4"><img class="pr-2" src="{{ asset('assets/images/user.png') }}" alt="" />By {{ !empty($post->user) ? $post->user->name : 'Admin' }}</li>
                                    <li><img class="pr-2" src="{{ asset('assets/images/date.png') }}" alt="" />{{ !empty($post->published_at) ? date('M d, Y',strtotime($post->published_at)) : date('M d, Y',strtotime($post->created_at)) }}</li>
                                </ul>
                                <h6 class="fw-600 px-4">{{ $post->title }}</h6>
                                <div class=" x-0 position-absolute b-0 text-center"><a href="{{ route('blog.show-front',['slug' => $post->slug])  }}" class="themebtn ">READ MORE</a></div>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 ">
                    <div class="blog-sidebar text-left">
                        <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">RESOURCE COTEGORIES</h6>
                        <ul class="list-unstyled mb-0 px-4">
                            <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('blog.index-front') }}">All ({{ $totalCount }}) <i
                                            class="fas fa-chevron-right"></i></a></li>
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                    <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}
                                            ({{ $category->posts->count() }})<i class="fas fa-chevron-right"></i></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 happy-patients mt-5">

                   <ul class="pagination justify-content-center">
                        {!! $posts->links() !!}
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <!-- Blog Item Eend Here -->
@endsection