<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;
use CodingEscapeRoom\Models\Session;
use CodingEscapeRoom\Models\User;

/**
 *
 * @see ControllerBase
 */
class CfiveController extends ControllerBase
{
    /**
     * Setzt den HTML-Title für Session Actions
     *
     * @see ControllerBase::initialize()
     */
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $session = Session::findFirst([
            "conditions" => "Ses_Key = :key:",
            "bind" => ["key" => $this->challengeKey]
        ]);
        if($session !== false) {
            if($session->getSesProgress() != 5) {
                $this->redirectProgress($session->getSesProgress());
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }

    public function completeAction() {
        $session = Session::findFirst([
            "conditions" => "Ses_Key = :key:",
            "bind" => ["key" => $this->challengeKey]
        ]);
        if($session !== false) {
            $solution = $this->request->getPost("solution");
            if(count($solution) === 3 && count(array_keys($solution, '8')) == count($solution)) {
                if($session->getSesProgress() < 6) {
                    $session->setSesProgress(6);
                    $session->save();
                }
                $this->redirectProgress($session->getSesProgress());
            } else {
                $this->redirectError("cfive/index/challengeKey/" . $this->challengeKey, "Invalid solution");
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }
}

