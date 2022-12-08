@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ trans('site.about') }}
@endsection
@section('content')
    <!--breadcrumb-->
    @include('front.components.breadcrumb', [
        'name' => trans('site.about'),
    ])
    <!--breadcrumb-->
    <!--about us-->
    @include('front.components.about')
    <!--about us-->
    <!--testimonials-->
    @include('front.components.testimonials')
    <!--testimonials-->
    <!--partners-->
    @include('front.components.partners')
    <!--partners-->
@endsection
