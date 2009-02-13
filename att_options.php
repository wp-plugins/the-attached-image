<p><a href="<?php echo preg_replace('/&wpatt-page=[^&]*/', '', $_SERVER['REQUEST_URI']) . '&wpatt-page=docs'; ?>" title="Check the documentation, it's always a good idea!">Read the documentation</a></p>
<form name="att_img_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
  <h3>General Options</h3>
  <p>These are the basic options. They set what size image to use, if a default image should be set &amp; a few other things. Please check the <a href="<?php echo preg_replace('/&wpatt-page=[^&]*/', '', $_SERVER['REQUEST_URI']) . '&wpatt-page=docs'; ?>" title="Check the documentation, it's always a good idea!">documentation</a> before playing with any of the options shown on this page.</p>
  <table class="form-table">
  	<tbody>
    <tr>
      <th rowspan="4" valign="top">
        <?php _e("Image Size:", 'att_trans_domain' ); ?>
      </th>
      <td><label>
          <input type="radio" name="<?php echo $opt_name['img_size']; ?>" value="thumb" <?php if($opt_val['img_size'] == "thumb") echo 'checked="checked"'; ?> />
          Thumbnail</label></td>
    </tr>
    <tr>
      <td><label>
          <input type="radio" name="<?php echo $opt_name['img_size']; ?>" value="medium" <?php if($opt_val['img_size'] == "medium") echo 'checked="checked"'; ?> />
          Medium</labeL></td>
    </tr>
    <tr>
      <td><label>
          <input type="radio" name="<?php echo $opt_name['img_size']; ?>" value="large" <?php if($opt_val['img_size'] == "large") echo 'checked="checked"'; ?> />
          Large</label></td>
    </tr>
    <tr>
      <td><label>
          <input type="radio" name="<?php echo $opt_name['img_size']; ?>" value="full" <?php if($opt_val['img_size'] == "full") echo 'checked="checked"'; ?> />
          Full</label></td>
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
    	<th><?php _e("Default Image Path:", 'att_trans_domain'); ?></th>
        <td><input type="text" name="<?php echo $opt_name['default_img']; ?>" value="<?php echo $opt_val['default_img']; ?>" /></td>
    </tr>
    <tr>
    	<th><?php _e("Image Link Location:", 'att_trans_domain'); ?></th>
        <td>
            <select name="<?php echo $opt_name['href']; ?>">
                <option value="none" <?php echo ($opt_val['href'] == "none") ? 'selected="selected"' : ''; ?> >No Link</option>
                <option value="post" <?php echo ($opt_val['href'] == "post") ? 'selected="selected"' : ''; ?> >Post</option>
                <option value="image" <?php echo ($opt_val['href'] == "image") ? 'selected="selected"' : ''; ?> >Image</option>
                <option value="attachment" <?php echo ($opt_val['href'] == "attachment") ? 'selected="selected"' : ''; ?> >Attachment</option>
            </select>
        </td>
    </tr>
    </tbody>
  </table>
  <h3><?php _e("Advanced Options", 'att_trans_domain'); ?></h3>
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