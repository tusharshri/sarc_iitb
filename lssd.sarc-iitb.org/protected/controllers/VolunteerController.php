<?php

class VolunteerController extends Controller
{
	public $layout='column1';

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
				//$this->redirect(Yii::app()->homeUrl.'/data/searchbox/');
	    	else
	        	$this->render('error', $error);
				//$this->redirect(Yii::app()->homeUrl.'/data/searchbox/');
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionIndex($id=0)
	{
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl.'/site/login');

			$criteria = new CDbCriteria();
			
			if(isset($_GET['q']))
    		{

		      $q = $_GET['q'];
		      $criteria->compare('name', $q, true, 'OR');
			}
			  $dataProvider=new CActiveDataProvider("Volunteer", array('criteria'=>$criteria,'pagination' => array(
                    'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 30,), ));
		    
				
		    $this->render('index', array(
        		'dataProvider' => $dataProvider,
		    ));
	
	
	}
	
	public function getData($refresh=false) 
	{ 
    if($this->_data===null || $refresh) 
        $this->_data=$this->fetchData(); 
    return $this->_data; 
	}
	
	public function getArray(){
	
		//$model12=Alumnus::model()->findAll();
		$trips = Alumnus::model()->findAll();
		$arr = array();
		foreach($trips as $t)
		{
			$arr[$t->id] = $t->attributes;
		}
		return $arr;
		
	}
	
}