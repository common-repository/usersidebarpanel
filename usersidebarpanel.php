<?php
/* <WP Plugin Data>
 * Plugin Name: User Sidebar Panel
 * Version: 0.5.2.5
 * Plugin URI: http://krikun.ru/en/usersidebarpanel/
 * Description: This plugin add User Panel in your Sidebar
 * Author: Krikun
 * Author URI: http://krikun.ru
 */

add_option('usp_lang', 'english');
add_option('usp_note', '');
add_option('usp_show_avatar', true);
add_option('usp_show_register', true);
add_option('usp_show_note', false);
add_option('usp_login_mode', 'form');
add_option('usp_use_widget', true);
add_option('usp_avatar', true);
add_option('usp_avatar_def_width', '32'); // Default avatar width
add_option('usp_avatar_def_height', '32'); // Default avatar height
add_option('usp_avatar_max_upload_size', '51200');  // Max file size in bytes
add_option('usp_avatar_avatars_path', '/wp-content/avatars');
add_option('usp_avatar_def_img', '/wp-content/plugins/usersidebarpanel/default.jpg');
add_option('usp_tree_mode', 'ng');
add_option('usp_notification_style', 'text-align:center;margin:10px;padding:10px;background:#ffffd2;border-top:1px solid #ccc;border-bottom:1px solid #ccc;');

$usp_lang					=	get_option('usp_lang');
$usp_note					=	get_option('usp_note');
$usp_show_avatar			=	get_option('usp_show_avatar');
$usp_show_register			=	get_option('usp_show_register');
$usp_show_note				=	get_option('usp_show_note');
$usp_login_mode				=	get_option('usp_login_mode');
$usp_use_widget				=	get_option('usp_use_widget');
$usp_avatar					=	get_option('usp_avatar');
$usp_avatar_def_width		=	get_option('usp_avatar_def_width');
$usp_avatar_def_height		=	get_option('usp_avatar_def_height');
$usp_avatar_max_upload_size =	get_option('usp_avatar_max_upload_size');
$usp_avatar_avatars_path	=	get_option('usp_avatar_avatars_path');
$usp_avatar_def_img			=	get_option('usp_avatar_def_img');
$usp_tree_mode				=	get_option('usp_tree_mode');
$usp_notification_style		=	get_option('usp_notification_style');

require_once(ABSPATH.'/wp-content/plugins/usersidebarpanel/lang/usp_'.$usp_lang.'.php');
require_once(ABSPATH.'/wp-content/plugins/usersidebarpanel/functions.php');

function usp_widget_load() {
	global $usp_use_widget;
	if ( function_exists('register_sidebar_widget') && $usp_use_widget == true ) register_sidebar_widget('UserSidebarPanel', usp_widget);
	else return;
}

function usp_admin_menu() {
	global $usp_avatar;
	global $usp_language;
	add_options_page('User Sidebar Panel', 'UserSidebarPanel', 8,'usersidebarpanel/usp_options.php');
	if ($usp_avatar == true) add_submenu_page('profile.php', '', $usp_language['local_avatar_options_title'], 0, 'usersidebarpanel/usp_avatar_options.php'); 
	}

add_action ('plugins_loaded', 'usp_widget_load');
add_action ('admin_menu', 'usp_admin_menu');
add_action ('theme_header', 'UserSidebarPanel');
?>