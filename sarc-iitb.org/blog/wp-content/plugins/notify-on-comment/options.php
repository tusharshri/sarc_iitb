<div class="wrap">
	<h2>NotifyOnComments</h2>

	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>

		<table class="form-table">

		<tr valign="top">
			<th scope="row">Email template</th>
			<td>
				<?php
					$template = get_option('notifyOnComments_emailTemplate'); 

					if($template || $template == "") $template = file_get_contents(dirname(__FILE__) . '/defaultTemplate.php');
				?>
				<textarea name="notifyOnComments_emailTemplate" style='width:700px;height:400px'><?php echo($template); ?></textarea>
			</td>
		</tr>
 		<tr valign="top">
			<td colspan='2'>
				<b>Available tags:</b> <br />
				{postID} - The id of the post assigned by wordpress <br />
				{postTitle} - Post title <br />
				{author} - Comment's author name <br />
				{authorIp} - Comment's author IP <br />
				{authorDomain} - Comment's author domain <br />
				{authorEmail} - Comment's author email <br />
				{authorUrl} - Comment's author website <br />
				{commentLink} - Direct link to the comment<br />
				{commentContent} - Comment body <br />
				{commentID} - Comment ID assigned by wordpress <br />
				{commentsWaiting} - Number of comments that wait for moderation <br />
				{siteUrl} - Your blog url <br />
			</td>
		</tr>
	
		<tr valign="top">
			<th scope="row">Only send when the moderation is required</th>
			<td>
				<?php
					$opt = get_option('notifyOnComments_moderationRequired');
					
					if(!$opt || $opt == "" || $opt == "false"){
						echo('<input type="radio" name="notifyOnComments_moderationRequired" value="true" /> Yes<br />');
						echo('<input type="radio" name="notifyOnComments_moderationRequired" value="false" checked="1"/> No');
					}else{
						echo('<input type="radio" name="notifyOnComments_moderationRequired" value="true" checked="1"/> Yes<br />');
						echo('<input type="radio" name="notifyOnComments_moderationRequired" value="false"/> No');
					}
				?>
			</td>
		</tr>


		</table>

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="notifyOnComments_emailTemplate, notifyOnComments_moderationRequired" />

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
</div>