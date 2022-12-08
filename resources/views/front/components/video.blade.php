<section class="video" style="background-image: url({{ asset('site/images/bgs/video-bg.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="video-play"><a class="video-btn" href="{{ $video_page->icon }}" data-fancybox="gallery"
                        aria-label="video icon"><i class="fa fa-play"></i></a></div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="video-content">
                    <div class="main-title">
                        <h2 data-aos="fade-up">{{ $video_page->title }}</h2>
                        <p data-aos="fade-up">{{ strip_tags($video_page->description) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
