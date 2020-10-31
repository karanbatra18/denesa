@extends('layouts.main')
@section('content')
    @php
        $speciality = [$specialityQuery];
    @endphp
    <!-- Inner page title Start Here -->

    <section class="inner-page-title" >
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Top Hospitals</h2>
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
                        <option @if(in_array('Multi Speciality', $speciality)) selected @endif>Multi Speciality</option>
                        <option @if(in_array('Obstetrics and Gynaecology', $speciality)) selected @endif>Obstetrics and Gynaecology</option>
                        <option @if(in_array('Neurology and Neurosurgery', $speciality)) selected @endif>Neurology and Neurosurgery</option>
                        <option @if(in_array('Haematology', $speciality)) selected @endif>Haematology</option>
                        <option @if(in_array('Cardiology', $speciality)) selected @endif>Cardiology</option>
                        <option @if(in_array('Surgery and Urology', $speciality)) selected @endif>Surgery and Urology</option>
                        <option @if(in_array('Rheumatology', $speciality)) selected @endif>Rheumatology</option>
                        <option @if(in_array('Gastroenterology', $speciality)) selected @endif>Gastroenterology</option>
                        <option @if(in_array('Oral and Maxillofacial', $speciality)) selected @endif>Oral and Maxillofacial</option>
                        <option @if(in_array('Psychiatry and many more', $speciality)) selected @endif>Psychiatry and many more</option>
                        <option @if(in_array('Organ transplants', $speciality)) selected @endif>Organ transplants</option>

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


    <!-- Hospital Listing Start -->

    <section class="top_hospitals py-5">
        <div class="container py-3">
            <h2 class="section-title text-left ">Top 10 Hospitals in India <a style="float:right" href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 show_all">Show All Hospitals</a></h2>
@if($topHospitals->count())
    @foreach($topHospitals as $hospital)
            <div class="hospital-listing p-3 p-lg-5 shadow mb-5">
                <div class="row">

                    <div class="  col-xl-4  mb-4 mb-xl-0">

                        <div class="feature-hospitals border bg-white mb-0 d-flex align-items-center justify-content-center">
                            @if(!empty($hospital->featured_image))
                                <img class="dr" src="{{ asset($hospital->featured_image) }}" alt="">
                            @endif
                        </div>

                    </div>

                    <div class="  col-xl-8  mb-4 mb-xl-0">
                        <div class="row">
                            <div class="col-md-4 order-sm-2 mb-2 mb-lg-0">
                                <a href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 consulation_class">FREE Consultation</a>
                            </div>
                            <div class="col-md-8 order-sm-1 ">
                                <h4 class="fs-20 muli-font fw-600"><a href="{{ route('hospital.show-front', ['slug' => $hospital->slug]) }}" >{{ $hospital->name }}, {{ $hospital->city }}</a></h4>
                            </div>

                        </div>

                        <p>{!! \Illuminate\Support\Str::limit($hospital->description,250) !!}</p><a href="{{ route('hospital.show-front', ['slug' => $hospital->slug]) }}" class="link-color ml-1 d-inline-block">[Read more]</a>
                        <ul class="list-unstyled mt-4 mb-0 ">
                            <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="assets/images/locations.png" alt="" /></span><b>Locacton </b>:  {{ $hospital->city }}, India</li>
                            <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="assets/images/establised.png" alt="" /></span><b>Established In </b>:  {{ $hospital->established }}</li>
                            <li class="position-relative pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="assets/images/speciality.png" alt="" /></span><b>Speciality </b>:  {{ $hospital->speciality }} </li>
                        </ul>
                    </div>

                </div>
            </div>
                @endforeach
            @endif
        </div>
    </section>

    <section class="all_hospitals py-5" style="display: none">
        <div class="container py-3">
            <h2 class="section-title text-left ">All Hospitals in India <a style="float:right" href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 show_top">Top 10 Hospitals</a></h2>
            @if($hospitals->count())
                @foreach($hospitals as $hospital)
                    <div class="hospital-listing p-3 p-lg-5 shadow mb-5">
                        <div class="row">

                            <div class="  col-xl-4  mb-4 mb-xl-0">

                                <div class="feature-hospitals border bg-white mb-0 d-flex align-items-center justify-content-center">
                                    @if(!empty($hospital->featured_image))
                                        <img class="dr" src="{{ asset($hospital->featured_image) }}" alt="">
                                    @endif
                                </div>

                            </div>

                            <div class="  col-xl-8  mb-4 mb-xl-0">
                                <div class="row">
                                    <div class="col-md-4 order-sm-2 mb-2 mb-lg-0">
                                        <a href="javascript:;" class="themebtn mt-0 alt-btn theme-alt-bg text-white border-0 mb-2 consulation_class">FREE Consultation</a>
                                    </div>
                                    <div class="col-md-8 order-sm-1 ">
                                        <h4 class="fs-20 muli-font fw-600"><a href="{{ route('hospital.show-front', ['slug' => $hospital->slug]) }}" >{{ $hospital->name }}, {{ $hospital->city }}</a></h4>
                                    </div>

                                </div>

                                <p>{!! \Illuminate\Support\Str::limit($hospital->description,250) !!}</p><a href="{{ route('hospital.show-front', ['slug' => $hospital->slug]) }}" class="link-color ml-1 d-inline-block">[Read more]</a>
                                <ul class="list-unstyled mt-4 mb-0 ">
                                    <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="assets/images/locations.png" alt="" /></span><b>Locacton </b>:  {{ $hospital->city }}, India</li>
                                    <li class="position-relative mb-2 pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="assets/images/establised.png" alt="" /></span><b>Established In </b>:  {{ $hospital->established }}</li>
                                    <li class="position-relative pl-4"><span class="d-inline-block position-absolute l-0 t-0"><img src="assets/images/speciality.png" alt="" /></span><b>Speciality </b>:  {{ $hospital->speciality }} </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                @endforeach
            @endif






            <div class="col-lg-12 mt-5">

                <ul class="pagination justify-content-center">
                    {!! $hospitals->links() !!}
                </ul>

            </div>




        </div>
    </section>

    <!-- Hospital Listing Start -->



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
                $('.all_hospitals').hide();
                $('.top_hospitals').show();
            });
            $('.show_all').on('click', function() {
                $('.top_hospitals').hide();
                $('.all_hospitals').show();

            });

           $('.common_search').on('change', function(){
               var treatment = $('select[name="treatment"]').val();
               var speciality = $('select[name="speciality"]').val();
               var city = $('select[name="city"]').val();
                location.href = "{{ route('hospital.index-front') }}"+"?treatment="+treatment+"&speciality="+speciality+"&city="+city;
           });
        });
    </script>
    @endsection