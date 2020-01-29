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
            'name' => 'page#say_hi',
            // The route
            'url' => '/hi',
            // Only accessible with GET requests
            'verb' => 'GET'
        ],
    ]
]);
