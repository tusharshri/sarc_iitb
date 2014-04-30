<?php

/**
 * This is the model class for table "StudentRegistration".
 *
 * The followings are the available columns in table 'StudentRegistration':
 * @property integer $id
 * @property integer $studentId
 * @property string $phaseYear
 * @property integer $step
 * @property string $sop
 * @property string $remarks
 * @property string $createdAt
 * @property string $updatedAt
 */
class AlumnusRegistration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StudentRegistration the static model class
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
		return 'Alumnusregistration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumnusId, phaseYear, step, updatedAt', 'required'),
			array('alumnusId, step', 'numerical', 'integerOnly'=>true),
			array('phaseYear', 'length', 'max'=>16),
			array('createdAt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumnusId, phaseYear, step, createdAt, updatedAt', 'safe', 'on'=>'search'),
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
            'alumnus' => array(self::BELONGS_TO, 'alumnus', 'id','together'=>true),
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
			'step' => 'Step',
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
		$criteria->compare('alumnusId',$this->alumnusId);
		$criteria->compare('phaseYear',$this->phaseYear,true);
		$criteria->compare('step',$this->step);
		$criteria->compare('createdAt',$this->createdAt,true);
		$criteria->compare('updatedAt',$this->updatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
