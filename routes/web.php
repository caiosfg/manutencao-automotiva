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

/**
 * endpoints
 */

$router->get('api/veiculos','CarrosController@getAll');

$router->group(['prefix' => 'api/carro'], function () use ($router) {
    
    $router->get('/{id}','CarrosController@get');
    $router->post('/','CarrosController@store');
    $router->put('/{id}','CarrosController@update');
    $router->delete('/{id}','CarrosController@destroy');
});


