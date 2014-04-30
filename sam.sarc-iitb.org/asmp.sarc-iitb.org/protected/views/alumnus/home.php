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
	<li><a href="mydetails">View Details</a></li>
    <li><a href="home#inbox">Inbox</a></li>
    <li><a href="home#outbox">Outbox</a></li>
    <li><a href="complaint">Instant feedback</a></li>    
    </ul>
</div>
<div id="rightbar">
	<div class="profile">
    	<div class="header">
        	Profile
        </div>
        <div class="content">
        <?php foreach($mAlumnus->emailIds as $key=>$alumnus){
			$emailid=$alumnus->emailId;			
		}
		foreach($mAlumnus->phoneNumbers as $key=>$alumnus){
			$phoneNumbers=$alumnus->phoneNumber;			
		}
		?>
			
        <table>
                   
            <tr>
            <td><label>Name</label></td>
            <td><?php echo $mAlumnus->firstName.' ';
						if($mAlumnus->middleName!=NULL) echo $mAlumnus->middleName.' ';
						echo $mAlumnus->lastName;
						?>
			</td>
            </tr>
            
            <tr>
            <td><label>DOB</label></td>
            <td>
            <?php echo $mAlumnus->dateOfBirth; ?>
            </td>
            </tr>
           
            <tr>
            <td><label>SkypeId</label></td>
            <td>
			<?php echo $mAlumnus->skypeId; ?>
            </td>
            </tr>
            
            <tr>
            <td><label>LinkdIn</label></td>
            <td>
			<?php echo $mAlumnus->linkedin; ?>
            </td>
            </tr>
            
            <tr>
            <td><label>Email-id</label></td>
            <td>
            <?php echo $emailid; ?>
            </td>
            </tr>
            <tr>
            <td><label>Phone No</label></td>
            <td>
             <?php echo $phoneNumbers; ?>
            </td>
            </tr>
            
            
           
        </table>
        </div>
    
    </div>
    <a name="inbox"></a>
    <div class="profile">
    	<div class="header">
			Inbox
           
        </div>
        <div class="content">
        	
        	 <?php 
			 if($mAlumnus->inbox==NULL){
				 echo 'You have 0 message in Inbox';
			 }
			 else{
				 ?>
                 <table class="msg_table">
                 <tr>
                    <th>Sr. No</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>View Message</th>
                    </tr>
                 <?php
				foreach($mAlumnus->inbox as $key=>$value){
						$Student=Student::model()->findByPk($value->studentId);
					?>
					<tr>
                    <td class="sr_no"><?php echo $key+1; ?></td>
                    <td class="name"><?php echo $Student->firstName.' '.$Student->lastName; ?></td>
                    <td class="title"><?php echo wordwrap($value->title, 25, "<br/>", 1); ?></td>
                    <td class="date"><?php $datetime=explode(" ",$value->sendAt);
						echo $datetime[0]; ?></td>
                    <td class="date"><?php echo $datetime[1]; ?></td>
                    <td><a href="messagedetails.php?q=inbox&id=<?php echo $value->id; ?>">View details</a></td>
                    </tr>
                    <?php
				}
			 }
			
			
			?>
            </table>
        </div>
    
    </div>
    <a name="outbox"></a>
    <div class="profile">
    	<div class="header">
			Outbox
        </div>
        <div class="content">
        	
        	
        	 <?php 
			 if($mAlumnus->outbox==NULL){
				 echo 'You have 0 message in Outbox';
			 }
			 else{
				 ?>
                 <table class="msg_table">
                 <tr>
                    <th>Sr. No</th>
                    <th>To</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>View Message</th>
                    </tr>
                 <?php
				foreach($mAlumnus->outbox as $key=>$value){
						$Student=Student::model()->findByPk($value->studentId);
					?>
					<tr>
                    <td class="sr_no"><?php echo $key+1; ?></td>
                    <td class="name"><?php echo $Student->firstName.' '.$Student->lastName; ?></td>
                    <td class="title"><?php echo wordwrap($value->title, 25, "<br/>", 1); ?></td>
                    <td class="date"><?php $datetime=explode(" ",$value->sendAt);
						echo $datetime[0]; ?></td>
                    <td class="date"><?php echo $datetime[1]; ?></td>
                    <td><a href="messagedetails.php?q=outbox&id=<?php echo $value->id; ?>">View details</a></td>
                    </tr>
                    <?php
				}
			 }
			
			
			?>
            </table>
        </div>
    
    </div>

</div>