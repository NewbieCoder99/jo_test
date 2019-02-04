<?php

	Route::get('/', 'HomeController@index')->name('index');
	Route::get('auth/{lang}/login', 'LoginController@index')->name('web.login');

// Registration Route
	Route::get('auth/{lang}/registration','RegisterController@index')
		->name('registration');
	Route::post('auth/{lang}/registration','RegisterController@store')
		->name('registration.store');
// End Registration Route

// Activation Code Route
	Route::get('auth/{lang}/activation','ActivationController@index')
		->name('activation');
	Route::match(['get','post'],'auth/{lang}/activation/send','ActivationController@send_activation')->name('send.code');
// End Activation Code Route

// Forget Password Route
	Route::get('auth/{lang}/verification/{hash}','ForgotPasswordController@index')
		->name('verification');
// End Forget Password Route

// Forget Password Route
	Route::get('auth/{lang}/forgot-password','ForgotPasswordController@index')->name('forgot.password');
// End Forget Password Route

Auth::routes();

Route::group(['middleware' => 'auth'], function() {

	Route::group(['prefix' => 'superadmin','middleware' => [
		'role:superadmin','lang'
	]], function() {
		Route::get('/', 'Admin\HomeController@index')->name('dashboard.admin');

		Route::group(['prefix' => 'administrations'], function() {
			Route::resource('roles','Admin\RolesController');
			Route::resource('users','Admin\AdministrationsController');
			Route::resource('audits','Admin\AuditablesController');
		});

		Route::group(['prefix' => 'master-data'], function() {
			Route::resource('clients','Admin\ClientController');
			Route::post('clients/add-transaction','Admin\ClientController@addTransactions')
				->name('transaction.add');
		});

		Route::get('mutation/{id}/client','Admin\MutationController@index')
			->name('mutation.index');

		Route::group(['prefix' => 'settings'], function() {
			Route::get('app','Admin\AppController@index')->name('app.index');
			Route::put('app','Admin\AppController@update')->name('app.update');
		});

	});

	Route::group(['prefix' => 'member','middleware' => [
		'role:member','lang'
	]], function() {
		Route::get('/', 'Admin\HomeController@index')->name('dashboard.member');
	});

});