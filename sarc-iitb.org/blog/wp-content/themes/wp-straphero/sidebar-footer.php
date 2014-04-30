    <div class="row fluid">
        <div class="span4">
            <?php if ( is_active_sidebar( 'wpstraphero-footer-left' ) ) : ?>
	            <?php dynamic_sidebar( 'wpstraphero-footer-left' ); ?>
            <?php endif; // end sidebar widget area ?>
        </div>
	
        <div class="span4">
            <?php if ( is_active_sidebar( 'wpstraphero-footer-middle' ) ) : ?>
	            <?php dynamic_sidebar( 'wpstraphero-footer-middle' ); ?>
            <?php endif; // end sidebar widget area ?>	
        </div>
	
        <div class="span4">
            <?php if ( is_active_sidebar( 'wpstraphero-footer-right' ) ) : ?>
	            <?php dynamic_sidebar( 'wpstraphero-footer-right' ); ?>
            <?php endif; // end sidebar widget area ?>   
        </div>
    </div><!-- /.row -->