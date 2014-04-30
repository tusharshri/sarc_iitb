<?php

class AlumnusController extends Controller
{
  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout='//layouts/column2';

  private $_mEmailIds;

  /**
   * @return array action filters
   */
/*
  public function filters()
  {
    return array(
      'accessControl', // perform access control for CRUD operations
    );
  }
*/
  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules()
  {
    return array(
      array(
        'allow',
        'actions'=>array('preference','login','submitPreference','mentees','mentorprofile','profile','complaint','sendmessage'),
        'users'=>array('*'),
      ),
            array(
                'allow',
                'actions'=>array('updateBasic','updatePersonal','updateProf','updateEmail','addPhoneNumber','addEmailId','viewAllDetails','messagedetails','editprofile'),
                //'roles'=>array('admin','alumnus'),
                'users'=>array('@'),
            ),
      array(
        'deny',
        'users'=>array('*'),
      ),
      /*      
      array('allow',  // allow all users to perform 'index' and 'view' actions
        'actions'=>array('index','view','register'),
        'users'=>array('*'),
      ),
      array('allow', // allow authenticated user to perform 'create' and 'update' actions
        'actions'=>array('create','update'),
        'users'=>array('@'),
      ),
      array('allow', // allow admin user to perform 'admin' and 'delete' actions
       'actions'=>array('admin','delete'),
        'users'=>array('admin'),
      ),
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
      */
    );
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
/*
  public function actionView($id)
  {
    $this->render('view',array(
      'model'=>$this->loadModel($id),
    ));
  }
*/
  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
/*
  public function actionCreate()
  {
    $model=new Alumnus;

    // Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation($model);

    if(isset($_POST['Alumnus']))
    {
      $model->attributes=$_POST['Alumnus'];
      $model->createdAt=new CDbExpression('NOW()');
      if($model->save())
        $this->redirect(array('view','id'=>$model->id));
    }

    $this->render('create',array(
      'model'=>$model,
    ));
  }
*/
  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  /*
  public function actionUpdate($id)
  {
    $model=$this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation($model);

    if(isset($_POST['Alumnus']))
    {
      $model->attributes=$_POST['Alumnus'];
      if($model->save())
        $this->redirect(array('view','id'=>$model->id));
    }

    $this->render('update',array(
      'model'=>$model,
    ));
  }
  */
/*
  public function actionUpdate($id)
  {
        if(Yii::app()->user->role!='admin' &&  Yii::app()->user->role=='alumnus' &&  $id!=Yii::app()->user->id){
            throw new CHttpException(403,'You are not authorized to perform this action.');
        }

    $mAlumnus=$this->loadModel($id);
    $mEmailId=$this->loadEmailIds($mAlumnus);

    // Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation(array($mAlumnus,$mEmailId));

    if(isset($_POST['Alumnus'],
        $_POST['AlumnusEmailId']
      ))
    {
      $mAlumnus->attributes=$_POST['Alumnus'];
      $valid = $mAlumnus->validate();
            if($mAlumnus->save() && $valid){
          $i=0;
          $emailId = new AlumnusEmailId;
          foreach($_POST['AlumnusEmailId'] as $pEmail){
            if(isset($mEmailId[$i]))
              $email=$mEmailId[$i];
            if(isset($pEmail['id']) && substr($pEmail['id'],0,3)!='new'){ // Check if the entry is new one
              $email1=AlumnusEmailId::model()->findByPk( $pEmail['id'] );
              if(!($email==$email1)){
                $valid=false;
                echo("Something Went wrong!<br/>");
              }
            }else{
              $email = new AlumnusEmailId;
                $email->attributes = $pEmail;
                        $email->alumnusId = $mAlumnus->id;         
                        $email->updatedAt= new CDbExpression('NOW()');
                if($email->emailId!=''){
                            if(!$email->validate()){
                                print_r($email);die; // NOT WORKING
                      $valid=false;
                                Yii::app()->user->setFlash('error', "Data saving failed!");
                                $this->redirect(array('update','id'=>$mAlumnus->id));
                            }
                }else{                            
                $email->save();                        
                        }
                    }
            $i++;
          }                
                Yii::app()->user->setFlash('success', "Data saved!");
        $this->redirect(array('view','id'=>$mAlumnus->id));
            }else{
                Yii::app()->user->setFlash('error', "Data saving failed!");
                $this->redirect(array('update','id'=>$mAlumnus->id));
            }
    }else{
        $this->render('update',array(
          'mAlumnus'=>$mAlumnus,
          'mEmailId'=>$mEmailId,
        ));
        }
  }
*/  

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
/*
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
*/

  /**
   * Lists all models.
   */
/*
  public function actionIndex()
  {
    $dataProvider=new CActiveDataProvider('Alumnus');
    $this->render('index',array(
      'dataProvider'=>$dataProvider,
    ));
  }
*/
  /**
   * Manages all models.
   */
/*
  public function actionAdmin()
  {
    $model=new Alumnus('search');
    $model->unsetAttributes();  // clear any default values
    if(isset($_GET['Alumnus']))
      $model->attributes=$_GET['Alumnus'];

    $this->render('admin',array(
      'model'=>$model,
    ));
  }
*/
  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer the ID of the model to be loaded
   */
  public function loadModel($id)
  {
    $model=Alumnus::model()->findByPk($id);
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }


  /**
   * uses the lazy loading approach to get the many relationship model record into display
   * This is being done this way to improve the efficiency and reduce the number of SQL query being called by using the eager loading approach. 
   */
  public function loadEmailIds($model)
  {
    if($this->_mEmailIds===null)
    {
      if(isset($_GET['id']))
        $this->_mEmailIds=$model->emailIds;
      if($this->_mEmailIds===null)
        throw new CHttpException(404,'The requested page does not exist.');
    }
    return $this->_mEmailIds;
  }


  /**
   * Performs the AJAX validation.
   * @param CModel the model to be validated
   */
  protected function performAjaxValidation($models)
  {
    if(isset($_POST['ajax']) && $_POST['ajax']==='alumnus-form')
    {
      echo CActiveForm::validate($models);
      Yii::app()->end();
    }
  }

    /**
    * Checks for and creates Flash Messages corresponding to current user
    
    */
    private function checkNotifications(){

        return true;
    }
  
  /**
   * Creates a new model & Registers for Mentorship.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
/*
  public function actionRegister()
  {
    $mAlumnus=new Alumnus;
    $mPersonalDetail=new AlumnusPersonalDetail;
    $mProfDetail=new AlumnusProfDetail;
    $mEmailId=new AlumnusEmailId;
    $mPhoneNumber=new AlumnusPhoneNumber;

    $this->performAjaxValidationRegister(array($mAlumnus,$mPersonalDetail,$mProfDetail,$mEmailId,$mPhoneNumber));

    if(isset($_POST['Alumnus'],$_POST['AlumnusPersonalDetail'],$_POST['AlumnusEmailId']))
    {
      $mAlumnus->attributes=$_POST['Alumnus'];
      $valid = $mAlumnus->validate();
      $i=0;
      foreach($_POST['AlumnusEmailId'] as $email){
        if(isset($_POST[''])){}
      }
      if($mAlumnus->save())
        $this->redirect(array('thankRegister','id'=>$mAlumnus->id));
    }

    $this->render('register',array(
      'mAlumnus'=>$mAlumnus,
      'mEmailId'=>$mEmailId,
    ));
  }
*/
  
  public function actionSubmitPreference(){  
        $alumnusId=Yii::app()->session['alumnusId'];
    if(isset($_POST['preference'])){
        $array=$_POST['preference'];
            $array=explode ( ",", $array);

        for($i=1;$i<count($array);$i++){
          $mAlumnusPrefList=AlumnusPreferenceList::model()->findByAttributes(array('alumnusId'=>$alumnusId,'preferenceIndex'=>$i));
          if($mAlumnusPrefList===null){
            throw new CHttpException(404,'Something went wrong. The requested page does not exist.');
          }
          $mAlumnusPrefList->studentId=$array[$i];
          $mAlumnusPrefList->updatedAt= new CDbExpression('NOW()');
          if(!$mAlumnusPrefList->save()){
            //throw new CHttpException(400,'Invalid request. Please try again.');
            echo $mAlumnusPrefList->errors;
          }
        }
//TODO: Before sending out mails for second round, take care if students in his list are already alloted ?
/*
            $mAlumnusPrefList=AlumnusPreferenceList::model();
            $transaction=$mAlumnusPrefList->dbConnection->beginTransaction();
            try {
                $AlumnusPrefList=$mAlumnusPrefList->deleteAll('alumnusId = ?', array($alumnusId));
                for($i=1;$i<count($array);$i++){
                    $AlumnusPrefList=$mAlumnusPrefList
                }
                $transaction->commit();
            } catch(Exception $e) {
                $transaction->rollBack();
            }
*/
        $mAlumnus=Alumnus::model()->findByPk($alumnusId);
        $name=str_replace("  "," ",$mAlumnus->salutation." ".$mAlumnus->firstName." ".$mAlumnus->middleName." ".$mAlumnus->lastName);
        Yii::app()->session->destroy();
        $this->render('submitPreference',array(
          'name'=>$name
        ));
      }else{
        throw new CHttpException(400,"Invalid request. If problem persists, please write to us at sarc@iitb.ac.in");
      }
  }

  public function actionPreference(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
        if($mAlumnus=Alumnus::model()->with(array(
                        'preferredStudents.student.department'=>array('condition'=>"preferredStudents.studentId NOT IN (SELECT studentId FROM MentorshipConnection WHERE phaseYear='02_2012')",'order'=>"preferredStudents.preferenceIndex "),
                        'preferredStudents.student.registrations'=>array('condition'=>'registrations.phaseYear=\'02_2012\''),
                        ))->findByPk($alumnusId)){
          $this->render('preference',array(
            'mAlumnus'=>$mAlumnus,
          ));        
        }else{
          throw new CHttpException(400,'Invalid request. Please try to use the original link. If problem persists, write to us at sarc@iitb.ac.in');
        }
        }
  }

