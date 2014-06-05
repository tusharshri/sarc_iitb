<?php

class StudentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','sop', 'view', 'create','register','update', 'create', 'sop','sopUpdate','preference',  'view','done','sam', 'submitPreference','thankyou'),
				'users'=>array('*'),
			),

			 */
			array('allow',  // allow all users to perform MentorList action
				'actions'=>array('mentorList'),
				'users'=>array('*'),
			),
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','mentor','preference'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{         if($id!=Yii::app()->user->id){
               throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->redirect('mentor');
/*
        $id = Yii::app()->user->id;
        $model=new Student;


        if(Student::model()->count('id='.$id)=='0'){


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
            $login=Login::model()->findByPk($id);
			$model->attributes=$_POST['Student'];
            $session=new CHttpSession;
            $session->open();
            $model->rollNumber=$session['rollNumber'];
            $model->step='2';
			$model->ldapId=$login->username;
            $model->id=$id;
            if($model->save()) {
                $this->redirect('sop');
            }
            }




		$this->render('create',array(
			'model'=>$model,
		));

	}

        else{
            $this->redirect('update/'.$model->find('id='.$id)->id);

        }

*/

    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */

	public function actionUpdate($id)
	{
        if($id!=Yii::app()->user->id){
               throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
            if($model->save())
				$this->redirect(array('sop/'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Student');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Student('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Student']))
			$model->attributes=$_GET['Student'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Student::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function loadSopModel($id)
	{
		$model=Sop::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function loadModelStudentPreference($id)
	{
		$model=StudentMentorshipPreference::model()->find('studentid='.$id.' AND preferenceIndex=1');
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='student-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actionRegister()
	{
		$model=new Student;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Student']))
		{
			$model->attributes=$_POST['Student'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}
    public function actionSop(){
        $id = Yii::app()->user->id;
        $mstudent=Student::model()->find('id='.$id);
        if($mstudent->step ==2){
        $model=new Sop;
        if(isset($_POST['Sop'])){

           $model->attributes=$_POST['Sop'];
            //echo CActiveForm::validate($model);
            $mstudent->sop=$_POST['Sop']['sop'];
            $mstudent->step='3';
            //echo "llllll".$sop->sop."vvvv";
            $valid=$model->validate();
           // print_r($model->errors);
            if($valid){
                $mstudent->save();
                $model->resume=CUploadedFile::getInstance($model,'resume');
                //$model->save();
                //echo $model->resume->extensionName;
                //echo "%%%%%".$model->resume->tempName."%%%%";
                if($model->resume->saveAs(Yii::app()->basePath . '/../resume/' . $mstudent->rollNumber.".".$model->resume->extensionName)){
                    //echo "<a href='".Yii::app()->basePath ."/../images/". $model->resume."'>A</a>";
                    //  $model->resume->getError();

                    $this->redirect(array('StudentMentorshipPreference/create'));
                }
            }
        }
        $this->render('sop',array(
			'model'=>$model,
		));

        }
        else if($mstudent->step >2)$this->redirect('SopUpdate/'.$id);
        else{
                $this->redirect('create');
            }


    }
    public function actionSopUpdate($id){
         if($id!=Yii::app()->user->id){
               throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
        }
		$model=$this->loadSopModel($id);
        $mstudent=Student::model()->find('id='.$id);
        if($mstudent->step >=2){
        if(isset($_POST['Sop'])){
           $model->attributes=$_POST['Sop'];
            //echo CActiveForm::validate($model);
            $mstudent->sop=$_POST['Sop']['sop'];
            $mstudent->sop=$_POST['Sop']['sop'];
            //echo "llllll".$sop->sop."vvvv";
            $valid=$model->validate();
           // print_r($model->errors);
            if($valid){
                $mstudent->save();
                $model->resume=CUploadedFile::getInstance($model,'resume');
                //$model->save();
                //echo $model->resume->extensionName;
                //echo "%%%%%".$model->resume->tempName."%%%%";
                if($model->resume->saveAs(Yii::app()->basePath . '/../resume/' . $mstudent->rollNumber.".".$model->resume->extensionName)){
                    //echo "<a href='".Yii::app()->basePath ."/../images/". $model->resume."'>A</a>";
                    //  $model->resume->getError();

                    $this->redirect(array('StudentMentorshipPreference/create'));
                }
            }
        }
        $this->render('sop',array(
			'model'=>$model,
		));

        }
        else{
                $this->redirect('create');
            }


    }
    public function actionPreference(){

        $login=Student::model()->find('id='.Yii::app()->user->id);

         if($login->step ==5){
        $model=new StudentPreferenceList;
        //$models=new StudentMentorshipPreference;
        $repeat=$this->loadModelStudentPreference(Yii::app()->user->id);
        if(isset($_POST['StudentMentorshipPreference']))
        {
            $repeat->studentId=Yii::app()->user->id;
            $repeat->preferenceIndex='1';
            $repeat->preference=$_POST['StudentMentorshipPreference']['preference'];
            $repeat->areaOfInterest=$_POST['StudentMentorshipPreference']['areaOfInterest'];
            $repeat->preferredDepartmentCode=$_POST['StudentMentorshipPreference']['preferredDepartmentCode'];
            $valids =$repeat->validate();
            if($valids){
                echo "true";

            //print_r($model->attributes);
            $repeat->save();
            $this->redirect('preference');

            }
        }

        $preferenceList=StudentMentorshipPreference::model()->findAll('studentId='.Yii::app()->user->id);
        $alumniList= Alumnus::model()->with('profDetails')->findAll('prefLocked=2');
        $alumniProfList= AlumnusProfDetail::model()->findAll();
        $finalList=$alumniList;
        $dp2="aaaa"; $dp3="aaaa";$ap2="bbbb"; $ap3="bbbb";
        foreach($preferenceList as $preference){
            if($preference->preferenceIndex=='1'){
                $dp1=$preference->preferredDepartmentCode;
                $ap1=$preference->areaOfInterest;
            }
            if($preference->preferenceIndex=='2'){
                $dp2=$preference->preferredDepartmentCode;
                $ap2=$preference->areaOfInterest;
            }
             if($preference->preferenceIndex=='3'){
                $dp3=$preference->preferredDepartmentCode;
                $ap3=$preference->areaOfInterest;
            }
        }
        $alumniWeight=array();
        $d1=30;$d2=20;$d3=10;$a1=100;$a2=50;$a3=25;
        foreach($alumniList as $alumnus){
            $alumniPref=($alumnus->mentorshipPreferences);
            $alumniPref=$alumniPref[0];
            $weight=1;
            if($alumniPref->preferredDepartmentCode==$dp1){
                $weight=$weight+$d1;
            }
            else if($alumniPref->preferredDepartmentCode==$dp2){
                $weight=$weight+$d2;
            }
            else if($alumniPref->preferredDepartmentCode==$dp3){
                $weight=$weight+$d3;
            }
            if($alumniPref->areaOfInterest==$ap1){
                $weight=$weight+$a1;
            }
            else if($alumniPref->areaOfInterest==$ap2){
                $weight=$weight+$a2;
            }
            else if($alumniPref->areaOfInterest==$ap3){
                $weight=$weight+$a3;
            }
            $alumniWeight[$alumnus->id]=$weight;
            $finalList[$alumnus->id]=$alumnus;
            $alumniProfList[$alumnus->id]=$alumnus;

        }
        function shuffle_assoc($list) {
              if (!is_array($list))
                  return $list;
              $keys = array_keys($list);
              shuffle($keys);
              $random = array();
              foreach ($keys as $key) {
                $random[$key] = $list[$key];
              }
              return $random;
            }
        $alumniWeight= shuffle_assoc($alumniWeight);
        arsort($alumniWeight);
        $this->render('preference', array(
            'model' =>$model,
            'models' =>$repeat,
            'alumni' =>$alumniWeight,
            'finalList' =>$finalList,
        ));
    }
        else if($login->step <5) $this->redirect('sam');
        $this->redirect(array('site/logout'));
    }


    public function actionMentorList(){	
        $alumniList= Alumnus::model()->with(array('profDetails','profDetails.industry'))->findAll(array('order'=>'departmentCode'));
        $alumniProfList= AlumnusProfDetail::model()->findAll();
        $finalList=$alumniList;
        $alumniWeight=array();	
        foreach($alumniList as $alumnus){
			$alumniWeight[$alumnus->id]=1;
		    $finalList[$alumnus->id]=$alumnus;
		    $alumniProfList[$alumnus->id]=$alumnus;
		}
        $this->render('mentorList', array(
			'alumni' =>$alumniWeight,
            'finalList' =>$finalList,
        ));
    }

    public function actionSubmitPreference(){
        $model = new StudentPreferenceList;
        $login=Student::model()->find('id='.Yii::app()->user->id);
        if($login->step ==5){
        if(isset($_POST['mentorPreference'])){

            //echo "submitted";
            $array=$_POST['mentorPreference'];
            $array=explode ( ",", $array);
            //print_r($array);
            for($i=1; $i<=count($array); $i++){

                $model = new StudentPreferenceList;
                $model->preferenceIndex=$i;
                $model->studentId=Yii::app()->user->id;
                $model->alumnusId=$array[$i-1];
                $alumnuscount=$model->count('alumnusId='.$model->alumnusId);
               // echo $alumnuscount."   ";
                if($alumnuscount>=13){
                     $alumModel=new Alumnus;
                    //echo "cccc";
                    $alumnus=$alumModel->find('id='.$model->alumnusId);
                    $alumnus->prefLocked=1;
                    $alumnus->save() ;
                     //   echo "success";
                   // else print_r($alumnus->errors);

                }
                $model->save();
                $login->step=6;
                $login->save();

              //  print_r($model->errors);
            }

        }

        $this->redirect(array('site/logout'));
    }
    else if($login->step ==6) $this->render('done');
    else $this->redirect("sam");
    }


    public function actionSam(){

        $id = Yii::app()->user->id;
        $login=Student::model()->find('id='.$id);
        if($login->step <4){
            $this->redirect(array('StudentMentorshipPreference/create'));
        }
        else if($login->step>=5){
          $this->redirect('Preference');
        }
        if(isset($_POST['understand'])){
            $login->step='5';
            $login->save();
            $this->redirect('Preference');

        }

        $this->render('sam');
    }
    public function actionDone(){
        $this->render('done');
    }

    public function actionThankyou(){
        $this->render('thankyou');

    }


        public function actionMentor(){
            $studentId=Yii::app()->session['studentId'];
            //echo $studentId;
            $mStudent=Student::model()->findByAttributes(array('id'=>$studentId));
            //print_r($mStudent);
            if($mMentor=MentorshipConnection::model()->with(array('alumnus','alumnus.personalDetails','alumnus.department','alumnus.emailIds','alumnus.phoneNumbers','alumnus.profDetails'))->findByAttributes(array('studentId'=>$studentId))){
                $this->render('mentor',array(
                    'mStudent'=>$mStudent,
                    'mAlumnus'=>$mMentor->alumnus
                ));
            }
            else{
                //throw new CHttpException(400,'Invalid request. Please try to use the original link.');
                $this->render('mentor',array(
                    'mStudent'=>$mStudent,
                    'mAlumnus'=>NULL
                ));
            }
        }

}
