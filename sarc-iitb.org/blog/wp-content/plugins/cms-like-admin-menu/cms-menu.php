<?php
/*
	Plugin Name: CMS-like Admin Menu
	Plugin URI: http://reciprocity.be/cms-menu/
	Version: 2.1
	Description: Makes the Wordpress Admin menu focused for a more CMS-like usage.
	Author: Keith Solomon
	Author URI: http://reciprocity.be/

	Copyright (c) 2009 Keith Solomon (http://reciprocity.be)
	CMS-like Admin Menu is released under the GNU General Public License (GPL)
	http://www.gnu.org/licenses/gpl.txt
*/

/**
 * Changes the positions of the Post and Page menu items in admin menu bar.
 *
 * The elements in the $menu[x] array are:
 *     0: Menu item name
 *     1: Minimum level or capability required.
 *     2: The URL of the item's file
 *     3: Class
 *     4: ID
 *     5: Icon for top level menu
 */

if (!function_exists('change_post_links')) {
	function change_post_links() {
		global $menu, $submenu, $wp_taxonomies;

		// Unset Post & Page menus so we can change them
		unset($menu[5]);
		unset($menu[20]);
			
		// Change menu order to reflect new positions
		$menu[5] = array(__('Pages'), 'edit_pages', 'edit-pages.php', '', 'wp-menu-open menu-top', 'menu-pages', 'div');
		$submenu['edit-pages.php'][5] = array(__('Edit'), 'edit_pages', 'edit-pages.php');
		$submenu['edit-pages.php'][10] = array(_c('Add New|page'), 'edit_pages', 'page-new.php');

		$menu[20] = array(__('Posts'), 'edit_posts', 'edit.php', '', 'menu-top', 'menu-posts', 'div');
		$submenu['edit.php'][5]  = array(__('Edit'), 'edit_posts', 'edit.php');
		$submenu['edit.php'][10]  = array(_c('Add New|post'), 'edit_posts', 'post-new.php');

		$i = 15;
		foreach ( $wp_taxonomies as $tax ) {
			if ( $tax->hierarchical || ! in_array('post', (array) $tax->object_type, true) )
				continue;

			$submenu['edit.php'][$i] = array( esc_attr($tax->label), 'manage_categories', 'edit-tags.php?taxonomy=' . $tax->name );
			++$i;
		}

		$submenu['edit.php'][50] = array( __('Categories'), 'manage_categories', 'categories.php' );
	}
}

add_action('admin_menu', 'change_post_links');
?>