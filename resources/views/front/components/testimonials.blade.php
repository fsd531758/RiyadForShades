<section class="testimonials" style="background-image: url({{ asset($testimonial_page->icon) }})">
    <div class="container">
        <div class="content">
            <div class="testimonials-text">
                <div class="main-title">
                    <h2>{{ $testimonial_page->title }}</h2>
                    {!! $testimonial_page->description !!}
                </div>
            </div>
            <div class="testimonials-carousel owl-carousel owl-theme">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonials-box">
                        <div class="text">
                            {!! $testimonial->description !!}
                        </div>
                        <div class="details">
                            <div class="image"><img class="img-fluid" src="{{ asset($testimonial->main_image) }}"
                                    alt="image" />
                            </div>
                            <div class="person">
                                <div class="name">{{ $testimonial->title }}</div>
                                <div class="country">{{ $testimonial->job_title }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
