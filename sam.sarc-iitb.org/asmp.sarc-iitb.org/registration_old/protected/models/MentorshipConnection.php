<?php

/**
 * This is the model class for table "MentorshipConnection".
 *
 * The followings are the available columns in table 'MentorshipConnection':
 * @property integer $id
 * @property integer $alumnusId
 * @property integer $studentId
 * @property string $status
 * @property integer $alloterId
 * @property string $phaseYear
 *
 * The followings are the available model relations:
 * @property Alumnus $alumnus
 * @property Student $student
 * @property Student $alloter
 */
class MentorshipConnection extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MentorshipConnection the static model class
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
		return 'MentorshipConnection';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumnusId, studentId, alloterId, phaseYear', 'required'),
			array('alumnusId, studentId, alloterId', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>10),
			array('phaseYear', 'length', 'max'=>16),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumnusId, studentId, status, alloterId, phaseYear', 'safe', 'on'=>'search'),
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
			'alumnus' => array(self::BELONGS_TO, 'Alumnus', 'alumnusId'),
			'student' => array(self::BELONGS_TO, 'Student', 'studentId'),
			'alloter' => array(self::BELONGS_TO, 'Student', 'alloterId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'alumnusId' => 'Alumnus',
			'studentId' => 'Student',
			'status' => 'Status',
			'alloterId' => 'Alloter',
			'phaseYear' => 'Phase Year',
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
		$criteria->compare('alumnusId',$this->alumnusId);
		$criteria->compare('studentId',$this->studentId);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('alloterId',$this->alloterId);
		$criteria->compare('phaseYear',$this->phaseYear,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}