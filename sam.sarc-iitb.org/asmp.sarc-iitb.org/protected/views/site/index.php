<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<div>
<p>Mentoring is a brain to pick, an ear to listen, and a push in the right direction. With the aim of mending the broken link between students and alumni, Student Alumni Relations Cell (SARC) launched Alumni Student Mentorship Program (ASMP).

<p><b>Mentor@Intern</b> an 
initiative 
by SARC 
IIT Bombay 
and 
IIT Bombay AA 
on the similar lines of ASMP To know more about it click <a href="http://asmp.sarc-iitb.org/mentor@intern/">here</a>

</p>

<p>Our Program emphasizes on:
    <ul>
        <li>Providing students a platform for one to one interaction with their esteemed alumni.
        <li>Rendering students with career guidance.
        <li>Tailoring them for their future endeavors.
        <li>Catering to the betterment of alumni-student relationships by engaging them in fruitful conversations.
    </ul>
</p>
<?php //print_r($_SESSION); ?>

<p>For more details visit <a href="http://www.sarc-iitb.org/mentorship.php">ASMP</a></p>
<?php if(Yii::app()->user->isGuest){ ?><p>Click <?php echo CHtml::link("here",array("site/login"));?> to login</a><?php } ?>
<p>Click <?php echo CHtml::link("here",array("student/mentorList"));?> to view the Mentor List</p>

          <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script><div class="fb-like-box" data-href="https://www.facebook.com/ASMP.IITB?ref=hl" data-width="292" data-show-faces="true" data-stream="false" data-show-border="true" data-header="true"></div></p>
</div>
