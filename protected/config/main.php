<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'pSMS',
	'theme'=>'bootstrap',	

	// preloading 'log' component
	'preload'=>array('log','bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.reports.*',
		'bootstrap.widgets.*',
	),

	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),				
		),	
	),
	
	//'timeZone'=>'Asia/Jakarta',
	'sourceLanguage'=>'id_id',
	
	// application components
	'components'=>array(
		'cache'=>array(
			'class'=>'system.caching.CFileCache',
		),		
		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
		),		
		'user'=>array(
			'class'=>'application.components.WebUser',
			'allowAutoLogin'=>true,
		),

		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/smsdb.db',
		),
		*/
		
		// uncomment the following to use a MySQL database	
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=patikaladb',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),		
			
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
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