<!--breadcrumb-->
<div class="breadcrumb-area" style="background-image: url('{{ asset('site/images/bgs/breadcrumb-bg.jpg') }}')">
    <div class="container">
        <div class="breadcrumb-title">
            <h1>{{ $name }}</h1>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans('site.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
            </ol>
        </nav>
    </div>
</div>
<!--breadcrumb-->
