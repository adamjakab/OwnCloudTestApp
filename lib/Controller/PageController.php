<?php
namespace OCA\TestApp\Controller;

use OCP\AppFramework\{
    Controller,
    Http\TemplateResponse
};

/**
- Define a new page controller
 */
class PageController extends Controller {
    /**
    - @NoCSRFRequired
     */
    public function index() {
        return ['test' => 'hi'];
    }
}

