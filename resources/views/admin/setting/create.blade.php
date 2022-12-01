@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '. __('words.settings'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('words.settings')}}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}" class="text-muted">{{__('words.home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{__('words.settings')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-custom alert-danger" role="alert">
            <div class="alert-text">
                @foreach ($errors->all() as $error)
                    <span class="d-flex align-items-center">
                            <div class="alert-icon" style="padding-inline-end: 5px">
                                <i style="font-size: 14px" class="flaticon-warning"></i>
                            </div> {{ $error }}
                        </span>
                @endforeach
            </div>
        </div>
    @endif

    <form action="{{route('settings.store')}}" method="POST" autocomplete="off"
          enctype="multipart/form-data">
        <div class="card-body">
            @csrf
            <div class="card card-custom mb-2">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label">{{__('words.edit_setting')}}</h3>
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
                                <div class="form-group">
                                    <label>{{__('words.website_title')}} - {{__('words.locale-' . $locale)}}<span
                                            class="text-danger"> * </span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                        </div>
                                        <input type="text" name="{{ $locale . '[website_title]' }}"
                                               placeholder="{{__('words.website_title')}}"
                                               class="form-control  pl-5 min-h-40px @error($locale . '.website_title') is-invalid @enderror"
                                               value="{{ old($locale . '.website_title') }}">
                                        @error($locale . '[website_title]')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label>{{__('words.address')}}({{__('words.locale-' . $locale)}})<span
                                            class="text-danger">*</span></label>
                                    <textarea
                                        class="form-control ckeditor @error($locale . '.address') is-invalid @enderror "
                                        type="text"
                                        name="{{ $locale . '[address]' }}"
                                        rows="4">{{ old($locale . '.address') }} </textarea>
                                    @error($locale . '[address]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{__('words.copyrights')}} - {{__('words.locale-' . $locale)}}<span
                                            class="text-danger"> * </span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                        </div>
                                        <input type="text" name="{{ $locale . '[copyrights]' }}"
                                               placeholder="{{__('words.copyrights')}}"
                                               class="form-control  pl-5 min-h-40px @error($locale . '.copyrights') is-invalid @enderror"
                                               value="{{ old($locale . '.copyrights') }}">
                                        @error($locale . '[copyrights]')
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

                        <div class="input-group col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="{{__('words.email')}}">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}" placeholder="{{__('words.phone')}}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="formFileSm" class="form-label">{{__('words.logo')}}</label>
                            <input class="form-control form-control-sm" name="logo" accept=
                            "image/*" id="formFileSm" type="file">
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
            </div>
        </div>

    </form>
@endsection
