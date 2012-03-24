<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */


 // remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
define('HOME_PATH', dirname(__FILE__));

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/../code/config/main.conf.php';

//define('HOME_PATH', dirname(__FILE__));

require_once($yii);

Yii::createWebApplication($config)->run();
