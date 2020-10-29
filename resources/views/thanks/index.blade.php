@extends('layouts.main')
@section('content')
    <!-- Inner page title Start Here -->
<style>
    .free-consultation{
        display: none;
    }
</style>
    <section class="inner-page-title">
        <div class="container  ">
            <h2 class="text-white text-center fw-500">Thank You</h2>
        </div>
    </section>

    <!-- Inner page title End Here -->


    <!-- Who we are Start Here -->
    <section class=" py-5">
        <div class="container py-4 text-center">
            <h2>Dear {{ isset($_GET['visitor']) ? $_GET['visitor'] : 'Visitor,' }} </h2>
            <p>Thank you for showing your interest in our services. The team of Denesa Health is happy to hear from you, and we will revert you within 24 hours to serve your personalised requirements.

                In the meantime, you may check the information on our website to have an overview about the top doctors, best hospitals and get a free quote about your treatment.</p>
        </div>
    </section>
    <!-- Who we are End Here -->



    <!-- Mission Start Here -->









    <!-- Certified  Start -->

    {{--<section class=" pt-5 theme-bg happy-patients position-relative ">

        <div class="container pt-5">
            <div class="px-lg-5 text-center pt-4">

                </div>
        </div>
    </section>--}}
    <!-- Certified End -->
@endsection