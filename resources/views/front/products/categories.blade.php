@extends('front.layouts.master')
@section('title')
    {{ settings()->website_title }} | {{ trans('site.categories') }}
@endsection
@section('content')
    <!-- Page Content -->
    <!--breadcrumb-->
    @include('front.components.breadcrumb', [
        'name' => trans('site.categories'),
    ])
    <!--breadcrumb-->
    <!--categories-->
    <section class="categories">
        <div class="container">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="nav flex-column nav-pills" id="categories-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($main_cats as $key => $cat)
                                <button class="nav-link @if ($key == '0') active @endif"
                                    id="categories-{{ $key + 1 }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#categories-{{ $key + 1 }}" type="button" role="tab"
                                    aria-controls="categories-{{ $key + 1 }}" aria-selected="true"> <span>
                                        {{ $cat->title }}</span></button>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content" id="categories-tabContent">
                            @foreach ($main_cats as $key_two => $cat_two)
                                <div class="tab-pane fade @if ($key_two == '0') show active @endif"
                                    id="categories-{{ $key_two + 1 }}" role="tabpanel"
                                    aria-labelledby="categories-{{ $key_two + 1 }}-tab">
                                    <div class="row">
                                        @foreach ($cat_two->child as $child_key => $child)
                                            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="50">
                                                <div class="categories-box"><a
                                                        href="{{ route('single-category', $child->id) }}">
                                                        <div class="icon"><i class="fa-solid {{ $child->icon }}"></i>
                                                        </div>
                                                        <div class="title">
                                                            <h2>{{ $child->title }}</h2>
                                                        </div>
                                                    </a></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--categories-->
@endsection
