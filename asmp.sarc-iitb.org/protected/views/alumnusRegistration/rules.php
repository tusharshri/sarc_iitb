<?php
$this->breadcrumbs=array(
	'Alumnus Registration'=>array('/alumnusRegistration'),
	'Rules',
);?>

<style>

    #rules{
        font-size:15px;
    }
    #rules li{
        padding:5px 0;
    }

    #submit_button{
        padding: 5px 10px;
    }

    #submitbutton{
        margin: 20px;
    }

</style>

<script type="text/javascript">
    function submit_appear(){
        setInterval('countdown()', 1000);
        setTimeout("submit_button()", 10000);
    }
    function countdown(){
        document.getElementById("countdown").innerHTML=document.getElementById("countdown").innerHTML-1;
    }
    function submit_button(){
         document.getElementById("submitbutton").innerHTML= '<?php echo CHtml::submitButton('Register', array('name'=> 'Rules','id'=>'submit_button','onclick'=>"window.location='step1/'")); ?>';


    }
</script>

<h1>Rules and Regulations:</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

    <div class="notification">
      <p><strong>Things to be known before you register for the Alumni Student Mentorship Program. Please take a moment and go through these.</strong></p>
</div>
<?php //echo CHtml::beginForm(); ?>
<ul>
  <li>Once you are allotted as a mentor, you are expected to commit to a <strong><em>minimum of two hours per month</em></strong> to work with the student and also, <strong><em>take the lead</em></strong> in setting goals and expectations for the relationship.</li>
  <li>If the student is <strong><em>unresponsive</em></strong> or if any other issues arise, you should immediately inform us at sarc@iitb.ac.in.</li>
  <li>Once you register, you would be consented before the start of every successive phase of ASMP if you wish to continue in that phase.</li>
  <li>If your schedule does not give you <strong><em>enough time</em></strong> to continue with the program, you are expected to inform us about it before the start of that phase.</li>
  <li>During the student registrations phase, your professional details(Company, Designation and Work profile) along with other details like Department, Batch and Hostel would be made visible to the students to request a mentor from.</li>
  <li>Your Name and Contact details will not be displayed in the above mentioned step.</li>
  <li>Registering for the Mentorship Program <strong><em>does not ensure</em></strong> you would be allotted a student mentee. If you areas of expertise does not match with the areas of interests of the registered students, you may not be allotted any mentees in that particular phase of ASMP.</li>
</ul>
 <div class="row submit" id="submitbutton" style="background-color:#e4e4fc;padding:10px 10px;border:1px solid #00008b" >
    <i>The Continue Button Will Automatically come after 10 seconds. Please read the Rules and Regulations meanwhile.</i>

   <div id="countdown" style="font-size:16px; color:#000; font-weight:bold">10</div>
<script type="text/javascript">
    submit_appear();
</script>
    </div>

<?php //echo CHtml::endForm(); ?>
