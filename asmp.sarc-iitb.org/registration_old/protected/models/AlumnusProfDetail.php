<?php

/**
 * This is the model class for table "AlumnusProfDetail".
 *
 * The followings are the available columns in table 'AlumnusProfDetail':
 * @property integer $id
 * @property integer $alumnusId
 * @property string $designation
 * @property string $company
 * @property integer $industryId
 * @property string $address
 * @property string $city
 * @property string $state
 * @property integer $pincode
 * @property integer $countryId
 * @property string $updatedAt
 *
 * The followings are the available model relations:
 * @property Alumnus $alumnus
 * @property Industry $industry
 * @property Country $country
 */
class AlumnusProfDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AlumnusProfDetail the static model class
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
		return 'AlumnusProfDetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alumnusId, industryId, address, city, state, pincode, countryId, updatedAt', 'required'),
			array('alumnusId, industryId, pincode, countryId', 'numerical', 'integerOnly'=>true),
			array('designation, company, city, state', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, alumnusId, designation, company, industryId, address, city, state, pincode, countryId, updatedAt', 'safe', 'on'=>'search'),
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
			'industry' => array(self::BELONGS_TO, 'Industry', 'industryId'),
			'country' => array(self::BELONGS_TO, 'Country', 'countryId'),
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
			'designation' => 'Designation',
			'company' => 'Company',
			'industryId' => 'Industry',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'pincode' => 'Pincode',
			'countryId' => 'Country',
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
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('industryId',$this->industryId);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('pincode',$this->pincode);
		$criteria->compare('countryId',$this->countryId);
		$criteria->compare('updatedAt',$this->updatedAt,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}