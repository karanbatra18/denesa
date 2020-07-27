@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">About Us</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- Who we are Start Here -->
    <section class=" py-5">
        <div class="container py-4 text-center">
            <h2 class="section-title text-center">Who We Are ?</h2>
            <p>{!! !empty($aboutIntroduction->description) ? $aboutIntroduction->description : '' !!}</p>
        </div>
    </section>
    <!-- Who we are End Here -->


    <!-- Mission Start Here -->
    <section class=" mission position-relative py-5">
        <div class="container py-4 text-center">
            <div class="theme-bg p-3 p-lg-5">
                <div class="row py-5">
                    @if(!empty($visions))
                        @foreach($visions as $vision)
                            <div class="col-md-6">
                                <div class="icon-box">
                                    <span class="rounded-circle d-inline-block"></span>
                                    @if(!empty($vision->featured_image))
                                        <img class="pl-4 position-relative z-1"
                                             src="{{ asset($vision->featured_image) }}" alt="">
                                    @endif
                                </div>
                                <h4 class="fw-600 mt-3">{{ !empty($vision->title) ? $vision->title : '' }}</h4>
                                <p>{!! !empty($vision->description) ? $vision->description : '' !!}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Mission Start Here -->


    <!-- Objective Start Here -->
    <section class=" objective py-5">
        <div class="container py-4 text-left">
            <h2 class="section-title text-left">{{ !empty($denesaObjective->title) ? $denesaObjective->title : '' }}</h2>
            {!! !empty($denesaObjective->description) ? $denesaObjective->description : '' !!}
        </div>
    </section>
    <!-- Objective  Start Here -->


    <!-- Why Denesa Start -->

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
    <!-- Why Denesa End -->


    <!-- Fact Start -->

    <section class="fact-state about-fact pt-5">
        <div class="container py-3 text-center">
            <h2 class="section-title text-center">{{ !empty($uniqueService->title) ? $uniqueService->title : '' }}</h2>
            {!! !empty($uniqueService->description) ? $uniqueService->description : '' !!}

            <div class="row pt-5">
                @if(!empty($serviceItems))
                    @foreach($serviceItems as $serviceItem)
                        <div class=" col-md-4 mb-5 text-center text-md-left">
                            <div class="d-md-flex align-items-center ">
                                <div class="icon-box">
                                    <span class="rounded-circle d-inline-block"></span>
                                    @if(!empty($serviceItem->featured_image))
                                        <img class="pl-4" src="{{ asset($serviceItem->featured_image) }}" alt=""/>
                                    @endif
                                </div>
                                <div class="ml-md-5">
                                    <span class="counter h2 fs-42 font-weight-bold "
                                          data-count="{{ !empty($serviceItem->total_count) ? $serviceItem->total_count : 0 }}">0</span>
                                    <span
                                            class="fs-42 font-weight-bold ">+</span>
                                    <h4 class="open-sans fs-15 text-uppercase font-weight-bold">{{ !empty($serviceItem->title) ? $serviceItem->title : '' }}</h4>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Fact End -->


    <!-- Certified  Start -->

    <section class=" pt-5 theme-bg happy-patients position-relative ">
        <div class="iso position-absolute x-0  mx-auto bg-white rounded-circle">
            @if(!empty($isoOrganization->featured_image))
                <img src="{{ asset($isoOrganization->featured_image) }}" alt=""/>
            @endif
        </div>
        <div class="container pt-5">
            <div class="px-lg-5 text-center pt-4">

                <h2 class="section-title ">{{ !empty($isoOrganization->title) ? $isoOrganization->title : '' }}</h2>
                <p>{!! !empty($isoOrganization->description) ? $isoOrganization->description : '' !!}</p>
            </div>
        </div>
    </section>
    <!-- Certified End -->
@endsection