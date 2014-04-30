<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class AlumnusForm extends CFormModel
{
	public $firstName;
	public $middleName;
	public $lastName;
	public $batch;
	public $department;
	public $hostel;
	public $dateofbirth;
	public $gender;
	/*public $address;
	public $city;
	public $state;
	public $pincode;
	public $country;
	public $emailId1;
	public $emailId2;
	public $emailId3;
	public $phoneNo1;
	public $phoneNo2;
	public $phoneNo3;
	public $designation;
	public $company;
	public $industry;
	public $jobNumber;
	public $job_country;
	public $facebook_url;
	public $skype_url;
	public $linkedin_url;	
	public $interested_in;
	public $field;*/

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{   
		return array(    
			// name, email, subject and     body are required
			array('firstName, lastName, batch, department, hostel, dateofbirth, gender','required'),
			// email has to be a valid email address
			//array('emailId1,emailId2,emailId3', 'email'),
			//array('phoneNo1,phoneNo2,phoneNo3', 'number'),
			// verifyCode needs to be entered correctly
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	/*public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'firstName' => 'firstName',
			'middleName' => 'firstName',
			'lastName' => 'lastName',
			'batch' => 'batch',
			'department' => 'department',
			'hostel' => 'hostel',
			'dateofbirth' => 'dateofbirth',
			'gender'=>'gender'
		);
	}*/
	
	
}