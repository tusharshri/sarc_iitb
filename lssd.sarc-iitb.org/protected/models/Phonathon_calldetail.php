<?php

class Phonathon_calldetail extends CActiveRecord
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
		return 'Phonathon_calldetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			/*array('firstName,lastName,batch,department, hostel,gender,emailId', 'required'),
			array('hostel', 'in', 'range'=>array(1,2,3,4,5,6,7,8,9,10,11,12,13,14)),
			array('firstName', 'length', 'max'=>20),
			array('middleName', 'length', 'max'=>20),
			array('lastName', 'length', 'max'=>20),	
			array('dateofbirth','length','max'=>11),*/
			//array('name,username,password', 'required'),
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
			'volunteer'=> array(self::HAS_MANY, 'Volunteer', 'volunteerId','together'=> true),			
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
			'alumnusId' => 'Alumnus Id',
			'talk_time' => 'Time',
			'remarks'=>'Remarks',
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