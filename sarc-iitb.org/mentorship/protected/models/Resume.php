<?php


class Resume extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Student the static model class
	 */
    public $resume;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'StudentRegistration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resume', 'file',
                  'types'=>'jpg, gif, png, pdf, doc, docx',
                  'maxSize'=>1024 * 1024 * 10, // 10MB
                  'tooLarge'=>'The file was larger than 10MB. Please upload a smaller file.',
            ),
            array('resume', 'safe'),

			// Please remove those attributes that should not be searched.
		);
	}

	/**
	 * @return array relational rules.
	 */

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'resume'=>'Resume',
	    );
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */



}
