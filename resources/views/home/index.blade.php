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
                        <img class="pl-4" src="{{ asset($overallFigure->featured_image) }}" alt="" />
                    </div>
                    <div class="ml-md-5">
                        <span class="counter h2 fs-42 font-weight-bold " data-count="{{ $overallFigure->total_count }}">0</span> <span class="fs-42 font-weight-bold ">+</span>
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
                <img src="{{ asset($treatment->featured_image) }}" alt="" />
                <div class="text-box position-relative theme-bg pt-5 px-4 pb-4">
                    <span class="d-flex align-items-center justify-content-center shadow position-absolute rounded-circle bg-white"><img src="{{ asset($treatment->icon_image) }}" alt="" /></span>
                    <h4 class="fw-600 mt-2"><a href="{{ $treatment->link }}">{{ $treatment->title }}</a></h4>
                    <p>{{ $treatment->description }}</p>
                </div>
            </div>
                @endforeach
            @endif
        </div>
        <div class="text-center">
            <a href="#" class="themebtn mx-2">Connect to Specialist</a>
            <a href="cost.php" class="themebtn alt-btn mx-2">View All Treatments</a>
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
                        <img src="{{ asset($hospital->featured_image) }}" alt="" />
                    </div>
                </a>
            </div>
                @endforeach
            @endif

        </div>
        <div class="text-center ">
            <a href="#" class="themebtn mx-2">Connect to Specialist</a>
            <a href="#" class="themebtn alt-btn mx-2">View All Hospitals</a>
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
            <div class="item text-center">
                <img src="{{ asset($doctor->featured_image) }}" alt="" />
                <div class="details-box bg-white px-3 py-4 position-relative">

                    <h6 class="open-sans fw-700">{{ $doctor->name }}</h6>
                    <h6 class="fs-13">{{ $doctor->designation }}</h6>
                </div>
            </div>
                @endforeach
            @endif

        </div>
        <div class="text-center mt-4 ">
            <a href="#" class="themebtn mx-2">Connect to Specialist</a>
            <a href="doctors-listing.php" class="themebtn alt-btn mx-2">View All Doctors</a>
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
                    <img class="mb-4" src="assets/images/medanta.png" alt="" />
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</p>
                    <h6 class="fs-15 fw-700 open-sans mt-4">Dr Arvinder Singh Soin</h6>
                    <h6 class="open-sans fs-14 ">Director: Neuro & Spine Surgery</h6>
                </div>
                <div class="col-md-7 mb-4 mb-lg-0 text-lg-right">

                    <div class="position-relative">
                        <div class="vid-play  position-absolute r-0 t-0 " data-toggle="modal" data-target="#exampleModalCenter">
                            <img src="assets/images/doctor-img.png" alt="" />
                            <div class="video-icon position-absolute d-flex w-100 h-100 align-items-center t-0 justify-content-center" >
                                <img src="assets/images/play.png" alt="" />
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
                    <div class="item text-center">
                        <p>I was reluctant to proceed with the treatment in India. Somehow assistance of Denesa Health gave me the strength to decide on planning my medical tourism to India. I travelled to India on 24 November 2019 for my cardiac treatment, i.e., CABG at Fortis Escorts Heart Institute, Delhi.  After visiting the hospital, I was detected for the blockage in the brain and they recommended me to go with the brain stent before cardiac treatment. Both the surgeries were completed in the duration of 72 hours.</p>
                        <h6 class="open-sans fw-700 fs-15">KM Jamal Uddin</h6>
                        <h6 class="open-sans fs-14 font-italic">Bangladesh</h6>
                    </div>
                    <div class="item text-center">
                        <p>I was reluctant to proceed with the treatment in India. Somehow assistance of Denesa Health gave me the strength to decide on planning my medical tourism to India. I travelled to India on 24 November 2019 for my cardiac treatment, i.e., CABG at Fortis Escorts Heart Institute, Delhi.  After visiting the hospital, I was detected for the blockage in the brain and they recommended me to go with the brain stent before cardiac treatment. Both the surgeries were completed in the duration of 72 hours.</p>
                        <h6 class="open-sans fw-700 fs-15">KM Jamal Uddin</h6>
                        <h6 class="open-sans fs-14 font-italic">Bangladesh</h6>
                    </div>
                </div>
                <div class="text-center mt-4 ">
                    <a href="#" class="themebtn mx-2">Free consultation</a>
                    <a href="testimonial.php" class="themebtn alt-btn mx-2">view all testimonials</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials End -->


