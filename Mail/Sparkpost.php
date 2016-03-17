<?php
/**
 * This extension allows CiviCRM to send emails and process bounces through
 * the SparkPost service.
 *
 * Copyright (c) 2016 IT Bliss, LLC
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Support: https://github.com/cividesk/com.cividesk.email.sparkpost/issues
 * Contact: info@cividesk.com
 */

/**
 * Outbound mailer class which calls the SparkPost APIs (SMTP with TLS does not work)
 * @see packages/Mail/smtp.php
 */
class Mail_Sparkpost extends Mail {
  /**
   * Send an email
   */
  function send($recipients, $headers, $body) {
    if (defined('CIVICRM_MAIL_LOG')) {
      CRM_Utils_Mail::logger($recipients, $headers, $body);
      if(!defined('CIVICRM_MAIL_LOG_AND SEND')) {
        return true;
      }
    }

    // Sanitize and prepare headers for transmission
    if (!is_array($headers)) {
      return PEAR::raiseError('$headers must be an array');
    }
    $this->_sanitizeHeaders($headers);
    $headerElements = $this->prepareHeaders($headers);
    if (is_a($headerElements, 'PEAR_Error')) {
      return $headerElements;
    }
    list($from, $textHeaders) = $headerElements;

    $request_body = array(
      'options' => array(
        'open-tracking' => FALSE,  // This will be done by CiviCRM
        'click-tracking' => FALSE, // ditto
      ),
      'recipients' => array(),
    );
    if (CRM_Utils_Array::value('X-CiviMail-Bounce', $headers)) {
      $request_body['metadata'] = array('X-CiviMail-Bounce' => CRM_Utils_Array::value("X-CiviMail-Bounce", $headers));
    }

    // Capture the recipients
    if (!is_array($recipients)) {
      $recipients = array($recipients);
    }
    foreach ($recipients as $recipient) {
      // Format is: a plain email address
      if (substr($recipient, -1) != '>') {
        $request_body['recipients'][] = array(
          'address' => array(
            'email' => $recipient,
          )
        );
      } else {
        // Address is supposed to be RFC822 compliant, but since
        // CRM_Utils_Mail::formatRFC822Email() is doing a shitty job
        // by not using quotes, we cannot use a regexp to decapsulate
        $pos = strrpos($recipient, '<');
        $email = substr($recipient, $pos+1, -1);
        $name = trim(substr($recipient, 0, $pos));
        if (substr($name, 0, 1) == '"') {
          $name = substr($name, 0, -1);
        }
        $request_body['recipients'][] = array(
          'address' => array(
            'name' => $name,
            'email' => $email,
          )
        );
      }
    }

    // Construct the rfc822 encapsulated email
    $request_body['content'] = array(
      'email_rfc822' => $textHeaders . "\r\n\r\n" . $body,
    );

    try {
      $result = CRM_Sparkpost::call('transmissions', array(), $request_body);
    } catch (Exception $e) {
      return new PEAR_Error($e->getMessage());
    }
    return $result;
  }
}