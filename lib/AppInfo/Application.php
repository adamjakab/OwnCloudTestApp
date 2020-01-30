<?php
namespace OCA\TestApp\AppInfo;

use OCA\TestApp\Controller\ThingApiController;
use OCA\TestApp\Entity\ThingMapper;
use OCA\TestApp\Middleware\ApiMiddleware;
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

        $container->registerService('ThingApiController', function (IContainer $c) {
            return new ThingApiController(
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('UserId'),
                $c->query('ThingMapper'),
                $c->query('L10N'),
                $c->query('URLGenerator')
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

        /**
         * Middleware
         */
        $container->registerService('ApiMiddleware', function (IAppContainer $c) {
            return new ApiMiddleware(
                $c->query('Request'),
                $c->query('UserId'),
                $c->getServer()->getLogger()
            );
        });
        $container->registerMiddleWare('ApiMiddleware');

    }
}
