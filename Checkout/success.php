<?php

require '../vendor/autoload.php';

include '../PHPScripts/session_manager.php';
$is_logged_in = isset($_SESSION['username']);

if (!$is_logged_in) {
    header('Location: ../Login.php?status=noaccess');
    exit;
}

\Stripe\Stripe::setApiKey('your-secret-key');

$session_id = $_GET['session_id'] ?? null;
$payment_success = false;

if ($session_id) {
    try {
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        if ($session->payment_status == 'paid') {
            $payment_success = true;
        }
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}

if ($payment_success) {
    // Update SQL server with subscription info
    $servername = "server330.web-hosting.com";
    $username = "webcsosl_Admin";
    $password = "wJFTJo=o=iZ6";
    $dbname = "webcsosl_SignUp";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
    } else {
        $user_email = $_SESSION['email'];

        // Prepare and bind
        $stmt = $conn->prepare("UPDATE users SET subscription = ?, access_level = ? WHERE email = ?");
        $stmt->bind_param("sss", $subscription, $access_level, $user_email);
        
        // Determine subscription and access_level based on the package
        $package = $session->metadata->package;
        if ($package == 'starter') {
            $subscription = 'Starter Subscription';
            $access_level = 'basic_access';
        } elseif ($package == 'business') {
            $subscription = 'Business Subscription';
            $access_level = 'premium_access';
        } elseif ($package == 'business+') {
            $subscription = 'Business+ Subscription';
            $access_level = 'full_access';
        }

        // Execute the statement
        if($stmt->execute()){
            // Success
        } else {
            error_log("Error updating record: " . $stmt->error);
        }

        // Close connections
        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="CSS/style.css">
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <section>
    <?php if ($payment_success): ?>
      <p>
        We appreciate your business! If you have any questions, please email
        <a href="mailto:support@webcrafted.pro">support@webcrafted.pro</a>.
      </p>
    <?php else: ?>
      <p>Payment verification failed. Please contact support.</p>
    <?php endif; ?>
  </section>
</body>
</html>