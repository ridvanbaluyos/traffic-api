<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->version();
});

$router->get('/test', function () use ($router) {
    echo 'test';
    exit;
});

// Version 1
$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('feed', 'v1\TrafficController@getTrafficFeed');
    $router->get('highways', 'v1\TrafficController@getHighways');
    $router->get('segments', 'v1\TrafficController@getSegments');
});
