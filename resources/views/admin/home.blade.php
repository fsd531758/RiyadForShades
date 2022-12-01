@extends('admin.layouts.master')

@section('breadcrumb')
@include('admin.includes.breadcrumb',['first_title' => ''])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <h1>{{settings()->website_title}}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <img src="{{settings()->logo}}" class="img-fluid rounded" style="width: 200px;" alt="logo">
            </div>
        </div>
    </div>
@endsection
