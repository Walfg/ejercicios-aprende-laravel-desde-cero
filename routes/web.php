<?php
// Ejercicio 2

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Route;

// Route::get('/ejercicio2/a', function(Request $request){
//     return dd($request);
// });

//A
Route::post('/ejercicio2/a', function (Request $request) {
    return FacadesResponse::json([
        "name" => $request->get("name"),
        "description" => $request->get("description"),
        "price" => $request->get("price")
    ]);
});

//B
Route::post('/ejercicio2/b', function (Request $request) {
    if ($request->get("price") < 0){
        return FacadesResponse::json(["message" => "Price can't be less than 0"])->setStatusCode(422);
    }
});



