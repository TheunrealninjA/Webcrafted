<?php
// Set recipient email address
$to = "wyatthardy508@gmail.com";

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = isset($_POST['address']) ? $_POST['address'] : '';
$postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';
$subject = $_POST['subject'];
$moreInfo = isset($_POST['moreInfo']) ? $_POST['moreInfo'] : '';
$otherSubject = isset($_POST['otherSubject']) ? $_POST['otherSubject'] : '';
$message = $_POST['message'];

// Set email subject
$email_subject = "New Contact Form Submission";

// Construct email message
$body = "Name: $name"."\r\n | ";
$body .= "Email: $email"."\r\n | ";
if (!empty($address)) {
    $body .= "Address: $address"."\r\n | ";
}
if (!empty($postcode)) {
    $body .= "Postcode: $postcode"."\r\n | ";
}
$body .= "Subject: ";
if ($subject !== "Other") {
    $body .= $subject;
} else {
    $body .= $otherSubject;
}
$body .= "\r\n | ";
if (!empty($moreInfo)) {
    $body .= "More Info: $moreInfo"."\r\n | ";
}
$body .= "Message: " ."\r\n". "$message | ";

// Set headers
$headers = "From: $name <$email>";
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Send email
$mail_sent = mail($to, $email_subject, $body, $headers);

// Redirect back to the form page with a success message
if ($mail_sent) {
    header("Location: Status.php?status=success");
} else {
    header("Location: Status.php?status=error");
}
