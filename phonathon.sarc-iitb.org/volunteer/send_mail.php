<?php


session_start();
  if (! isset($_SESSION['user'])) header ("Location: ../login.php");
  $role = $_SESSION['role'];
  $curdir = getcwd();
  if ($role != basename($curdir)) header ("Location: ../$role/" . basename($_SERVER["SCRIPT_NAME"]));
  $user = $_SESSION['user'];

  $PID = $_SESSION['PID'];
  require_once ("../dbconnection.php");
    $volunteer_id=$_SESSION['user'];
  $DBConn = new Connection();
    // print_r($PID);
    $email = $DBConn->get_array("SELECT * FROM alumnus_email WHERE PID = ?", array($PID));
  $key = $DBConn->get_array("SELECT `key` FROM alumnus_visitedlinks WHERE PID = ?",array($PID));
  $key = $key[0]['key'];
    $email=$email[0];
    if($email['email']=="" || empty($email['email']) || $email['email']==NULL){
        die("E-mail Id not available");
    }
     $to=$email['email'];
     //$to="anuraganand.10@gmail.com";
//echo "xyz";
    if(isset($_POST['elm1'])){
    $from="phonathon@sarc-iitb.org";
    $subject="Student Alumni Relations Cell (SARC), IIT Bombay";
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= "Reply-To: sarc@iitb.ac.in\r\n";
    $headers .= 'Cc: sarc@iitb.ac.in,' . "\r\n";
  $headers .= 'Bcc: lssd.sarc@gmail.com,' . "\r\n";


    $message= $_POST['elm1'];

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
    }

else{
    $alum = $DBConn->get_array("SELECT * FROM calllog WHERE PID = ?", array($PID));
    $alum = $alum[0];
    if($alum['mailed']=="1"){
        die("Mail already Sent.<br><a href='http://phonathon.sarc-iitb.org/admin/alumni.php'>Click here</a> to go back");
    }
  $basic_detail = $DBConn->get_array("SELECT * FROM alumnus_basicdetail WHERE PID = ?", array($PID));

  $volunteer = $DBConn->get_array("SELECT * FROM volunteer WHERE volunteer_ID = ?", array($volunteer_id));
  if (count ($alum) == 0) header ("Location: alumni.php");

    $basic_detail=$basic_detail[0];

    $volunteer=$volunteer[0];
  $contacted = $alum['contacted'];
  $reach = $alum['couldntreach'];

    if($contacted==1){
        $agendas = $DBConn->get_array("SELECT * FROM alumnus_agendaconfirmation WHERE PID = ?", array($PID));
    }
  
?>
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
  tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "advanced",
    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // Example content CSS (should be your site CSS)
    //content_css : "css/content.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",

    // Style formats
    style_formats : [
      {title : 'Bold text', inline : 'b'},
      {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
      {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
      {title : 'Example 1', inline : 'span', classes : 'example1'},
      {title : 'Example 2', inline : 'span', classes : 'example2'},
      {title : 'Table styles'},
      {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    ],
        <?php
        


    ?>



    // Replace values for the template plugin
    template_replace_values : {
      username : "Some User",
      staffid : "991234"
    }
  });
</script>
<!-- /TinyMCE -->
<form name="mail" method="post" action="send_mail.php">
<div>       <span style="font-size:16px">To, <?php echo $to; ?></span> <br>
      <textarea id="elm1" name="elm1" rows="30" cols="80" style="width: 80%">
               Dear <?php echo $basic_detail['firstname']." ".$basic_detail['lastname'].","; ?>
<?php
                if($contacted=="1"){

                ?>
<p&gt;               A warm greeting from the IIT Bombay Alumni Association! Hope you are doing fine.</p&gt;

<p&gt; We had called you today regarding the Legacy Project of Batch of ‘87, but couldn’t reach you. </p&gt;

<p&gt; As part of the legacy project, you had pledged to donate to the cause during the reunion held in December. This is a gentle reminder to do so at the earliest.</p&gt;

<p&gt; Please visit <a href="http://www.iitbombay.org/giving-back" &gt; http://www.iitbombay.org/giving-back</a&gt; to make your gift to your almamater. You can track where your donations have been used through the Fund Utilization Report uploaded on the above link. </p&gt;

<p&gt; Also, you can visit <a href="http://www.iitbombay.org/chapters-and-events/reunions/class-of-1987-1/legacy-project-details" &gt; http://www.iitbombay.org/chapters-and-events/reunions/class-of-1987-1/legacy-project-details </a&gt; for details about the project.</p&gt;

<p&gt; Thank you for your continued support to IIT Bombay. </p&gt;

<?php  

}
                else if(!empty($reach) && $reach!="" && $reach!=NULL){
                    ?>
 
<p&gt; Thank you for your time. It was a pleasure talking to you. I had called you on behalf of the IIT Bombay Alumni Association.</p&gt;
<p&gt; As promised, here is the link to the donation portal.</p&gt;

<p&gt; Please visit <a href="http://www.iitbombay.org/giving-back" &gt; http://www.iitbombay.org/giving-back</a&gt; to make your gift to your almamater. You can track where your donations have been used through the Fund Utilization Report uploaded on the above link.</p&gt;

<p&gt; Thank you for your continued support to IIT Bombay.</p&gt;



                        <?php
            

                }
        ?>
                
Regards,
</p&gt;
                <p&gt;
                <?php
                echo $volunteer['name'];
    ?>
    <br&gt;Student Volunteer<br&gt;
Student Alumni Relations Cell(SARC)<br&gt;(http://www.sarc-iitb.org/)<br&gt;
IIT Bombay
                 <hr&gt;
                 <span style="font-size=10px; color:#555"&gt;Please note that this mail is sent from Phonathon@sarc-iitb.org. Please make sure you are not sending any mails on this email as we donot receive replies to this email.  You can alternatively mail us at sarc@iitb.ac.in
      </textarea>
        <input type="submit" value="Send Mail">


      </div>
    </form>
    <?php
    }
?>
