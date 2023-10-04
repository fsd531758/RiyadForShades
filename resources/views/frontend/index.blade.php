@extends('frontend.layouts.master')
@section('content')
    <!-- Intro Section-->
    <div class="intro intro-carousel swiper position-relative">
        <div class="swiper-wrapper">
            @foreach ($slider as $slide)
                <div class="swiper-slide carousel-item-a intro-item bg-image"
                    style="background-image: url({{ asset($slide->image) }})">
                    <div class="overlay overlay-a"></div>
                    <div class="intro-content display-table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="intro-body">
                                            <h1 class="intro-title mb-4">{{ $slide->title }}</span></h1>
                                            <p class="intro-title-top">{!! $slide->description !!}</p>
                                            <p class="intro-subtitle intro-price"><a href="{{ route('about') }}"><span
                                                        class="price-a">@lang('words.read_more')</span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- End Intro Section-->
    <!-- About Section-->
    <section class="section-about">
        <div class="container">
            <div class="row">
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
    <!-- About Section-->
    <!-- Main-->
    <main id="main">
        <!-- Services Section-->
        <section class="section-services section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box-d">
                                <h2 class="title-d">@lang('words.features')</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($advantages as $advantage)
                        <div class="col-md-4">
                            <div class="card-box-c foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <i class="{{ $advantage->icon }}"></i>
                                        <h6 class="title-c"> {{ $advantage->title }}
                                        </h6>
                                    </div>
                                </div>
                                {{-- <div class="card-body-c">
                    <p class="content-c">{!! $advantage->description !!} </p>
                  </div> --}}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Services Section-->
        <!-- Services-->
        <section class="section-property section-t8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box-d">
                                <h2 class="title-d">@lang('words.services')</h2>
                            </div>
                            <div class="title-link"><a href="{{ route('services') }}">جميع الخدمات<span
                                        class="bi bi-chevron-left"></span></a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-lg-4">
                            <div class="carousel-item-b">
                                <div class="card-box-a card-shadow">
                                    <div class="img-box-a"><img class="img-a img-fluid" src="{{ asset($service->image) }}"
                                            alt="{{ $service->title }}"></div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-a-content">
                                            <div class="card-header-a">
                                                <h2 class="card-title-a"><a
                                                        href="{{ route('service', $service->id) }}">{{ $service->title }}</a>
                                                </h2>
                                                {{-- {!! $service->description !!} --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="propery-carousel-pagination carousel-pagination"></div>
            </div>
        </section>
        <!-- End Services-->
        <!-- Contact Single-->
        <section class="contact pb-5 section-t8" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap">
                            <div class="title-box-d">
                                <h2 class="title-d">@lang('words.contact_us')</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="email-form" method="POST" action="{{ route('contact.save') . '#contact' }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg form-control-a" type="text"
                                                name="name" placeholder="@lang('words.name')" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg form-control-a" name="email"
                                                type="email" placeholder="@lang('words.email')" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg form-control-a" type="text"
                                                name="phone" placeholder="@lang('words.phone')" required>
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" cols="45" rows="8" placeholder="@lang('words.message')"
                                                required></textarea>
                                            @error('message')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn-a" type="submit">@lang('words.send')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 section-md-t3">
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon"><span class="bi bi-envelope"></span></div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">@lang('words.call_us')</h4>
                                    </div>
                                    <div class="icon-box-content">

                                        @foreach (contacts() as $contact)
                                            @if ($contact->type == 'phone')
                                                <p class="mb-1">@lang('words.phone') :
                                                    <label style="direction:ltr;">
                                                        <a href="tel:{{ $contact->contact }}">{{ $contact->contact }}</a>
                                                    </label>
                                                </p>
                                            @elseif ($contact->type == 'email')
                                                <p class="mb-1">@lang('words.email') :
                                                    <a href="mailto:{{ $contact->contact }}"
                                                        class="color-a">{{ $contact->contact }}</a>
                                                </p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon"><span class="bi bi-geo-alt"></span></div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">@lang('words.address')</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">{{ settings()->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Single-->
        <!-- End main-->
    </main>
@endsection
@push('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
@endpush
