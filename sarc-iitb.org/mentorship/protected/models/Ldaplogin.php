<?php
class Ldaplogin extends CFormModel
{


    public $username;
    public $password;
    public $rememberMe=false;


     private $_identity;

    public function rules()
    {
        return array(
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
        );
    }
    public function ldapverify($username, $passwrd){
                $ch = curl_init();
                $curlPost="ldapid=".$username."&password=".urlencode($passwrd);
                //echo $curlPost;
                //curl_setopt($ch, CURLOPT_URL, 'http://www.iitb.ac.in/sarc/mentorship-login/mentee/submit_auth_1.php');
				curl_setopt($ch, CURLOPT_URL, 'http://home.iitb.ac.in/~ajaybhatt17/ldap_auth.php');
                //curl_setopt($ch, CURLOPT_HEADER, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
                $data = curl_exec($ch);
                return $data;
				curl_close($ch);
                }
    public function login(){
    }
    public function attributeLabels()
	{
		return array(
			'username' => 'LDAP Id',
			'password' => 'LDAP Password',
		);
	}
}