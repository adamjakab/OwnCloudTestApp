<?php

use OCA\TestApp\AppInfo\Application;

$application = new Application();

$application->registerRoutes($this, [
    'routes' => [
        [
            // Controller: PageController Method: Index
            'name' => 'page#index',
            // The route
            'url' => '/',
            // Only accessible with GET requests
            'verb' => 'GET'
        ],
        [
            'name' => 'page#route_one',
            // The route
            'url' => '/route1',
            // Only accessible with GET requests
            'verb' => 'GET'
        ],
    ]
]);

