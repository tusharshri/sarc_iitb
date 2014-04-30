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
	<div class="panel panel-primary portal">
	    <div class="panel-heading">
	      <h3 class="panel-title">History Saving Mechanism, IIT Bombay</h3>
	      <span class="logout"><?php echo anchor('portal/logout', 'Logout!'); ?><span>
	    </div>
	    <div class="panel-body">
	      Hello <?php echo $role; ?>, Welcome to your HSM home. 
	    </div>
	    <center>
		    <div class="fselector">
			    <ul class="nav nav-pills">
				  <li class="active"><?php echo anchor('portal/index', 'Home');?></li>
				  <li><?php echo anchor('portal/add_data', 'Add Data');?></li>
				  <li><?php echo anchor('portal/events', 'Manage Events');?></li>
				</ul>
			</div>
		</center>