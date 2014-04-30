
  </div><!-- /.container -->
<!-- FOOTER -->
 <div class="footer-jumbotron">
    <div class="container">
      <?php get_sidebar ( 'footer' ); ?>
    <footer>
        <p class="scroll-top pull-right"><a href="#scroll-top" class="top">Return to the top</a></p>
        <p class="copyright"><?php if ( get_theme_mod( 'wpstraphero_copyright_textbox' ) ) { esc_html_e(get_theme_mod( 'wpstraphero_copyright_textbox' )); } else { echo 'Copyright &copy; ' . date( 'Y' ); ?> <?php bloginfo( 'name' ); } ?></p>
		<?php if ( get_theme_mod( 'wpstraphero_credits_visibility' ) == '' ) { ?>
	    <p class="powered-by"><a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'wpstraphero' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'wpstraphero' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
		<?php printf( __( 'Theme: %1$s by %2$s.', 'wpstraphero' ), 'WP Strap Hero', '<a href="http://www.wpstrapcode.com/" rel="designer">WP Strap Code</a>' ); ?></p>
	    <?php } ?>
	</footer>
	</div>
</div><!--- end --->    
    <?php wp_footer(); ?>
  </body>
</html>