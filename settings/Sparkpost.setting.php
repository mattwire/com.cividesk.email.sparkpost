<?php
/**
 * Settings metadata file.
 */

return array(
  'apiKey' => array(
    'group_name' => 'SparkPost Settings',
    'group' => 'com.cividesk.email.sparkpost',
    'name' => 'apiKey',
    'type' => 'String',
    'html_type' => 'Text',
    'default' => null,
    'add' => '4.3',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'SparkPost REST API key',
    'help_text' => 'You can create API keys at: https://app.sparkpost.com/account/credentials',
  )
);
