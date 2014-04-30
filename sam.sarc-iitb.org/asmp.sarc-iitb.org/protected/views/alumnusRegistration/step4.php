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
									<?php $depart = Department::model()->findAll();
                            foreach($depart as $results){
                                echo "<option value='".$results->name."'";
                                    if($depart==$results->name){
                                        echo "selected='selected'";
                                    }
                                echo  ">".$results->name."</option>";
                            }
                            ?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="detailname">Area of Interest<span class="asterix">*</span></td>
							<td>
								<select id="areaofinterest" name="areaofinterest">
								    <option value="Any">Any</option>
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