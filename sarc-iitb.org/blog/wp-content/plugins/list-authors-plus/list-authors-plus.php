<?php
/*
 Plugin Name: List Authors Plus
 Description: This plugin adds a new template tag that extends the wp_list_authors tag along with adding a widget that uses the new template tag.
 Author: Lynette Chandler
 Version: 1.0.1
 Plugin URI: http://techbasedmarketing.com/plugins/
 Author URI: http://techbasedmarketing.com/
 Copyright 2008  TechBasedMarketing.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 3.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if( !class_exists( 'List_Post_Authors_Plus' ) ) {
	class List_Post_Authors_Plus {

		// The URL for the feed which provides updates in the administration panel
		var $updateFeed = 'http://feeds.techbasedmarketing.com/tbmplugins';
		var $options;

		/**
		 * Default constructor adds necessary action hooks.
		 *
		 * @return List_Post_Authors_Plus
		 */
		function List_Post_Authors_Plus() {
			add_action( 'after_plugin_row', array( &$this, 'afterPluginRow' ) );
			add_action( 'widgets_init', array( &$this, 'widgetsInit' ) );

			$this->initializeOptions();
		}

		/**
		 * Registers the sidebar widget and widget control.
		 *
		 */
		function widgetsInit() {
			register_sidebar_widget( __( 'List Authors Plus' ), array( &$this, 'onWidget' ) );
			register_widget_control( __( 'List Authors Plus' ), array( &$this, 'onWidgetControl' ), 400 );
		}

		/**
		 * Callback for widget output.
		 *
		 * @param string $args
		 */
		
		function onWidget( $args ) {
			extract( $args );
			echo $before_widget;
			echo $before_title;
			echo htmlentities( $this->options[ 'title' ]);
			echo $after_title;
			$this->listPostAuthors( $this->options );

			echo $after_widget;
		}

		/**
		 * Callback for widget control output.
		 *
		 * @param string $args
		 */
		function onWidgetControl(  ) {
			if( isset( $_POST[ 'lpap_submit' ] ) ) {
				$this->options[ 'title' ] = $_POST[ 'lpap_title' ];
				$this->options[ 'optioncount' ] = $_POST[ 'lpap_show_count' ];
				$this->options[ 'exclude_admin' ] = $_POST[ 'lpap_exclude_admin' ];
				$this->options[ 'excluded_ids' ] = $_POST[ 'lpap_excluded_ids' ];
				$this->options[ 'excluded_usernames' ] = $_POST[ 'lpap_excluded_usernames' ];
				$this->options[ 'excluded_roles' ] = $_POST[ 'lpap_excluded_roles' ];
				$this->options[ 'order_by_posts' ] = $_POST[ 'lpap_order_by_posts' ];
				$this->options[ 'show_fullname' ] = $_POST[ 'lpap_show_fullname' ];
				$this->options[ 'hide_empty' ] = $_POST[ 'lpap_hide_empty' ];
				$this->options[ 'feed' ] = $_POST[ 'lpap_feed' ];
				$this->options[ 'feed_image' ] = $_POST[ 'lpap_feed_image' ];
				$this->saveOptions();
			}

			include( path_join( dirname( __FILE__ ), 'lpap-widgetcontrol.php' ) );
		}

		/**
		 * Callback to display updates to the plugin in the row following the plugin's row in the plugin admin.
		 *
		 */
		function afterPluginRow( $pluginFile ) {
			if( plugin_basename(__FILE__) == $pluginFile ) {
				$return = '<tr><td colspan="6">';

				require_once(ABSPATH . WPINC . '/rss.php');
				if ( !$rss = fetch_rss($this->updateFeed) ) {
					return;
				}
				if ( is_array( $rss->items ) && !empty( $rss->items ) ) {
					$rss->items = array_slice($rss->items, 0, $items);
					$lastUpdate = $rss->items[0];
					while ( strstr( $lastUpdate[ 'link' ], 'http' ) != $lastUpdate[ 'link' ] ) {
						$lastUpdate[ 'link' ] = substr( $lastUpdate[ 'link' ], 1 );
					}

					$lastUpdateLink = clean_url( strip_tags( $lastUpdate[ 'link' ] ) );
					$lastUpdateTitle = attribute_escape( strip_tags( $lastUpdate[ 'title' ] ) );
					if ( empty( $lastUpdateTitle ) ) {
						$lastUpdateTitle = __( 'Last Plugin Update' );
					}

					$desc = '';
					if ( isset( $lastUpdate[ 'description' ] ) && is_string( $lastUpdate[ 'description' ] ) ) {
						$desc = str_replace(array( "\n", "\r" ), ' ', attribute_escape( strip_tags(html_entity_decode( $lastUpdate[ 'description' ], ENT_QUOTES ) ) ) );
					} else if ( isset( $lastUpdate['summary'] ) && is_string( $lastUpdate['summary'] ) ) {
						$desc = str_replace( array( "\n", "\r" ), ' ', attribute_escape( strip_tags( html_entity_decode( $lastUpdate[ 'summary' ], ENT_QUOTES ) ) ) );
					}

					$author = '';
					if ( isset( $lastUpdate[ 'dc' ][ 'creator' ] ) ) {
						$lastUpdateAuthor = ' <cite>' . wp_specialchars( strip_tags( $lastUpdate['dc']['creator'] ) ) . '</cite>';
					} else if( isset($item['author_name']) ) {
						$lastUpdateAuthor = ' <cite>' . wp_specialchars( strip_tags( $lastUpdate['author_name'] ) ) . '</cite>';
					}
						
					$return .= "<h3><a href=\"$lastUpdateLink\">$lastUpdateTitle</a> &mdash; <small>$lastUpdateAuthor</small></h3>";
					$return .= $desc;

					$return .= '</td></tr>';

					echo $return;
				}
			}
		}

		/**
		 * Utility function to trim array values.
		 *
		 * @param string $value
		 */
		function trimValues(&$value) {
			$value = trim($value);
		}

		/**
		 * Lists the post authors based on a number of options.
		 *
		 * @param array|string $options the options for the template tag.
		 */
		function listPostAuthors( $args ) {
			global $wpdb;

			$defaults = array(
				'optioncount' => false, 
				'exclude_admin' => true,
				'excluded_ids' => '',
				'excluded_usernames' => '',
				'excluded_roles' => '',
				'order_by_posts' => 'NO',
				'show_fullname' => false, 
				'hide_empty' => true,
				'feed' => '', 
				'feed_image' => '', 
				'feed_type' => '', 
				'echo' => true
			);

			$r = wp_parse_args( $args, $defaults );
			extract($r, EXTR_SKIP);

			$return = '<ul>';

			// Take care of excluded ids first by processing and getting an appropriate string
			if( is_string( $excluded_ids ) && !empty( $excluded_ids ) ) {
				$excluded_ids = explode( ',', $excluded_ids );
				array_walk( $excluded_ids, array( &$this, 'trimValues' ) );
			}
			if( is_array( $excluded_ids ) ) {
				array_walk( $excluded_ids, array( $wpdb, 'escape' ) );
				$excluded_ids = implode( ',', $excluded_ids );
			} else {
				$excluded_ids = '';
			}

			// Do the same with usernames
			if( is_string( $excluded_usernames ) && !empty( $excluded_usernames ) ) {
				$excluded_usernames = explode( ',', $excluded_usernames );
				array_walk( $excluded_usernames, array( &$this, 'trimValues' ) );
			}
			if( is_array( $excluded_usernames ) ) {
				array_walk( $excluded_usernames, array( $wpdb, 'escape' ) );
				$excluded_usernames = implode( '\',\'', $excluded_usernames );
				if( !empty( $excluded_usernames ) ) {
					$excluded_usernames = '\'' . $excluded_usernames . '\'';
				}
			} else {
				$excluded_usernames = '';
			}


			if( is_string( $excluded_roles ) && !empty( $excluded_roles ) ) {
				$excluded_roles = split( ',', trim( $excluded_roles ) );
				array_walk( $excluded_roles, array( &$this, 'trimValues' ) );
			}
			$process_excluded_roles = false;
			if( is_array( $excluded_roles ) ) {
				$process_excluded_roles = true;
			}


			$sql = "SELECT ID, user_nicename from $wpdb->users WHERE 1 = 1 " . ($exclude_admin ? "AND user_login <> 'admin' " : '') . (!empty($excluded_ids) ? "AND ID NOT IN($excluded_ids) " : '') . (!empty($excluded_usernames) ? "AND user_login NOT IN($excluded_usernames) " : '') . "ORDER BY display_name";	
			$authors = $wpdb->get_results($sql);

			$author_count = array();
			$rows = $wpdb->get_results("SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE post_type = 'post' AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author");
			foreach ($rows as $row) {
				$author_count[$row->post_author] = $row->count;
			}
			
			foreach( $authors as $author ) {
				$author->num_posts = (isset($author_count[$author->ID])) ? $author_count[$author->ID] : 0;
			}

			$authors = $this->sortByPostsPublished( $authors, $order_by_posts );

			foreach ( (array) $authors as $author ) {
				$posts = (isset($author_count[$author->ID])) ? $author_count[$author->ID] : 0;
				$author = get_userdata( $author->ID );

				if( $process_excluded_roles ) {
					$currentAuthor = new WP_User( $author->ID );
					$skipAuthorBecauseOfRole = false;
					foreach( $excluded_roles as $theRole ) {
						if( $currentAuthor->caps[$theRole] == 1) {
							$skipAuthorBecauseOfRole = true;
							break;
						}
					}
					if( $skipAuthorBecauseOfRole ) {
						continue;
					}
				}

				$name = $author->display_name;

				if ( $show_fullname && ($author->first_name != '' && $author->last_name != '') )
				$name = "$author->first_name $author->last_name";

				if ( !($posts == 0 && $hide_empty) )
				$return .= '<li>';
				if ( $posts == 0 ) {
					if ( !$hide_empty )
					$link = $name;
				} else {
					$link = '<a href="' . get_author_posts_url($author->ID, $author->user_nicename) . '" title="' . sprintf(__("Posts by %s"), attribute_escape($author->display_name)) . '">' . $name . ' (' . $posts . ')</a>';

					if ( (! empty($feed_image)) || (! empty($feed)) ) {
						$link .= ' ';
						if (empty($feed_image))
						$link .= '(';
						$link .= '<a href="' . get_author_rss_link(0, $author->ID, $author->user_nicename) . '"';

						if ( !empty($feed) ) {
							$title = ' title="' . $feed . '"';
							$alt = ' alt="' . $feed . '"';
							$name = $feed;
							$link .= $title;
						}

						$link .= '>';

						if ( !empty($feed_image) )
						$link .= "<img src=\"$feed_image\" style=\"border: none;\"$alt$title" . ' />';
						else
						$link .= $name;

						$link .= '</a>';

						if ( empty($feed_image) )
						$link .= ')';
					}

					

				}

				if ( !($posts == 0 && $hide_empty) )
				$return .= $link . '</li>';
			}

			$return .= '</ul>';

			if ( !$echo ) {
				return $return;
			}
			echo $return;
		}

		function sortByPostsPublished( $authors, $orderType ) {
			$orderedAuthors = $authors;
			if( 'ASC' == $orderType ) {
				usort( $orderedAuthors, array( &$this, 'orderAuthorsAsc' ) );
			} elseif( 'DESC' == $orderType ) {
				usort( $orderedAuthors, array( &$this, 'orderAuthorsDesc' ) );
			}
			return $orderedAuthors;
		}

		/**
		 * Comparison functions to sort authors by the num_posts attribute.
		 *
		 * @param object $a
		 * @param object $b
		 * @return int
		 */
		function orderAuthorsAsc($a, $b) {
			return $a->num_posts - $b->num_posts;
		}
		function orderAuthorsDesc($b, $a) {
			return $a->num_posts - $b->num_posts;
		}

		/**
		 * Initializes options variable.
		 *
		 */
		function initializeOptions() {
			$options = get_option( 'List Post Authors Plus Options' );
			if( false === $options ) {
				$options = array(
					'optioncount' => false, 
					'exclude_admin' => true,
					'excluded_ids' => '',
					'excluded_usernames' => '',
					'excluded_roles' => '',
					'order_by_posts' => 'NO',
					'show_fullname' => false, 
					'hide_empty' => true,
					'feed' => '', 
					'feed_image' => '', 
					'feed_type' => '', 
					'echo' => true
				);
			}
			$this->options = $options;
		}

		/**
		 * Updates the options in the database with the current options variable.
		 *
		 */
		function saveOptions() {
			update_option( 'List Post Authors Plus Options', $this->options );
		}

		/**
		 * Removes options from database.
		 *
		 */
		function deleteOptions() {
			delete_option( 'List Post Authors Plus Options' );
		}

	}
}

if( class_exists( 'List_Post_Authors_Plus' ) ) {
	$lpap = new List_Post_Authors_Plus();

	function wp_list_authors_plus( $args ) {
		global $lpap;
		return $lpap->listPostAuthors( $args );
	}
}
