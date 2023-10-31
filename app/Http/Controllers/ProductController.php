<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRules = [
        'name' => 'required|string |max:64',
        'description' => 'required| string|max:512',
        'price' => 'required|numeric | gt:0',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = auth()->user()->products;
        //returning JSON with the products
        return [
            "products" => $products
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $data = $request->validate([
        // "price" => "required | numeric | gt:0",
        // "name" => "required | string| max:65",
        // "description" => "required | string | max:512"]);
        $data = $request->validate($this->productRules);
        // auth()->user()->products()->create($request->validated());
        $product = auth()->user()->products()->create($data);

        // $product = $data;
        return [
            "message" => "Product created successfully",
            "product" => $product,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $this->authorize('view', $product);

        return
            compact('product')
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->authorize("update", $product);

        $product->update($request->validate($this->productRules));

        return [
            "message" => "Product updated successfully",
            "product" => $product,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize("delete", $product);
        $product->delete();
        return [
            "message" => "Product deleted successfully",
            "product" => $product
        ];
    }
}
