<?php
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 */
function user() 
{
    return Yii::app()->getUser();
}
 
/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function createUrl($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}
 
/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = 'stay', $params = array(), $source = null, $language = null) 
{
    return Yii::t($category, $message, $params, $source, $language);
}
 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function baseUrl($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}
 
/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}

function session($key = null, $value = null)
{
  if (!empty ($key) && !empty ($value))
  {
    return Yii::app()->session[$key] = $value;
  }
  elseif (!empty ($key))
  {
    return Yii::app()->session[$key];
  }
  else
  {
    return Yii::app()->session;
  }
}
 
function getSessionArray()
{
  return session()->toArray();
}
 
function getSessionId()
{
  return session()->sessionID;
}
 
function regenerateSessionId()
{
  return session()->regenerateId();
}
 
function printSession()
{
	echo '<pre>';
	foreach (getSessArr() as $key => $value)
	{
	echo '  '.$key .' -> '.$value.'<br/>';
	}
	echo '</pre>';
}
 
function removeSession($key)
{
  return session()->remove($key);
}
 
function destroySession()
{
  return session()->destroy();
}

function dump($target)
{
  return CVarDumper::dump($target, 10, true) ;
}

function controller(){
    return Yii::app()->controller->id;
}

function action(){
    return Yii::app()->controller->action->id;
}

?>
