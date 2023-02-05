@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '.__('words.show_order'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('words.orders')}}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}" class="text-muted">{{__('words.home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('orders.index')}}" class="text-muted">{{__('words.show_orders')}}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{__('words.show_order')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{__('words.show_order')}}</h3>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6  card-body pt-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{__('words.name')}}:</h5>
                            </div>
                            <p class="m-0">{{ $order->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-6  card-body pt-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{__('words.email')}}:</h5>
                            </div>
                            <p class="m-0">{{ $order->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6  card-body pt-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{__('words.phone')}}:</h5>
                            </div>
                            <p class="m-0">{{ $order->phone }}</p>
                        </div>
                    </div>
                    <div class="col-md-6  card-body pt-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{__('words.address')}}:</h5>
                            </div>
                            <p class="m-0">{{ $order->address }}</p>
                        </div>
                    </div>
                    <div class="col-md-6  card-body pt-3">
                        <div class="mb-7 bg-light p-5 rounded h-100">
                            <div class="card-title">
                                <h5 class="font-weight-bolder text-dark">{{__('words.total')}}:</h5>
                            </div>
                            <p class="m-0">{{ $order->cart_total }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-center">
                <!--begin::Button-->
                <a href="{{ route('order_products.index', ['order_id' => $order->id]) }}"
                    class="btn btn-primary font-weight-bolder">
                    {{__('words.edit')}}
                </a>
                <!--end::Button-->
            </div>
    
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('words.name') }}</th>
                            <th>{{ __('words.count') }}</th>
                            <th>{{ __('words.price') }}</th>
                            <th>{{ __('words.product_total') }}</th>
                            <th>{{ __('words.created_at') }}</th>
                            <th>{{ __('words.updated_at') }}</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->count }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->product_total }}</td>
                                <td>{{ createdAtFormat($product->created_at) }}</td>
                                <td>{{ createdAtFormat($product->created_at) == updatedAtFormat($product->updated_at) ? '--' : updatedAtFormat($product->updated_at) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>


            @permission('update-orders')
            <div class="card-footer">
                <div class="row">
                    <div class="col-4">
                        <a href="{{route('orders.edit',$order->id)}}"
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
