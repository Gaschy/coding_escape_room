<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;
use CodingEscapeRoom\Models\Session;
use CodingEscapeRoom\Models\User;

/**
 *
 * @see ControllerBase
 */
class CompleteController extends ControllerBase
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
            if($session->getSesProgress() != 6) {
                $this->redirectProgress($session->getSesProgress());
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }
}

