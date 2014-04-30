<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
  'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'name'=>'Common Database',

  // preloading 'log' component
  'preload'=>array('log'),

  // autoloading model and component classes
  'import'=>array(
    'application.models.*',
    'application.components.*',
  ),

  'defaultController'=>'data/',

  // application components
  'components'=>array(
    'user'=>array(
      // enable cookie-based authentication
      'allowAutoLogin'=>true,
    ),
    /*'db'=>array(
      'connectionString' => 'sqlite:protected/data/blog.db',
      'tablePrefix' => '',
    ),*/
    // uncomment the following to use a MySQL database
    
    /*'db'=>array(
      'connectionString' => 'mysql:host=localhost;dbname=sarc_cdb',
      'emulatePrepare' => true,
      'username' => 'root',
      'password' => 'root',
      'charset' => 'utf8',
      'tablePrefix' => '',
  ),*/
    
    'db'=>array(
      'connectionString' => 'mysql:host=admin.sarc-iitb.org;dbname=sarc_centeral',
      'emulatePrepare' => true,
      'username' => 'sarciitborg',
      'password' => 'j@g@njyoti',
      'charset' => 'utf8',
      'tablePrefix' => '',
    ),
    
    'errorHandler'=>array(
      // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
            'index.php'=>'data/',
        'post/<id:\d+>/<title:.*?>'=>'post/view',
            'posts/<tag:.*?>'=>'post/index',
            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
      'showScriptName'=>false,
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
  'params'=>require(dirname(__FILE__).'/params.php'),
  
);