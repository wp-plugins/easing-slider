=== Riva Slider "Lite"  ===
Homepage: http://rivaslider.com
Contributors: MatthewRuddy
Tags: slider, slideshows, easing, plugin, jquery, content, featured, images, wordpress
Requires at least: 3.5
Tested up to: 3.5.1
Stable tag: 2.0

Riva Slider "Lite" is a simple slideshow plugin built with ease of use in-mind.

== Description ==

Riva Slider "Lite" comes with some great features that allow you to create the perfect slideshow. Here is just a few of those features.

- Responsive width, ideal for mobile devices & response themes.
- Lightweight code for faster loading times. Optimization settings included for conditional loading.
- Pagination icons and next/previous slide arrows.
- Image preloading.
- Easy to style CSS.
- Lots of WordPress action & filter hooks for customization.

== Installation ==

= Display a slideshow =
To display the slideshow, you can use any of the following methods.

<strong>In a post/page:</strong>
Simply insert the shortcode `[rivasliderlite]` into the post/page to display the slideshow. We've also included a handy button above the content editor, screenshotted below.

<strong>Function in template files (via php):</strong>
To insert the slideshow into your theme, add the following code to the appropriate theme file: `<?php if (function_exists("rivasliderlite")){ rivasliderlite(); }; ?>`.

== Changelog ==

= 2.0 =
* Too many updates to count. Completely revamped plugin from a clean slate. Hope you enjoy using it as much as I did creating it!

= 1.2.1 =
* Fixed: jQuery re-registering has been removed. Wordpress version of jQuery now used.
* Added: Notification for forthcoming major update.

= 1.2 =
* Changed: Adverts from Premium Slider to Riva Slider Pro.
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