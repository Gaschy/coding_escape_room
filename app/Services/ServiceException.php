<?php
namespace CodingEscapeRoom\Services;

use Exception;

class ServiceException extends \Exception {

    /**
     * Konstruktor für Service Exceptions
     *
     * Eine Exception Message muss angegeben werden. Die anderen Parameter sind optional.
     *
     * @param string $message Exception Message
     * @param int $code Optional Code
     * @param Exception|null $previous
     */
    public function __construct($message, $code = 0, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
    }
}
