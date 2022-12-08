<section class="news">
    <div class="container">
        <div class="main-title">
            <h2>{{ $news_page->title }}</h2>
            {!! $news_page->description !!}
        </div>
        <div class="content">
            <div class="news-carousel owl-carousel owl-theme">
                @foreach ($news as $new)
                    <div class="news-box">
                        <div class="news-image"><a href="{{route('single-news',$new->id)}}"> <img class="img-fluid"
                                    src="{{ asset($new->main_image) }}" alt="{{ $new->title }}" /></a>
                            <div class="news-date"><span class="num">{{ $new->created_at->format('d') }}
                                </span><span class="month">{{ $new->created_at->format('M') }}</span></div>
                        </div>
                        <div class="news-text">
                            <div class="title"><a href="{{route('single-news',$new->id)}}">
                                    <h3>{{ $new->title }}</h3>
                                </a></div>
                            <div class="description">
                                {!! mb_substr($new->description, 0, 200) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
