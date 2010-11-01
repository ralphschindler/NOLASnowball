<?php
chdir(dirname(__FILE__));
define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

define('APPLICATION_ENV', 'development');

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';  

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV, 
    APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap('Doctrine');

$config = array(
    'data_fixtures_path'  =>  '../tests/fixtures',
    'models_path'         =>  '../application/models',
    'migrations_path'     =>  'migrations',
    'yaml_schema_path'    =>  'schemas'
    );

$cli = new Doctrine_Cli($config);
$cli->run($_SERVER['argv']);
?>