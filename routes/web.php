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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['prefix' => 'cliente'], function($router){
    $router->get('all', 'ClienteController@allSinRestricciones');
    $router->get('allJson', 'ClienteController@allJson');
    $router->get('get/{cedula}', 'ClienteController@getCliente');
    $router->post('create', 'ClienteController@create');
}); 
$router->group(['prefix' => 'avion'], function($router){
    $router->get('all', 'AvionController@allSinRestricciones');
    $router->get('allJson', 'AvionController@allJson');
    $router->get('get/{numero}', 'AvionController@getAvion');
    $router->post('create', 'AvionController@createAvion');
}); 
$router->group(['prefix' => 'viaje'], function($router){
    $router->get('all', 'ViajeController@allSinRestricciones');
    $router->get('allJson', 'ViajeController@allJson');
    $router->get('get/{numero}', 'ViajeController@getViaje');
    $router->post('create', 'ViajeController@createViaje');
}); 
$router->group(['prefix' => 'usuario'], function($router){
    $router->get('ingresar', 'UserController@login');

}); 
