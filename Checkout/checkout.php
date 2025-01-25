<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';
require_once __DIR__ . '/secrets.php';
include '../PHPScripts/session_manager.php';
$is_logged_in = isset($_SESSION['username']);

if (!$is_logged_in) {
    header('Location: ../Login.php?status=noaccess');
    exit;
}

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://webcrafted.pro/checkout';

$priceId = $_POST['priceId'] ?? 'prod_Rd97NrpLOK0CLM'; // fallback price if none provided

// Map priceId to package
$packageMap = [
    'prod_Rd7r6UKI7f3p4J' => 'starter',
    'prod_Rd88IHmNVNcbc0' => 'business',
    'prod_Rd97NrpLOK0CLM' => 'business+',
];

$package = $packageMap[$priceId] ?? 'starter';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price' => $priceId,
    'quantity' => 1,
  ]],
  'customer_email' => $_SESSION['email'],
  'phone-number' => 'required',
  'mode' => 'subscription',
  'billing_address_collection' => 'required',
  'metadata' => [
      'package' => $package,
  ],
  'success_url' => $YOUR_DOMAIN . '/success.php?session_id={CHECKOUT_SESSION_ID}',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
  'automatic_tax' => [
    'enabled' => true,
  ],
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);