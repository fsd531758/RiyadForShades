@extends('frontend.layouts.master')
@section('content')
    <main id="main">
        <!-- Intro Single-->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">@lang('words.more_about_us')</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('words.home')</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> <a
                                        href="{{ route('about') }}">{{ $about->title }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Intro Single-->
        <!-- About Section-->
        <section class="section-about pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 position-relative">
                        <div class="about-img-box"><img class="img-fluid" src="assets/img/slide-about-1.jpg"
                                alt="{{ $about->title }}"></div>
                        <div class="sinse-box">
                            <h3 class="sinse-title">@lang('words.customer_satisfaction')</h3>
                        </div>
                    </div>
                    <div class="col-md-12 section-t8 position-relative">
                        <div class="row">
                            <div class="col-md-6 col-lg-5"><img class="img-fluid" src="{{ asset($about->image) }}"
                                    alt="{{ $about->title }}"></div>
                            <div class="col-md-6 col-lg-5 section-md-t3">
                                <div class="title-box-d">
                                    <h3 class="title-d">{{ $about->title }}</h3>
                                </div>
                                {!! $about->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section-->
    </main>
@endsection
@push('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
@endpush
