<?php
    define('API_KEY', 'geCv8VhxmS3tNaH6jbV5YoD8tXMp1HXgcZfVds-O_PBvN1ZYo4FDgPr28rAQwFn_');
        
?>

		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/addonload.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/formvalidation.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/step3.js'); ?>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.5b1.js"></script>
        <script type="text/javascript" src="http://platform.linkedin.com/in.js">
           api_key: <?php echo API_KEY; ?> 
           authorize: true
           onLoad: onLinkedInLoad
        </script>
        
        
        <script type="text/javascript">
        $(document).ready(function() {
            $("#industry").change(function() {
                if($("#industry").attr("value")=="Others"){
                    $("#industry_others").css("display","inline");
                }else{
                    $("#industry_others").css("display","none");
                }
            });
            $("#industry2").change(function() {
                if($("#industry2").attr("value")=="Others"){
                    $("#industry_others2").css("display","inline");
                }else{
                    $("#industry_others2").css("display","none");
                }
            });
            $("#industry3").change(function() {
                if($("#industry3").attr("value")=="Others"){
                    $("#industry_others3").css("display","inline");
                }else{
                    $("#industry_others3").css("display","none");
                }
            });
        });
        </script>


        <script type="text/javascript">
            function onLinkedInLoad() {
                  IN.Event.on(IN, "auth", function() {onLinkedInLogin();});
                  IN.Event.on(IN, "logout", function() {onLinkedInLogout();});
            }
            function onLinkedInLogin() {
                //alert("Loggedin"); 
            }
            function onLinkedInLogout() {
                //alert("LoggedOut");
            }
            function getPositions(){
                IN.API.Profile("me").fields(["id","positions","publicProfileUrl"]).result(displayPositions);
            }
            function displayPositions(profile){
                positions = profile.values[0].positions;
                //$("#profile").html(JSON.stringify(profile));
                try{
                    document.getElementsByName("linkedin")[0].value=profile.values[0].publicProfileUrl;
                }catch(err){                    
                }
                np = positions._total;
                workProfile="";
                try{
                if(np>0){
                    position=positions.values[0];
                    document.getElementsByName("designation")[0].value=position.title;
                    document.getElementsByName("company")[0].value=position.company.name;
                    document.getElementsByName("industry")[0].value=position.company.industry;
                    workProfile = workProfile+position.summary+"\n";
                }                
                if(np>1){
                    position=positions.values[1];
                    document.getElementsByName("designation2")[0].value=position.title;
                    document.getElementsByName("company2")[0].value=position.company.name;
                    document.getElementsByName("industry2")[0].value=position.company.industry;
                    workProfile = workProfile+position.summary+"\n";
                }                
                if(np>2){
                    position=positions.values[2];
                    document.getElementsByName("designation3")[0].value=position.title;
                    document.getElementsByName("company3")[0].value=position.company.name;
                    document.getElementsByName("industry3")[0].value=position.company.industry;
                    workProfile = workProfile+position.summary+"\n";
                }
                document.getElementsByName("workprofile")[0].value = workProfile;
                }catch(err){                
                }
            }
        </script>
		<div id="bar">
			<span id="registration">Registration for mentors</span>
			<ul>
				<li class="selected">1</li>
				<li class="selected">2</li>
				<li class="selected">3</li>
				<li>4</li>
			</ul>
		</div>
		<div id="content">
			<div id="contenttopic">Professional Information</div>
			<div id="contentbody">
				<form action="<?php echo Yii::app()->baseUrl.'/alumnusregistration/step3/';  ?>" method="post">
					<table>
					
					
						
						<tr>
						    <td colspan=2>
						        This infomation is crucial as it will be displayed when the students are opting for their mentors.
						        Please give the details appropriately.<br/>
						        <small>Note: Your contact details will not be displayed, just your work profile</small>
						        <!--
						        <?php
						        if(!$filled){
						        ?>
						        <p>You can choose to fill the details manually<br/>
						        <span style="margin-left:50px">OR</span><br/>
						        <span>Import them from your Linkedin account.<br/><br/>
						        <script type="in/Login" data-onAuth="getPositions">
						            <span style="color:green">Your details have been successfully imported.</span>
						        </script>
						        <?php
						        }	
						        ?>	
                                -->	
                                
                                
                                <?php
									$workprofile=$data1->workProfile;
									$linkedin=$data1->linkedin;
									foreach($data2 as $dataentry){
										if($dataentry['jobNumber']==1){
											$designation=$dataentry['designation'];
											$company=$dataentry['company'];
											$industry=Industry::model()->findByAttributes(array('id'=>$dataentry['industryId']))->name;	
										}
										else if($dataentry['jobNumber']==2){
											$designation2=$dataentry['designation'];
											$company2=$dataentry['company'];
											$industry2=Industry::model()->findByAttributes(array('id'=>$dataentry['industryId']))->name;	
										}
										else if($dataentry['jobNumber']==3){
											$designation3=$dataentry['designation'];
											$company3=$dataentry['company'];
											$industry3=Industry::model()->findByAttributes(array('id'=>$dataentry['industryId']))->name;	
										}
									}
								
								?>			        
                                <div id="profile"></div>
						    </td>
				        </tr>
						<tr>
						    <td></td>
						    <td></td>
						</tr>
						
						<tr><td colspan=2><hr></td></tr>
					
						<tr>
							<td class="detailname">Designation<span class="asterix">*</span></td>
							<td>
								<input type="text" id="designation" name="designation" value="<?php echo ''.$designation!=NULL ? $designation:''; ?>" />
							</td>
						</tr>
						<tr>
							<td class="detailname">Company<span class="asterix">*</span></td>
							<td>
								<input type="text" id="company" name="company"value="<?php echo ''.$company!=NULL ? $company:'';?>"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">Industry<span class="asterix">*</span></td>
							<td>
								<select id="industry" name="industry">
                                <?php  
								$connection=Yii::app()->db;
								$sql5="SELECT name FROM `Industry` WHERE 1 ORDER BY `name` ASC";
								$entry=$connection->createCommand($sql5)->query();
								foreach($entry as $entrydata){
								?>
                                
									<option value="<?php  echo $entrydata['name'] ?>" <?php echo ''.$industry == $entrydata['name'] ? 'selected="selected"':'';?>><?php  echo $entrydata['name'] ?></option>
                                    <?php } ?>
								</select>
								<input type="text" id="industry_others" style="<?php if ($industry!='Others') echo 'display:none;'?>height:28px;width:270px;" name="industryOthers"<?php echo " value=\"".$industryOthers."\"" ?> />
							</td>
						</tr>
						<tr><td colspan=2><hr></td></tr>
					
						<tr>
							<td class="detailname">Designation</td>
							<td>
								<input type="text" id="designation2" name="designation2" value="<?php echo ''.$designation2!=NULL ? $designation2:''; ?>" />
							</td>
						</tr>
						<tr>
							<td class="detailname">Company</td>
							<td>
								<input type="text" id="company2" name="company2"value="<?php echo ''.$company2!=NULL ? $company2:'';?>"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">Industry</td>
							<td>
								<select id="industry" name="industry">
                                <?php  
								$connection=Yii::app()->db;
								$sql5="SELECT name FROM `Industry` WHERE 1 ORDER BY `name` ASC";
								$entry=$connection->createCommand($sql5)->query();
								foreach($entry as $entrydata){
								?>
                                
									<option value="<?php  echo $entrydata['name'] ?>" <?php echo ''.$industry2 == $entrydata['name'] ? 'selected="selected"':'';?>><?php  echo $entrydata['name'] ?></option>
                                    <?php } ?>
								</select>
								<!--<input type="text" id="industry_others" style="<?php if ($industry!='Others') echo 'display:none;'?>height:28px;width:270px;" name="industryOthers"<?php echo " value=\"".$industryOthers."\"" ?> />-->
							</td>
						</tr>
                        <tr><td colspan=2><hr></td></tr>
					
						<tr>
							<td class="detailname">Designation</td>
							<td>
								<input type="text" id="designation3" name="designation3" value="<?php echo ''.$designation3!=NULL ? $designation3:''; ?>" />
							</td>
						</tr>
						<tr>
							<td class="detailname">Company</td>
							<td>
								<input type="text" id="company3" name="company3"value="<?php echo ''.$company3!=NULL ? $company3:'';?>"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">Industry</td>
							<td>
								<select id="industry" name="industry">
                                <?php  
								$connection=Yii::app()->db;
								$sql5="SELECT name FROM `Industry` WHERE 1 ORDER BY `name` ASC";
								$entry=$connection->createCommand($sql5)->query();
								foreach($entry as $entrydata){
								?>
                                
									<option value="<?php  echo $entrydata['name'] ?>" <?php echo ''.$industry3 == $entrydata['name'] ? 'selected="selected"':'';?>><?php  echo $entrydata['name'] ?></option>
                                    <?php } ?>
								</select>
								<!--<input type="text" id="industry_others" style="<?php if ($industry!='Others') echo 'display:none;'?>height:28px;width:270px;" name="industryOthers"<?php echo " value=\"".$industryOthers."\"" ?> />-->
							</td>
						</tr>
                        <tr><td colspan=2><hr></td></tr>
						<tr>
							<td class="detailname">Work Profile<span class="asterix">*</span><br/><span class="note" style="color:#F10">Please provide your work profile in as much detail as possible, as it will help the students make an informed decision when they request a mentor from the displayed list of registered alumni.</span></td>
							<td>
								<textarea id="workprofile" name="workprofile"><?php echo ''.$workprofile!=NULL ? $workprofile:'';?></textarea>
							</td>
						</tr>
						<tr>
							<td class="detailname">Linkedin Profile</td>
							<td>
								<input type="text" id="linkedin" name="linkedin" value="<?php echo ''.$linkedin!=NULL ? $linkedin:'';?>" />
							</td>
						</tr>
					</table>
					<input id="submit" type="submit" name="newform" value="NEXT>>" />
				</form>
				<form action="step2">
					<input id="back" type="submit" value="<< BACK" />
				</form>
			</div>
		</div>
		
