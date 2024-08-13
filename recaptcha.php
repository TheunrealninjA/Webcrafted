<?php
  
// Checking valid form is submitted or not
if (isset($_POST['submit_btn'])) {
    
    // Storing name in $name variable
    $name = $_POST['name'];
  
    // Storing google recaptcha response
    // in $recaptcha variable
    $recaptcha = $_POST['g-recaptcha-response'];

    // Put secret key here, which we get
    // from google console
    $secret_key = '6LcKgCQqAAAAAJOpBQVpdwylsOUheCPP2vlmRtwm';

    // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;

    // Making request to verify captcha
    $response = file_get_contents($url);

    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);

    // Checking, if response is true or not
    if ($response->success == true) {
        echo 'Google reCAPTACHA verified';
    } else {
        echo 'Error in Google reCAPTACHA';
    }
}

?>