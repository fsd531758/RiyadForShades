@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ trans('site.home') }}
@endsection
@section('content')
    <!--main slider-->
    @include('front.components.slider')
    <!--main slider-->
    <!--features-->
    @include('front.components.features')
    <!--features-->
    <!--about us-->
    @include('front.components.about')
    <!--about us-->
    <!--categories-->
    @include('front.components.categories')
    <!--categories-->
    <!--video-->
    @include('front.components.video')
    <!--video-->
    <!--partners-->
    @include('front.components.partners')
    <!--partners-->
    <!--testimonials-->
    @include('front.components.testimonials')
    <!--testimonials-->
    <!--news-->
    @include('front.components.news')
    <!--news-->
@endsection
