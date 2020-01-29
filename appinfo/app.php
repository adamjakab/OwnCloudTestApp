<?php

/**
 * Navigation
 */
\OC::$server->getNavigationManager()->add(function () {
    $urlGenerator = \OC::$server->getURLGenerator();
    return [
        // The string under which your app will be referenced in owncloud
        'id' => 'testapp',

        // The sorting weight for the navigation.
        // The higher the number, the higher will it be listed in the navigation
        'order' => 99,

        // The route that will be shown on startup
        'href' => $urlGenerator->linkToRoute('testapp.page.index'),

        // The icon that will be shown in the navigation, located in img/
        'icon' => $urlGenerator->imagePath('testapp', 'app.svg'),

        // The application's title, used in the navigation & the settings page of your app
        'name' => \OC::$server->getL10N('testapp')->t('TestApp'),
    ];
});

/**
 * Scripts and styles
 */
\OCP\Util::addScript('testapp', 'testapp');  // include js/script.js
\OCP\Util::addStyle('testapp', 'testapp');    // include css/style.css
