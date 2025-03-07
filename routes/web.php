<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug', function () {
    $x = "Hello, Xdebug!";
//    dd(config('app'));
    return $x;
});
