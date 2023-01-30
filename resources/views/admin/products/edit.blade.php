@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '. __('words.edit_product'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('words.products')}}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}" class="text-muted">{{__('words.home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('products.index')}}" class="text-muted">{{__('words.show_products')}}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{__('words.edit_product')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action',route('products.update',$product->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')
    <input type="hidden" name="id" value="{{$product->id}}">
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{__('words.edit_product')}}</h3>
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
                                       value="{{ old($locale . '.title',$product->translate($locale)->title) }}">
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
                                rows="4">{{ old($locale . '.description',$product->translate($locale)->description) }} </textarea>
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
            <div class="form-group row">
                @include('admin.components.image',['label'=>__('words.image'),'value'=>old('image',$product->image),'name'=>'image','id'=>'kt_image_3','accept' =>'image/*'])

                @include('admin.components.files',['label'=>__('words.files'),'name'=>'files[]','multi'=>'multiple','accept' => 'application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf'])
            </div>

            @if($files->isNotEmpty())
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-primary">
                                    <div class="card-header bg-secondary py-1 m-0">
                                        <h4 class="card-title">{{__('words.files')}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($files as $file)
                                                <div class="col-md-3">
                                                    <div class="rounded border m-1">
                                                        <div>

                                                            <a href="{{$file->path}}" target="_blank" download>
                                                                <img class="index_image"
                                                                     src="{{asset('uploads/pdf.png')}}" alt="file">
                                                            </a>

                                                        </div>
                                                        <div class="form-check form-check-inline mx-2">
                                                            <input
                                                                class="form-check-input checkImage @error('checkImage') is-invalid @enderror"
                                                                type="checkbox"
                                                                id="image-{{$file->id}}">
                                                            <label class="form-check-label"
                                                                   for="image-{{$file->id}}">{{__('words.delete')}}</label>

                                                            @error('checkImage')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div id="deleted_images"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>@lang('general.price')<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                    </div>
                                    <input type="number" name="price" placeholder="@lang('general.price')"
                                        class="form-control  pl-5 min-h-40px @error('price') is-invalid @enderror"
                                        value="{{ old('price',$data->price ) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.sku')<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                    </div>
                                    <input type="number" name="sku" placeholder="@lang('general.sku')"
                                        class="form-control  pl-5 min-h-40px @error('sku') is-invalid @enderror"
                                        value="{{ old('sku',$data->sku) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.stock')<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                    </div>
                                    <input type="number" name="stock" placeholder="@lang('general.stock')"
                                        class="form-control  pl-5 min-h-40px @error('stock') is-invalid @enderror"
                                        value="{{ old('stock',$data->stock) }}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                @if ($data->featured==1)
                                <input type="checkbox" checked name="featured" placeholder="@lang('general.featured')"
                                class="form-check @error('featured') is-invalid @enderror"
                                value="1")>
                                <label class="p-3">@lang('general.featured')</label>  
                                @else   
                                <input type="checkbox" name="featured" placeholder="@lang('general.featured')"
                                class="form-check @error('featured') is-invalid @enderror"
                                value="1")>
                                <label class="p-3">@lang('general.featured')</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <br>
            <br>
            <div class="form-group row">
                <div class="form-group col-6">
                    <label for="exampleSelectd">{{__('words.category')}}</label>
                    <select class="form-control" id="exampleSelectd" name="category_id">
                        <option value="">{{__('words.choose')}}</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}" {{old('category_id',$product->category_id) == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                @include('admin.components.switch',['label'=>__('words.status'),'name'=>'status','val' => old('status',$product->status)])
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


@endsection

@section('scripts')
    <script>

        function getDeletedImages() {
            $('#deleted_images').empty();

            $('input[type="checkbox"].checkImage:checked').each(function () {
                $('#deleted_images').append('<input type="hidden" name="deleted_files[]" value="' + $(this).attr("id").replace('image-', '') + '">');

            });
        }

        $(".checkImage").change(function () {
            getDeletedImages();
            if (this.checked) {
                $(this).parent().find("img").addClass("delete");
            } else {
                $(this).parent().find("img").removeClass("delete");
            }

        });
    </script>
@endsection
