<br/><p>Events already added by you are:<br/>  
<?php
	foreach ($events_by_user as $events) {
		echo '<span class="label label-danger" style="margin:1px;">'.$events->name.'</span>';
	}
?></p>
<?php echo validation_errors(); ?>
<div class='event-form'>
	<?php echo form_open(); ?>
	<label for="name">Enter Event</label>
	<?php echo form_input(array('id'=>'name', 'placeholder'=>'Enter Name of the Event', 'name'=>'name', 'class'=>'form-control'), set_value('name')) ?>
	<br/>
	<label for="subgenre">Enter Sub Genre</label>
	<select name="subgenre">
	<?php foreach ($subgenre_list_for_admin as $subgenres) { ?>
		 <option value="<?php echo $subgenres->id; ?>"><?php echo $subgenres->name; ?></option>
	<?php	}	?>
	</select><br/><br/>
	<?php echo form_submit(array('class'=>'btn btn-primary', 'name'=>'submit'), 'Add Event');	?>
	<?php echo form_close(); ?>
</div>