<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>History Saving Mechanism, IIT Bombay</title>
	<link rel="stylesheet" href="<?php echo base_url("static/css/bootstrap.min.css"); ?>" type="text/css" charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("static/css/bootstrap-responsive.css"); ?>" type="text/css" charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url("static/css/style.css"); ?>" type="text/css" charset="utf-8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo base_url("static/js/bootstrap.min.js"); ?>"></script>	
</head>
<body>
	<div class="panel panel-primary center">
        <div class="panel-heading">
          <h3 class="panel-title">History Saving Mechanism, IIT Bombay</h3>
        </div>
        <div class="panel-body">
          <h3>Your Data</h3><hr/>
          <?php
            foreach ($data_array as $data) {
          ?>
          <fieldset>
              <legend>Genre: <?php echo ucfirst($genres_array[$data->admin_id]); ?>, Event: <?php echo $data->name; ?></legend>

          <?php 
              echo '<span class="label label-danger" style="margin:10px;">Roll No.</span>'.$data->rollno.'<br/>';
              echo "<span class=\"label label-danger\" style=\"margin:10px;\"><b>Remarks:</b></span>$data->remarks<br/><br/>";
          ?>
          </fieldset>
          <?php 
          }

          ?><br/><br/>
          <a href="browse" class="btn btn-success">Browse More</a>



        </div>
      </div>
</body>
</html>
