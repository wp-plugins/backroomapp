=== Backroomapp : Chat privately with your friends on any Content ===
Contributors: backroomapp
Tags: chats, community, backroomapp, share
Requires at least: 3.0
Tested up to: 4.0
Stable tag: trunk
License: GPLv2 or later

Backroomapp is a content messenger. Chat privately with your friends right from the content you read and watch.

== Description ==

Backroomapp is your content messenger. Chat privately with your friends right from the content you read and watch. This Wordpress plugin enables the content messenging onto a Wordpress blog, enabling private sharing for the Wordpress blog posts. This way the blog gets shared more and sees increase in traffic in addition to community building.

== Installation ==

This WordPress widget is easy to install:

1. Extract the contents of the zip file into your wp-content/plugins directory.

2. Activate the plugin through the 'Plugins' menu in WordPress.

3. Go to the Appearance -> widget screen, drag the widget to a sidebar, and fill out the necessary fields and options.

Alternatively, if you did step 1 and 2 you can insert a version without a widget too (see below):

= With shortcode =

Use [shortcodes](http://support.wordpress.com/shortcodes/) to embed your backroom widget in any post or page. 

Usage:

`[backroom publisher_key="3e37fd3a541c59f34c7daaa1b7e0f797"]`

Arguments provides by the shortcode:

* 'publisher_key' Your publisher key generated from backroomapp.com (http://backroomapp.com)

= With custom code =

Usage:
`<?php backroom_widget( $args ); ?>`

Params:
$args could be:

* 'publisher_key' Your publisher key generated from backroomapp.com (http://backroomapp.com)

Example:
`<?php backroom_widget( 'publisher_key=3e37fd3a541c59f34c7daaa1b7e0f797' ); ?>`

== Frequently Asked Questions ==

= Where can I find support documentation? =

Go to [http://backroom.uservoice.com](http://backroom.uservoice.com))

= Will this slow down my blog? =

Absolutely not! We have built it so that we do not load the messenger when the blog post loads. Your blog will not be affected at all.

= Where can I see an example of Backroom in action?=
Visit our own blog where you can see Backroom in action [http://blog.backroomapp.com](http://blog.backroomapp.com))

== Screenshots ==
1. Backroom Home Page.
2. The widget after integrating with your wordpress blog
3. Backroom messenger pops from the right and users can share the story with their message to their contacts.

== Changelog ==

= 1.0 =
*Initial version

== Upgrade Notice ==

= 1.0 = 
Initial version

== Support ==

Email us at support{at}netcurate.com and we\'ll be happy to help!

