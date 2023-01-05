@extends('frontend.layouts.master')
@section('content')
<main id="main">
      <!-- Intro Single-->
      <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">خدماتنا</h1>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page">خدماتنا</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- End Intro Single-->
      <!-- Services-->
      <section class="section-property pb-5">
        <div class="container">
          <div class="row">
          @foreach ($services as $service)
            <div class="col-lg-4">
              <div class="carousel-item-b">
                <div class="card-box-a card-shadow">
                  <div class="img-box-a"><img class="img-a img-fluid" src="{{asset( $service->image )}}" alt="{{ $service->title }}"></div>
                  <div class="card-overlay">
                    <div class="card-overlay-a-content">
                      <div class="card-header-a">
                        <h2 class="card-title-a"><a href="single-service.html">{{ $service->title }}</a></h2>
                        {!! $service->description !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>

          <div class="row">
            <div class="col-sm-12">
              {{ $services->links('frontend.pagination.default') }}
            </div>
          </div>
        </div>
      </section>
      <!-- End Services-->
    </main>
@endsection