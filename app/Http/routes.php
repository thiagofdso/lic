<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix'=>'admin','as'=>'admin.'],function() {
    //Route::resource('categories','CategoriesController');
    Route::group(['prefix'=>'categories','as'=>'categories.'],function() {
        Route::get('',['as' => 'index','uses'=>'CategoriesController@index']);
        Route::get('create',['as' => 'create','uses'=>'CategoriesController@create']);
        Route::post('store',['as' => 'store','uses'=>'CategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'CategoriesController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('cancel', ['as' => 'cancel', 'uses' => 'CategoriesController@cancel']);
    });
    Route::group(['prefix'=>'products','as'=>'products.'],function() {
        Route::get('',['as' => 'index','uses'=>'ProductsController@index']);
        Route::get('create',['as' => 'create','uses'=>'ProductsController@create']);
        Route::post('store',['as' => 'store','uses'=>'ProductsController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductsController@edit']);
        Route::put('update/{id}', ['as' => 'update', 'uses' => 'ProductsController@update']);
        Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('cancel', ['as' => 'cancel', 'uses' => 'ProductsController@cancel']);
    });

});
Route::get('/', function () {
    return view('app');
});

Route::get('/test', function () {
    $repository = app()->make('CodeDelivery\Repositories\UserRepository');
    return $repository->all();
});
Route::group(['prefix'=>'password'],function() {
    Route::get('email', ['as' => 'password.index','uses'=>'Auth\PasswordController@index']);
    Route::post('email', ['as' => 'password.enviar','uses'=> 'Auth\PasswordController@enviar']);
    Route::get('reset/{token}', ['as' => 'password.getreset','uses'=>'Auth\PasswordController@getResetar']);
    Route::post('reset', ['as' => 'password.reset','uses'=>'Auth\PasswordController@resetar']);
});
Route::group(['prefix'=>'auth'],function() {
    Route::get('register', ['as' => 'auth.register','uses'=>'Auth\AuthController@registrar']);
    Route::post('register', ['as' => 'auth.create','uses'=>'Auth\AuthController@create']);
    Route::get('login',['as' => 'auth.login','uses'=>'Auth\AuthController@logar']);
    Route::post('login', ['as' => 'auth.logar','uses'=>'Auth\AuthController@acessar']);
    Route::get('logout', ['as' => 'auth.logout', function () {
        Auth::logout();
        return  redirect('/');
    }]);
    Route::get('resend', ['as' => 'auth.getresend','uses'=>'Auth\AuthController@getResend']);
    Route::post('resend', ['as' => 'auth.resend','uses'=>'Auth\AuthController@postResend']);
    Route::get('verify/{confirmationCode}', ['as' => 'auth.confirm', 'uses' => 'Auth\AuthController@confirm']);
});