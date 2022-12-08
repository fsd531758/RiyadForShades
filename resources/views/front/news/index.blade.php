@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ trans('site.news') }}
@endsection
@section('content')
    <!-- Page Content -->
    <!--breadcrumb-->
    @include('front.components.breadcrumb', [
        'name' => trans('site.news'),
    ])
    <!--breadcrumb-->
    <!--news-->
    <section class="news-in-page">
        <div class="container">
            <div class="content">
                <div class="row">
                    @foreach ($news as $key => $new)
                        <div class="col-xl-4 col-md-6 box" data-aos="fade-up" data-aos-delay="{{ 100 * $key }}">
                            <div class="news-box">
                                <div class="news-image"><a href="{{ route('single-news', $new->id) }}"> <img
                                            class="img-fluid" src="{{ asset($new->main_image) }}"
                                            alt="{{ $new->title }}" /></a>
                                    <div class="news-date"><span
                                            class="num">{{ $new->created_at->format('d') }}</span><span
                                            class="month">{{ $new->created_at->format('M') }}</span>
                                    </div>
                                </div>
                                <div class="news-text">
                                    <div class="title"><a href="{{ route('single-news', $new->id) }}">
                                            <h3>{{ $new->title }}</h3>
                                        </a></div>
                                    <div class="description">
                                        {!! mb_substr($new->description, 0, 200) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--news-->
@endsection
