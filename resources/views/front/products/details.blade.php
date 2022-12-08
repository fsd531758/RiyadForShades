@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ $product->title }}
@endsection
@section('content')
    <!-- Page Content -->
    <!--breadcrumb-->
    @include('front.components.breadcrumb', [
        'name' => $product->title,
    ])
    <!--single product-->
    <section class="single-product">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="things-details-content">
                            <div class="image"><img class="img-fluid" data-src="{{ asset($product->main_image) }}"
                                    alt="{{ $product->title }}" /></div>
                            <div class="details">
                                <div class="title">
                                    <h3>{{ $product->title }}</h3>
                                </div>
                                <div class="text">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="side-list">
                            <div class="side-list-files">
                                <ul>
                                    @if ($product->first_file)
                                        <li><a class="button-widget" target="_blank"
                                                href="{{ asset($product->first_file) }}"><i
                                                    class="fa-solid fa-file-pdf"></i>
                                                <div class="click-here"><span>@lang('site.click_here')</span><span>
                                                        @lang('site.dowunload_broucher')</span></div>
                                            </a></li>
                                    @endif
                                    @if ($product->second_file)
                                        <li><a class="button-widget" target="_blank"
                                                href="{{ asset($product->second_file) }}"><i
                                                    class="fa-solid fa-file-pdf"></i>
                                                <div class="click-here"><span>@lang('site.click_here')</span><span>
                                                        @lang('site.dowunload_broucher')</span></div>
                                            </a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="other-things">
                                <div class="title">
                                    <h3>@lang('site.products')</h3>
                                </div>
                                <ul>
                                    @php
                                        $url_path = parse_url(URL::full(), PHP_URL_PATH);
                                        $parts = explode('/', $url_path);
                                    @endphp
                                    @foreach ($products as $single_product)
                                        <li class="{{ active($single_product->id) }}">
                                            <img class="img-fluid" src="{{ asset($single_product->main_image) }}"
                                                alt="{{ $single_product->title }}" />
                                            <div><a href="{{ route('single-product', $single_product->id) }}">
                                                    {{ $single_product->title }}</a></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--single product-->
@endsection
