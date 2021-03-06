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



Route::group(['prefix'=>'admin','middleware'=>'auth.checkrole:admin'],function() {
    Route::resource('categories','CategoriesController');
    Route::resource('products','ProductsController');
    Route::resource('clients','ClientsController');
    Route::resource('orders','OrdersController');
    Route::resource('cupoms','CupomsController');
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
Route::group(['prefix'=>'customer','middleware'=>'auth.checkrole:client'],function() {
    Route::resource('order','CheckoutController');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
Route::group(['prefix'=>'api','middleware'=>'oauth'],function() {
    Route::get('teste',function (){
        return "Teste de Autenticaçãod do OAuth2";
    });
    Route::get('authenticated ',function (CodeDelivery\Repositories\UserRepository $userRepository){
            return $userRepository->skipPresenter(false)->find(Authorizer::getResourceOwnerId());
    });
    Route::group(['prefix'=>'client','middleware'=>'oauth.checkrole:client'],function() {
        Route::resource('order', 'Api\Client\ClientCheckoutController',
                        ['except' => ['create','edit','destroy']]);
    });
    Route::group(['prefix'=>'deliveryman','middleware'=>'oauth.checkrole:deliveryman'],function() {
        Route::resource('order', 'Api\Deliveryman\DeliverymanCheckoutController',
            ['except' => ['create','edit','destroy','store']]);
        Route::patch('order/{id}/update-status',[
            'uses'=>'Api\Deliveryman\DeliverymanCheckoutController@updateStatus',
            'as'=>'order.update_status'
        ]);
    });

});