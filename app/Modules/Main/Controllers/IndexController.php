<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;
use CodingEscapeRoom\Models\Session;

/**
 *
 * @see ControllerBase
 */
class IndexController extends ControllerBase
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

    }

    public function startAction() {
        $this->challengeKey = $this->generateCode();
        $session = new Session();
        $session->setSesKey($this->challengeKey);
        $session->setSesStart(date("Y-m-d H:i:s"));
        $session->setSesProgress(1);
        $session->create();
        $this->redirectProgress($session->getSesProgress());
    }

    public function generateCode(int $length = 64) : string {
        $characters = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

