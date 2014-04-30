<?php
    
    class Alumnusprfpic extends CActiveRecord
	{
    	public $image;
    	// ... other attributes
 	
   		 public function rules()
   		 {
      	  return array(
       	     array('image', 'file', 'types'=>'jpg, gif, png'),
       	 	);
   		 }
	}
?>