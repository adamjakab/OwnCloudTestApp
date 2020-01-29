<?php
namespace OCA\TestApp\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Controller;


/**
 * Define a new page controller
 */
class PageController extends Controller {

    public function __construct($AppName, IRequest $request){
        parent::__construct($AppName, $request);
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index() {
        // Renders testapp/templates/index.php
        return new TemplateResponse('testapp', 'index');
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function sayHi() {
        return ['test' => 'hi'];
    }


}

