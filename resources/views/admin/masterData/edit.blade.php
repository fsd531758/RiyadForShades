@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '. __('words.edit_master'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('words.master_data')}}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}" class="text-muted">{{__('words.home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('master-data.index')}}" class="text-muted">{{__('words.show_masters')}}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{__('words.edit_master')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')

    <!-- /.card-header -->
    <div class="card-body">
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

        <form action="{{route('master-data.update',$data->id)}}" method="POST" autocomplete="off"
              enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="card card-custom mb-2">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-title">
                            <h3 class="card-label">{{__('words.edit_master')}}</h3>
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
                                        <label>{{__('words.title')}} - {{__('words.locale-' . $locale)}}<span
                                                class="text-danger"> * </span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                            </div>
                                            <input type="text" name="{{ $locale . '[title]' }}"
                                                   placeholder="{{__('words.title')}}"
                                                   class="form-control  pl-5 min-h-40px @error($locale . '.title') is-invalid @enderror"
                                                   value="{{ old($locale . '.title',$data->translate($locale)->title) }}">
                                            @error($locale . '[title]')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col form-group">
                                        <label>{{__('words.description')}}({{__('words.locale-' . $locale)}})<span
                                                class="text-danger">*</span></label>
                                        <textarea
                                            class="form-control ckeditor @error($locale . '.description') is-invalid @enderror "
                                            type="text"
                                            name="{{ $locale . '[description]' }}"
                                            rows="4">{{ old($locale . '.description',$data->translate($locale)->description) }} </textarea>
                                        @error($locale . '[description]')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card card-custom">
                    <div class="card-body">

                        <div class="row">
                            @if(auth('admin')->user()->hasPermission('active-master_data'))
                                <div class="col-6">
                                    <label for="active" class="checkbox-inline">{{__('words.active')}}</label>
                                    <span class="switch switch-icon">
                                        <label>
                                            <input type="checkbox" id="active"
                                                   name="active" value="1" {{old('active',$data->active) == 1 ? "checked" : ""}}/>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>

                                <div class="col-6">
                                    <label class="col-form-label">{{__('words.release_date')}}</label>
                                    <div class="input-group input-group-solid date" id="kt_datetimepicker_3" data-target-input="nearest">
                                        <input type="text" name="date" class="form-control form-control-solid datetimepicker-input @error('date') is-invalid @enderror" placeholder="{{__('words.select_date')}}" data-target="#kt_datetimepicker_3"
                                               value="{{old('date',$data->date)}}"/>
                                        <div class="input-group-append" data-target="#kt_datetimepicker_3" data-toggle="datetimepicker">
                                        <span class="input-group-text">
                                            <i class="ki ki-calendar"></i>
                                        </span>
                                        </div>
                                        @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="formFileSm" class="form-label">{{__('words.upload_file')}}</label>
                                    <input class="form-control form-control-sm" name="file" accept=
                                    "application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf"
                                           id="formFileSm" type="file">
                                </div>

                                <div class="col-6">
                                    @if(!$data->file)
                                        <a href="{{asset('uploads/pdf.png')}}"
                                           data-toggle="lightbox" data-title="{{__('words.file')}}"
                                           data-gallery="gallery">
                                            <img class="index_image"
                                                 src="{{asset('uploads/pdf.png')}}" alt="file">
                                        </a>
                                    @else
                                        <a href="{{$data->file->path}}" target="_blank" download>
                                            <img class="index_image"
                                                 src="{{asset('uploads/pdf.png')}}" alt="file">
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-block btn-outline-success">
                                    {{__('words.update')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- /.card-body -->

@endsection
