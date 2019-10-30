<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    array(
        "CodingEscapeRoom" => $config->application->appDir,
    )
)->registerDirs(
    array(
        $config->application->libraryDir,
        $config->application->messagesDir
    )
)->register();
