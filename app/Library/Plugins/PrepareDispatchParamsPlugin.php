<?php
namespace CodingEscapeRoom\Library\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Dispatcher;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;

/**
 * PrepareParamsPlugin
 *
 * Sets the params as key => value pairs
 */
class PrepareDispatchParamsPlugin extends Plugin
{

	/**
	 * Diese Methode wird vor jeder Action ausgefüht
	 *
     *
	 * @param Event $event
	 * @param Dispatcher $dispatcher
	 */
	public function beforeDispatchLoop(Event $event, MvcDispatcher $dispatcher)
	{
	    //Phalon verarbeitet "application/json" Post data nicht, deswegen werden json Daten falls vorhanden an $_POST angehängt
	    $request = $dispatcher->getDI()->get("request");
	    if($request->isPost() && strpos($request->getContentType(), 'application/json') !== false) {
	        $json_body = $request->getJsonRawBody();
	        foreach($json_body as $key => $value) {
                $_POST[$key] = $value;
            }
        }

	    //GET Parameter in der form BASE_URL/key1/value1/key2/value2... einlesen
        $params = $dispatcher->getParams();
        $keyParams = [];
        // Use odd parameters as keys and even as values
        foreach ($params as $i => $value) {
            if ($i & 1) {
                // Previous param
                $key = $params[$i - 1];

                $keyParams[$key] = $value;
            }
        }
        // Override parameters
        $dispatcher->setParams($keyParams);
	}


}
