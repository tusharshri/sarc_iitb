<?php


require_once ("dbconnection.php");

$DBConn = new Connection();

  function mailto($pid,$volid){
    global $DBConn;      
    $PID = $pid;
    $email = $DBConn->get_array("SELECT * FROM alumnus_email WHERE PID = ?", array($PID));
    $email=$email[0];
    if($email['email']=="" || empty($email['email']) || $email['email']==NULL){
      //die("E-mail Id not available");
    }else{
    
    $basic_detail = $DBConn->get_array("SELECT * FROM alumnus_basicdetail WHERE PID = ?", array($PID));
    $volunteer = $DBConn->get_array("SELECT * FROM volunteer WHERE volunteer_ID = ?", array($volid));
    $agendas = $DBConn->get_array("SELECT * FROM alumnus_agendaconfirmation WHERE PID = ?", array($PID));
    $basic_detail=$basic_detail[0];
    $volunteer=$volunteer[0];
    
    $to=$email['email'];
    $from="phonathon@sarc-iitb.org";
    $subject="Student Alumni Relations Cell (SARC), IIT Bombay";
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= "Reply-To: sarc@iitb.ac.in\r\n";
    $headers .= 'Cc: sarc@iitb.ac.in,' . "\r\n";
    $headers .= 'Bcc: lssd.sarc@gmail.com,' . "\r\n";
    
    
    $message= "Dear ".$basic_detail['firstname']." ".$basic_detail['lastname'].",";
    
    $message.="<p>Thank you for your time, it was a pleasure talking to you. I had called you on behalf of Student Alumni Relations Cell (SARC), as a part of the ongoing December US Phonathon.
        </p>
        
<p>We will be having our Alumni Day on December 30th. Do join in, and also, spread the word among your friends.But in case you are not able to join us, you can see the pics and videos later on our website <a href='http://sarc-iitb.org/hats.php'> http://sarc-iitb.org/hats.php</a></p>

<p>While we are at mentioning links, here's the link <a href='http://sarc-iitb.org/mentorship.php'> http://sarc-iitb.org/mentorship.php</a> for the Alumni Student Mentorship Program. You can know more about the program here and also register for it. The next phase starts from January 2013.</p>";

for($i=0; $i<count($agendas); $i++){
        
   
        if($agendas[$i]['agenda_id']==1){
         


$message.="<p>You can find details on various initiatives like HATS & YFA at <a href='http://iitbombay.org/initiatives'> http://iitbombay.org/initiatives </a>. Please visit <a href='http://www.iitbombay.org/giving-back'> http://www.iitbombay.org/giving-back </a> to make your gift to your almamater. Note that all donations are tax deductible since IIT Bombay Heritage Foundation is a 501c3 charitable organization under US tax laws. And unlike other non-profit organizations where a large percentage of donations are wasted on overhead costs, IITBHF ensures that 100% of your contributions go to IIT Bombay.</p>";


                   
                } 
        else if($agendas[$i]['agenda_id']==3){
        
        $message.="<p>If you are interested in providing internships/projects or placement opportunities at your company/university, just reply to this mail. We will put you in touch with our placement cell regarding the same.</p>";
        
        }
      
}

$message.="<p>We are also glad to inform about the successful completion of second edition of Student Alumni Meet held on 6th and 7th October 2012, please visit <a href='http://sam.sarc-iitb.org/events.php'> http://sam.sarc-iitb.org/events.php </a> for event details.</p>

<p>Also, remember to keep your personal details complete and up to date in the Alumni Directory. You can do so on <a href='http://www.iitbombay.org/online-community/alumni-directory'> http://www.iitbombay.org/online-community/alumni-directory </a> or write to <a href='mailto:directory@iitbombay.org'> directory@iitbombay.org </a>
You can be a part of IITB online community. Visit <a href='http://www.iitbombay.org/online-community'> http://www.iitbombay.org/online-community </a></p>

<p>Hope you liked talking to us as much as we did talking to you.</p>";
    

$message.='Regards,

                <p>'.$volunteer['name'].'
    
    <br>Student Volunteer<br/>
Student Alumni Relations Cell(SARC)<br>(http://www.sarc-iitb.org/)<br>
IIT Bombay
                 <hr>
                 <span style="font-size=10px; color:#555">Please note that this mail is sent from Phonathon@sarc-iitb.org. Please make sure you are not sending any mails on this email as we donot receive replies to this email.  You can alternatively mail us at sarc@iitb.ac.in</span>';
    
    $mail_sent= mail($to, $subject, $message, $headers);

        if($mail_sent){
             $query="UPDATE calllog SET mailed='1' WHERE PID='$PID'";
        if(!mysql_query($query)){
          echo "Please contact Web Administrator. There is a problem in updating the database";
        }
        echo "Mail Successfully Sent to ".$to."<br><a href='http://phonathon.sarc-iitb.org/admin/alumni.php'>Click here</a> to go back";
    }else{
            echo "Mail sending failed.";
        }
    
    
      //echo $message.'<br><br>';
    }
  }
  
  
  $current=$DBConn->get_array("SELECT * FROM allotment JOIN calllog ON allotment.PID=calllog.PID WHERE allotment.status = ? AND calllog.mailed=? AND calllog.dontcall=? ", array('Done and Locked',0,0));
  
  $except1=array();
  foreach($current as $val){
    $except1[]=$val['PID'];  
    $except1_c[]=$val['volunteer_ID'];
    //mailto($val['PID'],$val['volunteer_ID']);
  }

    echo count($except1);
  echo $except1[0];

    
?>