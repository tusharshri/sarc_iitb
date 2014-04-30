=== List Authors Plus ===
Contributors: Nick Orhn, L Chandler
Donate link: http://techbasedmarketing.com/plugins
Tags: admin, authors, template tags
Requires at least: 2.5
Tested up to: 2.8.x
Stable tag: 1.0.1

Adds a new template tag and widget for listing authors.  The template customizes and extends wp_list_authors.

== Description ==
This plugin adds a new template tag, wp_list_authors_plus, which customizes and extends wp_list_authors.  The
new template tag can take all the parameters possible with wp_list_authors as well as the following new ones:
* excluded_ids - An array or comma delimited string of author ids to exclude from the list.
* excluded_usernames - An array or comma delimited string of author usernames to exclude from the list.
* excluded roles - An array or comma delimited string of roles to exclude from the list.
* order_by_posts - A value, either ASC or DESC, that indicates how to sort the authors by the number of posts they have.
ASC causes the author with the leasts posts to be listed first, and DESC is the opposite.

It also adds an easy to configure widget for the sidebar that provides you with the opportunity to customize all the
template tag's parameters from one easy location for the widget that will be displayed.

== Installation ==
1. Upload entire list-post-authors-plus folder to `/wp-content/plugins/` directory
2. Activate the plugin from the Plugins menu in WordPress
3. Place template tags (see FAQs) in your theme or use widgets to insert list of top authors in the sidebar. Widgets can be accessed from the Design tab. 

== Frequently Asked Questions ==
= How do I call the template tag? =
You can call the template tag in two ways.  The first uses a string as a parameter, and the second uses an array:

`wp_list_authors_plus( 
'order_by_posts=DESC&excluded_roles=editor, contributor&excluded_ids=1&excluded_usernames=onion'
);`

`wp_list_authors(
	array(
		'order_by_posts' => 'DESC',
		'excluded_roles' => 'editor',
		'excluded_ids' => array( 1, 2, 3 ),
		'excluded_usernames => 'admin'
	)
);` 
== Changelog ==
1.0.1 - bug fix, thanks to Aaron Overton
