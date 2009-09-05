<p><a href="<?php echo preg_replace('/&wpatt-page=[^&]*/', '', $_SERVER['REQUEST_URI']) . '&wpatt-page=docs'; ?>" title="Check the documentation, it's always a good idea!">Read the documentation</a></p>
<form name="att_img_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
  <h3>Functionality</h3>
  <p>This new feature allows you to choose between the two main functions of The Attached Image. Leave the checkbox off to use it as normal, which is to grab the first attached image from the current post. If you turn on the checkbox the plugin will instead use the nth numbered image tag from the post content, where n is the number placed in the box that appears to the right of the checkbox. Remember the size 'In Post' size option will only work if the in post functionality is switched on.</p>
  <table class="form-table">
  <tbody>
  <tr>
  	<th valign="top">
    	<?php _e("Pick Functionality", 'att_trans_domain' ); ?>
    </th>
    <td>
    	<label>Turn On In Post Image Functionality: <input type="checkbox" value="true" name="<?php echo $opt_name['function']; ?>" <?php echo (isset($opt_val['function']) && $opt_val['function'] == "true") ? 'checked="checked"' : ''; ?>  /></label>&nbsp;&nbsp;&nbsp;&nbsp;<input id="function_number" type="text" name="<?php echo $opt_name['function_number']; ?>" value="<?php echo $opt_val['function_number']; ?>" />
    </td>
  </tr>
  <tr>
    <th valign="top">
    	<?php _e("In Post Image Size:", 'att_trans_domain' ); ?><br/><small>If image was uploaded with wordpress, will try & get the requested size.</small>
    </th>
    <td>
    	<select name="<?php echo $opt_name['in_post_image_size']; ?>">
          	<option value="thumbnail" <?php echo ($opt_val['in_post_image_size'] == "thumbnail") ? 'selected="selected"' : ''; ?> >Thumbnail</option>
            <option value="medium" <?php echo ($opt_val['in_post_image_size'] == "medium") ? 'selected="selected"' : ''; ?> >Medium</option>
            <option value="large" <?php echo ($opt_val['in_post_image_size'] == "large") ? 'selected="selected"' : ''; ?> >Large</option>
            <option value="full" <?php echo ($opt_val['in_post_image_size'] == "full") ? 'selected="selected"' : ''; ?> >Full Size</option>
          </select>
    </td>
  </tr>
  </tbody>
  </table>
  <h3>General Options</h3>
  <p>These are the basic options. They set what size image to use, if a default image should be set &amp; a few other things. Please check the <a href="<?php echo preg_replace('/&wpatt-page=[^&]*/', '', $_SERVER['REQUEST_URI']) . '&wpatt-page=docs'; ?>" title="Check the documentation, it's always a good idea!">documentation</a> before playing with any of the options shown on this page.</p>
  <table class="form-table">
  	<tbody>
    <tr>
      <th valign="top">
        <?php _e("Image Size:", 'att_trans_domain' ); ?>
      </th>
      <td>
          <select name="<?php echo $opt_name['img_size']; ?>">
          	<option value="thumb" <?php echo ($opt_val['img_size'] == "thumb") ? 'selected="selected"' : ''; ?> >Thumbnails</option>
            <option value="medium" <?php echo ($opt_val['img_size'] == "medium") ? 'selected="selected"' : ''; ?> >Medium</option>
            <option value="large" <?php echo ($opt_val['img_size'] == "large") ? 'selected="selected"' : ''; ?> >Large</option>
            <option value="full" <?php echo ($opt_val['img_size'] == "full") ? 'selected="selected"' : ''; ?> >Full Size</option>
          </select>
      </td>
    </tr>
    <tr>
      <th>
        <?php _e("CSS Class:", 'att_trans_domain'); ?>
      </th>
      <td><input type="text" name="<?php echo $opt_name['css_class']?>" value="<?php echo $opt_val['css_class']; ?>" /></td>
    </tr>
    <tr>
      <th rowspan="2" valign="top">
        <?php _e("Custom Image Size:", 'att_trans_domain'); ?>
        </th>
      <td><label>Width:
          <input type="text" name="<?php echo $opt_name['img_width']; ?>" value="<?php echo $opt_val['img_width']; ?>" />
        </label></td>
    </tr>
    <tr>
      <td><label>Height:
          <input type="text" name="<?php echo $opt_name['img_height']; ?>" value="<?php echo $opt_val['img_height']; ?>" />
        </label></td>
    </tr>
    <tr>
    	<th><?php _e("Default Image Path:", 'att_trans_domain'); ?><br /><small>(Must start from blog root)</small></th>
        <td><input type="text" name="<?php echo $opt_name['default_img']; ?>" value="<?php echo $opt_val['default_img']; ?>" /></td>
    </tr>
    <tr>
    	<th><?php _e("Image Link Location:", 'att_trans_domain'); ?></th>
        <td>
            <select name="<?php echo $opt_name['href']; ?>">
                <option value="none" <?php echo ($opt_val['href'] == "none") ? 'selected="selected"' : ''; ?> >No Link</option>
                <option value="post" <?php echo ($opt_val['href'] == "post") ? 'selected="selected"' : ''; ?> >Post</option>
                <option value="image" <?php echo ($opt_val['href'] == "image") ? 'selected="selected"' : ''; ?> >Image</option>
                <option value="large_image" <?php echo ($opt_val['href'] == "large_image") ? 'selected="selected"' : ''; ?> >Large Image If Exists</option>
                <option value="attachment" <?php echo ($opt_val['href'] == "attachment") ? 'selected="selected"' : ''; ?> >Attachment</option>
            </select>
        </td>
    </tr>
    <tr>
    	<th><?php _e("Image Alternate Text:", 'att_trans_domain'); ?></th>
        <td>
        	<select name="<?php echo $opt_name['alt']; ?>">
                <option value="image-name" <?php echo ($opt_val['alt'] == "image-name") ? 'selected="selected"' : ''; ?> >Image Filename</option>
                <option value="image-description" <?php echo ($opt_val['alt'] == "image-description") ? 'selected="selected"' : ''; ?> >Image Description</option>
                <option value="post-title" <?php echo ($opt_val['alt'] == "post-title") ? 'selected="selected"' : ''; ?> >Post Title</option>
                <option value="post-slug" <?php echo ($opt_val['alt'] == "post-slug") ? 'selected="selected"' : ''; ?> >Post Slug</option>
            </select>
        </td>
    </tr>
    <tr>
    	<th><?php _e("Link Title Text:", 'att_trans_domain'); ?><br/><small>(Works only if link is <strong>not</strong> no link)</small></th>
        <td>
        	<select name="<?php echo $opt_name['link_title']; ?>">
                <option value="image-name" <?php echo ($opt_val['link_title'] == "image-name") ? 'selected="selected"' : ''; ?> >Image Filename</option>
                <option value="image-description" <?php echo ($opt_val['link_title'] == "image-description") ? 'selected="selected"' : ''; ?> >Image Description</option>
                <option value="post-title" <?php echo ($opt_val['link_title'] == "post-title") ? 'selected="selected"' : ''; ?> >Post Title</option>
                <option value="post-slug" <?php echo ($opt_val['link_title'] == "post-slug") ? 'selected="selected"' : ''; ?> >Post Slug</option>
            </select>
        </td>
    </tr>
    </tbody>
  </table>
  <h3><?php _e("Advanced Options", 'att_trans_domain'); ?></h3>
  <p>The following are advanced options. If you aren't comfortable messing around with them then just leave them. You can actually stop the plugin from working correctly by selecting the wrong option here so please be careful. If you are a seasoned coder or know what you are doing then ignore this &amp; happy hunting.</p>
  <table class="form-table">
  <tbody>
  	<tr>
    	<th><?php _e("Generate An Image Tag:", 'att_trans_domain'); ?></th>
        <td>
        	<select name="<?php echo $opt_name['img_tag']; ?>">
        		<option value="true" <?php if($opt_val['img_tag'] == "true" || $opt_val['img_tag'] == "") echo 'selected="selected"'; ?> >True</option>
                <option value="false"<?php if($opt_val['img_tag'] == "false") echo 'selected="selected"'; ?> >False</option>
            </select>
        </td>
    </tr>
    <tr>
    	<th><?php _e("Echo or Return:", 'att_trans_domain'); ?></th>
        <td>
        	<select name="<?php echo $opt_name['echo']; ?>">
        		<option value="true" <?php echo ($opt_val['echo'] == "true") ? 'selected="selected"' : ''; ?> >Echo</option>
                <option value="false" <?php echo ($opt_val['echo'] == "false") ? 'selected="selected"' : ''; ?> >Return</option>
            </select>
        </td>
    </tr>
    <tr>
    	<th><?php _e("Hyperlink Rel Attribute:", 'att_trans_domain'); ?></th>
        <td>
        	<input type="text" name="<?php echo $opt_name['href_rel']; ?>" value="<?php echo $opt_val['href_rel']; ?>" />
        </td>
    </tr>
    <tr>
    	<th><?php _e("Image Order:", 'att_trans_domain'); ?></th>
        <td>
        	<input type="text" name="<?php echo $opt_name['img_order']; ?>" value="<?php echo $opt_val['img_order']; ?>" />
        </td>
    </tr>
    </tbody>
  </table>
  <p class="submit">
    <input type="submit" name="Submit" value="<?php _e('Update Options', 'att_trans_domain' ) ?>" />
  </p>
</form>