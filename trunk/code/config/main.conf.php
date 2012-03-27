<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$commonConf =  require(dirname(__FILE__).'/common.conf.php');
$cfg = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'BaoKim\'s OTP Central',
	'defaultController'=>'home',

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

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<_c:\w+>/'=>'<_c>/',
				'<_c:\w+>/<_a:\w+>'=>'<_c>/<_a>',
				'<_m:\w+>/<_c:\w+>/<_a:\w+>'=>'<_m>/<_c>/<_a>',
			),
			'showScriptName'=>false,
		),

		'assetManager'	=>	array(
			'basePath'	=>	HOME_PATH . '/assets/',
			'baseUrl'	=>		'/assets/',
		),

		'authManager'=>array(
			'class'=>'CPhpAuthManager',
			'defaultRoles'=>array('owner'),
		),
		'cache'=>array(
			'class' => 'CFileCache',
			'class' => 'CDummyCache',
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);


$cfg = CMap::mergeArray(
		$commonConf,
		$cfg
	);

if (defined('YII_DEBUG') && YII_DEBUG)
	$cfg = CMap::mergeArray(
		$cfg,
		require(dirname(__FILE__).'/debug.conf.php')
	);
return $cfg;
