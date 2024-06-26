@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.create_gallery'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.galleries') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('galleries.index') }}" class="text-muted">{{ __('words.show_gallery') }}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{ __('words.create_gallery') }}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action', route('galleries.store'))
@section('form_type', 'POST')

@section('form_content')
    @method('post')
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.create_gallery') }}</h3>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group row">
                @include('admin.components.image', [
                    'label' => __('words.image'),
                    'value' => old('image'),
                    'name' => 'image',
                    'id' => 'kt_image_3',
                ])

                @include('admin.components.switch', [
                    'label' => __('words.status'),
                    'name' => 'status',
                    'val' => old('status'),
                ])
            </div>
        </div>
    </div>


    <div class="card-footer">
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-block btn-outline-success">
                    {{ __('words.create') }}
                </button>
            </div>
        </div>
    </div>


@endsection
