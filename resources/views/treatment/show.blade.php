@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Treatment Costs</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->





    <section class="doctor-tabbing hospital-tabbing pt-3 theme-alt-bg d-xl-block d-none">
        <div class="container ">
            <ul class="list-unstyled   d-inline-flex mb-0 ">
                <li><a href="#introduction" class="active">Introduction </a></li>
                <li><a href="#cost-in-india">Cost</a></li>
                <li><a href="#treatment-specification">Specification</a></li>
                <li><a href="#faqs">FAQs</a></li>
                <li><a href="#top-hospital">Top Hospitals</a></li>
                <li><a href="#top-doctors">Top Doctors</a></li>
            </ul>
            <a href="" class="themebtn bg-white theme-color border-0 mt-0">FREE CONSULTATION</a>
        </div>
    </section>

    <section class=" pt-5 shd">
        <div class="container py-3">

            <div id="introduction" class="pb-5">


                <div class="row">
                    <div class="col-md-11 mx-auto">
                        <div class="shadow">
                            <img src="{{ asset($treatment->featured_image) }}" alt="">
                            <div class="facilities cost-facilities">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Liver Transplant Price</h6>
                                        <ul class="list-unstyled py-3 ">
                                            <li>{{ $treatment->transplant_price }}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">No. of Travellers</h6>
                                        <ul class="list-unstyled py-3 ">
                                            <li>{{ $treatment->travellers_count }}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Days in Hospital</h6>
                                        <ul class="list-unstyled py-3 ">
                                            <li>{{ $treatment->hospital_days_count }}</li>

                                        </ul>
                                    </div>
                                    <div class="col">
                                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Days Outside Hospital</h6>
                                        <ul class="list-unstyled py-3 ">
                                            <li>{{ $treatment->days_outside_count }}</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Total Days in India</h6>
                                        <ul class="list-unstyled py-3 ">
                                            <li>{{ $treatment->total_days_count }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="fw-600 section-title mt-5 pt-4 text-left">Introduction</h2>
                <p>{!! $treatment->introduction !!}</p>
            </div>

            <div id="cost-in-india" class="mt-5 ">

                <h2 class=" fw-600 text-left section-title">Liver Transplant Cost in India</h2>
                <p>{!! $treatment->cost !!}</p>

            </div>

            <div id="treatment-specification" class=" treatment-specification mt-5 ">

                <h2 class=" fw-600 text-left section-title"> Treatment Specifications</h2>
                <div class="accordion" id="accordion-specification">
                    @if($treatment->specifications->count())
                        @foreach($treatment->specifications as $specification)
                            <div class="card mb-3">
                                <div class="card-header p-0" id="heading-{{ $loop->iteration }}">

                                    <h5 class="mb-0 text-left p-3 open-sans fw-800 fs-15 text-uppercase"
                                        data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}"
                                        aria-controls="collapse-{{ $loop->iteration }}">
                                        {{ $specification->title }}<i class="fas fa-plus"></i><i
                                                class="fas fa-minus"></i>
                                    </h5>

                                </div>

                                <div id="collapse-{{ $loop->iteration }}" class="collapse"
                                     aria-labelledby="heading-{{ $loop->iteration }}"
                                     data-parent="#accordion-specification">
                                    <div class="card-body">
                                        <p>{{ $specification->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </div>

        <div class="faqs py-5 theme-bg" id="faqs">
            <div class="container">
                <h2 class=" fw-600 text-center section-title"> Frequently Asked Question About Liver Transplant</h2>
                <div class="accordion" id="accordion-faqs">
                    @if($treatment->faqs->count())
                        @foreach($treatment->faqs as $faq)
                            <div class="card mb-3">
                                <div class="card-header p-0" id="heading-{{ $loop->iteration.$loop->iteration }}">

                                    <h5 class="mb-0 text-left p-3 open-sans fw-800 fs-15 text-uppercase"
                                        data-toggle="collapse"
                                        data-target="#collapse-{{ $loop->iteration.$loop->iteration }}"
                                        aria-controls="collapse-{{ $loop->iteration.$loop->iteration }}">
                                        {{ $faq->title }}<i class="fas fa-plus"></i><i class="fas fa-minus"></i>
                                    </h5>

                                </div>

                                <div id="collapse-{{ $loop->iteration.$loop->iteration }}" class="collapse"
                                     aria-labelledby="heading-{{ $loop->iteration.$loop->iteration }}"
                                     data-parent="#accordion-faqs">
                                    <div class="card-body">
                                        <p>{!! $faq->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>


        <div id="top-hospital" class="container py-5">
            <h2 class="section-title text-center ">Top Hospitals for Liver Transplant</h2>
            @if($treatment->hospitals->count())
                @foreach($treatment->hospitals as $hospital)
                    <div class="hospital-listing p-3 p-lg-5 shadow mb-5">
                        <div class="row">

                            <div class="  col-xl-4  mb-4 mb-xl-0">

                                <div class="feature-hospitals border bg-white mb-0 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset($hospital->featured_image) }}" alt="">
                                </div>

                            </div>

                            <div class="  col-xl-8  mb-4 mb-xl-0">
                                <div class="row">
                                    <div class="col-md-4 order-sm-2 mb-2 mb-lg-0">
                                        <a href="#" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2">FREE
                                            Consultation</a>
                                    </div>
                                    <div class="col-md-8 order-sm-1 ">
                                        <h4 class="fs-20 muli-font fw-600">{{ $hospital->name }}
                                            , {{ $hospital->city }}</h4>
                                    </div>

                                </div>

                                <p>{!! \Str::limit($hospital->description, 250, '...') !!}</p><a
                                        href="{{ route('hospital.show-front', ['slug' => $hospital->slug]) }}"
                                        class="link-color ml-1 d-inline-block">[Read more]</a>
                                <ul class="list-unstyled mt-4 mb-0 ">
                                    <li class="position-relative mb-2 pl-4"><span
                                                class="d-inline-block position-absolute l-0 t-0"><img
                                                    src="{{ asset('assets/images/locations.png') }}" alt=""/></span><b>Locacton </b>: {{ $hospital->city }}
                                        , India
                                    </li>
                                    <li class="position-relative mb-2 pl-4"><span
                                                class="d-inline-block position-absolute l-0 t-0"><img
                                                    src="{{ asset('assets/images/establised.png') }}" alt=""/></span><b>Established
                                            In </b>: {{ $hospital->established }}</li>
                                    <li class="position-relative pl-4"><span
                                                class="d-inline-block position-absolute l-0 t-0"><img
                                                    src="{{ asset('assets/images/speciality.png') }}" alt=""/></span><b>Speciality </b>: {{ $hospital->speciality }}
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif


        </div>


        <div id="top-doctors" class="theme-bg happy-patients pt-5">
            <div class="container ">
                <h2 class="section-title text-center ">Top Doctors for Liver Transplant</h2>
                @if($treatment->doctors->count())
                    @foreach($treatment->doctors as $doctor)
                        <div class="doctors-listing shadow bg-white">
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-lg-0">
                                    <img class="dr" src="{{ asset($doctor->image) }}" alt="">
                                </div>
                                <div class=" col-md-8  mb-4 mb-lg-0">
                                    <div class="row">
                                        <div class="col-xl-4 order-xl-2 mb-2 mb-lg-0">
                                            <a href="#"
                                               class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2">FREE
                                                Consultation</a>
                                        </div>
                                        <div class="col-xl-8">
                                            <h4 class="fs-20 muli-font fw-600">{{ $doctor->name }}, {{ $doctor->city }}</h4>
                                        </div>
                                    </div>
                                    <p>{!! \Str::limit($doctor->about, 250, '...') !!} </p><a href="{{ route('doctor.show-front', ['slug' => $doctor->slug]) }}"
                                                         class="link-color ml-1 d-inline-block">[Read more]</a>
                                    <ul class="list-unstyled mt-4 mb-0 ">
                                        <li class="position-relative mb-2 pl-4"><span
                                                    class="d-inline-block position-absolute l-0 t-0"><img
                                                        src="{{ asset('assets/images/designation.png') }}" alt=""/></span><b>Designation </b>:
                                            {{ $doctor->designation }}
                                        </li>
                                        <li class="position-relative mb-2 pl-4"><span
                                                    class="d-inline-block position-absolute l-0 t-0"><img
                                                        src="{{ asset('assets/images/qualification.png') }}" alt=""/></span><b>Qualifications</b>:
                                            {{ $doctor->qualification }}
                                        </li>
                                        <li class="position-relative "><span
                                                    class="d-inline-block position-absolute l-0 t-0"><img
                                                        src="{{ asset('assets/images/specialitys.png') }}" class="mr-2" alt=""/><b>Speciality</b>:</span>
                                            {{ $doctor->speciality }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled h-info mt-2 mb-0 ">
                                        <li class="position-relative pl-5"><span
                                                    class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute l-0 t-0"><img
                                                        src="{{ asset('assets/images/hospital.png') }}" alt=""/></span> <b
                                                    class="fs-20 muli-font pr-2 fw-600">Hospital :</b>{{ $doctor->hospital->name }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled h-info mt-2 mb-0 ">
                                        <li class="position-relative pl-5"><span
                                                    class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute l-0 t-0"><img
                                                        src="{{ asset('assets/images/loc.png') }}" alt=""/></span> <b
                                                    class="fs-20 muli-font pr-2 fw-600">Location :</b>{{ $doctor->location }}, {{ $doctor->city }}, {{ $doctor->state }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


    </section>



@endsection
