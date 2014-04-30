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
         <b>Instructions</b>
        <ul>
			<li>These alumni mentors are not yet alloted to anyone since they registered after the student registrations began
            <li>The list of the Mentors shown below is sorted inorder of their department.
            <li>A dropdown list is provided below for the convenience of the students to know Mentors from what all Industries are available.
            <li>The mentors registered in the past two days could not be included in the list. However these mentors will be included in registration interface tomorrow.
        </ul>
								<label> Select Industry: </label>
								<select id="industry_list" name="industry">
									
									
								</select>

    </div>

<table id="alumni" cellspacing="0">

    <?php
	$alloted=array(10,12,18,19,21,24,28,37,39,50,57,76,78,81,83,118,123,132,146,165,184,201,205,234,242,270,273,275,290,291,292,300,303,304,308,312,314,317,322.326,327,328,330,331,339,356,360,362,377,406,408,411,413,419,423,426,430,433,436,438,447,455,459,460,466,473,476,479,480,481,484,486,487,488,489,491,493,497,498,504);
    foreach($alumni as $key=>$value){
		foreach($alloted as $allotedId){
			$value=false;
			if($finalList[$key]->id==$allotedId){
			$value=true;
			break;
			}
			}
			if($value==true){
    ?>
    <tr id="tr-<?php echo $key; ?>">
        <td width="80px"><?php echo $finalList[$key]->salutation." Alumnus ".$finalList[$key]->id; ?></td>
        <td width="150px">
            <?php echo "<b>Department: </b>".$finalList[$key]->departmentCode."<br><b>Class: </b>".$finalList[$key]->class."<br><b>Degree: </b>".$finalList[$key]->degree; ?>
    </td>
        <td width="200px">
			<?php
			$industry[$finalList[$key]->alumnusProfDetails[0]->industry]=$finalList[$key]->alumnusProfDetails[0]->industry;
			?>
            <?php echo "<b>Designation: </b>".$finalList[$key]->alumnusProfDetails[0]->designation ;?>
            <?php echo "<br><b>Company: </b>".$finalList[$key]->alumnusProfDetails[0]->company ;?>
            <?php echo "<br><b>Industry: </b><span class='industry'>".$finalList[$key]->alumnusProfDetails[0]->industry."</span>" ;?>
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
}}
?>
		<script type="text/javascript">
			
			<?php
			$option="<option value='All'>All</option>";
			foreach($industry as $ind){
				$option=$option."<option value='".$ind."'>".$ind."</option>";
			}
			?>
			var html="<?php echo $option; ?>";
			document.getElementById('industry_list').innerHTML=html;
			
		</script>
        
</table>
