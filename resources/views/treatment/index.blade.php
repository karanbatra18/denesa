@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Treatment Costs</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- Cost  Start Here -->
    <section class=" py-5 ">
        <div class="container py-4 text-center">
            <h2 class="section-title text-center">Frequently Search Treatments</h2>
            <div class="row py-4">
                @if($categories->count())
                    @foreach($categories as $category)
                        <div class="col-md-6 col-xl-4 cost  mb-4">
                            <div class="blog-sidebar text-left ">
                                <h6 class="open-sans p-4 fw-600 rounded-top text-white mb-0 d-flex justify-content-between align-items-center">
                                    {{ $category->name }} <i class="fas fa-plus d-none"></i></h6>
                                <div class="cost-item">
                                    <div>
                                        <ul class="list-unstyled mb-0 px-4">
                                            @if($category->treatments->count())
                                                @foreach($category->treatments as $treatment)
                                                    <li>
                                                        <a class="py-3 d-flex justify-content-between align-items-center"
                                                           href="{{ route('treatment.showFront', ['slug' => $treatment->slug]) }}">{{ $treatment->title }}
                                                            <i
                                                                    class="fas fa-chevron-right"></i></a></li>
                                                @endforeach
                                            @endif

                                        </ul>
                                        {{--<div class="text-center view-all border-top-0"><span class="py-3 more">[ View All ]</span><span
                                                    class="py-3 d-inline-block less">[ View Less ]</span></div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
    </section>

    <section class="theme-bg py-5">
        <div class="container pt-4">
            <h2 class="section-title text-center">Frequently Search Treatments</h2>
            <h4 class="fw-600">Who we are?</h4>
            <p>{!! !empty($aboutIntroduction->description) ? $aboutIntroduction->description : '' !!}</p>

            @if($visions->count())
                @foreach($visions as $vision)
                    <h4 class="fw-600 pt-5 mt-5 border-top">{{ $vision->title }}</h4>
                    <p>{!! $vision->description !!}</p>
                @endforeach
            @endif


            <h4 class="fw-600 pt-5 mt-5 border-top">The Objective of Denesa Health</h4>
            <p>To facilitate the patients with the best quality doctoring for their illness. We help our customers
                with:</p>
            <div class="objective happy-patients ">
                {!! !empty($denesaObjective->description) ? $denesaObjective->description : '' !!}

                {{--<ul class="list-unstyled ul_list">
                    <li class="mb-3">Getting the exaction about the cost of treatment.</li>
                    <li class="mb-3">Getting the treatment done at the earliest possible.</li>
                    <li class="mb-3">To fix an appointment with the appropriate surgeon as per the convenience at both
                        the ends.
                    </li>
                    <li class="mb-3">Assistance with language translators.</li>
                    <li class="mb-3">Helping with foreign travel and visa formalities.</li>
                    <li class="mb-3">To accomplish all the formalities before, during and after the therapy.</li>
                    <li class="mb-3">Arranging for remote consultation.</li>
                    <li class="mb-3">Currency exchange.</li>
                    <li class="mb-3">Travel arrangements and booking.</li>
                    <li class="mb-3">Regular follow up post surgery for the recovery.</li>
                    <li class="mb-3">Finding the nearest accommodation and food for patients and family.</li>
                </ul>
                <p>Presently, Denesa Health helps outpatient from countries including Cambodia, Kenya, Liberia, Morocco,
                    Mozambique, Nigeria, Sierra Leone, Somalia, Sudan, Tanzania, Uganda, and Zimbabwe to find the
                    excellent solution to their aids in India.</p>--}}
                <section class=" py-5 position-relative overlay why-section"
                         style="background:url({{ asset('assets/images/why-bg.jpg') }}) no-repeat center center / cover;">
                    <div class="container py-3">
                        <h2 class="section-title text-center text-white">Why Denesa Health</h2>
                        <div class="row no-gutters why">
                            @if(!empty($denesaServices))
                                @foreach($denesaServices as $denesaService)
                                    <div class="col-md-6 mb-4 mb-lg-0">
                                        <div class="row">

                                            <div class="col-lg-4 mb-4 {{ $loop->iteration % 2 == 1 ? 'order-lg-2 ' : '' }} text-center d-flex  justify-content-lg-center">
                        <span class="d-inline-block d-flex align-items-center rounded-circle bg-white justify-content-center">
                            @if(!empty($denesaService->featured_image))
                                <img
                                        src="{{ asset($denesaService->featured_image) }}" alt=""/>
                            @endif
                        </span>
                                            </div>
                                            <div class="col-lg-8 order-lg-1">
                                                <h4 class="text-white fw-600">{{ !empty($denesaService->title) ? $denesaService->title : '' }}</h4>
                                                <p class="text-white">{!! !empty($denesaService->description) ? $denesaService->description : ''  !!}</p>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </div>
                </section>

                {{--<h4 class="fw-600 pt-5 mt-5 border-top">Why Denesa Health?</h4>
                <p>Denesa Health has always been a choice for medical tourism because of the highly dedicated team that
                    works with complete dedication to assisting the personalised requirements of the sufferer.</p>
                <p>Denesa Health can assist the customer expectation as it has a favourable association with:</p>
                <ul class="list-unstyled ul_list">
                    <li class="mb-3">84+ Hospitals</li>
                    <li class="mb-3">2000+ Hospital Rooms</li>
                    <li class="mb-3">1258+ Doctors</li>
                    <li class="mb-3">50+ Ambulances</li>
                    <li class="mb-3">500 Connecting Professionals</li>
                    <li class="mb-3">395+ Contented Patients</li>
                </ul>
                <p>and is continuously expanding to serve in different health realms.</p>
                <p>We are striving at our best to connect with significant hospitals and surgeons to provide unmatched
                    treatment for our global patients in India.</p>--}}
            </div>

        </div>
    </section>


    <!-- Cost End Here -->



@endsection