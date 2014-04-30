<?php

class Mentorship_allotment extends CActiveRecord
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
		return 'mentorship_allotment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
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
			'attended' => array(self::HAS_MANY, 'Alumnus_attended', 'alumnusId','together'=> true),
			'company' => array(self::HAS_MANY, 'Alumnus_company', 'alumnusId','together'=> true),
			'contacted' => array(self::HAS_MANY, 'Alumnus_contacted', 'alumnusId','together'=> true),
			'emailid' => array(self::HAS_MANY, 'Alumnus_emailid', 'alumnusId','together'=> true),
			'extra' => array(self::HAS_MANY, 'Alumnus_extra', 'alumnusId','together'=> true),
			'info' => array(self::HAS_MANY, 'Alumnus_info', 'alumnusId','together'=> true),									
			'company' => array(self::HAS_MANY, 'Alumnus_company', 'alumnusId','together'=> true),
			'mailed' => array(self::HAS_MANY, 'Alumnus_mailed', 'alumnusId','together'=> true),			
			'phnum' => array(self::HAS_MANY, 'Alumnus_phnum', 'alumnusId','together'=> true),		
			'program' => array(self::HAS_MANY, 'Alumnus_program', 'alumnusId','together'=> true),
			'social' => array(self::HAS_MANY, 'Alumnus_social', 'alumnusId','together'=> true),
			'country'=>	array(self::HAS_MANY, 'Country', 'id','together'=> true),
			'department'=>	array(self::HAS_MANY, 'Department', 'id','together'=> true),
			'IndustryId'=>	array(self::HAS_MANY, 'Industry', 'id','together'=> true),
			'program_item'=> array(self::HAS_MANY, 'Program_item', 'id','together'=> true),
			'agenda_item'=> array(self::HAS_MANY, 'Agenda_item', 'id','together'=> true),
			'extra_activity'=> array(self::HAS_MANY, 'Extra_activity', 'id','together'=> true),			
			'student'=>array(self::HAS_MANY, 'Student', 'id','together'=> true),			
			/*'comments' => array(self::HAS_MANY, 'Comment', 'post_id', 'condition'=>'comments.status='.Comment::STATUS_APPROVED, 'order'=>'comments.create_time DESC'),
			'commentCount' => array(self::STAT, 'Comment', 'post_id', 'condition'=>'status='.Comment::STATUS_APPROVED),*/
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'firstName' => 'First Name',
			'middleName' => 'Middle Name',
			'lastName' => 'Last Name',
			'batch' => 'Batch',
			'hostel' => 'Hostel',
			'department' => 'Department',
			'dateofbirth' => 'Date of Birth',
			'gender' => 'Gender',
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