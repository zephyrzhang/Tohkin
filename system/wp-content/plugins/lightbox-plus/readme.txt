=== Lightbox Plus ===
Contributors: dzappone
Donate link: http://www.23systems.net/donate/
Tags: picture, photo, lightbox, image, ajax, gallery, colorbox, lightview, wordpress mu
Requires at least: 2.8
Tested up to: 2.9.2
Stable tag: 1.6.9.7

Lightbox Plus permits users to view larger versions of images from the current page and display simple slide shows, all in an overlay.

== Description ==

Lightbox Plus implements ColorBox as a lightbox image overlay tool for WordPress.  <a href="http://colorpowered.com/colorbox/">ColorBox</a> was created by Jack Moore and is licensed under the <a href="http://www.opensource.org/licenses/mit-license.php">MIT License</a>.  Lightbox Plus permits users to view larger versions of images without having to leave the current page, and is also able to display simple slide shows. The use of the dark or light background, which dims the page over which the image has been overlaid, also serves to highlight the image being viewed.  Lightbox Plus captures the image title for display in the overlay.  Lightbox Plus is able to lightbox images displayed using WordPress build in gallery. 

Lightbox Plus uses WordPress's built in jQuery library.

Read the FAQ first if you are having problems.  

= Lightbox Plus <em>NOW</em> works with WordPress' built in gallery feature. =

