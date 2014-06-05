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

	#info{
		margin:10px 70px 10px 0;
		float:left;
		clear:both;
		border:1px solid blue;
		background:rgb(202,206,254);
		color:blue;
		border-radius:6px;
		padding:20px 20px;
	}
</style>

<div id="leftbar">
	<ul>
	<li><a href="mydetails">View Details</a></li>
    <li><a href="#inbox">Inbox</a></li>
    <li><a href="#outbox">Outbox</a></li>
    <li><a href="complaint">Instant feedback</a></li>   
    </ul>
</div>
<div id="rightbar">
	<div class="profile">
    	<div class="header">
        	Instant Complaint Box
        </div>
        <div class="content">
        	<div id="info">
				This complaint will be directly forwarded to asmp head and volunteer alloted to you so you will get response from him or one of volunteer very soon. If you have any problem regarding ASMP program or your mentor, PLease let us know.
            
            </div>
        
        	<?php 	
			
			if(isset($_POST['sub'])){
				foreach($mAlumnus->emailIds as $key=>$alumnus){
					$alumnusemailid[]=$alumnus->emailId;	
				}
								$to="sarc@iitb.ac.in";
								$from="Complaint Regading ASMP";
								$from = preg_replace("/[^a-zA-Z0-9s.-]/", " ", $from);
								$subject=$_POST['subject'];
								$headers  = "From: $from<sarc-iitb.org>\r\n";
								$headers .= "Content-type: text/html\r\n";
								$headers .= "Reply-To: $alumnusemailid[0]\r\n";
								$headers .= 'Cc: ajaybhatt17@gmail.com' . "\r\n";
								//$headers .= 'Bcc: lssd.sarc@gmail.com,' . "\r\n";
								$message= $_POST['desp'];
								
								$mail_sent= mail($to, $subject, $message, $headers);
								if($mail_sent){	
								mysql_connect("admin.sarc-iitb.org","sarciitborg","j@g@njyoti");
								mysql_select_db("sarc_cdb");
								if(mysql_query("INSERT INTO `complaintbox`( `roleId`,`role`,`title`, `description`) VALUES ('".$mAlumnus->id."','alumnus','".$subject."','".$message."'")){
									echo "database recorded";
								}else{
									echo mysql_error();	
								}
						echo "Mail Successfully Sent to ".$to."<br><a href='http://sarc-iitb.org/beta.mentorship/student/home.php'>Click here</a> to go back";
									}else{
						echo "Mail sending failed.";
							}
					}
					else{
                            
                           ?>
		  	<form  method="post" action="complaint.php" id="updt">
			 <table>
			   <tr>
			    <td>Subject</td><td><input type="text" class="left"  name="subject" size="50"/></td>
			   </tr>
			   <tr>
                <td>Message</td>
			    <td><textarea id="desp" name="desp" rows="8" cols="50" ></textarea></td>
			   </tr>
			   <!--<tr>
			    <td>Picurl</td>
			    <td><input type="file" class="left" name="pic_url" /></td>
                            <td><i>Only .jpg/.gif/.png file are valid</i></td>
			   </tr>-->
			   <tr>
			    <td><input id="submit_button" name="sub" type="submit" value="Send" style="padding:0 0;"/></td>
			   </tr>
			 </table>
			</form>
                        <?php
                        }
                        ?>
        </div>
    
    </div>

</div>