<?php

/**
 * This is the model class for table "MentorshipPhase".
 *
 * The followings are the available columns in table 'MentorshipPhase':
 * @property integer $id
 * @property string $phaseYear
 * @property integer $phase
 * @property integer $year
 * @property string $startedOn
 * @property string $endedOn
 * @property string $status
 * @property string $createdAt
 *
 * The followings are the available model relations:
 * @property AlumnusMentorshipContinue[] $alumnusMentorshipContinues
 * @property StudentMentorshipContinue[] $studentMentorshipContinues
 */
class MentorshipPhase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MentorshipPhase the static model class
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
		return 'MentorshipPhase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phaseYear, phase, year, startedOn, createdAt', 'required'),
			array('phase, year', 'numerical', 'integerOnly'=>true),
			array('phaseYear', 'length', 'max'=>16),
			array('status', 'length', 'max'=>10),
			array('endedOn', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, phaseYear, phase, year, startedOn, endedOn, status, createdAt', 'safe', 'on'=>'search'),
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
			'alumnusMentorshipContinues' => array(self::HAS_MANY, 'AlumnusMentorshipContinue', 'phaseYear'),
			'studentMentorshipContinues' => array(self::HAS_MANY, 'StudentMentorshipContinue', 'phaseYear'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'phaseYear' => 'Phase Year',
			'phase' => 'Phase',
			'year' => 'Year',
			'startedOn' => 'Started On',
			'endedOn' => 'Ended On',
			'status' => 'Status',
			'createdAt' => 'Created At',
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
		$criteria->compare('phaseYear',$this->phaseYear,true);
		$criteria->compare('phase',$this->phase);
		$criteria->compare('year',$this->year);
		$criteria->compare('startedOn',$this->startedOn,true);
		$criteria->compare('endedOn',$this->endedOn,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('createdAt',$this->createdAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}