<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as Flash;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

$di->setShared("config", $config);

$di->setShared('eventsManager', function () {
    $em = new EventsManager;
    $em->enablePriorities(true);
    return $em;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;

    return new $class($dbConfig);
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    $flash = new Flash(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
    $flash->setAutoescape(false);
    return $flash;
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($di) {
    $view = new View();

    $view->registerEngines(array(
        '.volt' => function ($view, $di) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $di->get("config")->application->cacheDir,
                'compiledSeparator' => '_',
                'compileAlways' => true
            ));

            $compiler = $volt->getCompiler();

            $compiler->addFunction('reset', function ($resolvedArgs, $exprArgs) use ($di, $compiler) {
                return 'reset(' . $resolvedArgs . ')';
            });
            $compiler->addFilter("round", "round");
            $compiler->addFunction('str_replace','str_replace');

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});

// Specify routes for modules
// More information how to set the router up https://docs.phalconphp.com/en/latest/reference/routing.html
$di->set(
    "router",
    function () {
        $router = new Router();

        $router->setDefaultModule("main");

        $modules = [
            "main"
        ];

        foreach($modules as $module){
            $router->add(
                "/modules/".$module,
                [
                    "module"     => $module,
                    "controller" => "index",
                    "action"     => "index",
                ]
            );
            $router->add(
                "/modules/".$module."/:controller",
                [
                    "module"     => $module,
                    "controller" => 1,
                    "action"     => "index",
                ]
            );
            $router->add(
                "/modules/".$module."/:controller/:action",
                [
                    "module"     => $module,
                    "controller" => 1,
                    "action"     => 2,
                ]
            );
            $router->add(
                "/modules/".$module."/:controller/:action/:params",
                [
                    "module"     => $module,
                    "controller" => 1,
                    "action"     => 2,
                    "params"     => 3,
                ]
            );
        }
        return $router;
    }
);

// Register the installed modules
$application->registerModules(
    [
        "main" => [
            "className" => "CodingEscapeRoom\\Modules\\Main\\Module",
            "path"      => $config->application->moduleDir."Main/Module.php"
        ]
    ]
);

if(!$config->application->production) {
    $debug = new \Phalcon\Debug();
    $debug->listen();
}
