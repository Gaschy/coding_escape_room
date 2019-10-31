<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;
use CodingEscapeRoom\Models\Session;

/**
 *
 * @see ControllerBase
 */
class ConeController extends ControllerBase
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
            if($session->getSesProgress() != 1) {
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
            if($this->request->getPost("challenge_passphrase") == "That was easy!!") {
                if($session->getSesProgress() < 2) {
                    $session->setSesProgress(2);
                    $session->save();
                }
                $this->redirectProgress($session->getSesProgress());
            } else {
                $this->redirectError("cone/index/challengeKey/" . $this->challengeKey, "Invalid passphrase");
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }
}

