@extends('frontend.layouts.master')
@section('content')
<main id="main">
      <!-- Intro Single-->
      <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">تواصل معنا</h1>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                  <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <!-- End Intro Single-->
      <!-- Contact Single-->
      <section class="contact pb-5" id="contact">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="contact-map box">
                <div class="contact-map" id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252866.03707212137!2d46.56781625651157!3d24.75734319808567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2seg!4v1643805309545!5m2!1sen!2seg" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="col-sm-12 section-t8">
              <div class="row">
                <div class="col-md-7">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('success')}}
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                  <form class="email-form" method="POST" action="{{route('contact.save').'#contact'}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input class="form-control form-control-lg form-control-a" type="text" name="name" placeholder="الإسم" required>
                          @error('name')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input class="form-control form-control-lg form-control-a" name="email" type="email" placeholder="البريد الإلكتروني" required>
                          @error('email')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <div class="form-group">
                          <input class="form-control form-control-lg form-control-a" type="text" name="phone" placeholder="الهاتف" required>
                          @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" name="message" cols="45" rows="8" placeholder="الرسالة" required></textarea>
                          @error('message')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12 mt-3">
                        <button class="btn btn-a" type="submit">إرسال</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-5 section-md-t3">
                  <div class="icon-box section-b2">
                    <div class="icon-box-icon"><span class="bi bi-envelope"></span></div>
                    <div class="icon-box-content table-cell">
                      <div class="icon-box-title">
                        <h4 class="icon-title">إتصل بنا</h4>
                      </div>
                      <div class="icon-box-content">
                        <p class="mb-1">البريد الإلكتروني: <span class="color-a">{{ settings()->email}}</span></p>
                        <p class="mb-1">الهاتف: <span class="color-a">{{ settings()->phone}}</span></p>
                      </div>
                    </div>
                  </div>
                  <div class="icon-box section-b2">
                    <div class="icon-box-icon"><span class="bi bi-geo-alt"></span></div>
                    <div class="icon-box-content table-cell">
                      <div class="icon-box-title">
                        <h4 class="icon-title">الموقع</h4>
                      </div>
                      <div class="icon-box-content">
                        <p class="mb-1">المملكة العربية السعودية</p>
                      </div>
                    </div>
                  </div>
                  <div class="icon-box">
                    <div class="icon-box-icon"><span class="bi bi-share"></span></div>
                    <div class="icon-box-content table-cell">
                      <div class="icon-box-title">
                        <h4 class="icon-title">مواقع التواصل</h4>
                      </div>
                      <div class="icon-box-content">
                        <div class="socials-footer">
                          <ul class="list-inline">
                            <li class="list-inline-item"><a class="link-one" href="{{ settings()->facebook}}"><i class="bi bi-facebook" aria-hidden="true"></i></a></li>
                            <li class="list-inline-item"><a class="link-one" href="{{ settings()->twitter}}"><i class="bi bi-twitter" aria-hidden="true"></i></a></li>
                            <li class="list-inline-item"><a class="link-one" href="{{ settings()->instagram}}"><i class="bi bi-instagram" aria-hidden="true"></i></a></li>
                            <li class="list-inline-item"><a class="link-one" href="{{ settings()->youtube}}"><i class="bi bi-youtube" aria-hidden="true"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Single-->
    </main>
@endsection
@push('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
@endpush