<?php
// Replace with your actual email address
$receiving_email_address = 'aronyom22@gmail.com';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Collect form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate form data
  if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
    // Prepare email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Create email body
    $email_body = "
      <html>
      <head>
        <title>$subject</title>
      </head>
      <body>
        <h2>$subject</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
      </body>
      </html>
    ";

    // Send the email
    if (mail($receiving_email_address, $subject, $email_body, $headers)) {
      echo "Your message has been sent successfully.";
    } else {
      echo "Sorry, something went wrong. Please try again.";
    }
  } else {
    echo "Please fill out all fields.";
  }
} else {
  die('Invalid request method!');
}
?>
