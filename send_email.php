<?php
// Start a session
session_start();
$is_logged_in = isset($_SESSION['username']);

// Check if user is logged in
if (!$is_logged_in) {
    header("Location: LoginPage.php");
    exit();
}

// Set recipient email address
$to = "wyatthardy508@gmail.com"; // change this when done testing 

// Get form data and sanitize inputs
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$moreInfo = isset($_POST['moreInfo']) ? filter_var($_POST['moreInfo'], FILTER_SANITIZE_STRING) : '';
$otherSubject = isset($_POST['otherSubject']) ? filter_var($_POST['otherSubject'], FILTER_SANITIZE_STRING) : '';
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Set email subject
$email_subject = "New Contact Form Submission From " . $_SESSION['username'];

// Construct HTML email message
$body = "<html><body>";
$body .= "<h2 style='color: #333;'>New Contact Form Submission</h2>";
$body .= "<p><strong>Email:</strong> $email</p>";
$body .= "<p><strong>Subject:</strong> ";
if ($subject !== "Other") {
    $body .= $subject;
} else {
    $body .= $otherSubject;
}
$body .= "</p>";
if (!empty($moreInfo)) {
    $body .= "<p><strong>More Info:</strong> $moreInfo</p>";
}
$body .= "<p><strong>Message:</strong><br>$message</p>";
$body .= "<br><hr><p style='font-size: 12px; color: #777;'>This message was sent from your website's contact form.</p>";
$body .= "</body></html>";

// Set headers for HTML email
$headers = "From: <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";

// Send email
$mail_sent = mail($to, $email_subject, $body, $headers);

// Redirect page
if ($mail_sent) {
    header("Location: Status.php?page=Contact&status=success");
    exit();
}else{
    header("Location: Status.php?page=Contact&status=error");
    exit();
}
?>
