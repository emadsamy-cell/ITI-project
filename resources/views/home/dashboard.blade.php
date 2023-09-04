@extends('layouts.master')

@section('title' , 'Shoping Cart')


@section('content')



<div class="Shopping-cart-area pt-60 pb-60">

    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Return to shelf</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Book Title</th>
                                    <th class="cart-product-name">Book Author</th>
                                    <th class="cart-product-name">Return Date</th>
                                    <th class="li-product-price">Unit Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $product )
                                    <tr>
                                        <td class="li-product-remove">
                                            <a href="{{ route('returnToShelf' , $product->id) }}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        <td class="li-product-thumbnail" style="width: 20%; height:20%;">
                                            <a href="{{ route('HomeProduct.show' , $product->book->id) }}">
                                                <img src="{{ asset('images/product/'.$product->book->image) }}" alt="Li's Product Image" style="
                                                width: 100%;
                                                height: 130px;
                                            ">
                                            </a>
                                        </td>
                                        <td class="li-product-name">
                                            <a href="{{ route('HomeProduct.show' , $product->book->id) }}">
                                                {{ $product->book->title }}
                                            </a>
                                        </td>
                                        <td class="li-product-name">
                                            <a href="{{ route('HomeProduct.show' , $product->book->id) }}">
                                                {{ $product->book->author }}
                                            </a>
                                        </td>
                                        <td class="li-product-price">
                                            <span class="amount">{{ $product['return_date'] }}</span>
                                        </td>
                                        <td class="li-product-price">
                                            <span class="amount">${{ $product->book->price }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
