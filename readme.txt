=== The Attached Image ===
Contributors: veneficusunus
Donate link: http://return-true.com/donate/
Tags: images, attachments
Requires at least: 2.5
Tested up to: 2.7
Stable tag: 4.3

This plugin takes the first menu ordered image that is attached to a post & echo/returns a URL or HTML img tag.

== Description ==

The idea behind this plugin is to show the first image attached to a post. The image that is shown can be customized as the image shown is always the one marked as first in the WordPress gallery order. You can supply a custom CSS class and it will be placed in the img tag. You can also switch between outputing a URL or an full img tag. Finally you can choose whether to echo or return the img or URL.

== Installation ==

1. Unzip the zip file.
1. place the file 'the_attached_image.php' in the 'wp-content/plugins' folder.
1. Place `<?php the_attached_image(); ?>` in your template.

== Frequently Asked Questions ==

= Can I use it outside the loop? =

No, sorry. It uses some WP functions that only run in the loop.

= What about a post link? =

Well I was going to provide an option to add a link, and I still may a some point, but for the moment I felt it was better for you to make your own link around the image provided. Just wrap a <a> tag around the call to the plugin and use the_title() etc as you would normally.

== Screenshots ==

1. An example of what can be achived using The Attached Image plugin.