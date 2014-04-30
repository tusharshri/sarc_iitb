	<?php
	
		$query = Alumnus::model()->findByAttributes(array('id'=>Yii::app()->session['alumnusId']));	
		$name=$query->firstName.' '.$query->lastName;
		$connection=Yii::app()->db;
          $sql="SELECT * FROM AlumnusEmailId WHERE alumnusId='$alumnusId'";
          $command=$connection->createCommand($sql);
          $query1=$command->query();
		 foreach($query1 as $queryentry){
			 if($queryentry['type']=='primary'){
				$email= $queryentry['emailId'];
			 }else if($queryentry['type']=='other'){
				 $email.= ','.$queryentry['emailId'];
			 }
		 }
	
		$subject = "Alumni Student Mentorship Program";
		$message = "Dear $name,\n\n";
		$message .= "Thank you for registering for Alumni Student Mentorship Program. The next phase of Mentorship Program will begin in the first week of Stempber. You shall be informed once we start with student registrations. You would be alloted mentees considering the choices given by students as well as yourself.";
		$message .= "\n\nThank you\nWeb Team\nStudent Alumni Relations Cell (SARC)\nIIT Bombay";
		$from = "sarc@iitb.ac.in";
		$headers = "From: $from\r\n";
		$cc = "asmp_2k11@googlegroups.com";
		$headers .= "CC: $cc\r\n";
		mail ($email,$subject,$message,$headers);
	
	?>
		<div id="bar">
			<span id="registration">Registration for mentors</span>
		</div>
		<div id="content">
			<div id="contenttopic">Thank You</div>
			<div id="contentbody">
				Thank you for registering for the Alumni Student Mentorship Program. The next phase of Mentorship Program will begin in the first week of Stempber. You shall be informed once we start with student registrations. You would be alloted mentees considering the choices given by students as well as yourself.
				<br /
				<br />
				Web Team,
				<br />
				Student Alumni Relations Cell (SARC),
				<br />
				IIT Bombay.
			</div>
		</div>
