<?php

/**
 * This is the model class for table "PhonathonVolunteer".
 *
 * The followings are the available columns in table 'PhonathonVolunteer':
 * @property integer $id
 * @property integer $studentId
 * @property string $freeSlot
 * @property string $preferredDepartmentCode
 * @property string $preferredHostel
 * @property string $suggestion
 * @property integer $phonathon
 * @property string $updatedAt
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Department $preferredDepartmentCode0
 */
class PhonathonVolunteer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return PhonathonVolunteer the static model class
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
		return 'PhonathonVolunteer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('studentId, freeSlot, preferredDepartmentCode, preferredHostel, suggestion, phonathon, updatedAt', 'required'),
			array('studentId, phonathon', 'numerical', 'integerOnly'=>true),
			array('preferredDepartmentCode', 'length', 'max'=>8),
			array('preferredHostel', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, studentId, freeSlot, preferredDepartmentCode, preferredHostel, suggestion, phonathon, updatedAt', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'student' => array(self::BELONGS_TO, 'Student', 'studentId'),
			'preferredDepartmentCode0' => array(self::BELONGS_TO, 'Department', 'preferredDepartmentCode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'studentId' => 'Student',
			'freeSlot' => 'Free Slot',
			'preferredDepartmentCode' => 'Preferred Department Code',
			'preferredHostel' => 'Preferred Hostel',
			'suggestion' => 'Suggestion',
			'phonathon' => 'Phonathon',
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
		$criteria->compare('studentId',$this->studentId);
		$criteria->compare('freeSlot',$this->freeSlot,true);
		$criteria->compare('preferredDepartmentCode',$this->preferredDepartmentCode,true);
		$criteria->compare('preferredHostel',$this->preferredHostel,true);
		$criteria->compare('suggestion',$this->suggestion,true);
		$criteria->compare('phonathon',$this->phonathon);
		$criteria->compare('updatedAt',$this->updatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}