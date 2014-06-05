<?php

/**
 * This is the model class for table "AlumnusMentorshipPreference".
 *
 * The followings are the available columns in table 'AlumnusMentorshipPreference':
 * @property integer $id
 * @property integer $alumnusId
 * @property string $preference
 * @property integer $numberOfMentees
 * @property string $preferredDepartmentCode
 * @property string $areaOfInterest
 * @property string $updatedAt
 *
 * The followings are the available model relations:
 * @property Alumnus $alumnus
 */
class AlumnusMentorshipPreference extends CActiveRecord
{
  /**
   * Returns the static model of the specified AR class.
   * @return AlumnusMentorshipPreference the static model class
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
    return 'AlumnusMentorshipPreference';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
      array('alumnusId, preference, numberOfMentees, preferredDepartmentCode, areaOfInterest, updatedAt', 'required'),
      array('alumnusId, numberOfMentees', 'numerical', 'integerOnly'=>true),
      array('preference', 'length', 'max'=>13),
      array('preferredDepartmentCode', 'length', 'max'=>8),
      // The following rule is used by search().
      // Please remove those attributes that should not be searched.
      array('id, alumnusId, preference, numberOfMentees, preferredDepartmentCode, areaOfInterest, confirmation,status, updatedAt', 'safe', 'on'=>'search'),
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
      'preference' => 'Preference',
      'numberOfMentees' => 'Number Of Mentees',
      'preferredDepartmentCode' => 'Preferred Department Code',
      'areaOfInterest' => 'Area Of Interest',
      'confirmation'=>'Confirmation',
      'status'=>'Status',
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
    $criteria->compare('preference',$this->preference,true);
    $criteria->compare('numberOfMentees',$this->numberOfMentees);
    $criteria->compare('preferredDepartmentCode',$this->preferredDepartmentCode,true);
    $criteria->compare('areaOfInterest',$this->areaOfInterest,true);
    $criteria->compare('confirmation',$this->confirmation,true);
    $criteria->compare('status',$this->status,true);
    $criteria->compare('updatedAt',$this->updatedAt,true);

    return new CActiveDataProvider($this, array(
      'criteria'=>$criteria,
    ));
  }
}