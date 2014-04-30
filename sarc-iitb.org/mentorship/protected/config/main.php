<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
  'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'name'=>'ASMP - Alumni Student Mentorship Program',

  // preloading 'log' component
  'preload'=>array('log'),

  // autoloading model and component classes
  'import'=>array(
    'application.models.*',
    'application.components.*',
	'application.helpers.*',
  ),

  'modules'=>array(
    // uncomment the following to enable the Gii tool
    /*
    'gii'=>array(
      'class'=>'system.gii.GiiModule',
      'password'=>'s@rk!!tb',
       // If removed, Gii defaults to localhost only. Edit carefully to taste.
      'ipFilters'=>array('127.0.0.1','::1'),
    ),
    */
  ),

  // application components
  'components'=>array(
    'user'=>array(
      // enable cookie-based authentication
      'allowAutoLogin'=>true,
            'loginUrl'=>array('site/login'),
			),
      'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
        ),
    
    // uncomment the following to enable URLs in path-format
    
    'urlManager'=>array(
      'urlFormat'=>'path',
      'showScriptName'=>false,
            'urlSuffix'=>'.php',
      'rules'=>array(                
                'gii'=>'gii',
                'gii/<controller:\w+>'=>'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
                //'team/allot/<role:\w+>/<id:\d+>'=>'team/allot',
                'login'=>'site/login',
                'logout'=>'site/logout',
                'alumnus/mydetails'=>'alumnus/viewAllDetails',
				'alumnusregistration'=>'AlumnusRegistration',
				'studentregistration'=>'StudentRegistration',
				'studentregistration/<action:\w+>'=>'StudentRegistration/<action>',
                'registration/student/<action:\w+>'=>'StudentRegistration/<action>',
                'registration/alumnus/<action:\w+>'=>'AlumnusRegistration/<action>',
				'alumnusregistration/<action:\w+>'=>'AlumnusRegistration/<action>',
                'team/allot/<role:\w+>'=>'team/allot',
        '<controller:\w+>'=>'<controller>/index',
        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
      ),
    ),
        'authManager'=>array(
            'class'=>'CDbAuthManager',
            'defaultRoles'=>array('authenticated', 'guest'),
            'connectionID'=>'db',
        ),
    /*
    'db'=>array(
      'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    ),
    */
    // uncomment the following to use a MySQL database
    
    /*'db'=>array(
      'connectionString' => 'mysql:host=admin.sarc-iitb.org;dbname=sarc_cdb',
      'emulatePrepare' => true,
      'username' => 'sarciitborg',
      'password' => 'j@g@njyoti',
      'charset' => 'utf8',
      'enableParamLogging'=>true,
        'enableProfiling'=>true,
    ),*/
	
	'db'=>array(
      'connectionString' => 'mysql:host=localhost;dbname=sarc_asmp',
      'emulatePrepare' => true,
      'username' => 'root',
      'password' => 'root',
      'charset' => 'utf8',
      'enableParamLogging'=>true,
        'enableProfiling'=>true,
    ),
    
    'errorHandler'=>array(
      // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
    'log'=>array(
      'class'=>'CLogRouter',
      'routes'=>array(
        array(
          'class'=>'CFileLogRoute',
          'levels'=>'error, warning, trace',
        ),
        // uncomment the following to show log messages on web pages
        //
        array(
          'class'=>'CWebLogRoute',
        ),
        
        array( 
          'class'=>'CProfileLogRoute', 
          'report'=>'summary',
        ),
        //
      ),
    ),
  ),

  // application-level parameters that can be accessed
  // using Yii::app()->params['paramName']
  'params'=>array(
    // this is used in contact page
    'adminEmail'=>'sarc@iitb.ac.in',
  ),
  
		
		  
		  // uncomment the following to change the default controller, when no controller is specified.
		  
		  'defaultController' => 'site',
  
);
