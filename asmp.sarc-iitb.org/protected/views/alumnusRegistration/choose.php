<?php
	if (isset (Yii::app()->session['alumnusId'])) {		
?>		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/addonload.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/formvalidation.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/choose.js'); ?>
		<div id="bar">
			<span id="registration">Registration for mentors</span>
		</div>
		<div id="content">
			<div id="contenttopic">Please Choose Your Login Details</div>
			<div id="contentbody">
				<?php
					if (isset (Yii::app()->session['passerror'])) {
						echo "<span color=\"red\">Password is not matched</span>";
						unset(Yii::app()->session['passerror']);
					}
					if (isset (Yii::app()->session['unavilable'])) {
						echo "<span color=\"red\">This username is unavailable. Please choose a different username.</span>";				unset(Yii::app()->session['unavilable']);
					}
					if (isset (Yii::app()->session['error'])) {
						echo "<span color=\"red\">There some error in saving login credentials. Pls inform SARC team about this at<a href='mailto:sarc@iitb.ac.in'> sarc@iitb.ac.in</a></span>";				unset(Yii::app()->session['error']);
					}
					
				?>
				<form action="<?php echo Yii::app()->baseUrl.'/alumnusregistration/choose/';  ?>" method="post">
					<table>
						<tr>
							<td class="detailname">Username<span class="asterix">*</span></td>
							<td>
								<input type="text" id="username" name="username"/>
							</td>
						</tr>
						<tr>
							<td class="detailname">Password<span class="asterix">*</span></td>
							<td>
								<input type="password" id="password" name="password" />
							</td>
						</tr>
						<tr class="info"><td></td><td>The length of your password should be between 8 to 20.</td></tr>
						<tr>
							<td class="detailname">Retype Your Password<span class="asterix">*</span></td>
							<td>
								<input type="password" id="password2" name="password2" />
							</td>
						</tr>
					</table>
					<input id="submit" type="submit" value="SUBMIT" name="newform" />
				</form>
			</div>
		</div>
	</body>
</html>
<?php
	}
	else {
		header("Location: step1.php");
	}
?>