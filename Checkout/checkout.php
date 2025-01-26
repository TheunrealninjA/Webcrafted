<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';
require_once __DIR__ . '/secrets.php';
include '../PHPScripts/session_manager.php';

$is_logged_in = isset($_SESSION['username']);

$session_username = htmlspecialchars($_SESSION['username']);

if (!$is_logged_in) {
    header("Location: LoginPage.php?status=noaccess");
    exit();
}

$servername = "server330";
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";
$dbname = "webcsosl_SignUp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT email FROM users WHERE username = ?");
$stmt->bind_param("s", $session_username);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();

if ($stmt->fetch()) {
    $_SESSION['email'] = $email;
}

$stmt->close();
$conn->close();

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://webcrafted.pro/checkout';

$priceId = $_POST['priceId'] ?? 'price_1QjspWABmXQuToBWxb5JhxPp'; // fallback price if none provided

// Map priceId to package
$packageMap = [
    'price_1QjrbeABmXQuToBWDdEVhgpW' => 'starter',
    'price_1QjrsQABmXQuToBWvZn37ngh' => 'business',
    'price_1QjspWABmXQuToBWxb5JhxPp' => 'business+',
];

$package = $packageMap[$priceId] ?? 'starter';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price' => $priceId,
    'quantity' => 1,
  ]],
  'customer_email' => $email,
  'phone_number_collection' => ['enabled' => true],
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