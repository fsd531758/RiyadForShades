@extends('frontend.layouts.master')
@section('content')
    <main id="main">
        <!-- Intro Single-->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">سابقة الاعمال</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> <a
                                        href="{{ route('galleries') }}">سابقة الاعمال</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Intro Single-->
        <!-- Services-->
        <section class="section-property pb-5">
            <div class="container">
                <div class="row">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-4">

                            <div class="carousel-item-b">
                                <div class="card-box-a ">
                                    <div class="img-box-a">
                                        <a href="{{ asset($gallery->image) }}" data-lightbox="portfolio"><img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        {{ $galleries->links('frontend.pagination.default') }}
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services-->
    </main>
@endsection
@push('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
@endpush
