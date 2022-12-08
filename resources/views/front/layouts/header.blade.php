<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" @if (app()->getLocale() == 'ar') dir="rtl" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="{{ Settings()->meta_description }}">
    <meta property="og:title" content="{{ Settings()->website_title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::root() }}">
    <meta property="og:image" content="{{ asset(settings()->logo) }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ Request::getHost() }}">
    <meta property="twitter:url" content="{{ Request::root() }}">
    <meta name="twitter:title" content="{{ settings()->website_title }}">
    <meta name="twitter:description" content="{{ settings()->meta_description }}">
    <meta name="twitter:image" content="{{ asset(settings()->logo) }}">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="{{ Settings()->meta_keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset(Settings()->breadcrumb) }}">
    <!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script><![endif]-->
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
</head>

<body>
    <div class="main-wrapper">
        <!--loading-->
        <div class="preloader"><img src="{{ asset(settings()->logo) }}" alt="image"></div>
        <!--loading-->
        <header>
            <div class="topbar">
                <div class="container">
                    <div class="content">
                        <div class="top-part-logo"><a class="navbar-brand" href="{{ route('home') }}"> <img
                                    class="img-fluid" data-src="{{ asset(settings()->logo) }}" alt="image"></a>
                        </div>
                        <div class="some-info">
                            <div class="info"><span class="icon"><i class="fa-solid fa-phone-volume"></i></span>
                                <p>
                                    <label>@lang('site.phone')</label><a style="direction: ltr; display: inline-flex;"
                                        href="tel:{{ settings()->phone }}">{{ settings()->phone }}</a>
                                </p>
                            </div>
                            <div class="info"><span class="icon"><i
                                        class="fa-solid fa-envelope-open-text"></i></span>
                                <p>
                                    <label>@lang('site.email') </label><a
                                        href="mailto:{{ settings()->email }}">{{ settings()->email }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar main-nav navbar-expand-lg">
                <div class="container">
                    <div class="content">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item {{ Route::is('home') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('home') }}">@lang('site.home')</a></li>
                                <li class="nav-item {{ Route::is('about') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('about') }}">@lang('site.about')
                                    </a></li>
                                <li class="nav-item {{ Route::is('news') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('news') }}">@lang('site.news')</a>
                                </li>
                                <li class="nav-item {{ Route::is('products') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('products') }}">@lang('site.products')</a></li>
                                <li class="nav-item {{ Route::is('contact') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('contact') }}">@lang('site.contact')</a></li>
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    @if ( app()->getLocale() == 'ar' ) 
                                        <img class="px-1" src="{{ asset('site/images')}}/ar.svg" style="wdith:30px; height:20px;">العربية 
                                    @else
                                        <img class="px-1" src="{{ asset('site/images')}}/en.svg" style="wdith:30px; height:20px;">English 
                                    @endif
                                </a>
                                    <ul class="dropdown-menu">
                                       {{-- @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li><a class="dropdown-item" rel="alternate"
                                                    hreflang="{{ $localeCode }}"
                                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                            </li>
                                        @endforeach --}}
                                        <li><a class="dropdown-item" rel="alternate"
                                                    hreflang="ar"
                                                    href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img class="px-1" src="{{ asset('site/images')}}/ar.svg" style="wdith:30px; height:20px;"> العربية</a>
                                        </li>
                                        <li><a class="dropdown-item" rel="alternate"
                                                    hreflang="en"
                                                    href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img class="px-1" src="{{ asset('site/images')}}/en.svg" style="wdith:30px; height:20px;"> English</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <button class="navbar-toggler" aria-label="menue icon">
                            <div class="hamburger-menu"><span></span><span></span><span></span></div>
                        </button>
                        <div class="company-profile">
                            <div><span>@lang('site.download')</span><a target="_blank" href="{{asset(Settings()->pdf)}}">@lang('site.company_profile')</a></div>
                        </div>
                    </div>
                </div>
            </nav>
            <aside class="side-widget">
                <div class="inner">
                    <div class="logo"><a href="{{ route('home') }}"><img
                                data-src="{{ asset(settings()->logo) }}" alt="image"></a>
                        <hr>
                        <div class="side-menu">
                            <ul>
                                <li class="nav-item {{ Route::is('home') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('home') }}">@lang('site.home')</a></li>
                                <li class="nav-item {{ Route::is('about') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('about') }}"> @lang('site.about')</a></li>
                                <li class="nav-item {{ Route::is('news') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('news') }}">@lang('site.news')</a></li>
                                <li class="nav-item {{ Route::is('products') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('products') }}">@lang('site.products')</a></li>
                                <li class="nav-item {{ Route::is('contact') ? 'active' : '' }}"><a class="nav-link" aria-current="page"
                                        href="{{ route('contact') }}"> @lang('site.contact')</a></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="hide-mobile">
                            <div class="widget-title">@lang('site.contact_info')</div>
                            <div class="address">
                                <p> <a href="tel:{{ settings()->phone }}"> {{ settings()->phone }}</a><a
                                        href="mailto:{{ settings()->email }}">
                                        {{ settings()->email }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </header>
