<?php

namespace OCA\TestApp\Middleware;


use OCA\TestApp\Controller\ThingApiController;
use OCP\AppFramework\Middleware;
use OCP\ILogger;
use OCP\IRequest;

class ApiMiddleware extends Middleware
{
    /** @var IRequest */
    private $request;

    /** @var string */
    private $userId;

    /** @var ILogger */
    private $logger;

    public function __construct(IRequest $request, $userId, ILogger $logger)
    {
        $this->request = $request;
        $this->userId = $userId;
        $this->logger = $logger;
    }


    public function beforeController($controller, $methodName)
    {
        if ($controller instanceof ThingApiController) {
            // Take a little nap ;)
            usleep(1);
        }
    }
}