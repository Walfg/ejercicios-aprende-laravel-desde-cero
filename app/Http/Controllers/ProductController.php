<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            "name" => "required|present|string|max:64",                               //Keyboard
            "description" => "required|present|string|max:512",                       //Mechanical RGB Keyboard
            "price" => "required|present|numeric|gt:0",                               //200
            "has_battery" => "required|present|boolean",                              //true
            "battery_duration" => "required_if:has_battery,true|numeric|gt:0",                //8
            "colors" => "required|present|array",                                     //["blue", "white", "black"]
            "colors.*" => "required|present|string",                                  //["blue", "white", "black"]
            "dimensions" => "required|present|array",                                 //{ "width": 40, "height": 5, "length": 20 }
            "dimensions.width" => "required|present|numeric|gt:0",
            "dimensions.height" => "required|present|numeric|gt:0",
            "dimensions.lenght" => "required|present|numeric|gt:0",
            "accessories" => "required|present|array",
            "accessories.*" => "required|present|array",
            "accessories.*.name" => "required|present|string",
            "accessories.*.price" => "required|present|gt:0",                       //[
                                                                                    //{ "name": "Wrist rest", "price": 20 },
                                                                                    //{ "name": "Keycaps", "price": 15 }
                                                                                    //]
        ]);

        return response();;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
