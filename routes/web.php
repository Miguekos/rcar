<?php

Route::group(['prefix' => 'v1.0'], function () {

// Clientes Api
    Route::get('/clientes','ClienteController@indexapi');
    Route::get('cliente/{cliente}', 'ClienteController@showapi');
    Route::post('cliente', 'ClienteController@storeapi');
    Route::put('cliente/{cliente}', 'ClienteController@updateapi');
    Route::delete('cliente/{cliente}', 'ClienteController@destroyapi');

// Usuario Api
    Route::get('usuario', 'UserController@indexapi');
    Route::post('login', 'Auth\LoginController@loginapi');


// Promos Api
    Route::get('/promos','PromoController@indexapi');
    Route::get('promo/{promo}', 'PromoController@showapi');
    Route::post('promo', 'PromoController@storeapi');
    Route::put('promo/{promo}', 'PromoController@updateapi');
    Route::delete('promo/{promo}', 'PromoController@destroyapi');




});

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

//Login - loguot
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Registro
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

//Usuarios
Route::resource('user','UserController');

// promos
Route::resource('promos','PromoController');

//resetear contraseña
Route::get('cambioclaveform', 'DashboardController@cambioclaveform')->name('cambioclaveform.update');
// Route::get('password/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('cambioclave/{empleado}', 'DashboardController@cambioclave')->name('cambioclave');



// Cliente

Route::resource('cliente', 'ClienteController');



// Generar prueba
