<?php

class Alumnus_info extends CActiveRecord
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
		return 'alumnus_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		/*return array(
			array('firstName, middleName,lasstName,batch,department, hostel,dateofbirth,gender', 'required'),
			array('hostel', 'in', 'range'=>array(1,2,3,4,5,6,7,8,9,10,11,12,13,14)),
			array('firstName', 'length', 'max'=>20),
			array('middleName', 'length', 'max'=>20),
			array('lastName', 'length', 'max'=>20),	
			array('firstName, middleName,lastName', 'safe', 'on'=>'search'),
			
		);*/
		return array(
			array('address','length','max'=>60),
			array('state,city','length','max'=>30),
			array('pincode','length','max'=>10),
			array('country','length','max'=>10),
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
			'alumnus' => array(self::BELONGS_TO, 'Alumnus', 'alumnusId','together'=> true),			
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
			'alumnusId' => 'alumnusId',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'pincode' => 'Pincode',
			'country' => 'Country',
			'updatedAt' => 'Updated time',
		);
	}

	public function getNotnull($arr){
		
		if($arr->address==NULL && $arr->city==NULL && $arr->state==NULL && $arr->pincode==NULL)
			return false;
		else 
			return true;
		
	}

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

		return new CActiveDataProvider('Post', array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'firstName, updateAt DESC',
			),
		));
	}
}