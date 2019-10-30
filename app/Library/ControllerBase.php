<?php
namespace CodingEscapeRoom\Library;

use Phalcon\Http\Cookie;
use Phalcon\Mvc\Controller;

/**
 * Class ControllerBase
 * Bietet Standard-Funktionen für alle Controller
 *
 */
class ControllerBase extends Controller
{

    const ajaxSuccess = "code_success";
    const ajaxError = "code_error";
    const ajaxNotAllowed="code_not_allowed";

    /**
     * Setzt den Titel und das Standard-Template
     *
     */
    protected function initialize()
    {
        $this->tag->setTitleSeparator(" - ");
        $this->tag->setTitle('Coding Escape Room');

        $this->view->setTemplateAfter('main');

        if($this->request->isAjax()) {
            $this->view->disable();
        }
    }

    /**
     * Forwards the page to a specific URI
     *
     * @param string $uri
     */
    protected function forward($uri)
    {
        $uriParts = explode('/', $uri);
        array_slice($uriParts, 2);
        return $this->dispatcher->forward(
            array(
                'module' => $this->router->getModuleName(),
                'controller' => $uriParts[0],
                'action' => $uriParts[1],
                'params' => $this->dispatcher->getParams()
            )
        );
    }

    /**
     * Leitet die Seite weiter
     * Im Gegensatz zu forward wird ein neuer HTTP-Request ausgeführt
     * Vor allem nützlich nach POST-Anfragen, da beim erneuten laden der Seite nicht noch einmal die selbe Aktion (Login, Import...) ausgeführt wird
     *
     * @param string $uri
     */
    protected function redirect($uri) {
        $this->response->redirect($uri);
    }

    protected function forwardError($uri, $message) {
        $this->flash->error($message);
        $this->forward($uri);
    }

    protected function redirectError($uri, $message) {
        $this->flash->error($message);
        $this->redirect($uri);
    }

    protected function redirectSuccess($uri, $message){
        $this->flash->success($message);
        $this->redirect($uri);
    }

    protected function setFileDownloadCookie() {
        $cookie = new Cookie("fileDownload", "true");
        $cookie->setDI($this->di);
        $cookie->useEncryption(false);
        $cookie->setHttpOnly(false);
        $cookie->send();
    }
}
