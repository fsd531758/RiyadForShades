@extends('frontend.layouts.master')
@section('content')
    <main id="main">
        <!-- Intro Single-->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">منتجاتنا</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav class="breadcrumb-box d-flex justify-content-lg-end" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> <a
                                        href="{{ route('products') }}">منتجاتنا</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Intro Single-->
        <!-- Services-->
        {{-- <section class="section-property pb-5">
            <div class="container">
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
            </div>
        </section> --}}
        <!-- End Services-->

        <!-- electronic section start -->
        <div class="fashion_section">
            <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            {{-- <h1 class="fashion_taital">Electronic</h1> --}}
                            <div class="fashion_section_2">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box_main">
                                                <h4 class="shirt_text">{{ $product->title }}</h4>
                                                <p class="price_text">السعر <span
                                                        style="color: #262626;">${{ $product->price }}</span></p>
                                                <div><img class="electronic_img img-box-a img-a img-fluid"
                                                        src="{{ asset($product->image) }}"></div>
                                                <div class="btn_main" id="product{{ $loop->index }}"
                                                    product="{{ $product }}">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-6 col-xl-7 d-flex"
                                                            id="toggle{{ $loop->index }}">
                                                            <a class="btn btn-success px-4 mx-2"
                                                                onclick="toogle({{ $product }},{{ $loop->index }})"><i
                                                                    class="fas fa-shopping-cart"></i> اضف للسلة</a>
                                                        </div>

                                                        <div class="col-md-4 col-lg-4 col-xl-1 offset-lg-1">
                                                            <a href="{{ route('product', $product->id) }}"
                                                                class="btn btn-success px-4 mx-3">تفاصيل</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- electronic section end -->

    </main>
@endsection
@push('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
@endpush
@push('scripts')
    <script>
        // $(document).ready(function(){
        //     let cartArr = [];
        // });
        let cart;
        if (localStorage.getItem("products") !== null && JSON.parse(localStorage.getItem("products")).length) {
            cartArr = JSON.parse(localStorage.getItem("products"));
        } else {
            cartArr = [];
        }

        function toogle(product, index) {


            if (!cartArr.length || findProduct(cartArr, product).index === -1) {
                product['qty'] = 1;
                cartArr.push(product);
                localStorage.setItem("products", JSON.stringify(cartArr));
            } 
           
            $('#toggle' + index).empty();
            $('#toggle' + index).append(` 
            <a class="d-flex">
                <button class="btn btn-link "
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                </button>

                <input id="form${index}" min="1" name="quantity"
                    value="1" type="number"
                    class="form-control form-control-sm" />

                <button class="btn btn-link" id="btn${index}"
                    >
                    <i class="fas fa-plus"></i>
                </button>
            </a>
            
            `);

            var btnAdd = document.querySelector(`#btn${index}`);
            btnAdd.addEventListener('click', function() {
                this.parentNode.querySelector('input[type=number]').stepUp();
                addToCart(index, product);
            });



            const input = document.querySelector(`#form${index}`);
            input.value=findProduct(JSON.parse(localStorage.getItem("products")),product).product.qty;
            console.log({input: input.value})
            console.log('found product', findProduct(cartArr, product))
            console.log('hereeee', btnAdd);


        }

        function addToCart(index, product) {
            console.log(product.id);
            // console.log('found product', findProduct(cartArr, product))
            if (!cartArr.length || findProduct(cartArr, product).index === -1) {
                product['qty'] = 2;
                cartArr.push(product);
                localStorage.setItem("products", JSON.stringify(cartArr));
            } else {
                let newArr = cartArr.map(item => {
                    if (item.id === product.id) {
                        item['qty']++;
                    }
                    return item;
                })
                cartArr = newArr;
                localStorage.setItem("products", JSON.stringify(cartArr));
                console.log(JSON.parse(localStorage.getItem("products")));


            }
            console.log(cartArr);
            console.log({
                newArr
            });


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
