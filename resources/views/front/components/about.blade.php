<section class="about-us">
    <div class="container">
        <div class="main-title" data-aos="fade-up">
            <h2>{{ $about_page->title }}</h2>
            <p>{!! $about_page->description !!}</p>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="nav flex-column nav-pills" id="about-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="about-1-tab" data-bs-toggle="pill" data-bs-target="#about-1"
                            type="button" role="tab" aria-controls="about-1" aria-selected="true"> <i
                                class="fa-solid fa-gears"></i><span>{{ $mission_page->title }}</span></button>
                        <button class="nav-link " id="about-2-tab" data-bs-toggle="pill" data-bs-target="#about-2"
                            type="button" role="tab" aria-controls="about-2" aria-selected="true"> <i
                                class="fa-solid fa-gears"></i><span>{{ $vision_page->title }}</span></button>
                        <button class="nav-link " id="about-3-tab" data-bs-toggle="pill" data-bs-target="#about-3"
                            type="button" role="tab" aria-controls="about-3" aria-selected="true"> <i
                                class="fa-solid fa-gears"></i><span>{{ $goals_page->title }}</span></button>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="about-tabContent">
                        <div class="tab-pane fade show active" id="about-1" role="tabpanel"
                            aria-labelledby="about-1-tab">
                            <div class="about-content">
                                <div class="image"><img class="img-fluid" data-src="{{ asset($mission_page->icon) }}"
                                        alt="image" /></div>
                                <div class="text">
                                    <h3>{{ $mission_page->sub_title }}</h3>
                                    {!! $mission_page->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="about-2" role="tabpanel" aria-labelledby="about-2-tab">
                            <div class="about-content">
                                <div class="image"><img class="img-fluid" data-src="{{ asset($vision_page->icon) }}"
                                        alt="image" /></div>
                                <div class="text">
                                    <h3>{{ $vision_page->sub_title }}</h3>
                                    {!! $vision_page->description !!}

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="about-3" role="tabpanel" aria-labelledby="about-3-tab">
                            <div class="about-content">
                                <div class="image"><img class="img-fluid" data-src="{{ asset($goals_page->icon) }}"
                                        alt="image" /></div>
                                <div class="text">
                                    <h3>{{ $goals_page->sub_title }}</h3>
                                    {!! $goals_page->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
