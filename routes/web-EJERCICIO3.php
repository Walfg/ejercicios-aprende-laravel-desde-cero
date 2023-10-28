<?php

//EJERSISIO 3 AYAYAY

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;


// Route::post("/ejercicio3", function(Request $request) {
//     return Response::json();
// });

// Route::post("/ejercicio3", [ProductController::class, "store"])->name("ejercicio3.store");
Route::post("/ejercicio3", function (Request $request) {
    $request->validate([
        "name" => "required|string|max:64",                               //Keyboard
        "description" => "required|string|max:512",                       //Mechanical RGB Keyboard
        "price" => "required|numeric|gt:0",                               //200
        "has_battery" => "required|boolean",                              //true
        "battery_duration" => "required_if:has_battery,true|numeric|gt:0",                //8
        "colors" => "required|array",                                     //["blue", "white", "black"]
        "colors.*" => "required|string",                                  //["blue", "white", "black"]
        "dimensions" => "required|array",                                 //{ "width": 40, "height": 5, "length": 20 }
        "dimensions.width" => "required|numeric|gt:0",
        "dimensions.length" => "required|numeric|gt:0",
        "dimensions.height" => "required|numeric|gt:0",
        "accessories" => "required|array",
        "accessories.*" => "required|array",
        "accessories.*.name" => "required|string",
        "accessories.*.price" => "required|numeric|gt:0",                         //[
        //{ "name": "Wrist rest", "price": 20 },
        //{ "name": "Keycaps", "price": 15 }
        //]
    ]);
    return response();
});
