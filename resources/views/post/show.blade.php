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
        <div class="container py-4 ">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <form class="blog-search mx-auto d-flex mb-4" action="{{ route('blog.index-front') }}">
                        <input name="search" type="text" class="form-control" placeholder="Search Blog..." />
                        <input type="submit" />
                    </form>
                    <div class="blog-sidebar single-blog-sidebar text-left position-sticky">
                        <h6 class="theme-alt-bg open-sans p-4 fw-600 rounded-top text-white mb-0">TABLE OF CONTENTS</h6>
                        <ul class="list-unstyled mb-0 toc">
                                             </ul>
                    </div>
                </div>
                <div class="col-xl-9 ">
                    <div class="single-main-blog ">
                        <div class="position-relative">
                            @if(!empty($post->featured_image))
                            <img src="{{ asset($post->featured_image) }}" alt="" />
                            @endif
                            <ul class="list-unstyled d-flex pl-4 pt-3">
                                <li class="pr-4"><img class="pr-2" src="{{ asset('assets/images/user.png') }}" alt="" />By {{ !empty($post->user) ? $post->user->name : ''}}</li>
                                <li><img class="pr-2" src="{{ asset('assets/images/date.png') }}" alt="" />{{ !empty($post->published_at) ? date('M d, Y',strtotime($post->published_at)) : date('M d, Y',strtotime($post->created_at)) }}</li>
                            </ul>

                            <h2 class="fw-600 section-title text-left">{{ $post->title }}</h2>
                            {!! $post->description !!}
                            <ul class="list-unstyled social position-absolute text-center t-0  social-bg">
                                <li class="fw-600 mb-2">SHARE</li>
                                <li><a class="f mb-2" target="_blank" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="l mb-2" target="_blank" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a class="t mb-2" target="_blank" href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="w mb-2" target="_blank" href="#"><i class="fab fa-whatsapp"></i></a></li>

                            </ul>
                        </div>
                        <div class="comment-box pt-5">
                            <h4>Leave A Reply</h4>
                            <p>Your email address will not be published. Required fields are marked*.</p>
                            <form name="add_comment" id="add_comment" action="{{ route('post_comment') }}" method="post">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="col-md-12 form-group ">
                                        <label>Comment</label>
                                        <textarea class="form-control border" rows="5" name="comment">{{ old('comment') }}</textarea>
                                        @error('comment')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 form-group ">
                                        <label>Designation</label>
                                        <input type="text" class="form-control border" name="designation" value="{{ old('designation') }}" />
                                        @error('designation')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group ">
                                        <label>Name*</label>
                                        <input type="text" class="form-control border" name="name" value="{{ old('name') }}"/>
                                        @error('name')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group ">
                                        <label>Email*</label>
                                        <input type="email" class="form-control border" name="email" value="{{ old('email') }}"/>
                                        @error('email')
                                        <label class="error">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 ">

                                        <input type="submit" class="themebtn" />
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Search End Here -->

    <!-- Blog Item Start Here -->
    @if(!empty($relatedPosts))
    <section class="   happy-patients ">
        <div class="container ">
            <h2 class="fw-600 section-title text-center pt-5 blue-border-top ">You May Also Be Interested In</h2>
            <div class="row ">
                @foreach($relatedPosts as $relatedPost)
                <div class="col-xl-4 col-md-6 mb-5">
                    <div class="blog-item bg-white position-relative">
                        <img src="{{ asset($relatedPost->featured_image) }}" alt="" />
                        <ul class="list-unstyled d-flex px-4 pt-3 ">
                            <li class="pr-4"><img class="pr-2" src="{{ asset('assets/images/user.png') }}" alt="" />By {{ !empty($relatedPost->user) ? $relatedPost->user->name : ''}}</li>
                            <li><img class="pr-2" src="{{ asset('assets/images/date.png') }}" alt="" />{{ !empty($relatedPost->published_at) ? date('M d, Y',strtotime($relatedPost->published_at)) : date('M d, Y',strtotime($relatedPost->created_at)) }}</li>
                        </ul>
                        <h6 class="fw-600 px-4">{{ $relatedPost->title }}</h6>
                        <div class=" x-0 position-absolute b-0 text-center"><a href="{{ route('blog.show-front',['slug' => $relatedPost->slug]) }}" class="themebtn ">READ MORE</a></div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    @endif

    <!-- Blog Item Eend Here -->
@endsection
@section('script')
    <script>
        var hid=0;
        $('.single-main-blog  .position-relative h4').each(function() {
            $(this).attr('data-toc',hid);
            $(".toc").append('<li><a href="javascript:;" class="py-2 d-flex px-4  align-items-center"><i class="fas fa-chevron-right pr-3"></i>'+$(this).text()+'</a></li>');
            hid += 1;
        });
        $('.toc li:first-child a').addClass('active');
        $('.toc li a').on('click',function(){
            var i = $(this).closest('li').index();
            $('html, body').animate({
                scrollTop:  $('.single-main-blog  .position-relative h4').eq(i).offset().top - 60
            }, 1500, 'easeInOutQuint');
            $('.toc li a').removeClass('active');
            $(this).addClass('active');
        });
        $(window).scroll(function () {
            $('.single-main-blog  .position-relative h4').each(function () {
                if ($(window).scrollTop() > $(this).offset().top - $(window).height() + ($(this).outerHeight()/2)) {
                    var id = $(this).attr('data-toc');
                    // $('.toc button').eq(id).addClass('fw-600 theme-color').siblings().removeClass('fw-600 theme-color');
                }
            });
        });
    </script>
    @endsection
<style>
    .error{
        color:red;
    }
    </style>