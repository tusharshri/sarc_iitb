<p><label for="lpap_title">Title: <input class="widefat" id="lpap_title" name="lpap_title" value="<?php echo attribute_escape( $this->options[ 'title' ] ); ?>" type="text"> </label></p>
<p><label for="lpap_show_count">Show Post Count?
	<select name="lpap_show_count" id="lpap_show_count">
		<option <?php selected( 0, $this->options[ 'optioncount' ] ); ?> value="0"><?php _e( 'No' ); ?></option>
		<option <?php selected( 1, $this->options[ 'optioncount' ] ); ?> value="1"><?php _e( 'Yes' ); ?></option>
	</select> </label></p>
<p><label for="lpap_exclude_admin">Exclude Admin?
	<select id="lpap_exclude_admin"	name="lpap_exclude_admin">
		<option <?php selected( 0, $this->options[ 'exclude_admin' ] ); ?> value="0"><?php _e( 'No' ); ?></option>
		<option <?php selected( 1, $this->options[ 'exclude_admin' ] ); ?> value="1"><?php _e( 'Yes' ); ?></option>
	</select> </label></p>
<p><label for="lpap_excluded_ids">Excluded Ids: 
	<input class="widefat" type="text" name="lpap_excluded_ids" id="lpap_excluded_ids" value="<?php echo attribute_escape( $this->options[ 'excluded_ids' ] ); ?>" /> </label>
	<br />Enter IDs separated by commas... <strong>Ex: </strong><code>1,2,3</code>
</p>
<p><label for="lpap_excluded_usernames">Excluded Usernames: 
	<input class="widefat" type="text" name="lpap_excluded_usernames" id="lpap_excluded_usernames" value="<?php echo attribute_escape( $this->options[ 'excluded_usernames' ] ); ?>" /> </label>
	<br />Enter usernames separated by commas... <strong>Ex: </strong><code>nick,bob,mary</code>
</p>
<p><label for="lpap_excluded_roles">Excluded Roles: 
	<input class="widefat" type="text" name="lpap_excluded_roles" id="lpap_excluded_roles" value="<?php echo attribute_escape( $this->options[ 'excluded_roles' ] ); ?>" /> </label>
	<br />Enter IDs separated by commas... <strong>Ex: </strong><code>administrator,editor,contributor,subscriber,author</code>
</p>
<p><label for="lpap_order_by_posts">Order by Number of Posts?
	<select id="lpap_order_by_posts"	name="lpap_order_by_posts">
		<option <?php selected( 'NO', $this->options[ 'order_by_posts' ] ); ?> value="NO"><?php _e( 'No' ); ?></option>
		<option <?php selected( 'ASC', $this->options[ 'order_by_posts' ] ); ?> value="ASC"><?php _e( 'Ascending' ); ?></option>
		<option <?php selected( 'DESC', $this->options[ 'order_by_posts' ] ); ?> value="DESC"><?php _e( 'Descending' ); ?></option>
	</select> </label></p>
<p><label for="lpap_show_fullname">Show Fullname?
	<select id="lpap_show_fullname"	name="lpap_show_fullname">
		<option <?php selected( 0, $this->options[ 'show_fullname' ] ); ?> value="0"><?php _e( 'No' ); ?></option>
		<option <?php selected( 1, $this->options[ 'show_fullname' ] ); ?> value="1"><?php _e( 'Yes' ); ?></option>
	</select> </label></p>
<p><label for="lpap_hide_empty">Hide Empty?
	<select id="lpap_hide_empty"	name="lpap_hide_empty">
		<option <?php selected( 0, $this->options[ 'hide_empty' ] ); ?> value="0"><?php _e( 'No' ); ?></option>
		<option <?php selected( 1, $this->options[ 'hide_empty' ] ); ?> value="1"><?php _e( 'Yes' ); ?></option>
	</select> </label></p>
<p><label for="lpap_feed">Feed: 
	<input class="widefat" type="text" name="lpap_feed" id="lpap_feed" value="<?php echo attribute_escape( $this->options[ 'feed' ] ); ?>" /> </label>
	<br />Text to display for a link to each author's RSS feed. 
</p>
<p><label for="lpap_feed_image">Feed Image: 
	<input class="widefat" type="text" name="lpap_feed_image" id="lpap_feed_image" value="<?php echo attribute_escape( $this->options[ 'feed_image' ] ); ?>" /> </label>
	<br />Path/filename for a graphic. This acts as a link to each author's RSS feed, and <strong>overrides</strong> the <code>feed</code> parameter.
</p>
<input type="hidden" name="lpap_submit" id="lpap_submit" value="1" />
