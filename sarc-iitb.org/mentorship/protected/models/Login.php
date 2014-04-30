<?php

/**
 * This is the model class for table "Login".
 *
 * The followings are the available columns in table 'Login':
 * @property integer $id
 * @property string $username
 * @property string $encrypted_password


 * @property string $updatedAt
 * @property string $lastLogin
 *
 * The followings are the available model relations:
 * @property RoleAssignment[] $roleAssignments
 */
class Login extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Login the static model class
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
		return 'Login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('username', 'length', 'max'=>32),
			array('encrypted_password', 'length', 'max'=>128),
			array('lastLogin, role, rollNumber', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, encrypted_password, updatedAt, lastLogin', 'safe', 'on'=>'search'),
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
			'roleAssignments' => array(self::HAS_MANY, 'RoleAssignment', 'loginId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'encrypted_password' => 'Encrypted Password',
			'uid' => 'Uid',
			'updatedAt' => 'Updated At',
			'lastLogin' => 'Last Login',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('encrypted_password',$this->encrypted_password,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('updatedAt',$this->updatedAt,true);
		$criteria->compare('lastLogin',$this->lastLogin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
