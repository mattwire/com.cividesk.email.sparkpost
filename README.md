SparkPost email extension for CiviCRM
=====================================

This extension allows CiviCRM to send emails and process bounces through the SparkPost service.

It was designed with the following goals and/or features:
* be trivial to install and configure, even for the novice users
* self-configure when possible and check that everything is appropriately setup
* integrate as seamlessly as possible within CiviCRM, neatly replacing other email options
* be nimble and fast, and in particular use the REST API rather than SMTP, and use real-time callbacks
* have a 'service provider' mode in which the same SparkPost account can be used for multiple clients
* accurate processing of bounces with in-depth analysis and translation of all bounce codes

Installation instructions
=========================

* Configure CiviCRM extensions parameters (if not done already)
  * go to Administer >> System Settings >> Directories, set the CiviCRM Extensions Directory to a folder that is writable by your web server process
  * go to Administer >> System Settings >> Resource URLs, enter the URL to the above directory
* Install the Sparkpost email extension
  * download the latest release of the extensions in your extensions folder
    * we suggest using: git clone https://github.com/cividesk/com.cividesk.email.sparkpost.git
  * go to Administer >> Customize Data and Screens >> Manage Extensions, and click install for this extension

* Sign-up for a SparkPost account, then:
  * verify your sending domain(s) at: https://app.sparkpost.com/account/sending-domains
  * create an API key at: https://app.sparkpost.com/account/credentials
* Setup the SparkPost email extension
  * go to Administer >> System Settings >> Outbound Email (SparkPost)
  * enter the API key created above and click 'Save and Send test email'
  * check the on-screen message for any error you would need to resolve

Show your support!
==================

Development of this extension was fully self-funded by Cividesk and equated to about 25 hours of work.

You can show your support and appreciation for our work by making a donation at https://www.cividesk.com/pay and indicating 'SparkPost support' as the invoice id.

Suggested donation amounts are _$40 for end-users_, and _$40 per client_ using this extension for service providers. With these suggested amounts, we would need 75 donations just to recoup our development costs.

These donations will fund maintainance of this extension over time and production of other extensions in the future.

Thanks!