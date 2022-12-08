<section class="main-slider">
    <div class="main-slider-carousel owl-carousel owl-theme">
        @foreach ($sliders as $slider)
            <div class="item" style="background-image: url({{ asset($slider->main_image) }})">
                <div class="container">
                    <div class="slider-descripton"><span class="sub-title">{{ $slider->title }}</span>
                        <h1 class="slider-title">{{ $slider->sub_title }} </h1>
                        <p class="slider-text">{{ strip_tags($slider->description)}}</p><a class="slider-btn" href="{{route('about')}}">
                            @lang('site.moreabout')</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
