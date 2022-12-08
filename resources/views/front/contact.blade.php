@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ trans('site.contact') }}
@endsection
@section('content')
    <!-- Page Content -->
    <!--breadcrumb-->
    @include('front.components.breadcrumb', [
        'name' => trans('site.contact'),
    ])
    <!--contact form-->
    <section class="contact-form-area">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="contact-form">
                            <!--toast success-->
                            <div class="toast-part">
                                <div id="message-success" class="toast align-items-center text-white border-0 bg-success"
                                    role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="toast-content d-flex">
                                        <div class="toast-body">
                                            {{ trans('site.sent_successully') }}
                                        </div><button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <form method="post" class="contact-us" id="contact-us">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="@lang('site.name')"
                                                name="name" id="name">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="email" placeholder="@lang('site.email')"
                                                name="email" id="email">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input class="form-control" type="number" placeholder="@lang('site.phone')"
                                                name="phone" id="phone">
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" placeholder="@lang('site.message')" name="message" id="message"></textarea>
                                            <div class="invalid-feedback d-none"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button class="btn" type="submit">@lang('site.send_now') </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-info">
                            <div class="info"><i class="fa-solid fa-location-dot"></i>
                                <div><span>@lang('site.contact_info')</span>
                                    <p>{{Settings()->address}} </p>
                                </div>
                            </div>
                            <div class="info"><i class="fa-solid fa-envelope-open-text"></i>
                                <div><span>@lang('site.phone')</span><a href="tel:{{Settings()->phone}} ">{{Settings()->phone}} </a></div>
                            </div>
                            <div class="info"><i class="fa-solid fa-phone-volume"></i>
                                <div><span>@lang('site.email')</span><a href="mailto:{{Settings()->email}} ">{{Settings()->email}} </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact form-->
    <!--map-->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d116233.32603351548!2d47.009634!3d24.440672!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x26d8b3e2ef3bfcdb!2sJCC%20for%20Construction%20Chemicals!5e0!3m2!1sen!2sus!4v1656342053980!5m2!1sen!2sus"
            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!--map-->
@endsection