<!-- Why Denesa Start -->

<section class=" py-5 position-relative overlay why-section" style="background:url(assets/images/why-bg.jpg) no-repeat center center / cover;">
    <div class="container py-3">
        <h2 class="section-title text-center text-white">Why Denesa Health</h2>
        <div class="row no-gutters why">
            @if(!empty($denesaServices))
                @foreach($denesaServices as $denesaService)
            <div class="col-md-6 mb-4 mb-lg-0">
                <div class="row">

                    <div class="col-lg-4 mb-4 {{ $loop->iteration % 2 == 1 ? 'order-lg-2' : '' }} text-center d-flex  justify-content-lg-center">
                        <span class="d-inline-block d-flex align-items-center rounded-circle bg-white justify-content-center"><img src="{{ asset($denesaService->featured_image) }}" alt="" /></span>
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

<section class=" py-5" >
    <div class="custom-container container py-3">
        <div class="row">
            <div class="col-md-11 text-center mx-auto">

                <h2 class="section-title ">{{ $estimationCost->title }}</h2>
                <p>{{ $estimationCost->description }}</p>

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-xl-7 mb-4 mb-xl-0">
                <img src="{{ asset($estimationCost->featured_image) }}" alt="" />
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
                    <a href="#" class="themebtn">Get a free quote</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Estimated End -->


<!-- About Us Start -->

<section class=" py-5 theme-bg" >
    <div class="container py-3 ">
        <div class="px-lg-5 text-center">

            <h2 class="section-title ">{{ isset($aboutMedical) ? $aboutMedical->title : '' }}</h2>
            <p>{{ isset($aboutMedical) ? $aboutMedical->description : '' }}</p>

            <a href="about.php" class="theme-color-alt d-inline-block font-montserrat mt-4 ">READ MORE</a>


        </div>
    </div>
</section>
<!-- About Us End -->


<!-- knowledge Start -->

<section class=" py-5 " >
    <div class="container py-3 ">
        <h2 class="section-title text-center">Knowledge Center</h2>
        <div class="row">
            <div class="col-lg-5 mb-4 mb-xl-0">
                <img src="assets/images/knowledge.jpg" class="shadow" alt="" />
            </div>
            <div class="col-lg-7">
                <strong>Global Hospital cure a small Kurdistan boy from a rarest Spinal Disorder</strong><br/><br/>
                <p>Global Hospital, Mumbai successfully treated an 11-year-old Kurdistan boy, who was suffering from a rare spinal cord disorder, is now able to walk properly without limping like other similar-age children.
                </p>
                <p>A rare spinal cord tumour seized an 11-year-old Kurdistani boy to limp for most of his life. But, after successfully complicated spinal microsurgery at a Global Hospitals, Parel, Mumbai, patient, Goran Shakhawan, will now be able to walk appropriately & can continue his regular activities like the other children of his same age. When Goran was Five-years-old, his mother noticed that he was limping due to shortening of his leg (left) & scoliosis, a condition that causes abnormal lateral curvature of the spine.</p>
                <a href="single-knowledge.php" class="themebtn alt-btn" >READ MORE</a><br/>
                <a href="knowledge-center.php" class="themebtn mt-5 " >view all</a>
            </div>
        </div>
    </div>
</section>

<!-- knowledge End -->

<!-- Happy Patients Start -->
<section class=" pt-5 happy-patients" >
    <div class="container py-3  text-center">
        <h2 class="section-title">Happy Patients From These Countries</h2>
        @if(!empty($countryFlags))
            @foreach($countryFlags as $countryFlag)
        <img src="{{ asset($countryFlag->featured_image) }}" class="shadow m-2" alt="" />
            @endforeach
        @endif

    </div>
</section>
@endsection