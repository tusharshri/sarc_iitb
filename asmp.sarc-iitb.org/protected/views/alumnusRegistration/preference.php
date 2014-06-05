<?php
$this->breadcrumbs=array(
	'Student Registration'=>array('/studentRegistration'),
	'Preference',
);?>

 <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.listreorder.js'); ?>
 <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.disable.text.select.pack.js'); ?>
<!--designation, cpmpany, industry, department,class, degree    -->

       <script type="text/javascript">
          var selected=0;
          var j_query=jQuery.noConflict();
          function submit(){
              var index=j_query('#selected li').length;
              if(index<=2){
                  alert('Select altleast 3 alumni to continue');
                  return false;
              }
              if(index==10){
                  var confirms=confirm('You have selected '+index+' alumni. You cannot change this later. Do you want to continue?');
              }
              else{
              var confirms=confirm('You have selected '+index+' alumni. You can select maximum of 10 alumni. You cannot change this later. Do you want to continue?');
              }
              var array= new Array();
              for(var i=0; i<(index); i++){
                  array[i]=j_query('#selected li:nth-child('+(i+1)+')').attr('id').substring(3);
              }
              if(confirms){
                  j_query('#mentorPreference').val(array);
                  //alert(array);
                  j_query('form#submitPreference').submit();

                  /*j_query.ajax({
                      type:'POST',
                      data: "q="+array,
                      url: 'final_submit/',
                      success: function(data){
                          if(data=="success"){
                              window.location="end/";
                          }
                          else{
                              alert('Server Error. Please try again later or Conact Web Administrator');
                          }
                      }
                  });*/
              }
              return false;
          }
          j_query(window).scroll(function(){
              if(j_query(window).scrollTop()<=170){
                    j_query("#right").animate({"marginTop": ("0px")}, "fast" );
              }else{
                  j_query('#right').css('margin-top',(j_query(window).scrollTop()-330)+"px" );
              // j_query("#right").animate({"marginTop": (j_query(window).scrollTop()-155) + "px"}, "fast" );
              }
          });
           function seemore(a){
               document.getElementById('spans-'+a).style.display="none";
               document.getElementById('span-'+a).style.display="inline";
        }

              function removeAlumnus(id){
                  var remove=confirm("Do you want to remove Alumnus "+id+" ?");
                  if(remove){
                j_query('#li-'+id).remove();
                j_query('#tr-'+id).fadeIn('fast');

                selected--;

                  }
              }
          j_query(document).ready(function(){
          var options = {
                itemHoverClass : 'myItemHover',
                dragTargetClass : 'myDragTarget',
                dropTargetClass : 'myDropTarget'
            };
         // var selectedreorder=j_query('ol#selected').ListReorder(options);


        j_query('.add').click(function(){
            j_query(this).removeAttr('checked');

            if(selected>=10)
                alert('You can Select upto 10 Alumnus Only. Please remove some to add this alumni.');
            else{
                var id=j_query(this).attr('id');
                //alert(id);
                j_query('#tr-'+id).css('display','none');
                var text=j_query('#tr-'+id+' td:nth-child(2)').html();
                //alert(text);
                //j_query('#selected li:nth-child('+selected+')').html(text);
                var remove = '<span class="removeSelected" onclick="removeAlumnus('+id+')"><img src="<?php echo Yii::app()->request->baseUrl.'/images/cross.gif'?>"></span>';
               // alert(selected);
                //alert(j_query('#selected li:nth-child('+(selected+1)+')').html());

                /*j_query('#selected li:nth-child('+(selected+1)+')').html(remove+text);
                j_query('#selected li:nth-child('+(selected+1)+')').attr('id', 'li-'+id);
                */
                /*if(selected==1){
                  j_query('#selected').html('<li id="li-'+id+'">'+remove+text+' </li>');
                }else{   */
                j_query('#selected').html(j_query('#selected').html() + '<li id="li-'+id+'">'+remove+text+' </li>');
                //}
                selected++;
                j_query('ol#selected').ListReorder(options);

            }
        });

	j_query('#industry_list').change(function(){
		var industry=j_query(this).val();
		var j=0;
		j_query("#alumni tr").hide();
		if(industry=="All"){
			j_query("#alumni tr").show();
		}else{
		j_query('.industry').each(function(i){
			if(j_query(this).html()==industry){
				j_query(this).parent().parent().show();
				j++;
			}
		});
		if(j==0){
			//alert("No mentor found from \""+industry+"\" industry");
		}
		}
	});
         j_query('#student-mentorship-preference-form').submit(function(){
             var index=j_query('#selected li').length;
             if(index>0){
                  var array= new Array();
                  for(var i=0; i<(index); i++){
                      array[i]=j_query('#selected li:nth-child('+(i+1)+')').attr('id').substring(3);
                  }
                 var confirms = confirm("You have chosen to change to your preference options. You will loose your saved Preferences.\n You have chosen Alumni "+array.toString()+". Please note them down and proceed. \n Do you want to continue?");
                if(confirms){
                    return true;
                }else{
                    return false;
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
        width:72%;
        font-size:10px;
        border-top:solid 1px #0000ff;
        margin-top:15px;
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
        width:170px;
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

            <li>
                The list of Alumni below is sorted as per your given preferences. Still, you can change the preference order by changing your choices below.
            </li>

            <li>
                You can select maximum of 10 alumnus.
            </li>
            <li>
                After selecting Alumni you can delete or re-order them.
            </li>

        </ul>
    </div>
<div id="main-wrapper">



    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'student-mentorship-preference-form',
        'enableAjaxValidation'=>false,
    )); ?>

        <?php echo $form->errorSummary($models); ?>


        <div style="display:none ">
            <?php echo $form->label($models,'preference'); ?>
            <?php echo $form->dropDownList($models,'preference',$models->getPreferenceOptions()); ?>
            <?php echo $form->error($models,'preference'); ?>
        </div>

         <div>
            <?php echo $form->label($models,'preferredDepartmentCode'); ?>
            <?php echo $form->dropDownList($models,'preferredDepartmentCode',$models->getDepartmentOptions())?>
            <?php echo $form->error($models,'preferredDepartmentCode'); ?>
        </div>

        <div>
            <?php echo $form->label($models,'areaOfInterest'); ?>
           <?php echo $form->dropDownList($models,'areaOfInterest',$models->getAreaOfInterestOptions()) ?>
            <?php echo $form->error($models,'areaOfInterest'); ?>
        </div>
        <div class="row buttons">
		<?php echo CHtml::submitButton($models->isNewRecord ? 'Create' : 'Sort'); ?>
	</div>
            <?php $this->endWidget(); ?>

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
    //TODO: remove next line
    $criteria->condition='alumnusId NOT IN (SELECT alumnusId FROM MentorshipConnection WHERE phaseYear=\'02_2012\')';
    $industries = AlumnusProfDetail::model()->findAll($criteria);
    foreach($industries as $industry){
        $industry=$industry->industry->name;
        echo "<option value='".$industry."'>".$industry."</option>
";
    }   
?>
    </select>


<table id="alumni" cellspacing="0">

    <?php
    foreach($alumni as $key=>$value){

    ?>
    <tr id="tr-<?php echo $key; ?>">
        <td width="15px" ><input class="add" type="checkbox" id="<?php echo $key; ?>"></td>
        <td width="80px"><?php echo $finalList[$key]->salutation." Alumnus ".$finalList[$key]->id; ?></td>
        <td width="150px">
            <?php echo "<b>Department: </b>".$finalList[$key]->departmentCode."<br><b>Class: </b>".$finalList[$key]->class."<br><b>Degree: </b>".$finalList[$key]->degree; ?>
    </td>
        <td width="200px">

            <?php echo "<b>Designation: </b>".$finalList[$key]->profDetails[0]->designation ;?>
            <?php echo "<br><b>Company: </b>".$finalList[$key]->profDetails[0]->company ;?>
            <?php echo "<br><b>Industry: </b><span class='industry'>".$finalList[$key]->profDetails[0]->industry->name."</span>"  ;?>
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
     <!--
    <table id="selected">
          <?php for($i=1; $i<=15; $i++){?>
                 <tr id="tr1-<?php echo $i; ?>">
                     <td><?php echo $i; ?></td>
                       <td></td>
                 </tr>
        <?php }
?>
    </table>    -->
         <div id="right">
          <span>Selection in <b>order of Preference</b></span>
         <ol id="selected">

         </ol>
         <form id="submitPreference" name="submitPreference" action="../studentRegistration - Copy/submitPreference" method="post">
               <input type="hidden" id="mentorPreference" name="mentorPreference"/>
             </form>
               <button onclick="submit();">Save</button>

         </div>    </div>
