<?php
$this->breadcrumbs=array(
	'Student Registration'=>array('/studentRegistration'),
	'Guidelines',
);?>
<style type="text/css">
    #understand{
        padding: 5px 20px;
        width:100px !important;
        margin: 20px ;
    }
    #guidelines{
        font-size:15px;
    }
    #guidelines li{
        padding: 5px 0;
    }
</style>

<h1>Please consider the following points while choosing Mentors</h1>
<ul id="guidelines">
    <li>There are mentors who reside outside Mumbai and some even abroad.
You should understand that this programme is for career counselling so choose those mentors
who have similiar areas of interest and are a part of the industry that you would like to join in
the near future.</li>
    <li>
Find a mentor whom you would be comfortable interacting with and who you think can guide
you the best
        </li>
    <li>
SARC will be conducting a Mentor-Mentee Meet on 11<sup>th</sup>-12<sup>th</sup> Febraury. This will be the official Start of Mentee – Mentor relationship. This event will mark the start of this year’s alumni student mentorship program. 
        </li>
    <li>
The mentors and mentees will be able to meet and interact in the `Break the Ice’ event held by
SARC where they can get to know each other over lunch.
ASMP team will be inviting all the mentors. Attending it is imperative for those students whose
mentor is coming to the meet.
        </li>
    <li>
If any mentor can not make it to the above mentioned event, ASMP team will not be held liable for it. Those students whose mentors can not attend the Mentor- Mentee Meet, will not be a part of Break the Ice event however they will be given an opportunity to interact with other alumni (whose industry and other professional details will be floated before the meet) via hostel interactions. 
</li>
</ul>

<?php echo CHtml::beginForm(); ?>
       <?php echo CHtml::submitButton('I Agree', array('name'=> 'understand', 'id'=>'understand')); ?>
<?php echo CHtml::endForm(); ?>




