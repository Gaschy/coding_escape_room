<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;
use CodingEscapeRoom\Models\Session;
use CodingEscapeRoom\Models\User;

/**
 *
 * @see ControllerBase
 */
class CtwoController extends ControllerBase
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
            if($session->getSesProgress() != 2) {
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
            $user = User::findFirst([
                "conditions" => "username = :username: AND password = '" . $this->request->getPost("password") . "'",
                "bind" => [
                    "username" => "admin"
                ]
            ]);
            if($user !== false) {
                $this->flash->success("Welcome " . $user->getUsername() . "!");
                if($session->getSesProgress() < 3) {
                    $session->setSesProgress(3);
                    $session->save();
                }
                $this->redirectProgress($session->getSesProgress());
            } else {
                $this->redirectError("ctwo/index/challengeKey/" . $this->challengeKey, "Invalid password");
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }
}

