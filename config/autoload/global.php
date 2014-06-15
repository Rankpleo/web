<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
define('DB_NAME', $_ENV['OPENSHIFT_APP_NAME']);
 
/** MySQL database username */
define('DB_USER', $_ENV['OPENSHIFT_MYSQL_DB_USERNAME']);
 
/** MySQL database password */
define('DB_PASSWORD', $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']);
 
/** MySQL hostname */
define('DB_HOST', $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT']);



return array(
    'db' => array(
		'driver' => 'Pdo',
		'dsn' => 'mysql:dbname='.DB_NAME.';'.DB_HOST,
		'username' => DB_USER,
		'passoword' => DB_PASSWORD,		
		'driver_options' => array(
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
		),
	),
	'service_manager' => array(
		'factories' => array(
			'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
		),
	),
);
