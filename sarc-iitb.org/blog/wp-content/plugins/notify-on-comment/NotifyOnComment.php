<?php
/*
Plugin Name: Notify on comment
Plugin URI: http://www.artbits.it
Description: Send a notification on comment to the author of the post
Version: 1.03
Author: Fabio Trezzi 
Author URI: http://www.artbits.it
*/

function notifyOnComment_send($commentID){
	global $wpdb;
	// Get the email of the post's author
	$comment = get_comment($commentID);
	$post = get_post($comment->comment_post_ID);
	$user = get_userdata($post->post_author);
	$to = $user->user_email;
	// Set the send from
	$admin_email = get_option('admin_email');
	$headers= "From:$admin_email\r\n";
	$headers .= "Reply-To:$admin_email\r\n";
	$headers .= "X-Mailer: PHP/".phpversion();
	
	$comment_author_domain = @gethostbyaddr($comment->comment_author_IP);
	$comments_waiting = $wpdb->get_var("SELECT count(comment_ID) FROM $wpdb->comments WHERE comment_approved = '0'");
	
	$moderationOpt = get_option('notifyOnComments_moderationRequired');
	
	if($moderationOpt == 'true'){
		// Only send the notification if the comments requires to be moderated
		$approved = $comment->comment_approved;
		if($approved != 0) return;	// No need to send the mail the comment is already approved
	}	
	
	$template = get_option('notifyOnComments_emailTemplate'); 
	// If not setted load the default from file
	if($template || $template == "") $template = file_get_contents(dirname(__FILE__) . '/defaultTemplate.php');
	
	// Replace all the constant with the rights values
	$template = str_replace("{postID}", $post->ID, $template);
	$template = str_replace("{postTitle}", $post->post_title, $template);
	$template = str_replace("{author}", $comment->comment_author, $template);
	$template = str_replace("{authorIp}", $comment->comment_author_IP, $template);
	$template = str_replace("{authorDomain}", $comment_author_domain, $template);
	$template = str_replace("{authorEmail}", $comment->comment_author_email, $template);
	$template = str_replace("{authorUrl}", $comment->comment_author_url, $template);
	$template = str_replace("{commentContent}", $comment->comment_content, $template);
	$template = str_replace("{commentLink}", get_permalink($comment->comment_post_ID), $template);
	$template = str_replace("{commentID}", $commentID, $template);
	$template = str_replace("{commentsWaiting}", $comments_waiting, $template);
	$template = str_replace("{siteUrl}", get_option('siteurl'), $template);

	$subject = sprintf( __('[%1$s] Please moderate: "%2$s"'), get_option('blogname'), $post->post_title );

	@wp_mail($to, $subject, $template, $headers);

	return true;
		
}

function notifyOnComment_menu() {
	$path = dirname(__FILE__);
	$pathElements = explode('/', $path);
	add_options_page('NotifyOnComments options', 'NotifyOnComments', 'manage_options', $pathElements[count($pathElements) - 1] . '/options.php');
}

add_action('comment_post', 'notifyOnComment_send');
add_action('admin_menu', 'notifyOnComment_menu');

?>