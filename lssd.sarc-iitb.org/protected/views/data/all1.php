<script type="application/javascript">
$(document).ready(function(){
	$('tbody tr').click(function(){
		//alert('hii');
		//alert($(this).find('td:first').text());
		var v =$(this).find('td:first').text();
		window.location='id/'+v;
	});
});
</script>
<form method="get">
<input type="search" placeholder="search" name="q" value="<?=isset($_GET['q']) ? CHtml::encode($_GET['q']) : '' ; ?>" />
<input type="submit" value="search" />
</form>

<?php
 
/*
  defaults:
  pagerlist => array(
  '10' => 10,
  '25' => 25,
  '50' => 50,
  '100' => 100,
  'all' => 'All', // you can use the zii dictionary
  ),
  pagerlistCssClass => 'pager-list',
  template => "{summary}\n{pagerlist}\n{pager}\n{items}",
  textItemsPerPage => 'items per page', // you can use the zii dictionary
 */

$this->widget('application.extensions.NPager.NGridView', array(
    'dataProvider' => $dataProvider,
));
?>


