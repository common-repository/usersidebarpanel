<?php
function usp_awaiting_mod_count() {
	$awaiting_mod = wp_count_comments();
	$awaiting_mod = $awaiting_mod->moderated;
	return $awaiting_mod;
}

function usp_update_count() {
	$update_plugins = get_option( 'update_plugins' );
	$update_count = count( $update_plugins->response );
	return $update_count;
}

function usp_tree() {
	global $usp_language;
	global $usp_avatar;
	// Publish Posts
	if (current_user_can('publish_posts')) {
		echo '<br /><li><a href="'.get_bloginfo('wpurl').'/wp-admin/post-new.php" target="_blank" title="'.$usp_language['add_post'].'" >'.$usp_language['add_post'].'</a>';
		// Edit Posts
		if (current_user_can('edit_posts')) {
			echo '<ul><li><a href="'.get_bloginfo('wpurl').'/wp-admin/edit.php" target="_blank" title="'.$usp_language['mng_post'].'" >'.$usp_language['mng_post'].'</a></li></ul></li>'; }
		else echo '</li>'; }
	//Page
	if (current_user_can('edit_pages')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/page-new.php" target="_blank" title="'.$usp_language['add_page'].'" >'.$usp_language['add_page'].'</a><ul>';
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/edit-pages.php" target="_blank" title="'.$usp_language['mng_page'].'" >'.$usp_language['mng_page'].'</a></li></ul></li>';}
	//Comments
	if (current_user_can('moderate_comments')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/edit-comments.php" target="_blank" title="'.$usp_language['mng_comm'].'" >'.$usp_language['mng_comm'].'</a></li>';}
	//Categories
	if (current_user_can('manage_categories')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/categories.php" target="_blank" title="'.$usp_language['mng_cat'].'" >'.$usp_language['mng_cat'].'</a></li>';}
	//Links
	if (current_user_can('manage_links')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/link-manager.php" target="_blank" title="'.$usp_language['mng_link'].'" >'.$usp_language['mng_link'].'</a></li>';}
	//User
	if (current_user_can('edit_users')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/users.php" target="_blank" title="'.$usp_language['users'].'" >'.$usp_language['users'].'</a></li>';}
	//Manage Options
	if (current_user_can('manage_options')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/options-general.php" target="_blank" title="'.$usp_language['options'].'" >'.$usp_language['options'].'</a></li>';}
	//Themes
	if (current_user_can('switch_themes')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/themes.php" target="_blank" title="'.$usp_language['switch_themes'].'" >'.$usp_language['switch_themes'].'</a>';}
	//Switch Themes & Widget
	if (current_user_can('edit_themes')) {
			echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/theme-editor.php" target="_blank" title="'.$usp_language['edit_themes'].'" >'.$usp_language['edit_themes'].'</a>';
			echo '<ul><li><a href="'.get_bloginfo('wpurl').'/wp-admin/widgets.php" target="_blank" title="'.$usp_language['sid_widgets'].'" >'.$usp_language['sid_widgets'].'</a></li></ul></li>';}
	//Profile
	echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/profile.php" target="_blank" title="'.$usp_language['profile'].'" >'.$usp_language['profile'].'</a>';
	if ($usp_avatar == true or function_exists('get_userextra')){
		echo '<ul>';
		if ($usp_avatar == true) {
			if (current_user_can('edit_users')) echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/users.php?page=usersidebarpanel/usp_avatar_options.php" target="_blank" title="'.$usp_language['change_avatar'].'" >'.$usp_language['change_avatar'].'</a></li>';
			else echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/profile.php?page=usersidebarpanel/usp_avatar_options.php" target="_blank" title="'.$usp_language['change_avatar'].'" >'.$usp_language['change_avatar'].'</a></li>';}
		if (function_exists('get_userextra')) echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/profile.php?page=userextra.php" target="_blank" title="'.$usp_language['user_extra'].'" >'.$usp_language['user_extra'].'</a></li>';
		echo '</ul></li>';}
	else echo '</li>';
	//Exit
	echo '<li><a href="'.get_bloginfo('wpurl').'/wp-login.php?action=logout&amp;redirect_to='.get_option('siteurl').'" title="'.$usp_language['logout'].'" >'.$usp_language['logout'].'</a></li>';
}

function usp_tree_ng() {
	global $usp_language;
	$awaiting_mod = usp_awaiting_mod_count();
	if($awaiting_mod != 0) $awaiting_mod_display = 'display:inline;color:#800000;';
	else $awaiting_mod_display = '';
	$update_plugins = usp_update_count();
	if($update_plugins != 0) $update_count_display = 'display:inline;color:#800000;';
	else $update_count_display = '';
 	echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/index.php" target="_blank" title="'.$usp_language['dash_ng'].'" >'.$usp_language['dash_ng'].'</a></li>'; 
	// Publish
	if (current_user_can('publish_posts')) echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/post-new.php" target="_blank" title="'.$usp_language['add_ng'].'" >'.$usp_language['add_ng'].'</a></li>'; 
	//Manage
	if (current_user_can('edit_post')) echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/edit.php" target="_blank" title="'.$usp_language['mng_ng'].'" >'.$usp_language['mng_ng'].'</a></li>';
	//Comments
	if (current_user_can('moderate_comments')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/edit-comments.php" target="_blank" title="'.$usp_language['comm_ng'].'" >'.$usp_language['comm_ng'].'</a>';
		echo ' (<a href="'.get_bloginfo('wpurl').'/wp-admin/edit-comments.php" target="_blank" title="'.$usp_language['comm_ng'].'" style="'.$awaiting_mod_display.'">'.$awaiting_mod.'</a>)</li>'; }
	//Options	
	if (current_user_can('manage_options')) echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/options-general.php" target="_blank" title="'.$usp_language['options_ng'].'" >'.$usp_language['options_ng'].'</a></li>';
	//User
	if (current_user_can('edit_users')) echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/users.php" target="_blank" title="'.$usp_language['users'].'" >'.$usp_language['users'].'</a></li>';
	else echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/profile.php" target="_blank" title="'.$usp_language['profile'].'" >'.$usp_language['profile'].'</a>'; 
	//Design
	if (current_user_can('switch_themes')) echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/themes.php" target="_blank" title="'.$usp_language['design_ng'].'" >'.$usp_language['design_ng'].'</a>';
	//Plugins
	if (current_user_can('activate_plugins')) {
		echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/plugins.php" target="_blank" title="'.$usp_language['plugins_ng'].'" >'.$usp_language['plugins_ng'].'</a>';
		echo ' (<a href="'.get_bloginfo('wpurl').'/wp-admin/plugins.php" target="_blank" title="'.$usp_language['comm_ng'].'" style="'.$update_count_display.'">'.$update_plugins.'</a>)</li>'; }
	//Exit
	echo '<li><a href="'.get_bloginfo('wpurl').'/wp-login.php?action=logout&amp;redirect_to='.get_option('siteurl').'" title="'.$usp_language['logout'].'" >'.$usp_language['logout'].'</a></li>';
}

function usp_tree_small() {
	global $usp_language;
	echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/index.php" target="_blank" title="'.$usp_language['dash_ng'].'" >'.$usp_language['dash_ng'].'</a></li>'; 
	echo '<li><a href="'.get_bloginfo('wpurl').'/wp-admin/profile.php" target="_blank" title="'.$usp_language['profile'].'" >'.$usp_language['profile'].'</a>'; 
	echo '<li><a href="'.get_bloginfo('wpurl').'/wp-login.php?action=logout&amp;redirect_to='.get_option('siteurl').'" title="'.$usp_language['logout'].'" >'.$usp_language['logout'].'</a></li>';
}

function usp_form() {
		global $usp_language;
		global $usp_show_register;
		global $usp_login_mode;
		if ($usp_login_mode == 'form') {
			echo '<br /><div>';
			echo '
			<form name="loginform" id="loginform" action="'.get_bloginfo('wpurl').'/wp-login.php" method="post">
			<div>'.$usp_language['user_name'];
			if ($usp_show_register == true) echo ' | <a href="'.get_bloginfo('wpurl').'/wp-register.php">'.$usp_language['register'].'</a>';
			echo '</div>
			<input  type="text" name="log" id="log" value="" size="20" tabindex="1" />
			<div>'.$usp_language['password'].' | '.$usp_language['remember'].'<input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="3" checked="checked" /></div>
			<input type="password" name="pwd" id="pwd" value="" size="20" tabindex="2" /><br /><br /><input type="submit" name="submit" id="submit" value="'.$usp_language['login'].'" tabindex="4" />
			<input type="hidden" name="redirect_to" value="'.get_option('siteurl').'" /></form>';
			echo '</div>';
		} else {
			echo '<ul><li><a href="'.get_bloginfo('wpurl').'/wp-login.php" target="_blank" title="'.$usp_language['login'].'" >'.$usp_language['login'].'</a>';
			if ($usp_show_register == true) echo '</li><li><a href="'.get_bloginfo('wpurl').'/wp-register.php" target="_blank" title="'.$usp_language['register'].'" >'.$usp_language['register'].'</a>';
			echo '</li></ul>';
		}
}

function usp_notification() {
	global $usp_language;
	global $user_identity;
	global $usp_notification_style;
	if ($user_identity) {
		$msg = '';
		$awaiting_mod = usp_awaiting_mod_count();
		$update_plugins = usp_update_count();
		if ( $awaiting_mod != 0 and current_user_can('moderate_comments') ) {
		    $msg .= $usp_language['notifi_com'].': '.$awaiting_mod.'<br />';
		    $msgh = '<div id="usp_notification" style="'.$usp_notification_style.'">';
		    $msgf = '</div>'; }
		if ( $update_plugins !== 0 and current_user_can('activate_plugins') ) {
		    $msg .= $usp_language['notifi_plug'].': '.$update_plugins;
		    $msgh = '<div id="usp_notification" style="'.$usp_notification_style.'">';
		    $msgf = '</div>'; }
		echo $msgh.$msg.$msgf;
	}
}

if ($usp_avatar == true) {

	function usp_show_avatar($the_author, $the_author_name, $sizeW='', $sizeH='') {
		global $usp_avatar_avatars_path;
		global $usp_avatar_def_width;
		global $usp_avatar_def_height;
		global $usp_avatar_def_img;
		//We learn what size it will be displayed avatars
		if ($sizeW != '' and $sizeH != ''){ $usp_avatar_width = $sizeW; $usp_avatar_height = $sizeH; }
		elseif ($sizeW != '' and $sizeH == '') { $usp_avatar_width = $sizeW; $usp_avatar_height = $sizeW; }
		else { $usp_avatar_width = $usp_avatar_def_width; $usp_avatar_height = $usp_avatar_def_height; }
		//Whether we learn if at the user of avatars if is not present - it is used by default.
		$avatars_path = ABSPATH.$usp_avatar_avatars_path;
		$wpress_url = get_bloginfo('url');
		if(file_exists("$avatars_path/$the_author.jpg")) $the_avatar_jpg = $wpress_url.$usp_avatar_avatars_path.'/'.$the_author.'.jpg';
		else $the_avatar_jpg = $wpress_url.$usp_avatar_def_img;
		// We draw avatars
		echo '<img src="' . $the_avatar_jpg. '" alt="' . $the_author_name . '" class="avatar" style="width:'.$usp_avatar_width.'px; heidth:'.$usp_avatar_height.'px;" />';
	}
	
	if(!function_exists('get_avatar')) :
	function get_avatar($array='', $sizeW='', $sizeH=''){
		global $wpdb;
		global $usp_avatar_avatars_path;
		$the_author_name = get_comment_author();
		if($the_author_name == "" or $the_author_name == __('Anonymous')){ 	// Avatar for posts
			$the_author = get_the_author_id();
			$the_author_name = get_the_author();
			usp_show_avatar($the_author, $the_author_name, $sizeW, $sizeH);}
		else { // Avatar for comments - only for registered users
			$the_comment_ID = get_comment_ID();
			$string = "SELECT user_ID FROM $wpdb->comments WHERE comment_ID='".$the_comment_ID."'";
			$the_author = $wpdb->get_var($string);
			usp_show_avatar($the_author, $the_author_name, $sizeW, $sizeH);}
	}
	endif;
}

function UserSidebarPanel() {
	global $usp_language;
	global $usp_note;
	global $user_identity;
	global $user_ID;
	global $usp_show_avatar;
	if ($user_identity) {
		echo '<li><h2>'.$user_identity.'</h2><ul>';
		//Show avatar
		if(function_exists('usp_show_avatar') and $usp_show_avatar == true) usp_show_avatar($user_ID, $user_identity);
		//Show link tree
		usp_tree();
		echo '</ul>';
		//Show note
		if ($usp_show_note == true & $usp_note != '') echo '<div>'.$usp_note.'</div>';
		echo '</li>';}
	else { 
		echo '<li><h2>'.$user_identity.'</h2>';
		echo '<br /><div>';
		//Show login form or simple link
		usp_form();
		echo '</div></li>';}
}

function usp_widget($args) {
	global $usp_language;
	global $usp_show_note;
	global $usp_note;
	global $user_identity;
	global $user_ID;
	global $usp_show_avatar;
	global $usp_tree_mode;
	extract($args);
	if ($user_identity) {
		//Show widget header and title (title = $user_identity)
		echo $before_widget.$before_title.$user_identity.$after_title;
		echo '<ul>';
		//Show avatar
		if(function_exists('usp_show_avatar') and $usp_show_avatar == true) usp_show_avatar($user_ID, $user_identity);
		//Show link tree
		if($usp_tree_mode == 'old') usp_tree();
		elseif($usp_tree_mode == 'ng') usp_tree_ng();
		elseif($usp_tree_mode == 'small')usp_tree_small();
		echo '</ul>';
		//Show note
		if ($usp_show_note == true & $usp_note != '') echo '<div>'.$usp_note.'</div>';
		//Show widget footer
		echo $after_widget;
	}
	else { 
		//Show widget header and title (title = $usp_language['login'])
		echo $before_widget.$before_title.$usp_language['login'].$after_title;
		//Show login form or simple link
		usp_form();
		//Show widget footer
		echo $after_widget;
	}
}
?>