<?php

//include __DIR__ . '/../vendor/autoload.php';

use Phalcon\Di\FactoryDefault\Cli as CliDI,
    Phalcon\Cli\Console as ConsoleApp;

define('VERSION', '1.0.0');

// Using the CLI factory default services container
$di = new CliDI();

// Define path to application directory
defined('APPLICATION_PATH')|| define('APPLICATION_PATH', realpath(dirname(__FILE__)));

define('LOGS_PATH', realpath('../logs/'));

use Phalcon\Loader;

/**
 * Register the autoloader and tell it to register the tasks directory
 */
$loader = new \Phalcon\Loader();
$loader->registerDirs(
    array(
        APPLICATION_PATH . '/tasks',
        APPLICATION_PATH . '/models',
        APPLICATION_PATH . '/helpers'
    )
);

$loader->registerNamespaces(array(
    'Batchprocessor\Models'      => APPLICATION_PATH . "/models",
	'Library' => APPLICATION_PATH . "/library",
    'Helpers' => APPLICATION_PATH . "/helpers",

));

$loader->register();

/**
 * Load our config
 */
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// Create a console application
$console = new ConsoleApp();
$console->setDI($di);

/**
 * Process the console arguments
 */
$arguments = array();
foreach ($argv as $k => $arg) {
    if ($k == 1) {
        $arguments['task'] = $arg;
    } elseif ($k >= 2) {
        $arguments['params'][] = $arg;
    }
}

// Define global constants for the current task and action
define('CURRENT_TASK',   (isset($argv[1]) ? $argv[1] : null));
define('CURRENT_ACTION', 'index');


$arguments['action'] = CURRENT_ACTION;

try {
    // Handle incoming arguments
    $console->handle($arguments);
} catch (\Phalcon\Exception $e) {
    echo $e->getMessage();
    exit(255);
}