<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //Aquí Log creación
        //
        $product = $request->validate([
            "name" => "required | string",
            "description" => "required | string",
            "price" => "required | numeric | gt:0",
        ]);

        // $product["user_id"] = auth()->id();

        $product = auth()->user()->products()->create($product);;

        Log::info("Product created", ["product" => $product]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   //Aquí Log borrar
        //
        Log::info("Product deleted", compact("product"));
    }
}
