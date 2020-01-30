<?php

namespace OCA\TestApp\Controller;

use http\Client\Response;
use OCA\TestApp\AppInfo\Application;
use OCA\TestApp\Entity\ThingMapper;
use OCP\AppFramework\App;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;
use OCP\Route\IRoute;
use OCA\TestApp\Database\Helper as DatabaseHelper;

/**
 * Define a new page controller
 */
class PageController extends Controller
{
    /** @var IRoute */
    private $router;

    /** @var string */
    private $userId;

    /** @var ThingMapper */
    private $thingMapper;

    public function __construct($AppName, IRequest $request, string $userId, ThingMapper $thingMapper)
    {
        parent::__construct($AppName, $request);
        $this->thingMapper = $thingMapper;
        $this->userId = $userId;
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
            'route_1' => $route1,
            'dummy_1' => "I am a dummy from the controller"
        ];

        return new TemplateResponse($this->appName, $templateName, $parameters);
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function routeOne()
    {

        $list = $this->thingMapper->findAll($this->userId);

        return new DataResponse($list);

    }
}

