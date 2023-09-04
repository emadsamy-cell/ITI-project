@extends('layouts.master')

@section('title' , 'Product')

@section('content')

<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
               <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="{{ asset('images/product/'.$product->image) }}" data-gall="myGallery">
                                <img src="{{ asset('images/product/'.$product->image) }}" alt="product image">
                            </a>
                        </div>

                    </div>

                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{ $product->author }}</h2>
                        <h2>{{ $product->title }}</h2>


                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">${{ $product->price }}</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>
                                    {{ $product->discription }}
                                </span>
                            </p>
                        </div>

                        <div class="single-add-to-cart">
                            <form action="{{ route('addToCart' , ['id' => $product->id , 'count' => 1]) }}" class="cart-quantity" method="GET">
                                @csrf
                                <button class="add-to-cart" type="submit">Add to cart</button>
                                    @if ($errors->has('count'))

                                        <li class="list-group-item list-group-item-danger"> {{ $errors->first('count') }} </li>

                                    @endif
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
