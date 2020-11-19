<!-- Fact Start -->
@extends('layouts.main')
@section('content')

    <section class="fact-state py-5">
        <div class="container py-3">
            <p class="fs-18 text-center">{!! $introduction->description !!}</p>
            <div class="row pt-5">
                @if(!empty($overallFigures))
                    @foreach($overallFigures as $overallFigure)
                        <div class=" col-md-4 mb-4 text-center text-md-left">
                            <div class="d-md-flex align-items-center ">
                                <div class="icon-box">
                                    <span class="rounded-circle d-inline-block"></span>
                                    <img class="pl-4" src="{{ asset($overallFigure->featured_image) }}" alt=""/>
                                </div>
                                <div class="ml-md-5">
                                    <span class="counter h2 fs-42 font-weight-bold "
                                          data-count="{{ $overallFigure->total_count }}">0</span> <span
                                            class="fs-42 font-weight-bold ">+</span>
                                    <h4 class="open-sans fs-15 text-uppercase font-weight-bold">{{ $overallFigure->title }}</h4>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

    <!-- Fact End -->

    <!-- Feature Treatment Start -->

    <section class="feature-treatment pb-5">
        <div class="container py-4">
            <h2 class="section-title text-center">Featured Treatment</h2>
            <div class="row ">
                @if(!empty($treatments))
                    @foreach($treatments as $treatment)
                        <div class=" col-md-6 col-lg-4 mb-4">
                            @if(!empty($treatment->link)) <a href="{{ $treatment->link }}"> @endif <img src="{{ asset($treatment->featured_image) }}" alt=""/> @if(!empty($treatment->link)) </a> @endif
                            <div class="text-box position-relative theme-bg pt-5 px-4 pb-4">
                                <span class="d-flex align-items-center justify-content-center shadow position-absolute rounded-circle bg-white"> <img
                                                src="{{ asset($treatment->icon_image) }}" alt=""/> </span>
                                <h4 class="fw-600 mt-2"><a href="{{ $treatment->link }}">{{ $treatment->title }}</a>
                                </h4>
                                <p>{{ $treatment->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center">
                <a href="#" class="themebtn mx-2">Connect to Specialist</a>
                <a href="{{ route('treatment.indexFront') }}" class="themebtn alt-btn mx-2">View All Treatments</a>
            </div>
        </div>
    </section>
    <!-- Feature Treatment End -->


    <!-- Feature Hospital Start -->

    <section class=" py-5 theme-bg">
        <div class="custom-container container py-3">
            <h2 class="section-title text-center">Featured Hospitals</h2>
            <div class="form-row">
                @if(!empty($hospitals))
                    @foreach($hospitals as $hospital)
                        <div class=" col-md-6 col-xl-3">
                            <a class="d-block" href="{{ $hospital->link }}">
                                <div class="feature-hospitals bg-white d-flex align-items-center justify-content-center">
                                    <img src="{{ asset($hospital->featured_image) }}" alt=""/>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

            </div>
            <div class="text-center ">
                <a href="#" class="themebtn mx-2">Connect to Specialist</a>
                <a href="{{ route('hospital.index-front') }}" class="themebtn alt-btn mx-2">View All Hospitals</a>
            </div>
        </div>
    </section>

    <!-- Feature Hospital End -->

    <!-- Top Doctors Start -->

    <section class=" py-5">
        <div class="container py-3">
            <h2 class="section-title text-center">Top Doctors in India</h2>
            <div class="owl-theme owl-carousel top-doctors ">
                @if(!empty($doctors))
                    @foreach($doctors as $doctor)
                        @if(!empty($doctor->link))
                        <a href="{{ $doctor->link }}">
                            @endif
                        <div class="item text-center">
                            <img src="{{ asset($doctor->featured_image) }}" alt=""/>
                            <div class="details-box bg-white px-3 py-4 position-relative">

                                <h6 class="open-sans fw-700">{{ $doctor->name }}</h6>
                                <h6 class="fs-13">{{ $doctor->designation }}</h6>
                            </div>
                        </div>
                            @if(!empty($doctor->link))
                        </a>
                        @endif
                    @endforeach
                @endif

            </div>
            <div class="text-center mt-4 ">
                <a href="#" class="themebtn mx-2">Connect to Specialist</a>
                <a href="{{ route('doctor.index-front') }}" class="themebtn alt-btn mx-2">View All Doctors</a>
            </div>
        </div>
    </section>

    <!-- Top Doctors End -->

    <!-- Testimonials Start -->

    <section class=" py-5 ">
        <div class="custom-container container py-3">
            <h2 class="section-title text-center">Testimonials</h2>
        </div>
        <div class="doctor-quote position-relative">
            <div class="custom-container container ">

                <div class="row py-4">
                    <div class=" col-md-5 py-5 align-self-center">
                        {{--<img class="mb-4" src="{{ asset('assets/images/medanta.png') }}" alt=""/>--}}
                        <p>{!! !empty($videoTestimonial) ? $videoTestimonial->short_description : '' !!}</p>
                        <h6 class="fs-15 fw-700 open-sans mt-4">{{ !empty($videoTestimonial) ? $videoTestimonial->title : '' }}</h6>
                        <h6 class="open-sans fs-14 "> {{ @$videoTestimonial->place }} {{--Director: Neuro & Spine Surgery--}}</h6>
                    </div>
                    <div class="col-md-7 mb-4 mb-lg-0 text-lg-right">

                        <div class="position-relative">
                            <div class="vid-play  position-absolute r-0 t-0 " data-toggle="modal"
                                 data-target="#exampleModalCenter">
                                @if(!empty($videoTestimonial))
                                <img src="{{ @ asset($videoTestimonial->image) }}" alt=""/>
                                @endif
                                <div class="video-icon position-absolute d-flex w-100 h-100 align-items-center t-0 justify-content-center">
                                    <img src="{{ asset('assets/images/play.png') }}" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 pt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="quote text-center">
                        <h6 class="open-sans fw-700 fs-15 p-5">Very Professional Will Recommend</h6>
                    </div>
                    <div class="owl-theme owl-carousel slide-testimonial">
                        @if($featuredTestimonials->count())
                            @foreach($featuredTestimonials as $featuredTestimonial)
                                <div class="item text-center">
                                    <p>{!! $featuredTestimonial->short_description !!}</p>
                                    <h6 class="open-sans fw-700 fs-15">{{ $featuredTestimonial->title }}</h6>
                                    <h6 class="open-sans fs-14 font-italic">{{ $featuredTestimonial->place }}</h6>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="text-center mt-4 ">
                        <a href="javascript:;" class="themebtn mx-2 consulation_class">Free consultation</a>
                        <a href="{{ route('testimonial.index-front') }}" class="themebtn alt-btn mx-2">view all
                            testimonials</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials End -->


    <!-- Why Denesa Start -->

    <section class=" py-5 position-relative overlay why-section"
             style="background:url(assets/images/why-bg.jpg) no-repeat center center / cover;">
        <div class="container py-3">
            <h2 class="section-title text-center text-white">Why Denesa Health</h2>
            <div class="row no-gutters why">
                @if(!empty($denesaServices))
                    @foreach($denesaServices as $denesaService)
                        <div class="col-md-6 mb-4 mb-lg-0">
                            <div class="row">

                                <div class="col-lg-4 mb-4 {{ $loop->iteration % 2 == 1 ? 'order-lg-2' : '' }} text-center d-flex  justify-content-lg-center">
                                    <span class="d-inline-block d-flex align-items-center rounded-circle bg-white justify-content-center"><img
                                                src="{{ asset($denesaService->featured_image) }}" alt=""/></span>
                                </div>
                                <div class="col-lg-8 order-lg-1">
                                    <h4 class="text-white fw-600">{{ $denesaService->title }}</h4>
                                    <p class="text-white">{{ $denesaService->description }}</p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- Why Denesa End -->


    <!-- Estimated Start -->

    <section class=" py-5">
        <div class="custom-container container py-3">
            <div class="row">
                <div class="col-md-11 text-center mx-auto">

                    <h2 class="section-title ">{{ $estimationCost->title }}</h2>
                    <p>{{ $estimationCost->description }}</p>

                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xl-7 mb-4 mb-xl-0">
                    <img src="{{ asset($estimationCost->featured_image) }}" alt=""/>
                </div>
                <div class="col-xl-5">
                    <div class="estimated-box ">
                        <ul class="list-unstyled mb-0 bg-white">
                            <li>
                                <div class="row no-gutters">
                                    @if(!empty($departmentCosts))
                                        @foreach($departmentCosts as $departmentCost)
                                            <div class="col-md-4 details d-flex align-items-center">
                                                <div>
                                                    <h6 class="fw-600 fs-14">{{ $departmentCost->name }}</h6>
                                                    <span class="fs-13">{{ $departmentCost->cost_description }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </li>
                        </ul>
                        <a href="#" class="themebtn consulation_class">Get a free quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Estimated End -->


    <!-- About Us Start -->

    <section class=" py-5 theme-bg outer_showless">
        <div class="container py-3 ">
            <div class="px-lg-5 text-center hidden_extra">

                <h2 class="section-title ">{{ isset($aboutMedical) ? $aboutMedical->title : '' }}</h2>
                <p>{!! (isset($aboutMedical) ? $aboutMedical->description : '') !!}</p>

                {{--<a href="{{ route('about') }}" class="theme-color-alt d-inline-block font-montserrat mt-4 ">READ MORE</a>--}}

            </div>
            <a href="javascript:;" class="theme-color-altered font-montserrat mt-4 read_more_medical">[Read more]</a>
            <a style="display:none" href="javascript:;" class="theme-color-altered font-montserrat mt-4 read_less_medical">[Read less]</a>

        </div>
    </section>
    <!-- About Us End -->


    <!-- knowledge Start -->

    <section class=" py-5 ">
        <div class="container py-3 ">
            <h2 class="section-title text-center">Knowledge Center</h2>
            @if(!empty($featuredNews))
            <div class="row">
                <div class="col-lg-5 mb-4 mb-xl-0">
                    <img src="{{ @ asset($featuredNews->featured_image) }}" class="shadow" alt=""/>
                </div>
                <div class="col-lg-7">
                    <p>{!! \Str::limit($featuredNews->short_description, 250, '...') !!}</p>
                    <a href="{{ route('knowledge-center.show', ['slug' => $featuredNews->slug]) }}"
                       class="themebtn alt-btn">READ MORE</a><br/>

                    {{--<a href="#" class="themebtn mx-2 consulation_class">Free consultation</a>
                    <a href="{{ route('knowledge-center') }}" class="themebtn alt-btn mx-2">view all</a>--}}
                    {{--<a href="" class="themebtn mt-5 ">view all</a>--}}
                </div>

            </div>
            @endif
            <div class="text-center mt-4 ">
                <a href="javascript:;" class="themebtn mx-2 consulation_class">Free consultation</a>
                <a href="{{ route('knowledge-center') }}" class="themebtn alt-btn mx-2">View all News</a>
            </div>
        </div>
    </section>

    <!-- knowledge End -->

    <!-- Happy Patients Start -->
    <section class=" pt-5 happy-patients">
        <div class="container py-3  text-center">
            <h2 class="section-title">Happy Patients From These Countries</h2>
            @if(!empty($countryFlags))
                @foreach($countryFlags as $countryFlag)
                    <img src="{{ asset($countryFlag->featured_image) }}" class="shadow m-2" alt=""/>
                @endforeach
            @endif

        </div>
    </section>

@if(!empty($videoTestimonial))
<div class="modal video-flex-modal  fade" id="exampleModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" position-relative">
                <a class="close position-absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>

                <div class="embed-responsive embed-responsive-16by9">

                    <iframe class="embed-responsive-item" id="vidpop" src="{{ $videoTestimonial->video_url }}"
                            frameborder="0"
                          {{--  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
    @endif
@endsection
@section('script')

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {

        $(document).on('click', '.read_more_medical', function () {
                $('.outer_showless').addClass('show_comp');
        });

            $(document).on('click', '.read_less_medical', function () {
                $('.outer_showless').removeClass('show_comp');
            });

            $("#search").autocomplete({
                source: function (request, response) {
// Fetch data
                    $.ajax({
                        url: "{{route('treatment.getTreatments')}}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function( event, ui ) {
                    window.location.href = ui.item.value;
                }
            });
        });
    </script>
@endsection