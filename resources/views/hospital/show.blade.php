@extends('layouts.main')
@section('content')<!-- Inner page title Start Here -->

<section class="inner-page-title" >
    <div class="container  ">
        <h2 class="text-white text-center fw-500">{{ $hospital->name }}, {{ $hospital->city }}</h2>
    </div>
</section>

<!-- Inner page title End Here -->





<section class="doctor-tabbing hospital-tabbing pt-3 theme-alt-bg d-xl-block d-none" >
    <div class="container ">
        <ul class="list-unstyled   d-inline-flex mb-0 ">
            <li ><a href="#about-hospital" class="active" >About Hospital </a></li>
            <li><a href="#hospital-address"  > Hospital Address</a></li>
            <li><a href="#team-and-specializations"  >Team Specialties </a></li>
            <li><a href="#infrastructure"  >Infrastructure</a></li>
            <li><a href="#facilities"  >Facilities </a></li>
            <li><a href="#hospital-doctors">Doctors</a></li>
        </ul>
        <a href="" class="themebtn bg-white theme-color border-0 mt-0">FREE CONSULTATION</a>
    </div>
</section>
<!-- hospital Details Start -->

<section class=" py-5 shd">
    <div class="container py-3">

        <div id="about-hospital" class="pb-5">

            <img src="{{ asset($hospital->featured_image) }}" alt="">
            <div class="row bg-transparent hospital-text-box">
                <div class="col-md-11 mx-auto">
                    <div class="bg-white p-4 p-lg-5 ">
                        <h4 class="fw-600" >About Hospital</h4>
                        <p>{!! $hospital->description !!}</p>
                        <hr class="pb-4 mt-5">
                        <h4 class="fw-600" id="hospital-address">Hospital Address</h4>
                        <ul class="list-unstyled h-info mt-2 mb-0 ">
                            <li class="position-relative pl-4 col-md-4">

                                <img class="position-absolute l-0 pt-1 t-0" src="{{ asset('assets/images/loc.png') }}" alt="" />
                                {{ $hospital->address }}, {{ $hospital->city }},
                                {{ $hospital->state }}, {{ $hospital->pincode }}, India.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="team-and-specializations" class="team-and-specializations  mt-5 ">

            <h4 class="mb-2 fw-600">Team & Specialties</h4>
            <p>{!! $hospital->team_specialities !!}</p>
            <div class="ul_list">
                @if(count(explode(',',$hospital->speciality)))
                    <ul class="list-unstyled ul_list">
                    @foreach(explode(',',$hospital->speciality) as $speciality)

                            <li class="mb-3">{{ $speciality }}</li>



                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div id="infrastructure" class=" mt-5 ">

            <div class="row justify-content-end infrastructure">
                @if($hospital->image)
                <img class="z-2" src="{{ asset($hospital->image) }}" alt="" />
                @endif
                <div class="col-md-9">
                    <div class="theme-bg d-flex align-items-center">
                        <div class="theme-bg  position-relative px-3 px-lg-0 pr-lg-4 py-5">
                            <h4 class=" fw-600">Infrastructure</h4>
                            {!! $hospital->infrastructure !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="facilities" class="facilities mt-5">

            <h4 class="fw-600 my-4">Facilities</h4>
            <div>
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Comform During Stay</h6>
                        {!! $hospital->confirm_during_stay !!}
                    </div>
                    <div class="col-md-2">
                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Money Matters</h6>
                        {!! $hospital->money_matters !!}
                    </div>
                    <div class="col-md-2">
                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Food</h6>
                        {!! $hospital->food !!}
                    </div>
                    <div class="col-md-2">
                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Treatment Related</h6>
                        {!! $hospital->treatment_related !!}
                    </div>
                    <div class="col-md-2">
                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Languauge</h6>
                        {!! $hospital->languauge !!}
                    </div>
                    <div class="col-md-2">
                        <h6 class="fs-14 open-sans fw-600 mb-0 py-4 px-3">Transportation</h6>
                        {!! $hospital->transportation !!}
                    </div>
                </div>
            </div>

        </div>



        <div id="hospital-doctors" class="hospital-doctors mt-5 text-center">

            <h4 class="fw-600 mb-4 pt-5">Top Doctors of Artemis Hospital</h4>
            <div class="row">
                @if($doctors->count())
                    @foreach($doctors as $doctor)
                <div class="col-lg-6 col-xl-3 mb-4">
                    @if(!empty($doctor->image))
                    <a href="{{ route('doctor.show-front', ['slug' => $doctor->slug]) }}"><img src="{{ asset($doctor->image) }}" alt=""></a>
                    @endif
                    <div class="details-box bg-white px-3 py-4 position-relative text-center">
                        <h6 class="open-sans fw-700"><a href="{{ route('doctor.show-front', ['slug' => $doctor->slug]) }}">{{ $doctor->name }}</a></h6>
                        <h6 class="fs-13">{{ $doctor->designation }}</h6>
                    </div>
                </div>
                    @endforeach
                    @endif


            </div>
            {{--<div class="text-center">

                <a href="#" class="themebtn alt-btn ">LOAD MORE</a>
            </div>--}}
        </div>


    </div>
</section>


<!-- hospital Details End -->


<!-- Top 10 Hospitals in India Us Start -->

<section class="  pt-5 theme-bg happy-patients" >
    <div class="container py-3 ">
        <div class="px-lg-5 text-center">

           {{-- <h2 class="section-title ">Top 10 Hospitals in India</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
--}}
        </div>
    </div>
</section>
<!-- Top 10 Hospitals in India Us End -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#infrastructure ol li').addClass('mb-3 pl-3');
            $('#infrastructure ol').addClass('pl-3 mt-4 mb-0');
            $('#facilities ul').addClass('list-unstyled mt-3');
        });
    </script>
    @endsection
