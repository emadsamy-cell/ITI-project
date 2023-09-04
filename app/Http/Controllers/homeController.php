<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\borrow;
use App\Models\category;
use App\Models\product;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = book::all();

        return view('home.welcome' , ['books' => $books]);
    }


    public function profile() {
       $user = Auth::user();

       return view('home.profile' , ['user' => $user]);
    }

    public function updateProfile(Request  $request) {
        $id = Auth::user()->id;
        $request->validate([
            'password' =>['required','confirmed'],
            'name'=>['required','string'],
            'email' =>['required', 'email' , Rule::unique('Users', 'email')->ignore($id)],
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;

        $user->save();

        Auth::login($user);
        return redirect(RouteServiceProvider::HOME)->with('order successed' , 'Your Profile Updated Successfully!');
    }

    public function dashboard() {
        if(Auth::check()){
            $books = borrow::all()->where('user_id' , Auth::user()->id);
            return view('home.dashboard' , ['books' => $books]);
        } else {
            return redirect(route('login'));
        }
    }




    public function return($id) {
        if(Auth::check()){
            $borrow = borrow::find($id);

            $book = book::find($borrow->book_id);
            $book->avaliable += 1;
            $book->save();

            $borrow->delete();

            return redirect()->back();
        } else {
            return redirect(route('login'));
        }
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
