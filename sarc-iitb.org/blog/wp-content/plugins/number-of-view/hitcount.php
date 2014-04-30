<?
/*
Plugin Name: number of view
Plugin URI: http://www.lavluda.com/my-wordpress-plugins/
Description: A simple plugin to show the number of hits of perticular post and page 
Author: S. M. Ibrahim Lavlu
Version: 1.0.2
Author URI: http://www.lavluda.com
*/

global $wpdb, $hitcount_table_name;
if (!function_exists("get_option")) {hitcount_readme();die;}

// Edit this line if you want to use a different MySQL table name:
$hitcount_table_name = $wpdb->prefix . "hitcount";

// Increments the database by one and returns the total number of hits to date.

function hitcount_increasehit() {
	global $wpdb, $hitcount_table_name, $post;
	$pid = $post->ID;
	$ptype = $post->post_type;

		if( ($wpdb->get_var("SELECT hits from $hitcount_table_name WHERE `pid` =  '$pid' and `type`='$ptype'"))){
			$wpdb->query("UPDATE $hitcount_table_name SET hits = hits + 1 WHERE pid = '$pid' and `type`='$ptype'");
		}
		else {
			$wpdb->query("insert into $hitcount_table_name (`type`,`pid`,`hits`) values('$ptype',$pid,'1')");
		}
			


}


function hitcount_gethits(){
    global $wpdb,$post,$hitcount_table_name;
    $pid = $post->ID;
    $ptype = $post->post_type;
    $posttable = $wpdb->prefix."posts";
    return $wpdb->get_var("SELECT hits FROM $hitcount_table_name, $posttable WHERE `$hitcount_table_name`.pid = $pid and `$hitcount_table_name`.`type` =  '$ptype' and `$posttable`.post_title !='' ");
}

// Prints an error message.
function hitcount_readme() {
	echo '<br><strong>Something is wrong!</strong><br>';
}

function displayhitcount($content){
	global $post; //wordpress post global object
    global $wpdb,$post,$hitcount_table_name;

            if(is_single() || is_page()){
             hitcount_increasehit();
             //echo "single post";
            }
            $hits = hitcount_gethits();
            //echo $wpdb->last_query;
            if($hits==null or empty($hits))
                $hits = 0;
            $position = get_option('hitscount_position');
            $label = get_option('hitscount_label');
            $label = !empty($label)?$label:"Number of View: ";
            if($position == 'bottom')
            	$content = $content. $label.$hits;
            else 
            	$content = $label.$hits."<br/>".$content;
	    return $content;
}


// Installs the plugin.
function hitcount_install() {
	global $wpdb, $hitcount_table_name;
	if ($wpdb->get_var("SHOW TABLES LIKE '$hitcount_table_name'") != $hitcount_table_name) {
		$wpdb->query("CREATE TABLE ".$hitcount_table_name." (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,`type` ENUM( 'post', 'page' ) NOT NULL DEFAULT 'post',`pid` INT NOT NULL ,`hits` INT( 11 ) NOT NULL,`create_at` DATETIME NULL ,`last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP) TYPE = MYISAM ;");
		add_option("hitcount_db_version", "1.0");
	}
}

add_filter('the_content', 'displayhitcount');
add_action('admin_menu', 'my_plugin_menu');

register_activation_hook(__FILE__, "hitcount_install");

/*add_action('admin_menu', 'hitcount_menu');

function hitcount_menu() {
  add_options_page('My Plugin Options', 'Number of View', 8, 'your-unique-identifier', 'hitcount_options');
  add_dashboard_page("number of view details", "Number of View", 8, "./../wp-content/plugins/number-of-view/list.php");
}

function hitcount_options() {
  global $wpdb, $hitcount_table_name;


  $hitslist = $wpdb->get_results("SELECT * FROM $hitcount_table_name");
  echo '<div class="wrap">';
  foreach($hitslist as $hits){
      echo "<br/>";
      echo "Post Id: ".$hits->pid." Hits: ".$hits->hits;
      $post = get_post($hits->pid);
      echo $post->post_title;
  }

  //echo '<p>Here is where the form would go if I actually had options.</p>';
  echo '</div>';
}
 * 
 */

