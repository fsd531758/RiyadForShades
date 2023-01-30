@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '.__('words.show_order_product'))
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
                <apan class="text-muted">{{__('words.show_order_product')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card card-custom card-stretch gutter-b">

        <div class="card card-custom">
            <div class="card-body">
                <div class="col-md-6 mb-5">
                    <div class="mb-7 bg-light p-5 rounded h-100">
                        <div class="card-title">
                            <h5 class="font-weight-bolder text-dark">@lang('general.name'):</h5>
                        </div>
                        <p class="m-0">{{ $data->product_name }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="mb-7 bg-light p-5 rounded h-100">
                        <div class="card-title">
                            <h5 class="font-weight-bolder text-dark">@lang('general.count'):</h5>
                        </div>
                        <p class="m-0">{{ $data->count }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="mb-7 bg-light p-5 rounded h-100">
                        <div class="card-title">
                            <h5 class="font-weight-bolder text-dark">@lang('general.price'):</h5>
                        </div>
                        <p class="m-0">{{ $data->price }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
                    <div class="mb-7 bg-light p-5 rounded h-100">
                        <div class="card-title">
                            <h5 class="font-weight-bolder text-dark">@lang('general.product_total'):</h5>
                        </div>
                        <p class="m-0">{{ $data->product_total }}</p>
                    </div>
                </div>
            </div>

            @permission('update-order_products')
            <div class="card-footer">
                <div class="row">
                    <div class="col-4">
                        <a href="{{route('order_products.edit',$order_product->id)}}"
                           class="btn btn-block btn-outline-info">
                            {{__('words.edit')}}
                        </a>
                    </div>
                </div>
            </div>
            @endpermission
        </div>
    </div>
@endsection
