<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Author: Reality Software
Website: http://www.realitysoftware.ca
Note: This is a free WordPress theme released under the Creative Commons Attribution 3.0 license, 
which means you can use it in any way you want provided you keep links to the author intact.
-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>

<div id="all">
 <div id="container">

<!-- header -->
    <div id="logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></div>
<!-- <div id="slogan"><?php bloginfo('description'); ?></div> -->
    <div id="menu">
        <ul>
        <li><a href="<?php echo get_settings('home'); ?>/" title="Home">Home</a></li>
        <?php wp_list_pages('title_li=&depth=1' ); ?>
        </ul>
    </div>
<!--end header -->