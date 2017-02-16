# Known issues

## Sending limits

As of April 2016, a *free* SparkPost account allow you to send 100,000 emails per month, but with a quota of 10,000 emails per day. CiviCRM does not have an elegant way to deal with the errors SparkPost will return if you exceed this limit.

So if there are any chances you might send more than 10,000 emails in any 24 hours period, you will need to upgrade to a paid SparkPost account or use a backup mailer (see below).

## Sending domains

Sparkpost will reject any emails send from an unauthorized domain (ie. not added through their console and validated with SPF/DKIM). This can happen in CiviCRM when:
* your staff sometimes use their perosnal email addresses to send email (rather than an organiation's email address').
* emails sent from a Forward Mailing link are sent From: the email of the person that sends the email - this is a core issue, see [#21](https://github.com/cividesk/com.cividesk.email.sparkpost/issues/21) and [CRM-18458](https://issues.civicrm.org/jira/browse/CRM-18458).

In order to alleviate these issues, it is highly recommended that you use and setup a backup mailer. This backup mailer will be used whenever Sparkpost cannot/refuses to send. The backup mailer is configured at the bottom of the Sparkpost configuration screen.