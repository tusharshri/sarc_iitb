<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
    public $role;
	public $rememberMe;
    
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password, role', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
        {
            $this->_identity=new UserIdentity($this->username,$this->password);
            //if(!$this->_identity->authenticate())
			if(($this->role=="alumnus" && !$this->_identity->authenticate()) || ($this->role=="student" && !$this->_identity->ldapAuthenticate()))
                $this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
            if($this->role=="alumnus"){
			    $this->_identity->authenticate();

            }else if($this->role=="student"){
                $this->_identity->ldapAuthenticate();
            }
        }
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}else{
			return false;
        }
	}


	/**
	 * Logs in the user using the given username and password in the model Stores Registers his data if not already saved.
	 * @return boolean whether login is successful
	 */
	public function register()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
            if($this->role=="alumnus"){
			    $this->_identity->authenticate();

            }else if($this->role=="student"){
                $this->_identity->ldapAuthenticate();
            }
        }
        ///echo "####".$this->_identity->errorCode;
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}else if($this->_identity->error=="notfound"){ // New user
            
            $duration=$this->rememberMe ? 3600*24*30 : 0;
			Yii::app()->user->login($this->_identity,$duration);
            return true;
        }else{
			return false;
        }
	}
}
