<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillingRequest;
use App\Models\book;
use App\Models\borrow;
use App\Models\checkout;
use App\Models\order;
use App\Models\product;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->session()->has('cart')){

            $products = $request->session()->get('cart');
            return view('home.checkout' , ['products' => $products]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // check logged in
         if(! (Auth::check())){
            return redirect(route('login'));
        }
        // check all product are avaliable

        $productsInCart = session('cart')->items;

        foreach($productsInCart as $item){
            if( $item['qty'] > $item['item']->avaliable ){
                return redirect()->back()->with('Not Avaliabe'
                                                , 'There is only '. $item['item']->avaliable . ' left for' . $item['item']->title);
            }
        }

        // update avaliable products in database

        foreach($productsInCart as $item){
            $product = book::find($item['item']->id);
            $product->avaliable = $product->avaliable - $item['qty'];
            $product->save();

        }

        // insert all products in borrow table
        foreach($productsInCart as $item){

            borrow::create([
                'return_date' => date("Y-m-d"),
                'user_id' => Auth::user()->id,
                'book_id' => $item['item']->id,
            ]);
        }

        // clear the cart
        session()->forget('cart');

        //return home
        return redirect(RouteServiceProvider::HOME)->with('order successed' , 'Your Books has been Added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
