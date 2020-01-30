<?php

namespace OCA\TestApp\Controller;

use OCA\TestApp\Entity\ThingMapper;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IRequest;
use \OCP\IL10N;
use \OCP\IURLGenerator;
use OC\Log;

/**
 * Class ThingApiController
 * @package OCA\TestApp\Controller
 */
class ThingApiController extends ApiController
{
    /** @var string */
    private $userId;

    /** @var ThingMapper */
    private $thingMapper;

    /** @var IL10N */
    private $l10n;

    /** @var Log */
    private $logger;

    /** @var IURLGenerator */
    private $urlGenerator;

    public function __construct($AppName, IRequest $request, string $userId, ThingMapper $thingMapper,
                                IL10N $l10n, Log $logger, IURLGenerator $urlGenerator)
    {
        parent::__construct($AppName, $request);
        $this->thingMapper = $thingMapper;
        $this->userId = $userId;
        $this->l10n = $l10n;
        $this->logger = $logger;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @return JSONResponse
     */
    public function index()
    {
        $entities = $this->thingMapper->findAll($this->userId);
        return new JSONResponse($entities);
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     * @return JSONResponse
     */
    public function show(int $id)
    {
        $entity = $this->thingMapper->findOne($this->userId, $id);
        return new JSONResponse($entity);
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param string $thing_name
     * @param string $thing_value
     * @return JSONResponse
     */
    public function create($thing_name, $thing_value)
    {
        $entity = $this->thingMapper->create($this->userId, $thing_name, $thing_value);
        return new JSONResponse($entity);
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     * @param string $thing_name
     * @param string $thing_value
     *
     * @return JSONResponse
     */
    public function update($id, $thing_name, $thing_value)
    {
        $entity = $this->thingMapper->modify($this->userId, $id, $thing_name, $thing_value);
        return new JSONResponse($entity);
    }

    /**
     * @CORS
     * @NoCSRFRequired
     * @NoAdminRequired
     *
     * @param int $id
     * @return JSONResponse
     */
    public function destroy($id)
    {
        $entity = $this->thingMapper->remove($this->userId, $id);
        return new JSONResponse($entity);
    }

}
