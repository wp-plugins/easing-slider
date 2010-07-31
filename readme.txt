=== Easing Slider  ===
Homepage: http://easingslider.matthewruddy.com
Tags: slider, wordpress, easing, plugin, jquery
Requires at least: 2.9.2
Tested up to: 3.0
Stable tag: 1.0

== Description ==

The Easing Slider is an image slider plugin for WordPress which uses the jQuery Easing plugin. It comes with various options that allow you to choose different sources to get the images from and also multiple styling options so that you'll never have to edit any files directly!

Choose between images sourced from custom fields or the Easing Slider's built in 'Custom Images' panel which gives you a preview of all the images that will appear on the slider. You can also use WordPress's built in Media Library to upload images to the slider.

The Easing Slider comes with various different transition options along with the option to change the transition timings and the amount of time each image is displayed for. It also comes with options to enable or disable next/previous icons, pagination, preload icons, shadows, etc. Almost everything on the slider can be changed without any problems by even the newest users of WordPress. 



== Installation ==


Via FTP:
Once you download the plugin, extract the folder from the .rar file. Next, via FTP place the file in the ‘plugins’ directory with all other plugins. This directory can be found in wp-content under the directory in which you store WordPress’s files.

Via Admin panel:
Go to Add new under Plugins. Then search ‘easing slider’ then click install.



To use the Easing Slider you can use the following methods:

Shortcode in posts/pages:

[easingslider]

Php function in template files (such as header.php, index.php, footer.php, etc.):

<?php if (function_exists('easing_slider')){ easing_slider(); }; ?>



You can change many of the sliders settings from the ‘Easing Slider’ control panel in the WordPress admininstration panel.



Changing Image Source:
Once the plugin is activated a new tab called ‘Easing Slider’ emerges in the WordPress admin control panel. Under the tab ‘Plugin Settings’ there is a section called ‘Get images from?). Here there is a dropdown menu with which you can select three different sources to get images from. These are:

Custom Fields (Selected Category):
Allows you to use custom fields to specify an image from each post to be displayed on the slider from a particular category only. To display an image use the custom field name ‘easing’ followed by the URL of the image in the value field.

Custom Fields (All Categories):
This option displays images from custom fields with the name ‘easing’ from all categories, then enter the URL of the image in the value field.

Custom Images:
This allows you to use a maximum of ten custom images specified in the “Custom Images” tab. Here you can enter your own URL to specific images of insert images from your media library. This panel also gives you a preview of all the custom images that will be displayed on the slider.


= Uploading Images =


How to upload a ‘Custom Image’ via Upload Image button:
To upload a custom image via the ‘Upload Image’ button, firstly you must set the field ‘Get Images From?’ in the Plugin Settings tab to ‘Custom Images’ then click ‘Save Changes’. Then in the ‘Custom Images’ tab, click the upload image button. Then, upload the image in the usual manner. Once the image has been uploaded scroll down and click ‘Insert into post’. This will insert the images URL into the next free text box. You must then click ‘Save changes’ before you repeat this process otherwise for it to work each time. Alternatively you can just paste the URL of your chosen image into the text box of your choice in the Custom Images tab.

== FAQ's ==
 
What if I want a custom feature or my own fully customized slider?

Does the Easing Slider lack a feature you so desperately need? Do you want your own completely unique Easing Slider without any of the hassle of editing it yourself? No problem! Premium support is avaliable depending on your requirement. Anything you may need customized can be done so for a small pre-agreed price. If you have anything to ask feel free to email me at info@matthewruddy.com.

The content slider is not working. It is just displaying the loading icon. What’s wrong?

This (most likely) is due to one of two potential problems:

1. You have loaded jQuery already in your theme. If you manually inserted jQuery into your theme previously then it will break the Easing Slider (along with other plugins potentially) because jQuery is being loaded twice (the Easing Slider also loads jQuery).

2. No custom fields with the name ‘easing’ followed by the URL of an image in the ‘value’ field have been specified in any of your posts. See the ‘installation’ section for more details on how to display images on the slider via custom fields. Alternatively you can use ‘custom images’ by enabling this in the plugin settings tab of the Easing Slider’s settings.
