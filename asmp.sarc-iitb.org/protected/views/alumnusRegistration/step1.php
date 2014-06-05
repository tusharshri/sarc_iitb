		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/addonload.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/formvalidation.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/step1.js'); ?>
		<div id="bar">
			<span id="registration">Registration for mentors</span>
			<ul>
				<li class="selected">1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
			</ul>
		</div>
		<div id="content">
			<div id="contenttopic">General Information</div>
			<div id="contentbody">
				<form action="<?php echo Yii::app()->baseUrl.'/alumnusregistration/step1/';  ?>" method="POST" >
					<table>
						<tr>
							<td class="detailname" id="name">Name<span class="asterix">*</span></td>
							<td>
								<table id="nametable">
									<tr>
										<td>
											<select name="salutation">
                                            
<?php
	$salutation=$data->salutation;
	$firstname=$data->firstName;
	$middlename=$data->middleName;
	$lastname=$data->lastName;
	$department=Department::model()->findByAttributes(array('code'=>$data->departmentCode))->name;
	$hostel=$data->hostel;
	$batch=$data->class;
	$course=$data->degree;
?>
												<option value="Mr." <?php echo ''.$salutation=="Mr." ? ' selected="selected"': '' ; ?> >Mr.</option>
												<option value="Mrs." <?php echo ''.$salutation=="Mrs." ? ' selected="selected"': '' ; ?> >Mrs.</option>
												<option value="Ms." <?php echo ''.$salutation=="Ms." ? ' selected="selected"': '' ; ?> >Ms.</option>
												<option value="Dr." <?php echo ''.$salutation=="Dr." ? ' selected="selected"': '' ; ?> >Dr.</option>
											</select>
										</td>
										<td>
											<input type="text" id="firstname" name="firstname" value="<?php echo ''.$firstname!=NULL ? $firstname:'';?>" />
										</td>
										<td>
											<input type="text" id="middlename" name="middlename" value="<?php echo ''.$middlename!=NULL ? $middlename:'';?>" />
										</td>
										<td>
											<input type="text" id="lastname" name="lastname" value="<?php echo ''.$lastname!=NULL ? $lastname:'';?>" />
										</td>
									</tr>
									<tr class="info">
										<td>Salutation<span class="asterix">*</span></td>
										<td>First Name<span class="asterix">*</span></td>
										<td>Middle Name</td>
										<td>Last Name<span class="asterix">*</span></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="detailname">Department<span class="asterix">*</span></td>
							<td>
								<select name="department">

									<option value="Aerospace Engineering" 
									<?php echo ''.$department=="Aerospace Engineering" ? 'selected="selected"' : '' ; ?> >Aerospace Engineering</option>
									<option value="Centre for Aerospace Systems Design and Engineering" <?php echo ''.$department=="Centre for Aerospace Systems Design and Engineering" ? 'selected="selected"':''; ?>>Centre for Aerospace Systems Design and Engineering</option>
									<option value="Centre for Environmental Science and Engineering"<?php echo ''.$department=="Centre for Environmental Science and Engineering" ? 'selected="selected"':'';?> >Centre for Environmental Science and Engineering</option>
									<option value="Centre for Formal Design and Verification of Software" <?php echo ''.$department == "Centre for Formal Design and Verification of Software" ? 'selected="selected"':''; ?>>Centre for Formal Design and Verification of Software</option>
									<option value="Centre for Research in Nanotechnology and Science"<?php echo ''.$department == "Centre for Research in Nanotechnology and Science" ? 'selected="selected"':'';?>>Centre for Research in Nanotechnology and Science</option>
									<option value="Centre of Studies in Resources Engineering"<?php echo ''.$department == "Centre of Studies in Resources Engineering" ? 'selected="selected"' : '';?>>Centre of Studies in Resources Engineering</option>
									<option value="Centre for Technology Alternatives for Rural Areas"<?php echo ''.$department == "Centre for Technology Alternatives for Rural Areas" ? 'selected="selected"':'';?>>Centre for Technology Alternatives for Rural Areas</option>
									<option value="Chemical Engineering"<?php echo ''.$department == "Chemical Engineering" ? ' selected="selected"':'';?>>Chemical Engineering</option>
									<option value="Chemistry"<?php echo ''.$department == "Chemistry" ? 'selected="selected"':''?>>Chemistry</option>
									<option value="Civil Engineering"<?php echo ''.$department == "Civil Engineering" ? 'selected="selected"':'';?>>Civil Engineering</option>
									<option value="Computer Science and Engineering"<?php echo ''.$department == "Computer Science and Engineering" ? 'selected="selected"':'';?>>Computer Science and Engineering</option>
									<option value="Earth Sciences"<?php echo ''.$department == "Earth Sciences" ? 'selected="selected"':'';?>>Earth Sciences</option>
									<option value="Electrical Engineering"<?php echo ''.$department == "Electrical Engineering" ? ' selected="selected"':'';?>>Electrical Engineering</option>
									<option value="Energy Science and Engineering"<?php echo ''.$department == "Energy Science and Engineering" ? ' selected="selected"':'';?>>Energy Science and Engineering</option>
									<option value="Engineering Physics"<?php echo ''.$department == "Engineering Physics" ? 'selected="selected"':'';?>>Engineering Physics</option>
									<option value="Humanities and Social Sciences"<?php echo ''.$department == "Humanities and Social Sciences" ? ' selected="selected"':'';?>>Humanities and Social Sciences</option>
									<option value="Industrial Design Centre"<?php echo ''.$department == "Industrial Design Centre" ? ' selected="selected"':'';?>>Industrial Design Centre</option>
									<option value="Mechanical Engineering"<?php echo ''.$department == "Mechanical Engineering" ? ' selected="selected"':'';?>>Mechanical Engineering</option>
									<option value="Metallurgical Engineering and Material Science"<?php echo ''.$department == "Metallurgical Engineering and Material Science" ? ' selected="selected"':'';?>>Metallurgical Engineering and Material Science</option>
									<option value="Physics"<?php echo ''.$department == "Physics" ? ' selected="selected"':'';?>>Physics</option>
									<option value="School of Management"<?php echo ''.$department == "School of Management" ? ' selected="selected"':'';?>>School of Management</option>
									<option value="School of Bioscience"<?php echo ''.$department == "School of Bioscience" ? ' selected="selected"':'';?>>School of Bioscience</option>
									<option value="Sophisticated Analytical Instrument Facility"<?php echo ''.$department == "Sophisticated Analytical Instrument Facility" ? ' selected="selected"':'';?>>Sophisticated Analytical Instrument Facility</option>
									<option value="System and Control Engineering Department"<?php echo ''.$department == "System and Control Engineering Department" ? ' selected="selected"':'';?>>System and Control Engineering Department</option>
									<option value="System and Control Engineering Department"<?php echo ''.$department == "Others" ? ' selected="selected"':'';?>>Others</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="detailname">Course<span class="asterix">*</span></td>
							<td>
								<select name="course">
									<option value="B.Tech."<?php echo ''.$course == "B.Tech." ? 'selected="selected"':'';?>>B.Tech</option>
									<option value="M.Tech."<?php echo ''.$course == "M.Tech." ? 'selected="selected"':'';?>>M.Tech</option>
									<option value="Dual Degree"<?php echo ''.$course == "Dual Degree" ? 'selected="selected"':'';?>>Dual Degree</option>
									<option value="M.Sc"<?php echo ''.$course == "M.Sc" ? 'selected="selected"':'';?>>M.Sc</option>
									<option value="Ph.D"<?php echo ''.$course == "Ph.D" ? 'selected="selected"':'';?>>Ph.D</option>
									<option value="M.Des"<?php echo ''.$course == "M.Des" ? 'selected="selected"':'';?>>M.Des</option>
									<option value="M.Mgt"<?php echo ''.$course == "M.Mgt" ? 'selected="selected"':'';?>>M.Mgt</option>

								</select>
							</td>
						</tr>
						<tr>
							<td class="detailname">Hostel<span class="asterix">*</span></td>
							<td>
								<select name="hostel">
									<option value="1"<?php echo ''.$hostel == "1" ? 'selected="selected"':'';?>>Hostel 1</option>
									<option value="2"<?php echo ''.$hostel == "2" ? 'selected="selected"':'';?>>Hostel 2</option>
									<option value="3"<?php echo ''.$hostel == "3" ? 'selected="selected"':'';?>>Hostel 3</option>
									<option value="4"<?php echo ''.$hostel == "4" ? 'selected="selected"':'';?>>Hostel 4</option>
									<option value="5"<?php echo ''.$hostel == "5" ? 'selected="selected"':'';?>>Hostel 5</option>
									<option value="6"<?php echo ''.$hostel == "6" ? 'selected="selected"':'';?>>Hostel 6</option>
									<option value="7"<?php echo ''.$hostel == "7" ? 'selected="selected"':'';?>>Hostel 7</option>
									<option value="8"<?php echo ''.$hostel == "8" ? 'selected="selected"':'';?>>Hostel 8</option>
									<option value="9"<?php echo ''.$hostel == "9" ? 'selected="selected"':'';?>>Hostel 9</option>
									<option value="10"<?php echo ''.$hostel == "10" ? 'selected="selected"':'';?>>Hostel 10</option>
									<option value="11"<?php echo ''.$hostel == "11" ? 'selected="selected"':'';?>>Hostel 11</option>
									<option value="12"<?php echo ''.$hostel == "12" ? 'selected="selected"':'';?>>Hostel 12</option>
									<option value="13"<?php echo ''.$hostel == "13" ? 'selected="selected"':'';?>>Hostel 13</option>
									<option value="14"<?php echo ''.$hostel == "14" ? 'selected="selected"':'';?>>Hostel 14</option>
							</select>
							</td>
						</tr>
						<tr>
							<td class="detailname">Year of Passing Out<span class="asterix">*</span></td>
							<td>
								<select name="batch">

									
                                    <?php
									for($i=1962;$i<2014;$i++){
										?>
                                       <option value="<?php echo $i;  ?>" <?php echo ''.$batch == $i ? 'selected="selected"':'';?>><?php echo $i;  ?></option>
                                        <?php
									}
								?>
								</select>
							</td>
						</tr>
					</table>
					<input id="submit" type="submit" value="NEXT >>" name="newform"/>
				</form>
			</div>
		</div>
