@extends('admin.layouts.master')
@section('title',settings()->website_title .' | '. __('words.orders'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{__('words.orders')}}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}" class="text-muted">{{__('words.home')}}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{__('words.show_orders')}}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-5">
            <div class="card-title">
                <h3 class="card-title">{{__('words.show_orders')}}</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('words.name')}}</th>
                        <th>{{__('words.email')}}</th>
                        <th>{{__('words.phone')}}</th>
                        <th>{{__('words.address')}}</th>
                        <th>{{__('words.status')}}</th>
                        <th>{{__('words.created_at')}}</th>
                        <th>{{__('words.updated_at')}}</th>
                        <th>{{__('words.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $key => $order)
                        <tr>

                            <td>{{$key+1}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{createdAtFormat($order->created_at)}}</td>
                            <td>{{createdAtFormat($order->created_at) == updatedAtFormat($order->updated_at) ? '--' : updatedAtFormat($order->updated_at)}}</td>
                            <td nowrap="nowrap">
                                @include('admin.components.form-controls', ['name'=>'orders', 'value'=>$order,'role'=>'orders'])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <!--end: Datatable-->
        </div>

    </div>
@endsection
