@extends('frontend.layouts.master')
@section('content')
    <main id="main">
        <!-- Intro Single-->
        <section class="intro-single">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                                <div>
                                    <form class="row g-0" action="{{ route('order.submit') }}" method="post">
                                        @csrf
                                        <div class="col-lg-8">
                                            <div class="p-5">
                                                <div class="d-flex justify-content-between align-items-center mb-5"
                                                    id="totalProducts">
                                                </div>
                                                <hr class="my-4">
                                                <div id="shopping">

                                                </div>




                                                <div class="pt-5">
                                                    <h6 class="mb-0"><a href="{{ route('products') }}"
                                                            class="text-body"><i
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

                                                <div class="d-flex justify-content-between mb-4" id="details2">

                                                </div>
                                                <div class="form-group pt-2">
                                                    <input type="text" name="name" required
                                                        class="form-control  @error('name') is-invalid @enderror"
                                                        placeholder="الاسم">
                                                </div>
                                                <div class="form-group pt-2">
                                                    <input type="text" name="phone" required
                                                        class="form-control  @error('phone') is-invalid @enderror"
                                                        placeholder="رقم الجوال">
                                                </div>
                                                <div class="form-group pt-2">
                                                    <input type="text" name="email" class="form-control" email 
                                                        placeholder="البريد الالكتروني">
                                                </div>
                                                <div class="form-group pt-2">
                                                    <input type="text" name="address" required
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        placeholder="العنوان">
                                                </div>
                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between mb-5" id="billDetail">

                                                </div>
                                                <button type="submit" class="btn btn-dark btn-block btn-lg"
                                                    data-mdb-ripple-color="dark">طلب</button>
                                            </div>
                                        </div>
                                    </form>
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
        let count = !localStorage.getItem("itemsCount") ? 0 : localStorage.getItem("itemsCount");
        array = [];
        array = JSON.parse(localStorage.getItem("products"));

        main();

        function main() {
            $('#totalProducts').empty();
            $('#totalProducts').append(`
                                <h1 class="fw-bold mb-0 text-black">عربة التسوق</h1>
                                <h6 class="mb-0 text-muted">${localStorage.getItem("itemsCount")} منتجات</h6>
                        `);

            let totalPrice = 0;

            $("#shopping").empty();
            array.forEach(element => {
                $("#shopping").append(
                    `<div class="row mb-4 d-flex justify-content-between align-items-center"><div class="col-md-2 col-lg-2 col-xl-2"><img src="${element.image}" class="img-fluid rounded-3" alt="Cotton T-shirt"></div><div class="col-md-3 col-lg-3 col-xl-3"><h6 class="text-muted">${element.title}</h6> <h6 class="text-black mb-0">${element.category}</h6></div><div class="col-md-3 col-lg-3 col-xl-2 d-flex"><button class="btn btn-link px-1" id="btnRemove${element.id}"><i class="fas fa-minus"></i></button><input id="form1" min="1" max="${element.stock}" name="quantity[]" value="${element.qty}"type="number" class="form-control form-control-sm" /> <input name="products[]" hidden  value="${element.id}"/> <button class="btn btn-link px-2" id="btn${element.id}"><i class="fas fa-plus"></i></button></div><div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1"><h6 class="mb-0">${element.price * element.qty} س.ر </h6></div><div class="col-md-1 col-lg-1 col-xl-1 text-end"><a href="#!" class="text-muted"><span><i class="fas fa-times" id="removeItem${element.id}"></i></span></a></div></div><hr class="my-4">`
                );

                totalPrice += element.price * element.qty;

                var btnAdd = document.querySelector(`#btn${element.id}`);
                btnAdd.addEventListener('click', function() {
                    this.parentNode.querySelector('input[type=number]').stepUp();
                    addToProducts(element);
                });

                var btnRemove = document.querySelector(`#btnRemove${element.id}`);

                btnRemove.addEventListener('click', function() {
                    this.parentNode.querySelector('input[type=number]').stepDown();
                    deletFromCart(element.id, element)
                });

                var btnRemoveItem = document.querySelector(`#removeItem${element.id}`);

                btnRemoveItem.addEventListener('click', function() {
                    deleteItem(element);
                });

            });


            $('#billDetail').empty();
            $('#billDetail').append(`
                            <h5 class="text-uppercase">السعر الكلي</h5>
                            <h5>${totalPrice} س.ر </h5>
                        `);

            $('#details2').empty();
            $('#details2').append(`
                                                <h5 class="text-uppercase">${localStorage.getItem("itemsCount")} منتجات</h5>
                                                <h5>${totalPrice} س.ر </h5>
                        `);

        }

        function addToProducts(product) {

            $('#cart').remove();
            $('#flag').append(`
                        <a href="{{ route('cart') }}" id="cart">
                            <i class="fas fa-shopping-cart fa-lg text-success"></i>${localStorage.getItem("itemsCount")}
                        </a>`);

            $('#totalProducts').empty();
            $('#totalProducts').append(`
                                <h1 class="fw-bold mb-0 text-black">عربة التسوق</h1>
                                <h6 class="mb-0 text-muted">${localStorage.getItem("itemsCount")} منتجات</h6>
                        `);

            let newArr = array.map(item => {
                if (item.id === product.id && product.qty <= product.stock) {
                    item['qty']++;
                    localStorage.setItem("itemsCount", ++count);

                }
                return item;
            })
            array = newArr;
            localStorage.setItem("products", JSON.stringify(array));
            console.log(JSON.parse(localStorage.getItem("products")));

            main();


        }

        function deletFromCart(index, product) {

            if (findProduct(JSON.parse(localStorage.getItem("products")), product).product.qty > 1) {
                localStorage.setItem("itemsCount", --count);

                let newArr = array.map(item => {
                    if (item.id === product.id) {
                        item['qty']--;
                    }
                    return item;
                })
                array = newArr;
                localStorage.setItem("products", JSON.stringify(array));
                console.log(findProduct(JSON.parse(localStorage.getItem("products")), product).product.qty);
                $('#cart').remove();
                $('#flag').append(`
                                    <a href="{{ route('cart') }}" id="cart">
                                    <i class="fas fa-shopping-cart fa-lg text-success"></i>${localStorage.getItem("itemsCount")}
                                    </a>`);

                $('#totalProducts').empty();
                $('#totalProducts').append(`
                                <h1 class="fw-bold mb-0 text-black">عربة التسوق</h1>
                                <h6 class="mb-0 text-muted">${localStorage.getItem("itemsCount")} منتجات</h6>
                        `);

            }

            main();
        }


        function deleteItem(product){
             
            if (findProduct(JSON.parse(localStorage.getItem("products")), product).product.qty >= 1) {
                localStorage.setItem("itemsCount", localStorage.getItem("itemsCount")-product.qty);
                 let newArr=[];
                 array.map(item => {
                    if (item.id !== product.id) {
                        newArr.push(item);
                    }
                })

                array = newArr;
                console.log(array);
                localStorage.setItem("products", JSON.stringify(array));
                // console.log(findProduct(JSON.parse(localStorage.getItem("products")), product).product.qty);
                $('#cart').remove();
                $('#flag').append(`
                                    <a href="{{ route('cart') }}" id="cart">
                                    <i class="fas fa-shopping-cart fa-lg text-success"></i>${localStorage.getItem("itemsCount")}
                                    </a>`);

                $('#totalProducts').empty();
                $('#totalProducts').append(`
                                <h1 class="fw-bold mb-0 text-black">عربة التسوق</h1>
                                <h6 class="mb-0 text-muted">${localStorage.getItem("itemsCount")} منتجات</h6>
                        `);

            }

            main();

        }


        function findProduct(arr, product) {
            let index = -1;
            for (let i = 0; i < arr.length; i++) {
                if (arr[i].id === product.id) {
                    index = i
                }
            }
            let modProduct = arr.find(item => item.id === product.id);
            return {
                index,
                product: modProduct
            };
        }
    </script>
@endpush
