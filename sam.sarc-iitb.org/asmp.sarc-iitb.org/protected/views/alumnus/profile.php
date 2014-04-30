<style type="text/css">
	#first_desp{
		float:left;
		border:1px solid rgb(196,204,223);
		width:80%;
		padding:10px 10px;
		border-radius:3px;
	}

	#pic{
		float:left;
	}
	
	#first_desp_content{
		float:left;
		width:80%;
		margin:0 10px;
		
	}	
	.font-type1{	
		font-size:16px;
		font-weight:bold;
		color:black;
		line-height:1.5em;
	}
	.font-type2{	
		font-size:15px;
		font-weight:bold;
		line-height:1.2em
	}
	
	#second_desp{
		clear:both;
		float:left;
		width:80%;	
		margin:10px 0;
	}
	
	.font-type_bold{
		font-size:16px;
		font-weight:bold;
		border-bottom:2px solid #c4ccdf;
	}
	
	.font-type_content{
		min-height:100px;
	}
	
	.designation {
		color: Black;	
		font-size:14px;
		font-weight:bold;
	}
	
	.company{
		color:rgb(1,10,27);	
	}
</style>

<div id="container">

	<div id="first_desp">
    	<div id="pic"><img src="<?php  
			$filename=$_SERVER{'DOCUMENT_ROOT'} .'/beta.mentorship/images/alumnus/'.Yii::app()->session['alumnusId'].'.jpg';
			$file2='../images/alumnus/'.Yii::app()->session['alumnusId'].'.jpg';
				if (file_exists($filename)) {
					echo $file2;
				} else {
					echo '../images/dummy.gif';
				}
			?>" width="110" height="132" alt="PIC" /></div>
		<div id="first_desp_content">
        	<div class="font-type1"><?php echo str_replace("  "," ",$mAlumnus->salutation." ".$mAlumnus->firstName." ".$mAlumnus->middleName." ".$mAlumnus->lastName); ?></div>
            <div class="font-type2"> <?php
    if(isset($mAlumnus->profDetails)){
		 //foreach($mAlumnus->profDetails as $key=>$profDetail){
        	echo $mAlumnus->profDetails[0]->designation.', ';
			echo $mAlumnus->profDetails[0]->company;
         //} ?>
          <?php } ?></div>
            <div class="font-type3">
            <?php 
            if(isset($mAlumnus->personalDetails)){
            	foreach($mAlumnus->personalDetails as $key=>$personalDetail){
					echo $personalDetail->city;					
				}
			} ?>
            </div><br /><hr />
            <div class="font-type4">
            	Department : <?php echo $mAlumnus->departmentCode.', '; ?>  <?php echo $mAlumnus->degree; ?><br />BATCH : <?php echo $mAlumnus->class; ?>
            </div>
            <div id="special_desp">
            </div>
        </div>	
	</div>
    <div id="second_desp">
    	<div id="1st_subheader">
        	<div class="font-type_bold">Work experience</div>
            <div class="font-type_content">
            	<?php
    if(isset($mAlumnus->profDetails)){
    ?>
                    
                <?php foreach($mAlumnus->profDetails as $key=>$profDetail){?>
                    <br /><span class="designation"><?php echo $profDetail->designation; ?></span>
                    <br/><span class="company"><?php echo $profDetail->company; ?></span>
                    <br/><span class="industry"><?php echo $profDetail->industry->name ?></span><br />
                <?php if($key==0) { ?>
                		<span class="workProfile"><?php echo $mAlumnus->workProfile; ?></span><br />
                <?php } ?>
					                
                <?php } ?>
            		
            <?php  } ?>
            <br />
            </div>
        </div>
        <!--<div id="1st_subheader">
        	<div class="font-type_bold">Other Stuff</div><hr />
            <div class="font-type_content"></div>
        </div>-->
    
    </div>

</div>