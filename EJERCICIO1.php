<?php

use Illuminate\Routing\Route;

Route::GET('/ejercicio1', function(){
    return view("GET OK");
});

Route::POST('/ejercicio1', function(){
    return view("POST OK");
});

Route::PUT('/ejercicio1', function(){
    return view("PUT OK");
});

Route::PATCH('/ejercicio1', function(){
    return view("PATCH OK");
});

Route::DELETE('/ejercicio1', function(){
    return view("DELETE OK");
});


?>
