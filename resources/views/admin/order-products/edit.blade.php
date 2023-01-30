@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '. __('words.edit_order_product'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('words.order_products')}}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}" class="text-muted">{{__('words.home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('order_products.index')}}" class="text-muted">{{__('words.show_order_products')}}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{__('words.edit_order_product')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action',route('order_products.update',$order_product->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')


    <div class="card card-custom">
        <div class="card-body">


                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-form-label">@lang('general.aside.product')</label>
                                <select class="form-control selectpicker @error('status') is-invalid @enderror" name="product_id"
                                    title="@lang('general.aside.product')">
                                    <option value="{{ $data->product->id }}" selected>{{ $data->product->title }}</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>
                            </div>
        
                            <div class="form-group">
                                <label>@lang('general.count')<span class="text-danger"> * </span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                    </div>
                                    <input type="text" name="count" placeholder="@lang('general.count')"
                                        class="form-control  pl-5 min-h-40px @error('count') is-invalid @enderror"
                                        value="{{ old('count', $data->count) }}">
                                </div>
                            </div>
                        </div>
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
