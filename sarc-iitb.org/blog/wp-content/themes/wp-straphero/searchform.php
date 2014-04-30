<?php do_action('wpstraphero_pre_searchform'); ?>
<form role="search" method="get" id="searchform" class="form-search" action="<?php echo home_url( '/' ); ?>">
  <label class="hide" for="s"><?php _e( 'Search for:', 'wpstraphero' ); ?></label>
  <input type="text" value="<?php if ( is_search() ) echo get_search_query(); ?>" name="s" id="s" class="search-query" placeholder="<?php _e( 'Search', 'wpstraphero' ); ?> <?php bloginfo( 'name' ); ?>">
  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'wpstraphero'); ?>" class="btn">
</form>
<?php do_action('wpstraphero_after_searchform'); ?>