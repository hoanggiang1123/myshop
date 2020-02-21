<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
$prefixAdmin = config('mycf.url.prefix_admin');

Route::group(['prefix' => $prefixAdmin, 'namespace'=>'Backend'], function() {
    $prefix = 'product';
    $controllerName = 'product';
    Route::group(['prefix'=> $prefix],function() use($controllerName) {
        $controllerName = ucfirst($controllerName).'Controller@';
        Route::get('/', ['as'=>$controllerName, 'uses'=>$controllerName.'index']);
    });
});