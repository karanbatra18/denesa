@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">{{ $doctor->name }}</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->





    <section class="  doctor-tabbing pt-3 theme-alt-bg d-xl-block d-none">
        <div class="container ">
            <ul class="list-unstyled  d-inline-flex mb-0 ">
                <li><a href="#about-doctor" class="active">About Doctor </a></li>
                <li><a href="#specializations">Specializations </a></li>
                <li><a href="#awards">List of Awards </a></li>
                <li><a href="#work-exp">Work Experience </a></li>
                <li><a href="#education-training">Education & Training</a></li>
            </ul>
            <a href="" class="themebtn bg-white theme-color border-0 mt-0">FREE CONSULTATION</a>

        </div>
    </section>





    <!-- Doctors Details Start -->

    <main class=" py-5 shd">
        <div class="container py-3">

            <section id="about-doctor" class="about-doctor ">
                <div class="doctors-listing shadow ">
                    <div class="row">
                        <div class="col-md-4 mb-4 mb-lg-0">
                            @if(!empty($doctor->image))
                                <img class="dr" src="{{ asset($doctor->image) }}" alt="">
                            @endif
                        </div>
                        <div class=" col-md-8  mb-4 mb-lg-0">
                            <div class="row">
                                <div class="col-xl-4 order-xl-2 mb-2 mb-lg-0">
                                    <a href="#" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2">FREE
                                        Consultation</a>
                                </div>
                                <div class="col-xl-8 ">
                                    <h4 class="fs-20 muli-font fw-600">{{ $doctor->name }}, {{ $doctor->city ? $doctor->city : ''}}</h4>
                                </div>
                            </div>

                            <ul class="list-unstyled mt-4 mb-0 ">
                                <li class="position-relative mb-2 pl-4"><span
                                            class="d-inline-block position-absolute l-0 t-0"><img
                                                src="{{ asset('assets/images/designation.png') }}" alt=""/></span><b>Designation </b>:
                                    {{ $doctor->designation }}
                                </li>
                                <li class="position-relative mb-2 pl-4"><span
                                            class="d-inline-block position-absolute l-0 t-0"><img
                                                src="{{ asset('assets/images/qualification.png') }}"
                                                alt=""/></span><b>Qualifications</b>: {{ $doctor->qualification }}
                                </li>

                                <li class="position-relative mb-2 pl-4"><span
                                            class="d-inline-block position-absolute l-0 t-0"><img
                                                src="{{ asset('assets/images/work-experience.png') }}" alt=""/></span><b>Experience</b>:
                                    {{ $doctor->experience }} Years
                                </li>

                                <li class="position-relative mb-2"><span
                                            class="d-inline-block position-absolute l-0 t-0"><img
                                                src="{{ asset('assets/images/specialitys.png') }}" class="mr-2"
                                                alt=""/><b>Speciality</b>:</span> {{ $doctor->speciality }}
                                </li>

                                <li class="position-relative mb-2 pl-4"><span
                                            class="d-inline-block position-absolute l-0 t-0"><img
                                                src="{{ asset('assets/images/category.png') }}" alt=""/></span><b>Category</b>:
                                    {{ $doctor->category ? $doctor->category->name : '' }}
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
                                            class="fs-20 muli-font pr-2 fw-600">Hospital :</b>{{ $doctor->hospital ? $doctor->hospital->name : '' }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled h-info mt-2 mb-0 ">
                                <li class="position-relative pl-5"><span
                                            class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute l-0 t-0"><img
                                                src="{{ asset('assets/images/loc.png') }}" alt=""/></span> <b
                                            class="fs-20 muli-font pr-2 fw-600">Location :</b>{{ !empty($doctor->location) ? $doctor->location.', ' : '' }} {{  $doctor->city ? $doctor->city.', ' : '' }} {{ $doctor->state ? $doctor->state : '' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h4 class="fw-600 mt-5">About Doctor</h4>
                {!! $doctor->about !!}
            </section>

            <section id="specializations" class="pt-5">
                <div class="theme-bg px-3 py-5  specializations  position-relative px-md-5 mt-5">
                    <span class="d-block position-absolute bg-white d-flex align-items-center justify-content-center rounded-circle"><img
                                src="{{ asset('assets/images/aala.png') }}" alt=""/></span>
                    <h4 class="title position-relative mt-4 mb-5"><span class="fw-600">Specializations</span></h4>
                    <div class="ul_list">
                    {!! $doctor->specialization !!}
                    </div>
                </div>
            </section>

            <section id="awards" class="awards  mt-5">

                <h4 class="title position-relative fw-600 pt-4">List of Awards</h4>
                <div class="ul_list">
                {!! $doctor->list_of_awards !!}
                </div>
            </section>

            <section id="work-exp" class="work-exp  mt-5">

                <h4 class="title position-relative fw-600 pt-4">Work Experience</h4>
                <div class="ul_list">
                {!! $doctor->work_experience !!}
                </div>
            </section>


            <section id="education-training" class="education-training  mt-5">

                <h4 class="title position-relative fw-600 pt-4">Education & Training</h4>
                <div class="ul_list">
                {!! $doctor->education_training !!}
                </div>
            </section>


        </div>
    </main>


    <!-- Doctors Details End -->


    <!-- Top 10 Hospitals in India Us Start -->

    <section class="  pt-5 theme-bg happy-patients">
        <div class="container py-3 ">
            <div class="px-lg-5 text-center">

                <h2 class="section-title ">Top 10 Hospitals in India</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum. Contrary to popular
                    belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature
                    from 45 BC, making it over 2000 years old.</p>

            </div>
        </div>
    </section>
    <!-- Top 10 Hospitals in India Us End -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#specializations ul').addClass('list-unstyled ul_list');
            $('#specializations ul li').addClass('mb-4');

            $('#awards ul').addClass('list-unstyled ul_list mt-4');
            $('#awards ul li').addClass('mb-4');

            $('#work-exp ul').addClass('list-unstyled ul_list mt-4');
            $('#work-exp ul li').addClass('my-3 pb-3');

            $('#education-training ul').addClass('list-unstyled ul_list mt-4');
            $('#education-training ul li').addClass('mt-3 mb-2 pb-3');
        });
    </script>
@endsection
