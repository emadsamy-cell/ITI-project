<?php

namespace App\Http\Controllers;

use App\Models\checkout;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $checkout = [];
        return redirect()->back();
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

    public function status_update($id , $status) {

     /*   $checkout = checkout::find($id);

        if($status == 0){
            // cancel
            $checkout->status = 4;
            $checkout->save();

        }
        else{
            // update status of the order
            $checkout->status ++;
            $checkout->save();
            return redirect(RouteServiceProvider::Admin)->with('success' , 'Order updated');
        }*/
        return redirect('admin')->with('success' , 'Order canceled');
    }
}
