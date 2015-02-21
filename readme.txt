=== Backroomapp : Enable private sharing and chatting over your Wordpress blog ===
Contributors: backroomapp
Tags: chats, community, backroomapp, share
Requires at least: 3.0
Tested up to: 4.0
Stable tag: trunk
License: GPLv2 or later

Backroomapp is a content messenger. It allows readers of your blog to share and chat privately with their friends right from the content.

== Description ==

Readers share content privately more than they do social sharing. And yet there is no quick and simple way of making it easy for the users a private sharing feature. Right now these private sharing happens via emails, Skype and other messaging platform which require multiple clicks and several hoops to jump through. 

Backroomapp solves these problems both for the publisher and the user. This plugin will install Backroom widget which will enable Backroom messenger right from the blog post. Users can now build their private communities. This way the blog posts gets shared more and sees increase in traffic in addition to community building.

== Installation ==

This WordPress widget is easy to install:

1. Extract the contents of the zip file into your wp-content/plugins directory.

2. Activate the plugin through the 'Plugins' menu in WordPress.

3. Now is the step where you will place the widget on the blog post page. We recommend to place this widget right below where the post ends - which is above public sharing.

4. So, go to your Appearance -> Editor and open Single Post (single.php) file which is associated with an individual post.

Paste the below. 

<?php backroom_widget( 'publisher_key=YOURWEBSITEDOMAIN' ); ?> 

Remember to replace YOURWEBSITEDOMAIN with the name of your blog (without http:// or www). So, for example, in case of http://blog.backroomapp.com, it will look like below.

<?php backroom_widget( 'publisher_key=blog.backroomapp.com' ); ?> 

If you want to see a screen shot, see the FAQ section where we have link to our detailed documentation.

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

