<section class="partners">
    <div class="container">
        <div class="main-title">
            <h2>@lang('site.partners')</h2>
        </div>
        <div class="content">
            <div class="partners-carousel owl-carousel owl-theme">
                @foreach ($partners as $partner)
                    <div class="item"><img class="img-fluid" src="{{ asset($partner->main_image) }}" alt="image" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
