<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{settings()->website_title}} | الرئيسية</title>
    <meta content="{{settings()->meta_description}}" name="description">
    <meta content="{{settings()->meta_keywords}}" name="keywords">
    <meta property="og:title" content="{{settings()->	website_title}}">
    <meta property="og:type" content="The type">
    <meta property="og:url" content="{{route('home')}}">
    <meta property="og:image" content="http://image.jpg">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="{{ settings()->logo }}" rel="icon" type="image/x-icon">
    <link href="{{asset('assets')}}/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;700&amp;display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/animate/animate.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/over.css" rel="stylesheet">
    <link href="{{asset('assets')}}/dist/css/lightbox.css" rel="stylesheet" />
    @stack('css')
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js">
      </script>
    <![endif]-->
  </head>
  <body>
    @include('frontend.layouts.nav')
    @yield('content')
    @include('frontend.layouts.footer')

  <!-- PreLoader-->
  <div id="preloader"></div>
    <!-- PreLoader-->
    <!-- To top --><a class="back-to-top d-flex align-items-center justify-content-center" href="#"><i class="bi bi-arrow-up-short"></i></a>
    <!-- To top -->
    <!-- Scripts-->
    <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
    <script src="{{asset('assets')}}/dist/js/lightbox-plus-jquery.js"></script>
    {{-- <script src="{{asset('assets')}}/dist/js/lightbox.js"></script> --}}
    @stack('scripts')
  </body>
</html>