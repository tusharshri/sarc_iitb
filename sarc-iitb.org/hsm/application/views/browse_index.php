<?php var_dump($genre); ?>
Select Events:
<?php var_dump($events); ?>
Click on the link to browse.<br/>

<?php foreach($events as $index=>$value){
	echo anchor("browse/event/$index/$value", "$value", 'title="News title"')."<br/>";
} ?>