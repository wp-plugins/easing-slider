=== Easing Slider  ===
Homepage: http://easingslider.matthewruddy.com
Tags: slider, easing, plugin, jquery, content, featured, images, wordpress
Requires at least: 2.9.2
Tested up to: 3.0.1
Stable tag: 1.0.1

== Description ==

<h4><b><a href="http://easingslider.matthewruddy.com/">Live Preview</a></b></h4>


The Easing Slider is an image slider plugin for WordPress which uses the jQuery Easing plugin. It comes with various options that allow you to choose different sources to get the images from and also multiple styling options so that you"ll never have to edit any files directly!

<h4>Choose between images sourced from:</h4>
- Custom fields from a particular category
- Custom fields from all categories
- Selected images from the plugins "Custom Images" section.

The Easing Slider has the following optional features:
- Pagination (with custom icons if you wish)
- Next/previous buttons
- Choose between three different shadow types
- 7 different types of preloading icons (or use none)
- Padding & border settings
- And much more.


== Installation ==

<h4>Installation</h4>
<b>Via FTP:</b>
Once you download the plugin, extract the folder from the .rar file. Next, via FTP place the file in the "plugins" directory with all other plugins. This directory can be found in wp-content under the directory in which you store WordPress's files.

<b>Via Admin panel:</b>
Go to Add new under Plugins. Then search "easing slider" then click install.


<h4>Usage</h4>
To use the Easing Slider you can use the following methods:

<b>Shortcode in posts:</b>

<code>[easingslider]</code>

<b>Function in template files (via php):</b>

<code><?php if (function_exists("easing_slider")){ easing_slider(); }; ?></code>



<h4>Image Source:</h4>
You can change many of the sliders settings from the "Easing Slider" control panel in the WordPress administration panel.
Once the plugin is activated a new tab called "Easing Slider" emerges in the WordPress admin control panel. Under the tab "Plugin Settings" there is a section called "Get images from?". Here there is a dropdown menu with which you can select three different sources to get images from. These are:

<b>Custom Fields (Selected Category):</b>
Allows you to use custom fields to specify an image from each post to be displayed on the slider from a particular category only. To display an image use the custom field name "easing" followed by the URL of the image in the value field. You can only upload <i>ONE</i> custom field per post.

<b>Custom Fields (All Categories):</b>
This option displays images from custom fields with the name "easing" from all categories, then enter the URL of the image in the value field.

<b>Custom Images:</b>
This allows you to use a maximum of ten custom images specified in the "Custom Images" tab. Here you can enter your own URL to specific images of insert images from your media library. This panel also gives you a preview of all the custom images that will be displayed on the slider.


<h4>Adding an image</h4>

<b>Note:<i> You can only use one custom field per post</i></b>

<b>Custom Fields:</b>
If you are <i>NOT</i> using custom images you can insert images into the slider via Custom Fields. To do this, insert "easing" into the Custom field <i>name</i> field followed by the URL of the image in the <i>value</i> field. You can only insert one image per post.

<b>Custom Images tab:</b>
If you have selected “Custom Images” as your source you can now use the custom images tab. To insert images from this tab onto the slider simply paste the link into the text box and then clicking "save changes". Alternatively you can use the "upload image" button which uses Wordpress's built in media library. Once you uploaded the image click "insert into post" to insert the image URL into the next available text box. Then click "save changes" after each one.


== Screenshots ==

1. The Easing Slider used on MatthewRuddy.com showing how the slider can be tailored to your site.

2. Preview of the slider's "Custom Images" panel.

3. Use Wordpress's media library to upload new images to the slider.

4. Modify the sliders styling to your liking. Customize nearly everything.

5. Plugin settings tab. Change the image source and amount of images shown, etc.

== FAQ ==
 
<h4>What if I want a custom feature or my own fully customized slider?</h4>

Does the Easing Slider lack a feature you so desperately need? Do you want your own completely unique Easing Slider without any of the hassle of editing it yourself? No problem! Premium support is available depending on your requirement. Anything you may need customized can be done so for a small pre-agreed price. If you have anything to ask feel free to email me at info@matthewruddy.com.

<h4>The content slider is not working. It is just displaying the loading icon. What's wrong?</h4>

This (most likely) is due to one of two potential problems:

1. You have loaded jQuery already in your theme. If you manually inserted jQuery into your theme previously then it will break the Easing Slider (along with other plugins potentially) because jQuery is being loaded twice (the Easing Slider also loads jQuery).

2. No custom fields with the name "easing" followed by the URL of an image in the "value" field have been specified in any of your posts. See the "installation" section for more details on how to display images on the slider via custom fields. Alternatively you can use "custom images" by enabling this in the plugin settings tab of the Easing Slider's settings.

<h4>For more information please email me at info@matthewruddy.com</h4>
