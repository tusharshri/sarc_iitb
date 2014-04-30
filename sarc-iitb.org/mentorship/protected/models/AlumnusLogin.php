<?php

/**
 * This is the model class for table "AlumnusLogin".
 *
 * The followings are the available columns in table 'AlumnusLogin':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $encrypted_password
 * @property string $role
 * @property string $updatedAt
 * @property string $lastLogin
 * @property string $status
 */
class AlumnusLogin extends CActiveRecord
{
  /**
   * Returns the static model of the specified AR class.
   * @return AlumnusLogin the static model class
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
    return 'AlumnusLogin';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('username, password', 'required'),
      array('username', 'length', 'max'=>32),
      array('password, encrypted_password', 'length', 'max'=>128),
      array('lastLogin', 'safe'),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, username, encrypted_password, role, updatedAt, lastLogin, status', 'safe', 'on'=>'search'),
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
      'roleAssignments' => array(self::HAS_MANY, 'RoleAssignment', 'alumnusLoginId'),
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
      'role' => 'Role',
      'updatedAt' => 'Updated At',
      'lastLogin' => 'Last Login',
      'status' => 'Status',
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
    //$criteria->compare('password',$this->password,true);
    $criteria->compare('encrypted_password',$this->encrypted_password,true);
    $criteria->compare('role',$this->role,true);
    $criteria->compare('updatedAt',$this->updatedAt,true);
    $criteria->compare('lastLogin',$this->lastLogin,true);
    $criteria->compare('status',$this->status,true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }
}