=== The Attached Image ===
Contributors: veneficusunus
Donate link: http://return-true.com/want-to-help-return-true/
Tags: images, attachments, posts
Requires at least: 2.5
Tested up to: 2.7
Stable tag: 1.4.1

This plugin takes the first menu ordered image that is attached to a post & echo/returns a URL or HTML img tag with or without a link to the post, full picture or attachment page.

== Description ==

The idea behind this plugin is to show the first image attached to a post. The image that is shown can be customized as the image shown is always the one marked as first in the WordPress gallery order. You can supply a custom CSS class and it will be placed in the img tag. You can also switch between outputing a URL or an full img tag. Finally you can choose whether to echo or return the img or URL. It is also possible to have a href around the image pointing to the post, the full image or the attachment page.

Support for using a default image has now been added since version 1.3. It can be defined in the template & then over-rode using the custom fields on any post you like.

Support for custom sizes has been added since version 1.4. Remember the size is changed using the HTML width & height attribute meaning that it will not resize increadibly well, but it is better than nothing. You may provide the sizes by the function call or via custom fields. See the FAQ for more info.

== Installation ==

1. Unzip the zip file.
1. place the file 'the_attached_image.php' in the 'wp-content/plugins' folder.
1. Place `<?php the_attached_image(); ?>` in your template.

== Frequently Asked Questions ==

= Can I use it outside the loop? =

No, sorry. It uses some WP functions that only run in the loop.

= What about a post link? =

The most recent version of `the_attached_image()` has the added ability to surround the img tag with a href to link to the post, picture(default) or the attachment page.

= What about setting a default image? =

Indeed you can. As of version 1.3 you can now set a default image to be shown if there are no images attached to a post. You must use a domainless absolute path such as `/wp-content/default_images/default.jpg`. The call would look something like `<?php the_attached_image('default=/wp-content/default_images/default.jpg') ?>`. If you want to use a different default image for certain posts then you can set a different one using the custom fields.

As of version 1.4 the key has changed to `att_default_pic` and the value would still be a domainless absolute path.

= Can I give a custom width & height> =

You can since version 1.4. The width, height or both can be provided via the function call in the template or via custom fields. You must use the two keys `att_width` and `att_height` please do not provide 'px' on the end. If you provide a width or a height the other is generally worked out by the browser. I do advise providing both sizes though.

== Screenshots ==

1. An example of what can be achived using The Attached Image plugin.