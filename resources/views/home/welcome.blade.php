@extends('layouts.master')

@section('title','3omda Store')


@section('content')



    <section class="product-area li-laptop-product li-laptop-product-2 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Books</span>
                        </h2>
                    </div>



                    <div class="row">
                        <div class="special-product-active owl-carousel">
                            @foreach ($books as $product )
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="{{ route('HomeProduct.show' , $product['id']) }}">
                                                    <img src="{{ asset('images/product/book1.jpg') }}" alt="Li's product Image" style="height: 200px;">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <h4><a class="product_name" href="{{ route('HomeProduct.show' , $product['id']) }}">
                                                        {{ $product['author'] }}

                                                    </a></h4>
                                                    <h4><a class="product_name" href="{{ route('HomeProduct.show' , $product['id']) }}">
                                                        {{ $product['title'] }}

                                                    </a></h4>

                                                    <div class="price-box">
                                                        <span class="new-price">${{ $product['price'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="{{ route('addToCart' , ['id' => $product->id , 'count' => 1]) }}">Add to cart</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>




                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>

    <!-- Li's Laptops product | Home V2 Area End Here -->

@endsection
