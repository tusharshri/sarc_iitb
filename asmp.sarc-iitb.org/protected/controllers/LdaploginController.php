<?php

class LdaploginController extends Controller
{
    public $layout='//layouts/column2';

        /**
         * @return array action filters
         */
        public function filters()
        {
            return array(
                'accessControl', // perform access control for CRUD operations
            );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules()
        {
            return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('login','index','view', 'create','register'),
                    'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('update'),
                    'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('admin','delete'),
                    'users'=>array('admin'),
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
        }

        /**
         * Displays a particular model.
         * @param integer $id the ID of the model to be displayed
         */

	public function actionLogin()
	{
       	$model=new Ldaplogin;
        //echo "sauara";
        $this->render('login', array(
        'model'=>$model,
));

	}
    public function actionIndex()
	{
        if(Yii::app()->user->isGuest){
            $error=false;
        if(isset($_GET['error'])){
            $error=$_GET['error'];
        }
        $model=new Ldaplogin;
       // echo "sauara";
        if(isset($_POST['Ldaplogin'])){
            //echo "aaaa";
            $model->attributes=$_POST['Ldaplogin'];
            if($model->validate()){
            //echo "******".$model->ldapverify($model->username, $model->password);

            if($model->ldapverify($model->username, $model->password)!="failed" && $model->ldapverify($model->username, $model->password)!="" ){
            $session=new CHttpSession;
            $session->open();
            $session['rollNumber']=$model->ldapverify($model->username, $model->password);		
            $user=new Login;
            if($user->exists('username="'.$model->username.'"')){
						
			$session['studentId']=Student::model()->findByAttributes(array('rollNumber'=>$session['rollNumber']))->id;
                    $loginform=new LoginForm;
                    $loginform->attributes=$model->attributes;
                  //print_r($loginform->attributes);
                  //echo "*****".$loginform->login()."%%%%%%";
                    if($loginform->login()==true){
                        $this->redirect("student/mentor");
                    }
                    else{
                      $this->redirect('ldaplogin');

                    }
                }else {
					 $this->redirect('ldaplogin?error=notfound');
				}

            $user->username=$model->username;
            $user->encrypted_password=md5($model->password);
            $user->lastLogin="2010-12-12";
            $user->status="disabled";
            $user->role="student";
              // print_r($user->attributes);

                if($user->save()){
                    $loginform=new LoginForm;
                    $loginform->attributes=$model->attributes;
                    //  print_r($loginform->attributes);
                  //  echo "*****".$loginform->login()."%%%%%%";
                    if($loginform->login()==true){
                        $this->redirect("student/home");
                    }
                    else{
                         $this->redirect('ldaplogin');


                    }
                }
                else  $this->redirect('ldaplogin');

            }
            else
              $this->redirect('ldaplogin?error=invalid');

        }

        }
        $this->render('index', array(
        'model'=>$model,
        'error'=>$error,
));

    }  else
        $this->redirect("student/create");
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
