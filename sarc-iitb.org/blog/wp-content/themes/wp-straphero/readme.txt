== WP StrapHero ==

* By WP Strap Code, http://wpstrapcode.com/

== Copyright ==
WP StrapHero, Copyright 2013 WPStrapCode.com
WP StrapHero is distributed under the terms of the GNU GPL


== About WP StrapHero ==

Requires at least:	3.4.1
Tested up to:		3.5.2
Bootstrap version:  2.3.1
Stable tag:			1.1.0

== License ==
Unless otherwise specified, all the theme files, scripts and images are licensed under GNU General Public Licemse.
The exceptions to this license is as follows:
* Bootstrap by Twitter and the Glyphicon set are licensed under the GPL-compatible [http://www.apache.org/licenses/LICENSE-2.0 Apache License v2.0]

* WP StrapHero is a Twitter Bootstrap theme for WordPress.
* The theme design includes a home page with the Bootstrap Carousel
* image slider as the focal point in the header - The Hero Section.
* Support for custom header is included and used as a logo for the top
* fixed navigation bar. Further customization support is included for
* backgroudn color/image plus two custom menu supported navigation bars.

* Posts use the featured image function - please be sure to upload images
* that are wide enough for this facility. At the very minimu this should
* be around 620px in width for standard posts at least 1400px wide for the
* slider (see notes below).

* This is the light version with the basics but still an aesthetically
* visual and functional theme.

* It includes support for RTL (Right To Left) layout althought this is
* yet to be fully tested. So for all those that compose content in an
* RTL language I welcome your feedback and support in making this feature
* right for you all - please report any bugs and I'll do my best to fix
* them ASAP. Code contribution is welcome.

== Theme Install And Set Up ==

* The theme can be installed just like anyother theme - either via FTP
* or by uploading it via Admin >> Appearance >> Install Themes

* The slider category selection added to customizer - you can now use any category
* for the slider as long as posts in that category have the featured image set.
* Visit the customizer page to set your options for the slider - currently
* available options are to set slider to slide or fade transition and to
* hide the slider from the home page altogether. Make sure that your posts
* have a featured image set and at least 1400px wide images.

* NOTE: By default the slider is set to show 5 latest posts from the category featured.
* You can override this to any number via the settings options on the customizer. 

* Please note: To initiate the slider's transition effect you must have at least two 
* Posts published within the category featured.

* The rest of the set up is per any other theme - simply post your content.

== Changelog ==
= 1.1.0 =
* Fixed - Bug: Comments form input fields invisible content.
* Reduced with of comment form input fields to 50%.
* Added missing translation strings to strapcode-customizer.php
* Fixed Sidebar Menu depth level overflow (Monster widget test).

= 1.0.9 =
* Added option to switch from full articles to excerpts on blog feed
* Added option to define excerpt length for blog feed
* Added function for slider caption custom exceprt
* Added option to define excerpt length for slider caption excerpt

= 1.0.8 =
* Fixed bug where slider transition effect was not being applied to the slider.
* Corrected the incorrect escape rule in footer.php
* Revised copyright output in footer.php to default to copyright + date + site name.
* Added unique slug to copyright text field in customizer
* Slider visibility is now set to hidden by default with option to enable in the customizer.
* NEW: Category selector for slider added to customizer.
* NEW: General options added to customizer with option to hide commentform on attachment page.

= 1.0.7 =
* CSS mods to allow for admin-bar without overlaping the site title/top menu section
* Trancated the excerpt so that the title and the excerpt are not cut off on the 
* slider in the case of a long content entry.
* Moved searchform in to the root of the theme as it was not being picked up for the widgets.
* Set slider caption to visibility hidden on small screens
* Added the missing genericons on the image.php file

= 1.0.6 =
* Code adjusment on escaping functions for url in header.php and seachrform.php
* Removed escaping functions from slider.php as not required

= 1.0.5 =
* Removed second instance of comment form on page.php and full-width.php
* Added option in customizer for custom copyright notice
* Added option in customizer to hide footer credits if so desired
* Added more translatable strings
* Basic code clean up

= 1.0.4 =
* Fixed bug on Header text style not being applied as should be
* Added styling for Gallery
* Minor CSS fixes

= 1.0.3 =
* Added 404 page and styling to search widget
* Moved some CSS to custom.css so that they overide the corresponding styles in bootstrap.css
* Removed some redundant thumbnail sizes from functions.php

= 1.0.2 =
* Reworked slider query to be compatible with previous versions of WordPress - support is
* for version 3.4 and up due to the use of the customizer.
* Some minor CSS adjustments to fix a couple of bugs on the read-more element.

= 1.0.1 =
* Removed theme loaded jQuery to revert back to WordPress loaded noConflict jQuery mode
* Slider switched from using custom post type to using standard posts from the featured
* category
* Removed favicons pending creating an option to upload own favicon via customizer
* Added comments support to static pages 

= None Yet =
* Initial Release @ 1.0.0

== Upgrade Notice ==

* Instructions to be added here soon

== Frequently Asked Questions ==

* None Yet