<?php

/**
 * This is the model class for table "AlumnusEmailId".
 *
 * The followings are the available columns in table 'AlumnusEmailId':
 * @property integer $id
 * @property integer $alumnusId
 * @property string $emailId
 * @property string $type
 * @property string $comment
 * @property integer $status
 * @property string $confirmation
 * @property string $updatedAt
 *
 * The followings are the available model relations:
 * @property Alumnus $alumnus
 */
class AlumnusEmailId extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlumnusEmailId the static model class
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
		return 'AlumnusEmailId';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumnusId, emailId, type,updatedAt', 'required'),
			array('alumnusId', 'numerical', 'integerOnly'=>true),
			array('emailId', 'length', 'max'=>64),
			array('emailId', 'email'),
			array('type', 'in', 'range'=>array('primary','work','iitbombay.org','other')),
			array('confirmation', 'length', 'max'=>16),
            array('updatedAt,verify,comment','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumnusId, emailId, type, comment, status, confirmation, verify, updatedAt', 'safe', 'on'=>'search'),
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
			'emailId' => 'Email',
			'type' => 'Type',
			'comment' => 'Comment',
			'status' => 'Status',
			'confirmation' => 'Confirmation',
            'verify' => 'Verification Code',
			'updatedAt' => 'Updated At',
		);
	}

	public function beforeValidate()
	{
		//TODO: set the value of confirmation
        return true;
	}

	private function randomuniqueConfirm(){}//TODO: fill in this function email confirmation

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
		$criteria->compare('emailId',$this->emailId,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('confirmation',$this->confirmation,true);
		$criteria->compare('verify',$this->verify);
		$criteria->compare('updatedAt',$this->updatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    
    public function getEmailTypeOptions(){
        return array(
            'primary'=>'primary',
            'work'=>'work',
            'iitbombay.org'=>'iitbombay.org',
            'other'=>'other',
        );
    }
}
