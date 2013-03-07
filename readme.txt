=== Easing Slider "Lite"  ===
Homepage: http://rivaslider.com
Contributors: MatthewRuddy
Tags: slideshow, slider, slides, slide, gallery, images, image, responsive, mobile, jquery, javascript, featured, content
Requires at least: 3.5
Tested up to: 3.5.1
Stable tag: 2.0.1.2

Easing Slider "Lite" is an easy to use slideshow plugin. Simple and lightweight, built with native WordPress functionality.

== Description ==

Easing Slider "Lite" is an extremely easy to use slideshow plugin for WordPress. It is built to be lightweight and simple, with absolutely no bloat. It comes with many great features, some of which include:

* Fully responsive & mobile ready
* Lightweight, weighing just 16kb minified including styling
* Bulk image uploading, integrated with new WordPress Media Library
* CSS3 transitions for ultra smooth playback
* Navigation arrows & pagination
* Preloading functionality on page load
* Easy to modify styling
* Developer friendly with built-in Javascript events
* Lots of actions & filters for custom functionality

Throughly tested on iPhone, iPad and multiple Android devices, Easing Slider "Lite" is the perfect solution for mobile slideshows. We've used CSS3 transitions to ensure ultra smooth transitions on all devices. The codebase is also extremely light (just 16kb), which is perfect for those concerned about page loading times.

We've also integrated the new WordPress Media Library workflow to provide a better media management experience. Bulk uploading images to your slideshow is now easy, requiring just a few clicks.

Last but not least, we've left plenty of opportunity for custom plugin modifications using the WordPress Action & Filter APIs. You can completely create your own external functionality, or modify the plugin to integrate perfectly with your current theme. Awesome!

== Installation ==

= Display a slideshow =
To display the slideshow, you can use any of the following methods.

**In a post/page:**
Simply insert the shortcode below into the post/page to display the slideshow:

`[easingsliderlite]`

**Function in template files (via php):**
To insert the slideshow into your theme, add the following code to the appropriate theme file:

`<?php if ( function_exists( "easingsliderlite" ) ) { easingsliderlite(); } ?>`

== Screenshots ==

1. The integrated Media Uploader. Use it to add images to your slideshows one at a time, or in bulk.
2. "Edit Slideshow" panel. Set your various slideshow settings here.
3. "Settings" panel. Options for script & style loading, and image resizing features.
4. The slideshow, in all its glory! Nice and clean, but easy to re-style if needed.

== Changelog ==

= 2.0.1.2 =
* Fixed backwards compatibility issues with older versions of jQuery

= 2.0.1.1 =
* Fixed script cross origin bug.

= 2.0.1 =
* Fixed bugs with 2.0 release. Reverted name from Riva Slider "Lite" back to Easing Slider (transition did not go as hoped, sorry).
* Fixed CSS rendering issues some users were experiencing.
* Updated plugin upgrade procedures

= 2.0 =
* Too many updates to count. Completely revamped plugin from a clean slate. Hope you enjoy using it as much as I did creating it!

= 1.2.1 =
* Fixed: jQuery re-registering has been removed. Wordpress version of jQuery now used.
* Added: Notification for forthcoming major update.

= 1.2 =
* Changed: Adverts from Premium Slider to Easing Slider Pro.
* Changed: When activated, plugin will now default to 'Custom Images'
* Prepared plugin for major update (coming soon).

= 1.1.9 =
* Fixed: Plugin inconsistancies and Javascript mistakes.
* Changed: Plugin now only deletes slideshow when uninstalled (rather than de-activated).

= 1.1.8 =
* Fixed: IE9 issues. Slider is now fully functional in IE9.

= 1.1.7 =
* Added: Option to enable or disable jQuery.
* Fixed: Issue with slider appearing above post content when using shortcode.

= 1.1.6 =
* Added: Premium Slider notice.
* Added: Icon to heading on Admin options.

= 1.1.5 =
* Fixed: Mix up between autoPlay & transitionSpeed values in previous versions.

= 1.1.4 =
* Fixed: Added !important to padding & margin values of 0 to make sure slider doesn't inherit theme's css values.

= 1.1.3 =
* Fixed: CSS glitch in admin area.

= 1.1.2 =
* Fixed: Bug with previous version.

= 1.1.1 =
* Added: Option to disable permalinks in 'slider settings'.

= 1.1.0 =
* Added: Ability to add links to images. Images sourced from custom fields link to their respective post.
* Fixed: Edited script.js issue with fade animation.

= 1.0.3 =
* Added: paddingTop & paddingRight settings.
* Fixed: Bottom padding issue when shadow is enabled.
* Changed: Tab name 'Plugin Settings' to 'Usage Settings'.

= 1.0.2 =
* Added: Fade transition. Compatibility problems fixed.
* Fixed: Preloader margin-top with IE only. Used IE hack to add 1 pixel to the top margin to make preloader appear aligned.

= 1.0.1 =
* Fixed: Issues with 'Thematic' theme.
* Fixed: jQuery into noConflict mode to avoid conflictions with various other jQuery plugins.
* Fixed: Parse errors in CSS file.
* Fixed: jQuery version number.
* Removed: Fade transition effect due to compatibility problems & issue with certain themes.