I'm happy to say Lightbox Plus now works with WordPress' built in gallery.  This has been the most requested feature by far.  There are few simple requirements however.  You you must set <strong>Link thumbnails to: Image File</strong> or use <code>[gallery link="file"</code> for the gallery options.  You must check <em>Use For WP Gallery</em> box under <stong>Other Lightbox Plus Settings</strong>

= IMPORTANT 1.5+ UPGRADE INFORMATION =
See the change log for information regarding this upgrading to version 1.5 of Lightbox Plus.  There are significant differences from previous versions.

= IMPORTANT 1.6.6+ UPGRADE INFORMATION =
Must have WordPress 2.8+ and the `wp_footer()` hook for Lightbox Plus to work correctly from 1.6.6 forward.  If using and older version of WordPress please continue using version 1.6.3 of Lightbox Plus.  Lightbox Plus will stop working if `wp_footer()` does not exist in the template.  See `/wp-content/themes/default/footer.php` for an example of how to place it.

= Usage =

Note that getting the caption to appear in the overlay image by using the caption options built into WordPress Lightbox Plus uses the image title which is generated by "Edit Image Title" field and not the "Edit Caption Field."  You can also manually add lightbox tags to your images using the following instructions.

1. Add a rel="lightbox[uniqueID|filename]" attribute to any link tag to activate the lightbox, include a name between square brackets in the rel attibute. For example:

        <a href="images/image-1.jpg" rel="lightbox[uniqueID|filename]" title="my caption">image #1</a>

Optional: Use the title attribute if you want to show a caption.

2. If you have a set of related images that you would like to group, follow step one but additionally include a group name between square brackets in the rel attribute. For example:

        <a href="images/image-1.jpg" rel="lightbox[roadtrip]">image #1</a>
        <a href="images/image-2.jpg" rel="lightbox[roadtrip]">image #2</a>
        <a href="images/image-3.jpg" rel="lightbox[roadtrip]">image #3</a>

== Installation ==

1. Extract lightbox-plus.zip to your `wp-content/plugins` directory.
2. In the admin panel under plugins activate Lightbox Plus.
3. In the admin panel under Design/Appearance click on Lightbox Plus to configure to your taste.
4. It should now be completely set up and functional

= Upgrade Issues =
* 1.5.X upgrades are not always properly removing old styles, JavaScript  and image files
 * <em>Issue Fixed:</em> Well, mostly, as of version 1.5.2 the reset button will remove the old files <em>assuming</em> the permissions are set correctly.
* 1.5.X upgrades are sometimes failing
 * <em>Workaround:</em>Remove the plugin and install a new copy.  Use the reset button afterwards to remove old setting and instantiate new ones.

= Caveats =

Flash (i.e. YouTube videos, etc.) will sit atop the Lightbox Plus display no matter what the z-index is.  This is an issue with Flash.

See <a href="http://go.adobe.com/kb/ts_tn_15523_en-us">Flash content displays on top of all DHTML layers</a> at Adobe for details.

To work around this issue you will need to add something like the following to your <code>&lt;param /&gt;</code> and <code>&lt;embed&gt;&lt;/embed&gt;</code> tags:
<code>

        &lt;object&gt;&lt;param name="wmode" value="opaque" /&gt;&lt;embed wmode="opaque" [all other embed settings, file src etc.]&gt;&lt;/embed&gt;&lt;/object&gt;
</code>

== Frequently Asked Questions ==

= I can't get Lightbox Plus to work, why not? =

The problem may be with your Wordpress theme, mangling image display properties. Try using another theme, that doesn't interfere with posted images.  You may be lacking <code>wp_footer()</code> function in your <code>footer.php</code> of your Wordpress theme.  Look at the default theme to see how it is implemented.

Alternately you may have other plugins that conflict with Lightbox Plus. Try disabling your other plugins and see if that helps. If it does, re-enable each plugin, one at a time to see which one is causing the conflict.  Please let me know which plugin is causing the problem.

Finally, it seems that recent version of WordPress (or perhaps the plugin is causing this in some way I am not aware of) do not automatically add the link to the full size image.  You must also make sure that when you are adding an image from the WordPress media dialog control you must make sure there is a link to the image in the Link URL field.  The easiest way to get the correct link is to click on the link to image button beneath the field.  <a href="http://www.23systems.net/wp-content/uploads/2008/07/file.png">Visual depiction</a> of what is required when adding images in order for lightbox to function correctly.

= Lightbox Plus doesn't work properly in browser X, Y, or Z (Chrome, Safari, Firefox, Opera, Explorer 6, 7, etc)? =

Yes it does, the problems are the same as above.  It has been tested in Firefox 2, 3, Safari 3, 4, Opera 9, 10, Chrome 1, 2, Internet Explorer 6, 7, 8 on Windows and Firefox 2, 3, Safari 3, 4 and Opera 9 on OS X and Firefox 2, 3, Opera 9, and Konqueror on Linux.

= Can I use this plugin and Lightview Plus, Lightbox 2 (either one), WP lightbox JS Plugin at the same time? =

No other lightbox plugins can be used, they will most likely interfere with each other as they all modify the image URLs.  Other image overlay plugins may possibly be compatible.

= Can I add my own styles and images for the overlay? =

Yes, you can easily create additional styles by adding a new folder to the CSS directory under <code>wp-content/plugins/lightbox-plus/css/</code> by duplicating and modifying any of the existing theme folders or using them as examples to create your own.

= How does Lightbox Plus differ from other Lightbox plugins for WordPress? =

Performance wise the ColorBox jQuery plugin is smaller and generally faster and has more options than most lightbox JavaScript plugins.  The regular expressions that handle the text are more robust handling a wider variety of characters and in addition it will also grab the image title from the image to use for the overlay image caption.

= Does Lightbox Plus work with WordPress' built in gallery =

Yes it does.  There are few simple requirements however.  You you must set <strong>Link thumbnails to: Image File</strong> or use <code>[gallery link="file"</code> for the gallery options.  You must check <em>Use For WP Gallery</em> box under <stong>Other Lightbox Plus Settings</strong>

= When resetting/re-initializing LBP the setting do not appear correctly when the page reloads, what gives? =

This problem is only apparent in Chrome and Opera.  It seems to works fine in Internet Explorer, Firefox and Safari.  There are some browser related issues and I am investigating the problem at this time.  For Chrome the settings are being saved but not displayed immediately, click on the Lightbox Plus link under appearance and you will see the current settings.  Opera for whatever reason is completely failing to save re-initialization settings, you must manually set and save them or use another browser.  And, no, it doesn't make sense since it's server side activity.

= Additional FAQs from Colorbox =

= ColorBox is positioned incorrectly or behaving strangely in Internet Explorer =

This is likely a doctype issue. ColorBox requires a valid doctype and rendering in quirks mode is not supported. Make sure you are using the full doctype declaration to insure rendering in standards mode.

This abbreviated doctype renders the document in quirks mode for Internet Explorer: <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

The doctype with URI renders in standards mode for all browsers: <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

For more information, see A List Apart's <a href="http://www.alistapart.com/articles/doctype/">primer on doctypes</a>.

= ColorBox's borders do not display in Internet Explorer =

Some of the example styles provided make use of transparent .PNG files. Alpha transparencies aren't supported by default in IE6, and can cause an undesirable 'black halo' effect in IE7 and IE8 when changing their opacity. ColorBox resolves this by using one of IE's CSS filters. You can see these at the bottom of colorbox.css. The filter src paths are relative to the HTML document (just like an IMG element), while CSS background image paths are relative to the CSS document. In the examples I provide the relative path is the same, but users often change the directory structure once they move the files over to their own host. The filter src path needs to reflect this change with the appropriate relative path or an absolute path. Here is an example that assumes the 'images' folder is in the root directory:

Original CSS with incorrect relative path: .AlphaImageLoader(src=images/internet_explorer/borderTopLeft.png

Corrected relative path: .AlphaImageLoader(src=/images/internet_explorer/borderTopLeft.png

Corrected absolute path: .AlphaImageLoader(src=http://your_domain.com/images/internet_explorer/borderTopLeft.png

= Other Problems =

If you have read and tried the above and you are still having problems, then, please post your issues, in detail (links, error messages) to my site.

<a href="http://www.23systems.net/plugins/lightbox-plus/">http://www.23systems.net/plugins/lightbox-plus/</a>

= Known Problems =

* Reset re-initialize doesn't appear to work in some browsers.  It does in fact work, however, the changes are not reflect on the page.
* In some instances performance may be slow in IE - this may be due to plugin conflicts or slow JavaScript performance in IE. 

= Plugin Conflicts =

* Flickr Mini Gallery - Verified.  Download hot fix for <a href="http://23systems.net/downloads/file/flickr-mini-gallery-jquery-hotfix.zip">Flickr Mini Gallery</a> (includes instructions)
* Tabbed Widgets - Verified
* DMSGuestbook - Un-verified
* Gengo - Un-verified

Note: These conflicts may now be mitigated as of version 1.6.3.

== Screenshots ==

1. Lightbox Plus

== Change Log ==

= 1.6.9.7 =
* Fixed auto-lightbox breaking links that contained manually created `rel="lightbox[]"` attributes.

= 1.6.9.6 =
* Skipping of auto-lightboxing of second image when image links were next to each other in html source should be fixed. At least in my testing.
* Fixed do not display image titles to work with text links.
 * Note - must already not have title tag in links elements. 
* Fixed ability to use class method in text only links and gallery. 
* Added ability to specify the class name used with class method.  Defaults to cboxModal for the class.
* Changed jQuery implementation of colorbox on the page to both reduce size and prepare for allowing two different colorboxes. (see Road Map) 

= 1.6.9.5 =
* No really, the IE problems should be resolved.
 * Correctly handle new settings when empty to render correct JavaScript on output - was causing IE to not display lightbox and wierd sliding effect on lightbox in all browsers.
 * Fixed invalid function call that would prevent older versions of IE (7 or less) from rendering lightbox at all.  
* Fixed issue that if admin was being accessed via SSL you could not save settings.
* Fixed some skipping of images being auto-lightboxed.  May not resolve all issues - please let me know at <href="http://www.23systems.net/bbpress/forum/lightbox-plus">Lightbox Plus Suport</a>.

= 1.6.9 =
* Fixed problem with styles in IE 6/7/8 not working under various circumstnaces (hopefully)
* Added the option to disable Lightbox Plus from adding it's own styles allowing the user to place Lightbox/Colorbox styles in their theme stylesheet and reduce number of files loading. 
                                                                                                                                                                                         
= 1.6.8 =
* Fixed duplicate `rel=lightbox[]` tags being generated.
* Fixed IE 6 specific stylesheets - should provide correct headers for php based css documents.
 * AlphaImageLoader should automatically be configure for old verions of IE - 6 or less
* As of this version IE 6 or less are no longer supported.
 * If you are using IE 6 or less it is recommended that you upgrade your browser.   
* Added option to auto-lightbox text links to images
* Added additional width and height options
 * width - can set a fixed total width. This includes borders and buttons.
 * height	- can	set a fixed total height. This includes borders and buttons.
 * innerWidth - This is an alternative to 'width' used to set a fixed inner width. This excludes borders and buttons.
 * innerHeight - This is an alternative to 'height' used to set a fixed inner height. This excludes borders and buttons.
 * initialWidth	- can set the initial width, prior to any content being loaded.
 * initialHeight - can set the initial height, prior to any content being loaded.
* Updated `admin.css` and `admin-html.php` to correct a top level class that may effect global styles.
* Now works correctly with WordPress MU
 * Tested with WordPress MU 2.9.2   
* Degradation of performance in Firefox corrected.  May still occur in older versions
 * Note: with the release of Firefox 3.0.19 the 3.0.x branch of Firefox will reach its end of life on March 30, 2010 
 
= 1.6.7 =
* Added fix to auto-lightbox images that are missing title attributes (Thanks J�rn)
 * This primarily affects images that were placed using older verisons of WordPress
* Interface updates
 * Changed admin panel to work that same way as my other plugins and thereby ease code maintainence 
 * Quick links in plugins list
 * Added additiona support and FAQ links to admin panel 
* Readme and faq update
* Actually includes ColorBox 1.3.6 which some how was replaced by 1.3.1 in last release (1.6.6) for which I apologize.
* Includes `lightbox-plus.pot` for language translations for interested parties.     

= 1.6.6 =
* Tested with WordPress 2.9.1
 * Only works with WordPress 2.8+ due to the use of the `$in_footer` parameter used in the `wp_enqueue_script()` function. 
* Moved all possible JavaScript to the footer to improve load speed
 * Requires theme has the `wp_footer()` hook
* Cleaned up jQuery call to correctly work in no conflict mode per definition. 
* Updated Colorbox to 1.3.6 which include the following fixes
 * Small change to make Colorbox compatible with jQuery 1.4
 * Fixed a bug introduced in 1.3.4 with IE7's display of example 2 and example 3, and auto-width in Opera.
 * Fixed a bug introduced in 1.3.4 where colorbox could not be launched by triggering an element's click event through JavaScript.
 * Minor refinements.
 * Event delegation is now used for elements that ColorBox is assigned to, rather than individual click events.
 * Additional callbacks have been added to represent other stages of ColorBox's lifecycle. Available callbacks, in order of their execution: `onOpen`, `onLoad`, `onComplete`, `onCleanup`, `onClosed` These take place at the same time as the event hooks, but will be better suited than the hooks for targeting specific instances of ColorBox.
 * Ajax content is now immediately added to the DOM to be more compatible if that content contains script tags.
 * Focus is now returned to the calling element on closing.
 * Fixed a bug where `maxHeight` and `maxWidth` did not work for non-photo content.
 * Direct calls no longer need `'open:true'`, it is assumed.  Example: `$.fn.colorbox({html:"<p>Hi</p>"});`
 * Changed `$.fn.colorbox.element()` to return a jQuery object rather the DOM element.
 * jQuery.colorbox-min.js is compressed with Google's Closure Compiler rather than YUI Compressor.
 * Added `'innerWidth'` and `'innerHeight'` options to allow people to easily set the size dimensions for ColorBox, without having to anticipate the size of the borders and buttons.
 * Renamed `'scrollbars'` option to `'scrolling'` to be in keeping with the existing HTML attribute.  The option now also applies to iframes.
 * Bug fix: In Safari, positioning occassionally incorrect when using '100%' dimensions.
 * Bug fix: In IE6, the background overlay is briefly not full size when first viewing.
 * Bug fix: In Firefox, opening ColorBox causes a split second shift with a small minority of webpage layouts.
 * Simplified code in a few areas.
* Special thanks for navjotjsingh for the include, excude fix for WordPress built in gallery

= 1.6.3 =
* Eliminated conflict with Featured Content plug-in
 * Removed `jQuery.noConflict()` due to poor implementation on my part.
 * Kept `$lbp` jQuery variable.
* jQuery conflicts should all be resolved - hopefully.
* Minor modification to `wp_enqueue_script` function cal to include colorbox version.
* Now works with WordPress Mu if `rel=lightbox[]` is added manually.
 * Working on solving auto lightboxing issues with WordPress Mu 

= 1.6.2 =
* Added `jQuery.noConflict()` to the initiator to hopefully eliminate issues with other jQuery libraries loading and causing conflicts.
 * Changed jQuery `$` variable to `$lbp` to give a unique constructor.
* Added replacement shortcode gallery method to allow Lightbox Plus to work with shortcode galleries called via the `echo do_shortcode('[gallery link="file" size="thumbnail"]');` method in templates.
 * Replacement shortcode gallery function automatically adds `rel="lightbox"` or `class="cboxModal"` as selected in options.
* Added code to automatically cleanup doubled title tags from shortcode galleries.
* Added quicklinks to the plugin listing on the plugin page.
* Some minor UI tweaks to the admin page.

= 1.6.1 =
* Fixed IE display issues for elegant and shadowed themes.
 * Should now correctly grab path to images for IE 6/7/8
* Re-added additional simple styles blue, green, grey, purple, red, teal, yellow in addition to balck and white
  * Fixed prev/next buttons in simple styles to only display when cursor hovers over left or right of image.

= 1.6 =
* Added the much requested feature for Lightbox Plus to work with WordPress' built in gallery
 * Added checkbox to select whether to use with WP built in gallery. 
* Updated LightBox Plus to use new version of ColorBox
* Updated ColorBox to version 1.3.1 with the following changes
  * Removed the IE-only stylesheets and conditional comments.  All CSS is handled by a single CSS file for all examples.
  * Removed user-agent sniffing from the js and replaced it with feature detection.  This will allow correct rendering for visitors masking their agent type.
  * Added `$.fn.colorbox.resize()` method to allow ColorBox to resize it's height if it's contents change.
  * Added `scrollbars` option to allow users to turn off scrollbars when using the `resize()` method.
  * Renamed the `resize` option to be less ambiguous.  It's now `scalePhotos`.
  * Renamed the `cbox_close` event to be less ambiguous.  It's now `cbox_cleanup`.  It is the first thing to happen in the close method while the 'cbox_closed' event is the last to happen.
  * Fixed a bug with the slideshow mouseover graphics that appeared after ColorBox is opened a 2nd time.
  * Fixed a bug where ClearType may not work in IE 6 & 7 if using the fade transition.
  * Minor code optimizations to increase compression.
* Minor corrections to admin interface.

= 1.5.5 =
* Updated additional code that didn't make it into 1.5.4 to use less memory and run faster
* Separated the admin panel output to a separate file
 * Added some custom admin panel styles
 * Cosmetic changes to admin panel

= 1.5.4 =
* Fixed bug where titles were being broken when DO NOT USE TITLE was checked.
* Fixed issue with limited character sets - should allow any characters in the title (diacritics, umlauts, etc.)
* Optimized code to use less memory and run faster
* Updated ColorBox to version 1.2.9
* No new features at this time

= 1.5.3.1 =
* Fixed bug causing plugin not to use correct stylesheet on initial install or reset. It was pointing to a non exsitent style (shadow instead of shadowed.)

= 1.5.3 =
* Added class based option.
 * If options is checked, Lightbox Plus will only lightbox images via class: cpModal attribute. 
 * Using this method you can manually control which images are affected by Lightbox Plus by adding the cpModal class the image link URL and checking the Don't Auto-Lightbox Images option. 
* Added option to not automatically add attributes required for Lightbox Plus to work.  This allows for more manual image control.
* Added option not to display image titles.
* Updated ColorBox to version 1.2.5

= 1.5.2 =
* Reset/re-initialize button on the plugin page will now remove the old files that were not removed during upgrade to 1.5.x from pre 1.5 versions.
* Fixed the slideshow timing to display and save correctly - any amountof time over 5000 milliseconds was displaying as 13000 milliseconds.
* Miscellaneous cosmetic fixes and text adjustments

= 1.5.1 =
* Fixed the need to have <code>class="imagebox"</code> added to image links

= 1.5 =
* Rebuilt Lightbox Plus to utilize ColorBox for its image overlay functions
 * Supports photos, photo groups, slideshow, ajax, inline, and iframed content.
 * Appearance is completely controlled through CSS so users can restyle the box.
 * Written in jQuery plugin format and can be chained with other jQuery commands.
 * Generates W3C valid XHTML and CSS, adds no JS global variables & passes JSLint.
* <strong>README!</strong> - If you are upgrading from a previous version you will need to reset your Lightbox Plus settings as they have all changed and the old values are no longer useful.
* <strong>README!</strong> - There is a reset button that will remove your old options and replace them with the new options, Lightbox Plus will act funny until you either reset it or update the settings.
* <strong>README!</strong> - If you have custom styles back them up before proceeding.  You will need to convert them to the new directory and ColorBox format to use them again.
* <strong>README!</strong> - Only the black and white existing styles have been ported to the new format, it is very easy to convert any of the other color styles to the new format.
* Added reset button to allow for resetting to default settings.
* Tested In: Firefox 2, 3, Safari 3, 4, Opera 9, 10, Chrome 1, 2, Internet Explorer 6, 7, 8.

= 1.4 =
* There is no version 1.4

= 1.3.4 =
* Updated to work with WordPress 2.8

= 1.3.3 =
* Fixed another problem with JavaScript error causing script not to work correctly.

= 1.3.2 =
* Fixed problem with JavaScript error on IE7.
* Added some additional color styles.

= 1.3.1 =
* Updated lightbox.js to allow better control from the admin panel - lightbox was failing sometimes due to duplicate JavaScript.

= 1.3.0 =
* Added ability to configure Lightbox options from the admin panel
* Initializes base options on load
* Modified and rewrote code for better readability and functionality

= 1.1.1 =
* Moved admin panel under Design/Appearance
* Minor code formatting for better readability

= 1.1.0 =
* Fixed absolute pathing - should now work in blog residing in subdirectories
* Rolled code into class structure

= 1.0.1 =
* Modifications to regular expression usage for image linking

= 1.0 =
* Initial release

== Road Map ==

1. Ability add secondary colorbox with full set of controls so that you can auto lightbox images and add a second set of iframed or inline) content. Version 1.7
2. Ability to place iframed content (flash video, html pages, inline content) on a per item basis using secondary colorbox. Version 1.7.
3. Add languages for which I have completed translations. Verision 1.8
4. Solicit and implement additional language translations. Verision 1.8


== Special Thanks ==

Dirk Schmitz (for pointing out an obvious bug that I kept overlooking), Ken Williams (for testing version 1.5), <a href="http://www.melaniesallis.com">Melanie Sallis</a> for needing a lightbox for her site which prompted me to create this plugin, <a href="http://www.colorpowered.com">Jack Moore</a> for creating the awesome jQuery plugin, ColorBox, and everyone who has contributed to the support in developing this plugin.