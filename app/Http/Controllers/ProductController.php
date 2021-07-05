<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('product.index', ['data_product' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->image->store('Product', 'public');
        $product = new Product();
        $product->fill($request->all());
        $product->image=$request->image->hashName();
        $product->save();

        return redirect()->route('product.index')->with('success', 'Add New Product Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', ['data_product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->all());
            if ($request->image)
                {
                    $request->image->store('Product', 'public');
                    $product->image=$request->image->hashName();
                }
            else
                {
                    $product->image=$product->image;
                }
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Update Successfully');
        //$product -> update($request->all());
        //return redirect('product')->with('success', 'Product Update Successfully');
        //$product = new Product();
        //$product -> fill($request->all());
        //$product -> save();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product -> delete();
        return redirect('product')->with('success', 'Delete Product Successfully');
        //$product -> delete('id');
        //return redirect()->route('product.index')->with('success', 'Product Deleted Successfully');
    }
}
