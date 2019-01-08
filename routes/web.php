<?php

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    return back();
});

Route::post('/foto', 'DashboardController@updatePhoto');

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

// Auto Api
    Route::get('/autos','AutoController@indexapi');
    Route::get('auto/{auto}', 'AutoController@showapi');
    Route::post('auto', 'AutoController@storeapi');
    Route::put('auto/{auto}', 'AutoController@updateapi');
    Route::delete('auto/{auto}', 'AutoController@destroyapi');


// Reserva Api
    Route::get('/reservas','ReservaController@indexapi');
    Route::get('reserva/{reserva}', 'ReservaController@showapi');
    Route::get('reservastotales', 'ReservaController@reservastotales');
    Route::get('reservascount', 'ReservaController@reservascount');
    Route::post('reserva', 'ReservaController@storeapi');
    Route::put('reserva/{reserva}', 'ReservaController@updateapi');
    Route::delete('reserva/{reserva}', 'ReservaController@destroyapi');


//  Disponible Api
    Route::post('disponible', 'DashboardController@disponible');

//  Abono Api
    Route::post('abono', 'AbonoController@storeapi');
    Route::get('abono', 'AbonoController@indexapi');
    Route::put('abono/{abono}', 'AbonoController@updateapi');
    Route::get('abono/{abono}', 'AbonoController@showapi');
    Route::delete('abono/{abono}', 'AbonoController@destroyapi');

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
Route::resource('user','UserController')->middleware('auth');

// promos
Route::resource('promo','PromoController')->middleware('auth');

// reservas
Route::resource('reserva','ReservaController')->middleware('auth');
Route::get('reserva/createdis/{auto}/{fechaI}/{fechaF}', 'ReservaController@createredirect')->name('createredirect')->middleware('auth');
Route::get('cargoalquiler', 'ReservaController@cargoalquiler')->name('cargoalquiler')->middleware('auth');
Route::get('generarcontrato', 'ReservaController@generarcontrato')->name('generarcontrato')->middleware('auth');


// promos
Route::resource('auto','AutoController')->middleware('auth');

//resetear contraseña
Route::get('cambioclaveform', 'DashboardController@cambioclaveform')->name('cambioclaveform.update');
// Route::get('password/request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

Route::post('cambioclave/{empleado}', 'DashboardController@cambioclave')->name('cambioclave');


// Cliente
Route::resource('cliente', 'ClienteController')->middleware('auth');

// Generar prueba
Route::get('prueba', 'DashboardController@prueba')->name('prueba')->middleware('auth');
