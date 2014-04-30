<?php

class Program_item extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_post':
	 * @var integer $id
	 * @var string $title
	 * @var string $content
	 * @var string $tags
	 * @var integer $status
	 * @var integer $create_time
	 * @var integer $update_time
	 * @var integer $author_id
	 */
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return 'program_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('item','length','max'=>40),
			//array('firstName, middleName,lastName', 'safe', 'on'=>'search'),
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
			'program' => array(self::HAS_MANY, 'Alumnus_program', 'enrolled_for','together'=> true),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'item'=>'Item',
		);
	}

	/**
	 * @return string the URL that shows the detail of the post
	 */
	
	
	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	/*protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->createAt=$this->updateAt=time();
			}
			else
				$this->updateAt=time();
			return true;
		}
		else
			return false;
	}*/

	/**
	 * This is invoked after the record is saved.
	 */
	
	/**
	 * Retrieves the list of posts based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the needed posts.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('firstName',$this->firstName,true);

		$criteria->compare('middleName',$this->middleName,true);

		$criteria->compare('lastName',$this->lastName,true);
		
		$criteria->compare('batch',$this->batch,true);		
		
		$criteria->compare('department',$this->department,true);
		
		$criteria->compare('gender',$this->gender,true);				

		return new CActiveDataProvider('Alumnus', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'firstName DESC',
			),
		));
	}
	
	public function save($runValidation=false,$attributes=null)
	{
		if(!$runValidation || $this->validate($attributes))
		return $this->getIsNewRecord() ? $this->insert($attributes) : $this->update($attributes);
		else
		return false;
	}
	
	
}