@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">{{ $testimonial->title }}</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- testimonial Start Here -->

    <section class="  py-5">
        <div class="container py-4 ">
            <div class="theme-bg t-v-box">
                <div class="row ">
                    <div class="col-lg-5 mb-4">
                        <div class="cursor" data-toggle="modal" data-target="#exampleModalCenter1">
                            <img class="shadow" src="{{ asset('assets/images/video-image.jpg') }}" alt=""/>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <h2 class="section-title fw-600 text-left">{{ $testimonial->title }}
                            , {{ $testimonial->place }}</h2>
                        {!! $testimonial->description !!}
                    </div>
                </div>
            </div>
            @if(count($testimonial->images))
            <div class="row testimonial-image-box text-center">
                <h4 class="col-md-12 fw-600 mb-3">Testimonial</h4>
                <div class="col-md-6 mx-auto">
                    <div class="testimonial-image  owl-theme owl-carousel">

                        @foreach($testimonial->images as $image)
                        <div class="item">
                            <img src="{{ asset($image->featured_image) }}" alt=""/>
                        </div>
                            @endforeach


                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    @if(!empty($relatedTestimonials->count()))
    <section class="pt-5  happy-patients">
        <div class="container py-4 text-center ">
            <h2 class="section-title fw-600 blue-border-top pt-5">You May Also Be Interested In</h2>
            <div class="row ">
                @foreach($relatedTestimonials as $relatedTestimonial)
                <div class="col-md-6 col-xl-4 mb-5">
                    <div class="blog-item with-ease knowledge bg-white position-relative">
                        <img class="border" src="{{ asset($relatedTestimonial->image) }}" alt=""/>
                        <div class="p-4 text-center">
                            <h6 class="fw-600 ">{{ $relatedTestimonial->title }}, {{ $relatedTestimonial->place }}</h6>
                            {!! substr($relatedTestimonial->short_description,0, 120) !!}
                        </div>
                        <div class=" x-0 position-absolute b-0 text-center"><a href="{{ route('testimonial.show-front',['slug' => $relatedTestimonial->slug]) }}"
                                                                               class="themebtn ">READ MORE</a></div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Knowledge Center Item Eend Here -->
@endsection
<!--modal video start  here-->
<div class="modal video-flex-modal  fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" position-relative">
                <a class="close position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>

                <div class="embed-responsive embed-responsive-16by9">

                    <iframe class="embed-responsive-item" id="vidpop" src="{{ $testimonial->video_url }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>