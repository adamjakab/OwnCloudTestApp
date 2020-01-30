<?php
namespace OCA\TestApp\AppInfo;

use OC\Server;
use OCA\TestApp\Entity\ThingMapper;
use \OCP\AppFramework\App;
use \OCA\TestApp\Controller\PageController;
use OCP\AppFramework\IAppContainer;
use OCP\IContainer;


class Application extends App {

    public const application_name = "testapp";

    public function __construct(array $urlParams=array()){
        parent::__construct(self::application_name, $urlParams);

        $container = $this->getContainer();

        /**
         * Controllers
         */
        $container->registerService('PageController', function(IContainer $c) {
            return new PageController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('UserId'),
                $c->query('ThingMapper')

            );
        });


        /**
         * Mappers
         */
        $container->registerService('ThingMapper', function (IAppContainer $c) {
            return new ThingMapper(
                $c->getServer()->getDatabaseConnection()
            );
        });

    }
}
