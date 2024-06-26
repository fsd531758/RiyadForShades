@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.create_contact'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.contacts') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('contacts.index') }}" class="text-muted">{{ __('words.show_contacts') }}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{ __('words.create_contact') }}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action', route('contacts.store'))
@section('form_type', 'POST')

@section('form_content')
    @method('post')

    <div class="card card-custom">
        <div class="card-body">
            <div class="form-group row">
                <div class="form-group col-6">
                    <label for="type">{{ __('words.type') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-contao"></i></span>
                        </div>
                        <select id="type" name="type" class="form-control @error('contact') is-invalid @enderror">
                            <option value="">{{ __('words.choose') }}</option>

                            <option value="phone" {{ old('type') == 'phone' ? 'selected' : '' }}>{{ __('words.phone') }}
                            </option>
                            <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>{{ __('words.email') }}
                            </option>
                            <option value="social" {{ old('type') == 'social' ? 'selected' : '' }}>
                                {{ __('words.social') }}</option>

                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group col-6">
                    <label>{{ __('words.contact') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-contao"></i></span>
                        </div>
                        <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                            value="{{ old('contact') }}" placeholder="{{ __('words.contact') }}">

                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                @include('admin.components.icon', [
                    'label' => __('words.icon'),
                    'value' => old('icon', 'fab fa-github'),
                    // 'required' => false,
                ])
            </div>

            <div class="form-group row">
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
