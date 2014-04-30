<?php

class StudentRegistrationController extends Controller
{

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

    public function accessRules(){        
        return array(            
         array('allow',  
          'actions'=>array('index'),
          'users'=>array('*'),
        ),
          array('allow',
                'actions'=>array('index','login','rules','details','sop','interests','view','guidelines','preference','submitPreference','logout','error'),
                'users'=>array('*'),
        ),
      array('deny',  // deny all users
        'users'=>array('*'),
      ),
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }    
    
    private function isauthorized($studentId,$step){
        if(Yii::app()->user->isGuest){
            $this->redirect(array("StudentRegistration/login"));
        }else if(Yii::app()->user->role=='student' &&  $studentId!=Yii::app()->user->id){
            throw new CHttpException(403,'You are not authorized to perform this action.');
            return false;
        }else{
            $mRegistration=StudentRegistration::model()->findByAttributes(array('studentId'=>Yii::app()->user->id,'phaseYear'=>'01_2013'));
            if($mRegistration->step!=6 || $step<5){
                if($mRegistration->step < $step){
                    Yii::app()->user->setFlash('error', "You still haven't reached that part of registration");                    
                    $this->redirect(array("StudentRegistration/rules"));            
                }else{
                    return true;
                }
            }else{
                $this->redirect(array("StudentRegistration/logout"));
            }
        }
    }
    
    private function changeStep($step){
        $studentId=Yii::app()->session['studentId'];
         $mRegistration=StudentRegistration::model()->findByAttributes(array('studentId'=>Yii::app()->user->id,'phaseYear'=>'01_2013'));
         if($mRegistration->step < $step){
            $mRegistration->step=$step;
            if($mRegistration->save()) return true; else return false;
         }else return true;
    }
    
  public function actionLogin()
  {
        if(!Yii::app()->user->isGuest) $this->redirect(array("StudentRegistration/rules")); //$this->redirect(Yii::app()->user->returnUrl);
    $model=new LoginForm;

    // if it is ajax validation request
    if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

        $error="";
    // collect user input data
    if(isset($_POST['LoginForm']))
    {
      $model->attributes=$_POST['LoginForm'];
            $model->role='student';
      // validate user input and redirect to the previous page if valid
            $session=new CHttpSession;
            $session->open();
            $session['controller']="StudentRegistration";
            
            if($model->validate() && $model->register()){
                //$user= new Login;
                if(Login::model()->exists('rollNumber="'.$_SESSION['rollNumber'].'"')){
                    $user=Login::model()->findByAttributes(array('rollNumber'=>$_SESSION['rollNumber']));
                }else{
                    $user=new Login();
                }                
                $user->username=$model->username;
                $user->rollNumber=$_SESSION['rollNumber'];
                $user->updatedAt=new CDbExpression('NOW()');
                if($user->save()){
                    //TODO:Check whether already registered.
                    
                    if(Student::model()->exists('rollNumber="'.$_SESSION['rollNumber'].'"')){
                        
                    }else{
                        
                    }
                    
                    //Enrolling for this phase
                    $registration=StudentRegistration::model()->findByAttributes(array("phaseYear"=>"01_2013",'studentId'=>$user->id));//echo"sa";print_r($registration);
                    if($registration!=null){
                        if($registration->step==6){
                            if(MentorshipConnection::model()->exists('studentId='.$user->id.' AND phaseYear=\'01_2013\'')){
                                Yii::app()->user->setFlash('error', "You have already been alloted a mentor. You cannot register again.");
                                $this->redirect(array("Student/mentor"));
                            }else{
                            Yii::app()->user->setFlash('error', "You have already completed your Registration");
                            //$this->redirect(array("StudentRegistration/logout"));
                            }
                        }else{
                            Yii::app()->user->setFlash('notice', "You have NOT completed your Registration");
                        }
                    }else{
                        $registration = new StudentRegistration;
                        $registration->phaseYear="01_2013";
                        $registration->studentId=$user->id;
                        $registration->step=0;
                        $registration->createdAt=new CDbExpression('NOW()');
                        $registration->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $registration->validate();
                        $registered = $registration->save();      
                        //print_r($registration->errors);              
                    }
                    $this->redirect(array("StudentRegistration/rules"));
                }
            }
    }
    // display the login form
    $this->render('login',array(
                'model'=>$model,
                'error'=>$error, //TODO:What to do with this? :P
        ));
  }

  public function actionRules()
  {
        $studentId=Yii::app()->session['studentId'];
        if($this->isauthorized($studentId,0)){
            if(isset($_POST['Rules'])){                
                if($this->changeStep(1)){
                    $this->redirect(array('StudentRegistration/details'));
                }
            }
        $this->render('rules');
        }
  }

  public function actionDetails()
  {
        $studentId=Yii::app()->session['studentId'];
        if($this->isauthorized($studentId,1)){
            $mStudent=Student::model()->findByAttributes(array('rollNumber'=>Yii::app()->session['rollNumber']));
            if($mStudent==null) $mStudent= new Student;
            if(isset($_POST['Student'])){
                $mStudent= new Student;
                $mStudent->id=Yii::app()->user->id;
                $mStudent->rollNumber=Yii::app()->session['rollNumber'];
                if($mStudent->exists('rollNumber="'.Yii::app()->session['rollNumber'].'"')) $mStudent=$mStudent->findByPk(Yii::app()->user->id);
                $mStudent->attributes=$_POST['Student'];
                if($mStudent->save()){
                    if($this->changeStep(2)){
                        $this->redirect(array("StudentRegistration/sop"));
                    }
                }
            }
        $this->render('details',array(
                'model'=>$mStudent,
            ));
        }
  }

  public function actionSop()
  {
        $studentId=Yii::app()->session['studentId'];
        if($this->isauthorized($studentId,2)){
            //$mStudent=Student::model()->with(array('registrations',array('condition'=>array('phaseYear'=>'01_2013'))))->findByPk($studentId);
            $mRegistration=StudentRegistration::model()->findByAttributes(array('studentId'=>Yii::app()->user->id,'phaseYear'=>'01_2013'));
            $mResume = new Resume;
            if(isset($_POST['Resume'])){
                $mRegistration->attributes=$_POST['StudentRegistration'];
                if($mRegistration->sop==""){
                    $mRegistration->addError('sop',"SOP cannot be blank");
                }else{
                  if($mRegistration->validate()){  // add && $mResume->validate() to validate resume
                        $mRegistration->save();
                        $this->changeStep(3);
                        if(CUploadedFile::getInstance($mResume,'resume')){
            $mResume->resume=CUploadedFile::getInstance($mResume,'resume');
                        $mResume->resume->saveAs(Yii::app()->basePath . '/files/resume/' . Yii::app()->session['rollNumber'].".".$mResume->resume->extensionName);
            }
            $this->redirect(array("StudentRegistration/interests"));
                    }
                }
            }
        $this->render('sop',array(
                'mRegistration'=>$mRegistration,
                'mResume'=>$mResume,
            ));
        }
  }

  public function actionInterests() //TODO: incomplete
  {
        $studentId=Yii::app()->session['studentId'];
        if($this->isauthorized($studentId,3)){        
            
            $preference=StudentMentorshipPreference::model();                
    
            $mMentorshipPreference=$preference->find('studentId='.$studentId." AND preferenceIndex=4");
            if($mMentorshipPreference==null) $mMentorshipPreference=new StudentMentorshipPreference;

            $mMentorshipPreference1=$preference->find('studentId='.$studentId." AND preferenceIndex=2");
            if($mMentorshipPreference1==null) $mMentorshipPreference1=new StudentMentorshipPreference;

            $mMentorshipPreference2=$preference->find('studentId='.$studentId." AND preferenceIndex=3");
            if($mMentorshipPreference2==null) $mMentorshipPreference2=new StudentMentorshipPreference;
            
            if(isset($_POST['StudentMentorshipPreference']))
        {
                $find=$preference->find('studentId='.$studentId." AND preferenceIndex=1");
                if($find!=NULL) $find->delete();
                $model = new StudentMentorshipPreference;
                $model->studentId=$studentId;
                $model->preferenceIndex='1';
                $model->preference=$_POST['StudentMentorshipPreference']['preference'];
                $model->areaOfInterest=$_POST['StudentMentorshipPreference']['areaOfInterest'];
                $model->preferredDepartmentCode=$_POST['StudentMentorshipPreference']['preferredDepartmentCode'];
                $mMentorshipPreference=$model;
                $valid =$model->validate();
                if($valid){
                    $model->save();
                    // Make everyone's 4th preference same as first
                    $find=$preference->find('studentId='.$studentId." AND preferenceIndex=4");
                    if($find!=NULL) $find->delete();
                    $model=new StudentMentorshipPreference;
                    $model->studentId=$studentId;
                    $model->preferenceIndex='4';
                    $model->preference=$_POST['StudentMentorshipPreference']['preference'];
                    $model->areaOfInterest=$_POST['StudentMentorshipPreference']['areaOfInterest'];
                    $model->preferredDepartmentCode=$_POST['StudentMentorshipPreference']['preferredDepartmentCode'];
                    $model->save(); 
                    
                    $find=$preference->find('studentId='.$studentId." AND preferenceIndex=2");
                    if($find!=NULL) $find->delete();
                    $model=new StudentMentorshipPreference;
                    $model->studentId=$studentId;
                    $model->preferenceIndex='2';
                    $model->preference=$_POST['StudentMentorshipPreference']['preference1'];
                    $model->areaOfInterest=$_POST['StudentMentorshipPreference']['areaOfInterest1'];
                    $model->preferredDepartmentCode=$_POST['StudentMentorshipPreference']['preferredDepartmentCode1'];
                    $model->save();
                    
                    $find=$preference->find('studentId='.$studentId." AND preferenceIndex=3");
                    if($find!=NULL) $find->delete();
                    $model=new StudentMentorshipPreference;
                    $model->studentId=$studentId;
                    $model->preferenceIndex='3';
                    $model->preference=$_POST['StudentMentorshipPreference']['preference2'];
                    $model->areaOfInterest=$_POST['StudentMentorshipPreference']['areaOfInterest2'];
                    $model->preferredDepartmentCode=$_POST['StudentMentorshipPreference']['preferredDepartmentCode2'];
                    $model->save();

                    
                    $this->changeStep(4);
                    $this->redirect(array("StudentRegistration/guidelines"));
                }else{
                      Yii::app()->user->setFlash('error', "Give your areas of interests");
                }
            }           
        $this->render('interests',array(
                'mMentorshipPreference'=>$mMentorshipPreference,
                'mMentorshipPreference1'=>$mMentorshipPreference1,
                'mMentorshipPreference2'=>$mMentorshipPreference2,
            ));
        }
  } 

    public function actionView(){ //TODO: incomplete

    }


  public function actionGuidelines()
  {
        $studentId=Yii::app()->session['studentId'];
        if($this->isauthorized($studentId,4)){
            if(isset($_POST['understand'])){
                $this->changeStep(5);
                $this->redirect(array("StudentRegistration/preference"));
            }
            
        $this->render('guidelines');
        }
  }

    public function loadModelStudentPreference($id)
  {
    $model=StudentMentorshipPreference::model()->find('studentid='.$id.' AND preferenceIndex=1');
    if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
    return $model;
  }

  public function actionPreference()
  {
        $studentId=Yii::app()->session['studentId'];
        if($this->isauthorized($studentId,5)){
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
            //$alumniList= Alumnus::model()->with('profDetails')->findAll('t.status=\'3-confirmed\' AND prefLocked=2);
            //TODO: Change it to normal condition, just for round 2
            $alumniList= Alumnus::model()->with('profDetails')->findAll('t.status=\'3-confirmed\' AND prefLocked=2 AND (t.id NOT IN (SELECT alumnusId FROM MentorshipConnection WHERE phaseYear=\'01_2013\') OR t.id IN (SELECT alumnusId FROM AlumnusPreferenceList WHERE updatedAt>\'2012-01-28 02:53:00\' AND alumnusId IN (SELECT alumnusId FROM (SELECT t11.alumnusId, count(studentId) count, numberOfMentees FROM MentorshipConnection AS t11, (SELECT alumnusId, numberOfMentees FROM AlumnusMentorshipPreference) AS t12 WHERE phaseYear=\'01_2013\' AND t11.alumnusId=t12.alumnusId GROUP BY alumnusId HAVING count<numberOfMentees OR (numberOfMentees=0 AND count<3)) AS t13 )))');
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
  }

    public function actionSubmitPreference(){
        $studentId=Yii::app()->session['studentId'];
        if($this->isauthorized($studentId,5)){
            $model = new StudentPreferenceList;
            if(isset($_POST['mentorPreference'])){

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
                    if($alumnuscount>=8){
                         $alumModel=new Alumnus;
                        //echo "cccc";
                        $alumnus=$alumModel->find('id='.$model->alumnusId);
                        $alumnus->prefLocked=1;
                        $alumnus->save() ;
                         //   echo "success";
                       // else print_r($alumnus->errors);

                    }
                    $model->save();
                    $this->changeStep(6);
                }
            }
            $this->redirect(array("StudentRegistration/logout"));
        }
    }

    public function actionLogout()
  {
        $studentId=Yii::app()->session['studentId'];
    Yii::app()->user->logout();
        Yii::app()->user->setFlash('notice', "You have been successfully logged out.");
    $this->render('thankyou',array('studentId'=>$studentId));
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
