<form method="get" id="searchform" action="<?php bloginfo('home');?>">
	<div><input type="text" value="Search here..." name="s" id="s" onfocus="if (this.value == 'Search here...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search here...';}" />
		<input type="submit" id="searchsubmit" value="" />
	</div>
</form>