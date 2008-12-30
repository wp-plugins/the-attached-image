<?php
/*
Plugin Name: The Attached Image
Plugin URI: http://return-true.com/wordpress-plugin-the_attached_image/375/
Description: Display the first image attached to a post. Use the_attached_image() in the post loop. Order can be changed using menu order via the WP gallery. Based on the post image WordPress plugin by Kaf Oseo.
Version: 1.6.1
Author: Paul Robinson
Author URI: http://return-true.com

	Copyright (c) 2008, 2009 Paul Robinson (http://return-true.com)
	The Attached Image is released under the GNU General Public License (GPL)
	http://www.gnu.org/licenses/gpl.txt

	This is a WordPress 2 plugin (http://wordpress.org).
	Based on the post image WordPress plugin by Kaf Oseo.
	Comments are there for those who wish to learn or make mods.
*/

function the_attached_image($args='') {
	global $post;
		
	parse_str($args); //parse the arguments given. Set defaults below in case none are set.
	
	if( !isset($img_size) ) $img_size = 'thumb';
	if( !isset($css_class) ) $css_class = 'attached-image';
	if( !isset($img_tag) ) $img_tag = true;
	if( !isset($echo) ) $echo = true;
	if( !isset($href) ) $href = false;
	if( !isset($link) ) $link = 'pic';
	if( !isset($default) ) $default = false;
	if( !isset($width) ) $width = false;
	if( !isset($height) ) $height = false;
	if( !isset($custom_img) ) $custom_img = false;
	
	if(!$custom_img === false) {
		if($custom_img_meta = get_post_meta($post->ID, 'att_custom_img', true)) {
			$attachments = array(get_post($custom_img_meta));
		} else {
			$attachments = array(get_post($custom_img));
		}
	}
	
	if(empty($post) && $custom_img === false) //If WP's post array is empty we can't do anything but only if a custom image hasn't been set.
		return false;
	
	if($custom_img === false) {
		//Get the attachments for the current post. Limit to one and order by the menu_order so that the image shown can be changed by the WP gallery.
		$attachments = get_children("post_parent=".$post->ID."&post_type=attachment&post_mime_type=image&numberposts=1&orderby=menu_order&order=ASC");
	}
	
	$m_width = get_post_meta($post->ID, 'att_width', true);
	$m_height = get_post_meta($post->ID, 'att_height', true);
	
	if(!$width === false && !$m_width == false && !$height === false) {
		$width = $m_width;
		$height = false;
	} elseif(!$height === false && !$m_height == false && !$width === false) {
		$height = $m_height;
		$width = false;
	} else {
		$width = (!$m_width == false) ? $m_width : $width;
		$height = (!$m_height == false) ? $m_height : $height;
	}
	// ^^ Check for custom fields. To stop function call follow through we need to cancel out the $width or the $height if only one has been set by meta.
	
	if(empty($attachments)) { //If attachments is empty then we should check for a default image via meta or via function call.
		if($pic_meta = get_post_meta($post->ID, 'att_default_pic', true)) {
			$default = $pic_meta;
		} elseif($default === false) {
			return false;
		}
		
		$image = '<img src="'.get_bloginfo('url').$default.'" class="'.$css_class.'" ';
		
		if($height === false && $width === false) { //Sort out the height & width depending on what has been supplied by the user.
			//Get the image size using ABSPATH. Suppresion of errors via @ is not expensive despite what you have heard. It's the generation of the error.
			$default_info = @getimagesize(substr(ABSPATH,0,-1).$default); 
			$image .= !empty($default_info[3]) ? $default_info[3].' />' : ' />'; 
		} else {
			if(!$width === false && !$height === false) {
				$image .= 'width="'.$width.'" height="'.$height.'" />'; 
			} elseif(!$width === false) {
				$image .= 'width="'.$width.'" />';
			} elseif(!$height === false) {
				$image .= 'height="'.$height.'" />';
			}
		}
	}
	
	if(!isset($image) && empty($image)) { //Gets the correct image depending upon whether or not $image has been set or not.
	
		$attachment = current($attachments);

		$img_url = wp_get_attachment_url($attachment->ID); //Get URL to attachment
		
		//Pick the right size & get it via WP. If a custom height & width was set cancel out WP's.
		if ( $img_size == 'medium' ) {
			if ( $intermediate = image_get_intermediate_size($attachment->ID, $img_size) ) {
				$img_url = str_replace(basename($img_url), $intermediate['file'], $img_url);
				if($width === false && $height === false) {
					$width = $intermediate['width'];
					$height = $intermediate['height'];
				}
			}
		} elseif ( $img_size == 'thumb' ) {
			if ( $intermediate = image_get_intermediate_size($attachment->ID, 'thumbnail') ) {
				$img_url = str_replace(basename($img_url), $intermediate['file'], $img_url);
				if($width === false && $height === false) {
					$width = $intermediate['width'];
					$height = $intermediate['height'];
				}
			}
		} elseif ( $img_size == 'full' ) {
			//Get the image's size since it will make our HTML invalid & the code won't close the img tag without a width & height.
			$split_pos = strpos($img_url, 'wp-content');
			$split_len = (strlen($img_url) - $split_pos);
			$abs_img_url = substr($img_url, $split_pos, $split_len);
			$full_info = @getimagesize(ABSPATH.$abs_img_url);
			if($width === false && $height === false) {
				$width = $full_info[0];
				$height = $full_info[1];
			}
		}
		
		if($img_tag === true || $img_tag == 'true') { //Do they want an image tag along with setting the height & width.
			$image = '<img src="'.$img_url.'" class="'.$css_class.'" title="'.$attachment->post_title.'"';
			
			if(!$width === false && !$height === false) {
				$image .= ' width="'.$width.'" height="'.$height.'" />'; 
			} elseif(!$width === false) {
				$image .= ' width="'.$width.'" />';
			} elseif(!$height === false) {
				$image .= ' height="'.$height.'" />';
			}
		} else { //You don't want a img tag then? Well heres the URL.
			$image = $img_url;
		}
		
		if($href === true || $href == 'true') { //Do you want a href & where should it point.
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
		if(isset($a_href) && !empty($a_href)) { //If they wanted a link put the img tag into it.
			$image = str_replace('%%%', $image, $a_href);
		}
	
	}
	
	if($echo === true || $echo == 'true') //Echo it?
		echo $image;
	else //Ok we'll return it instead.
		return $image;
	
}
?>