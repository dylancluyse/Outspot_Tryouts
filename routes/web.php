<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

/*
Het formulier waar de gebruiker de prijs zal intypen.
*/

Route::get('/', function () {
    return view('pages.form');
});

/* 
De ingegeven waarde zal eerst gevalideerd worden door de FormController. 
Nadien zal er gekeken worden om de 
*/

Route::get('shop/{prijs}', 'FormController@store');

Route::get('result', function(){
    return view('pages.result');
});


