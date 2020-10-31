@extends('layouts.main')
@section('content')
    @php
        $speciality = [$specialityQuery];
    @endphp
    <!-- Inner page title Start Here -->

    <section class="inner-page-title" >
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Top Doctors</h2>

        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- Filter Form Start Here -->

    <section class="filter-form py-2 theme-alt-bg">
        <div class="container position-relative">
            <span class="icon l-0">Filter</span>
            <form class="row ">

                <div class="col-md-4 my-3">
                    <select name="treatment" class="form-control common_search">
                        <option value="">Search Treatment</option>
                        @if($treatments->count())
                            @foreach($treatments as $treatment)
                                <option {{ $treatmentQuery == $treatment->slug ? 'selected' : '' }} value="{{ $treatment->slug }}">{{ $treatment->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class=" col-md-4  my-3">
                        <select name="speciality" class="form-control common_search">
                            <option value="">Search Speciality</option>
                            <option @if(in_array('Intracranial Tumor', $speciality)) selected @endif>Intracranial Tumor</option>
                            <option @if(in_array('Deep Brain Stimulation', $speciality)) selected @endif>Deep Brain Stimulation</option>
                            <option @if(in_array('Spinal', $speciality)) selected @endif>Spinal</option>
                            <option @if(in_array('Gamma Knife Radio', $speciality)) selected @endif>Gamma Knife Radio</option>
                            <option @if(in_array('Parkinson Disease', $speciality)) selected @endif>Parkinson Disease</option>
                            <option @if(in_array('Epilepsy', $speciality)) selected @endif>Epilepsy</option>
                            <option @if(in_array('Obsessive Compulsive Disorder', $speciality)) selected @endif>Obsessive Compulsive Disorder</option>
                            <option @if(in_array('Brachial Plexus Injuries', $speciality)) selected @endif>Brachial Plexus Injuries</option>
                        </select>
                </div>

                <div class=" col-md-4 my-3">
                        <select name="city" class="form-control common_search">
                            <option value="">Search City</option>
                            @if($cities->count())
                                @foreach($cities as $city)
                                    <option {{ $city->name == $cityQuery ? 'selected' : '' }} value="{{ $city->name }}">{{ $city->name }}</option>
                                @endforeach
                            @endif
                        </select>
                </div>
            </form>
        </div>
    </section>


    <!-- Filter Form End Here -->


    <!-- Doctors listing Start -->

    <section class="top_doctor py-5">
        <div class="container py-3">
            <h2 class="section-title text-left ">Top 10 Doctors in India <a style="float:right" href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 show_all">Show All Doctors</a></h2>

            @if($topDoctors->count())
                @foreach($topDoctors as $doctor)
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
                                <a href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 consulation_class">FREE Consultation</a>
                            </div>
                            <div class="col-xl-8">
                                <h4 class="fs-20 muli-font fw-600"><a href="{{ route('doctor.show-front', ['slug' => $doctor->slug]) }}" >{{ $doctor->name }}, {{ @$doctor->city->name }}</a></h4>
                            </div>
                        </div>
                        <p>{!! \Illuminate\Support\Str::limit($doctor->about,250) !!} </p><a href="{{ route('doctor.show-front', ['slug' => $doctor->slug]) }}" class="link-color ml-1 d-inline-block">[Read more]</a>
                        <ul class="list-unstyled mt-4 mb-0 ">
                            <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="{{ asset('assets/images/designation.png') }}" alt="" /></span><b>Designation </b>: {{ $doctor->designation }}</li>
                            <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="{{ asset('assets/images/qualification.png') }}" alt="" /></span><b>Qualifications</b>: {{ $doctor->qualification }}</li>
                            <li class="position-relative "><span class="d-inline-block position-absolute l-0 t-0"><img src="{{ asset('assets/images/specialitys.png') }}" class="mr-2" alt="" /><b>Speciality</b>:</span> {{ $doctor->speciality }}</li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled h-info mt-2 mb-0 ">
                            <li class="position-relative pl-5"><span class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute l-0 t-0"><img src="{{ asset('assets/images/hospital.png') }}" alt="" /></span> <b class="fs-20 muli-font pr-2 fw-600">Hospital :</b>Artemis Hospital
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled h-info mt-2 mb-0 ">
                            <li class="position-relative pl-5"><span class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute l-0 t-0"><img src="{{ asset('assets/images/loc.png') }}" alt="" /></span> <b class="fs-20 muli-font pr-2 fw-600">Location :</b>{{ !empty($doctor->location) ? $doctor->location.', ' : '' }} {{ !empty($doctor->city) ? $doctor->city.', ' : '' }} {{ !empty($doctor->state) ? $doctor->state : '' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
                @endforeach
            @endif

        </div>
    </section>


    <section class="all_doctors py-5" style="display: none">
        <div class="container py-3">
            <h2 class="section-title text-left ">All Doctors in India  <a style="float:right" href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 show_top">Top 10 Doctors</a></h2>

            @if($doctors->count())
                @foreach($doctors as $doctor)
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
                                        <a href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 consulation_class">FREE Consultation</a>
                                    </div>
                                    <div class="col-xl-8">
                                        <h4 class="fs-20 muli-font fw-600"><a href="{{ route('doctor.show-front', ['slug' => $doctor->slug]) }}" >{{ $doctor->name }}, {{ @$doctor->city->name }}</a></h4>
                                    </div>
                                </div>
                                <p>{!! \Illuminate\Support\Str::limit($doctor->about,250) !!} </p><a href="{{ route('doctor.show-front', ['slug' => $doctor->slug]) }}" class="link-color ml-1 d-inline-block">[Read more]</a>
                                <ul class="list-unstyled mt-4 mb-0 ">
                                    <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="{{ asset('assets/images/designation.png') }}" alt="" /></span><b>Designation </b>: {{ $doctor->designation }}</li>
                                    <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="{{ asset('assets/images/qualification.png') }}" alt="" /></span><b>Qualifications</b>: {{ $doctor->qualification }}</li>
                                    <li class="position-relative "><span class="d-inline-block position-absolute l-0 t-0"><img src="{{ asset('assets/images/specialitys.png') }}" class="mr-2" alt="" /><b>Speciality</b>:</span> {{ $doctor->speciality }}</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled h-info mt-2 mb-0 ">
                                    <li class="position-relative pl-5"><span class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute l-0 t-0"><img src="{{ asset('assets/images/hospital.png') }}" alt="" /></span> <b class="fs-20 muli-font pr-2 fw-600">Hospital :</b>Artemis Hospital
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled h-info mt-2 mb-0 ">
                                    <li class="position-relative pl-5"><span class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute l-0 t-0"><img src="{{ asset('assets/images/loc.png') }}" alt="" /></span> <b class="fs-20 muli-font pr-2 fw-600">Location :</b>{{ !empty($doctor->location) ? $doctor->location.', ' : '' }} {{ !empty($doctor->city) ? $doctor->city.', ' : '' }} {{ !empty($doctor->state) ? $doctor->state : '' }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif






            <div class="col-lg-12 mt-5">

                <ul class="pagination justify-content-center">
                    {!! $doctors->links() !!}
                </ul>

            </div>






        </div>
    </section>
    <!-- Doctors listing End -->


    <!-- Top 10 Hospitals in India Us Start -->

    <section class="  pt-5 theme-bg happy-patients" >
        <div class="container py-3 ">
            <div class="px-lg-5 text-center">

                <h2 class="section-title ">Top 10 Hospitals in India</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>

            </div>
        </div>
    </section>
    <!-- Top 10 Hospitals in India Us End -->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.show_top').on('click', function() {
                $('.all_doctors').hide();
                $('.top_doctor').show();
            });
            $('.show_all').on('click', function() {
                $('.top_doctor').hide();
                $('.all_doctors').show();

            });

            $('.common_search').on('change', function(){
                var treatment = $('select[name="treatment"]').val();
                var speciality = $('select[name="speciality"]').val();
                var city = $('select[name="city"]').val();
                location.href = "{{ route('doctor.index-front') }}"+"?treatment="+treatment+"&speciality="+speciality+"&city="+city;
            });
        });
    </script>
@endsection