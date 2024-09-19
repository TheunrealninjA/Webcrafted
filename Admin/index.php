<?php
include(__DIR__ . '../../PHPScripts/session_manager.php');

$is_logged_in = isset($_SESSION['username']);
$user = htmlspecialchars($_SESSION['username']);

if (!$is_logged_in && $_SESSION['username'] !== 'admin') {
    header("Location: Login.php?status=noaccess");
    exit();
}


$servername = "server330"; # make the database and make a better way to hide this.
$username = "webcsosl_Admin";
$password = "wJFTJo=o=iZ6";
$dbname = "webcsosl_orders";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$order_status = 'Completed';
$stmt = $conn->prepare("SELECT order_id, customer_name, customer_email, order_date, total_amount, order_status FROM orders WHERE order_status != ?");
$stmt->bind_param("s", $order_status);
$stmt->execute();

$result = $stmt->get_result();

$active_orders = [];

while ($row = $result->fetch_assoc()) {
    $active_orders[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Panal For Staff">
    <title>Control Panal - WebCrafted Pro</title>
</head>

<body>
    <div class="main-body">
        <header class="snap">
            <ul class="Top-Buttons">
                <li id="templates"><a href="Templates.php">Templates</a></li>
                <li id="services" class="Second-Layer"><a href="Pricing.php">Pricing</a></li>
                <li class="First-Layer"><a href="index.php">Home</a></li>
                <li id="websites" class="Second-Layer"><a href="Websites.php">Websites</a></li>
                <li id="contact"><a href="ContactUs.php">Contact Us</a></li>
            </ul>

            <ul class="account">
                <?php if ($is_logged_in): ?>
                    <li><a href="Account.php"><img src="images/icons/Account.webp" alt="Account"></a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="SignUp.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>

            <a class="MiniWCLogo" href="index.php"><img src="images/MiniWCLogo.webp" alt="Logo"></a>
        </header>

        <div class="Cont">
            <?php
            echo "<h3>Welcome to the Control Panal, $user</h3>";
            ?>
            <div class="orders">
                <h4>Active Orders</h4>
                <div class="active">
                    <?php if (!empty($active_orders)): ?>
                        <table style="border: 1px white solid;">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                            </tr>
                            <?php foreach ($active_orders as $order): ?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['customer_name']; ?></td>
                                    <td><?php echo $order['customer_email']; ?></td>
                                    <td><?php echo $order['order_date']; ?></td>
                                    <td><?php echo $order['total_amount']; ?></td>
                                    <td><?php echo $order['order_status']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php else: ?>
                        <p>No Active Orders</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>