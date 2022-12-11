@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '. __('words.create_category'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('words.categories')}}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}" class="text-muted">{{__('words.home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('categories.index')}}" class="text-muted">{{__('words.show_categories')}}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{__('words.create_category')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action',route('categories.store'))
@section('form_type', 'POST')

@section('form_content')
    @method('post')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{__('words.create_category')}}</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <li class="nav-item">
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                               href="{{ '#' . $locale }}">{{__('words.locale-' . $locale)}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                @foreach (config('translatable.locales') as $key => $locale)
                    <div class="tab-pane fade show @if ($key == 0) active @endif" id="{{ $locale }}"
                         role="tabpanel">
                        <div class="col form-group">
                            <label>{{__('words.title')}} - {{__('words.locale-' . $locale)}}<span
                                    class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[title]' }}"
                                       placeholder="{{__('words.title')}}"
                                       class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror"
                                       value="{{ old($locale . '.title') }}">
                                @error($locale . '[title]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-body">
            <div class="form-group row">
                <div class="form-group">
                    <label>{{__('words.icon')}}<span class="text-danger"> * </span></label>
                    <div class="get-and-preview">
                        <div class="icon-preview"
                             style="float: left;
                                                            width: 55px;
                                                            height: 55px;
                                                            margin: 0 15px 0 0;
                                                            border-radius: 5px;
                                                            background: #fff;
                                                            text-align: center;
                                                            font-size: 30px;
                                                            line-height: 65px;
                                                            color: #1e1e1e;"
                             data-toggle="tooltip" title="Preview of selected Icon">
                            <i id="IconPreview" style="font-size:40px" class="fab fa-github"></i>
                        </div>

                        <button type="button" class="btn btn-warning my-3" id="GetIconPicker"
                                data-iconpicker-input="input#IconInput" data-iconpicker-preview="i#IconPreview">{{__('words.select_icon')}}</button>
                        <input type="text" class="form-control iconpicker" id="IconInput" name="icon" hidden>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                @include('admin.components.image',['label'=>__('words.image'),'value'=>old('image'),'name'=>'image','id'=>'kt_image_3'])

                @include('admin.components.switch',['label'=>__('words.status'),'name'=>'status','val' => old('status')])

            </div>

        </div>

    </div>


    <div class="card-footer">
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-block btn-outline-success">
                    {{__('words.create')}}
                </button>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $("#form").submit(function (e) {
            e.preventDefault();
            let links = document.querySelectorAll('.link');
            links.forEach(function (link) {
                let position = link.value.includes('https');
                if (position > -1) {
                    let enhancedLink = link.value.replace("https://", "http://");
                    link.value = enhancedLink;
                }
            });
            this.submit();
        });
    </script>
@endsection
