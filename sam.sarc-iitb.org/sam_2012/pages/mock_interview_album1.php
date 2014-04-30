
<script type="text/javascript">
$(function(){
    $('.box_skitter_large2').skitter();
});
</script>

<div class="box_skitter box_skitter_large2">

    <ul>
    <?php    //path to directory to scan
$directory = "image/event/mock interview/";
 
//get all image files with a .jpg extension.
$images = glob($directory . "*");
 
//print each file name
$i=1;
foreach($images as $image)
{
  ?>          <li>
                <a href=""><img src="<?php echo $image; ?>" alt="<?php echo $i ?>" class="block"/></a>
                <!--<div class="label_text">
                <p>Label</p>
            </div>-->
                </li>
				<?php
				$i++;
}
?>
    </ul>
</div>