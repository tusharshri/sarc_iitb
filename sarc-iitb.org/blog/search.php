<?php
unset($_SERVER['PATH_INFO']);
//Include current WordPress Theme Header etc.
require('./wp-config.php');
function maketitle() {
return " | Search Results";
}
//Check if we’re wrapping the WP Theme
//Get Theme settings.
$themes = get_themes();
$current_theme = get_current_theme();
$current_template_dir = $themes[$current_theme]['Template Dir'];
$current_stylesheet_dir = $themes[$current_theme]['Stylesheet Dir'];
//Initialize the WP class to be able to get the header
wp();
//Set status to 200 to override the 404 set by WordPress
status_header(200);
//Include the WP Header
add_filter("wp_title",'maketitle');
get_header();
?>
<div id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 600;
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>

<?php get_sidebar(); ?>
<?php
get_footer();
?>