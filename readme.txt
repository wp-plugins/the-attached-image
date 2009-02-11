=== The Attached Image ===
Contributors: veneficusunus
Donate link: http://return-true.com/donations/
Tags: images, attachments, posts
Requires at least: 2.5
Tested up to: 2.8-bleeding-edge
Stable tag: 2.1.1

This plugin takes the first menu ordered image that is attached to a post & echo/returns a URL or HTML img tag with or without a link to the post, full picture or attachment page.

== Description ==

This plugin's main function allows you to show the first image that is attached to the current post. It must be placed in the post loop. It can also show any image that has been uploaded into the WordPress database by providing it the attachment's ID. There are also a few more features like the ability to show a default image if one isn't present on the current post & the ability to generate a link to either the post, the full image or the attachment page.

Check out the installation instructions for how to install and a link to the available parameters for the plugin.

Please report all bugs by visiting my [website](http://return-true.com/wordpress-plugin-the_attached_image/375/ "Report bugs here.") & dropping me a comment or by sending me an email to pablorobinson[at]gmail[dot]com. Thank you.

== Installation ==

1. Unzip the zip file.
1. place the file `the_attached_image.php` in the `wp-content/plugins` folder.
1. Place `<?php the_attached_image(); ?>` in your template.
1. You can find a list of the available parameters [here](http://return-true.com/wordpress-plugin-the_attached_image/375/ "A list of the allowed parameters").

== Frequently Asked Questions ==

= Can I use it outside the loop? =

No, sorry. It uses some WP functions that only run in the loop.

= What about a post link? =

The most recent version of `the_attached_image()` has the added ability to surround the img tag with a href to link to the post, picture(default) or the attachment page.

= What about setting a default image? =

Indeed you can. As of version 1.3 you can now set a default image to be shown if there are no images attached to a post. You must use a domainless absolute path such as `/wp-content/default_images/default.jpg`. The call would look something like `<?php the_attached_image('default=/wp-content/default_images/default.jpg') ?>`. If you want to use a different default image for certain posts then you can set a different one using the custom fields.

As of version 1.4 the key has changed to `att_default_pic` and the value would still be a domainless absolute path.

= Can I give a custom width & height? =

You can since version 1.4. The width, height or both can be provided via the function call in the template or via custom fields. You must use the two keys `att_width` and `att_height` please do not provide 'px' on the end. If you provide a width or a height the other is generally worked out by the browser. I do advise providing both sizes though.

= Can I Choose An Image That Isn't In Attached To The Current Post? =

Yes you can now. You must know the attachment ID which can be found by hovering over the view button in the media section of wordpress and looking at the status bar in your browser. You can use it in two ways, the call in the template like this `<?php the_attached_image('img_size=thumb&custom_img=14'); ?>` or you can provide it in the post meta with the key `att_custom_img`. Please be aware that using a call in the template will over-ride the normal function for the plugin, meaning it will always show the image from the provided ID unless a custom post meta for `att_custom_img` is set for one of the posts.

= Can I pick An Image Without Using The Gallery To Change The Order? =

Why yes you can. If you want to pick an image attached to a post, but don't want to change the order in the WP Gallery you can use the `image_order` option to pick an image to show. If a post doesn't have that number of images it will show the nearest it can get. For example if you pick 4 & a post only has 2 images it will show the second. An example might be `<?php the_attached_image('img_size=medium&image_order=3'); ?>`.

== Screenshots ==

1. An example of what can be achived using The Attached Image plugin.