<?php

class DataController extends Controller
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
		
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl.'site/login');
		$criteria = new CDbCriteria();

		if(isset($_GET['q']))
		{
		  $q = $_GET['q'];
		   if($this->comparison($q)){
			   $value_arr=explode(':',$q);
			   $criteria->compare($value_arr[0], $value_arr[1], true, 'OR');   
		   }
		  
		}
	
		$dataProvider=new CActiveDataProvider("Alumnus", array('criteria'=>$criteria,'pagination' => array(
						'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 15,),));
	
		$this->render('index',array(
		  'dataProvider'=>$dataProvider,
		));
			
	}
	
	
	
	public function actionAdd()
	{
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl.'site/login');
		$model=new Alumnus;
		$model1=new Alumnus_emailid;
		$model2=new Alumnus_phnum;
		$model3=new Alumnus_info;
		$model4_1=new Alumnus_company;
		$model4_2=new Alumnus_company;
		$model5=new Alumnus_social;
		
		for($i=0;$i<4;$i++){
			$model6[$i]=new Alumnus_attended();
			$model7[$i]=new Alumnus_mailed();	
		}
		
		/*$model1=$model->emailid;
		$model2=$model->phnum;
		$model3=$model->info;
		$model4=$model->company;
		$model5=$model->social;*/
		
		if(isset($_POST['Alumnus'],$_POST['Alumnus_emailid'],$_POST['Alumnus_phnum'],$_POST['Alumnus_info'],$_POST['Alumnus_company'],$_POST['Alumnus_social'],$_POST['Alumnus_attended'],$_POST['Alumnus_mailed']))
		{

			$model->attributes=$_POST['Alumnus'];
			$model1->attributes=$_POST['Alumnus_emailid'];
			$model2->attributes=$_POST['Alumnus_phnum'];
			$model3->attributes=$_POST['Alumnus_info'];
			$model4_1->attributes=$_POST['Alumnus_company'][1];
			$model4_2->attributes=$_POST['Alumnus_company'][2];
			$model5->attributes=$_POST['Alumnus_social'];
			for($i=0;$i<count($_POST['Alumnus_attended']);$i++){
					$model6[$i]->attributes=$_POST['Alumnus_attended'][$i];
			}
			for($i=0;$i<count($_POST['Alumnus_mailed']);$i++){
					$model7[$i]->attributes=$_POST['Alumnus_mailed'][$i];
			}
			
			if($model->validate() && $model1->validate() && $model2->validate() && $model3->validate() && $model4_1->validate() && $model4_2->validate() && $model5->validate() && $model6->validate()){
			
				$post=Alumnus::model()->findByAttributes(array('firstName'=>$model->firstName,'lastName'=>$model->lastName,'batch'=>$model->batch,'department'=>$model->department,'hostel'=>$model->hostel,'dateofbirth'=>$model->dateofbirth,'gender'=>$model->gender));
				if($post!=NULL){
					Yii::app()->user->setFlash('profile','Person is already entered');
				}else{
					if( $model->save()){
						
						 $model1->alumnusId=$model->id;
						 $model2->alumnusId=$model->id;
						 $model3->alumnusId=$model->id;
						 $model4_1->alumnusId=$model->id;
						 $model4_2->alumnusId=$model->id;
						 $model5->alumnusId=$model->id ;
						 for($i=0;$i<count($_POST['Alumnus_attended']);$i++){
							 $model6[$i]->alumnusId=$model->id ;
						 }
						 for($i=0;$i<count($_POST['Alumnus_mailed']);$i++){
							 $model7[$i]->alumnusId=$model->id ;
						 }
						 
						 if($model1->save()){
						 	
							if ($model2->getNotnull($model2)) $model2->save();
							if ($model3->getNotnull($model3)) $model3->save();
							if ($model4_1->getNotnull($model4_1)) $model4_1->save();
							if ($model4_2->getNotnull($model4_2)) $model4_2->save();
							if ($model5->getNotnull($model5)) $model5->save();
							for($i=0;$i<count($_POST['Alumnus_attended']);$i++){
								 if ($model6[$i]->getNotnull($model6[$i])) $model6[$i]->save();
						 	}
							for($i=0;$i<count($_POST['Alumnus_mailed']);$i++){
								 if ($model7[$i]->getNotnull($model7[$i])) $model7[$i]->save();
						 	}
								Yii::app()->user->setFlash('profile','Profile has been entered Successfully');	
						
						 }
						else
						Yii::app()->user->setFlash('profile','There is some problem in recordingm, info SARC Web CTM');	
					}else{
						Yii::app()->user->setFlash('profile','There is some problem in recordingm, info SARC Web CTM');	
					}
				}
			}
			
		}
		$this->render('add_profile1',array('model'=>$model,'model1'=>$model1,'model2'=>$model2,'model3'=>$model3,'model4_1'=>$model4_1,'model4_2'=>$model4_2,'model5'=>$model5,'model6'=>$model6,'model7'=>$model7));
	}
	
	public function actionSearchbox(){
		
			if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl.'site/login');
			if(!empty($_POST)){
				
				$model=Alumnus::model()->findAllByAttributes(array($_POST['optionselect']=> $_POST['contentfield']));
				$this->render('searchbox',array('model'=>$model));	
			}else{
			$this->render('searchbox');
			}
	}
	
	public function actionDetails($id=0){
			
			
			if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl.'site/login');
			if($id==0){
			/*$dataProvider = new CArrayDataProvider($this->getArray(), array(
                'sort' => array(
                    'attributes' => array(
                        'id', 'firstName', 'middleName', 'lastName','batch','department','degree','hostel','dateofbirth','gender'
                    ),
                ),
                'pagination' => array(
                    'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 15,
                    // 10 is the default pageSize
                ),
            ));*/
			$criteria = new CDbCriteria();
			
			if(isset($_GET['q']))
    		{

		      $q = $_GET['q'];
		      $criteria->compare('firstName', $q, true, 'OR');
		      $criteria->compare('lastName', $q, true, 'OR');
			  $criteria->compare('batch', $q, true, 'OR');
			  $criteria->compare('department', $q, true, 'OR');
			  $criteria->compare('hostel', $q, true, 'OR');
			  $criteria->compare('degree', $q, true, 'OR');
			}
			  $dataProvider=new CActiveDataProvider("Alumnus", array('criteria'=>$criteria,'pagination' => array(
                    'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 15,), ));
	

    		

		    $this->render('all', array(
        		'dataProvider' => $dataProvider,
		    ));
			}else{
			$post=Alumnus::model()->findBypk($id);
			$this->render('details',array('details'=>$post));
			}
	}
	
	public function actionEdit($id=0){
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl.'site/login');
			if($id==0){
					$criteria = new CDbCriteria();
			
			if(isset($_GET['q']))
    		{

		      $q = $_GET['q'];
		      $criteria->compare('firstName', $q, true, 'OR');
		      $criteria->compare('lastName', $q, true, 'OR');
			  $criteria->compare('batch', $q, true, 'OR');
			  $criteria->compare('department', $q, true, 'OR');
			  $criteria->compare('hostel', $q, true, 'OR');
			  $criteria->compare('degree', $q, true, 'OR');
			}
			  $dataProvider=new CActiveDataProvider("Alumnus", array('criteria'=>$criteria,'pagination' => array(
                    'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 15,), ));
	

    		

		    $this->render('all1', array(
        		'dataProvider' => $dataProvider,
		    ));
		}else{
		$model=Alumnus::model()->findBypk($id);
		$model1=Alumnus_emailid::model()->findByAttributes(array('alumnusId'=> $id));
		$model2=Alumnus_phnum::model()->findByAttributes(array('alumnusId'=> $id));
		if($model2==NULL) $model2=new Alumnus_phnum();
		$model3=Alumnus_info::model()->findByAttributes(array('alumnusId'=> $id));
		$model4=Alumnus_company::model()->findAllByAttributes(array('alumnusId'=> $id));
		if(array_key_exists(0, $model4)) $model4_1=$model4[0]; else $model4_1= new Alumnus_company();
		if(array_key_exists(1, $model4)) $model4_2=$model4[1]; else $model4_2= new Alumnus_company();
		$model5=Alumnus_social::model()->findByAttributes(array('alumnusId'=> $id));
		if($model5==NULL) $model5=new Alumnus_social();
		$model6=Alumnus_attended::model()->findAllByAttributes(array('alumnusId'=> $id));
		if(!isset($model6[0])) $model6[0]=new Alumnus_attended();
		$var_count=count($model6);
		for($i=$var_count;$i<$var_count+3;$i++){
			$model6[$i]=new Alumnus_attended();	
		}
		$model7=Alumnus_mailed::model()->findAllByAttributes(array('alumnusId'=> $id));
		if(!isset($model7[0])) $model7[0]=new Alumnus_mailed();
		$var_count=count($model7);
		for($i=$var_count;$i<$var_count+3;$i++){
			$model7[$i]=new Alumnus_mailed();	
		}
		$model8=Alumnus_contacted::model()->findAllByAttributes(array('alumnusId'=> $id));
		if(!isset($model8[0])) $model8[0]=new Alumnus_contacted();
		$var_count=count($model8);
		for($i=$var_count;$i<$var_count+3;$i++){
			$model8[$i]=new Alumnus_contacted();	
		}
		
		
		 if(isset($_POST['Alumnus'],$_POST['Alumnus_emailid'],$_POST['Alumnus_phnum'],$_POST['Alumnus_info'],$_POST['Alumnus_company'],$_POST['Alumnus_social'],$_POST['Alumnus_attended'],$_POST['Alumnus_mailed'],$_POST['Alumnus_contacted']))
		   {
				// Set attribute for home address
				$model->attributes=$_POST['Alumnus'];
				// Set attribute for company address
				$model1->attributes=$_POST['Alumnus_emailid'];
				// Set attribute for user data
				$model2->attributes=$_POST['Alumnus_phnum'];
				$model3->attributes=$_POST['Alumnus_info'];
				$model4_1->attributes=$_POST['Alumnus_company'][1];
				$model4_2->attributes=$_POST['Alumnus_company'][2];
				$model5->attributes=$_POST['Alumnus_social'];

		 
				// Validate all three model
				$valid=$model->validate(); 
				$valid=$model1->validate() && $valid;
				$valid=$model2->validate() && $valid;
				$valid=$model3->validate() && $valid;
				$valid=$model4_1->validate() && $valid;
				$valid=$model4_2->validate() && $valid;
				$valid=$model5->validate() && $valid;
				for($i=0;$i<count($_POST['Alumnus_attended']);$i++){
					$model6[$i]->attributes=$_POST['Alumnus_attended'][$i];
					$valid=$model6[$i]->validate() && $valid;
				}
				for($i=0;$i<count($_POST['Alumnus_mailed']);$i++){
					$model7[$i]->attributes=$_POST['Alumnus_mailed'][$i];
					$valid=$model7[$i]->validate() && $valid;
				}
				for($i=0;$i<count($_POST['Alumnus_contacted']);$i++){
					$model8[$i]->attributes=$_POST['Alumnus_contacted'][$i];
					$valid=$model8[$i]->validate() && $valid;
				}
		 
				if($valid)
				{       
						
					if($model->save() && $model1->save()){
						if ($model2->getNotnull($model2)) {  $model2->alumnusId=$model->id; $model2->save(); }
						if ($model3->getNotnull($model3)) { $model3->alumnusId=$model->id; $model3->save(); }
						if ($model4_1->getNotnull($model4_1)){ $model4_1->alumnusId=$model->id;  $model4_1->save(); }
						if ($model4_2->getNotnull($model4_2)) {  $model4_2->alumnusId=$model->id; $model4_2->save();  }
						if ($model5->getNotnull($model5)) {   $model5->alumnusId=$model->id ; $model5->save();  }
						for($i=0;$i<count($_POST['Alumnus_attended']);$i++){
				
							if ($model6[$i]->getNotnull($model6[$i])) { 
								$model6[$i]->alumnusId=$model->id ; 
								$model6[$i]->save(); 
							}
						}
						for($i=0;$i<count($_POST['Alumnus_mailed']);$i++){
				
							if ($model7[$i]->getNotnull($model7[$i])) { 
								$model7[$i]->alumnusId=$model->id ; 
								$model7[$i]->save(); 
							}
						}
						for($i=0;$i<count($_POST['Alumnus_contacted']);$i++){
				
							if ($model8[$i]->getNotnull($model8[$i])) { 
								$model8[$i]->alumnusId=$model->id ; 
								$model8[$i]->save(); 
							}
						}
								
						
						Yii::app()->user->setFlash('profile','Profile has been edited Successfully');	
					}else{
						Yii::app()->user->setFlash('profile','There is some problem in recording, info SARC Web CTM');					
					}
					
				}else{
					Yii::app()->user->setFlash('profile','Validation error, info SARC Web CTM');	
				}
			}
		$this->render('edit',array('model'=>$model,'model1'=>$model1,'model2'=>$model2,'model3'=>$model3,'model4_1'=>$model4_1,'model4_2'=>$model4_2,'model5'=>$model5,'model6'=>$model6,'model7'=>$model7,'model8'=>$model8));
			
		}
	}
	
	public function save($runValidation=false,$attributes=null)
	{
		if(!$runValidation || $this->validate($attributes))
		return $this->getIsNewRecord() ? $this->insert($attributes) : $this->update($attributes);
		else
		return false;
	}
	
	
	public function actionNGridView()
	{
    $dataProvider = new CArrayDataProvider($this->getArray(), array(
                'sort' => array(
                    'attributes' => array(
                        'id', 'firstName', 'middleName', 'lastName','batch','department','degree','hostel','dateofbirth','gender'
                    ),
                ),
                'pagination' => array(
                    'pageSize' => isset($_GET['pageSize']) ? $_GET['pageSize'] : 15,
                    // 10 is the default pageSize
                ),
            ));
    $this->render('all', array(
        'dataProvider' => $dataProvider,
    ));
	
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
	
	public function comparison($value){
		
		
		$value_arr=explode(':',$value);
		$arr_check=array("firstName","middleName","lastName","batch","department","degree","hostel");
		if(in_array($value_arr[0],$arr_check)){
			return true;
		}
	}
	
}