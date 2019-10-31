<?php
namespace CodingEscapeRoom\Modules\Main\Controllers;

use CodingEscapeRoom\Library\ControllerBase;
use CodingEscapeRoom\Models\Session;
use CodingEscapeRoom\Models\User;
use Nacmartin\PhpExecJs\PhpExecJs;

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
        /**
         * My Solution
         *
            function addLetters(...letters) {
                if(letters.length === 0) {
                    return 'z';
                }
                let sum = 0;
                letters.forEach((l) => {
                    sum += l.charCodeAt(0) - 96;
                });
                return String.fromCharCode((sum - 1) % 26 + 97);
            }
         */

        $session = Session::findFirst([
            "conditions" => "Ses_Key = :key:",
            "bind" => ["key" => $this->challengeKey]
        ]);
        if($session !== false) {
            try {
                $phpexecjs = new PhpExecJs();
                if(
                    $phpexecjs->evalJs($this->request->getPost("code") . " addLetters('a', 'b', 'c');") == "f"
                    && $phpexecjs->evalJs($this->request->getPost("code") . "addLetters('a', 'b');") == "c"
                    && $phpexecjs->evalJs($this->request->getPost("code") . " addLetters('z');") == "z"
                    && $phpexecjs->evalJs($this->request->getPost("code") . " addLetters('z', 'a');") == "a"
                    && $phpexecjs->evalJs($this->request->getPost("code") . " addLetters('y', 'c', 'b');") == "d"
                    && $phpexecjs->evalJs($this->request->getPost("code") . " addLetters();") == "z"
                ) {
                    if($session->getSesProgress() < 4) {
                        $session->setSesProgress(4);
                        $session->save();
                    }
                    $this->redirectProgress($session->getSesProgress());
                } else {
                    $this->redirectError("cthree/index/challengeKey/" . $this->challengeKey, "Test cases failed.");
                }
            } catch(\RuntimeException $e) {
                $this->redirectError("cthree/index/challengeKey/" . $this->challengeKey, "JS Syntax error");
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }
}

