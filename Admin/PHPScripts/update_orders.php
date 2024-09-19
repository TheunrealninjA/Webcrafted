<?php
include(__DIR__ . '../../../PHPScripts/session_manager.php');

$is_logged_in = isset($_SESSION['username']);
$user = htmlspecialchars($_SESSION['username']);

if (!$is_logged_in && $_SESSION['username'] !== 'admin') {
    header("Location: Login.php?status=noaccess");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $order_id = $data['order_id'];
    $field_name = $data['field_name'];
    $new_value = $data['new_value'];

    $servername = "server330";
    $username = "webcsosl_Admin";
    $password = "wJFTJo=o=iZ6";
    $dbname = "webcsosl_orders";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die(json_encode(['success' => false, 'message' => 'Connection failed']));
    }

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE orders SET $field_name = ? WHERE order_id = ?");
    $stmt->bind_param("si", $new_value, $order_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update order']);
    }

    $stmt->close();
    $conn->close();
}