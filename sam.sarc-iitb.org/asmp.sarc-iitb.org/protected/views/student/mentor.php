<?php //TODO: Copy the content into partial inside alumnus view page 
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php if($mAlumnus!=NULL){ ?>
<style>
#alumnus th{
    text-align: right;
}
#alumnus li{
    list-style-type:  none;
}
#alumnus li b{
    width:  100px;
}
.profile{
		width:100%;
		float:left;
		border:1px solid rgb(1,10,27);
		min-height:100px;
		margin:0 0 10px 0;
	}
	
	.header{
		background-color:rgb(1,10,27);
		color:white;
		padding:10px 0 10px 10px;
		font-size:14px;
	}
	
	#left_part{
		width:78%;	
		float:left;
	}
	
	#right_part{
		border:1px solid rgb(1,10,27);
		margin:0 10px;
		float:left;
		height:300px;
		width:19.5%;	
	}
</style>
<div id="left_part">
<div class="profile">
    	<div class="header">
        	Contact Details
        </div>
        <div class="content">
        <table>
    		<?php
			
    if(isset($mAlumnus->personalDetails)){
    ?>
    <tr>
        <th>Address: </th>
        <td>
                <?php foreach($mAlumnus->personalDetails as $key=>$personalDetail){ ?>
                    <br/><span class="address"><?php echo $personalDetail->address.', '; ?></span>
                    <span class="city"><?php echo $personalDetail->city; ?></span>
                    <br/><span class="pincode"><?php echo $personalDetail->pincode; ?></span>
                <?php } ?>
        </td>
    </tr>
    <?php }
    if(isset($mAlumnus->emailIds)){
    ?>
    <tr>
        <th>Email Ids: </th>
        <td>
                <?php foreach($mAlumnus->emailIds as $key=>$emailId){ ?>
                <span class="emailId"><?php echo $emailId->emailId;?></span>
                <?php } ?>
        </td>
    </tr>
    <?php }
    if(isset($mAlumnus->phoneNumbers)){
    ?>
    <tr>
        <th>Phone Numbers: </th>
        <td>
                <?php foreach($mAlumnus->phoneNumbers as $key=>$phoneNumber){ ?>
                <span class="phoneNumber"><?php echo $phoneNumber->phoneNumber?></span>
                <?php } ?>
        </td>
    </tr>
    <?php } ?>


</table>
        </div>
    
    </div>
    <div class="profile">
    	<div class="header">
        	Contact Volunteer
        </div>
        <div class="content">
        <br />
        	<table>
            <tr>
            <th>Name</th>
            <td></td>
            </tr>
            <tr>
            <th>Phone No.</th>
            <td></td>
            </tr>
            <tr>
            <th>Email-id</th>
            <td></td>
            </tr>
            </table>    
        </div>
    
    </div>
    </div>
    
    <div id="right_part">
    
    </div>
<!--<p>
Sorry! You are not alloted any mentor yet. <br/> If you have registered for the program, please contact us at sarc@iitb.ac.in
</p>-->
<?php } ?>
