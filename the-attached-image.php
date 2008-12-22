<?php
/*
Plugin Name: The Attached Image
Plugin URI: http://return-true.com
Description: Display the first image attached to a post. Use in the post loop. Order can be changed using menu order via the WP gallery. Based on the post image WordPress plugin by Kaf Oseo.
Version: 1.2
Author: Paul Robinson
Author URI: http://return-true.com

	Copyright (c) 2008, 2009 Paul Robinson (http://return-true.com)
	The Attached Image is released under the GNU General Public License (GPL)
	http://www.gnu.org/licenses/gpl.txt

	This is a WordPress 2 plugin (http://wordpress.org). Based on the post image WordPress plugin by Kaf Oseo.
	
~Changelog:
V 1.3:
Added ability to choose a default image to show
should there be no image to display. If no default 
image is defined then nothing will be returned.
Default image can be defined in the post via
custom fields using 'default_pic' as the key.

~~~~~~~~~~~~~~~~~~~~~

V 1.2 ~ 75 - 90:
Added the ability to output a link around the image.
You can choose to link to the pic (default), the
attachment page or the post that the image is attached to.

~~~~~~~~~~~~~~~~~~~~~

V 1.1 ~ line 62 & 68:
Fixed a stupid mistake. Used strict type check for true.
Not going to work if the true is provided by argument
as it will be a string not a bool.
*/

function the_attached_image($args='') {
	global $post;
		
	parse_str($args);
	
	if( !isset($img_size) ) $img_size = 'thumb';
	if( !isset($css_class) ) $css_class = 'attached-image';
	if( !isset($img_tag) ) $img_tag = true;
	if( !isset($echo) ) $echo = true;
	if( !isset($href) ) $href = false;
	if( !isset($link) ) $link = 'pic';
	if( !isset($default) ) $default = false;
	
	if(empty($post))
		return;
	
	$attachments = get_children("post_parent=".$post->ID."&post_type=attachment&post_mime_type=image&numberposts=1&orderby=menu_order&order=ASC");
	
	if(empty($attachments)) {
		if($pic_meta = get_post_meta($post->ID, 'default_pic', true)) {
			$default_info = @getimagesize($default);
			$default = $pic_meta;
		} elseif($default === false) {
			return;
		}
		
		$image = '<img src="'.get_bloginfo('url').$default.'" class="'.$css_class.'" '.$default_info[3].' />';
		
		if($echo === true || $echo == 'true') {
			echo $image;
			return;
		} else {
			return $image;
		}
	}
		
	foreach($attachments as $attachment) {
		$attachment = $attachment;
		break;
	}

	$img_url = wp_get_attachment_url($attachment->ID);
	
	if ( $img_size == 'medium' ) {
		if ( $intermediate = image_get_intermediate_size($attachment->ID, $img_size) ) {
			$img_url = str_replace(basename($img_url), $intermediate['file'], $img_url);
			$width = $intermediate['width'];
			$height = $intermediate['height'];
		}
	} else {
		if ( $intermediate = image_get_intermediate_size($attachment->ID, 'thumbnail') ) {
			$img_url = str_replace(basename($img_url), $intermediate['file'], $img_url);
			$width = $intermediate['width'];
			$height = $intermediate['height'];
		}
	}
	
	if($img_tag === true || $img_tag == 'true') {	
		$image = '<img src="'.$img_url.'" class="'.$css_class.'" title="'.$attachment->post_title.'" width="'.$width.'" height="'.$height.'" />';
	} else {
		$image = $img_url;
	}
	
	if($href === true || $href == 'true') {
		switch ($link) {
			case 'post' :
				$a_href = '<a href="'.get_permalink($post->ID).'" title="'.$post->post_title.'">%%%</a>';
			break;
			case 'attachment' :
				$a_href = '<a href="'.get_attachment_link($attachment->ID).'" title="'.$attachment->post_title.'">%%%</a>';
			break;
			default :
				$a_href = '<a href="'.wp_get_attachment_url($attachment->ID).'" title="'.$attachment->post_title.'">%%%</a>';
			break;
		}
	}
	if(isset($a_href) && !empty($a_href)) {
		$image = str_replace('%%%', $image, $a_href);
	}
	
	if($echo === true || $echo == 'true')
		echo $image;
	else
		return $image;
	
}
?>