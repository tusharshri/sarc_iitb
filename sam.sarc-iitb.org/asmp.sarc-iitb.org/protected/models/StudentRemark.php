<?php

/**
 * This is the model class for table "StudentRemark".
 *
 * The followings are the available columns in table 'StudentRemark':
 * @property integer $id
 * @property integer $studentId
 * @property string $occasion
 * @property string $remarks
 * @property integer $remarkedBy
 * @property string $createdAt
 *
 * The followings are the available model relations:
 * @property Student $student
 * @property Student $remarkedBy0
 */
class StudentRemark extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StudentRemark the static model class
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
		return 'StudentRemark';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('studentId, occasion, remarks, createdAt', 'required'),
			array('studentId, remarkedBy', 'numerical', 'integerOnly'=>true),
			array('occasion', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, studentId, occasion, remarks, remarkedBy, createdAt', 'safe', 'on'=>'search'),
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
			'remarkedBy0' => array(self::BELONGS_TO, 'Student', 'remarkedBy'),
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
			'occasion' => 'Occasion',
			'remarks' => 'Remarks',
			'remarkedBy' => 'Remarked By',
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
		$criteria->compare('studentId',$this->studentId);
		$criteria->compare('occasion',$this->occasion,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('remarkedBy',$this->remarkedBy);
		$criteria->compare('createdAt',$this->createdAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}