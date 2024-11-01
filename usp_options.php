<?php
$updated = false;
if(isset($_POST['action']) && $_POST['action'] == 'update') {
	$updated = true;
	if(isset($_POST['usp_lang']))						update_option('usp_lang', $_POST['usp_lang']);
	if(isset($_POST['usp_note']))						update_option('usp_note', $_POST['usp_note']);
	if(isset($_POST['usp_show_avatar']))				update_option('usp_show_avatar', true);
		else											update_option('usp_show_avatar', false);
	if(isset($_POST['usp_show_register']))				update_option('usp_show_register', true);
		else											update_option('usp_show_register', false);
	if(isset($_POST['usp_show_note']))					update_option('usp_show_note', true);
		else											update_option('usp_show_note', false);
	if(isset($_POST['usp_login_mode']))					update_option('usp_login_mode', 'form');
		else											update_option('usp_login_mode', 'link');
	if(isset($_POST['usp_use_widget']))					update_option('usp_use_widget', true);
		else											update_option('usp_use_widget', false);
	if(isset($_POST['usp_avatar']))						update_option('usp_avatar', true);
		else											update_option('usp_avatar', false);
	if(isset($_POST['usp_avatar_def_width']))			update_option('usp_avatar_def_width', $_POST['usp_avatar_def_width']);
	if(isset($_POST['usp_avatar_def_height']))			update_option('usp_avatar_def_height', $_POST['usp_avatar_def_height']);
	if(isset($_POST['usp_avatar_avatars_path']))		update_option('usp_avatar_avatars_path', $_POST['usp_avatar_avatars_path']);
	if(isset($_POST['usp_avatar_def_img']))				update_option('usp_avatar_def_img', $_POST['usp_avatar_def_img']);
	if(isset($_POST['usp_avatar_max_upload_size']))		update_option('usp_avatar_max_upload_size', $_POST['usp_avatar_max_upload_size']*1024);
	if(isset($_POST['usp_tree_mode']))					update_option('usp_tree_mode', $_POST['usp_tree_mode']);
	if(isset($_POST['usp_notification_style']))			update_option('usp_notification_style', $_POST['usp_notification_style']);
}

$usp_lang = get_option('usp_lang');
$usp_use_widget = get_option('usp_use_widget');
$usp_note = get_option('usp_note');
$usp_show_avatar = get_option('usp_show_avatar');
$usp_show_register = get_option('usp_show_register');
$usp_login_mode = get_option('usp_login_mode');
$usp_show_note = get_option('usp_show_note');
$usp_avatar = get_option('usp_avatar');
$usp_avatar_def_width = get_option('usp_avatar_def_width');
$usp_avatar_def_height = get_option('usp_avatar_def_height');
$usp_avatar_avatars_path = get_option('usp_avatar_avatars_path');
$usp_avatar_def_img = get_option('usp_avatar_def_img');
$usp_avatar_max_upload_size = get_option('usp_avatar_max_upload_size');
$usp_tree_mode = get_option('usp_tree_mode');
$usp_notification_style	= get_option('usp_notification_style');


require_once(ABSPATH.'/wp-content/plugins/usersidebarpanel/lang/usp_'.$usp_lang.'.php');

if ($updated) {
	
	echo '<div class="updated"><p><strong>'.$usp_language['opt_saved'].'.</strong></p></div>';
	}
?> 
<div class="wrap">		
<h2><?php echo $usp_language['usersidebarpanel'] ?></h2>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> 


<!--<h3>Основные настройки</h3>  !!! -->
<table class="form-table">
<tr valign="top"><th scope="row"><?php echo $usp_language['lang'] ?></th><td>
<select name="usp_lang">
<?php	if ($handle = opendir(ABSPATH.'/wp-content/plugins/usersidebarpanel/lang/')) {
			while (false !== ($file = readdir($handle))) { 
				if ($file != "." && $file != "..") {
					$file = basename ($file,".php"); 
					list($lang_name) = sscanf($file, 'usp_%s');
					echo '<option value="'.$lang_name.'"';
					if ($lang_name == $usp_lang) echo ' selected="selected" ';
					echo '>'.$lang_name.'</option>';
				} 
			}
			closedir($handle); } ?> 
