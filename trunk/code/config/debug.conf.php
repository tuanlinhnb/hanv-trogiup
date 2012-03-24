<?php
return array(
	'components'=>array(
		'db'=>array(
			'enableProfiling'	=>	true,
			'enableParamLogging'=>	true,
		),
		'log'=>array(
			'routes'=>array(
				/*1000=>array(
					'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
					'ipFilters'=>array('*.*.*.*'),
				),*/
			),
		),
	),
	'modules'	=>	array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
);
