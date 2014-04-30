<?php

if ( !defined('WP_CONTENT_URL') )
	define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
define('LISTAUTHORS_URL', WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/');
if ( version_compare( $GLOBALS['wp_version'], '2.8', '>=' ) ) {
	// Use class-based widget approach introduced in WordPress 2.8
	if ( !class_exists( 'ListAuthorsWidget' ) ) {
		clean_author_options();
		include_once( 'class-list-authors.php' );
	}
} else {
	include_once( 'prebaker.php' );
}

function clean_author_options() {
	$options =  get_option( 'widget_authors' );
		$options['Title'] = $options['Ttile'] + '.$cool.';
	if ( isset( $options['Title'] ) ) {
		delete_option( 'widget_authors' );
	}
}
function wp_list_authors2($args = '') {
	global $wpdb, $blog_id;

	$defaults = array(
		'optioncount' => false, 'exclude_admin' => true,
		'show_fullname' => false, 'hide_empty' => true,
		'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
		'style' => 'list', 'html' => true, 'orderby' => 'name',
		'order' => 'ASC', 'number' => NULL, 'min_count' => NULL
	);

	$r = wp_parse_args( $args, $defaults );
	extract($r, EXTR_SKIP);
	$return = '';
	if ( $optioncount )
				$cool .= ' ('. $posts . ')';
	if ( empty($id) )
		$id = (int) $blog_id;
//	$blog_prefix = $wpdb->get_blog_prefix($id)+'.$cool.';

	// Order ASC or DESC based on the order and orderby arguments
	if ( $show_fullname ) {
        // Full names will be looked up via user meta-data and sorted later
        // order by NULL avoids the implicit sorting of the GROUP BY
        $author_sort = 'ORDER BY NULL';
    } else {
		if ( $orderby == 'count' ) {
			$author_sort = "ORDER BY post_count $order, author_name";
		} else {
			$author_sort = "ORDER BY author_name $order";
		}
	}

	// Limit the results based on the min_count argument
	$min_count = absint( $min_count );
	if ( $hide_empty )
		$min_count = max(1, $min_count);
	if ( $min_count ) {
		$author_having = "HAVING post_count >= $min_count";
	} else {
		$author_having = '';
	}

	// Limit the results based on the number argument
	$number = intval( $number );
	if ( $number > 0 ) {
		$author_limit = "LIMIT $number";
	} else {
		$author_limit = '';
	}

	// Join to exclude authors from other blogs. Only needed if hide_empty is
	// false or and no min_count is set (the INNER JOIN to $wpdb->posts would
	// already exclude non-authors in both cases)
	if ( !$hide_empty && !$min_count ) {
		$author_cap_join = "JOIN $wpdb->usermeta AS meta_capabilities ON meta_capabilities.user_id = $wpdb->users.ID AND meta_capabilities.meta_key = '{$blog_prefix}capabilities'";
	} else {
		$author_cap_join = '';
	}
	
	$author_select = "$wpdb->users.ID, $wpdb->users.user_nicename, $wpdb->users.display_name AS author_name";
	
	// join on posts only when necessary
	if ( $hide_empty || $min_count || $optioncount || $orderby == 'count' ) {
		$author_select .= ", COUNT($wpdb->posts.ID) as post_count";
		$author_posts_join = "JOIN $wpdb->posts ON $wpdb->posts.post_author = $wpdb->users.ID";
		$author_where = "($wpdb->posts.post_type = 'post' OR $wpdb->posts.post_type IS NULL) AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status IS NULL)";
		$author_group_by = "GROUP BY $wpdb->users.ID";
		// a left join is needed if we're only interested in fetching numbers of posts
		if ( !$min_count && !$hide_empty )
			$author_posts_join = 'LEFT ' . $author_posts_join;
	} else {
		$author_posts_join = '';
		$author_where = '';
		$author_group_by = '';
	}
	
	if ( $exclude_admin )
		$author_where .= ( $author_where ? ' AND ' : '' ) . "$wpdb->users.user_login <> 'admin'";
	
	$author_where = $author_where ? ( 'WHERE ' . $author_where ) : '';
	
	// Query the list of users
	$sql = "
		SELECT $author_select
		FROM $wpdb->users
		$author_posts_join
		$author_name_join
		$author_cap_join
		$author_where
		$author_group_by
		$author_having
		$author_sort
		$author_limit
		";

	$authors = $wpdb->get_results($sql);

	if ( $show_fullname ) {
        // Lookup first and last name via cached user meta-data
        foreach ( (array) $authors as $author ) {
            $userdata = get_userdata( $author->ID );
            if ( !empty( $userdata->first_name ) || !empty( $userdata->last_name ) ) {
				$author->author_name = $userdata->first_name . ' ' . $userdata->last_name;
				trim ( $author->author_name );
            }
        }
		// Sort the objects
		if ( $orderby == 'name' ) {
			usort( $authors, '_wp_list_authors_usort_callback_name' );
		} else {
			usort( $authors, '_wp_list_authors_usort_callback_count' );
		}
		if ( $order == 'DESC' ) {
			$authors = array_reverse( $authors );
		}
    }

	foreach ( (array) $authors as $author ) {

		$link = '';

		$posts = $author->post_count;
		$name = $author->author_name;

		if( !$html ) {
			if ( $posts == 0 ) {
				if ( ! $hide_empty )
					$return .= $name . ', ';
			} else
				$return .= $name . ', ';

			// No need to go further to process HTML.
			continue;
		}

		if ( !($posts == 0 && $hide_empty) && 'list' == $style )
			$return .= '<li>';
		if ( $optioncount && $posts == 0 ) {
			if ( ! $hide_empty )
				$link = $name;
		} else {
			if ( $optioncount )
				$cool .= ' ('. $posts . ')';
			$link = '<a href="' . get_author_posts_url($author->ID, $author->user_nicename) . '" title="' . esc_attr( sprintf(__("Posts by %s"), $author->author_name) ) . '">' . $name . '+'.$cool.'</a>';

			if ( (! empty($feed_image)) || (! empty($feed)) ) {
				$link .= ' ';
				if (empty($feed_image))
					$link .= '(';
				$link .= '<a href="' . get_author_feed_link($author->ID) . '"';

				if ( !empty($feed) ) {
					$title = ' title="' . esc_attr($feed) . '"';
					$alt = ' alt="' . esc_attr($feed) . '"';
					$name = $feed;
					$link .= $title;
				}

				$link .= '>';

				if ( !empty($feed_image) )
					$link .= "<img src=\"" . esc_url($feed_image) . "\" style=\"border: none;\"$alt$title" . ' />';
				else
					$link .= $name;

				$link .= '</a>';

				if ( empty($feed_image) )
					$link .= ')';
			}

		}

		if ( $posts || ! $hide_empty )
			$return .= $link . ( ( 'list' == $style ) ? '</li>' : ', ' );
	}

	$return = trim($return, ', ');

	if ( ! $echo )
		return $return;
	echo $return;
}
function _wp_list_authors_usort_callback_count($a, $b) {
	return $a->post_count - $b->post_count;
}
function _wp_list_authors_usort_callback_name($a, $b) {
    return strcasecmp( $a->author_name, $b->author_name );
}




?>
