<section class="features">
    <div class="container">
        <div class="content">
            <div class="row">
                @foreach ($features as $key => $feature)
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $key }}">
                        <div class="feature-item">
                            <div class="feature-image" style="background-image:url({{ asset($feature->main_image) }});">
                                <div class="feature-text">
                                    <div class="title">
                                        <h2>{{ $feature->title }}</h2>
                                    </div>
                                    <div class="description">
                                        <p>{!! $feature->description!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
