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

</ul>

<?php echo CHtml::beginForm(); ?>
       <?php echo CHtml::submitButton('I Agree', array('name'=> 'understand', 'id'=>'understand')); ?>
<?php echo CHtml::endForm(); ?>




