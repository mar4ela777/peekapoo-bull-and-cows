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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('/singleplayer', 'SingleplayerController@newSingleplayer');
Route::get('/singleplayer-mistake', function(){
    return View::make('singleplayer_mistake');
});
Route::post('/singleplayer', 'SingleplayerController@singleplayerPost');

Route::get('/multiplayer', 'MultiplayerController@multiplayerIndex');
Route::post('/multiplayer', 'MultiplayerController@newMultiplayer');
//Route::post('/multiplayer', 'GameController@playerPost');
Route::get('/multiplayer-game', 'MultiplayerController@playerIndex');
Route::post('/multiplayer-game', 'MultiplayerController@playerPost');

Route::get('/multiplayer-mistake', function(){
    return View::make('multiplayer_mistake');
});



