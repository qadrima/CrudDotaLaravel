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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index');
Route::get('/tester', 'Tester@index');*/

Route::group(['middleware' => ['web']], function() {
    Route::resource('tournament','HomeController');
});

Route::get('/edit_player','PlayerController@editPlayer');
Route::post('/edit_player_action','PlayerController@editPlayerAction');

Route::get('/detail/{id}', 'TournamentController@index');
Route::get('/add_match_player/{match_id}','TournamentController@addMatchPlayer');
Route::get('/add_match_player_action/{match_id}/{player_id}','TournamentController@addMatchPlayerAction');
Route::get('/delete_match_player/{match_id}/{player_id}','TournamentController@deleteMatchPlayer');