  public function actionLogin($key){
    $model=LoginKey::model()->findByAttributes(array('key'=>$key));
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    $alumnusId=$model->alumnusId;
    $actions=$model->actions;
    $model->lastLogin=new CDbExpression('NOW()');
    if($model->save()){
      Yii::app()->session['alumnusId'] = $alumnusId;
            Yii::app()->session['actions'] = $actions;
            $this->checkNotifications();
      $this->redirect(array($actions));
    }
    else
      throw new CHttpException(400,'Sorry something went wrong. contact us at sarc@iitb.ac.in');
  }
  
  public function actionDownloadResume($rollNumber)
  {
        //$alumnusId=Yii::app()->session['alumnusId'];
        $loc="protected/files/resume/";
        $format = array('pdf','doc','docx');
        $i=0;
        foreach($format as $ext){
          $fileName=$rollNumber.".".$ext;
          $file=$loc.$fileName;
          if($i==0 && file_exists($file)){
            $i=1;
            return Yii::app()->getRequest()->sendFile($fileName, @file_get_contents($file));
          }
        }if($i==0){
          //throw new CHttpException(404,'Sorry file not found');
                $fileName="NOTFOUND.txt";
          $file=$loc.$fileName;
                return Yii::app()->getRequest()->sendFile($fileName, @file_get_contents($file));
        }
  }

