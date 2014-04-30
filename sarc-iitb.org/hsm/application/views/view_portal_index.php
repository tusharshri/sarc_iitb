<h3>Data already added by you</h3>
<?php
	foreach ($data_by_user as $data) {
?>
<fieldset>
    <legend>Event: <?php echo $data->name; ?></legend>

<?php 
		echo '<span class="label label-danger" style="margin:10px;">Roll No.</span><span class="label label-primary" style="margin:1px;">'.$data->rollno.'</span><br/>';
		echo "<span class=\"label label-danger\" style=\"margin:10px;\"><b>Remarks:</b></span> <span class=\"label label-primary\" style=\"margin:1px;\">$data->remarks</span><br/><br/>";
?>
</fieldset>
<?php 
}

?>