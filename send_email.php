<?php
// Start a session
//include 'PHPScripts/session_manager.php';

// $is_logged_in = isset($_SESSION['username']);

// // Check if user is logged in
// if (!$is_logged_in) {
    //     header("Location: Login.php");
    //     exit();
    // }
require_once __DIR__ . '/recaptcha-master/src/autoload.php';

function redirectWithStatus($status)
{
    header("Location: ContactUs.php?status=$status");
    exit();
}

$gRecaptchaResponse = $_POST['g-recaptcha-response'];
$secret = '6Ldv2DUqAAAAAMxohMkkHwT90vWDgkh_nxf_s7Eh';
$remoteIp = $_SERVER['REMOTE_ADDR'];

if (!isset($gRecaptchaResponse) || empty($gRecaptchaResponse)){
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);
    $resp = $recaptcha->setExpectedHostname('webcrafted.pro')
        ->verify($gRecaptchaResponse, $remoteIp);

    if (!$resp->isSuccess()) {
        $errors = $resp->getErrorCodes();
        redirectWithStatus('robot');
    }else{
        redirectWithStatus('misrobot');
    }    
}    
    
// Set recipient email address
$to = "wyattd@webcrafted.pro"; // change this when done testing 

// Get form data and sanitize inputs
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars($_POST['subject']);
$moreInfo = isset($_POST['moreInfo']) ? htmlspecialchars($_POST['moreInfo']) : '';
$otherSubject = isset($_POST['otherSubject']) ? htmlspecialchars($_POST['otherSubject']) : '';
$message = htmlspecialchars($_POST['message']);

// // Set email subject
$email_subject = "New Contact Form Submission From " . htmlspecialchars($_SESSION['username']);

// Construct HTML email message
$body = '<html><body style="background-color: rgb(10, 10, 10); background-size: 80px 80px; background-image: linear-gradient(to right, rgb(32,32,32) 1px, transparent 1px), linear-gradient(to bottom, rgb(32,32,32) 1px, transparent 1px);">';
$body .= '<img style="text-align: center;" src="https://webcrafted.pro/images/MiniWCLogo.webp" alt="WebCrafted.Pro Logo">';
$body .= '<h2 style="color: #fff;">New Contact Form Submission</h2>';
$body .= '<p style="color: #fff;"><strong>Email:</strong>'. $email .'</p>';
$body .= '<p style="color: #fff;"><strong>Subject:</strong>';
if ($subject !== "Other") {
    $body .= $subject;
} else {
    $body .= $otherSubject;
}
$body .= "</p>";
if (!empty($moreInfo)) {
    $body .= '<p><strong>More Info:</strong> $moreInfo</p>';
}
$body .= '<p style="color: #fff;"><strong>Message:</strong><br>'. $message .'</p>';
$body .= '<br><hr><p style="font-size: 12px; color: #777;">This message was sent from your website`s contact form.</p>';
$body .= '</body></html>';

// Set headers for HTML email
$headers = "From: <$email>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";

// Send email
$mail_sent = mail($to, $email_subject, $body, $headers);

// Redirect page
if ($mail_sent) {
    redirectWithStatus('success');
}else{
    redirectWithStatus('error');
}