    public function actionMentees(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
            $mAlumnus=Alumnus::model()->findByPk($alumnusId);
            if($mMentees=MentorshipConnection::model()->with(array(
                        'student.department',
                        'student.registrations'=>array('condition'=>'t.phaseYear=\'02_2012\''),))->findAllByAttributes(array('alumnusId'=>$alumnusId))){
                $this->render('mentees',array(
                        'mAlumnus'=>$mAlumnus,
                        'mMentees'=>$mMentees
                ));
            }
            else{
                throw new CHttpException(400,'Invalid request. Please try to use the original link.');
            }
        }
    }

    
    public function isauthorized($alumnusId){
        if(Yii::app()->user->isGuest){
            if(isset(Yii::app()->session['actions']) && action()==Yii::app()->session['actions']){
                return true;
            } else{
                $this->redirect(array("site/login"));
            }
        }else if(Yii::app()->user->role=='alumnus' &&  $alumnusId!=Yii::app()->user->id){
            throw new CHttpException(403,'You are not authorized to perform this action.');
            return false;
        }else {
            return true;
        }
    }

    public function actionViewAllDetails(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){    
        $mAlumnus=Alumnus::model()->with(array('department'))->findByPk($alumnusId);
            $this->render('viewAllDetails',array(
                'mAlumnus'=>$mAlumnus,
            ));
        }
    }

	public function actionHome(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){    
        $mAlumnus=Alumnus::model()->with(array('department','emailIds','phoneNumbers','outbox','inbox'))->findByPk($alumnusId);
            $this->render('home',array(
                'mAlumnus'=>$mAlumnus,
            ));
        }
    }
	
	public function actionEditprofile(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){    
        	
			
	        if(isset($_FILES['Alumnusprfpic']))
	        {
	        
				$file = CUploadedFile::getInstanceByName('Alumnusprfpic[image]');
				
				$file->saveAs('images/alumnus/'.$alumnusId.'.jpg');
				
				/*$thumb=Yii::app()->image->loadThumb($image_object->id);
		        $config=array('width'=>320,'height'=>160); 
		        $options=new ImgOptions();
		        $options=ImgOptions::create($config);
		        $thumb->applyOptions($options);
		        $thumb->save(Yii::getPathOfAlias('application').'/images/resized_images/'.'-'.$image_object->name.'-'.$image_object->id.'.'.$image_object->extension);*/
				
				$image = Yii::app()->image->load('images/alumnus/'.$alumnusId.'.jpg');
			    $image->resize(110, 132);
    			$image->save();

	                $this->render('editprofile',array(
						'message'=>"Uploaded successfully"
					));
	            
	        }
			else{
				$mAlumnus=Alumnus::model()->with(array('department','emailIds','phoneNumbers','outbox','inbox'))->findByPk($alumnusId);
	            $this->render('editprofile',array(
	                'mAlumnus'=>$mAlumnus
	                
	            ));
			}
			
        }
		
		
    }
	
	public function actionProfile(){
	  
	  		  $id = Yii::app()->session['alumnusId'];        
            if($mMentor=Alumnus::model()->with(array('personalDetails','department','emailIds','phoneNumbers','profDetails'))->findByAttributes(array('id'=>$id))){
                $this->render('profile',array(
                    'mAlumnus'=>$mMentor
                ));
            }
            else{
                //throw new CHttpException(400,'Invalid request. Please try to use the original link.');
                $this->render('profile',array(
                    'mAlumnus'=>NULL
                ));
			}
  	}
	
	public function actionComplaint(){
			$alumnusId=Yii::app()->session['alumnusId'];
			if($mAlumnus=Alumnus::model()->with(array(
                        'department','emailIds'
                        ))->findByAttributes(array('id'=>$alumnusId))){
				$this->render('complaint',array(
                        'mAlumnus'=>$mAlumnus,
                ));

            }
			 else{
                throw new CHttpException(400,'Invalid request. Please try to use the original link.');
            }
			
				
		}
		
		public function actionSendmessage(){
			$alumnusId=Yii::app()->session['alumnusId'];
            if($this->isauthorized($alumnusId)){
            $mAlumnus=Alumnus::model()->with(array(
                        'emailIds'
                        ))->findByPk($alumnusId);
            if($mMentees=MentorshipConnection::model()->with(array(
                        'student','student.department',
                        'student.registrations'=>array('condition'=>'t.phaseYear=\'02_2012\''),))->findAllByAttributes(array('alumnusId'=>$alumnusId))){
                $this->render('sendmessage',array(
                        'mAlumnus'=>$mAlumnus,
                        'mMentees'=>$mMentees
                ));
            }
            else{
                throw new CHttpException(400,'Invalid request. Please try to use the original link.');
            }
        }	
				
		}
		
		public function actionMessagedetails(){
			$type = Yii::app()->request->getQuery('q');
			$value= Yii::app()->request->getQuery('id');
			$alumnusId=Yii::app()->session['alumnusId'];
			
			if($type=='inbox'){
				$msg=Sendmessage_student::model()->findByPk($value);
				if($msg->alumnusId==$alumnusId){
				$this->render('messagedetails',array(
                        'msg'=>$msg,
                ));	
				}else{
					throw new CHttpException(400,'Invalid request. Please try to use the original link.');	
				}
			}else if($type=='outbox'){
				$msg=Sendmessage_alumnus::model()->findByPk($value);
				if($msg->alumnusId==$alumnusId){
				$this->render('messagedetails',array(
                        'msg'=>$msg,
                ));
				}else{
					throw new CHttpException(400,'Invalid request. Please try to use the original link.');	
				}
			}
			else{
				throw new CHttpException(400,'Invalid request. Please try to use the original link.');
			}	
		}

    public function actionUpdateBasic(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
    $mAlumnus=Alumnus::model()->findByPk($alumnusId);
        if(isset($_POST['Alumnus']))
    {
      $mAlumnus->attributes=$_POST['Alumnus'];
            $mAlumnus->updatedAt= new CDbExpression('NOW()');
      if($mAlumnus->save()){
                $this->flashSave(true);
                $this->redirect(array('viewAllDetails'));
            }else{
                $this->flashSave(false);
            }
    }
        $this->render('updateBasic',array(
      'mAlumnus'=>$mAlumnus,
    ));
        }
    }

    public function actionUpdatePersonal(){   
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
            $mAlumnus=Alumnus::model()->with(array('personalDetails'))->findByPk($alumnusId);
            $mPersonalDetail=$mAlumnus->personalDetails[0];
            $mPhoneNumbers=$mAlumnus->phoneNumbers;
            if(isset($_POST['Alumnus']))
        {
          $mAlumnus->attributes=$_POST['Alumnus'];
                $mAlumnus->updatedAt= new CDbExpression('NOW()');
          if($mAlumnus->save()){
                    if(isset($_POST['AlumnusPersonalDetail'])){
                        $mPersonalDetail->attributes=$_POST['AlumnusPersonalDetail'];
                        $mPersonalDetail->updatedAt=new CDbExpression('NOW()');
                        if($mPersonalDetail->save()){
                            if(isset($_POST['AlumnusPhoneNumber'])){
                                foreach($_POST['AlumnusPhoneNumber'] as $pPhoneNumber){
                                    $mPhoneNumber=AlumnusPhoneNumber::model()->findByPk($pPhoneNumber['id']);
                                    $mPhoneNumber->attributes=$pPhoneNumber;
                                    if(trim($mPhoneNumber->phoneNumber)==''){
                                        $mPhoneNumber->delete();
                                    }else{
                                        $mPhoneNumber->updatedAt= new CDbExpression('NOW()');
                                        $mPhoneNumber->save();
                                    }
                                }
                            }
                            $this->flashSave(true);
                            $this->redirect(array('viewAllDetails'));
                        }else{
                            $this->flashSave(false);
                        }
                    }
                }else{
                    $this->flashSave(false);
                }
        }
            $this->render('updatePersonal',array(
          'mAlumnus'=>$mAlumnus,
                'mPersonalDetail'=>$mPersonalDetail,
                'mPhoneNumbers'=>$mPhoneNumbers,
        ));
        }
    }

    public function actionUpdateProf(){         
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
            $mAlumnus=Alumnus::model()->with(array('profDetails','phoneNumbers'))->findByPk($alumnusId);
            $mProfDetails=$mAlumnus->profDetails;
            $mPhoneNumbers=$mAlumnus->phoneNumbers;
            if(isset($_POST['Alumnus']))
        {
          $mAlumnus->attributes=$_POST['Alumnus'];
                $mAlumnus->updatedAt= new CDbExpression('NOW()');
                $valid=true;
          if($mAlumnus->save()){
                    if(isset($_POST['AlumnusProfDetail'])){
                        foreach($_POST['AlumnusProfDetail'] as $pProfDetail){ /*** can handle new entries *** But cannot delete old ones***/
                            $mProfDetail=AlumnusProfDetail::model()->findByPk($pProfDetail['id']);
                            if(trim($pProfDetail['designation'])=="" && trim($pProfDetail['company'])==""){
                                if($mProfDetail!=null){ $valid=$valid&&($mProfDetail->delete()); }
                            }else{
                                if($mProfDetail==null) $mProfDetail = new AlumnusProfDetail;
                                $mProfDetail->attributes=$pProfDetail;
                                $mProfDetail->updatedAt= new CDbExpression('NOW()');
                                $valid=$valid&&($mProfDetail->save());
                            }
                        }
                    }
                    if($valid){
                        if(isset($_POST['AlumnusPhoneNumber'])){
                            foreach($_POST['AlumnusPhoneNumber'] as $pPhoneNumber){
                                $mPhoneNumber=AlumnusPhoneNumber::model()->findByPk($pPhoneNumber['id']);
                                $mPhoneNumber->attributes=$pPhoneNumber;
                                if(trim($mPhoneNumber->phoneNumber)==''){
                                    $valid=$valid&&($mPhoneNumber->delete());
                                }else{
                                    $mPhoneNumber->updatedAt= new CDbExpression('NOW()');
                                    $valid=$valid&&($mPhoneNumber->save());
                                }
                            }
                        }
                    }
                    if($valid){                       
                        $this->flashSave(true);
                        $this->redirect(array('viewAllDetails'));
                    }else{
                        $this->flashSave(false);
                    }
                }else{
                    $this->flashSave(false);
                }
        }
            $this->render('updateProf',array(
          'mAlumnus'=>$mAlumnus,
                'mProfDetails'=>$mProfDetails,
                'mPhoneNumbers'=>$mPhoneNumbers,
        ));
        }
    }
    
    public function actionUpdateEmail(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
            $mAlumnus=Alumnus::model()->with(array('emailIds'))->findByPk($alumnusId);
            $mEmailIds=$mAlumnus->emailIds;
            $valid=true;
            if(isset($_POST['Alumnus'])){
                $mAlumnus->attributes=$_POST['Alumnus'];
                $mAlumnus->updatedAt= new CDbExpression('NOW()');
                if($mAlumnus->save()){
                    if(isset($_POST['AlumnusEmailId'])){
                        foreach($_POST['AlumnusEmailId'] as $pEmailId){
                            $mEmailId=AlumnusEmailId::model()->findByPk($pEmailId['id']);
                            $mEmailId->attributes=$pEmailId;
                            if(trim($mEmailId->emailId)==''){
                                $valid=$valid&&($mEmailId->delete());
                            }else{
                                $mEmailId->updatedAt= new CDbExpression('NOW()');
                                $valid=$valid&&($mEmailId->save());
                            }
                        }
                    }
                    if($valid){                    
                        $this->flashSave(true);
                        $this->redirect(array('viewAllDetails'));
                    }else{
                        $this->flashSave(false);
                    }
                }else{
                    $this->flashSave(false);
                }
            }
            $this->render('updateEmail',array(
                'mAlumnus'=>$mAlumnus,
                'mEmailIds'=>$mEmailIds,
            ));
        }
    }

    public function actionUpdateImportant(){
        
    }

    public function actionAddPhoneNumber(){        
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
            $mAlumnus=Alumnus::model()->with(array('phoneNumbers'))->findByPk($alumnusId);
            $mPhoneNumber = new AlumnusPhoneNumber;
            if(isset($_POST['Alumnus'])){                
                $mAlumnus->attributes=$_POST['Alumnus'];
                $mAlumnus->updatedAt= new CDbExpression('NOW()');
                if($mAlumnus->save()){
                    if(isset($_POST['AlumnusPhoneNumber'])){
                        $mPhoneNumber->attributes= $_POST['AlumnusPhoneNumber'];
                        $mPhoneNumber->alumnusId = $alumnusId;
                        $mPhoneNumber->updatedAt = new CDbExpression('NOW()');
                        if($mPhoneNumber->save()){
                            $this->flashSave(true);
                            $this->redirect(array('viewAllDetails'));
                        }else{
                            $this->flashSave(false);
                        }
                    }
                }
                $this->flashSave(false);
            }
            $this->render('addPhoneNumber',array(
                'mAlumnus'=>$mAlumnus,
                'mPhoneNumber'=>$mPhoneNumber,
            ));
        }
    }

    public function actionAddEmailId(){
        $alumnusId=Yii::app()->session['alumnusId'];
        if($this->isauthorized($alumnusId)){
            $mAlumnus=Alumnus::model()->with(array('emailIds'))->findByPk($alumnusId);
            $mEmailId = new AlumnusEmailId;
            if(isset($_POST['Alumnus'])){                
                $mAlumnus->attributes=$_POST['Alumnus'];
                $mAlumnus->updatedAt= new CDbExpression('NOW()');
                if($mAlumnus->save()){
                    if(isset($_POST['AlumnusEmailId'])){
                        $mEmailId->attributes= $_POST['AlumnusEmailId'];
                        $mEmailId->alumnusId = $alumnusId;
                        $mEmailId->updatedAt = new CDbExpression('NOW()');
                        if($mEmailId->save()){
                            $this->flashSave(true);
                            $this->redirect(array('viewAllDetails'));
                        }else{
                            $this->flashSave(false);
                        }
                    }
                }
                $this->flashSave(false);
            }
            $this->render('addEmailId',array(
                'mAlumnus'=>$mAlumnus,
                'mEmailId'=>$mEmailId,
            ));
        }
    }
	
	/*public function actionProfile(){
			$this->render('profile');
	}*/

    public function flashSave($success){
        if($success){
            Yii::app()->user->setFlash('success', "Data saved!");
        }else{
            Yii::app()->user->setFlash('error', "Data saving failed!");
        }
    }

}
