<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;
use CodingEscapeRoom\Models\Session;
use CodingEscapeRoom\Models\User;

/**
 *
 * @see ControllerBase
 */
class CthreeController extends ControllerBase
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
            if($session->getSesProgress() != 3) {
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
            $solved = true;
            if($solved) {
                if($session->getSesProgress() < 4) {
                    $session->setSesProgress(4);
                    $session->save();
                }
                $this->redirectProgress($session->getSesProgress());
            } else {
                $this->redirectError("cthree/index/challengeKey/" . $this->challengeKey, "Invalid password");
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }
}

