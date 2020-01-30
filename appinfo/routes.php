<?php

use OCA\TestApp\AppInfo\Application;

$application = new Application();

$application->registerRoutes($this, [
    'routes' => [
        // Page
        ['name' => 'page#index',                    'url' => '/',                   'verb' => 'GET'],
        ['name' => 'page#route_one',                'url' => '/',                   'verb' => 'GET'],

        //API (Thing)
        ['name' => 'thing_api#index',               'url' => '/api/things',         'verb' => 'GET'],
        ['name' => 'thing_api#show',                'url' => '/api/thing/{id}',     'verb' => 'GET'],
        ['name' => 'thing_api#create',              'url' => '/api/thing',          'verb' => 'POST'],
        ['name' => 'thing_api#update',              'url' => '/api/thing/{id}',     'verb' => 'PUT'],
        ['name' => 'thing_api#destroy',             'url' => '/api/thing/{id}',     'verb' => 'DELETE'],
        ['name' => 'thing_api#preflighted_cors',    'url' => '/api/0.1/{path}',     'verb' => 'OPTIONS', 'requirements' => ['path' => '.+']]
    ]
]);

