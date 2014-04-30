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
          <p>Please Login to Access the Portal</p><br/><br/>
          <?php echo validation_errors(); ?><br/>
          <?php if(isset($message)){
          	echo $message;
          }
          ?>
          <?php echo form_open(); ?>
          <label for="username">Username:</label>
          <?php echo form_input(array('name'=>'username', 'id'=>'username', 'class'=>'form-control', 'placeholder'=>'Enter Username'), set_value('username')); ?><br/><br/>
          <label for="password">Password:</label>
          <?php echo form_password(array('name'=>'password', 'id'=>'password', 'class'=>'form-control', 'placeholder'=>'Password')); ?><br/>
          <?php echo form_submit(array('class'=>'btn btn-primary', 'name'=>'submit'), 'Login!'); ?>
          <?php echo form_close(); ?>
        </div>
      </div>
</body>
</html>