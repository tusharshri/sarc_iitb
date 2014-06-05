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
 * @property string $sop
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
class Sop extends CActiveRecord
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
		return 'StudentRegistration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sop', 'required'),
			array('resume', 'file',
                  'types'=>'jpg, gif, png, pdf, doc, docx',
                  'maxSize'=>1024 * 1024 * 10, // 10MB
                  'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
            ),
            array('sop', 'length', 'min'=>60),
            array('resume', 'safe'),

			// Please remove those attributes that should not be searched.
		);
	}

	/**
	 * @return array relational rules.
	 */

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sop' => 'SOP',
			'resume'=>'Resume',
	    );
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */



}
