# Requirements

This extension requires:
* CiviCRM 4.4, 4.6 or higher
* PHP version 5.4 or higher, with the curl extension enabled

# Installation instructions

* Configure CiviCRM extensions parameters (if not done already)
  * go to Administer >> System Settings >> Directories, set the CiviCRM Extensions Directory to a folder that is writable by your web server process
  * go to Administer >> System Settings >> Resource URLs, enter the URL to the above directory

* Install the Sparkpost email extension
  * download the latest release of the extensions in your extensions folder
    * we suggest using: git clone https://github.com/cividesk/com.cividesk.email.sparkpost.git
  * go to Administer >> Customize Data and Screens >> Manage Extensions, and click install for this extension

* Sign-up for a SparkPost account, then:
  * create and verify your sending domain(s) at: https://app.sparkpost.com/account/sending-domains. Within CiviCRM, sending email adresses are managed at:
    * Administer >> Communications >> Organization Address and Contact Info,
    * and Administer >> CiviMail >> From Email Address.

    So if you define 'info@my-nonprofit.org' as a sending address in CiviCRM, you would need to create and verify the domain 'my-nonprofit.org' in SparkPost.

  * create an API key at: https://app.sparkpost.com/account/credentials
    * ATTENTION: the API key you create should at minimum be granted the following persmissions: Transmissions (Read/Write), Sending Domains (Read/Write), Event Webhooks (Read/Write), Metrics (Read-only) and Suppression Lists (Read/Write).
    * However, for the sake of simplicity and in order to account for future updates, we advice you simply grant all permissions to the API key created.

* Setup the SparkPost email extension
  * go to Administer >> System Settings >> Outbound Email (SparkPost)
  * enter the API key created above and click 'Save and Send test email'
  * check the on-screen messages for any error you would need to resolve