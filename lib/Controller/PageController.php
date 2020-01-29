<?php

namespace OCA\TestApp\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;
use OCP\Route\IRoute;

/**
 * Define a new page controller
 */
class PageController extends Controller
{
    /** @var IRoute */
    private $router;

    public function __construct($AppName, IRequest $request)
    {
        parent::__construct($AppName, $request);
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index()
    {
        $templateName = 'index';  // will use templates/index.php

        $route1 = "route1";
        $parameters = [
            'route_1' => $route1
        ];

        return new TemplateResponse($this->appName, $templateName, $parameters);
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function routeOne()
    {
        $data = ['name' => 'test', 'values' => [1, 2, 3]];
        return new JSONResponse($data);
    }
}

