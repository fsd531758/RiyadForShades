@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.settings'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.settings') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{ __('words.settings') }}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection
@extends('admin.components.create-form')
@section('form_action', route('settings.update', $setting->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')
    <input type="hidden" name="id" value="{{ $setting->id }}">
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.edit_setting') }}</h3>
            </div>
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    @foreach (config('translatable.locales') as $key => $locale)
                        <li class="nav-item">
                            <a class="nav-link  @if ($key == 0) active @endif" data-toggle="tab"
                                href="{{ '#' . $locale }}">{{ __('words.locale-' . $locale) }}</a>
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
                            <label>{{ __('words.website_title') }} - {{ __('words.locale-' . $locale) }}<span
                                    class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[website_title]' }}"
                                    placeholder="{{ __('words.website_title') }}"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.website_title') is-invalid @enderror"
                                    value="{{ old($locale . '.website_title', $setting->translate($locale)->website_title) }}">
                                @error($locale . '[website_title]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.meta_title') }} - {{ __('words.locale-' . $locale) }}<span
                                    class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[meta_title]' }}"
                                    placeholder="{{ __('words.meta_title') }}"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.meta_title') is-invalid @enderror"
                                    value="{{ old($locale . '.meta_title', $setting->translate($locale)->meta_title) }}">
                                @error($locale . '[meta_title]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.copyrights') }} - {{ __('words.locale-' . $locale) }}<span
                                    class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="{{ $locale . '[copyrights]' }}"
                                    placeholder="{{ __('words.copyrights') }}"
                                    class="form-control  pl-5 min-h-40px @error($locale . '.copyrights') is-invalid @enderror"
                                    value="{{ old($locale . '.copyrights', $setting->translate($locale)->copyrights) }}">
                                @error($locale . '[copyrights]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.address') }}({{ __('words.locale-' . $locale) }})<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error($locale . '.address') is-invalid @enderror " type="text"
                                name="{{ $locale . '[address]' }}" rows="4">{{ old($locale . '.address', $setting->translate($locale)->address) }} </textarea>
                            @error($locale . '[address]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col form-group">
                            <label>{{ __('words.meta_description') }}({{ __('words.locale-' . $locale) }})<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control ckeditor @error($locale . '.meta_description') is-invalid @enderror " type="text"
                                name="{{ $locale . '[meta_description]' }}" rows="4">{{ old($locale . '.meta_description', $setting->translate($locale)->meta_description) }} </textarea>
                            @error($locale . '[meta_description]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- <div class="col form-group">
                            <label>{{ __('words.footer_description') }}({{ __('words.locale-' . $locale) }})<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control ckeditor @error($locale . '.footer_description') is-invalid @enderror " type="text"
                                name="{{ $locale . '[footer_description]' }}" rows="4">{{ old($locale . '.footer_description', $setting->translate($locale)->footer_description) }} </textarea>
                            @error($locale . '[footer_description]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}


                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card card-custom">
        <div class="card-body">

            <div class="row mb-3">

                <div class="col-4">
                    <label>{{ __('words.whatsapp') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                        </div>
                        <input type="text" name="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror"
                            style="direction: ltr" value="{{ old('whatsapp', $setting->whatsapp) }}"
                            placeholder="{{ __('words.whatsapp') }}">

                        @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>



            <hr>

            <div class="form-group row">
                @include('admin.components.image', [
                    'label' => __('words.logo'),
                    'value' => $setting->logo,
                    'name' => 'logo',
                    'id' => 'kt_image_3',
                ])

                {{-- @include('admin.components.image', [
                    'label' => __('words.contact_img'),
                    'value' => $setting->contact_img,
                    'name' => 'contact_img',
                    'id' => 'kt_image_2',
                ]) --}}

                @include('admin.components.image', [
                    'label' => __('words.footer_img'),
                    'value' => $setting->footer_img,
                    'name' => 'footer_img',
                    'id' => 'kt_image_1',
                ])
            </div>

        </div>

    </div>

    @permission('update-settings')
        <div class="card-footer">
            <div class="row">
                <div class="col-4">
                    <button type="submit" class="btn btn-block btn-outline-success">
                        {{ __('words.update') }}
                    </button>
                </div>
            </div>
        </div>
    @endpermission

@endsection

@section('scripts')
    <script>
        $("#form").submit(function(e) {
            e.preventDefault();
            let links = document.querySelectorAll('.link');
            links.forEach(function(link) {
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
