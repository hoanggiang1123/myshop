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
    $prefix = 'category';
    $controllerName = 'category';
    Route::group(['prefix'=> $prefix],function() use($controllerName) {
        $controller = ucfirst($controllerName).'Controller@';
        Route::get('/', ['as'=>$controllerName, 'uses'=>$controller.'index']);
        Route::get('/form/{id?}', ['as'=>$controllerName.'/form', 'uses'=>$controller.'form'])->where('id','[0-9]+');
        Route::get('/delete/{id}', ['as'=>$controllerName.'/delete', 'uses'=>$controller.'delete'])->where('id','[0-9]+');
        Route::get('/change-ishome-{ishome}/{id}', ['as'=>$controllerName.'/ishome', 'uses'=>$controller.'ishome'])->where('id','[0-9]+');
        Route::get('/change-status-{status}/{id}', ['as'=>$controllerName.'/status', 'uses'=>$controller.'status'])->where('id','[0-9]+');
        Route::post('/bulk-action', ['as'=>$controllerName.'/bulkaction', 'uses'=>$controller.'bulkaction']);
    });
});