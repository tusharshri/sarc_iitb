<?php echo validation_errors(); ?>
<div class='event-form'>
<?php echo form_open(); ?><br/>
	<label for="username">Select Event</label>
	<select name="event_id">
	<?php foreach ($events_by_user as $event) { ?>
		 <option value="<?php echo $event->id; ?>"><?php echo $event->name; ?></option>
	<?php	}	?>
	</select>
	<br/><br/>
	<label for="rollno">Enter Student's Roll Number(s)<br/><sub>Enter Comma Separated Values for multiple entries</sub></label>
	<?php echo form_input(array('name'=>'rollno', 'id'=>'rollno', 'class'=>'form-control', 'placeholder'=>'Roll Number'), set_value('rollno')); ?><br/>

	<label for="position">Enter Position Secured</label>
	<?php echo form_input(array('name'=>'position', 'id'=>'position', 'class'=>'form-control', 'placeholder'=>'Position'), set_value('position')); ?><br/>

	<label for="remarks">Enter Remarks (if any)</label>
	<?php echo form_input(array('name'=>'remarks', 'id'=>'remarks', 'class'=>'form-control', 'placeholder'=>'Remarks'), set_value('remarks')); ?><br/>

	

	<?php echo form_submit(array('class'=>'btn btn-primary', 'name'=>'submit'), 'Add'); ?><br/><br/>

<?php echo form_close(); ?>
</div>