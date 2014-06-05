<?php
  
      $char = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
  $alumnusId=Yii::app()->session['alumnusId'];
  while ($code == "") {
        $code = "";
        for ($i = 0; $i < 10; $i++) {
          $code .= $char[rand (0, 51)];
        }
  
    
        $query = AlumnusMentorshipPreference::model()->findByAttributes(array('alumnusId'=>$alumnusId));
        if ($query->confirmation=='') {
          $connection=Yii::app()->db;
          $sql="UPDATE AlumnusMentorshipPreference SET confirmation='$code' WHERE alumnusId='$alumnusId'";
          $command=$connection->createCommand($sql);
          $command->execute();
        }
        else {
          $code = $query->confirmation;
        }
  }
      $connection=Yii::app()->db;
          $sql="SELECT * FROM AlumnusEmailId WHERE alumnusId='$alumnusId'";
          $command=$connection->createCommand($sql);
          $query1=$command->query();
     foreach($query1 as $queryentry){
       if($queryentry['type']=='primary'){
       // $to= $queryentry['emailId'];
       }else if($queryentry['type']=='other'){
         //$to.= ','.$queryentry['emailId'];
       }
     }
      $subject = "ASMP : Spring Phase Registration";
      $message = "Dear ".$_SESSION['name'].",\n\n";
      $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
      $url = str_replace("finish.php","",$url);
      $message .= "This mail has been sent to you because your email has been registered for Alumni Student Mentorship Program.\n\nPlease confirm your registration for ASMP by visiting ".$url."confirm.php?code=$code.\n\nTo reject your registration, visit ".$url."reject.php?code=$code.\n\nFor any problems regarding registration, please contact us at sarc@iitb.ac.in.";
      $message .= "\n\nThank you\nWeb Team\nStudent Alumni Relations Cell (SARC)\nIIT Bombay";
      $from = "sarc@iitb.ac.in";
      $headers = "From: ".$from."\r\n";
      //$cc = "asmp-core-team-2013-14@googlegroups.com";
      //$headers .= "CC: ".$cc."\r\n";
      //$headers .= "Reply-To: ".$from."\r\n";
      //echo $to.'<br>'.$message;
      if (mail ($to,$subject,$message,$headers)) {
        
?>
<html>
  <head>
    <link href="css/main.css" rel="stylesheet" />
    <link href="css/finish.css" rel="stylesheet" />
    <div id="bar">
      <span id="registration">Registration for mentors</span>
    </div>
    <div id="content">
      <div id="contentbody">
        <span style="margin-left: 0px;">Thank you <b><?php echo $_SESSION['name']?></b> for registering with Alumni Student Mentorship Program. A confirmation mail has been sent to <b><?php echo $to ?></b>.
        <br /><br/>
        Thank You
        <br />
        <b>ASMP Team</b>
        <br />
        Student Alumni Relations Cell
        <br />
        IIT Bombay.
                                <br /> <br /> <br/> 
		Contact :<br/><br/>
		Rohit Wakode | rohitnwakode@gmail.com | +91 90047 69371 <br/>
		Tuhina Ghanty | tuhinaghanty93@gmail.com | +91 9869610095<br/><br/>
                        <!--<div id="sam">
                          <b> A new milestone reached in SARC's itinerary </b> 
                          <p> In its very first year - <b>SAM</b> ( <b>Student Alumni Meet</b> ) to happen on the 4th weekend of September, shall hold a ASMP Mentors Lunch & facilitate thereby, one-to-one mentor-mentee interaction in person. It shall serve as a tangible platform for further interactions to follow in the year & thus foster mentor-mentee relations - the essence of ASMP.
                        </div>
                        <br/> <br/>-->
                        <div id="share">
                                <p>Please spread the word about ASMP among your friends from IIT-B.</p>
                               
                        </div>
      </div>
    </div>
  </body>
</html>
<?php 
    unset(Yii::app()->session['alumnusId']);
    unset(Yii::app()->session['step1']);
    unset(Yii::app()->session['step2']);
    unset(Yii::app()->session['step3']);
    unset(Yii::app()->session['step4']);
    } 
  else{
    $this->render('info',array("info"=>'Sorry their some problem in mailing'));
  }
?>
          
