<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;

/**
 * Controller für alle Fehleranzeigen
 * 
 * @author Dominic
 *
 */
class ErrorsController extends ControllerBase
{
	/**
	 * (non-PHPdoc)
	 * @see ControllerBase::initialize()
	 */
    public function initialize()
    {
        $this->tag->setTitle('Oops!');
        parent::initialize();
    }

    /**
     * Anzeige für 404 - Error (Page not found)
     */
    public function show404Action()
    {
        $this->response->setStatusCode(404);
    }

    /**
     * Anzeige für 401 Error (Keine Berechtigung)
     */
    public function show401Action()
    {
        $this->response->setStatusCode(401);
    }

    /**
     * Anzeige für 500 Error (Internal Server Error)
     */
    public function show500Action()
    {
        $this->response->setStatusCode(500);
    }

    /**
     * Anzeige für 500 Error (Internal Server Error)
     */
    public function show500AJAXAction()
    {
        $this->view->disable();
        $this->response->setStatusCode(500);
        return self::ajaxNotAllowed;
    }

    /**
     * Anzeige für 401 Error (Keine Berechtigung) --> Nur AJAX
     */
    public function show401AJAXAction() {
        $this->view->disable();
        $this->response->setStatusCode(401);
        return self::ajaxNotAllowed;
    }
}
