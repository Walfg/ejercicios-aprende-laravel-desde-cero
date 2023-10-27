<?php
// Ejercicio 2

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Route;

// Route::get('/ejercicio2/a', function(Request $request){
//     return dd($request);
// });

Route::post('/ejercicio2/a', function (Request $request) {
    return FacadesResponse::json([
        "name" => $request->get("name"),
        "description" => $request->get("description"),
        "price" => $request->get("price")
    ]);
});
