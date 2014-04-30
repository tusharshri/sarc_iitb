<style type="text/css" media="screen">
#slider1 {
    width: 720px; /* important to be same as image width */
    height: 300px; /* important to be same as image height */
    position: relative; /* important */
	overflow: hidden; /* important */
}

#sliderContent, #slider1Content {
    width: 720px; /* important to be same as image width or wider */
    position: absolute;
	top: 0;
	margin-left: 0;
}
.sliderImage, .slider1Image {
    float: left;
    position: relative;
	display: none;
}

.slider1Image img{
	width:300px;	
}
.sliderImage span {
    position: absolute;
	font: 10px/15px Arial, Helvetica, sans-serif;
    padding: 10px 13px;
    width: 384px;
    background-color: #000;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
	-khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
}

.slider1Image span {
    position: absolute;
	font: 10px/15px Arial, Helvetica, sans-serif;
    padding: 10px 13px;
    width: 694px;
    background-color: #000;
    filter: alpha(opacity=70);
    -moz-opacity: 0.7;
	-khtml-opacity: 0.7;
    opacity: 0.7;
    color: #fff;
    display: none;
}
.clear {
	clear: both;
}
.sliderImage span strong, .slider1Image span strong {
    font-size: 14px;
}
.top {
	top: 0;
	left: 0;
}
.bottom {
	bottom: 0;
    left: 0;
}
.left {
	top: 0;
    left: 0;
	width: 110px !important;
	height: 280px;
}
.right {
	right: 0;
	bottom: 0;
	width: 90px !important;
	height: 290px;
}
ul { list-style-type: none;}
</style>
    <script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/s3Slider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#slider1').s3Slider({
            timeOut: 3000
        });
    });
</script>
<div id="slider1">
        <ul id="slider1Content">
        <?php    //path to directory to scan
$directory = "../image/event/BTH/";
 
//get all image files with a .jpg extension.
$images = glob($directory . "*");
 
//print each file name
$i=1;
foreach($images as $image)
{
  ?>          <li class="slider1Image">
                <a href=""><img src="<?php echo $image; ?>" alt="<?php echo $i ?>" /></a>
                <!--<span class="left"><strong>Title text 1</strong><br />Content text...</span>-->
                </li>
				<?php
				$i++;
}
?>
            <div class="clear slider1Image"></div>
        </ul>
    </div>