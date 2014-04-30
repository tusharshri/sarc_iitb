<?php

class PhonathonController extends Controller
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


	public function actionIndex(){
	
		$this->render('index');
			
	}
	
	public function actionDetails($id=0,$phase=0)
	{
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl.'/site/login');
		
		if($id==0 || $phase==0) throw new CHttpException(400,'Try valid link');
		
		$model=Alumnus::model()->findBypk($id);
		//$model1=Phonathon_calldetail::model()->findByAttributes(array('alumnusId'=>$id,'phaseYear'=>$phase));
		//$model2=Phonathon_calllog::model()->findByAttributes(array('alumnusId'=>$id,'phaseYear'=>$phase));
		$model1=Alumnus_contacted::model()->findByAttributes(array('alumnusId'=>$id,'phaseYear'=>$phase,'contacted_for'=>'1'));
		$model2=Alumnus_mailed::model()->findByAttributes(array('alumnusId'=>$id,'phaseYear'=>$phase,'mailed_for'=>'1'));
		$model3=Alumnus_agendaconfirmation::model()->findAllByAttributes(array('alumnusId'=>$id,'phaseYear'=>$phase,'contacted_for'=>'1'));
		
		if($model1==NULL && $model2==NULL && $model3==NULL){
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}else{
		
		$this->render('detail',array('model'=>$model,'contacted'=> $model1,'mailed'=>$model2,'agenda'=>$model3 ));		
		}
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