<?php
// Display errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
} else {
    echo "No form data submitted.";
}


// if (isset($_POST['Sign_Up'])) {
//     // Get the reCAPTCHA response from the form
//     $recaptcha = $_POST['g-recaptcha-response'];

//     // Google reCAPTCHA secret key
//     $secret_key = '6LefsiUqAAAAAKWekDhAa-FdPlv6n0iu1DIIXuTz';

//     // Check if the recaptcha response is not empty
//     if (!empty($recaptcha)) {
//         // Make the request to verify the reCAPTCHA
//         $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $recaptcha;

//         // Use cURL to make the request instead of file_get_contents
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//         $response = curl_exec($ch);
//         curl_close($ch);

//         // Decode the response
//         $response = json_decode($response, true);

//         // Check if the reCAPTCHA verification was successful
//         if ($response['success'] == true) {
//             echo 'Google reCAPTCHA verified successfully!';
//             // Proceed with the rest of your form processing
//         } else {
//             echo 'Error in Google reCAPTCHA verification.';
//         }
//     } else {
//         echo 'Please complete the reCAPTCHA.';
//     }
// } else {
//     echo 'No form data submitted.';
// }
?>
