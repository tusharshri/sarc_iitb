		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/addonload.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/formvalidation.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/step2.js'); ?>
		<div id="bar">
			<span id="registration">Registration for mentors</span>
			<ul>
				<li class="selected">1</li>
				<li class="selected">2</li>
				<li>3</li>
				<li>4</li>
			</ul>
		</div>
		<div id="content">
			<div id="contenttopic">Contact Information</div>
			<div id="contentbody">
				<form action="<?php echo Yii::app()->baseUrl.'/alumnusregistration/step2/';  ?>" method="post">
                <?php 
					$phoneno=$data4->phoneNumber;
					$skypeid=$data1->skypeId;
					foreach($data2 as $dataentry){
						if($dataentry['type']=='primary'){
								$email1=$dataentry['emailId'];
							}else if($dataentry['type']=='other'){
								$email2=$dataentry['emailId'];
							}
					}
					$address=$data3->address;
					$city=$data3->city;
					$state=$data3->state;
					$countrycode=Country::model()->findByAttributes(array('id'=>$data3->countryId));
					$country=$countrycode->name;
					$pincode=$data3->pincode;
				?>
					<table>
						<tr>
							<td class="detailname">Contact Number<span class="asterix">*</span></td>
							<td>
								<input type="text" id="phnum" name="phnum" value="<?php echo ''.$phoneno!=NULL ? $phoneno:'';  ?>" />
							</td>
						</tr>
						<tr>
							<td class="detailname">Email ID<span class="asterix">*</span></td>
							<td>
								<input type="text" id="email1" name="email1"value="<?php echo ''.$email1!=NULL ? $email1:'';  ?>"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">Alternate Email ID</td>
							<td>
								<input type="text" id="email2" name="email2" value="<?php echo ''.$email2!=NULL ? $email2:'';  ?>" />
							</td>
						</tr>
						<tr>
							<td class="detailname">Skype ID</td>
							<td>
								<input type="text" id="skypeid" name="skypeid" value="<?php echo ''.$skypeid!=NULL ? $skypeid:'';  ?>"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">Address Line 1<span class="asterix">*</span></td>
							<td>
								<input type="text" id="address1" name="address1"value="<?php echo ''.$address!=NULL ? $address:'';  ?>"/>
							</td>
						</tr>
						<!--<tr>
							<td class="detailname">Address Line 2</td>
							<td>
								<input type="text" id="address2" name="address2"<?php if($filled) echo " value=\"".$v['address2']."\"" ?> />
							</td>
						</tr>-->
						<tr>
							<td class="detailname">City<span class="asterix">*</span></td>
							<td>
								<input type="text" id="city" name="city"value="<?php echo ''.$city!=NULL ? $city:'';  ?>"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">State<span class="asterix">*</span></td>
							<td>
								<input type="text" id="state" name="state"value="<?php echo ''.$state!=NULL ? $state:'';  ?>"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">Country<span class="asterix">*</span></td>
							<td>
					
<select id="country" name="country">
                                    <?php $count = Country::model()->findAll();
                                    foreach($count as $results){
                                        echo "<option value='".$results->name."'";
                                        if($country==$results->name){
                                            echo "selected='selected'";
                                        }else{
                                            if($results->name=='India'){
                                                echo "selected='selected'";
                                            }
                                        }
                                        echo  ">".$results->name."</option>";
                                    }
                                    ?>
                                </select>
							</td>
						</tr>
						<tr>
							<td class="detailname">Pin/Zip Code<span class="asterix">*</span></td>
							<td>
						           <input type="text" id="pincode" name="pincode"value="<?php echo ''.$pincode!=NULL ? $pincode:'';  ?>"/>  
							</td>
						</tr>
					</table>
					<input id="submit" type="submit" value="NEXT >>" name="newform" />
				</form>
				<form action="<?php echo Yii::app()->baseUrl.'/alumnusregistration/step1/';  ?>">
					<input id="back" type="submit" value="<< BACK"  />
				</form>
			</div>
		</div>
		