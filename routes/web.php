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
        Route::get('/form/{id?}', ['as'=>$controllerName.'/form', 'uses'=>$controller.'form']);
        Route::get('/delete/{id}', ['as'=>$controllerName.'/delete', 'uses'=>$controller.'delete']);
        Route::get('/show-home-{status}/{id}', ['as'=>$controllerName.'/showhome', 'uses'=>$controller.'showhome']);
        Route::get('/change-display-{display}/{id}', ['as'=>$controllerName.'/display', 'uses'=>$controller.'display']);
        Route::get('/change-status-{status}/{id}', ['as'=>$controllerName.'/status', 'uses'=>$controller.'status']);
        Route::post('/change-status-multi', ['as'=>$controllerName.'/changeStatusMulti', 'uses'=>$controller.'changeStatusMulti']);
        Route::post('/change-display-multi', ['as'=>$controllerName.'/changeDisplayMulti', 'uses'=>$controller.'changeDisplayMulti']);
        Route::post('/change-ordering-multi', ['as'=>$controllerName.'/changeOrderingMulti', 'uses'=>$controller.'changeOrderingMulti']);
        Route::post('/change-ishome-multi', ['as'=>$controllerName.'/changeIsHomeMulti', 'uses'=>$controller.'changeIsHomeMulti']);
        Route::post('/delete-multi', ['as'=>$controllerName.'/deleteMulti', 'uses'=>$controller.'deleteMulti']);
    });
});