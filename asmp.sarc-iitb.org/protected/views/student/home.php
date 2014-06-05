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
    background:#FDE8CC;
  }

</style>

<div id="leftbar">
  <ul>
  <!--<li>Edit Profile</li>-->
    <li><a href="#inbox">Inbox</a></li>
    <li><a href="#outbox">Outbox</a></li>
    <li><a href="complaint">Instant Feedback</a></li>    
    </ul>
</div>
<div id="rightbar">
  <div class="profile">
      <div class="header">
          Profile
        </div>
        <div class="content">
        <table >
       <?php   
    
     foreach($mStudents as $key=>$student){
        //    echo $student->firstName;
      $department=Department::model()->findByAttributes(array('code'=>$student->departmentCode))->name;
      $year=13-substr($student->rollNumber,0,2);
        if($year==1)$year.='<sup>st</sup>';
        else if($year==2)$year.='<sup>nd</sup>';
        else if($year==3)$year.='<sup>rd</sup>';
        else $year.="<sup>th</sup>";
      ?>
            
            <tr>
            <td><label>Name</label></td>
            <td>            
            <?php echo $student->firstName.' '.$student->middleName;
      if($student->middleName){ echo ' '.$student->lastName; }
      else{ echo $student->lastName;}
      
      ?>
            </td>
            </tr>
            
            <tr>
            <td><label>Degree</label></td>
            <td><?php echo $student->degree; ?></td>
            </tr>
            
            <tr>
            <td><label>Department</label></td>
            <td><?php echo $department; ?></td>
            </tr>
            <tr>
            <td><label>Year</label></td>
            <td><?php echo $year; ?></td>
            </tr>
            <tr>
            <td><label>Email-id</label></td>
            <td><?php echo $student->emailId; ?></td>
            </tr>
            <tr>
            <td><label>Phone No</label></td>
            <td><?php echo $student->phoneNumber; ?></td>
            </tr>
            
            
            <?php
     }

    ?>
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
       
       if($mMsg->inbox==NULL){
         echo 'You have 0 message in Inbox1';
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
        foreach($mMsg->inbox as $key=>$value){
            $Alumnus=Alumnus::model()->findByPk($value->alumnusId);
          ?>
          <tr>
                    <td class="sr_no" ><?php echo $key+1; ?></td>
                    <td class="name" ><?php echo $Alumnus->firstName.' '.$Alumnus->lastName; ?></td>
                    <td class="title" ><?php echo wordwrap($value->title, 25, "<br/>", 1); ?></td>
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
       if($mMsg->outbox==NULL){
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
        foreach($mMsg->outbox as $key=>$value){
            $Alumnus=Alumnus::model()->findByPk($value->alumnusId);
          ?>
          <tr>
                    <td class="sr_no"><?php echo $key+1; ?></td>
                    <td class="name"><?php echo $Alumnus->firstName.' '.$Alumnus->lastName; ?></td>
                    <td class="title"><?php echo wordwrap($value->title, 25, "<br/>", 1); ?></td>
                    <!--<td><?php echo $value->message; ?></td>-->
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