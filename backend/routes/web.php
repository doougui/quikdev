<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/movies', 'MoviesController@index');
$router->get('/movies/{movie:[0-9]+}', 'MoviesController@show');
$router->get('/movies/genres/{genres}', 'MoviesController@genres');
$router->get('/genres', 'GenresController@index');
