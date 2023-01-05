@extends('frontend.layouts.master')
@section('content')
<main id="main">
      <!-- Intro Single-->
      <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">المزيد عن ظلال الغيوم</h1>
              </div>  
            </div>
            <div class="col-md-12 col-lg-4">
              <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $about->title}}</li>
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
            <div class="col-sm-12 position-relative">
              <div class="about-img-box"><img class="img-fluid" src="assets/img/slide-about-1.jpg" alt="{{ 'الصورة العلوية ' . $about->title}}"></div>
              <div class="sinse-box">
                <h3 class="sinse-title">من أجل راحة عملائنا</h3>
              </div>
            </div>
            <div class="col-md-12 section-t8 position-relative">
              <div class="row">
                <div class="col-md-6 col-lg-5"><img class="img-fluid" src="{{ asset( $about->image )}}" alt="{{ 'صورة ' . $about->title}}"></div>
                <div class="col-md-6 col-lg-5 section-md-t3">
                  <div class="title-box-d">
                    <h3 class="title-d">{{ $about->title}}</h3>
                  </div>
                    {!! $about->description !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End About Section-->
    </main>
@endsection