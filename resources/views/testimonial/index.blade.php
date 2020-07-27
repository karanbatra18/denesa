@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Testimonial</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- Knowledge Center Item Start Here -->

    <section class="  py-5">
        <div class="container py-4 text-center">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="row ">
                        @if( !empty($testimonials) )
                            @foreach($testimonials as $testimonial)
                        <div class="col-md-6 mb-5">
                            <div class="blog-item with-ease knowledge bg-white position-relative">
                                @if( !empty($testimonial->image ))
                                <img src="{{ asset($testimonial->image) }}" alt=""/>
                                @endif
                                <ul class="list-unstyled d-flex px-4 pt-3 justify-content-center">
                                    <li class="pr-4"><img class="pr-2" src="assets/images/user.png" alt=""/>By
                                        {{ !empty($testimonial->user) ? $testimonial->user->name : 'Admin' }}
                                    </li>
                                    <li><img class="pr-2" src="assets/images/date.png" alt=""/>{{ !empty($testimonial->published_at) ? date('M d, Y',strtotime($testimonial->published_at)) : date('M d, Y',strtotime($testimonial->created_at)) }}</li>
                                </ul>
                                <div class="px-4 ">
                                    <h6 class="fw-600 ">{{ $testimonial->title }}</h6>
                                    <p> {!! substr($testimonial->short_description, 0, 400) !!}</p>
                                </div>
                                <div class=" x-0 position-absolute b-0 text-center"><a href="{{ route('testimonial.show-front',['slug' => $testimonial->slug])  }}"
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
                        <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">FILTER COTEGORIES</h6>
                        <ul class="list-unstyled mb-0 px-4">
                            <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('testimonial.index-front') }}">All ({{ $totalCount }}) <i
                                            class="fas fa-chevron-right"></i></a></li>
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                    <li><a class="py-3 d-flex justify-content-between align-items-center" href="{{ route('testimonial.category', $category->slug) }}">{{ $category->name }}
                                            ({{ $category->testimonials->count() }})<i class="fas fa-chevron-right"></i></a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                </div>
                <div class="col-lg-12 happy-patients mt-5">

                    <ul class="pagination justify-content-center">
                        {!! $testimonials->links() !!}
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <!-- Knowledge Center Item Eend Here -->
@endsection