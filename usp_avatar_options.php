<?php	if ($_POST['usp_avatar_action'] == 'upload_avatar'){
			if ($_FILES['usp_avatar_file']['size'] > 0 && $_FILES['usp_avatar_file']['size'] < $usp_avatar_max_upload_size){
				$uploaddir = ABSPATH.$usp_avatar_avatars_path;
				$uploadfile = $uploaddir.'/'.$userdata->ID.'.jpg';
				list($width, $height, $type, $attr) = getimagesize($_FILES['usp_avatar_file']['tmp_name']);
				$usp_avatar_image = imagecreatetruecolor ($usp_avatar_def_width, $usp_avatar_def_height);
				switch ($type){
					case 1: // GIF
						$image = imagecreatefromgif($_FILES['usp_avatar_file']['tmp_name']);
						imagecopyresampled($usp_avatar_image, $image, 0, 0, 0, 0, $usp_avatar_def_width, $usp_avatar_def_height, $width, $height);
						$avatar_created = (imagejpeg($usp_avatar_image, $uploadfile, 100) ? TRUE : FALSE);
						imagedestroy($image);
						imagedestroy($usp_avatar_image);
						break;
					case 2: // JPEG
						$image = imagecreatefromjpeg($_FILES['usp_avatar_file']['tmp_name']);
						imagecopyresampled($usp_avatar_image, $image, 0, 0, 0, 0, $usp_avatar_def_width, $usp_avatar_def_height, $width, $height);
						$avatar_created = (imagejpeg($usp_avatar_image, $uploadfile, 100) ? TRUE : FALSE);
						imagedestroy($image);
						imagedestroy($usp_avatar_image);
						break;
					case 3: // PNG
						$image = imagecreatefrompng($_FILES['usp_avatar_file']['tmp_name']);
						imagecopyresampled($usp_avatar_image, $image, 0, 0, 0, 0, $usp_avatar_def_width, $usp_avatar_def_height, $width, $height);
						$avatar_created = (imagejpeg($usp_avatar_image, $uploadfile, 100) ? TRUE : FALSE);
						imagedestroy($image);
						imagedestroy($usp_avatar_image);
						break;
					default:
						$avatar_created = FALSE;
						break; }
				if ($avatar_created) {
					echo '<div id="message" class="updated fade"><p>'.$usp_language['local_avatar_up_true'].'</p></div>'; }
				else {
					echo '<div id="message" class="error fade"><p>'.$usp_language['local_avatar_up_false'].'</p></div>'; }
		}	} 	?>
		
<div class="wrap">
	<h2><?php echo $usp_language['local_avatar_you_s'] ?></h2>
	<form name="usp_avatar" id="your-profile" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
	<table class="form-table"><tr valign="top"><th scope="row"><?php echo $usp_language['local_avatar_av_img'] ?></th><td>
		
<?php	$the_user = $userdata->ID;
		$avatars_path = ABSPATH.$usp_avatar_avatars_path;
		$wpress_url = get_bloginfo('url');
		if(file_exists("$avatars_path/$the_user.jpg")) $the_avatar_jpg = $wpress_url.$usp_avatar_avatars_path.'/'.$the_user.'.jpg';
		else $the_avatar_jpg = $wpress_url.$usp_avatar_def_img;
		echo '<img src="'.$the_avatar_jpg.'" alt="'.$usp_language['local_avatar_you_avatar'].'" class="avatar" style="width:'.$usp_avatar_def_width.'px; heidth:'.$usp_avatar_def_height.'px;" />'; ?>
		
	</td></tr>
	<tr valign="top"><th scope="row"><?php echo $usp_language['local_avatar_upload'] ?></th><td>
		<fieldset>
		<input type="file" accept="Pictures" name="usp_avatar_file" />
		<input type="hidden" name="usp_avatar_action" value="upload_avatar" /><br />
		<?php echo $usp_language['local_avatar_note'] ?>
		<!-- Click browse to find your avatar image. It can be JPG, GIF or PNG and should be <?php echo $usp_avatar_def_width.' x '.$usp_avatar_def_height ?> pixels (it will be squished and squashed if it is not!!).<br />Images should also be no larger than <?php echo $usp_avatar_max_upload_size / 1024; ?>KB<br />Currently animated GIFs are not supported. -->
		</fieldset>
		</td></tr>
	</table>
	<p class="submit"><input type="submit" name="cmd_avatar_update" value="<?php echo $usp_language['local_avatar_update'] ?> &raquo;" />
	</p>
	</form>
</div>

