
<?php $this->pageTitle=Yii::app()->name; ?>

        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
		<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
    <body>

<div style="float:right;"><a href="index/">Back to home</a></div>
        								
 <div id="wrapper">
        <div id="slider-wrapper">        
            <div id="slider" class="nivoSlider">
                <a href="#"><img src="http://sarc-iitb.org/images/sid1.jpg" alt="" align="right"></a>
                <img src="http://sarc-iitb.org/images/sid.jpg" align="right">
                <img src="http://sarc-iitb.org/images/sid2.jpg" align="middle">
            </div>        
        </div>

<script type="text/javascript" src="lib/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="lib/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</div>
    </body>
