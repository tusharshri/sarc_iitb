<?php

/**
 * This is the model class for table "Student".
 *
 * The followings are the available columns in table 'Student':
 * @property integer $id
 * @property string $rollNumber
 * @property string $ldapId
 * @property string $salutation
 * @property string $firstName
 * @property string $middleName
 * @property string $lastName
 * @property string $nickName
 * @property string $gender
 * @property integer $class
 * @property string $degree
 * @property string $departmentCode
 * @property string $hostel
 * @property string $roomNumber
 * @property string $dateOfBirth
 * @property string $phoneNumber
 * @property string $emailId
 * @property string $skypeId
 * @property string $confirmation
 * @property string $createdAt
 * @property string $updatedAt
 * @property string $step

 *
 * The followings are the available model relations:
 * @property AlumnusRemark[] $alumnusRemarks
 * @property MentorshipConnection[] $mentorshipConnections
 * @property MentorshipConnection[] $mentorshipConnections1
 * @property PhonathonVolunteer[] $phonathonVolunteers
 * @property Department $departmentCode0
 * @property StudentMentorshipContinue[] $studentMentorshipContinues
 * @property StudentMentorshipPreference[] $studentMentorshipPreferences
 * @property StudentRemark[] $studentRemarks
 * @property StudentRemark[] $studentRemarks1
 */
class Student extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Student the static model class
	 */
    public $resume;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rollNumber, firstName, lastName,  departmentCode, hostel, roomNumber, phoneNumber, emailId,', 'required'),
			array('rollNumber, degree, confirmation', 'length', 'max'=>16),
            array('phoneNumber', 'numerical'),

            array('ldapId, phoneNumber, skypeId', 'length', 'max'=>32),
            array('salutation, gender, departmentCode, roomNumber', 'length', 'max'=>8),
			array('firstName, middleName, nickName, skypeId, lastName, nickName, emailId', 'length', 'max'=>64),
			array('hostel', 'length', 'max'=>10),
            array('dateOfBirth, createdAt', 'safe'),
           // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, rollNumber, ldapId, salutation, firstName, middleName, lastName, nickName, gender, class, degree, departmentCode, hostel, roomNumber, dateOfBirth, phoneNumber, emailId, skypeId, createdAt, updatedAt', 'safe', 'on'=>'search'),
		);
	}
    public function getDepartmentOptions(){
		return CHtml::listData(Department::model()->findAll(),'code','name');
	}
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'alumnusRemarks' => array(self::HAS_MANY, 'AlumnusRemark', 'remarkedBy'),
			'mentorshipConnections' => array(self::HAS_MANY, 'MentorshipConnection', 'studentId'),
			'mentorshipConnections1' => array(self::HAS_MANY, 'MentorshipConnection', 'alloterId'),
			'phonathonVolunteers' => array(self::HAS_MANY, 'PhonathonVolunteer', 'studentId'),
			'mentorshipPreference' => array(self::HAS_MANY, 'StudentMentorshipPreference', 'studentId'), 
            'studentpreferencelists' => array(self::HAS_MANY, 'Studentpreferencelist', 'studentId'),
            'department' => array(self::BELONGS_TO, 'Department', 'departmentCode','together'=>true),
			'studentMentorshipContinues' => array(self::HAS_MANY, 'StudentMentorshipContinue', 'studentId'),
			'remarks' => array(self::HAS_MANY, 'StudentRemark', 'studentId'),
			'remarksMade' => array(self::HAS_MANY, 'StudentRemark', 'remarkedBy'),

            // check it
            'user_id' => array(self::BELONGS_TO, 'login', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'rollNumber' => 'Roll Number',
			'ldapId' => 'Ldap',
            'salutation' => 'Salutation',
			'firstName' => 'First Name',
			'middleName' => 'Middle Name',
			'lastName' => 'Last Name',
			'nickName' => 'Nick Name',
			'gender' => 'Gender',
			'class' => 'Class',
			'degree' => 'Degree',
			'departmentCode' => 'Department',
			'hostel' => 'Hostel',
			'roomNumber' => 'Room Number',
			'dateOfBirth' => 'Date Of Birth',
			'phoneNumber' => 'Phone Number',
			'emailId' => 'Email',
			'skypeId' => 'Skype',
			'createdAt' => 'Created At',
			'updatedAt' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        $criteria->compare('id',$this->id);
		$criteria->compare('rollNumber',$this->rollNumber,true);
		$criteria->compare('ldapId',$this->ldapId,true);
		$criteria->compare('salutation',$this->salutation,true);
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('middleName',$this->middleName,true);
		$criteria->compare('lastName',$this->lastName,true);
		$criteria->compare('nickName',$this->nickName,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('class',$this->class);
		$criteria->compare('degree',$this->degree,true);
		$criteria->compare('departmentCode',$this->departmentCode,true);
		$criteria->compare('hostel',$this->hostel,true);
		$criteria->compare('roomNumber',$this->roomNumber,true);
		$criteria->compare('dateOfBirth',$this->dateOfBirth,true);
		$criteria->compare('phoneNumber',$this->phoneNumber,true);
		$criteria->compare('emailId',$this->emailId,true);
		$criteria->compare('skypeId',$this->skypeId,true);
		$criteria->compare('confirmation',$this->confirmation,true);
		$criteria->compare('createdAt',$this->createdAt,true);
		$criteria->compare('updatedAt',$this->updatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function getGenderOptions(){
        return array(
			'' => 'Select',
            'M' => 'Male',
            'F' => 'Female',
        );
    }
    public function getSalutationOptions(){
		return array(
			'' => 'Select',
			'Mr.'=>'Mr.',
			'Mrs.'=>'Mrs.',
			'Ms.'=>'Ms.',
			'Dr.'=>'Dr.',
		);
	}

}
