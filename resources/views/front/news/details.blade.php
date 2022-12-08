@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ $news_details->title }}
@endsection
@section('content')
    <!-- Page Content -->
    @include('front.components.breadcrumb', [
        'name' => $news_details->title,
    ])
    <!--breadcrumb-->
    <!--single news-->
    <section class="single-news">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="things-details-content">
                            <div class="image"><img class="img-fluid" data-src="{{ asset($news_details->main_image) }}"
                                    alt="{{ $news_details->title }}" /></div>
                            <div class="details">
                                <div class="title">
                                    <h3>{{ $news_details->title }}</h3>
                                </div>
                                <div class="text">
                                    {!! $news_details->description !!}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="side-list">
                            <div class="other-things">
                                <div class="title">
                                    <h3>@lang('site.latest_news')</h3>
                                </div>
                                <ul>
                                    @php
                                        $url_path = parse_url(URL::full(), PHP_URL_PATH);
                                        $parts = explode('/', $url_path);
                                    @endphp
                                    @foreach ($news as $single_news)
                                        <li class="{{ active($single_news->id) }}"><img class="img-fluid"
                                                src="{{ asset($single_news->main_image) }}"
                                                alt="{{ $single_news->title }}" />
                                            <div><a href="{{ route('single-news', $single_news->id) }}">
                                                    {{$single_news->title}}
                                                </a><span>{{ $single_news->created_at->format('d/m/Y') }}</span></div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="side-list-files">
                                <ul>
                                    @if ($news_details->first_file)
                                        <li><a class="button-widget" target="_blank"
                                                href="{{ asset($news_details->first_file) }}"><i
                                                    class="fa-solid fa-file-pdf"></i>
                                                <div class="click-here"><span>@lang('site.click_here')</span><span>
                                                        @lang('site.dowunload_broucher')</span></div>
                                            </a></li>
                                    @endif
                                    @if ($news_details->second_file)
                                        <li><a class="button-widget" target="_blank"
                                                href="{{ asset($news_details->second_file) }}"><i
                                                    class="fa-solid fa-file-pdf"></i>
                                                <div class="click-here"><span>@lang('site.click_here')</span><span>
                                                        @lang('site.dowunload_broucher')</span></div>
                                            </a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--single news-->
@endsection
