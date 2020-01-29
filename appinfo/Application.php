<?php

namespace OCA\TestApp\AppInfo;

use \OCP\AppFramework\App;
use \OCA\TestApp\Controller\PageController;
use OCP\AppFramework\IAppContainer;

class Application extends App {

    public function __construct(array $urlParams=array()){
        parent::__construct('testapp', $urlParams);

        $container = $this->getContainer();

        $container->registerService('PageController', function(IAppContainer $c) {
            return new PageController(
                $c->query('AppName'),
                $c->query('Request')
            );
        });
    }
}
