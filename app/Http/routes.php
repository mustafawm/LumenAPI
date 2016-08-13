<?php

$app->get('/', function () use ($app) {
    return 'Guitars...Guitars everywhere';
    // return $app->version();
});

$app->group(['prefix' => 'guitars', 'namespace' => 'App\Http\Controllers'], function($app) {
    // TLD/guitars
    $app->get('/', 'GuitarsController@index');

    // TLD/guitars/guitarID
    $app->get('{id}', 'GuitarsController@find');

    // TLD/guitars
    $app->post('/', 'GuitarsController@create');

    // TLD/guitars/guitarID
    $app->put('{id}', 'GuitarsController@update');

    // TLD/guitars/guitarID
    $app->delete('{id}', 'GuitarsController@destroy');
});