</select>
</fieldset></td></tr>
<tr valign="top"><th scope="row"><?php echo $usp_language['sedebar_opt'] ?></th><td><fieldset>
<label for="usp_use_widget"><input name="usp_use_widget" type="checkbox" id="usp_use_widget" value="true" <?php if ($usp_use_widget == true) echo 'checked="checked"'; ?>  /> <?php echo $usp_language['use_widget'] ?></label><br />
<hr style="color:#fff; border: 1px solid #fff;" />
<label for="usp_show_avatar" <?php if ($usp_avatar == false) echo 'style="color:#ccc"'; ?> ><input name="usp_show_avatar" type="checkbox" id="usp_show_avatar" value="true"  <?php if ($usp_show_avatar == true) echo 'checked="checked"'; ?> <?php if ($usp_avatar == false) echo 'disabled'; ?> /> <?php echo $usp_language['s_avatar'] ?></label><br />
<?php echo $usp_language['tree_mode_title'] ?><ul style="list-style: none;margin: 5px 0px 5px 0px;">
<li><label><input name="usp_tree_mode" value="old" <?php if ($usp_tree_mode == 'old') echo 'checked="checked"'; ?> type="radio"> <?php echo $usp_language['tree_mode_old'] ?></label></li>
<li><label><input name="usp_tree_mode" value="ng" <?php if ($usp_tree_mode == 'ng') echo 'checked="checked"'; ?> type="radio"> <?php echo $usp_language['tree_mode_ng'] ?></label></li>
<li><label><input name="usp_tree_mode" value="small" <?php if ($usp_tree_mode == 'small') echo 'checked="checked"'; ?> type="radio"> <?php echo $usp_language['tree_mode_small'] ?></label></li></ul>
<label for="usp_login_mode"><input name="usp_login_mode" type="checkbox" id="usp_login_mode" value="form"  <?php if ($usp_login_mode == 'form') echo 'checked="checked"'; ?> /> <?php echo $usp_language['s_form_mode'] ?></label><br />
<label for="usp_show_register"><input name="usp_show_register" type="checkbox" id="usp_show_register" value="true"  <?php if ($usp_show_register == true) echo 'checked="checked"'; ?> /> <?php echo $usp_language['s_register'] ?></label><br />
<hr style="color:#fff; border: 1px solid #fff;" />
<label for="usp_show_note"><input name="usp_show_note" type="checkbox" id="usp_show_note" value="true"  <?php if ($usp_show_note == true) echo 'checked="checked"'; ?> /> <?php echo $usp_language['s_note'] ?></label> <em>(<?php echo $usp_language['use_html'] ?>)</em>.<br />
<textarea name="usp_note" rows="2" cols="60" <?php if ($usp_show_note == false) echo 'disabled'; ?>><?php echo $usp_note ?></textarea>
</fieldset></td></tr>
<tr valign="top"><th scope="row"><?php echo $usp_language['local_avatar'] ?></th><td>
<label for="usp_avatar"><input name="usp_avatar" type="checkbox" id="usp_avatar" value="true" <?php if ($usp_avatar == true) echo 'checked="checked"'; ?>  /> <?php echo $usp_language['local_avatar_on'] ?></label><hr style="color:#fff; border: 1px solid #fff;" />
<fieldset <?php if ($usp_avatar == false) echo 'style="color:#ccc"'; ?> >
<?php echo $usp_language['local_avatar_path'] ?> <em>(<?php echo $usp_language['local_avatar_root'] ?>)</em>.<br /><input name="usp_avatar_avatars_path" type="text" id="usp_avatar_avatars_path" class="code" value="<?php echo $usp_avatar_avatars_path; ?>" size="80" <?php if ($usp_avatar == false) echo 'disabled'; ?> /><hr style="color:#fff; border: 1px solid #fff;" />
<?php echo $usp_language['local_avatar_default_path'] ?> <em>(<?php echo $usp_language['local_avatar_root'] ?>)</em>.<br /><input name="usp_avatar_def_img" type="text" id="usp_avatar_def_img" class="code" value="<?php echo $usp_avatar_def_img; ?>" size="80" <?php if ($usp_avatar == false) echo 'disabled'; ?> /><hr style="color:#fff; border: 1px solid #fff;" />
<?php echo $usp_language['local_avatar_size'] ?> <?php echo $usp_language['local_avatar_width'] ?> <input name="usp_avatar_def_width" type="text" id="usp_avatar_def_width" class="code" value="<?php echo $usp_avatar_def_width; ?>" size="3" <?php if ($usp_avatar == false) echo 'disabled'; ?> />рх; 
<?php echo $usp_language['local_avatar_heidth'] ?> <input name="usp_avatar_def_height" type="text" id="usp_avatar_def_height" class="code" value="<?php echo $usp_avatar_def_height; ?>" size="3" <?php if ($usp_avatar == false) echo 'disabled'; ?> />рх; 
<?php echo $usp_language['local_avatar_file_size'] ?> <input name="usp_avatar_max_upload_size" type="text" id="usp_avatar_max_upload_size" class="code" value="<?php echo $usp_avatar_max_upload_size/1024; ?>" size="3" <?php if ($usp_avatar == false) echo 'disabled'; ?> />kBates
</fieldset></td></tr>
<tr valign="top"><th scope="row"><?php echo $usp_language['notifi'] ?></th><td>
<fieldset>
<?php echo $usp_language['notifi_style_add'] ?>:<br />
<input name="usp_notification_style" type="text" id="usp_notification_style" class="code" value="<?php echo $usp_notification_style; ?>" size="80" />
</fieldset></td></tr>
</table>
</fieldset> 
<div>
<p class="submit"><input type="submit" name="Submit" value="<?php echo $usp_language['opt_update'] ?> &raquo;" />
<input type="hidden" name="action" value="update" /> 
</p>
</div>
</form>
</div>


