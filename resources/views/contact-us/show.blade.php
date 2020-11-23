@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->

    <section class="inner-page-title" >
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Contact us</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- contact  Start Here -->
    <section class=" py-5 ">
        <div class="container py-4 text-center">
            <div class="contact-box bg-white shadow">
                <div class="row py-5">
                    <div class="col-md-6 p-3 p-md-5">
                        <div class="icon-box">
                            <span class="rounded-circle z-0 d-inline-block"></span>
                            <img class="pl-4 position-relative" src="assets/images/supports.png" alt="" />
                        </div>
                        <h4 class="fw-600 muli-font pt-4">Support</h4>
                        {!! $contactSupport->support_text !!}
                        <p><span class="d-block theme-color">{{ $contactSupport->support_browse_text }}</span>
                            <a href="mailto:{{ $contactSupport->support_email_id }}">{{ $contactSupport->support_email_id }}</a></p>
                        <a href="{{ $contactSupport->support_link }}" class="themebtn alt-btn ">Contact support</a>
                        <ul class="list-unstyled social mt-4 support">
                            <li class="mb-1 ml-0"><a href="{{ $contactSupport->support_whatsapp ? "https://api.whatsapp.com/send?phone=".$contactSupport->support_whatsapp : 'https://api.whatsapp.com/send?phone=+917428231453' }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            <li class="mb-1 ml-0"><a href="mailto:{{ $contactSupport->support_email }}" target="_blank"><i class="fas fa-envelope"></i></a>
                            </li >
                            <li class="mb-1 ml-0"><a href="tel:{{ $contactSupport->support_call }}" target="_blank"><i class="fas fa-phone-alt"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 p-3 p-md-5">
                        <div class="icon-box">
                            <span class="rounded-circle z-0 d-inline-block"></span>
                            <img class="pl-4 position-relative" src="assets/images/queries.png" alt="" />
                        </div>
                        <h4 class="fw-600 muli-font pt-4">General Queries</h4>
                        <p>{!! $contactSupport->general_text !!}</p>
                        <p><span class="d-block theme-color">{{ $contactSupport->general_browse_text }}</span>
                            <a href="mailto:{{ $contactSupport->general_email_id }}">{{ $contactSupport->general_email_id }}</a></p>
                        <a href="{{ $contactSupport->general_link }}" class="themebtn alt-btn ">drop a query</a>
                        <ul class="list-unstyled social mt-4 support">
                            <li class="mb-1 ml-0"><a href="{{ $contactSupport->general_whatsapp ? "https://api.whatsapp.com/send?phone=".$contactSupport->general_whatsapp : 'https://api.whatsapp.com/send?phone=+917428231453' }}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            </li>
                            <li class="mb-1 ml-0"><a href="mailto:{{ $contactSupport->general_email }}" target="_blank"><i class="fas fa-envelope"></i></a>
                            </li >
                            <li class="mb-1 ml-0"><a href="tel:{{ $contactSupport->general_call }}" target="_blank"><i class="fas fa-phone-alt"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call-sales">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <h5 class="muli-font text-center py-5 fw-600">Call Sales Using One of Our Local Numbers</h5>
                    <div class="row">
                        @if($callSales->count())
                            @foreach($callSales as $callSale)
                        <div class="col-lg-6 mb-4">
                            <ul class="list-unstyled">
                                <li class="position-relative mb-4 py-1 fw-600 pl-5"><img src="{{ asset('assets/images/flag.png') }}" class=" d-block  position-absolute l-0 t-0" alt /> {{ $callSale->place }}</li>
                                <li class="position-relative mb-3"><i class="fas fa-map-marker-alt pt-1 d-block theme-color position-absolute l-0 t-0"></i>{!! $callSale->address !!}</li>

                                <li class="position-relative"><i class="fas pt-1 d-block theme-color fa-phone-alt position-absolute l-0 t-0"></i><a href="tel:{{ $callSale->phone }}">{{ $callSale->phone }}</a></li>
                            </ul>
                        </div>
                            @endforeach
                        @endif

                        <div class="col-lg-12 mb-5 pb-4">
                            <div class="green-bottom-border"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.1986727193153!2d77.05250171472034!3d28.443426847478307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1927648e22fd%3A0xfe77e89a909440eb!2sDenesa%20Health!5e0!3m2!1sen!2sin!4v1592077685301!5m2!1sen!2sin" height="450"  style="border:0;width:100%" ></iframe>
    </section>

    <!-- contact End Here -->
@endsection
