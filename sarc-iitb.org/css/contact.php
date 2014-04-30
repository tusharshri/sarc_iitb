
<?php
    include 'header.php';
?>
<script type="text/javascript">
document.title = "CONTACT :: SARC";
$(document).ready(function(){
  $('.once:nth(0)').addClass('active').removeClass('deactivate');
});
</script>

    <div class="container">
      <div id="left">
          <div class="first">
            <h3>Contact Us</h3>
                <ul>
                  <li onclick="scroll(180)">About the SARC</li>
                    <li onClick="scroll(500)">How to find Us</li>
                    <li onclick="scroll(670)">View location Map</li>
                    <li onclick="scroll(1150)">Suggestion/Feedback</li>
                 </ul>
           </div>
            
            <div class="first">
            <h3>See also</h3>
                <ul>
                  <li><a href="events.php?q=phonathon">Phonathon</a></li>
                    <li><a href="events.php?q=sam">Alumni Meet</a></li>
                    <li><a href="team.php">Team</a></li>
                    <li><a href="about.php">About Us</a></li>
                 </ul>
           </div>
            
        </div>
        <div id="center">
      <div class="first">
              <div id="content1">
                <h2>About SARC</h2>
<p>              Student Alumni Relations Cell, SARC is a voluntary organization run by the students of IIT Bombay committed towards the enhancement of relationship between students and alumni of IIT Bombay. Over past years SARC has launched many initiatives which have acted as a common platform for interaction between students and alumni.
</p><p>
Through efforts of SARC IIT Bombay's alumni are now able to pro actively contribute towards the betterment of their alma mater.
  </p>      </div>
                </div>
                <div id="find">
                <h3>How To Find Us</h3>
                Dean ACR, Main building, Main Gate Road, Indian Institute Of Technology (IIT), Bombay, Powai, Mumabai - 400 076<br>Maharashtra<br><div id="contact">
                <b>Tel. No. :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +91 9930847169<br>
                <b>E-mail :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sarc@iitb.org
                </div>
                <br>
                <a id="map">Hide Location Map</a>
             
                <div id="gmap">
                <iframe width="540" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Gulmohar+Building,+IIT+Bombay,+Powai,+Mumbai,+Maharashtra&amp;aq=&amp;sll=19.130654,72.917633&amp;sspn=0.040383,0.084543&amp;ie=UTF8&amp;hq=Gulmohar+Building,&amp;hnear=Dept+of+Earth+Sciences,+IIT+Bombay,+YP+Rd,+Powai,+Mumbai,+Mumbai+suburban,+Maharashtra+400076&amp;ll=19.144844,72.926044&amp;spn=0.064867,0.092525&amp;z=13&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Gulmohar+Building,+IIT+Bombay,+Powai,+Mumbai,+Maharashtra&amp;aq=&amp;sll=19.130654,72.917633&amp;sspn=0.040383,0.084543&amp;ie=UTF8&amp;hq=Gulmohar+Building,&amp;hnear=Dept+of+Earth+Sciences,+IIT+Bombay,+YP+Rd,+Powai,+Mumbai,+Mumbai+suburban,+Maharashtra+400076&amp;ll=19.144844,72.926044&amp;spn=0.064867,0.092525&amp;z=13&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                
                </div>
                
                </div>
                <div id="contactform">
                <h2>Feedback Form</h2>
                <div id="formdisplay">
                What is your say on us is important for us. We look forward to your suggestions and feedbacks.
                <form name="contactus" id="feedback">
<table>
<tr>
  <td width="120px" height="30px">Name:</td>

    <td><input type="text" name="nam" id="nam"><span id="namerror">Please provide name.</span></td>
</tr>
<tr>
  <td>E-mail:</td>
    <td><input type="email" id="email"  onBlur="emailcheck()" name="email"><span id="emailerror">Invalid E-mail</span></td>
</tr>
<tr id="type">
  <td>Who are you?:</td>

    <td><select name="who" id="who">
      <option value="">Please Select One</option>
      <option value="student">An IIT Bombay student</option>
        <option value="alumni"> An IIT Bombay Alumni</option>
        <option value="other">Other</option>
    </select>

    <span id="emailerror">Invalid E-mail</span></td>
</tr>
<tr id="studenttr">
<td>Which Year</td>
<td><select id="year" name="year">
  <option value="first">First Year</option>
    <option value="second">Second Year</option>

    <option value="third">Third Year</option>
    <option value="fourth">Fourth Year</option>
    <option value="fifth">Fifth Year</option>
  </select>

</td>
</tr>
<tr id="alumnitr">
<td>Your Graduation Year</td>

<td><input name="gradyr" type="text"></td>
</tr>

<tr>
  <td valign="top">Your Message:</td>
    <td><input type="hidden" name="contact" value="submit"><textarea name="message" id="message"></textarea><span id="mssgerror" style="vertical-align:top; float:left">Your message must be of atleast 10 characters.</span></td>

</tr>
<tr>

  <td><div id="submitbutton" class="submit_contact">Submit</div></td>
    </tr>
</table>
</form>
                   </div>
                   <div id="formhide" style="display:none">
            Thank You for your valuable suggestion.
              Your message has been submitted. We will get back to you soon.  
            </div>
                </div>
            
        </div>
        <?php
include "right_bar.php";
        ?>
    </div>
<?php
    include 'footer.php';
?>
 
</body>
</html>