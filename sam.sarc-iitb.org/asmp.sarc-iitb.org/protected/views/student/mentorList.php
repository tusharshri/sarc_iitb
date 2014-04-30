 <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.listreorder.js'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.disable.text.select.pack.js'); ?>
<script type="text/javascript">
  
function seemore(a){
   document.getElementById('spans-'+a).style.display="none";
   document.getElementById('span-'+a).style.display="inline";
}

$(document).ready(function(){
  $('#industry_list').change(function(){
    var industry=$(this).val();
    var j=0;
    $("#alumni tr").hide();    
    if(industry=="All"){
      $("#alumni tr").show();
    }else{
    $('.industry').each(function(i){
      if($(this).html()==industry){
        $(this).parent().parent().show();
        j++;
      }
    });
    if(j==0){
      alert("No mentor found from \""+industry+"\" industry");
    }
    }
  });
});
</script>
<style type="text/css">
    #main-wrapper{
        width:900px;
    }
    .dragHandle {
        display: block;
        float: right;
        width: 21px;
        height: 21px;
        margin-left:5px;
        background-image:url('<?php echo Yii::app()->request->baseUrl."/images/resize.gif" ?>');
        cursor: move;
    }
    .removeSelected{
        color:red;
        cursor:pointer;
        float:right;
    }
    ol.selected{
        font-size: 15px;
    }
    table{
        float:left;

    }
    #alumni{
        width:95%;
        font-size:12px;
        border-top:solid 1px #0000ff;
    }
    #alumni tr:nth-child(odd){
         background-color:#f0f8ff;
    }
    #alumni tr td{
        border-bottom:solid 1px #0000ff;
    }
    #right{
        background-color:#ebe8e8;
        width:21%;
        padding:0 10px;
        margin-left:30px;
        float:left;s
    }
    #selected{
        padding:0;
        margin-left:18px;
    }
    #selected li:first-child{
        border-top:none;
    }
    #selected li:last-child{
        border-bottom:1px solid #aaa;
    }
    #selected li{
        width:150px;
        padding:5px 5px;
        height:20px;
        border-bottom:1px solid #222;
        border-top:1px solid #aaa;
    }

    .more{
        color:#6666ff;
        cursor:pointer;
    }
    .hidden{
        display:none;
    }
</style>
  <div class="notification">
    <b>Please Note:</b>
    <ul>
   <li>Following is the Prestigious Mentor list for Autumn 2013.To know more about the mentor and his personal details, please visit: <a href="http://tinyurl.com/mentorlist2013" target="_blank">http://tinyurl.com/mentorlist2013</a></li><br />
	<li>Click on the name of mentor to see his complete profile</li> 
    </ul>
	
    <!--    
    
    <b>Instructions</b>
        <ul>
            <li>The list of the Mentors shown below is sorted inorder of their department.
            <li>A dropdown list is provided below for the convenience of the students to know Mentors from what all Industries are available.
            
        </ul>
                <label> Select Industry: </label>
                <select id="industry_list" name="industry">
                  <option value="All">All</option>
<?php
    $criteria=new CDbCriteria;
    $criteria->together=true;
    $criteria->with=array('industry');
    $criteria->distinct=true;
    $criteria->select='industryId'; 
    $criteria->order='industry.name ASC';
    $criteria->group='industryId';
    $industries = AlumnusProfDetail::model()->findAll($criteria);
    foreach($industries as $industry){
        $industry=$industry->industry->name;
        echo "<option value='".$industry."'>".$industry."</option>
";
    }   
?>
                </select>
    -->

    </div>

<table id="alumni" cellspacing="0">

    <?php
    foreach($alumni as $key=>$value){

    ?>
    <tr id="tr-<?php echo $key; ?>">
        <td width="80px" style="cursor:pointer;" onclick="window.location='../mentorprofile/index.php?id=<?php echo $finalList[$key]->id; ?>'"><?php echo $finalList[$key]->salutation." ".$finalList[$key]->firstName." ".$finalList[$key]->middleName." ".$finalList[$key]->lastName; ?> </td>
        <td width="150px">
            <?php echo "<b>Department: </b>".$finalList[$key]->departmentCode."<br><b>Class: </b>".$finalList[$key]->class."<br><b>Degree: </b>".$finalList[$key]->degree; ?>
    </td>
        <td width="200px">
            <?php echo "<b>Designation: </b>".$finalList[$key]->profDetails[0]->designation ;?>
            <?php echo "<br><b>Company: </b>".$finalList[$key]->profDetails[0]->company ;?>

            <?php echo "<br><b>Work Profile: </b>";?>
            <?php
            if(strlen($finalList[$key]->workProfile)>80){
            echo substr($finalList[$key]->workProfile, 0 , 80)."<span class='more' id='spans-".$key."' onClick='seemore(".$key.")'>...See More</span><span id='span-".$key."' class='hidden'>".substr($finalList[$key]->workProfile, 81 , strlen($finalList[$key]->workProfile))."</span>";
            }
            else if($finalList[$key]->workProfile==NULL || $finalList[$key]->workProfile=="" || trim($finalList[$key]->workProfile)=="NA" || trim($finalList[$key]->workProfile)==""){
                echo "<i>NOT AVAILABLE</i>";
            }
                else{
                    echo $finalList[$key]->workProfile;
            }
            ?>

        </td>
    </tr>
        <?php
}
        ?>
</table>
