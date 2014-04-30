<style type="text/css">
	#leftbar{
		width:18%;
		border:1px solid rgb(1,10,27);
		float:left;
		padding:5px 0;
	}
	
	#leftbar ul{
		list-style-type:none;	
	}
	
	#leftbar ul li{
		width:100px;
		margin:10px 0;
		cursor:pointer;
	}
	#leftbar ul li a{
		text-decoration:none;
		color:inherit;
			
	}
	
	#rightbar{
		width:80%;
		float:right;			
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
	label{
		color:black;
		font-weight:bold;	
	}
	.content{
		margin-left:10%;	
	}
	.msg_table{
		word-wrap:break-word;
		/*table-layout:fixed;*/	
	}
	.sr_no{
		width:50px;
	}
	.name{
		width:100px;
	}
	.title{
		width:150px;
	}
	.time{
		width:130px;	
	}
	.msg_table tr:nth-child(even){
		background:#CACEFE;
	}
	.msg_table tr:nth-child(odd){
		background:#e1fc76;
	}
</style>

<div id="leftbar">
	<ul>
	<li><a href="editprofile.php">Edit Profile</a></li>
    <li><a href="#inbox">Inbox</a></li>
    <li><a href="#outbox">Outbox</a></li>
    <li><a href="complaint.php">Instant complaint</a></li>    
    </ul>
</div>
<div id="rightbar">
	<div class="profile">
    	<div class="header">
        	Edit Profile
        </div>
        <div class="content">
        	<?php 
        	
        	if(isset($message)){
        		echo $message;
        	}
        	else {
        	
			?>	
        	<?php echo CHtml::form('', 'post', array('enctype'=>'multipart/form-data')); ?>
			<?php echo CHtml::label('Attach Profile pic', 'Alumnusprfpic_image'); ?> 
			<?php echo CHtml::fileField('Alumnusprfpic[image]', '', array('id'=>'Alumnusprfpic_image')); ?> 
            <br />
			<?php echo CHtml::submitButton('Submit'); ?> 
			<?php echo CHtml::endForm(); ?>
			<?php
			
			}
			?> 
        	
        </div>
    
    </div>
    
</div>

</div>