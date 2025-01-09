<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '../recaptcha-master/src/autoload.php';

function redirectWithStatus($status)
{
    header("Location: index.php?status=$status");
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
$to = "wyattd@webcrafted.pro";

// Get form data
$name = htmlspecialchars($_POST['name']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
$postcode = isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode']) : '';
$subject = htmlspecialchars($_POST['subject']);
$moreInfo = isset($_POST['moreInfo']) ? htmlspecialchars($_POST['moreInfo']) : '';
$otherSubject = isset($_POST['otherSubject']) ? htmlspecialchars($_POST['otherSubject']) : '';
$message = htmlspecialchars($_POST['message']);

// Set email subject
$email_subject = "New Contact Form Submission From" . $name;

// Construct email message
$body = '<html><body style="background-color: #9cb1d0;">';
$body .= '<div style="text-align: center; padding: 5px; width: 100%;">';
$body .= '<div style="display: flex; justify-contents; center; align-items: center; width; 75%; border-radius; 10px; background-color: #fff; margin: 0 auto; padding: 10px;">';
$body .= '<img src="https://klcgroup.co.uk/Images/Company%20Logo.webp" alt="WebCrafted.Pro Logo">';
$body .= '<h2 style="color: #000;">New Contact Form Submission</h2>';
$body .= '<p style="color: #000;"><strong>Name: </strong>'. $name .'</p>';
$body .= '<p style="color: #000;"><strong>Email: </strong>'. $email .'</p>';
if (!empty($address)) {
    $body .= '<p style="color: #000;"><strong>Address: </strong>' . $address . '</p>';
}
if (!empty($postcode)) {
    $body .= '<p style="color: #000;"><strong>Postcode: </strong>'. $postcode .'</p>';
}
$body .= '<p style="color: #000;"><strong>Subject: </strong>';
if ($subject !== "Other") {
    $body .= $subject;
} else {
    $body .= $otherSubject;
}
$body .= "</p>";
if (!empty($moreInfo)) {
    $body .= '<p style="color: #000;"><strong>More Info:</strong>' . $moreInfo . '</p>';
}
$body .= '<p style="color: #000;"><strong>Message: </strong><br>'. $message .'</p>';
$body .= '<br><hr><p style="font-size: 12px; color: #252525;">This message was sent from your website`s contact form.</p>';
$body .= '</div></div></body></html>';

// Set headers
$headers = "From: <$email>";
$headers .= "Reply-To: $email";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";

// Send email
$mail_sent = mail($to, $email_subject, $body, $headers);

// Redirect back to the form page with a success message
if ($mail_sent) {
    redirectWithStatus('success');
} else {
    redirectWithStatus('error');
}
