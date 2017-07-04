<?php

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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/test', function () use ($app) {
    echo 'test';
    exit;
});

// Version 1
$app->group(['prefix' => 'v1'], function () use ($app) {
    $app->get('feed', 'v1\TrafficController@getTrafficFeed');
    $app->get('highways', 'v1\TrafficController@getHighways');
    $app->get('segments', 'v1\TrafficController@getSegments');
});
