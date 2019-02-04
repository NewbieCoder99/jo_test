<?php

// use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/admin', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'services','middleware' => ['ajax']], function() {
	Route::get('/', 'Api\ServiceController@index')->name('services.index');
});

Route::group(['prefix' => 'auth'], function() {
  Route::post('login', 'Api\AuthController@login')->name('api.signin');
  Route::post('signup', 'Api\AuthController@signup')->name('api.signup');

  Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'Api\AuthController@logout')->name('api.signout');
    Route::get('user', 'Api\AuthController@user')->name('api.getuser');
  });
});

// ================ ACCOUNT CHECKER ================
$acc_items = [
	'prefix' => 'account-checker/process',
	'namespace' => 'Api\Acc',
	'middleware' => ['ajax']
]; 
Route::group($acc_items, function() {
	Route::post('indihome','IndihomeController@index')->name('api.indihome.process');
  Route::post('spotify','SpotifyController@index')->name('api.spotify.process');
});
// ================ END ACCOUNT CHECKER ================