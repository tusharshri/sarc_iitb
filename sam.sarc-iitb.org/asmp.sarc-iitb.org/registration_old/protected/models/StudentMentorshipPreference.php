<?php

/**
 * This is the model class for table "StudentMentorshipPreference".
 *
 * The followings are the available columns in table 'StudentMentorshipPreference':
 * @property integer $id
 * @property integer $studentId
 * @property integer $preferenceIndex
 * @property string $preference
 * @property string $preferredDepartmentCode
 * @property string $areaOfInterest
 * @property string $updatedAt
 *
 * The followings are the available model relations:
 * @property Student $student
 */
class StudentMentorshipPreference extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StudentMentorshipPreference the static model class
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
		return 'StudentMentorshipPreference';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('studentId, preferenceIndex, preference, preferredDepartmentCode, areaOfInterest', 'required'),
			array('studentId, preferenceIndex', 'numerical', 'integerOnly'=>true),
			array('preference', 'length', 'max'=>13),
			array('preferredDepartmentCode', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, studentId, preferenceIndex, preference, preferredDepartmentCode, areaOfInterest, updatedAt', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	
	public function getAreaOfInterestOptions(){
		return CHtml::listData(AlumnusMentorshipPreference::model()->findAll(array('select'=>'areaOfInterest', 'distinct'=>true,'order'=>'areaOfInterest')),'areaOfInterest','areaOfInterest');
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'studentId' => 'Student',
			'preference' => 'Preference',
			'preferredDepartmentCode' => 'Preferred Department',
			'areaOfInterest' => 'Area Of Interest',
            'secondpreference' => 'Preference',
			'secondpreferredDepartmentCode' => 'Preferred Department Code',
			'secondareaOfInterest' => 'Area Of Interest',

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
		$criteria->compare('preferenceIndex',$this->preferenceIndex);
		$criteria->compare('preference',$this->preference,true);
		$criteria->compare('preferredDepartmentCode',$this->preferredDepartmentCode,true);
		$criteria->compare('areaOfInterest',$this->areaOfInterest,true);
		$criteria->compare('updatedAt',$this->updatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function getPreferenceOptions(){
		return array(
			'' => 'Select',
			'Technical'=>'Technical',
			'Non-technical'=>'Non-technical',
		);
	}
    public function getDepartmentOptions(){
		return CHtml::listData(Department::model()->findAll(),'code','name');
	}
}
