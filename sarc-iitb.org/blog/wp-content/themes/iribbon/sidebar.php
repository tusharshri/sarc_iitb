<?php if (dynamic_sidebar('Sidebar Widgets')) : else : ?>
    
        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->
    
		<div class="widget-container"> 
    <div class="ribbon-cut-blue"></div><div class="ribbon-bg-blue"><div class="ribbon-left-blue"></div><div class="ribbon-shadow"></div><div class="ribbon-right-blue"></div></div>   
		<h2 class="widget-title">Welcome to iRibbon</h2>
    	<ul>
						<li>Thank you for using iRibbon.</li>
						<li>&nbsp;</li>
						<li>We designed iRibbon to be as user friendly as possible, but if you do run into trouble we provide a <a href="http://cyberchimps.com/forum">support forum</a>, and <a href="http://cyberchimps.com/iribbon/iribbon-free-docs/">precise documentation</a>.</li>
						<li>&nbsp;</li>
						<li>If we were all designers then every WordPress theme would look this good.</li>
						<li>&nbsp;</li>
						<li>(To remove this Widget login to your admin account, go to Appearance, then Widgets and drag new widgets into Sidebar Widgets)</li>
					</ul>
    	</div>
		
		<div class="widget-container">
    <div class="ribbon-cut-blue"></div><div class="ribbon-bg-blue"><div class="ribbon-left-blue"></div><div class="ribbon-shadow"></div><div class="ribbon-right-blue"></div></div>   
		<h2 class="widget-title"><?php _e('Pages', 'iribbon' ); ?></h2>
		<ul>
    	<?php wp_list_pages('title_li=' ); ?>
    	</ul>
    	</div>
    
		<div class="widget-container">
    <div class="ribbon-cut-blue"></div><div class="ribbon-bg-blue"><div class="ribbon-left-blue"></div><div class="ribbon-shadow"></div><div class="ribbon-right-blue"></div></div>    
    	<h2 class="widget-title"><?php _e( 'Archives', 'iribbon' ); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>
        
		<div class="widget-container">
    <div class="ribbon-cut-blue"></div><div class="ribbon-bg-blue"><div class="ribbon-left-blue"></div><div class="ribbon-shadow"></div><div class="ribbon-right-blue"></div></div>    
       <h2 class="widget-title"><?php _e('Categories', 'iribbon' ); ?></h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>
        
		<div class="widget-container">
    <div class="ribbon-cut-blue"></div><div class="ribbon-bg-blue"><div class="ribbon-left-blue"></div><div class="ribbon-shadow"></div><div class="ribbon-right-blue"></div></div>  
    	<h2 class="widget-title"><?php _e('WordPress', 'iribbon' ); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="<?php echo esc_url( __('http://wordpress.org/', 'iribbon' )); ?>" target="_blank" title="<?php esc_attr_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.', 'iribbon'); ?>"> <?php _e('WordPress', 'iribbon' ); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>
    	
    	<div class="widget-container">
      <div class="ribbon-cut-blue"></div><div class="ribbon-bg-blue"><div class="ribbon-left-blue"></div><div class="ribbon-shadow"></div><div class="ribbon-right-blue"></div></div>
    	<h2 class="widget-title"><?php _e('Subscribe', 'iribbon' ); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e('Entries (RSS)', 'iribbon' ); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e('Comments (RSS)', 'iribbon' ); ?></a></li>
    	</ul>
    	</div>
	
<?php endif; ?>