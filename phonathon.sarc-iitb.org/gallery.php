<?php
include "header.php";
?>
		<div id="content">
			<div class="post" style="padding-top: 57px;">
				<h2 class="title">Gallery</h2>
				<h3 class="date">Starting Date: 1st June 2013</h3>
				<div class="entry" id="regisrt">
					<!-- Slider goes here -->
					
					<div class="wrapper">

				<ul id="sb-slider" class="sb-slider">
					<li>
						<a href="#" target="_blank"><img src="./images/1.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Volunteer of the Day Award</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="./images/2.jpg" alt="image2"/></a>
						<div class="sb-description">
							<h3>Calling in Phonathon</h3>
						</div>
					</li>
					
					<li>
						<a href="#" target="_blank"><img src="./images/9.jpg" alt="image2"/></a>
						<div class="sb-description">
							<h3>Group Pic of Volunteers</h3>
						</div>
					</li>
					
					<li>
						<a href="#" target="_blank"><img src="./images/8.jpg" alt="image2"/></a>
						<div class="sb-description">
							<h3>Phonathon Treat</h3>
						</div>
					</li>
					
					<li>
						<a href="#" target="_blank"><img src="./images/3.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Phonathon Treat</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="./images/4.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Training Session by Expert</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="./images/5.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Phonathon Treat</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="./images/6.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Phonathon XVII Treat</h3>
						</div>
					</li>
					<li>
						<a href="#" target="_blank"><img src="./images/7.jpg" alt="image1"/></a>
						<div class="sb-description">
							<h3>Phonathon XVII Treat</h3>
						</div>
					</li>
				</ul>

				<div id="shadow" class="shadow"></div>

				<div id="nav-arrows" class="nav-arrows">
					<a href="#">Next</a>
					<a href="#">Previous</a>
				</div>

			</div><!-- /wrapper -->
			

		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.slicebox.js"></script>
		<script type="text/javascript">
			$(function() {
				
				var Page = (function() {

					var $navArrows = $( '#nav-arrows' ).hide(),
						$shadow = $( '#shadow' ).hide(),
						slicebox = $( '#sb-slider' ).slicebox( {
							onReady : function() {

								$navArrows.show();
								$shadow.show();

							},
							orientation : 'r',
							cuboidsRandom : true,
							disperseFactor : 30
						} ),
						
						init = function() {

							initEvents();
							
						},
						initEvents = function() {

							// add navigation events
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

						};

						return { init : init };

				})();

				Page.init();

			});
		</script>
					
					
					
					
					
					<!-- Slider goes here -->					
				</div>
				
			</div>
			
		
		</div>
		<!-- end contentn -->
		<?php
include "footer.php";
?>
		