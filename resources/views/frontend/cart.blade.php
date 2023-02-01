@extends('frontend.layouts.master')
@section('content')
    <main id="main">
        <!-- Intro Single-->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">عربة التسوق</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> <a
                                        href="{{ route('products') }}">عربة التسوق</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Intro Single-->
        <!-- Services-->
        <section class="section-property pb-5">
            {{-- <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4">
                            <div class="carousel-item-b">
                                <div class="card-box-a card-shadow">
                                    <div class="img-box-a"><img class="img-a img-fluid" src="{{ asset($product->image) }}"
                                            alt="{{ $product->title }}"></div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-a-content">
                                            <div class="card-header-a">
                                                <h2 class="card-title-a"><a
                                                        href="{{ route('product', $product->id) }}">{{ $product->title }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        {{ $products->links('frontend.pagination.default') }}
                    </div>
                </div>
            </div> --}}
        </section>
        <!-- End Services-->

        {{-- start card --}}
        <section class="h-100 h-custom" style="background-color: #cecece;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">عربة التسوق</h1>
                                                <h6 class="mb-0 text-muted">3 منتجات</h6>
                                            </div>
                                            <hr class="my-4">
                                            <div id="shopping">
                                                {{-- <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img5.webp"
                                                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted">Shirt</h6>
                                                        <h6 class="text-black mb-0">Cotton T-shirt</h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>

                                                        <input id="form1" min="0" name="quantity" value="1"
                                                            type="number" class="form-control form-control-sm" />

                                                        <button class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">€ 44.00</h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <a href="#!" class="text-muted"><i
                                                                class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                                <hr class="my-4"> --}}
                                            </div>




                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="{{ route('products') }}" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>العودة للمتجر
                                                </h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1">تفاصيل الطلب</h3>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase">3 منتجات</h5>
                                                <h5>€ 132.00</h5>
                                            </div>
                                            {{-- 
                                            <h5 class="text-uppercase mb-3">شحن</h5>

                                            <div class="mb-4 pb-2">
                                                <select class="select">
                                                    <option value="1">التوصيل القياسي - €5.00</option>
                                                    <option value="2">اثنين</option>
                                                    <option value="3">ثلاثة</option>
                                                    <option value="4">أربعة</option>
                                                </select>
                                            </div> --}}
                                            <div class="form-group pt-2">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="الاسم">
                                            </div>
                                            <div class="form-group pt-2">
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="رقم الجوال">
                                            </div>
                                            <div class="form-group pt-2">
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="البريد الالكتروني">
                                            </div>
                                            <div class="form-group pt-2">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="العنوان">
                                            </div>
                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">السعر الكلي</h5>
                                                <h5>€ 137.00</h5>
                                            </div>

                                            <button type="button" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">طلب</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- end card --}}
    </main>
@endsection
@push('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
@endpush


@push('scripts')
    <script>
        // $(document).ready(function(){
        const cart = JSON.parse(localStorage.getItem('products'));
        array = [];
        array = JSON.parse(localStorage.getItem("products"));
        array.forEach(element => {
                    $("#shopping").append(
                        `<div class="row mb-4 d-flex justify-content-between align-items-center"><div class="col-md-2 col-lg-2 col-xl-2"><img src="${element.image}" class="img-fluid rounded-3" alt="Cotton T-shirt"></div><div class="col-md-3 col-lg-3 col-xl-3"><h6 class="text-muted">${element.title}</h6> <h6 class="text-black mb-0">Cotton T-shirt</h6></div><div class="col-md-3 col-lg-3 col-xl-2 d-flex"><button class="btn btn-link px-2"onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="fas fa-minus"></i></button><input id="form1" min="0" name="quantity" value="${element.qty}"type="number" class="form-control form-control-sm" /><button class="btn btn-link px-2" id="btn${element.id}"><i class="fas fa-plus"></i></button></div><div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1"><h6 class="mb-0">${element.price}</h6></div><div class="col-md-1 col-lg-1 col-xl-1 text-end"><a href="#!" class="text-muted"><iclass="fas fa-times"></i></a></div></div><hr class="my-4">`
                    );

                    var btnAdd = document.querySelector(`#btn${element.id}`);
                    btnAdd.addEventListener('click', function() {
                        this.parentNode.querySelector('input[type=number]').stepUp();
                        addToProducts(element);
                    }) ;
                
                });

                   function addToProducts(product) {
                        let newArr = array.map(item => {
                            if (item.id === product.id) {
                                item['qty']++;
                            }
                            return item;
                        })
                        array = newArr;
                        localStorage.setItem("products", JSON.stringify(array));
                        console.log(JSON.parse(localStorage.getItem("products")));
                    }

                    console.log(array);
    </script>
@endpush
