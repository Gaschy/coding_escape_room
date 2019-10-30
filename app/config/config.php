<?php

defined('APP_PATH') || define('APP_PATH', realpath('..'));

/**
 * Composer autoload
 */
require_once (__DIR__ . '/../../vendor/autoload.php');

/**
 * Environment variables
 */
$dotenv = new Dotenv\Dotenv(__DIR__ . "/../../" );
$dotenv->load();

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'     => getenv('DATABASE_HOST'),
        'username' => getenv('DATABASE_USER'),
        'password' => getenv('DATABASE_PASS'),
        'dbname'   => getenv('DATABASE_NAME'),
        'charset'     => 'utf8'
    ),
    'application' => array(
        'baseUri'        => getenv('BASE_URI'),
        'appDir' => APP_PATH . '/app/',
        'moduleDir' => APP_PATH . '/app/Modules/',
        'cacheDir'       => APP_PATH . '/app/cache/',
        'modelsDir'      => APP_PATH . '/Models/',
        'repositoryDir'      => APP_PATH . '/app/Repositories/',
        'libraryDir'     => APP_PATH . '/app/Library/',
        'entitiesDir'    => APP_PATH . '/app/Entities/',
        'messagesDir'    => APP_PATH . '/app/Messages/',
        'enumDir'    => APP_PATH . '/app/Enum/',
        'uploadDir'      => APP_PATH . '/upload/',
        'publicDir'      => APP_PATH . '/public/',
        'migrationsDir'  => APP_PATH . '/Migrations/',
        'production'     => getenv('PRODUCTION'),
    )
));
