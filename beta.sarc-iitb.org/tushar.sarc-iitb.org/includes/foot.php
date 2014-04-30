<div class="header" id="footmax">
		<div class="wrapper" id="footer">
			<div class="footercontent" id="first">
				<span class="footerheading">External</span>
				
				<a href="http://www.iitbombay.org/" target="_blank">iitbombay.org</a>
				<a href="http://www.bombay76.com/" target="_blank">bombay76</a>
				<a href="http://www.cafepress.com/iitbombay" target="_blank">Cafepress</a>				
			</div>
			<div class="footercontent" >
				<span class="footerheading">Internal</span>
				<a href="http://www.iitb.ac.in/" target="_blank">IIT Bombay</a>
				<a href="http://gymkhana.iitb.ac.in/~hostels" target="_blank">Hostel-Affairs</a>
				<a href="" target="_blank">Guest-House Booking</a>
				
			</div>
			<div class="footercontent" id="second">
				<span class="footerheading">Social</span>
				<center style="padding: 0 95px;">
					<a href="https://www.facebook.com/SARC.2012" target="_blank"><img src="images/facebook.png"></a>
					<a href="http://www.linkedin.com/groups?mostPopular=&gid=3177153" target="_blank"><img src="images/linkedin.png"></a>
					<div class="clear"></div>
					<a href="https://twitter.com/sarc_iitb" target="_blank"><img src="images/twitter.png"></a>
					<a href="http://www.youtube.com/user/SARCIITB" target="_blank"><img src="images/youtube.png"></a>
					<div class="clear"></div>
				</center>
			</div>
			<div class="clear"></div>
			<hr id="hrr"/>
			<div class="endtag">&copy;&nbsp;Student Alumni Relations Cell, IIT Bombay</div>
		</div>
	</div>
	
<script type="text/javascript" src="js/jquery.hoverdir.js"></script>	
<script type="text/javascript">
	$(function() {
	
		$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );

	});
	$("#vision").hover(function()
	{ 
	   $(this).toggleClass('noShadow');
	});
</script>
<!-- for SAM PAGE-->
 <script>
	  (function(){
	  
		// Append a close trigger for each block
		$('.menu .content').append('<span class="close">x</span>');		
		// Show window
		function showContent(elem){
			hideContent();
			elem.find('.content').addClass('expanded');
			elem.addClass('cover');	
		}
		// Reset all
		function hideContent(){
			$('.menu .content').removeClass('expanded');
			$('.menu li').removeClass('cover');		
		}
		
		// When a li is clicked, show its content window and position it above all
		$('.menu li').click(function() {
			showContent($(this));
		});		
		// When tabbing, show its content window using ENTER key
		$('.menu li').keypress(function(e) {
			if (e.keyCode == 13) { 
				showContent($(this));
			}
		});

		// When right upper close element is clicked  - reset all
		$('.menu .close').click(function(e) {
			e.stopPropagation();
			hideContent();
		});		
		// Also, when ESC key is pressed - reset all
		$(document).keyup(function(e) {
			if (e.keyCode == 27) { 
			  hideContent();
			}
		});
		
	  })();
	</script>

	<!-- BSA AdPacks code -->
	<script>
	  (function(){
		var bsa = document.createElement('script');
		   bsa.async = true;
		   bsa.src = 'http://www.red-team-design.com/js/adpacks-demo.js';
		(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
	  })();
	</script> 
<!-- /for sam page -->
</body>
</html>