<?php

/**
 * This is the model class for table "AlumnusMentorshipContinue".
 *
 * The followings are the available columns in table 'AlumnusMentorshipContinue':
 * @property integer $id
 * @property integer $alumnusId
 * @property string $phaseYear
 * @property string $confirmationCode
 * @property integer $confirmed
 * @property string $suggestion
 * @property integer $tos
 * @property string $status
 * @property string $createdAt
 *
 * The followings are the available model relations:
 * @property Alumnus $alumnus
 * @property MentorshipPhase $phaseYear0
 */
class AlumnusMentorshipContinue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlumnusMentorshipContinue the static model class
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
		return 'AlumnusMentorshipContinue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumnusId, phaseYear, confirmationCode, suggestion, createdAt', 'required'),
			array('alumnusId, confirmed, tos', 'numerical', 'integerOnly'=>true),
			array('phaseYear, confirmationCode', 'length', 'max'=>16),
			array('status', 'length', 'max'=>13),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumnusId, phaseYear, confirmationCode, confirmed, suggestion, tos, status, createdAt', 'safe', 'on'=>'search'),
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
			'phaseYear0' => array(self::BELONGS_TO, 'MentorshipPhase', 'phaseYear'),
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
			'phaseYear' => 'Phase Year',
			'confirmationCode' => 'Confirmation Code',
			'confirmed' => 'Confirmed',
			'suggestion' => 'Suggestion',
			'tos' => 'Tos',
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
		$criteria->compare('alumnusId',$this->alumnusId);
		$criteria->compare('phaseYear',$this->phaseYear,true);
		$criteria->compare('confirmationCode',$this->confirmationCode,true);
		$criteria->compare('confirmed',$this->confirmed);
		$criteria->compare('suggestion',$this->suggestion,true);
		$criteria->compare('tos',$this->tos);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('createdAt',$this->createdAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}