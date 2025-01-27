<?php

require '../vendor/autoload.php';
require_once __DIR__ . '/secrets.php';

include '../PHPScripts/session_manager.php';
$is_logged_in = isset($_SESSION['username']);


if (!$is_logged_in) {
  header('Location: ../Login.php?status=noaccess');
  exit;
}

\Stripe\Stripe::setApiKey('$stripeSecretKey');

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
?>
<!DOCTYPE html>
<html>

<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="../../CSS/all.css">
  <link rel="stylesheet" href="../../CSS/Nav.css">
  <link rel="stylesheet" href="../../CSS/Animate.css">
  <script src="https://js.stripe.com/v3/"></script>
  <style>
    @import url("https://fonts.googleapis.com/css?family=Poppins");
  </style>
</head>

<body style="width: 100vw; height: 100vh; margin: 0; padding: 0;">
  <header class="snap">
    <ul class="Top-Buttons">
      <li id="templates"><a href="Templates.php">Templates</a></li>
      <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a></li>
      <li class="First-Layer"><a href="index.php">Home</a></li>
      <li id="websites" class="Second-Layer"><a href="Websites.php">Websites</a></li>
      <li id="contact"><a href="ContactUs.php">Contact Us</a></li>
    </ul>

    <span class="open-slide">
      <a class="hamburger" href="#" onclick="openSideMenu()">
        <p> &#9776;</p>
      </a>
    </span>

    <div id="side-menu" class="side-nav">
      <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
      <div class="mobile-nav-buttons">
        <a href="../">Home</a>
        <a href="../Websites.php">Websites</a>
        <a href="../Pricing.php">Pricing</a>
        <a href="../Templates.php">Templates</a>
        <a href="../ContactUs.php">Contact Us</a>
      </div>
    </div>

    <ul class="account">
      <?php if ($is_logged_in): ?>
        <li><a href="Account.php"><img src="../../images/icons/Account.webp" alt="Account" style="margin-top: -8px;"></a>
        </li>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="Login.php">Login</a></li>
        <li><a href="SignUp.php">Sign Up</a></li>
      <?php endif; ?>
    </ul>

    <a class="MiniWCLogo" href="index.php"><img src="../images/MiniWCLogo.webp" alt="Logo"></a>
  </header>
  <div class="Cont" style="margin-top: 20vh; padding: 2vw;">
    <?php if ($payment_success): ?>
      <img src="../images/status/CheckMark.webp" alt="Checkmark" style="width: 50px; height: 50px;">
      <h3>Payment Successful</h3>
      <p style="margin-bottom: 20px;">
        We appreciate your business! If you have any questions, please email
        <a href="mailto:support@webcrafted.pro"
          style="color: gold; text-decoration: underline;">support@webcrafted.pro</a>.
      </p>
      <a href="../Application/"
        style=" font-size: 18px; border: white 1px solid; padding: 8px 14px; border-radius: 15px; margin: 0 50px 0 -20px">Go
        To Dashboard ></a>
      <a href="../" style="font-size: 18px; border: white 1px solid; padding: 8px 14px; border-radius: 15px;">Back To Home
        ></a>
    <?php else: ?>
      <img src="../images/status/Error.webp" alt="Error" style="width: 50px; height: 50px;">
      <h3>Payment Failed</h3>
      <p style="margin-bottom: 20px;">Payment verification failed. Please contact support.</p>
      <a href="../" style="font-size: 18px; border: white 1px solid; padding: 8px 14px; border-radius: 15px;">Back To Home
        ></a>
    <?php endif; ?>
  </div>
</body>

</html>