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
Route::post("/ejercicio2/a", function (Request $request) {
    return FacadesResponse::json([
        "name" => $request->get("name"),
        "description" => $request->get("description"),
        "price" => $request->get("price")
    ]);
});

//B
Route::post("/ejercicio2/b", function (Request $request) {
    if ($request->get("price") < 0) {
        return FacadesResponse::json(["message" => "Price can't be less than 0"])->setStatusCode(422);
    }
});

//C
Route::post("/ejercicio2/c", function (Request $request) {
    if (isset($request->query()["discount"]) && $request->query("discount") > 0) {
        switch ($request->query("discount")) {
            case "SAVE5":
                //Descuento del 5% encontrado
                $discount = 5;
                $price = $request->get("price") * (100 - $discount) / 100;
                break;

            case "SAVE10":
                //Descuento del 10% encontrado
                $discount = 10;
                $price = $request->get("price") * (100 - $discount) / 100;
                break;

            case "SAVE15":
                //Descuento del 15% encontrado
                $discount = 15;
                $price = $request->get("price") * (100 - $discount) / 100;
                break;

            default:
                //Si el cupón existe pero no es válido
                $discount = 0;
                $price = $request->get("price");
                break;
        }

        return FacadesResponse::json([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "price" => $price,
            "discount" => $discount
        ]);
    } else {
        return FacadesResponse::json([
            "name" => $request->get("name"),
            "description" => $request->get("description"),
            "price" => $request->get("price"),
            "discount" => 0
        ]);
    }
});
