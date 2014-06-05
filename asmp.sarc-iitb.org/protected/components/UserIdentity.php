<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.

	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}
      */
    private $_id;
    public $error;

    public function authenticate()
    {        
        $record=AlumnusLogin::model()->findByAttributes(array('username'=>$this->username));
        //echo md5($this->password);
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->encrypted_password!==md5($this->password))   {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;   }
        else
        {
            $session=new CHttpSession;
            $session->open();
            $this->_id=$record->id;
            $session['alumnusId']=$this->id;
            $this->setState('id', $record->id);
            $this->setState('role', $record->role);
            $this->errorCode=self::ERROR_NONE;
            date_default_timezone_set('Asia/Kolkata');
            $user=AlumnusLogin::model()->findByAttributes(array('id'=>$session['alumnusId']));
            $user->lastLogin=date('Y-m-d G:i:s');
            $user->save();
        }
        return !$this->errorCode;
    }

    public function ldapAuthenticate()
    {
        //if(Yii::app()->user->isGuest){
        $error=false;
        if(isset($_GET['error'])){
            $error=$_GET['error'];
        }
        $model=new Ldaplogin; 
        $model->username=$this->username;
        $model->password=$this->password;
        if($model->ldapverify($this->username, $this->password)!="failed" && $model->ldapverify($this->username, $this->password)!="" ){
            $session=new CHttpSession;
            $session->open();
            $session['rollNumber']=$model->ldapverify($this->username, $this->password);
            $mLogin=new Login;
            if($mLogin->exists('rollNumber="'.$session['rollNumber'].'"')){
                $session['studentId']=$mLogin->findByAttributes(array('rollNumber'=>$session['rollNumber']))->id;
                date_default_timezone_set('Asia/Kolkata');
                $record=$mLogin->findByAttributes(array('id'=>$session['studentId']));
                $record->lastLogin=date('Y-m-d G:i:s');
                $record->save();
                
                $this->_id=$record->id;
                $this->setState('id', $record->id);
                $this->setState('role', $record->role);
                $this->errorCode=self::ERROR_NONE;
            }else if(isset($_SESSION['controller']) && $_SESSION['controller']=="StudentRegistration"){ // Incase of student registration create a new entry and login
                $record= new Login;
                date_default_timezone_set('Asia/Kolkata');
                $record->status="enabled";
                $record->username=$this->username;
                $record->rollNumber=$_SESSION['rollNumber'];
                $record->role="student";
                $record->lastLogin=date('Y-m-d G:i:s');
                $record->save();  
        
                $session['studentId']=$record->id;      
                $this->_id=$record->id;
                $this->setState('id', $record->id);
                $this->setState('role', $record->role);
                $this->errorCode=self::ERROR_NONE;
                unset($_SESSION['controller']);         
            }else {
		        //$this->redirect('ldaplogin?error=notfound');
                $this->errorCode=self::ERROR_USERNAME_INVALID;
                $this->setState('role',"student");
                $this->error="notfound";
	        }
        }
        else{
          //$this->redirect('ldaplogin?error=invalid');
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            $this->error="invalid";
        }
        /*
        $this->render('index', array(
            'model'=>$model,
            'error'=>$error,
        ));
        */  
        //else $this->redirect("student/create");
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($identity){
        $this->_id=$identity;
    }

}
