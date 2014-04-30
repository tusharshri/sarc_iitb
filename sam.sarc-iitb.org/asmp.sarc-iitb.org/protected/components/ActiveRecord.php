<?php
/*
This is customized CActiveRecord class to include a function $object->url to get its url instead of $controller->createUrl('post/list') 
Just write new model classes which extend from this class. (yii will autoload the class)
*/
class ActiveRecord extends CActiveRecord
{
    public function getUrl()
    {
        $controller=get_class($this);
        $controller[0]=strtolower($controller[0]);
        $params=array('id'=>$this->id);
        // add the title parameter to the URL
        if($this->hasAttribute('title'))
            $params['title']=$this->title;
        return Yii::app()->urlManager->createUrl($controller.'/view', $params);
    }


	public function getSalutationOptions(){
		return array(
			'' => '',
			'Mr.'=>'Mr.',
			'Mrs.'=>'Mrs.',
			'Ms.'=>'Ms.',
			'Dr.'=>'Dr.',
		);
	}

	public function getGenderOptions(){
        return array(
			'' => '',
            'M' => 'Male',
            'F' => 'Female',
        );
    }
	public function getDegreeOptions(){
		return array(
			'B.Tech.'=>'B.Tech.',
			'Dual Degree'=>'Dual Degree',
			'M.Sc.'=>'M.Sc.',
			'M.Tech.'=>'M.Tech.',
			'M.Mgt.'=>'M.Mgt.',
			'M.Des.'=>'M.Des.',
			'Ph.D.'=>'Ph.D.',	
            'other'=>'other',
		);
	}

	public function getHostelOptions(){
		return array(
			'H1'=>'Hostel 1',
			'H2'=>'Hostel 2',
			'H3'=>'Hostel 3',
			'H4'=>'Hostel 4',
			'H5'=>'Hostel 5',
			'H6'=>'Hostel 6',
			'H7'=>'Hostel 7',
			'H8'=>'Hostel 8',
			'H9'=>'Hostel 9',
			'H10'=>'Hostel 10',
			'H11'=>'Hostel 11',
			'H12'=>'Hostel 12',
			'H13'=>'Hostel 13',
			'H14'=>'Hostel 14',
			'Tansa'=>'Tansa',
			'Staff Quarters'=>'Staff Quarters',
			'Others'=>'Others',					
		);
	}

	public function getDepartmentOptions(){	
		return CHtml::listData(Department::model()->findAll(),'code','name');
	}
    
	public function getCountryOptions(){	
		return CHtml::listData(Country::model()->findAll(),'id','name');
	}

    public function getIndustryOptions(){
        return CHtml::listData(Industry::model()->findAll(),'id','name');
    }

}
