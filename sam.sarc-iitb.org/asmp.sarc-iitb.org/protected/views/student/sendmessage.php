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
  <!--<li>Edit Profile</li>-->
    <li><a href="home.php#inbox">Inbox</a></li>
    <li><a href="home.php#outbox">Outbox</a></li>
    <li><a href="complaint">Instant Feedback</a></li>    
    </ul>
</div>
<div id="rightbar">
  <div class="profile">
      <div class="header">
          Send message
        </div>
        <div class="content">
          <div id="info">
        Your mails will be directly send to your mentor/mentee's primary id.<br />
                Subject Limit : 60 and Message Limit: 160 characters.
            
            </div>
        
          <?php   
      
      if(isset($_POST['sub'])){
        
        $alumnusemailid=AlumnusEmailId::model()->findByAttributes(array('alumnusId'=>$_POST['email'],'type'=>'primary'))->emailId;
        //echo $mStudent->emailId.'<br>';
              
        //echo $alumnusemailid.'<br>';
                
                
                
                $to=$alumnusemailid;
                $from="ASMP - Mentee";
                $from = preg_replace("/[^a-zA-Z0-9s.-]/", " ", $from);
                $subject=$_POST['subject'];
                $headers  = "From: $from<sarc-iitb.org>\r\n";
                $headers .= "Content-type: text/html\r\n";
                $headers .= "Reply-To: $mStudent->emailId\r\n";
                $headers .= 'Cc: sarc@iitb.ac.in' . "\r\n";
                //$headers .= 'Bcc: lssd.sarc@gmail.com,' . "\r\n";
                $message= $_POST['desp'];
                
                $mail_sent= mail($to, $subject, $message, $headers);
                if($mail_sent){  
                if(Yii::app()->db->createCommand()->insert('sendmessage_student',array('studentId'=>$mStudent->id,
            'alumnusId'=>$_POST['email'],
              'title'=>$_POST['subject'],
              'message'=>$_POST['desp']
              ))){
                //echo 'Message has been sent successfully';  
              }else{
                //echo 'Some problem in sending mails';  
              }
            echo "Mail Successfully Sent to ".$to."<br><a href='http://asmp.sarc-iitb.org/student/home.php'>Click here</a> to go back";
                  }else{
            echo "Mail sending failed.";
                  }
          }
          else{
                            
                           ?>
        <form  method="post" action="sendmessage.php" id="updt">
       <table>
         <tr>
          <td>To</td>
                <td><select name="email">
                <?php 
        foreach($mAlumnus as $key=>$Alumnus){
              $Alumnus=$Alumnus->alumnus;
              ?>
                <option value="<?php echo $Alumnus->id; ?>" ><?php echo $Alumnus->firstName.' '.$Alumnus->lastName; ?></option>              
        <?php      }  ?>
                
                </select>
                </td>
         </tr>
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