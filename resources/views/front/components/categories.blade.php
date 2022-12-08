<section class="categories partners">
    <div class="container">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-12">
                <div class="main-title">
                    <h2>@lang('site.categories')</h2>
                </div>
                <div class="content">
                    <div class="categories-carousel owl-carousel owl-theme tab-content">
                        @foreach ($categories as $categorie)
                            <div class="carousel-itme categories-box"
                                 style="background-image:url({{ asset($categorie->image) }}); background-repeat: no-repeat;
                                     background-size: 450px;">
                                {{-- <div class="icon">
                            <i class="fa-solid {{ $categorie->icon }}"></i>
                        </div> --}}
                                <div class="title">
                                    <h5>
                                        <a href="{{ route('products') }}">
                                            {{ $categorie->title }}
                                        </a>
                                    </h5>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
