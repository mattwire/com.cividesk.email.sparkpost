# Bounce processing

SparkPost monitors bounces and reports those bounces back to CiviCRM. Bounce processing works out of the box without you having to do any configuration.

Although bounce processing works out of the box, SparkPost recommends that you set up a custom bounce domain order to "maintain your sending reputation and ensure the mail you send is branded as your recipients expect".

## Setting a custom bounce domain

A bounce domain is the domain that bounce notification emails are sent to. By default, sparkpost will ask that bounce notifcations get sent to an email address that looks something like longrandomemail@sparkpostbounces.com (the bounce notification address is also known as the 'return path').

Some mail providers might think it is odd that the return path is @sparkpostbounces.com when your emails come from @example.com.  To get around this, you can set up a custom bounce domain so that is more similar to your sending domain. For example, if you are sending mail from example.org, a good choice of bounce domain would be bounces.example.org.

To set up a custom bounce domain:

1. In the sparkpost UI, go to **Account > Sending Domains > Add domain** with your desired bouncing domain.

2. Follow the instructions under 'Set Up For Bounce'.

3. Once the domain has been set up for bouncing, set it as the default bounce domain.

See [SparkPost's documentation on bounce domains](https://www.sparkpost.com/docs/getting-started/getting-started-sparkpost/#custom-bounce-domain) for more information.

## Bounce processing in detail

In case it is helpful for you, here is more detailed walk through of how bounce processing works in the sparkpost extension.

Lets say you trying to deliver an email to joe@example.org, but Joe has left example.org and his email address no longer exists.  First of all the mailserver at example.org will send an email back to the sparkpost notifying them of the fact that the email address does not exist. It sends the email to the bounce address (also known as the 'Return Path').  As soon as sparkpost receives this email, it will in turn report the information back to your CiviCRM installation via a callback URL that the extension automatically configured when you installed it. And hey presto, you can see bounces reported in CiviCRM.
