@extends('admin.layouts.master')
@section('title', settings()->website_title . ' | ' . __('words.edit_order'))
@section('breadcrumb')
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Breadcrumb-->
        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('words.orders') }}</h5>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.home') }}" class="text-muted">{{ __('words.home') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('orders.index') }}" class="text-muted">{{ __('words.show_orders') }}</a>
            </li>
            <li class="breadcrumb-item">
                <apan class="text-muted">{{ __('words.edit_order') }}</apan>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
@endsection

@extends('admin.components.create-form')
@section('form_action', route('orders.update', $order->id))
@section('form_type', 'POST')

@section('form_content')
    @method('put')
    <input type="hidden" name="id" value="{{ $order->id }}">
    <div class="card card-custom mb-2">
        <div class="card-header card-header-tabs-line">
            <div class="card-title">
                <h3 class="card-label">{{ __('words.edit_order') }}</h3>
            </div>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <div class="row">
                    <div class="container-fluid">

                        <div class="form-group row">
                            <label>{{ __('words.name') }}<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="name" placeholder="{{ __('words.name') }}"
                                    class="form-control  pl-5 min-h-40px @error('name') is-invalid @enderror"
                                    value="{{ old('name', $order->name) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>{{ __('words.email') }}<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="email" placeholder="{{ __('words.email') }}"
                                    class="form-control  pl-5 min-h-40px @error('email') is-invalid @enderror"
                                    value="{{ old('email', $order->email) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>{{ __('words.phone') }}<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="phone" placeholder="{{ __('words.phone') }}"
                                    class="form-control  pl-5 min-h-40px @error('phone') is-invalid @enderror"
                                    value="{{ old('phone', $order->phone) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>{{ __('words.address') }}<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" name="address" placeholder="{{ __('words.address') }}"
                                    class="form-control  pl-5 min-h-40px @error('address') is-invalid @enderror"
                                    value="{{ old('address', $order->address) }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label>{{ __('words.total') }}<span class="text-danger"> * </span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="flaticon-edit"></i></span>
                                </div>
                                <input type="text" disabled name="cart_total" placeholder="{{ __('words.total') }}"
                                    class="form-control  pl-5 min-h-40px @error('total') is-invalid @enderror"
                                    value="{{ old('total', $order->cart_total) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label">{{ __('words.status') }}</label>
                        <select class="form-control selectpicker @error('status') is-invalid @enderror" name="status"
                            title="{{ __('words.status') }}">
                            <option value="{{ $order->status }}" selected>{{ $order->status }}</option>
                            <option value="processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="delivered">delivered</option>
                        </select>
                    </div>
                </div>
            </div>

            <br>
            <br>

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
                            <td>{{ $product->name }}</td>
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

    </div>


    <div class="card-footer">
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-block btn-outline-success">
                    {{ __('words.update') }}
                </button>
            </div>
        </div>
    </div>





@endsection

@section('scripts')
    <script>
        function getDeletedImages() {
            $('#deleted_images').empty();

            $('input[type="checkbox"].checkImage:checked').each(function() {
                $('#deleted_images').append('<input type="hidden" name="deleted_files[]" value="' + $(this).attr(
                    "id").replace('image-', '') + '">');

            });
        }

        $(".checkImage").change(function() {
            getDeletedImages();
            if (this.checked) {
                $(this).parent().find("img").addClass("delete");
            } else {
                $(this).parent().find("img").removeClass("delete");
            }

        });
    </script>
@endsection
