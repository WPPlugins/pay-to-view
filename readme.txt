=== Plugin Name ===
Contributors: michaelighattas
Tags: adblocker, block adblock, adblock, fight adblock, micropayments
Requires at least: 3.0
Tested up to: 4.7
Stable tag: 3.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Increase your website's content revenue by monetizing revenue lost due to ad-block users with out advanced detection, analytics and monetization platform.

== Description ==

Pelcro prompts ad-block users to subscribe to a monthly subscription to access an ad-free experience. We detect users across all our partner sites, ad-block users will only need to sign up once. Users will get charged a monthly fee of $1.99 after a one month free trial. 90% of revenue collected from your site will be sent to your bank account on a monthly basis,the remaining 10% is split between our cut, any partners involved in the transaction, and the payment processor fees.

The plugin enables a default popup, visit our site at https://www.pelcro.com and sign up to be able to create your own custom popup. You will be able to customize the message and design displayed in the popup. Its very simple and will take you a few minutes to customize. Content will still be indexed and visible by search engines, so its completely SEO friendly. NOTE: The plugin embeds a minified JS into the footer of all pages instead of referencing an external file that can be blocked by ad-block.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/pay-to-view` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Pay-to-view screen to configure the plugin
4. Click on Customize Popup or visit https://www.pelcro.com to register site and customize popup 
5. Copy Site ID from Integration Page and place in the Site ID field in the settings page

Please email support@pelcro.com for questions. 


== Frequently Asked Questions ==

= Whats your fee?

For a typical transaction 90% goes to the beneficiary. The remaining 10% is split between our cut, any partners involved in the transaction, and the payment processor fees.

= How do I withdraw my money?

Directly to your bank account. This works worldwide as long as your bank accepts international bank transfers.

= What type of payment can a adblock user use?

We support VISA and Mastercard and plan to support bitcoin soon.

== Screenshots ==

1. This is how the popup will look like on a desktop
2. This is how the popup will look like on mobile
3. You will need to register on our site to get a site ID
4. This is how your dashboard will look like
5. This page will contain your site ID

== Changelog ==

= 3.0.2 =
* Improved: Code structure

= 3.0.1 =
* Changed branding and info about the plugin

= 3.0.0 =
* New way of integrating JS file

= 2.6.0 =
* Modified: back to an external reference to JS file

= 2.5.1 =
* Modified robots.txt file

= 2.5.0 =
* Added robots.txt to avoid indexing JS links

= 2.4.0 =
* Added new version of JavaScript

= 2.3.0 =
* Added functionality to customize test urls
* Removed site id obfuscation

= 2.2.0 =
* Upgraded the popup design to make it more consistent and improved design

= 2.1.2 =
* Fixed: Bug with subscribed users and ad-block detection

= 2.1.1 =
* Fixed: Issue that caused a video ad to display
* Added: New Adblock detection mechanism for certain sites.

= 2.1.0 =
* Fixed: Easy list added a filter to allow all local js on Hulkusc, so we used its real ad sources to detect

= 2.0.9 =
* Fixed: New scalable and more reliabe mechanism to detect adblock.

= 2.0.8 =
* Fixed: Improved ad detection mechanism

= 2.0.7 =
* Fixed: Bug with google_jobrunner adblock detection method.

= 2.0.6 =
* Fixed: bug with the pixel initialization

= 2.0.5 =
* Modified: default popup when ad-block blocks the site specific popup

= 2.0.4 =
* Fixed: bug with the cookie domain.

= 2.0.3 =
* Embeded minified JS into the footer of all pages so that ad-block can't block it
* New strategy to detect ad-block users implemented

= 2.0.2 =
* Updated readme to include more instructions

= 2.0.1 =
* Embeded script into the footer directly to avade adblock

= 2.0.0 =
* Changed the script link to httpsfairweb-4313.kxcdn.com

= 1.1 =
* Changed the script link to CDN for faster performance 

= 1.0 =
* Insert script into wordpress site
* Button that links to pelcro.com
* Field to insert new Site ID

== Upgrade Notice ==

= 3.0.2 =
* Improved: Code structure

= 3.0.1 =
* Changed branding and info about the plugin

= 3.0.0 =
* New way of integrating JS file

= 2.6.0 =
* Modified: back to an external reference to JS file

= 2.5.1 =
* Modified robots.txt file

= 2.5.0 =
* Added robots.txt to avoid indexing JS links

= 2.4.0 =
* Added new version of JavaScript

= 2.3.0 =
* Added functionality to customize test urls
* Removed site id obfuscation

= 2.2.0 =
* Upgraded the popup design to make it more consistent and improved design

= 2.1.2 =
* Fixed: Bug with subscribed users and ad-block detection

= 2.1.1 =
* Fixed: Issue that caused a video ad to display
* Added: New Adblock detection mechanism for certain sites.

= 2.1.0 =
* Fixed: Easy list added a filter to allow all local js on Hulkusc, so we used its real ad sources to detect

= 2.0.9 =
* Fixed: New scalable and more reliabe mechanism to detect adblock.

= 2.0.8 =
* Fixed: Improved ad detection mechanism

= 2.0.7 =
* Fixed: Bug with google_jobrunner adblock detection method.

= 2.0.6 =
* Fixed: bug with the pixel initialization

= 2.0.5 =
* Modified: default popup when ad-block blocks the site specific popup

= 2.0.4 =
* Fixed: bug with the cookie domain.

= 2.0.3 =
* Update in order to by-pass ad-block blocking our service
* New strategy to detect ad-block users implemented

= 2.0.2 =
* Updated readme to include more instructions

= 2.0.1 =
Embeded script into the footer directly

= 2.0.0 =
Using the CDN url for faster delivery of script and to bypass french adblock list

= 1.1 =
To improve loading speed and bypass adblocker on some adblock lists

== A brief Markdown Example ==

Features:

1. Detect Adblockers
2. Force Adblockers to remove Adblocker or pay-to-view 1 cent per page view
3. Customize popup design
4. Customize info in popup
5. Adblocker stats 

Here's a link to [WordPress](http://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: http://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
