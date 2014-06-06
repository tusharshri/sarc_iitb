<?php
include "header.php";
session_start();
if(isset($_SESSION['role'])){
	unset($_SESSION['role']);
}
$_SESSION['role']="volunteer";
?>
		<div id="content">
			<div class="post" style="padding-top: 57px;">
				<h2 class="title">Volunteer Login</h2>
				<h3 class="date">Starting Date: 9th June 2014</h3>
				<div class="entry">
					<?php include "./login.php" ?>
				</div>
				
			</div>
			
		
		</div>
		<!-- end contentn -->
		<?php
include "footer.php";
?>
		