function widget_hitcount_popularpost($args) {
    global $wpdb, $hitcount_table_name;
    $options = get_option("widget_hitcount_popularpost");
    $posttable = $wpdb->prefix."posts";
  extract($args);
  echo $before_widget;
  echo $before_title.$options['title'].$after_title;
  $hitslist = $wpdb->get_results("SELECT * FROM $hitcount_table_name
                                    inner join $posttable on `$posttable`.ID = `$hitcount_table_name`.pid WHERE type in ('post','page') and `$posttitle`.post_title !='' ORDER BY hits desc limit ".$options['numpost']);
    //echo $wpdb->last_query;
  echo '<div class="wrap"><ul>';
  foreach($hitslist as $hits){
      echo "<br/>";
      //echo "Post Id: ".$hits->pid." Hits: ".$hits->hits;
      $post = get_post($hits->pid);
      echo "<li><a href='".get_permalink($hits->pid)."'>".$post->post_title. '</a> - '. $hits->hits. ' hits</li>';
  }

  //echo '<p>Here is where the form would go if I actually had options.</p>';
  echo '</ul></div>';
  echo $after_widget;
}

function widget_hitcount_popularpost_control()
{
  $options = get_option("widget_hitcount_popularpost");
  if (!is_array( $options ))
        {
                $options = array(
      'title' => 'Popular post by view',
      "numpost" => 5
      );
  }    

  if ($_POST['widget_hitcount_popularpost-Submit'])
  {
    $options['title'] = htmlspecialchars($_POST['widget_hitcount_popularpost-WidgetTitle']);
    $options['numpost'] = htmlspecialchars($_POST['widget_hitcount_popularpost-Numpost']);
    update_option("widget_hitcount_popularpost", $options);
  }
?>
  <p>
    <label for="widget_hitcount_popularpost-WidgetTitle"><?=_e("Widget Title")?>: </label>
    <input type="text" id="widget_hitcount_popularpost-WidgetTitle" name="widget_hitcount_popularpost-WidgetTitle" value="<?php echo $options['title'];?>" />
    <br/>
  <label for="widget_hitcount_popularpost-Numpost"><?=_e("Number of Post")?>: </label>
   <input type="text" id="widget_hitcount_popularpost-Numpost" name="widget_hitcount_popularpost-Numpost" value="<?php echo $options['numpost'];?>" />
    <input type="hidden" id="widget_hitcount_popularpost-Submit" name="widget_hitcount_popularpost-Submit" value="1" />
  </p>
<?php
}


function widget_hitcount_popularpost_init()
{
  register_sidebar_widget(__('Popular post by view'), 'widget_hitcount_popularpost');
  register_widget_control( __('Popular post by view'), 'widget_hitcount_popularpost_control', 300, 200 );
}
add_action("plugins_loaded", "widget_hitcount_popularpost_init");
?>
<?php


function my_plugin_menu() {

  add_options_page('Number of view', 'Number Of View', 'manage_options', 'hitcount-option-page', 'hitcount_options');

}

function hitcount_options() {

  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }

  if($_REQUEST['submit']){
  	hitcount_option_update();
  }
  hitcount_option_form();
  
}

function hitcount_option_update(){
	if($_REQUEST['hitscount_position']){
		update_option('hitscount_position',$_REQUEST['hitscount_position']);
	}
	if($_REQUEST['hitscount_label'])
		update_option("hitscount_label",$_REQUEST['hitscount_label']);
}

function hitcount_option_form(){
	$label = get_option('hitscount_label');
	$position = get_option('hitscount_position');
	$label = !empty($label)?$label:"Number of View :";
  echo "<h2>Number of View</h2>";
  echo "<hr/>";
  echo "<form method='post'>";
  echo '<div class="wrap">';
  ?>
  <p>view Position:<select id = 'hitscount_position' name = 'hitscount_position'>
  								<option value = 'top' <?php if($position=='top') echo "selected"; ?>>Top</option>
  								<option value = 'bottom' <?php if($position=='bottom') echo "selected"; ?>>Bottom</option>
  						</select>
  </p>
  <p>Text to display : <input type = 'text' name='hitscount_label' id = 'hitscount_label' value = '<?php echo $label; ?>' /></p>
 <?php /* echo '<p>Skip logged in user ?';
  ?>
  <input type='checkbox' id='willcountuser' name='willcountuser' value = 'skiploggedinuser' />
  <br/>Do you want to skip bots<input type='checkbox' id='skipbots' name='skipbots'  value = 'skipbots'/>
  
  */ ?>
  <br/><input type = 'submit' name='submit' id = 'submit' value='submit' />
  <input type='reset' name = 'reset' id = 'reset' value = 'restore default'/>
  <?php 
  echo '</div>';
	
}
?>
