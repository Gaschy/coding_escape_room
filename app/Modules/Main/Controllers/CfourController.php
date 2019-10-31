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
class CfourController extends ControllerBase
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
            if($session->getSesProgress() != 4) {
                $this->redirectProgress($session->getSesProgress());
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }

    public function completeAction() {
        /**
         * My solution:
         * f=i=>[1,2,3,4].map(v=>v*i.split('').reduce((s,c)=>s+c.charCodeAt(),0)%256)
         */
        $session = Session::findFirst([
            "conditions" => "Ses_Key = :key:",
            "bind" => ["key" => $this->challengeKey]
        ]);
        if($session !== false) {
            try {
                $phpexecjs = new PhpExecJs();
                $code = $this->request->getPost("code");
                if(substr($code, "-1") != ";") {
                    $code .= ";";
                }

                $testResult1 = $phpexecjs->evalJs($code . " f('www.codewars.com')");
                $testResult2 = $phpexecjs->evalJs($code . " f('www.starwiki.com')");
echo(strlen($code));
                if(strlen($code) > 77) {
                    $this->redirectError("cfour/index/challengeKey/" . $this->challengeKey, "More than 77 characters used.");
                } else if(
                    count($testResult1) === 4
                    && $testResult1[0] == 88
                    && $testResult1[1] == 176
                    && $testResult1[2] == 8
                    && $testResult1[3] == 96
                    && count($testResult2) === 4
                    && $testResult2[0] == 110
                    && $testResult2[1] == 220
                    && $testResult2[2] == 74
                    && $testResult2[3] == 184
                ) {
                    if($session->getSesProgress() < 5) {
                        $session->setSesProgress(5);
                        $session->save();
                    }
                    $this->redirectProgress($session->getSesProgress());
                } else {
                    $this->redirectError("cfour/index/challengeKey/" . $this->challengeKey, "Test cases failed");

                }
            } catch(\RuntimeException $e) {
                $this->redirectError("cfour/index/challengeKey/" . $this->challengeKey, "JS Syntax error" . $e->getMessage());
            }
        } else {
            $this->redirectError("index/index", "Invalid challenge key");
        }
    }
}

