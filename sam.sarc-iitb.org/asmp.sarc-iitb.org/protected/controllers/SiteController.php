<?php

class SiteController extends Controller
{

    //public $defaultAction = 'login';
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		//$this->redirect('ldaplogin');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	public function actionFaq()
	{
		//$this->redirect('ldaplogin');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('faq');
	}
	
public function actionmentor()
	{
		//$this->redirect('ldaplogin');
		// renders the view file 'protected/views/site/mentor.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('mentor');
	}

public function actionmentee()
	{
		//$this->redirect('ldaplogin');
		// renders the view file 'protected/views/site/mentor.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('mentee');
	}
	public function actionContactus()
	{
		//$this->redirect('ldaplogin');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('contactus');
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
	    	else
	        	$this->render('error', $error);
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
        if(!Yii::app()->user->isGuest) $this->redirect(Yii::app()->user->returnUrl);
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
            
            if($model->validate() && $model->login()){
                $role=$_POST['LoginForm']['role'];
                if($role=="alumnus"){
                    if(strpos(Yii::app()->user->returnUrl,'/main.php')){
                        $this->redirect(array('alumnus/home'));
                    }else{
                        $this->redirect(Yii::app()->user->returnUrl);
                    }
                    
                }else if($role=="student"){
                    //$this->redirect(Yii::app()->user->returnUrl);
                    $this->redirect(array("student/home"));
                }else{
                    $this->render('login',array('model'=>$model));
                }
            }
			else{
				//echo 'something is wrong with validation';
				//if(	!$model->login()) echo 'something is wrong with login';
				//if(	!$model->validate()) echo 'something is wrong with validation';
				$model->login();
				$model->validate();
			}
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
		$this->render('thankyou');
	}

   public function actionRegister(){

       $model = new Login;
        if(isset($_POST['register-form'])){
            $model->attributes=$_POST['register-Form'];

            $this->redirect(Yii::app()->homeUrl);

        }
    }
}
