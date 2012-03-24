<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$cfg = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Tro giup',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('/user/signIn'),
		),

		'httpUser'=>array(
			'class'=>'ext.common.HttpAuth.HttpUserComponent',
		),

		'authManager'=>array(
			'class'=>'CPhpAuthManager',
			'defaultRoles'=>array('owner'),
		),


		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=support',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				/*array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),*/
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);

if (defined('YII_DEBUG') && YII_DEBUG)
	$cfg = CMap::mergeArray(
		$cfg,
		require(dirname(__FILE__).'/debug.conf.php')
	);

return $cfg;
