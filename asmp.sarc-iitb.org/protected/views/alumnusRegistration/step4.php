		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/addonload.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/formvalidation.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/step4.js'); ?>
		<div id="bar">
			<span id="registration">Registration for mentors</span>
			<ul>
				<li class="selected">1</li>
				<li class="selected">2</li>
				<li class="selected">3</li>
				<li class="selected">4</li>
			</ul>
		</div>
		<div id="content">
			<div id="contenttopic">Mentee Preferences</div>
			<div id="contentbody">
				<form action="<?php echo Yii::app()->baseUrl.'/alumnusregistration/step4/';  ?>" method="post">
					<table>
						<tr>
							<td class="detailname">Preference<span class="asterix">*</span></td>
							<td>
								<select id="preference" name="preference">
									<option value="Technical">Technical</option>
									<option value="Non-Technical">Non-technical</option>
								</select>
							</td>
						</tr>
						<tr class="info"><td></td><td>By 'Technical' and 'Non-Technical', we mean students who are and are not inclined towards technical fields respectively.</td></tr>
						<tr>
							<td class="detailname">Number of mentees<span class="asterix">*</span></td>
							<td>
								<select name="numbermentees">
									<option value="0">Any</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="detailname">Preferred department<span class="asterix">*</span></td>
							<td>
								<select name="preferreddept" id="preferreddept">
									<option value="Any">Any Department</option>
									<option value="Aerospace Engineering">Aerospace Engineering</option>
									<option value="Centre for Aerospace Systems Design and Engineering">Centre for Aerospace Systems Design and Engineering</option>
									<option value="Centre for Environmental Science and Engineering">Centre for Environmental Science and Engineering</option>
									<option value="Centre for Formal Design and Verification of Software">Centre for Formal Design and Verification of Software</option>
									<option value="Centre for Research in Nanotechnology and Science">Centre for Research in Nanotechnology and Science</option>
									<option value="Centre of Studies in Resources Engineering">Centre of Studies in Resources Engineering</option>
									<option value="Centre for Technology Alternatives for Rural Areas">Centre for Technology Alternatives for Rural Areas</option>
									<option value="Chemical Engineering">Chemical Engineering</option>
									<option value="Chemistry">Chemistry</option>
									<option value="Civil Engineering">Civil Engineering</option>
									<option value="Computer Science and Engineering">Computer Science and Engineering</option>
									<option value="Earth Sciences">Earth Sciences</option>
									<option value="Electrical Engineering">Electrical Engineering</option>
									<option value="Energy Science and Engineering">Energy Science and Engineering</option>
									<option value="Engineering Physics">Engineering Physics</option>
									<option value="Humanities and Social Sciences">Humanities and Social Sciences</option>
									<option value="Industrial Design Centre">Industrial Design Centre</option>
									<option value="Mechanical Engineering">Mechanical Engineering</option>
									<option value="Metallurgical Engineering and Material Science">Metallurgical Engineering and Material Science</option>
									<option value="Physics">Physics</option>
									<option value="School of Management">School of Management</option>
									<option value="School of Bioscience">School of Bioscience</option>
									<option value="Sophisticated Analytical Instrument Facility">Sophisticated Analytical Instrument Facility</option>
									<option value="System and Control Engineering Department">System and Control Engineering Department</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="detailname">Area of Interest<span class="asterix">*</span></td>
							<td>
								<select id="areaofinterest" name="areaofinterest">
								</select>
								<br />
							</td>
						</tr>
					</table>
					<input id="submit" type="submit" value="FINISH >>" name="newform" />
				</form>
				<form action="step3">
					<input id="back" type="submit" value="<< BACK" />
				</form>
			</div>
		</div>