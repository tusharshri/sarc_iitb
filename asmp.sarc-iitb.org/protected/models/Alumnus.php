<?php

/**
 * This is the model class for table "Alumnus".
 *
 * The followings are the available columns in table 'Alumnus':
 * @property integer $id
 * @property integer $profileId
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
 * @property string $dateOfBirth
 * @property string $skypeId
 * @property string $website
 * @property string $linkedin
 * @property string $workProfile
 * @property string $status
 * @property string $createdAt
 * @property string $updatedAt
 *
 * The followings are the available model relations:
 * @property Department $department
 * @property EmailId[] $emailIds
 * @property MentorshipContinue[] $mentorshipContinues
 * @property MentorshipPreference[] $mentorshipPreferences
 * @property PersonalDetail[] $personalDetails
 * @property PhoneNumber[] $phoneNumbers
 * @property ProfDetail[] $profDetails
 * @property Remark[] $remarks
 * @property MentorshipConnection[] $mentorshipConnections
 */
class Alumnus extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Alumnus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Alumnus';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array( // we can use attribute on to specify specific scenarios under which check should be followed
			array('salutation, firstName, lastName, class, degree, departmentCode', 'required'),
			//array('profileId, class', 'numerical', 'integerOnly'=>true),
			array('firstName, middleName, lastName, nickName', 'length', 'max'=>64),
			array('salutation','in','range'=>array_keys($this->getSalutationOptions())),
			array('gender','in','range'=>array_keys($this->getGenderOptions()),'message'=>'Invalid Gender'),
			array('gender', 'validateGender'),
			array('degree', 'in', 'range'=>array_keys($this->getDegreeOptions())),
			//array('department', 'in', 'range'=>$departmentList),
			array('departmentCode', 'validateDepartment'),
			array('skypeId', 'length', 'max'=>32),
			array('website, linkedin', 'length', 'max'=>128),
			array('website, linkedin','url','allowEmpty'=>true),
            array('hostel,prefLocked,workProfile','safe'),
			array('status', 'length', 'max'=>12), //TODO:PHP:insert with 1-pending
			array('status', 'in', 'range'=> array('0-working','1-pending','2-unsure','3-confirmed','4-notalumnus')),
			array('dateOfBirth','default','value'=>'0000-00-00'),
			// array('dateOfBirth', 'date','format'=>'yyyy-M-d','allowEmpty'=>true), // TODO:Defaults to 'MM/dd/yyyy' format
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, profileId, salutation,prefLocked, firstName, middleName, lastName, nickName, gender, class, degree, departmentCode, hostel, dateOfBirth, skypeId, website, linkedin, workProfile, status, createdAt, updatedAt', 'safe', 'on'=>'search'),
		);
	}

	public function validateGender(){
		if(	($this->salutation!='Dr.') && ( 
				($this->gender=='M'&& $this->salutation!='Mr.') || 	
				($this->gender=='F' && ($this->salutation!='Mrs.'&& $this->salutation!='Ms.'))
			))
			$this->addError('gender','Gender doesn\'t match with your salutation ');
	}

	public function validateDepartment(){ // TODO:Needs improvement
		$valid=false;
		$connection=Yii::app()->db;
		$departmentList=$connection->createCommand("SELECT code FROM Department")->queryColumn();
		foreach($departmentList as $dept)
			if($dept==$this->departmentCode)$valid=true;
		if(!$valid) $this->addError('departmentCode','Department not in the list');
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'department' => array(self::BELONGS_TO, 'Department', 'departmentCode', 'together'=>true),
			'emailIds' => array(self::HAS_MANY, 'AlumnusEmailId', 'alumnusId', 'together'=> true),
			'mentorshipContinues' => array(self::HAS_MANY, 'AlumnusMentorshipContinue', 'alumnusId', 'together'=> true),
			'mentorshipPreferences' => array(self::HAS_MANY, 'AlumnusMentorshipPreference', 'alumnusId', 'together'=> true),
			'personalDetails' => array(self::HAS_MANY, 'AlumnusPersonalDetail', 'alumnusId', 'together'=> true),
			'phoneNumbers' => array(self::HAS_MANY, 'AlumnusPhoneNumber', 'alumnusId', 'together'=> true),
			'profDetails' => array(self::HAS_MANY, 'AlumnusProfDetail', 'alumnusId', 'together'=> true),
			'outbox'=>array(self::HAS_MANY, 'Sendmessage_alumnus', 'alumnusId', 'together'=> true),
			'inbox'=>array(self::HAS_MANY, 'Sendmessage_student', 'alumnusId', 'together'=> true),
			'remarks' => array(self::HAS_MANY, 'AlumnusRemark', 'alumnusId'),
			'mentorshipConnections' => array(self::HAS_MANY, 'MentorshipConnection', 'alumnusId', 'together'=> true),
			'preferredBy' => array(self::HAS_MANY, 'StudentPreferenceList', 'alumnusId'),
			'preferredStudents' => array(self::HAS_MANY, 'AlumnusPreferenceList', 'alumnusId'),
			'alumnusprfpic'=>array(self::HAS_MANY, 'ALumnusprfpic', 'alumnusId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'profileId' => 'Profile ID',
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
			'dateOfBirth' => 'Date Of Birth',
			'skypeId' => 'Skype ID',
			'website' => 'Website',
			'linkedin' => 'Linkedin public profile',
			'workProfile' => 'Work Profile',
			'status' => 'Status',
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
		$criteria->compare('profileId',$this->profileId);
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
		$criteria->compare('dateOfBirth',$this->dateOfBirth,true);
		$criteria->compare('skypeId',$this->skypeId,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('workProfile',$this->workProfile,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('createdAt',$this->createdAt,true);
		$criteria->compare('updatedAt',$this->updatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getDepartment(){
        $mDepartment=Department::model()->findByAttributes(array('code'=>$this->departmentCode));
        return $mDepartment->name;
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
	public function getDegreeOptions(){
        return array(
			'' => 'Select',
            'B.Tech.' => 'B.Tech.',
            'M.Tech.' => 'M.Tech.',
			'Dual Degree' => 'Dual Degree',
			'M.Sc'=>'M.Sc',
			'Ph.D'=>'Ph.D',
			'M.Des'=>'M.Des',
			'M.Mgt'=>'M.Mgt',			
        );
    }
	public function getDepartmentOptions(){
		return CHtml::listData(Department::model()->findAll(),'code','name');
	}
	
	public function getHostelOptions(){
        return array(
			'' => 'Select',
            'H1' => 'H1',
			'H2' => 'H2',
			'H3' => 'H3',
			'H4' => 'H4',
			'H5' => 'H5',
			'H6' => 'H6',
			'H7' => 'H7',
			'H8' => 'H8',
			'H9' => 'H9',
			'H10' => 'H10',
			'H11' => 'H11',
			'H12' => 'H12',
			'H13' => 'H13',
            
        );
    }

}
