@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ $category->title }}
@endsection
@section('content')
    <!-- Page Content -->
    <!--breadcrumb-->
    @include('front.components.breadcrumb', [
        'name' => $category->title,
    ])
    <!--products-->
    <section class="products">
        <div class="container">
            <div class="content">
                <div class="row">
                    @if (count($category->products) > 0)
                        @foreach ($category->products as $product)
                            <div class="col-lg-3 col-md-6 box">
                                <div class="products-box">
                                    <div class="products-image"><a href="{{ route('single-product', $product->id) }}"> <img
                                                class="img-fluid" src="{{ asset($product->main_image) }}"
                                                alt="{{ $product->title }}" /></a></div>
                                    <div class="products-text">
                                        <div class="title"><a href="{{ route('single-product', $product->id) }}">
                                                <h2>{{ $product->title }}</h2>
                                            </a></div>
                                        <div class="description">
                                            {{ strip_tags( mb_substr($product->description, 0, 100))}} ...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="data-notfound">
                            <p class="oops">{{ trans('site.oops') }}!</p>
                            <p class="text"><strong>{{ trans('site.no_products') }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--products-->
@endsection
