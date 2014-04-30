<?php
$this->breadcrumbs=array(
	'Student Registration'=>array('/studentRegistration'),
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
        setTimeout("submit_button()", 20000);
    }
    function countdown(){
        document.getElementById("countdown").innerHTML=document.getElementById("countdown").innerHTML-1;
    }
    function submit_button(){
         document.getElementById("submitbutton").innerHTML= '<?php echo CHtml::submitButton('Accept', array('name'=> 'Rules','id'=>'submit_button')); ?>';


    }
</script>

<h1>Rules and Regulations:</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>

    <div class="notification">
         <b>Instructions</b>
        <ul>
            <li>
               Please read these Rules & Regulations Carefully. If found breaking any rules, you may be de-regestered from ASMP.
            </li>

        </ul>
    </div>
<ol id="rules">
<li>The allotment will be done on the basis of students as well as mentors preference. Once done the allotment will be final and the SARC Team will not entertain requests to change mentors without any valid reason. Requests for a change of mentor will be handled on a case-to-case basis based on genuinity and validity of the reason given.
</li>
<li>Mentors will be shown the profiles of the students who have preferred him/her. This will help the mentor in giving preference to the mentees. Hence kindly fill all the details with care. Any insulting or improper details will result in immediate disqualification..
</li>
<li>    No personal requests/favors will be entertained by SARC team
regarding mentee in choosing his/her mentor.
</li>
<li>    After the first meeting we expect students to interact with their
mentor at least once a month through any means of communication. It is
imperative that students provide feedback in the feedback columns in
there logins every month.If an alumnus complains about lack of
response the student will be warned and subsequently deregistered.
</li><li>Do not force the alumnus for any kind of personal benefit like
interns/placements. Alumni relations of IITB might get severely
damaged as a result of this.
</li><li>We expect students to understand that alumni relations are very
important for the institute so please do not do anything that can
jeopardize these relations. Violations of the above rules can result
in the de registration of the concerned student.

<li>SARC will be conducting a Mentor-Mentee Meet on 6th-7th October 2013. This will be the official Start of Mentee–Mentor relationship. Attending it is imperative for those students whose mentor is coming to the meet. Those students whose mentors can not attend, will be given an opportunity to interact with other alumnus via. hostel interactions.</li>
<li>SARC will be inviting all mentors. Only mentees of the attending mentors will participate in the Event. If any mentor can not make it to the Mentor-Mentee meet, sarc team will not be held liable for it . </li>
</ol>
<?php echo CHtml::beginForm(); ?>
 <div class="row submit" id="submitbutton" style="background-color:#e4e4fc;padding:10px 10px;border:1px solid #00008b" >
    <i>The Submit Button Will Automatically come after 20 seconds. Please read the Rules and Regulations meanwhile.</i>

     <div id="countdown" style="font-size:16px; color:#000; font-weight:bold">20</div>
<script type="text/javascript">
    submit_appear();
</script>
    </div>

<?php echo CHtml::endForm(); ?>
