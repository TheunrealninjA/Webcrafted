<?php

require_once '../vendor/autoload.php';
require_once '../secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://webcrafted.pro/checkout';

$priceId = $_POST['priceId'] ?? 'prod_Rd97NrpLOK0CLM'; // fallback price if none provided

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price' => $priceId,
    'quantity' => 1,
  ]],
  'mode' => 'subscription',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
  'automatic_tax' => [
    'enabled' => true,
  ],
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);