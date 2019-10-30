<?php
namespace CodingEscapeRoom\Modules\Main;

use CodingEscapeRoom\Library\Plugins\NotFoundPlugin;
use CodingEscapeRoom\Library\Plugins\PrepareDispatchParamsPlugin;
use CodingEscapeRoom\Modules\Main\Security\SecurityPlugin;
use Phalcon\Loader;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;


class Module implements ModuleDefinitionInterface
{
    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(
            [

            ]
        );

        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices(DiInterface $di)
    {
        $di->set('dispatcher', function () use ($di) {

            $eventsManager = $di->getShared("eventsManager");
            $eventsManager->attach('dispatch:beforeDispatch', new SecurityPlugin());
            $eventsManager->attach('dispatch:beforeException', new NotFoundPlugin());
            $eventsManager->attach('dispatch:beforeDispatchLoop', new PrepareDispatchParamsPlugin());

            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace("CodingEscapeRoom\\Modules\\Main\\Controllers");
            $dispatcher->setEventsManager($eventsManager);

            return $dispatcher;
        });

        $di->get("view")->setViewsDir($di->get("config")->application->moduleDir . "Main/views");
    }
}
