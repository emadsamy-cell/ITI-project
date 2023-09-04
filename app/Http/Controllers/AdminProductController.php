<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\book;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
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

        return view('admin.controller.add_product' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' =>['required','unique:books,title'],
            'author' =>['required'],
            'price' => ['required' , 'numeric'],
            'discription' => ['required'],
            'avaliable' =>['required','numeric','min:0'],
        ]);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $image_name = "product".$request->title.$ext;

        $image->move(public_path('images/product') , $image_name);


        book::create([
            'title' => $request->title,
            'price'=> $request->price,
            'image' => $image_name,
            'discription' => $request->discription,
            'author' => $request->author,
            'avaliable' => $request->avaliable,
        ]);
        return redirect('admin')->with('success' , 'Product Added Successfully');
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
        $book = book::find($id);

        return view('admin.product.edit',['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $book = book::find($id);



        $request->validate([
            'title' =>['required',
                    Rule::unique('books','title')->ignore($id)],
            'author' =>['required'],
            'price' => ['required' , 'numeric'],
            'discription' => ['required'],
            'avaliable' =>['required','numeric','min:0'],
        ]);

        $image_name = $book->image;

        if($request->files->has('image')){
            $request->validate([
                'image' => 'required|image',
            ]);
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $image_name = "product".$request->name.$ext;
            $img->move(public_path('images/product'),$image_name);
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->discription = $request->discription;
        $book->image = $image_name;
        $book->avaliable = $request->avaliable;
        $book->price = $request->price;

        $book->save();

        return redirect('admin')->with('success' , 'Product Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $book = book::find($id)->delete();
         return redirect('admin')->with('success' , 'Product Deleted Successfully!');
    }
}
