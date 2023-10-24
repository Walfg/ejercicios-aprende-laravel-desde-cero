<!-- EJERCICIO 1 -->
<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/ejercicio1', function(){
        return "GET OK";
    });

    Route::post('/ejercicio1', function(){
        return "POST OK";
    });

    Route::put('/ejercicio1', function(){
        return "PUT OK";
    });

    Route::patch('/ejercicio1', function(){
        return "PATCH OK";
    });

    Route::delete('/ejercicio1', function(){
        return "DELETE OK";
    });

?>
