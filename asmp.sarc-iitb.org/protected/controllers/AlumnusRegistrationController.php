<?php

class AlumnusRegistrationController extends Controller
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
                'actions'=>array('index','rules','logout','error','step1','step2','step3','step4','finish','info','confirm','reject','choose','thankyou'),
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

  public function actionRules()
  {      
        $this->render('rules');     
  }
  
  public function actionStep1()
  {      
     $alumnusId=Yii::app()->session['alumnusId'];
     $step1=Yii::app()->session['step1'];
     
     if(isset($_POST['newform'])){
       
       
        $salutation=$_POST['salutation'];
        $firstname=strip_tags($_POST['firstname']);
        $lastname=strip_tags($_POST['lastname']);
        $middlename=strip_tags($_POST['middlename']);
        $department=$_POST['department'];
        $degree=$_POST['course'];
        $hostel=$_POST['hostel'];
        $class=$_POST['batch'];
        $departmentcode=Department::model()->findByAttributes(array('name'=>$department))->code;

         Yii::app()->session['name'] =$firstname." ".$lastname;
        
        if($step1!=1){
        $alumnus= new Alumnus;
                        $alumnus->salutation=$salutation;
                        $alumnus->firstName=$firstname;
            $alumnus->middleName=$middlename;
            $alumnus->lastName=$lastname;
            $alumnus->departmentCode=$departmentcode;
            $alumnus->degree=$degree;
            $alumnus->hostel=$hostel;
            $alumnus->class=$class;
            $alumnus->createdAt=new CDbExpression('NOW()');
            $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
            $alumnus->validate();
            $saved=$alumnus->save();
            //print_r($alumnus->errors);

        $registration = new AlumnusRegistration;
                $registration->phaseYear="02_2012";
                $registration->alumnusId=$alumnus->id;
                $registration->step=1;
                $registration->createdAt=new CDbExpression('NOW()');
                $registration->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                $registration->validate();
                $registered = $registration->save();
          
        Yii::app()->session['alumnusId']=$alumnus->id;               // second time
        Yii::app()->session['step1']=1;
          
          $this->redirect(array("AlumnusRegistration/step2/"));    
        }
        else{
          
          $connection=Yii::app()->db;
          $sql="UPDATE Alumnus SET salutation='$salutation', firstName='$firstname', middleName='$middlename', lastName='$lastname', departmentCode='$departmentcode', degree='$degree', hostel='$hostel', class='$class' WHERE id='$alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
          $this->redirect(array("AlumnusRegistration/step2/"));            
        }        
      }else{
        $data=Alumnus::model()->findByPk($alumnusId);
        $this->render('step1',array('data'=>$data,));
      }
  }
  
  public function actionStep2()
  {      
         $alumnusId=Yii::app()->session['alumnusId'];
      if(!isset(Yii::app()->session['step1'])){
          $this->redirect(array("AlumnusRegistration/step1/"));
      }
      $step2=Yii::app()->session['step2'];
     
     if(isset($_POST['newform'])){
        
        $phnum=strip_tags($_POST['phnum']);
        $email1=strip_tags($_POST['email1']);
        $email2=strip_tags($_POST['email2']);
        $skypeid=strip_tags($_POST['skypeid']);
        $address1=strip_tags($_POST['address1']);
        $address2=$_POST['address2'];
        $city=strip_tags($_POST['city']);
        $state=strip_tags($_POST['state']);
        $country=strip_tags($_POST['country']);
        $pincode=strip_tags($_POST['pincode']);
        
        
        if($step2!=1){
          $connection=Yii::app()->db;
          $sql="UPDATE Alumnus SET skypeId='$skypeid' WHERE id='$alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
          
          $sql="UPDATE Alumnusregistration SET step='2' WHERE alumnusId='$alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
          
            $alumnus= new AlumnusEmailId;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->emailId=$email1;
            $alumnus->type="primary";
            $alumnus->status=1;
            $alumnus->confirmation="1-pending";
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors);  
          
              if($email2!=''){
              $alumnus= new AlumnusEmailId;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->emailId=$email2;
            $alumnus->type="other";
            $alumnus->status=1;
            $alumnus->confirmation="1-pending";
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors); 
            }
        
            $alumnus= new AlumnusPhoneNumber;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->phoneNumber=$phnum;
            $alumnus->type="home";
            $alumnus->status=1;
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors); 
            
            $countrycode=Country::model()->findByAttributes(array('name'=>$country));
            
            $alumnus= new AlumnusPersonalDetail;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->address=$address1;
            $alumnus->city=$city;
            $alumnus->state=$state;
            $alumnus->countryId=$countrycode->id;
            $alumnus->pincode=$pincode;
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors);

        Yii::app()->session['step2']=1;
        
          
        if($saved){
          $this->redirect(array("AlumnusRegistration/step3/"));    
        }else{
          echo 'error';  
        }
                         // second time
        
        
        }
        else{
          
          $connection=Yii::app()->db;
          $sql1="UPDATE Alumnus SET skypeId='$skypeid' WHERE id='$alumnusId'";
          $sql2="UPDATE AlumnusEmailId SET emailId='$email1' WHERE alumnusId='$alumnusId' AND type='primary'";
          $sql3="UPDATE AlumnusPhoneNumber SET phoneNumber='$phnum' WHERE alumnusId='$alumnusId'";
          $countrycode=Country::model()->findByAttributes(array('name'=>$country))->id;
          $sql4="UPDATE AlumnusPersonalDetail SET address='$address1', city='$city', state='$state', countryId='$countrycode' WHERE alumnusId='$alumnusId'";
          

          
          $second=$connection->createCommand($sql2)->execute();
          $third=$connection->createCommand($sql3)->execute();
          $fourth=$connection->createCommand($sql4)->execute();
          $first=$connection->createCommand($sql1)->execute();
          
          //if($first || $second || $third || $fourth){
            //$this->render('step2');
             $this->redirect(array("AlumnusRegistration/step3/"));  
          //}else{
            //echo 'wooo';  
          //}
          
        }        
      }else{
        $data1=Alumnus::model()->findByPk($alumnusId);
        $connection=Yii::app()->db;
        $sql4="SELECT * FROM AlumnusEmailId WHERE alumnusId='$alumnusId'";
        $data2=$connection->createCommand($sql4)->query();
        $data3=AlumnusPersonalDetail::model()->findByAttributes(array('alumnusId'=>$alumnusId));
        $data4=AlumnusPhoneNumber::model()->findByAttributes(array('alumnusId'=>$alumnusId));
        $this->render('step2',array('data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,));
      }     
  }
  
  
  public function actionStep3()
  {      
        $alumnusId=Yii::app()->session['alumnusId'];
     $step3=Yii::app()->session['step3'];
      if(!isset(Yii::app()->session['step2'])){
          $this->redirect(array("AlumnusRegistration/step2/"));
      }
     if(isset($_POST['newform'])){
        
        $designation=$_POST['designation'];
        $company=$_POST['company'];
        $industry=$_POST['industry'];
        $designation2=$_POST['designation2'];
        $company2=$_POST['company2'];
        $industry2=$_POST['industry2'];
        $designation3=$_POST['designation3'];
        $company3=$_POST['company3'];
        $industry3=$_POST['industry3'];
        $workprofile=$_POST['workprofile'];
        $linkedin=$_POST['linkedin'];
        
        if($step3!=1){
          
          $connection=Yii::app()->db;
          $sql="UPDATE Alumnus SET workProfile='$workprofile',linkedin='$linkedin' WHERE id='$alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
          
          $sql="UPDATE Alumnusregistration SET step='3' WHERE alumnusId='$alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
          
            $industrycode=Industry::model()->findByAttributes(array('name'=>$industry))->id;
            $alumnus= new AlumnusProfDetail;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->designation=$designation;
            $alumnus->company=$company;
            $alumnus->industryId=$industrycode;
            $alumnus->jobNumber="1";
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors);  
            
            if($designation2!=NULL){
              $industrycode2=Industry::model()->findByAttributes(array('name'=>$industry2))->id;
            $alumnus= new AlumnusProfDetail;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->designation=$designation2;
            $alumnus->company=$company2;
            $alumnus->industryId=$industrycode2;
            $alumnus->jobNumber="2";
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors);  
            }
            
            if($designation3!=NULL){
              $industrycode3=Industry::model()->findByAttributes(array('name'=>$industry3))->id;
            $alumnus= new AlumnusProfDetail;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->designation=$designation3;
            $alumnus->company=$company3;
            $alumnus->industryId=$industrycode3;
            $alumnus->jobNumber="3";
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors);  
            }
          
              
        Yii::app()->session['step3']=1;
        
          
        if($saved){
          $this->redirect(array("AlumnusRegistration/step4/"));    
        }else{
          echo 'error';  
        }
                         // second time
        
        
        }
        else{
          
          $connection=Yii::app()->db;
          $sql1="UPDATE Alumnus SET workProfile='$workprofile',linkedin='$linkedin' WHERE id='$alumnusId'";
          $industrycode=Industry::model()->findByAttributes(array('name'=>$industry))->id;
          $sql2="UPDATE AlumnusProfDetail SET designation='$designation',company='$company',industryId='$industrycode' WHERE alumnusId='$alumnusId' AND jobNumber='1'";
          if($designation2!=NULL){
            $industrycode2=Industry::model()->findByAttributes(array('name'=>$industry2))->id;
          $sql3="UPDATE AlumnusProfDetail SET designation='$designation2',company='$company2',industryId='$industrycode2' WHERE alumnusId='$alumnusId' AND jobNumber='2'";  
          $third=$connection->createCommand($sql3)->execute();
          }
          if($designation3!=NULL){
            $industrycode3=Industry::model()->findByAttributes(array('name'=>$industry3))->id;
          $sql4="UPDATE AlumnusProfDetail SET designation='$designation3',company='$company3',industryId='$industrycode3' WHERE alumnusId='$alumnusId' AND jobNumber='3'";  
          $fourth=$connection->createCommand($sql4)->execute();
          }
          
          
          $second=$connection->createCommand($sql2)->execute();
          $first=$connection->createCommand($sql1)->execute();
          
          //if($first || $second || $third || $fourth){
            //$this->render('step2');
             $this->redirect(array("AlumnusRegistration/step4/"));  
          //}else{
            //echo 'wooo';  
          //}
          
        }        
      }else{
        $connection=Yii::app()->db;
        $data1=Alumnus::model()->findByPk($alumnusId);
        //$data2=AlumnusProfDetail::model()->findByAttributes(array('alumnusId'=>$alumnusId));
        $sql4="SELECT * FROM AlumnusProfDetail WHERE alumnusId='$alumnusId'";
        $data2=$connection->createCommand($sql4)->query();
        $sql5="SELECT * FROM Industry WHERE 1 ORDER BY `name` ASC";
                $entry=$connection->createCommand($sql5)->query();
                foreach($entry as $entrydata){
                  echo $entrydata->name;  
                }
        $this->render('step3',array('data1'=>$data1,'data2'=>$data2));
      }     
  }
  
  public function actionStep4()
  {      
         $alumnusId=Yii::app()->session['alumnusId'];
     $step4=Yii::app()->session['step4'];
      if(!isset(Yii::app()->session['step3'])){
          $this->redirect(array("AlumnusRegistration/step3/"));
      }
     if(isset($_POST['newform'])){
        
        $preference=$_POST['preference'];
        $numbermentees=$_POST['numbermentees'];
        $preferreddept=$_POST['preferreddept'];
        $areaofinterest=$_POST['areaofinterest'];
        
        if($step4!=1){
          
          $connection=Yii::app()->db;          
          $sql="UPDATE Alumnusregistration SET step='4' WHERE alumnusId='$alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
          
      if($preference=='Technical'){
            if($preferreddept=='Any'){
              $arr=explode(': ',$areaofinterest);
              $areaofInt=$arr[1];
            }else{
              $areaofInt=$areaofinterest;  
            }
      }else if($preference=='Non-Technical'){
        $areaofInt=$areaofinterest;
      }
            $departmentcode=Department::model()->findByAttributes(array('name'=>$preferreddept))->code;
            $alumnus= new AlumnusMentorshipPreference;
                        $alumnus->alumnusId=$alumnusId;
                        $alumnus->preference=$preference;
            $alumnus->numberOfMentees=$numbermentees;
            $alumnus->preferredDepartmentCode=$departmentcode;
            $alumnus->areaOfInterest=$areaofInt;
                        $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
                        $alumnus->validate();
                        $saved=$alumnus->save();
            print_r($alumnus->errors);  
              
        Yii::app()->session['step4']=1;
        
          
        if($saved){
          $this->redirect(array("AlumnusRegistration/finish/"));    
        }else{
          echo 'error';  
        }
                         // second time
        
        
        }
        else{
          
          $connection=Yii::app()->db;
          $departmentcode=Department::model()->findByAttributes(array('name'=>$preferreddept))->id;
          if($preferreddept=='Any'){
              $arr=explode(': ',$areaofinterest);
              $areaofInt=$arr[1];
            }else{
              $areaofInt=$areaofinterest;  
            }
          $sql1="UPDATE AlumnusMentorshipPreference SET preference='$preference',numberOfMentees='$numbermentees',preferredDepartmentCode='$departmentcode',areaOfInterest='$areaofInt' WHERE alumnusId='$alumnusId'";
          
          $first=$connection->createCommand($sql1)->execute();
          
          //if($first || $second || $third || $fourth){
            //$this->render('step2');
             $this->redirect(array("AlumnusRegistration/finish/"));  
          //}else{
            //echo 'wooo';  
          //}
          
        }        
      }else{
        //$data1=AlumnusMentorshipPreference::model()->findByAttributes(array('alumnusId'=>$alumnusId));
        $this->render('step4');
      }     
  }
  
  public function actionFinish()
  {      
        $this->render('finish');     
  }
  
  public function actionConfirm(){
    
    $code = Yii::app()->request->getQuery('code');
    if(strlen($code)==10){
    $query = AlumnusMentorshipPreference::model()->findByAttributes(array('confirmation'=>$code));  
    if($query->id!=''){
      if($query->status!='confirmed'){
          $connection=Yii::app()->db;
          $sql="UPDATE AlumnusMentorshipPreference SET status='confirmed' WHERE alumnusId='$query->alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
      Yii::app()->session['alumnusId']=$query->alumnusId;
          $this->redirect(array("AlumnusRegistration/choose/"));  
      
     }else if($query->status=='confirmed'){
          $this->render('info',array('info'=>'You already confirmed')); 
      }
   }
  }else{
      $this->render('info',array('info'=>'Try only valid link'));
    } 
  }
  
  public function actionRejected(){
    
    $code = Yii::app()->request->getQuery('code');
    if(strlen($code)==10){
    $query = AlumnusMentorshipPreference::model()->findByAttributes(array('confirmation'=>$code));  
    if($query->id!=''){
      if($query->status!='rejected'){
          $connection=Yii::app()->db;
          $sql="UPDATE AlumnusMentorshipPreference SET status='rejected' WHERE alumnusId='$query->alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
          $this->render('info',array('info'=>'Your registration is rejected. Thankyou for your time'));
     }else if($query->status=='rejected'){
          $this->render('info',array('info'=>'You already confirmed')); 
      }
   }
  }else{
      $this->render('info',array('info'=>'Try only valid link'));
    } 
  }

  public function actionChoose(){
    $alumnusId=Yii::app()->session['alumnusId'];
     if(isset($_POST['newform'])){
        
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        
    if($password!=$password2){
      Yii::app()->session['passerror']='passerror';
      $this->render('choose');  
    }
    
    $query = AlumnusLogin::model()->findByAttributes(array('username'=>$username));
    if($query->username!=''){
      Yii::app()->session['unavilable']='unavilable';
      $this->render('choose');
    }
          
          
            $alumnus= new AlumnusLogin();
            $alumnus->id=$alumnusId;
            $alumnus->username=$username;
            $alumnus->password=$password;
            $alumnus->encrypted_password=md5($password);
            $alumnus->role='alumnus';
            $alumnus->updatedAt=new CDbExpression('NOW()');//print_r($registration);
            $alumnus->validate();
            $saved=$alumnus->save();
       //print_r($alumnus->errors);  
             
          
        if($saved){
          $this->redirect(array("AlumnusRegistration/thankyou/"));    
        }else{
          //echo 'error';
      Yii::app()->session['error']='error';
      $this->render('choose');  
        }
                         // second time
        
      }else{
        
        $this->render('choose');
      }
    
  }
  
  public function actionThankyou(){
    $this->render('thankyou');
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
