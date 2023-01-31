@extends('frontend.layouts.master')
@section('content')
<main id="main">
      <!-- Intro Single-->
      <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">{{ $product->title}}</h1>
              </div>  
            </div>
            <div class="col-md-12 col-lg-4">
              <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> <a href="{{ route('products') }}">الخدمات</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $product->title}}</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- End Intro Single-->
      <!-- About Section-->
      <section class="section-about pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <div class="row">
                  <div class="col-md-6 col-lg-5"><img class="img-fluid" width="500px" height="300px" src="{{ asset( $product->image )}}" alt="{{ 'صورة ' . $product->title}}"></div>
                  <div class="col-md-6 col-lg-5">
                      {!! $product->description !!}
                  </div>
                </div>
              </div>            
          </div>
        </div>
      </section>
      <!-- End About Section-->
    </main>
@endsection
@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
@endpush