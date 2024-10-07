<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>

<?php
// Server-side validation (optional)
// You can add code here to validate user input before sending the email

// Configure your email settings
$to = 'grids@microtronic.biz'; // Recipient email address
$subject = 'Website Contact Form - ' . $_POST['subject']; // Subject of the email
$message = 'Name: ' . $_POST['name'] . "\r\n";
$message .= 'Email: ' . $_POST['email'] . "\r\n";
$message .= 'Message: ' . $_POST['message']; // Body of the email
$headers = 'From: contact@microtronic.biz' . "\r\n" . // Sender email address
  'Reply-To: ' . $_POST['email'] . "\r\n" .
  'Content-Type: text/plain; charset=UTF-8'; // Content type

// Send the email
if (mail($to, $subject, $message, $headers)) {
  echo 'Your message has been sent. Thank you!';
} else {
  echo 'There was an error sending your message. Please try again later.';
}
?>